<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Landlord\TenantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Landlord Web Routes
|--------------------------------------------------------------------------
|
| These routes are for the main application (landlord) that manages
| all tenants. They are not affected by tenant context switching.
|
*/


// Dashboard route for Laravel Breeze compatibility

// Temporary route to access tenant content for testing

// Authentication Routes
require __DIR__ . '/auth.php';

// Protected Landlord Routes
