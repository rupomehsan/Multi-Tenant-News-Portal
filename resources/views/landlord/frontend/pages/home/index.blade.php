@extends('landlord.frontend.layouts.index')

@section('title', 'Build Your Own News Portal Instantly - NewsPortal SaaS')

@section('content')
    <!-- HERO SECTION -->
    <section class="relative overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-purple-50 py-20 lg:py-32">
        <div
            class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiM1NTU1NTUiIGZpbGwtb3BhY2l0eT0iMC4wMiI+PHBhdGggZD0iTTM2IDE0YzAtMS4xLjktMiAyLTJoNGMxLjEgMCAyIC45IDIgMnY0YzAgMS4xLS45IDItMiAyaC00Yy0xLjEgMC0yLS45LTItMnYtNHptMCAwIi8+PC9nPjwvZz48L3N2Zz4=')] opacity-30">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Left Content -->
                <div class="text-center lg:text-left">
                    <!-- Trust Badge -->
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-semibold mb-8">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span>Trusted by 500+ Publishers</span>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-gray-900 mb-6">
                        Build Your Own
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
                            News Portal
                        </span>
                        Instantly
                    </h1>

                    <!-- Subheading -->
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                        A powerful multi-tenant SaaS platform to launch and manage news websites. Fast, secure and
                        SEO-friendly so your readers find you.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-8">
                        <a href="{{ url('/register') }}"
                            class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl">
                            Start Free Trial
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <a href="#demo"
                            class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-indigo-600 bg-white rounded-xl border-2 border-indigo-100 hover:border-indigo-300 transition-all duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" />
                            </svg>
                            View Demo
                        </a>
                    </div>

                    <!-- Features -->
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-6 text-sm text-gray-600">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>7-day free trial</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>No credit card required</span>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Demo Card -->
                <div class="relative">
                    <!-- Background decoration -->
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-3xl transform rotate-3 opacity-10">
                    </div>

                    <!-- Main Card -->
                    <div class="relative bg-white rounded-3xl p-2 shadow-2xl">
                        <div class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl p-6 overflow-hidden">
                            <!-- Card Header -->
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <div class="text-xs font-semibold uppercase tracking-wide text-indigo-200">Live Demo
                                    </div>

                                </div>

                            </div>

                            <!-- Demo Preview - Professional Card -->
                            <div class="bg-white rounded-xl p-4 shadow-lg">
                                <div class="flex items-center gap-4">
                                    <!-- Mini screenshot / mock -->
                                    <div
                                        class="w-36 h-24 rounded-md overflow-hidden border border-gray-100 bg-gradient-to-br from-indigo-50 to-purple-50 flex-shrink-0">
                                        <div class="p-3 h-full flex flex-col justify-between">
                                            <div class="h-4 bg-indigo-200 rounded w-3/4"></div>
                                            <div class="space-y-2 mt-2">
                                                <div class="h-3 bg-indigo-100 rounded w-full"></div>
                                                <div class="h-3 bg-indigo-100 rounded w-5/6"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Description + CTAs -->
                                    <div class="flex-1">
                                        <h3 class="text-gray-900 text-lg font-semibold">Clean, mobile-first article layout
                                        </h3>
                                        <p class="text-gray-600 text-sm mt-1">Optimized typography, fast loading and
                                            beautiful imagery — a sample of how your content will appear.</p>

                                        <div class="mt-3 flex items-center gap-3">
                                            <a href="#demo"
                                                class="inline-flex items-center gap-2 px-3 py-2 bg-indigo-600 text-white rounded-md text-sm font-semibold hover:bg-indigo-700 transition">Preview</a>
                                            @php
                                                $d = 'abc.localhost';
                                                $demoUrl = strpos($d, 'http') === 0 ? $d : 'http://' . $d;
                                                if (
                                                    app()->environment('local') &&
                                                    strpos($d, 'localhost') !== false &&
                                                    strpos($demoUrl, ':8000') === false
                                                ) {
                                                    $demoUrl .= ':8000';
                                                }
                                            @endphp
                                            <a href="{{ $demoUrl }}" target="_blank"
                                                class="inline-flex items-center gap-2 px-3 py-2 bg-white text-indigo-600 rounded-md text-sm font-medium border border-indigo-100 hover:shadow">Visit
                                                Demo</a>
                                        </div>
                                    </div>

                                    <!-- Live badge -->
                                    <div class="hidden sm:flex flex-col items-end">
                                        <span
                                            class="px-3 py-1 bg-green-500 text-white text-xs font-bold uppercase rounded-full shadow animate-pulse">Live</span>
                                        <span class="text-xs text-gray-500 mt-2">Responsive • SEO</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="mt-4 flex items-center justify-between text-sm text-white">
                                <span class="opacity-90">Modern, responsive templates</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Badge -->
                    <div class="absolute -top-4 -right-4 bg-white rounded-xl shadow-xl p-3 animate-bounce hidden lg:block">
                        <div class="flex items-center gap-2">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="text-sm font-semibold text-gray-700">Fast Setup</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                    Powerful Features for Modern Publishers
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Everything you need to run professional news sites at scale.
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Multi-Tenant Architecture</h3>
                            <p class="text-gray-600">Isolate tenants, scale resources and manage multiple sites from a
                                single powerful application.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div
                    class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Custom Domains</h3>
                            <p class="text-gray-600">Use custom domains like <code
                                    class="px-2 py-1 bg-gray-100 rounded text-xs">abc.com</code> or <code
                                    class="px-2 py-1 bg-gray-100 rounded text-xs">xyz.com</code></p>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div
                    class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Real-time Dashboard</h3>
                            <p class="text-gray-600">Live analytics, traffic metrics and editorial workflow tools to keep
                                teams in perfect sync.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div
                    class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Unlimited Categories</h3>
                            <p class="text-gray-600">Structure content with unlimited taxonomies and publish without any
                                restrictions.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div
                    class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">SEO-Optimized</h3>
                            <p class="text-gray-600">Clean URLs, schema markup and blazing-fast performance to boost search
                                visibility.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div
                    class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Secure & Scalable</h3>
                            <p class="text-gray-600">Role-based access, automatic backups and horizontal scaling for
                                traffic spikes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS SECTION -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">How It Works</h2>
                <p class="text-xl text-gray-600">Get started in minutes with three simple steps.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                <!-- Connecting Line (Desktop) -->
                <div
                    class="hidden md:block absolute top-16 left-0 right-0 h-0.5 bg-gradient-to-r from-indigo-200 via-purple-200 to-indigo-200 z-0">
                </div>

                <!-- Step 1 -->
                <div
                    class="relative z-10 bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 text-center">
                    <div
                        class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-full flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                        1
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Create Account</h3>
                    <p class="text-gray-600">Sign up and claim your publisher workspace in seconds. No technical knowledge
                        required.</p>
                </div>

                <!-- Step 2 -->
                <div
                    class="relative z-10 bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 text-center">
                    <div
                        class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                        2
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Setup Brand</h3>
                    <p class="text-gray-600">Add logos, colors and connect a custom domain for your unique publication.</p>
                </div>

                <!-- Step 3 -->
                <div
                    class="relative z-10 bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 text-center">
                    <div
                        class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                        3
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Publish News</h3>
                    <p class="text-gray-600">Use the intuitive editor and publish stories that are fast to load and easy to
                        share.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PRICING SECTION -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Simple, Transparent Pricing</h2>
                <p class="text-xl text-gray-600">Choose the perfect plan for your publishing needs. Upgrade anytime.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Basic Plan -->
                <div
                    class="bg-white rounded-2xl border-2 border-gray-200 p-8 hover:border-indigo-200 transition-all duration-300">
                    <div class="text-sm font-bold text-gray-500 uppercase mb-4">Basic</div>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-5xl font-extrabold text-gray-900">$0</span>
                        <span class="text-gray-500">/month</span>
                    </div>
                    <p class="text-gray-600 mb-8">Perfect for hobby publishers and testing the platform.</p>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">Single tenant</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">Up to 100 articles</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">Basic analytics</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">Community support</span>
                        </li>
                    </ul>

                    <a href="{{ url('/register') }}"
                        class="block w-full text-center px-6 py-3 bg-gray-100 text-gray-900 font-semibold rounded-xl hover:bg-gray-200 transition-colors">
                        Start Free
                    </a>
                </div>

                <!-- Standard Plan (Featured) -->
                <div
                    class="relative bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl p-8 transform scale-105 shadow-2xl">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span
                            class="inline-block px-4 py-1 bg-yellow-400 text-yellow-900 text-xs font-bold uppercase rounded-full shadow-lg">
                            Most Popular
                        </span>
                    </div>

                    <div class="text-sm font-bold text-indigo-100 uppercase mb-4">Standard</div>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-5xl font-extrabold text-white">$29</span>
                        <span class="text-indigo-100">/month</span>
                    </div>
                    <p class="text-indigo-50 mb-8">Best for growing publications with multiple editors.</p>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-300 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-white">Up to 5 tenants</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-300 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-white">Unlimited articles</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-300 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-white">Custom domains</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-300 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-white">Priority support</span>
                        </li>
                    </ul>

                    <a href="{{ url('/register') }}"
                        class="block w-full text-center px-6 py-3 bg-white text-indigo-600 font-semibold rounded-xl hover:bg-gray-50 transition-colors shadow-lg">
                        Get Started
                    </a>
                </div>

                <!-- Premium Plan -->
                <div
                    class="bg-white rounded-2xl border-2 border-gray-200 p-8 hover:border-indigo-200 transition-all duration-300">
                    <div class="text-sm font-bold text-gray-500 uppercase mb-4">Premium</div>
                    <div class="flex items-baseline gap-2 mb-4">
                        <span class="text-5xl font-extrabold text-gray-900">$99</span>
                        <span class="text-gray-500">/month</span>
                    </div>
                    <p class="text-gray-600 mb-8">For high-traffic publishers needing enterprise features.</p>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">Unlimited tenants</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">Unlimited articles</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">Advanced analytics</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-700">Dedicated support</span>
                        </li>
                    </ul>

                    <a href="{{ url('/register') }}"
                        class="block w-full text-center px-6 py-3 bg-gray-900 text-white font-semibold rounded-xl hover:bg-gray-800 transition-colors">
                        Contact Sales
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- DEMO SECTION -->
    <section id="demo" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Live Demo Sites</h2>
                <p class="text-xl text-gray-600">Explore sample tenant sites demonstrating the platform in action.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @if (!empty($demoSites) && $demoSites->count() > 0)
                    @foreach ($demoSites as $demo)
                        @php
                            // Build an inline SVG data URI as a fallback background to avoid external placeholder services
                            $title = $demo['name'] ?? ($demo['domain'] ?? 'Demo Site');
                            $svg =
                                '<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="600"><defs><linearGradient id="g" x1="0" x2="1" y1="0" y2="1"><stop offset="0%" stop-color="#eef2ff"/><stop offset="100%" stop-color="#e9d5ff"/></linearGradient></defs><rect width="100%" height="100%" fill="url(%23g)"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="Arial, Helvetica, sans-serif" font-size="36" fill="#4f46e5">' .
                                e($title) .
                                '</text></svg>';
                            $bgData = 'data:image/svg+xml;utf8,' . rawurlencode($svg);
                        @endphp

                        <div
                            class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                            <div
                                class="relative h-64 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50 flex items-center justify-center">
                                <div class="w-full h-full bg-cover bg-center"
                                    style="background-image: url('{{ $bgData }}');">
                                </div>
                                <div
                                    class="absolute top-4 right-4 px-3 py-1 bg-green-500 text-white text-xs font-bold uppercase rounded-full shadow-lg flex items-center gap-1">
                                    <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                    Live
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-2 mb-3">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span
                                        class="text-xl font-bold text-gray-900">{{ $demo['domain'] ?? $demo['name'] }}</span>
                                </div>
                                <p class="text-gray-600 mb-4">
                                    {{ $demo['description'] ?? 'Sample tenant site demonstrating the platform.' }}</p>
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span
                                        class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">Demo</span>
                                </div>
                                @if (!empty($demo['domain']))
                                    <a href="{{ env('APP_ENV') === 'local' ? 'http://' . $demo['domain'] . ':8000' : 'http://' . $demo['domain'] }}"
                                        target="_blank"
                                        class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:gap-3 transition-all">Visit
                                        Demo Site
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback static demos -->
                    <div
                        class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                        <div class="relative h-64 overflow-hidden bg-gradient-to-br from-blue-100 to-indigo-100">
                            <img src="https://via.placeholder.com/1200x600/e0e7ff/6366f1?text=Prothomalo+Demo"
                                alt="Prothomalo Demo"
                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            <div
                                class="absolute top-4 right-4 px-3 py-1 bg-green-500 text-white text-xs font-bold uppercase rounded-full shadow-lg flex items-center gap-1">
                                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>Live
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3"><span
                                    class="text-xl font-bold text-gray-900">prothomalo.localhost</span></div>
                            <p class="text-gray-600 mb-4">A high-traffic Bengali news portal showcasing multimedia articles
                                and real-time updates.</p>
                            <a href="http://prothomalo.localhost" target="_blank"
                                class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:gap-3 transition-all">Visit
                                Demo Site</a>
                        </div>
                    </div>

                    <div
                        class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                        <div class="relative h-64 overflow-hidden bg-gradient-to-br from-purple-100 to-pink-100">
                            <img src="https://via.placeholder.com/1200x600/fce7f3/c026d3?text=Somoynews+Demo"
                                alt="Somoynews Demo"
                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            <div
                                class="absolute top-4 right-4 px-3 py-1 bg-green-500 text-white text-xs font-bold uppercase rounded-full shadow-lg flex items-center gap-1">
                                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>Live
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3"><span
                                    class="text-xl font-bold text-gray-900">somoynews.localhost</span></div>
                            <p class="text-gray-600 mb-4">Regional news platform featuring local stories and comprehensive
                                coverage.</p>
                            <a href="http://somoynews.localhost" target="_blank"
                                class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:gap-3 transition-all">Visit
                                Demo Site</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="py-20 bg-gradient-to-br from-indigo-600 to-purple-600">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-6">
                Ready to Launch Your News Portal?
            </h2>
            <p class="text-xl text-indigo-100 mb-8">
                Join hundreds of publishers who trust our platform to deliver news to millions of readers.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/tenant/register') }}"
                    class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-indigo-600 bg-white rounded-xl hover:bg-gray-50 transform hover:scale-105 transition-all duration-200 shadow-lg">
                    Start Free Trial
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
                <a href="{{ url('/demo') }}"
                    class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white border-2 border-white rounded-xl hover:bg-white hover:text-indigo-600 transition-all duration-200">
                    View Live Demos
                </a>
            </div>
        </div>
    </section>


@endsection
