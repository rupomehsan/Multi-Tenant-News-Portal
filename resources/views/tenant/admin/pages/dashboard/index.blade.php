@php
    // Prefer controller-provided $domain, fallback to tenant() helper or domains relation
    $primaryDomain = $domain ?? (tenant('domain') ?? (optional(tenant())->domains->first()->domain ?? null));
    $portSuffix = app()->environment('local') ? ':8000' : '';
@endphp
@extends('tenant.admin.layouts.index')

@section('title', ' Dashboard -' . $primaryDomain)

@section('content')
    <div class="bg-white shadow rounded-lg p-6">



        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard - {{ tenant('name') ?? 'News Portal' }} -
            @if ($primaryDomain)
                <a class="text-indigo-600 hover:underline" target="_blank"
                    href="http://{{ $primaryDomain }}{{ $portSuffix }}">Visit site ({{ $primaryDomain }})</a>
            @else
                <span class="text-gray-500">No domain configured</span>
            @endif
        </h1>

        <div class="grid gap-6 md:grid-cols-3 mb-8">
            <div class="bg-blue-50 rounded-md p-4">
                <p class="text-sm text-blue-800 uppercase">Total Articles</p>
                <p class="text-3xl font-bold text-blue-900">{{ $totalNews }}</p>
            </div>
            <div class="bg-green-50 rounded-md p-4">
                <p class="text-sm text-green-800 uppercase">Published Articles</p>
                <p class="text-3xl font-bold text-green-900">{{ $publishedNews }}</p>
            </div>
            <div class="bg-purple-50 rounded-md p-4">
                <p class="text-sm text-purple-800 uppercase">Categories</p>
                <p class="text-3xl font-bold text-purple-900">{{ $totalCategories }}</p>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div class="bg-gray-50 rounded-md p-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-3">Recent Articles</h2>
                <ul class="space-y-3">
                    @forelse($recentNews ?? [] as $news)
                        <li class="flex justify-between items-center">
                            <span class="text-gray-800">{{ $news->title }}</span>
                            <span class="text-sm text-gray-500">{{ $news->created_at->diffForHumans() }}</span>
                        </li>
                    @empty
                        <li class="text-gray-500 text-sm">No recent articles yet.</li>
                    @endforelse
                </ul>
            </div>

            <div class="bg-gray-50 rounded-md p-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-3">Popular Categories</h2>
                <ul class="space-y-3">
                    @forelse($popularCategories ?? [] as $category)
                        <li class="flex justify-between items-center">
                            <span class="text-gray-800">{{ $category->name }}</span>
                            <span class="text-sm text-gray-500">{{ $category->news_count ?? 0 }} articles</span>
                        </li>
                    @empty
                        <li class="text-gray-500 text-sm">No categories available.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
