<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Tenant\HomeController;
use App\Http\Controllers\Tenant\NewsController;
use App\Http\Controllers\Tenant\CategoryController;
use App\Http\Controllers\Tenant\DashboardController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/


Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    // Public single-news route (keep admin resource names separate)
    Route::get('/news/{news:slug}', [HomeController::class, 'showNews'])->name('tenant.news.public');
    Route::get('/category/{category:slug}', [HomeController::class, 'categoryNews'])->name('tenant.category.news');
    Route::get('/search', [HomeController::class, 'search'])->name('tenant.search');

    // Test route for debugging
    Route::get('/test-auth', [\App\Http\Controllers\Tenant\TestController::class, 'testAuth']);

    // Authentication Routes for Tenant (inline to avoid any include/load issues)
    Route::middleware('guest')->group(function () {
        // Tenant admin auth routes use /admin/login to avoid conflicts with landlord routes
        Route::get('admin/login', [\App\Http\Controllers\Tenant\Auth\AuthenticatedSessionController::class, 'create'])
            ->name('tenant.login.form');
        Route::post('admin/login', [\App\Http\Controllers\Tenant\Auth\AuthenticatedSessionController::class, 'store'])
            ->name('tenant.login');

        // Backwards compatibility: redirect /login to /admin/login within tenant context
        Route::redirect('login', 'admin/login')->name('tenant.login.redirect');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [\App\Http\Controllers\Tenant\Auth\AuthenticatedSessionController::class, 'destroy'])
            ->name('tenant.logout');
    });

    // Admin Routes (Requires Authentication)
    Route::middleware(['auth'])->prefix('admin')->name('tenant.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // News Management
        // Use names that map to `tenant.news.*` so controllers can redirect using those names.
        Route::resource('news', NewsController::class)->names([
            'index' => 'news.index',
            'create' => 'news.create',
            'store' => 'news.store',
            'show' => 'news.show',
            'edit' => 'news.edit',
            'update' => 'news.update',
            'destroy' => 'news.destroy',
        ]);
        // Category Management
        Route::resource('categories', CategoryController::class)->names([
            'index' => 'categories.index',
            'create' => 'categories.create',
            'store' => 'categories.store',
            'show' => 'categories.show',
            'edit' => 'categories.edit',
            'update' => 'categories.update',
            'destroy' => 'categories.destroy',
        ]);
        // User Management (can be added later)
        // Route::resource('users', UserController::class);
    });
});
// Test route outside group
Route::get('/test-tenant', function () {
    return 'tenant route';
})->name('test.tenant');
