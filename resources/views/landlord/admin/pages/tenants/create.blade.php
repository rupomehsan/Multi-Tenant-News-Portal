@extends('landlord.admin.layouts.index')

@section('title', 'Create New Tenant')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Create New Tenant</h1>
            <p class="text-gray-600 mt-2">Add a new tenant to the system with their own isolated news portal.</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('landlord.tenants.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Tenant Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="e.g., Somoy News" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Contact Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="admin@somoynews.com" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="domain" class="block text-sm font-medium text-gray-700 mb-2">Subdomain</label>
                    <div class="flex">
                        <input type="text" name="domain" id="domain" value="{{ old('domain') }}"
                            class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="somoynews" required>
                        <span
                            class="inline-flex items-center px-3 py-2 border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm rounded-r-md">
                            .{{ config('app.domain', 'localhost') }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">This will be the subdomain for accessing the tenant's portal</p>
                    @error('domain')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="plan" class="block text-sm font-medium text-gray-700 mb-2">Subscription Plan</label>
                    <select name="plan" id="plan"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required>
                        <option value="">Select a plan</option>
                        <option value="basic" {{ old('plan') === 'basic' ? 'selected' : '' }}>Basic Plan</option>
                        <option value="premium" {{ old('plan') === 'premium' ? 'selected' : '' }}>Premium Plan</option>
                        <option value="enterprise" {{ old('plan') === 'enterprise' ? 'selected' : '' }}>Enterprise Plan
                        </option>
                    </select>
                    @error('plan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('landlord.tenants.index') }}"
                        class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Create Tenant
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mt-6">
            <h3 class="text-lg font-medium text-blue-800 mb-2">What happens when you create a tenant?</h3>
            <ul class="text-sm text-blue-700 space-y-1">
                <li>• A new isolated database is created for the tenant</li>
                <li>• Database migrations are run automatically</li>
                <li>• The subdomain is configured for access</li>
                <li>• The tenant can start managing their news portal immediately</li>
            </ul>
        </div>
    </div>
@endsection
