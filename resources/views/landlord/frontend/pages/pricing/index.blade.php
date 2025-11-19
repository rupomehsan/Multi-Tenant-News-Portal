@extends('layouts.app')


@section('title', 'Pricing - News Portal SaaS')

@section('content')

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                Choose the right plan for your news portal
            </h1>
            <p class="mt-5 text-xl text-gray-500">
                Start building your professional news website today. All plans include our core features with different
                limits and capabilities.
            </p>
        </div>

        <div class="mt-16 grid gap-8 lg:grid-cols-3">
            <!-- Basic Plan -->
            <div class="bg-white rounded-lg shadow-lg divide-y divide-gray-200">
                <div class="p-6">
                    <h2 class="text-lg leading-6 font-medium text-gray-900">Basic</h2>
                    <p class="mt-4 text-sm text-gray-500">Perfect for small news websites and blogs</p>
                    <p class="mt-8">
                        <span class="text-4xl font-extrabold text-gray-900">$29</span>
                        <span class="text-base font-medium text-gray-500">/month</span>
                    </p>
                    <a href="{{ route('landlord.register') }}"
                        class="mt-8 block w-full bg-gray-800 border border-gray-800 rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-gray-900">
                        Get started
                    </a>
                </div>
                <div class="pt-6 pb-8 px-6">
                    <h3 class="text-xs font-medium text-gray-900 tracking-wide uppercase">What's included</h3>
                    <ul class="mt-6 space-y-4">
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Up to 1,000 articles</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">5 categories</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Basic analytics</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Email support</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Standard themes</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Premium Plan -->
            <div class="bg-white rounded-lg shadow-lg divide-y divide-gray-200 border-2 border-blue-500 relative">
                <div class="p-6">
                    <div
                        class="absolute top-0 right-0 -mr-1 -mt-1 w-32 h-8 bg-blue-500 rounded-bl-lg flex items-center justify-center">
                        <span class="text-xs font-medium text-white">Most Popular</span>
                    </div>
                    <h2 class="text-lg leading-6 font-medium text-gray-900">Premium</h2>
                    <p class="mt-4 text-sm text-gray-500">Ideal for growing news organizations</p>
                    <p class="mt-8">
                        <span class="text-4xl font-extrabold text-gray-900">$79</span>
                        <span class="text-base font-medium text-gray-500">/month</span>
                    </p>
                    <a href="{{ route('landlord.register') }}"
                        class="mt-8 block w-full bg-blue-600 border border-transparent rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-blue-700">
                        Get started
                    </a>
                </div>
                <div class="pt-6 pb-8 px-6">
                    <h3 class="text-xs font-medium text-gray-900 tracking-wide uppercase">What's included</h3>
                    <ul class="mt-6 space-y-4">
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Up to 10,000 articles</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Unlimited categories</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Advanced analytics</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Priority support</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Custom themes</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">API access</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Enterprise Plan -->
            <div class="bg-white rounded-lg shadow-lg divide-y divide-gray-200">
                <div class="p-6">
                    <h2 class="text-lg leading-6 font-medium text-gray-900">Enterprise</h2>
                    <p class="mt-4 text-sm text-gray-500">For large media organizations</p>
                    <p class="mt-8">
                        <span class="text-4xl font-extrabold text-gray-900">$199</span>
                        <span class="text-base font-medium text-gray-500">/month</span>
                    </p>
                    <a href="{{ route('landlord.register') }}"
                        class="mt-8 block w-full bg-gray-800 border border-gray-800 rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-gray-900">
                        Contact sales
                    </a>
                </div>
                <div class="pt-6 pb-8 px-6">
                    <h3 class="text-xs font-medium text-gray-900 tracking-wide uppercase">What's included</h3>
                    <ul class="mt-6 space-y-4">
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Unlimited articles</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Unlimited categories</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">White-label solution</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Dedicated support</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Custom development</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Advanced integrations</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="mt-16">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">Frequently Asked Questions</h2>
                <p class="mt-4 text-lg text-gray-500">Everything you need to know about our pricing and features</p>
            </div>

            <div class="mt-12 max-w-3xl mx-auto">
                <dl class="space-y-8">
                    <div>
                        <dt class="text-lg leading-6 font-medium text-gray-900">Can I change my plan later?</dt>
                        <dd class="mt-2 text-base text-gray-500">Yes, you can upgrade or downgrade your plan at any time.
                            Changes take effect immediately.</dd>
                    </div>
                    <div>
                        <dt class="text-lg leading-6 font-medium text-gray-900">What happens if I exceed my article limit?
                        </dt>
                        <dd class="mt-2 text-base text-gray-500">You'll be notified when approaching your limit. You can
                            upgrade your plan or contact us for a custom solution.</dd>
                    </div>
                    <div>
                        <dt class="text-lg leading-6 font-medium text-gray-900">Do you offer custom plans?</dt>
                        <dd class="mt-2 text-base text-gray-500">Yes, we offer custom enterprise plans for large
                            organizations. Contact our sales team for details.</dd>
                    </div>
                    <div>
                        <dt class="text-lg leading-6 font-medium text-gray-900">Is there a free trial?</dt>
                        <dd class="mt-2 text-base text-gray-500">We offer a 14-day free trial for all plans. No credit card
                            required to get started.</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection
