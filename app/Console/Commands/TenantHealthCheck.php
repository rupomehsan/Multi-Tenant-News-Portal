<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Stancl\Tenancy\Database\Models\Domain;

class TenantHealthCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:health {--fix : Attempt to fix common issues}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check health of all tenants and report issues';

    protected $issues = [];
    protected $fixed = [];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fix = $this->option('fix');

        $this->info('🏥 Running Tenant Health Check...');
        $this->newLine();

        // Check 1: MySQL Permissions
        $this->checkMySQLPermissions();

        // Check 2: Tenant Database Access
        $this->checkTenantDatabases($fix);

        // Check 3: Orphaned Databases
        $this->checkOrphanedDatabases($fix);

        // Check 4: Domains Configuration
        $this->checkDomainConfiguration();

        // Check 5: Storage Directories
        $this->checkStorageDirectories($fix);

        // Summary
        $this->displaySummary();

        return empty($this->issues) ? 0 : 1;
    }

    protected function checkMySQLPermissions()
    {
        $this->info('📋 Checking MySQL Permissions...');

        try {
            $dbUser = config('database.connections.mysql.username');
            $grants = DB::select("SHOW GRANTS FOR CURRENT_USER");

            $hasCreatePriv = false;
            $hasDropPriv = false;
            $hasTenantWildcard = false;

            foreach ($grants as $grant) {
                $grantString = current((array)$grant);

                if (stripos($grantString, 'CREATE') !== false && stripos($grantString, '*.*') !== false) {
                    $hasCreatePriv = true;
                }
                if (stripos($grantString, 'DROP') !== false && stripos($grantString, '*.*') !== false) {
                    $hasDropPriv = true;
                }
                if (stripos($grantString, 'tenant%') !== false || stripos($grantString, '`tenant%`') !== false) {
                    $hasTenantWildcard = true;
                }
            }

            if (!$hasCreatePriv) {
                $this->issues[] = "Missing CREATE privilege on *.*";
                $this->line("  ❌ Missing CREATE privilege");
            } else {
                $this->line("  ✅ CREATE privilege granted");
            }

            if (!$hasDropPriv) {
                $this->issues[] = "Missing DROP privilege on *.*";
                $this->line("  ❌ Missing DROP privilege");
            } else {
                $this->line("  ✅ DROP privilege granted");
            }

            if (!$hasTenantWildcard) {
                $this->issues[] = "Missing wildcard grant for tenant% databases";
                $this->line("  ⚠️  No tenant% wildcard grant found (may cause issues)");
            } else {
                $this->line("  ✅ Tenant database wildcard granted");
            }

            if (!$hasCreatePriv || !$hasDropPriv) {
                $this->newLine();
                $this->warn("⚠️  MySQL user '{$dbUser}' lacks required privileges!");
                $this->line("   Please run the commands in MYSQL_PERMISSIONS_SETUP.md");
            }
        } catch (\Exception $e) {
            $this->issues[] = "Cannot check MySQL permissions: " . $e->getMessage();
            $this->line("  ❌ Error checking permissions: " . $e->getMessage());
        }

        $this->newLine();
    }

    protected function checkTenantDatabases($fix = false)
    {
        $this->info('🗄️  Checking Tenant Databases...');

        $tenants = Tenant::all();
        $accessible = 0;
        $inaccessible = 0;

        foreach ($tenants as $tenant) {
            $databaseName = $tenant->database ?? config('tenancy.database.prefix') . $tenant->id;

            try {
                tenancy()->initialize($tenant);
                DB::connection('tenant')->getPdo();
                $accessible++;
                tenancy()->end();
            } catch (\Exception $e) {
                $inaccessible++;
                $this->issues[] = "Tenant {$tenant->id}: Database inaccessible - {$e->getMessage()}";
                $this->line("  ❌ Tenant {$tenant->id}: {$databaseName} - INACCESSIBLE");

                if ($fix) {
                    $this->line("     Attempting to recreate database...");
                    try {
                        DB::statement("CREATE DATABASE IF NOT EXISTS `{$databaseName}`");
                        $this->line("     ✅ Database recreated");

                        // Run migrations
                        tenancy()->initialize($tenant);
                        Artisan::call('migrate', [
                            '--path' => 'database/migrations/tenant',
                            '--force' => true,
                        ]);
                        tenancy()->end();

                        $this->fixed[] = "Recreated database for tenant {$tenant->id}";
                        $this->line("     ✅ Migrations run successfully");
                    } catch (\Exception $fixError) {
                        $this->line("     ❌ Failed to fix: " . $fixError->getMessage());
                    }
                }
            }
        }

        $this->line("  ✅ Accessible: {$accessible}");
        if ($inaccessible > 0) {
            $this->line("  ❌ Inaccessible: {$inaccessible}");
        }

        $this->newLine();
    }

    protected function checkOrphanedDatabases($fix = false)
    {
        $this->info('🔍 Checking for Orphaned Databases...');

        try {
            $prefix = config('tenancy.database.prefix', 'tenant');
            $databases = DB::select("SHOW DATABASES LIKE '{$prefix}%'");

            $tenantIds = Tenant::pluck('id')->toArray();
            $suffix = config('tenancy.database.suffix', '');

            $orphaned = [];

            foreach ($databases as $db) {
                $dbName = current((array)$db);

                // Extract tenant ID from database name
                $tenantId = str_replace([$prefix, $suffix], '', $dbName);

                if (!in_array($tenantId, $tenantIds)) {
                    $orphaned[] = $dbName;
                    $this->line("  ⚠️  Orphaned: {$dbName} (no matching tenant record)");
                    $this->issues[] = "Orphaned database: {$dbName}";

                    if ($fix) {
                        $this->line("     Deleting orphaned database...");
                        try {
                            DB::statement("DROP DATABASE `{$dbName}`");
                            $this->fixed[] = "Deleted orphaned database: {$dbName}";
                            $this->line("     ✅ Deleted");
                        } catch (\Exception $e) {
                            $this->line("     ❌ Failed to delete: " . $e->getMessage());
                        }
                    }
                }
            }

            if (empty($orphaned)) {
                $this->line("  ✅ No orphaned databases found");
            } else {
                $this->line("  Found " . count($orphaned) . " orphaned database(s)");
            }
        } catch (\Exception $e) {
            $this->issues[] = "Cannot check for orphaned databases: " . $e->getMessage();
            $this->line("  ❌ Error: " . $e->getMessage());
        }

        $this->newLine();
    }

    protected function checkDomainConfiguration()
    {
        $this->info('🌐 Checking Domain Configuration...');

        $tenants = Tenant::all();
        $withDomains = 0;
        $withoutDomains = 0;

        foreach ($tenants as $tenant) {
            $domains = Domain::where('tenant_id', $tenant->id)->count();

            if ($domains > 0) {
                $withDomains++;
            } else {
                $withoutDomains++;
                $this->issues[] = "Tenant {$tenant->id}: No domains configured";
                $this->line("  ⚠️  Tenant {$tenant->id}: No domains configured");
            }
        }

        $this->line("  ✅ Tenants with domains: {$withDomains}");
        if ($withoutDomains > 0) {
            $this->line("  ⚠️  Tenants without domains: {$withoutDomains}");
        }

        $this->newLine();
    }

    protected function checkStorageDirectories($fix = false)
    {
        $this->info('📁 Checking Storage Directories...');

        $tenants = Tenant::all();
        $suffix = config('tenancy.filesystem.suffix_base', 'tenant');

        foreach ($tenants as $tenant) {
            $storagePath = storage_path("app/{$suffix}{$tenant->id}");

            if (!file_exists($storagePath)) {
                $this->issues[] = "Tenant {$tenant->id}: Storage directory missing";
                $this->line("  ⚠️  Tenant {$tenant->id}: Storage directory missing");

                if ($fix) {
                    try {
                        mkdir($storagePath, 0755, true);
                        mkdir($storagePath . '/public', 0755, true);
                        $this->fixed[] = "Created storage directory for tenant {$tenant->id}";
                        $this->line("     ✅ Created storage directory");
                    } catch (\Exception $e) {
                        $this->line("     ❌ Failed to create: " . $e->getMessage());
                    }
                }
            }
        }

        $this->line("  ✅ Storage directories checked");
        $this->newLine();
    }

    protected function displaySummary()
    {
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->info('📊 Health Check Summary');
        $this->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');

        if (empty($this->issues)) {
            $this->line('<info>✅ All checks passed! Your multi-tenant setup is healthy.</info>');
        } else {
            $this->line('<error>❌ Found ' . count($this->issues) . ' issue(s):</error>');
            foreach ($this->issues as $issue) {
                $this->line("   • {$issue}");
            }
        }

        if (!empty($this->fixed)) {
            $this->newLine();
            $this->line('<info>🔧 Fixed ' . count($this->fixed) . ' issue(s):</info>');
            foreach ($this->fixed as $fix) {
                $this->line("   • {$fix}");
            }
        }

        if (!empty($this->issues) && empty($this->fixed)) {
            $this->newLine();
            $this->line('<comment>💡 Tip: Run with --fix flag to attempt automatic fixes</comment>');
        }
    }
}
