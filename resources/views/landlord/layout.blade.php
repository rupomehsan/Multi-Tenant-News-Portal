<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'News Portal SaaS - Admin')</title>
    <script src="{{ asset('assets/js/tailwindcss.js') }}"></script>
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">News Portal SaaS - Admin Panel</h1>
            <div class="space-x-4">
                <a href="{{ route('landlord.dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('landlord.tenants.index') }}" class="hover:underline">Tenants</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-8 px-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>

</html>
