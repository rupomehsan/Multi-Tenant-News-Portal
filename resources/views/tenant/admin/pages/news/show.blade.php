@extends('tenant.admin.layouts.index')

@section('title', $news->title . ' - ' . (tenant('name') ?? 'News Portal') . ' Admin')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Article Details</h1>
            <div class="flex space-x-3">
                <a href="{{ route('tenant.news.edit', $news) }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Edit Article
                </a>
                <a href="{{ route('tenant.news.index') }}"
                    class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                    Back to Articles
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Article Header -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <span
                            class="bg-{{ $news->category->color ?? 'blue' }}-100 text-{{ $news->category->color ?? 'blue' }}-800 px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $news->category->name }}
                        </span>
                        @if ($news->is_published)
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Published
                            </span>
                        @else
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Draft
                            </span>
                        @endif
                    </div>
                    <div class="text-sm text-gray-500">
                        Created: {{ $news->created_at->format('M d, Y H:i') }}
                        @if ($news->published_at)
                            | Published: {{ $news->published_at->format('M d, Y H:i') }}
                        @endif
                    </div>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $news->title }}</h2>

                <div class="flex items-center space-x-4 text-sm text-gray-600">
                    <span>By: {{ $news->user->name }}</span>
                    @if ($news->tags && count($news->tags) > 0)
                        <span>Tags: {{ implode(', ', $news->tags) }}</span>
                    @endif
                </div>
            </div>

            <!-- Featured Image -->
            @if ($news->featured_image)
                <div class="p-6 border-b border-gray-200">
                    @php
                        $publicPath = public_path($news->featured_image);
                        // @dd($news->featured_image)
                    @endphp

                    @if (file_exists($publicPath))
                        <img src="{{ function_exists('global_asset') ? global_asset($news->featured_image) : url($news->featured_image) }}"
                            alt="{{ $news->title }}" class="w-full max-h-96 object-cover rounded-lg">
                    @else
                        <div class="w-full h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                            <div class="text-sm text-gray-500">Image not found: <span
                                    class="font-mono">{{ $news->featured_image }}</span></div>
                        </div>
                    @endif
                </div>
            @endif

            <!-- Excerpt -->
            @if ($news->excerpt)
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Excerpt</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $news->excerpt }}</p>
                </div>
            @endif

            <!-- Content -->
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Content</h3>
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($news->content)) !!}
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-6 flex justify-center space-x-3">
            <a href="{{ route('tenant.news.edit', $news) }}"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Edit Article
            </a>
            <form method="POST" action="{{ route('tenant.news.destroy', $news) }}" class="inline"
                onsubmit="return confirm('Are you sure you want to delete this article?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">
                    Delete Article
                </button>
            </form>
        </div>
    </div>
@endsection
