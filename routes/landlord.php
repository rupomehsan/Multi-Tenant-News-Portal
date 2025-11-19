<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landlord\HomeController;
use App\Http\Controllers\Landlord\TenantController;

/*
|--------------------------------------------------------------------------
| Landlord Routes (Central App)
|--------------------------------------------------------------------------
|
| These routes are for the main application (landlord) that manages
| tenants and provides the SaaS landing page.
|
*/

Route::middleware([
    'web',
    \App\Http\Middleware\CheckTenancy::class
])->group(function () {
    Route::name('landlord.')->group(function () {
        // Debug route
        Route::get('/debug', function () {
            return [
                'host' => request()->getHost(),
                'tenant' => tenant() ? tenant()->name : 'None',
                'is_tenant_route' => false
            ];
        });

        // Public Routes
        Route::get('/', [HomeController::class, 'index'])->name('home');
        // Tenant registration (public)
        Route::get('/tenant/register', function () {
            return view('landlord.tenant-register');
        })->name('tenant.register');

        Route::post('/tenant/register', function (\Illuminate\Http\Request $request) {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'domain' => 'required|string|max:255|unique:tenants,domain',
                'admin_name' => 'required|string|max:255',
                'admin_email' => 'required|email|max:255',
                'plan' => 'required|string|in:basic,standard,premium',
            ]);

            try {
                $id = \Illuminate\Support\Facades\DB::table('tenants')->insertGetId([
                    'name' => $data['name'],
                    'domain' => $data['domain'],
                    'data' => json_encode(['plan' => $data['plan'], 'admin_name' => $data['admin_name'], 'admin_email' => $data['admin_email']]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                return redirect()->route('landlord.tenant.register')->with('success', 'Tenant registered successfully (ID: ' . $id . '). You may need to configure your local hosts and web server to access the domain.');
            } catch (\Exception $e) {
                return back()->withErrors(['error' => 'Failed to register tenant: ' . $e->getMessage()])->withInput();
            }
        })->name('tenant.register.submit');
        Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
        Route::get('/about', [HomeController::class, 'about'])->name('about');
        Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
        Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');
    });

    // Authentication Routes
    require __DIR__ . '/auth.php';
});

// Protected Landlord Routes
Route::middleware([
    'web',
    'auth',
    \App\Http\Middleware\CheckTenancy::class
])->prefix('admin')->name('landlord.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Tenant Management
    Route::resource('tenants', TenantController::class);

    // Profile Management
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});
