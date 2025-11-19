<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stancl\Tenancy\Database\Models\Domain;

class TenantController extends Controller
{
    protected $baseRoute = 'landlord.admin.pages.tenants.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::with('domains')->paginate(15);
        return view($this->baseRoute . 'index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->baseRoute . 'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tenants,email',
            'domain' => 'required|string|unique:domains,domain',
            'plan' => 'required|string|in:basic,premium,enterprise',
        ]);

        $tenant = Tenant::create([
            'id' => Str::random(8),
            'name' => $request->name,
            'email' => $request->email,
            'plan' => $request->plan,
            'is_active' => true,
        ]);

        // Create domain
        $tenant->domains()->create([
            'domain' => $request->domain . '.' . config('app.domain', 'localhost'),
        ]);

        return redirect()->route('landlord.tenants.index')
            ->with('success', 'Tenant created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        $tenant->load('domains');
        return view($this->baseRoute . 'show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        return view($this->baseRoute . 'edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tenants,email,' . $tenant->id,
            'plan' => 'required|string|in:basic,premium,enterprise',
            'is_active' => 'boolean',
        ]);

        $tenant->update($request->only(['name', 'email', 'plan', 'is_active']));

        return redirect()->route('landlord.tenants.index')
            ->with('success', 'Tenant updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('landlord.tenants.index')
            ->with('success', 'Tenant deleted successfully!');
    }
}
