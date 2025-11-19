@extends('tenant.layout')

@section('title', $news->title . ' - ' . (tenant('name') ?? 'News Portal'))

@section('content')
    <div class="max-w-4xl mx-auto">
        <article class="bg-white rounded-lg shadow overflow-hidden">
            <header class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <a href="{{ url('/category/' . $news->category->slug) }}"
                            class="inline-flex items-center px-3 py-1 rounded-full bg-gray-100 text-sm text-gray-700">{{ $news->category->name }}</a>
                        @if ($news->is_published)
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Published</span>
                        @else
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Draft</span>
                        @endif
                    </div>
                    <time
                        class="text-sm text-gray-500">{{ $news->published_at ? $news->published_at->format('M d, Y') : $news->created_at->format('M d, Y') }}</time>
                </div>

                <h1 class="text-3xl font-extrabold text-gray-900">{{ $news->title }}</h1>

                <div class="mt-3 text-sm text-gray-600">
                    By <span class="font-medium">{{ $news->user->name }}</span>
                    @if ($news->tags && count($news->tags) > 0)
                        · Tags: {{ implode(', ', $news->tags) }}
                    @endif
                </div>
            </header>

            @if ($news->featured_image)
                <div class="p-6 border-b border-gray-200">
                    @php $publicPath = public_path($news->featured_image); @endphp
                    @if (file_exists($publicPath))
                        <img src="{{ function_exists('global_asset') ? global_asset($news->featured_image) : url($news->featured_image) }}"
                            alt="{{ $news->title }}" class="w-full max-h-96 object-cover rounded-lg">
                    @else
                        <div class="w-full h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                            <div class="text-sm text-gray-500">Image not available</div>
                        </div>
                    @endif
                </div>
            @endif

            <div class="p-6 prose max-w-none">
                {!! nl2br(e($news->content)) !!}
            </div>

            <footer class="p-6 border-t border-gray-100 bg-gray-50">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-600">Share this article</div>
                    <div class="flex items-center gap-2">
                        <a href="#" class="text-blue-600 hover:underline">Twitter</a>
                        <a href="#" class="text-blue-600 hover:underline">Facebook</a>
                    </div>
                </div>
            </footer>
        </article>

        @if (isset($relatedNews) && $relatedNews->count() > 0)
            <section class="mt-8">
                <h3 class="text-xl font-semibold mb-4">Related Articles</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($relatedNews as $item)
                        <a href="{{ url('/news/' . $item->slug) }}"
                            class="block bg-white rounded-lg shadow p-4 hover:shadow-md">
                            <h4 class="font-medium text-gray-900">{{ $item->title }}</h4>
                            <div class="mt-2 text-sm text-gray-600">
                                {{ Str::limit($item->excerpt ?? strip_tags($item->content), 120) }}</div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
@endsection
