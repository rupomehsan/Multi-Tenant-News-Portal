@extends('landlord.admin.layouts.index')

@section('title', 'Edit Tenant - ' . $tenant->name)

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Edit Tenant</h1>
            <p class="text-gray-600 mt-2">Update tenant information and settings.</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('landlord.tenants.update', $tenant) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Tenant Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $tenant->name) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="e.g., Somoy News" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Contact Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $tenant->email) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="admin@somoynews.com" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="plan" class="block text-sm font-medium text-gray-700 mb-2">Subscription Plan</label>
                    <select name="plan" id="plan"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required>
                        <option value="">Select a plan</option>
                        <option value="basic" {{ old('plan', $tenant->plan) === 'basic' ? 'selected' : '' }}>Basic Plan
                        </option>
                        <option value="premium" {{ old('plan', $tenant->plan) === 'premium' ? 'selected' : '' }}>Premium
                            Plan</option>
                        <option value="enterprise" {{ old('plan', $tenant->plan) === 'enterprise' ? 'selected' : '' }}>
                            Enterprise Plan</option>
                    </select>
                    @error('plan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1"
                            {{ old('is_active', $tenant->is_active) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-700">Active (tenant can access their portal)</span>
                    </label>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('landlord.tenants.show', $tenant) }}"
                        class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Update Tenant
                    </button>
                </div>
            </form>
        </div>

        <!-- Domain Management Section -->
        <div class="bg-white rounded-lg shadow p-6 mt-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Domain Management</h2>

            @if ($tenant->domains->count() > 0)
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-700 mb-2">Current Domains</h3>
                    <div class="space-y-2">
                        @foreach ($tenant->domains as $domain)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                                <div>
                                    <span class="font-medium">{{ $domain->domain }}</span>
                                    <span class="text-sm text-gray-500 ml-2">Created:
                                        {{ $domain->created_at->format('M d, Y') }}</span>
                                </div>
                                <a href="http://{{ $domain->domain }}:8000" target="_blank"
                                    class="text-blue-600 hover:text-blue-800 text-sm">
                                    Test Domain →
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-gray-500 text-sm mb-4">No domains configured for this tenant.</p>
            @endif

            <div class="text-sm text-gray-600">
                <p>Domain management is handled automatically during tenant creation. If you need to change domains, please
                    contact support.</p>
            </div>
        </div>
    </div>
@endsection
