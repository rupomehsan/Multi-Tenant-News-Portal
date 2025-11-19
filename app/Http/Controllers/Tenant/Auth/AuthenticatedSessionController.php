<?php

namespace App\Http\Controllers\Tenant\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // Use a tenant-specific login view to ensure the form posts to the correct tenant route
        return view('tenant.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $credentials = $request->only('email', 'password');

        // Debug logging
        Log::info('Tenant Login Attempt', [
            'tenant_id' => tenant('id'),
            'email' => $credentials['email'],
            'db_connection' => DB::connection()->getDatabaseName(),
            'user_exists' => \App\Models\User::where('email', $credentials['email'])->exists(),
            'total_users' => \App\Models\User::count(),
        ]);

        // Manual authentication to ensure tenant context
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user, $request->boolean('remember'));
            $request->session()->regenerate();
            Log::info('Tenant Login Success', ['email' => $credentials['email']]);

            // Avoid resolving a named route during redirect because tenant route
            // names may not be available in some contexts. Redirect to the admin
            // dashboard path within the tenant instead.
            return redirect()->intended('/admin/dashboard');
        }

        Log::warning('Tenant Login Failed', ['email' => $credentials['email']]);
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
