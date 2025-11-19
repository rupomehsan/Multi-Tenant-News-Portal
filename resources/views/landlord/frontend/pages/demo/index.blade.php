@extends('landlord.frontend.layouts.index')
@section('title', 'Live Demo Projects - NewsPortal Demos')

@section('content')

    <!-- Demo Hero -->
    <section class="py-20 bg-gradient-to-br from-indigo-50 to-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-4">Explore Live Demo Projects</h1>
                <p class="text-lg text-gray-600 mb-8">Browse professionally designed tenant demos that highlight our
                    platform's flexibility — responsive templates, multimedia layouts and editorial features ready to use.
                </p>

                <div class="flex items-center justify-center gap-3">
                    <input type="search" id="demo-search" placeholder="Search demo sites (e.g. prothomalo, somoynews)"
                        class="w-full max-w-xl px-4 py-3 rounded-lg border border-gray-200 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    <button id="demo-filter"
                        class="px-5 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700">Search</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Demo Grid -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Featured Demos</h2>
                <div class="text-sm text-gray-600">Showing <span
                        id="demo-count">{{ isset($demoSites) ? $demoSites->count() : 0 }}</span> demos</div>
            </div>

            <div id="demo-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @if (!empty($demoSites) && $demoSites->count() > 0)
                    @foreach ($demoSites as $demo)
                        @php
                            $title = $demo['name'] ?? ($demo['domain'] ?? 'Demo Site');
                            $svg =
                                '<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="600"><defs><linearGradient id="g" x1="0" x2="1" y1="0" y2="1"><stop offset="0%" stop-color="#eef2ff"/><stop offset="100%" stop-color="#e9d5ff"/></linearGradient></defs><rect width="100%" height="100%" fill="url(%23g)"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="Arial, Helvetica, sans-serif" font-size="36" fill="#4f46e5">' .
                                e($title) .
                                '</text></svg>';
                            $bgData = 'data:image/svg+xml;utf8,' . rawurlencode($svg);
                        @endphp

                        <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">
                            @php
                                $domain = $demo['domain'] ?? null;
                                if ($domain) {
                                    $demoUrl = strpos($domain, 'http') === 0 ? $domain : 'http://' . $domain;
                                    if (
                                        app()->environment('local') &&
                                        strpos($domain, 'localhost') !== false &&
                                        strpos($demoUrl, ':8000') === false
                                    ) {
                                        $demoUrl .= ':8000';
                                    }
                                } else {
                                    $demoUrl = '#';
                                }
                            @endphp

                            <a href="{{ $demoUrl }}" target="_blank" class="block h-48 overflow-hidden">
                                <div class="w-full h-full bg-cover bg-center transform group-hover:scale-105 transition-transform duration-500"
                                    style="background-image: url('{{ $bgData }}');"></div>
                            </a>
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-3">
                                    <h3 class="text-lg font-bold text-gray-900">{{ $demo['name'] ?? $demo['domain'] }}</h3>
                                    <span
                                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-green-100 text-green-800 text-xs font-semibold">Live</span>
                                </div>
                                <p class="text-sm text-gray-600 mb-4">
                                    {{ $demo['description'] ?? 'Sample tenant site demonstrating the platform.' }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-500">Uses: Articles • Video • Livefeed</div>
                                    @if (!empty($demo['domain']))
                                        <a href="{{ $demoUrl }}" target="_blank"
                                            class="text-indigo-600 font-semibold hover:underline">Open demo</a>
                                    @else
                                        <a href="#" class="text-indigo-600 font-semibold hover:underline">Details</a>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                @else
                    <article
                        class="group border-dashed border-2 border-gray-100 rounded-2xl flex items-center justify-center p-8 text-center text-gray-500">
                        <div>
                            <svg class="mx-auto mb-3 w-12 h-12 text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            <div class="font-semibold">No demos available yet</div>
                            <div class="text-sm mt-2">Register your tenant and configure the demo to appear in this gallery.
                            </div>
                        </div>
                    </article>
                @endif
            </div>

            <!-- CTA -->
            <div class="mt-12 text-center">
                <a href="{{ url('/tenant/register') }}"
                    class="inline-flex items-center gap-3 px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition">Register
                    Your Tenant</a>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            // Minimal client-side demo: filter by search
            document.getElementById('demo-filter').addEventListener('click', function() {
                var q = document.getElementById('demo-search').value.trim().toLowerCase();
                var items = document.querySelectorAll('#demo-list article');
                var count = 0;
                items.forEach(function(it) {
                    var text = it.innerText.toLowerCase();
                    if (!q || text.indexOf(q) !== -1) {
                        it.style.display = '';
                        count++;
                    } else {
                        it.style.display = 'none';
                    }
                });
                document.getElementById('demo-count').innerText = count;
            });
        </script>
    @endpush

@endsection
