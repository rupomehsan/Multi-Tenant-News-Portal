@extends('layouts.app')

@section('title', 'Build Your Own News Portal Instantly')

@section('content')
    <main class="bg-gray-50 text-gray-900">
        @include('landlord.header')
        
        <!-- HERO -->
        <section class="relative overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-purple-50">
            <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
            <div class="max-w-7xl mx-auto px-6 lg:px-8 relative">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center py-24">
                    <div class="space-y-8">
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm font-medium">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            Trusted by 500+ Publishers
                        </div>
                        
                        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-gray-900 leading-tight">
                            Build Your Own 
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">News Portal</span>
                            Instantly
                        </h1>
                        
                        <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                            A powerful multi-tenant SaaS platform to launch and manage news websites. Fast, secure and SEO-friendly so your readers find you.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ url('/register') }}"
                                class="inline-flex items-center justify-center px-8 py-4 rounded-xl bg-indigo-600 text-white font-semibold shadow-lg hover:bg-indigo-700 hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                Start Free Trial
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                            <a href="#demo"
                                class="inline-flex items-center justify-center px-8 py-4 rounded-xl bg-white text-indigo-600 border-2 border-indigo-100 font-semibold shadow-md hover:shadow-lg hover:border-indigo-200 transition-all duration-200">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/>
                                </svg>
                                View Demo
                            </a>
                        </div>

                        <div class="flex items-center gap-8 pt-4">
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                7-day free trial
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                No credit card required
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-3xl transform rotate-3 opacity-10"></div>
                        <div class="relative rounded-3xl bg-white p-2 shadow-2xl">
                            <div class="rounded-2xl overflow-hidden bg-gradient-to-br from-indigo-600 to-purple-600 p-6">
                                <div class="flex items-center justify-between mb-6">
                                    <div>
                                        <div class="text-xs font-semibold uppercase tracking-wide text-indigo-200">Live Demo</div>
                                        <div class="mt-1 font-bold text-xl text-white">prothomalo.localhost</div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                        <span class="text-xs text-white">Live</span>
                                    </div>
                                </div>

                                <div class="bg-white rounded-xl p-3 shadow-lg">
                                    <img src="https://via.placeholder.com/800x450?text=Modern+News+Portal" 
                                         alt="news demo"
                                         class="w-full rounded-lg object-cover">
                                </div>

                                <div class="mt-4 flex items-center justify-between text-sm text-white">
                                    <span class="opacity-90">Modern, responsive templates</span>
                                    <span class="font-semibold">→</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Floating elements -->
                        <div class="absolute -top-4 -right-4 bg-white rounded-lg shadow-lg p-3 animate-bounce">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="text-xs font-semibold text-gray-700">Fast Setup</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FEATURES -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900">Powerful Features for Modern Publishers</h2>
                    <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">Everything you need to run professional news sites at scale.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature Card 1 -->
                    <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 p-4 bg-gradient-to-br from-indigo-500 to-indigo-600 text-white rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Multi-Tenant Architecture</h3>
                                <p class="text-gray-600 leading-relaxed">Isolate tenants, scale resources and manage multiple sites from a single powerful application.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 2 -->
                    <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 p-4 bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Custom Domains</h3>
                                <p class="text-gray-600 leading-relaxed">Use custom domains like <code class="px-2 py-1 bg-gray-100 rounded text-xs font-mono">prothomalo.localhost</code> or <code class="px-2 py-1 bg-gray-100 rounded text-xs font-mono">somoynews.localhost</code>.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 3 -->
                    <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 p-4 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Real-time Dashboard</h3>
                                <p class="text-gray-600 leading-relaxed">Live analytics, traffic metrics and editorial workflow tools to keep teams in perfect sync.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 4 -->
                    <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 p-4 bg-gradient-to-br from-green-500 to-green-600 text-white rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Unlimited Categories & Posts</h3>
                                <p class="text-gray-600 leading-relaxed">Structure content with unlimited taxonomies and publish without any restrictions.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 5 -->
                    <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 p-4 bg-gradient-to-br from-yellow-500 to-yellow-600 text-white rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">SEO-Optimized Structure</h3>
                                <p class="text-gray-600 leading-relaxed">Clean URLs, schema markup and blazing-fast performance to boost search visibility.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 6 -->
                    <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 p-4 bg-gradient-to-br from-red-500 to-red-600 text-white rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Secure & Scalable</h3>
                                <p class="text-gray-600 leading-relaxed">Role-based access, automatic backups and horizontal scaling for traffic spikes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- HOW IT WORKS -->
        <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="max-w-6xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900">How It Works</h2>
                    <p class="mt-4 text-xl text-gray-600">Get started in minutes with three simple steps.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                    <!-- Connecting lines (hidden on mobile) -->
                    <div class="hidden md:block absolute top-16 left-0 right-0 h-0.5 bg-gradient-to-r from-indigo-200 via-purple-200 to-indigo-200 z-0"></div>
                    
                    <!-- Step 1 -->
                    <div class="relative z-10 p-8 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                        <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-indigo-600 text-white text-2xl font-bold shadow-lg mb-6">
                            1
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Create an Account</h3>
                        <p class="text-gray-600 leading-relaxed">Sign up and claim your publisher workspace in seconds. No technical knowledge required.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative z-10 p-8 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                        <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-gradient-to-br from-purple-500 to-purple-600 text-white text-2xl font-bold shadow-lg mb-6">
                            2
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Setup Your Brand & Domain</h3>
                        <p class="text-gray-600 leading-relaxed">Add logos, colors and connect a custom domain for your unique publication.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative z-10 p-8 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                        <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 text-white text-2xl font-bold shadow-lg mb-6">
                            3
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Publish News Instantly</h3>
                        <p class="text-gray-600 leading-relaxed">Use the intuitive editor and publish stories that are fast to load and easy to share.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- PRICING -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900">Simple, Transparent Pricing</h2>
                    <p class="mt-4 text-xl text-gray-600">Choose the perfect plan for your publishing needs. Upgrade anytime.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Basic Plan -->
                    <div class="p-8 bg-white rounded-2xl shadow-md border-2 border-gray-200 hover:border-indigo-200 transition-all duration-300">
                        <div class="text-sm font-bold text-gray-500 uppercase tracking-wide">Basic</div>
                        <div class="mt-6 flex items-baseline gap-2">
                            <span class="text-5xl font-extrabold text-gray-900">$0</span>
                            <span class="text-lg text-gray-500">/month</span>
                        </div>
                        <p class="mt-4 text-gray-600">Perfect for hobby publishers and testing the platform.</p>

                        <ul class="mt-8 space-y-4">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">Single tenant</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">Up to 100 articles</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">Basic analytics</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">Community support</span>
                            </li>
                        </ul>

                        <a href="{{ url('/register') }}"
                            class="mt-8 block w-full text-center px-6 py-3 rounded-xl bg-gray-100 text-gray-900 font-semibold hover:bg-gray-200 transition-colors duration-200">
                            Start Free
                        </a>
                    </div>

                    <!-- Standard Plan (Featured) -->
                    <div class="relative p-8 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-xl transform scale-105 border-2 border-indigo-500">
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                            <span class="inline-block px-4 py-1 bg-yellow-400 text-yellow-900 text-xs font-bold uppercase rounded-full shadow-lg">
                                Most Popular
                            </span>
                        </div>
                        
                        <div class="text-sm font-bold text-indigo-100 uppercase tracking-wide">Standard</div>
                        <div class="mt-6 flex items-baseline gap-2">
                            <span class="text-5xl font-extrabold text-white">$29</span>
                            <span class="text-lg text-indigo-100">/month</span>
                        </div>
                        <p class="mt-4 text-indigo-50">Best for growing publications with multiple editors.</p>

                        <ul class="mt-8 space-y-4">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-300 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-white">Up to 5 tenants</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-300 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-white">Unlimited articles</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-300 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-white">Custom domains</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-300 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-white">Daily backups</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-300 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-white">Priority email support</span>
                            </li>
                        </ul>

                        <a href="{{ url('/register') }}"
                            class="mt-8 block w-full text-center px-6 py-3 rounded-xl bg-white text-indigo-600 font-semibold hover:bg-gray-50 shadow-lg transition-colors duration-200">
                            Get Started
                        </a>
                    </div>

                    <!-- Premium Plan -->
                    <div class="p-8 bg-white rounded-2xl shadow-md border-2 border-gray-200 hover:border-indigo-200 transition-all duration-300">
                        <div class="text-sm font-bold text-gray-500 uppercase tracking-wide">Premium</div>
                        <div class="mt-6 flex items-baseline gap-2">
                            <span class="text-5xl font-extrabold text-gray-900">$99</span>
                            <span class="text-lg text-gray-500">/month</span>
                        </div>
                        <p class="mt-4 text-gray-600">For high-traffic publishers needing enterprise features.</p>

                        <ul class="mt-8 space-y-4">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">Unlimited tenants</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">Unlimited articles</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">Advanced analytics</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">Dedicated support</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">SLA & uptime guarantees</span>
                            </li>
                        </ul>

                        <a href="{{ url('/register') }}"
                            class="mt-8 block w-full text-center px-6 py-3 rounded-xl bg-gray-900 text-white font-semibold hover:bg-gray-800 transition-colors duration-200">
                            Contact Sales
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- TENANT DEMO DOMAINS -->
        <section id="demo" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900">Live Demo Sites</h2>
                    <p class="mt-4 text-xl text-gray-600">Explore sample tenant sites demonstrating the platform in action.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Demo 1 -->
                    <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                        <div class="relative overflow-hidden">
                            <img src="https://via.placeholder.com/1200x600?text=Prothomalo+News+Portal" 
                                 alt="prothomalo demo"
                                 class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-4 right-4 px-3 py-1 bg-green-500 text-white text-xs font-bold uppercase rounded-full shadow-lg flex items-center gap-1">
                                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                Live
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-bold text-xl text-gray-900">prothomalo.localhost</span>
                            </div>
                            <p class="text-gray-600 mb-4">A high-traffic Bengali news portal showcasing multimedia articles, dynamic categories, and real-time updates.</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">Multi-Language</span>
                                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Breaking News</span>
                                <span class="px-3 py-1 bg-purple-100 text-purple-700 text-xs font-semibold rounded-full">Video Content</span>
                            </div>
                            <a href="http://prothomalo.localhost" target="_blank" rel="noopener"
                                class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:gap-3 transition-all">
                                Visit Demo Site
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Demo 2 -->
                    <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                        <div class="relative overflow-hidden">
                            <img src="https://via.placeholder.com/1200x600?text=Somoynews+Regional+Portal" 
                                 alt="somoynews demo"
                                 class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-4 right-4 px-3 py-1 bg-green-500 text-white text-xs font-bold uppercase rounded-full shadow-lg flex items-center gap-1">
                                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                Live
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-bold text-xl text-gray-900">somoynews.localhost</span>
                            </div>
                            <p class="text-gray-600 mb-4">Regional news platform featuring local stories, community updates, and comprehensive coverage across multiple categories.</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">Regional Focus</span>
                                <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">Live Updates</span>
                                <span class="px-3 py-1 bg-indigo-100 text-indigo-700 text-xs font-semibold rounded-full">Social Integration</span>
                            </div>
                            <a href="http://somoynews.localhost" target="_blank" rel="noopener"
                                class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:gap-3 transition-all">
                                Visit Demo Site
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- TESTIMONIALS -->
        <section class="py-12">
            <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">
                <h2 class="text-2xl font-semibold">What publishers say</h2>
                <p class="mt-2 text-gray-600">Real feedback from teams using the platform.</p>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="p-6 bg-white rounded-xl shadow-sm text-left">
                        <p class="text-gray-700">“We launched multiple local sites in a week. Editors love the simple
                            workflow.”</p>
                        <div class="mt-4 font-medium">— A. Rahman, Editor-in-Chief</div>
                    </div>

                    <div class="p-6 bg-white rounded-xl shadow-sm text-left">
                        <p class="text-gray-700">“Performance is excellent even during peak traffic. Seamless scaling.”</p>
                        <div class="mt-4 font-medium">— L. Gomez, CTO</div>
                    </div>

                    <div class="p-6 bg-white rounded-xl shadow-sm text-left">
                        <p class="text-gray-700">“Custom domains worked out of the box and our brand migrated quickly.”</p>
                        <div class="mt-4 font-medium">— R. Saha, Product Manager</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="bg-gray-800 text-gray-200">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="text-white font-bold text-lg">NewsPortal</div>
                    <p class="mt-3 text-sm text-gray-300">Launch and manage news websites with confidence. Trusted by
                        publishers.</p>
                </div>

                <div>
                    <div class="font-semibold">Product</div>
                    <ul class="mt-3 space-y-2 text-sm text-gray-300">
                        <li><a href="#" class="hover:underline">Features</a></li>
                        <li><a href="#pricing" class="hover:underline">Pricing</a></li>
                        <li><a href="#demo" class="hover:underline">Demos</a></li>
                        <li><a href="#" class="hover:underline">Integrations</a></li>
                    </ul>
                </div>

                <div>
                    <div class="font-semibold">Company</div>
                    <ul class="mt-3 space-y-2 text-sm text-gray-300">
                        <li><a href="#about" class="hover:underline">About</a></li>
                        <li><a href="#" class="hover:underline">Careers</a></li>
                        <li><a href="#" class="hover:underline">Press</a></li>
                        <li><a href="#" class="hover:underline">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <div class="font-semibold">Resources</div>
                    <ul class="mt-3 space-y-2 text-sm text-gray-300">
                        <li><a href="#" class="hover:underline">Documentation</a></li>
                        <li><a href="#" class="hover:underline">Blog</a></li>
                        <li><a href="#" class="hover:underline">Status</a></li>
                        <li><a href="#" class="hover:underline">Support</a></li>
                    </ul>
                    <div class="mt-4 text-sm text-gray-300">
                        <div>support@newsportal.example</div>
                        <div class="mt-1">+1 (555) 123-4567</div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4 text-sm text-gray-400">© {{ date('Y') }} NewsPortal.
                    All rights reserved.</div>
            </div>
        </footer>
    </main>
@endsection
