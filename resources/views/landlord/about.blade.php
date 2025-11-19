@extends('layouts.app')
@section('title', 'About Us - News Portal SaaS')

@section('content')
    @include('landlord.header')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                Empowering News Organizations Worldwide
            </h1>
            <p class="mt-5 max-w-xl mx-auto text-xl text-gray-500">
                We're building the future of digital journalism with our multi-tenant news portal platform that scales with
                your success.
            </p>
        </div>

        <!-- Mission Section -->
        <div class="mt-16">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900">Our Mission</h2>
                    <p class="mt-3 text-lg text-gray-500">
                        To democratize professional journalism by providing powerful, scalable news publishing tools that
                        enable organizations of all sizes to deliver high-quality content to their audiences.
                    </p>
                    <div class="mt-8">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Lightning Fast</h4>
                                <p class="mt-2 text-gray-500">Our platform delivers blazing-fast performance with global CDN
                                    and optimized databases.</p>
                            </div>
                        </div>
                        <div class="mt-10 flex">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Secure & Reliable</h4>
                                <p class="mt-2 text-gray-500">Enterprise-grade security with 99.9% uptime SLA and
                                    comprehensive backup systems.</p>
                            </div>
                        </div>
                        <div class="mt-10 flex">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">User-Friendly</h4>
                                <p class="mt-2 text-gray-500">Intuitive interface designed for journalists, editors, and
                                    content managers.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 lg:mt-0">
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Why Choose Our Platform?</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="ml-3 text-gray-600">Multi-tenant architecture for complete data
                                    isolation</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="ml-3 text-gray-600">Domain-based tenant routing for seamless user
                                    experience</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="ml-3 text-gray-600">Advanced content management with rich text editing</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="ml-3 text-gray-600">SEO optimization tools and social media integration</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="ml-3 text-gray-600">Real-time analytics and performance monitoring</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="ml-3 text-gray-600">24/7 technical support and regular platform updates</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="mt-16">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">Meet Our Team</h2>
                <p class="mt-4 text-lg text-gray-500">Passionate professionals dedicated to revolutionizing digital
                    journalism</p>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-3">
                <div class="text-center">
                    <div class="mx-auto h-24 w-24 rounded-full bg-gray-300 flex items-center justify-center">
                        <svg class="h-12 w-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Sarah Johnson</h3>
                    <p class="text-sm text-gray-500">CEO & Co-Founder</p>
                    <p class="mt-2 text-sm text-gray-600">Former editor-in-chief with 15+ years in digital media</p>
                </div>

                <div class="text-center">
                    <div class="mx-auto h-24 w-24 rounded-full bg-gray-300 flex items-center justify-center">
                        <svg class="h-12 w-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Michael Chen</h3>
                    <p class="text-sm text-gray-500">CTO & Co-Founder</p>
                    <p class="mt-2 text-sm text-gray-600">Full-stack developer specializing in scalable web architectures
                    </p>
                </div>

                <div class="text-center">
                    <div class="mx-auto h-24 w-24 rounded-full bg-gray-300 flex items-center justify-center">
                        <svg class="h-12 w-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Emily Rodriguez</h3>
                    <p class="text-sm text-gray-500">Head of Product</p>
                    <p class="mt-2 text-sm text-gray-600">Product strategist focused on user experience and innovation</p>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="mt-16 bg-blue-50 rounded-lg p-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">Our Impact</h2>
                <p class="mt-4 text-lg text-gray-500">Numbers that speak to our commitment to digital journalism</p>
            </div>

            <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600">{{ number_format(\App\Models\Tenant::count()) }}</div>
                    <div class="mt-2 text-sm text-gray-600">News Portals Created</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600">10,000+</div>
                    <div class="mt-2 text-sm text-gray-600">Articles Published</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600">99.9%</div>
                    <div class="mt-2 text-sm text-gray-600">Uptime SLA</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600">24/7</div>
                    <div class="mt-2 text-sm text-gray-600">Support Available</div>
                </div>
            </div>
        </div>
    </div>
@endsection
