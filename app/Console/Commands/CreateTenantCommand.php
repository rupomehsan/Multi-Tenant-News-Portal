<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tenant;
use Illuminate\Support\Str;

class CreateTenantCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:create
                            {name : The name of the tenant}
                            {domain : The domain/subdomain for the tenant}
                            {email : The contact email for the tenant}
                            {--plan=basic : The subscription plan (basic, premium, enterprise)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new tenant with database and domain setup';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $domain = $this->argument('domain');
        $email = $this->argument('email');
        $plan = $this->option('plan');

        $this->info("Creating tenant: {$name}");

        try {
            // Create tenant
            $tenant = Tenant::create([
                'id' => Str::random(8),
                'name' => $name,
                'email' => $email,
                'plan' => $plan,
                'is_active' => true,
            ]);

            // Create domain
            $tenant->domains()->create([
                'domain' => $domain,
            ]);

            $this->info("✅ Tenant created successfully!");
            $this->table(['Field', 'Value'], [
                ['ID', $tenant->id],
                ['Name', $tenant->name],
                ['Email', $tenant->email],
                ['Domain', $domain],
                ['Plan', $tenant->plan],
                ['Status', 'Active'],
            ]);

            $this->info("🚀 Tenant is now accessible at: http://{$domain}");
            $this->info("📊 Tenant database will be automatically created when first accessed.");
        } catch (\Exception $e) {
            $this->error("❌ Error creating tenant: " . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
