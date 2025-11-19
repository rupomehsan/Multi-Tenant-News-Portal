@extends('tenant.layout')

@section('title', $query . ' - ' . (tenant('name') ?? 'News Portal'))

@section('content')
    <!-- Category Header -->
    <h3>Search Results for "{{ $query }}"</h3>
    <!-- News Articles -->
    @if ($news->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach ($news as $article)
                <article class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition-shadow">
                    @if ($article->featured_image)
                        <img src="{{ function_exists('global_asset') ? global_asset($article->featured_image) : url($article->featured_image) }}"
                            alt="{{ $article->title }}" class="w-full h-48 object-cover">
                    @endif

                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-3">
                            <span
                                class="bg-{{ $article->category?->color ?? 'blue' }}-100 text-{{ $article->category?->color ?? 'blue' }}-800 px-2 py-1 rounded text-xs font-semibold">
                                {{ $article->category?->name }}
                            </span>
                            <span class="text-gray-500 text-sm">{{ $article->published_at->diffForHumans() }}</span>
                        </div>

                        <h2 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('tenant.news.public', $article->slug) }}" class="hover:text-blue-600">
                                {{ $article->title }}
                            </a>
                        </h2>

                        @if ($article->excerpt)
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $article->excerpt }}</p>
                        @endif

                        <a href="{{ route('tenant.news.public', $article->slug) }}"
                            class="text-blue-600 hover:underline font-medium text-sm">Read more →</a>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="bg-white rounded-lg shadow p-6">
            {{ $news->links() }}
        </div>
    @else
        <div class="bg-white rounded-lg shadow p-12 text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">No Articles Found</h2>
            <p class="text-gray-600 mb-6">There are no published articles in this category yet.</p>
            <a href="{{ url('/') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Back to Home
            </a>
        </div>
    @endif
@endsection
