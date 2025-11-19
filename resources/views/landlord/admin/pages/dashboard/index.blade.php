@extends('landlord.admin.layouts.index')

@section('title', 'Landlord Dashboard - NewsPortal')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex flex-col gap-1">
            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900">Landlord Dashboard</h1>
            <a class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                target="_blank" href="/">Visit Site</a>
            <p class="text-sm text-gray-500 mt-1">Overview of tenants, system health and recent activity.</p>
        </div>

        <div class="flex items-center gap-3">
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl p-5 shadow-sm border">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Tenants</p>
                    <p class="mt-2 text-2xl font-bold text-gray-900">{{ $totalTenants }}</p>
                </div>
                <div class="bg-indigo-50 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3z" />
                    </svg>
                </div>
            </div>
            <div class="mt-3 text-xs text-gray-400">Updated just now</div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-500">Active Tenants</p>
                    <p class="mt-2 text-2xl font-bold text-gray-900">{{ $activeTenants }}</p>
                </div>
                <div class="bg-green-50 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
                    </svg>
                </div>
            </div>
            <div class="mt-3 text-xs text-gray-400">Currently running</div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-500">Pending Tasks</p>
                    <p class="mt-2 text-2xl font-bold text-gray-900">{{ $pendingTasks ?? 0 }}</p>
                </div>
                <div class="bg-yellow-50 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                    </svg>
                </div>
            </div>
            <div class="mt-3 text-xs text-gray-400">Review and action required</div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-500">System Health</p>
                    <p class="mt-2 text-2xl font-bold text-green-600">Healthy</p>
                </div>
                <div class="bg-purple-50 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18" />
                    </svg>
                </div>
            </div>
            <div class="mt-3 text-xs text-gray-400">All services operational</div>
        </div>
    </div>

    <!-- Charts + Recent table -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Traffic Overview</h3>
                <div class="text-sm text-gray-500">Last 30 days</div>
            </div>
            <div class="h-56 bg-gradient-to-br from-indigo-50 to-white rounded-lg flex items-center justify-center">
                <!-- placeholder chart -->
                <svg class="w-3/4 h-40 text-indigo-200" viewBox="0 0 600 250" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="0" y="0" width="600" height="250" rx="8" fill="currentColor" opacity="0.05" />
                    <path d="M20 200 L80 150 L140 160 L200 120 L260 130 L320 90 L380 110 L440 80 L500 95 L560 60"
                        stroke="#6366f1" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" fill="none"
                        opacity="0.9" />
                </svg>
            </div>
            <div class="mt-4 text-sm text-gray-500">Tip: integrate a charting library (Chart.js, ApexCharts) for live
                graphs.</div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <a href="{{ route('landlord.tenants.create') }}"
                    class="block w-full text-left px-4 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Create
                    Tenant</a>
                <a href="{{ route('landlord.tenants.index') }}"
                    class="block w-full text-left px-4 py-3 border rounded-lg hover:bg-gray-50">Manage Tenants</a>
                <a href="{{ url('/admin/settings') }}"
                    class="block w-full text-left px-4 py-3 border rounded-lg hover:bg-gray-50">Settings</a>
            </div>
        </div>
    </div>

    <!-- Recent Tenants Table -->
    <div class="bg-white rounded-2xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Recent Tenants</h3>
            <a href="{{ route('landlord.tenants.index') }}" class="text-sm text-indigo-600 hover:underline">View all</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Domain</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Plan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Created</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($recentTenants as $tenant)
                        <tr>
                            <td class="px-4 py-3">
                                <div class="font-medium text-gray-900">{{ $tenant->name }}</div>
                                <div class="text-xs text-gray-500">ID: {{ $tenant->id }}</div>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-700">
                                @if ($tenant->domains->count() > 0)
                                    <a href="https://{{ $tenant->domains->first()->domain }}" target="_blank"
                                        class="text-indigo-600 hover:underline">{{ $tenant->domains->first()->domain }}</a>
                                @else
                                    <span class="text-gray-400">No domain</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold
                                    @if ($tenant->plan === 'basic') bg-gray-100 text-gray-800
                                    @elseif($tenant->plan === 'premium') bg-blue-100 text-blue-800
                                    @else bg-purple-100 text-purple-800 @endif">
                                    {{ ucfirst($tenant->plan) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold @if ($tenant->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">{{ $tenant->is_active ? 'Active' : 'Inactive' }}</span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $tenant->created_at->diffForHumans() }}</td>
                            <td class="px-4 py-3 text-sm">
                                <a href="{{ route('landlord.tenants.show', $tenant) }}"
                                    class="text-indigo-600 hover:underline mr-3">View</a>
                                <a href="{{ route('landlord.tenants.edit', $tenant) }}"
                                    class="text-gray-700 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-500">No tenants found — <a
                                    href="{{ route('landlord.tenants.create') }}"
                                    class="text-indigo-600 hover:underline">create one</a>.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
