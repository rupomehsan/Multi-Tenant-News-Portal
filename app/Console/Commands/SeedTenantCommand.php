<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tenant;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SeedTenantCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:seed
                            {tenant_id? : The ID of the tenant to seed (optional - seeds all if not provided)}
                            {--categories : Seed sample categories}
                            {--news : Seed sample news articles}
                            {--admin : Create admin user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed tenant databases with sample data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tenantId = $this->argument('tenant_id');

        if ($tenantId) {
            $tenant = Tenant::find($tenantId);
            if (!$tenant) {
                $this->error("Tenant with ID {$tenantId} not found!");
                return 1;
            }
            $this->seedTenant($tenant);
        } else {
            $tenants = Tenant::all();
            foreach ($tenants as $tenant) {
                $this->seedTenant($tenant);
            }
        }

        return 0;
    }

    protected function seedTenant(Tenant $tenant)
    {
        $this->info("Seeding tenant: {$tenant->name} (ID: {$tenant->id})");

        $tenant->run(function () {
            if ($this->option('admin') || $this->confirm('Create admin user?', true)) {
                $this->createAdminUser();
            }

            if ($this->option('categories') || $this->confirm('Seed sample categories?', true)) {
                $this->seedCategories();
            }

            if ($this->option('news') || $this->confirm('Seed sample news articles?', true)) {
                $this->seedNews();
            }
        });

        $this->info("✅ Seeding completed for tenant: {$tenant->name}");
    }

    protected function createAdminUser()
    {
        if (User::where('email', 'admin@example.com')->exists()) {
            $this->warn('Admin user already exists, skipping...');
            return;
        }

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $this->info('📱 Admin user created: admin@example.com / password');
    }

    protected function seedCategories()
    {
        $categories = [
            ['name' => 'Politics', 'slug' => 'politics', 'color' => '#DC2626'],
            ['name' => 'Technology', 'slug' => 'technology', 'color' => '#2563EB'],
            ['name' => 'Sports', 'slug' => 'sports', 'color' => '#059669'],
            ['name' => 'Business', 'slug' => 'business', 'color' => '#7C3AED'],
            ['name' => 'Entertainment', 'slug' => 'entertainment', 'color' => '#EA580C'],
        ];

        foreach ($categories as $categoryData) {
            Category::firstOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData + ['description' => "News about {$categoryData['name']}", 'is_active' => true]
            );
        }

        $this->info('📂 Sample categories created');
    }

    protected function seedNews()
    {
        $user = User::first();
        $categories = Category::all();

        if (!$user || $categories->isEmpty()) {
            $this->warn('No user or categories found, skipping news seeding...');
            return;
        }

        $newsArticles = [
            [
                'title' => 'Welcome to Your News Portal',
                'slug' => 'welcome-to-your-news-portal',
                'content' => 'This is your first news article in the multi-tenant news portal system. You can edit or delete this article and create new ones from the admin panel.',
                'excerpt' => 'Welcome to your new news portal! Start creating amazing content.',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Getting Started with Content Management',
                'slug' => 'getting-started-with-content-management',
                'content' => 'Learn how to manage your news content effectively using the built-in content management system. Create categories, write articles, and manage your news portal.',
                'excerpt' => 'A guide to managing your news content effectively.',
                'is_published' => true,
                'published_at' => now()->subHour(),
            ],
        ];

        foreach ($newsArticles as $index => $articleData) {
            News::create($articleData + [
                'category_id' => $categories->random()->id,
                'user_id' => $user->id,
            ]);
        }

        $this->info('📰 Sample news articles created');
    }
}
