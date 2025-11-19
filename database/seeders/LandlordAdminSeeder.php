<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandlordAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create landlord admin user
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@mainnews.com'],
            [
                'name' => 'Landlord Admin',
                'email' => 'admin@mainnews.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Create some sample tenants
        $tenant1 = \App\Models\Tenant::firstOrCreate(
            ['id' => 'somoynews'],
            [
                'id' => 'somoynews',
                'name' => 'Somoy News',
                'email' => 'admin@somoynews.com',
                'plan' => 'premium',
                'is_active' => true,
            ]
        );

        $tenant1->domains()->firstOrCreate([
            'domain' => 'somoynews.localhost',
        ]);

        $tenant2 = \App\Models\Tenant::firstOrCreate(
            ['id' => 'prothomalo'],
            [
                'id' => 'prothomalo',
                'name' => 'Prothom Alo',
                'email' => 'admin@prothomalo.com',
                'plan' => 'enterprise',
                'is_active' => true,
            ]
        );

        $tenant2->domains()->firstOrCreate([
            'domain' => 'prothomalo.localhost',
        ]);
    }
}
