<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/admin/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Load tenant routes first
            if (file_exists(base_path('routes/tenant.php'))) {
                require base_path('routes/tenant.php');
            }

            // Load landlord routes (so they override tenant for central domains)
            Route::middleware('web')
                ->group(base_path('routes/landlord.php'));
        });
    }

    protected function mapTenantRoutes()
    {
        if (file_exists(base_path('routes/tenant.php'))) {
            Route::group([], base_path('routes/tenant.php'));
        }
    }
}
