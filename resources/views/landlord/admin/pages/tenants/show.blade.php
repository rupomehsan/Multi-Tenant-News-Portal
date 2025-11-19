@extends('landlord.layout')

@section('title', 'Tenant Details - ' . $tenant->name)

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Tenant Details</h1>
        <div class="space-x-3">
            <a href="{{ route('landlord.tenants.edit', $tenant) }}"
                class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                Edit Tenant
            </a>
            <a href="{{ route('landlord.tenants.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Back to Tenants
            </a>
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
        <!-- Tenant Information -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Basic Information</h2>
            <div class="space-y-3">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Tenant ID</label>
                    <p class="text-sm text-gray-900 font-mono">{{ $tenant->id }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Name</label>
                    <p class="text-sm text-gray-900">{{ $tenant->name }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Email</label>
                    <p class="text-sm text-gray-900">{{ $tenant->email }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Plan</label>
                    <span
                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                        @if ($tenant->plan === 'basic') bg-gray-100 text-gray-800
                        @elseif($tenant->plan === 'premium') bg-blue-100 text-blue-800
                        @else bg-purple-100 text-purple-800 @endif">
                        {{ ucfirst($tenant->plan) }}
                    </span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Status</label>
                    <span
                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                        @if ($tenant->is_active) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                        {{ $tenant->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Created</label>
                    <p class="text-sm text-gray-900">{{ $tenant->created_at->format('M d, Y H:i') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Last Updated</label>
                    <p class="text-sm text-gray-900">{{ $tenant->updated_at->format('M d, Y H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Domains -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Domains</h2>
            @if ($tenant->domains->count() > 0)
                <div class="space-y-3">
                    @foreach ($tenant->domains as $domain)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $domain->domain }}</p>
                                <p class="text-xs text-gray-500">Created: {{ $domain->created_at->format('M d, Y') }}</p>
                            </div>
                            <a href="http://{{ $domain->domain }}:8000" target="_blank"
                                class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Visit Site →
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-sm">No domains configured</p>
            @endif

            <div class="mt-4">
                <a href="{{ route('landlord.tenants.edit', $tenant) }}"
                    class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    Manage Domains →
                </a>
            </div>
        </div>
    </div>

    <!-- Tenant Statistics -->
    <div class="mt-6 bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Tenant Statistics</h2>
        <div class="grid md:grid-cols-4 gap-4">
            <div class="text-center">
                <div class="text-2xl font-bold text-blue-600">
                    @php
                        tenancy()->initialize($tenant);
                        $newsCount = \App\Models\News::count();
                        tenancy()->end();
                    @endphp
                    {{ $newsCount }}
                </div>
                <div class="text-sm text-gray-600">Total Articles</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-green-600">
                    @php
                        tenancy()->initialize($tenant);
                        $publishedCount = \App\Models\News::published()->count();
                        tenancy()->end();
                    @endphp
                    {{ $publishedCount }}
                </div>
                <div class="text-sm text-gray-600">Published Articles</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-purple-600">
                    @php
                        tenancy()->initialize($tenant);
                        $categoryCount = \App\Models\Category::count();
                        tenancy()->end();
                    @endphp
                    {{ $categoryCount }}
                </div>
                <div class="text-sm text-gray-600">Categories</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-orange-600">
                    @php
                        tenancy()->initialize($tenant);
                        $userCount = \App\Models\User::count();
                        tenancy()->end();
                    @endphp
                    {{ $userCount }}
                </div>
                <div class="text-sm text-gray-600">Users</div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="mt-6 bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Articles</h2>
        @php
            tenancy()->initialize($tenant);
            $recentArticles = \App\Models\News::with('category')->latest()->take(5)->get();
            tenancy()->end();
        @endphp

        @if ($recentArticles->count() > 0)
            <div class="space-y-3">
                @foreach ($recentArticles as $article)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">{{ $article->title }}</h3>
                            <p class="text-xs text-gray-500">
                                {{ $article->category->name ?? 'No Category' }} •
                                {{ $article->created_at->format('M d, Y') }} •
                                {{ $article->is_published ? 'Published' : 'Draft' }}
                            </p>
                        </div>
                        <a href="http://{{ $tenant->domains->first()->domain ?? 'localhost' }}:8000/news/{{ $article->slug }}"
                            target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            View →
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-sm">No articles found</p>
        @endif
    </div>

    <!-- Danger Zone -->
    <div class="mt-6 bg-red-50 border border-red-200 rounded-lg p-6">
        <h2 class="text-xl font-semibold text-red-800 mb-4">Danger Zone</h2>
        <p class="text-red-700 text-sm mb-4">
            Deleting this tenant will permanently remove all associated data including articles, categories, and users.
            This action cannot be undone.
        </p>
        <form method="POST" action="{{ route('landlord.tenants.destroy', $tenant) }}"
            onsubmit="return confirm('Are you sure you want to delete this tenant? This action cannot be undone.')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm font-medium">
                Delete Tenant
            </button>
        </form>
    </div>
@endsection
