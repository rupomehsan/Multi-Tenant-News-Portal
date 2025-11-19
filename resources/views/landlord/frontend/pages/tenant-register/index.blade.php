@extends('landlord.frontend.layouts.index')

@section('title', 'Register a Tenant')

@section('content')

    <section class="py-16 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-8">
                <div class="mb-6 text-center">
                    <h2 class="text-2xl font-bold text-gray-900">Create a New Tenant</h2>
                    <p class="text-gray-600">Quickly provision a new news site and choose a plan to get started.</p>
                </div>

                @if (session('success'))
                    <div class="mb-6 p-4 rounded-lg bg-green-50 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-lg bg-red-50 text-red-700">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('landlord.tenant.register.submit') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tenant / Site Name</label>
                        <input name="name" type="text" required value="{{ old('name') }}"
                            class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Example: My News Site">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Desired Domain (local dev or custom)</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input name="domain" type="text" required value="{{ old('domain') }}"
                                class="block w-full min-w-0 flex-1 rounded-l-lg border-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="prothomalo.localhost">
                        </div>
                        <p class="text-xs text-gray-500 mt-1">For local dev, use `something.localhost` (needs hosts file &
                            web server config).</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Admin Name</label>
                        <input name="admin_name" type="text" required value="{{ old('admin_name') }}"
                            class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Editor-in-Chief">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Admin Email</label>
                        <input name="admin_email" type="email" required value="{{ old('admin_email') }}"
                            class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="admin@example.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Select Plan</label>
                        <fieldset class="mt-2 grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <label class="cursor-pointer">
                                <input type="radio" name="plan" value="basic" class="sr-only"
                                    {{ old('plan', 'standard') == 'basic' ? 'checked' : '' }}>
                                <div class="p-4 rounded-lg border border-gray-200 hover:shadow-md">
                                    <div class="text-lg font-bold">Basic</div>
                                    <div class="mt-1 text-sm text-gray-600">Free — ideal for testing and hobby projects
                                    </div>
                                </div>
                            </label>

                            <label class="cursor-pointer">
                                <input type="radio" name="plan" value="standard" class="sr-only"
                                    {{ old('plan', 'standard') == 'standard' ? 'checked' : '' }}>
                                <div class="p-4 rounded-lg border-2 border-indigo-500 bg-indigo-50">
                                    <div class="text-lg font-bold">Standard</div>
                                    <div class="mt-1 text-sm text-gray-600">Recommended — unlimited articles & custom
                                        domains</div>
                                </div>
                            </label>

                            <label class="cursor-pointer">
                                <input type="radio" name="plan" value="premium" class="sr-only"
                                    {{ old('plan') == 'premium' ? 'checked' : '' }}>
                                <div class="p-4 rounded-lg border border-gray-200 hover:shadow-md">
                                    <div class="text-lg font-bold">Premium</div>
                                    <div class="mt-1 text-sm text-gray-600">Enterprise features and priority support</div>
                                </div>
                            </label>
                        </fieldset>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <button type="submit"
                            class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700">
                            Register Tenant
                        </button>
                        <a href="{{ route('landlord.home') }}"
                            class="ml-4 inline-block text-sm text-gray-600 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
