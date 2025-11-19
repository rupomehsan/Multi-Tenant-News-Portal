<aside class="w-64 bg-white rounded-lg shadow p-4 sticky top-6 h-[80vh] overflow-auto">
    <div class="mb-6">
        <div class="text-sm text-gray-400 uppercase">Admin</div>
        <div class="text-lg font-semibold text-gray-900">Platform</div>
    </div>

    <nav class="space-y-1">
        <a href="{{ url('/admin/dashboard') }}"
            class="flex items-center gap-3 px-3 py-2 rounded hover:bg-gray-50 {{ request()->is('admin/dashboard') ? 'bg-gray-100 font-medium' : 'text-gray-700' }}">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3z" />
            </svg>
            <span>Dashboard</span>
        </a>

        <div class="mt-3 text-xs text-gray-400 uppercase">Tenants</div>
        <a href="{{ route('landlord.tenants.index') }}"
            class="flex items-center gap-3 px-3 py-2 rounded hover:bg-gray-50 {{ request()->is('admin/tenants*') ? 'bg-gray-100 font-medium' : 'text-gray-700' }}">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
            </svg>
            <span>All Tenants</span>
        </a>
        <a href="{{ route('landlord.tenants.create') }}"
            class="flex items-center gap-3 px-3 py-2 rounded hover:bg-gray-50 {{ request()->is('admin/tenants/create') ? 'bg-gray-100 font-medium' : 'text-gray-700' }}">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Create Tenant</span>
        </a>

        <div class="mt-3 text-xs text-gray-400 uppercase">Account</div>
        <a href="{{ url('/admin/profile') }}"
            class="flex items-center gap-3 px-3 py-2 rounded hover:bg-gray-50 {{ request()->is('admin/profile*') ? 'bg-gray-100 font-medium' : 'text-gray-700' }}">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A9 9 0 1118.88 6.196 9 9 0 015.12 17.804z" />
            </svg>
            <span>Profile</span>
        </a>
        <a href="{{ url('/admin/settings') }}"
            class="flex items-center gap-3 px-3 py-2 rounded hover:bg-gray-50 {{ request()->is('admin/settings*') ? 'bg-gray-100 font-medium' : 'text-gray-700' }}">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
            </svg>
            <span>Settings</span>
        </a>

        <div class="mt-6 border-t pt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-3 py-2 rounded hover:bg-gray-50 text-red-600">Logout</button>
            </form>
        </div>
    </nav>
</aside>
