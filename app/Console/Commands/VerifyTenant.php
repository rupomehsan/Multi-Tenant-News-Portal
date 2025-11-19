<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Stancl\Tenancy\Database\Models\Domain;

class VerifyTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:verify {tenant_id? : The tenant ID to verify}
                            {--all : Verify all tenants}
                            {--detailed : Show detailed information}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verify tenant creation and database setup';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tenantId = $this->argument('tenant_id');
        $verifyAll = $this->option('all');
        $detailed = $this->option('detailed');

        if ($verifyAll) {
            return $this->verifyAllTenants($detailed);
        }

        if (!$tenantId) {
            $this->error('Please provide a tenant ID or use --all flag');
            return 1;
        }

        return $this->verifySingleTenant($tenantId, $detailed);
    }

    /**
     * Verify all tenants
     */
    protected function verifyAllTenants($detailed = false)
    {
        $tenants = Tenant::all();

        if ($tenants->isEmpty()) {
            $this->warn('No tenants found in the database.');
            return 0;
        }

        $this->info("Found {$tenants->count()} tenant(s). Verifying...\n");

        $results = [
            'success' => 0,
            'failed' => 0,
            'warnings' => 0,
        ];

        foreach ($tenants as $tenant) {
            $status = $this->verifyTenantStatus($tenant, $detailed);
            $results[$status]++;
        }

        // Summary
        $this->newLine();
        $this->info('=== Verification Summary ===');
        $this->line("✅ Successful: {$results['success']}");
        $this->line("⚠️  Warnings: {$results['warnings']}");
        $this->line("❌ Failed: {$results['failed']}");

        return $results['failed'] > 0 ? 1 : 0;
    }

    /**
     * Verify a single tenant
     */
    protected function verifySingleTenant($tenantId, $detailed = false)
    {
        $tenant = Tenant::find($tenantId);

        if (!$tenant) {
            $this->error("Tenant with ID '{$tenantId}' not found.");
            return 1;
        }

        $this->info("Verifying tenant: {$tenant->id}\n");
        $status = $this->verifyTenantStatus($tenant, $detailed);

        return $status === 'failed' ? 1 : 0;
    }

    /**
     * Verify tenant status and return result
     */
    protected function verifyTenantStatus(Tenant $tenant, $detailed = false): string
    {
        $checks = [
            'tenant_record' => false,
            'database_exists' => false,
            'database_accessible' => false,
            'migrations_run' => false,
            'domain_configured' => false,
            'tables_exist' => false,
        ];

        $errors = [];
        $warnings = [];

        // Header
        $this->line("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");
        $this->line("Tenant ID: <info>{$tenant->id}</info>");
        if ($tenant->name) {
            $this->line("Name: {$tenant->name}");
        }
        if ($tenant->email) {
            $this->line("Email: {$tenant->email}");
        }

        // Check 1: Tenant record exists
        $checks['tenant_record'] = true;
        $this->line("✅ Tenant record exists");

        // Check 2: Database name
        $databaseName = $tenant->database ?? config('tenancy.database.prefix') . $tenant->id . config('tenancy.database.suffix', '');
        $this->line("Database: <comment>{$databaseName}</comment>");

        // Check 3: Database exists
        try {
            $databases = DB::select("SHOW DATABASES LIKE '{$databaseName}'");
            if (count($databases) > 0) {
                $checks['database_exists'] = true;
                $this->line("✅ Database exists");
            } else {
                $errors[] = "Database '{$databaseName}' does not exist";
                $this->line("❌ Database does not exist");
            }
        } catch (\Exception $e) {
            $errors[] = "Cannot check database existence: " . $e->getMessage();
            $this->line("❌ Cannot check database existence");
        }

        // Check 4: Database accessible
        if ($checks['database_exists']) {
            try {
                tenancy()->initialize($tenant);

                // Try to query the database
                $checks['database_accessible'] = DB::connection('tenant')->getPdo() !== null;

                if ($checks['database_accessible']) {
                    $this->line("✅ Database accessible");

                    // Check 5: Tables exist
                    try {
                        $tables = DB::connection('tenant')->select('SHOW TABLES');
                        $tableCount = count($tables);

                        if ($tableCount > 0) {
                            $checks['tables_exist'] = true;
                            $this->line("✅ Tables exist (count: {$tableCount})");

                            if ($detailed) {
                                $this->line("   Tables: " . implode(', ', array_map(function ($t) use ($databaseName) {
                                    $key = "Tables_in_{$databaseName}";
                                    return $t->$key ?? current((array)$t);
                                }, $tables)));
                            }
                        } else {
                            $warnings[] = "No tables found in database";
                            $this->line("⚠️  No tables found");
                        }
                    } catch (\Exception $e) {
                        $warnings[] = "Cannot list tables: " . $e->getMessage();
                        $this->line("⚠️  Cannot list tables");
                    }

                    // Check 6: Migrations table exists
                    try {
                        $migrations = DB::connection('tenant')->table('migrations')->count();
                        $checks['migrations_run'] = $migrations > 0;

                        if ($checks['migrations_run']) {
                            $this->line("✅ Migrations run (count: {$migrations})");

                            if ($detailed) {
                                $lastMigration = DB::connection('tenant')
                                    ->table('migrations')
                                    ->orderBy('id', 'desc')
                                    ->first();
                                if ($lastMigration) {
                                    $this->line("   Last migration: {$lastMigration->migration}");
                                }
                            }
                        } else {
                            $warnings[] = "No migrations found in migrations table";
                            $this->line("⚠️  No migrations found");
                        }
                    } catch (\Exception $e) {
                        $warnings[] = "Migrations table not found or inaccessible";
                        $this->line("⚠️  Migrations table not found");
                    }
                } else {
                    $errors[] = "Cannot establish database connection";
                    $this->line("❌ Cannot connect to database");
                }

                tenancy()->end();
            } catch (\Exception $e) {
                $errors[] = "Database access error: " . $e->getMessage();
                $this->line("❌ Database access error");

                if ($detailed) {
                    $this->line("   Error: " . $e->getMessage());
                }
            }
        }

        // Check 7: Domain configured
        try {
            $domains = Domain::where('tenant_id', $tenant->id)->get();

            if ($domains->isNotEmpty()) {
                $checks['domain_configured'] = true;
                $domainList = $domains->pluck('domain')->implode(', ');
                $this->line("✅ Domain(s) configured: <info>{$domainList}</info>");
            } else {
                $warnings[] = "No domains configured for this tenant";
                $this->line("⚠️  No domains configured");
            }
        } catch (\Exception $e) {
            $warnings[] = "Cannot check domains: " . $e->getMessage();
            $this->line("⚠️  Cannot check domains");
        }

        // Additional details
        if ($detailed) {
            $this->newLine();
            $this->line("Additional Details:");
            $this->line("  Created: " . ($tenant->created_at ?? 'N/A'));
            $this->line("  Updated: " . ($tenant->updated_at ?? 'N/A'));

            if (isset($tenant->is_active)) {
                $this->line("  Active: " . ($tenant->is_active ? 'Yes' : 'No'));
            }

            if (isset($tenant->plan)) {
                $this->line("  Plan: " . $tenant->plan);
            }
        }

        // Summary for this tenant
        $this->newLine();

        if (!empty($errors)) {
            $this->line("<error>Errors:</error>");
            foreach ($errors as $error) {
                $this->line("  • {$error}");
            }
        }

        if (!empty($warnings)) {
            $this->line("<comment>Warnings:</comment>");
            foreach ($warnings as $warning) {
                $this->line("  • {$warning}");
            }
        }

        // Overall status
        $criticalChecks = ['tenant_record', 'database_exists', 'database_accessible'];
        $criticalFailed = false;

        foreach ($criticalChecks as $check) {
            if (!$checks[$check]) {
                $criticalFailed = true;
                break;
            }
        }

        if ($criticalFailed) {
            $this->line("\n<error>❌ FAILED</error> - Critical issues found");
            return 'failed';
        } elseif (!empty($warnings)) {
            $this->line("\n<comment>⚠️  WARNING</comment> - Tenant functional but has warnings");
            return 'warnings';
        } else {
            $this->line("\n<info>✅ SUCCESS</info> - Tenant fully operational");
            return 'success';
        }
    }
}
