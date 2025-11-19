@extends('landlord.admin.layouts.index')

@section('title', 'Site Settings')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Site Settings</h1>
            <p class="text-sm text-gray-500">Manage global landlord settings for the SaaS application.</p>
        </div>

        @if (session('success'))
            <div class="mb-4 p-3 rounded bg-green-50 border border-green-100 text-green-800">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-50 border border-red-100 text-red-800">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('landlord.settings.site.update') }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Site Name</label>
                <input name="site_name" type="text"
                    value="{{ old('site_name', $settings['site_name'] ?? config('app.name')) }}"
                    class="mt-1 block w-full rounded-md border-gray-200 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tagline / Short Description</label>
                <input name="tagline" type="text" value="{{ old('tagline', $settings['tagline'] ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-200 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Support Email</label>
                    <input name="support_email" type="email"
                        value="{{ old('support_email', $settings['support_email'] ?? config('mail.from.address')) }}"
                        class="mt-1 block w-full rounded-md border-gray-200 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Default Currency</label>
                    <input name="currency" type="text" value="{{ old('currency', $settings['currency'] ?? 'USD') }}"
                        class="mt-1 block w-full rounded-md border-gray-200 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Footer Text</label>
                <textarea name="footer_text" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-200 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('footer_text', $settings['footer_text'] ?? '© ' . date('Y') . ' Your Company') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Site Logo</label>
                    <div class="mt-2 flex items-center gap-4">
                        <input type="file" name="logo" accept="image/*" class="block w-full text-sm text-gray-600" />
                    </div>
                    @if (!empty($settings['site_logo']))
                        <div class="mt-3">
                            <img src="{{ asset($settings['site_logo']) }}" alt="Site logo" class="h-16 object-contain" />
                        </div>
                    @endif
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Homepage Demo Domain</label>
                    <input name="demo_domain" type="text"
                        value="{{ old('demo_domain', $settings['demo_domain'] ?? '') }}"
                        placeholder="e.g. prothomalo.localhost"
                        class="mt-1 block w-full rounded-md border-gray-200 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    <p class="text-xs text-gray-500 mt-1">If set, this domain will be used in the landing preview and demo
                        links.</p>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3">
                <a href="{{ route('landlord.dashboard') }}"
                    class="px-4 py-2 rounded-md bg-gray-100 text-gray-700">Cancel</a>
                <button type="submit"
                    class="px-4 py-2 rounded-md bg-indigo-600 text-white font-semibold hover:bg-indigo-700">Save
                    Settings</button>
            </div>
        </form>
    </div>

@endsection
