<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'News Portal')</title>
    <!-- Tailwind CSS CDN -->

    <script
        src="{{ function_exists('global_asset') ? global_asset('assets/js/tailwindcss.js') : asset('assets/js/tailwindcss.js') }}">
    </script>
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>

<body class="font-sans antialiased">
    @include('tenant.frontend.layouts.partials.header')
    <main class="container mx-auto px-4 py-8">

        @yield('content')

    </main>
    @include('tenant.frontend.layouts.partials.footer')

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

</body>

</html>
