@extends('tenant.layout')

@section('title', 'Home - ' . (tenant('name') ?? 'News Portal'))

@section('content')
    <!-- Hero Section with Featured News -->
    <section class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
        @if ($featuredNews->count() > 0)
            <div class="grid md:grid-cols-3 gap-6 p-6">
                @foreach ($featuredNews as $index => $news)
                    <article class="{{ $index === 0 ? 'md:col-span-2' : '' }}">
                        @if ($news->featured_image)
                            <img src="{{ function_exists('global_asset') ? global_asset($news->featured_image) : url($news->featured_image) }}"
                                alt="{{ $news->title }}"
                                class="w-full {{ $index === 0 ? 'h-64' : 'h-40' }} object-cover rounded-lg mb-4">
                        @endif

                        <div class="flex items-center space-x-2 mb-2">
                            <span
                                class="bg-{{ $news->category->color ?? 'blue' }}-100 text-{{ $news->category->color ?? 'blue' }}-800 px-2 py-1 rounded text-xs font-semibold">
                                {{ $news->category->name }}
                            </span>
                            <span class="text-gray-500 text-sm">{{ $news->published_at->diffForHumans() }}</span>
                        </div>

                        <h2 class="{{ $index === 0 ? 'text-2xl' : 'text-lg' }} font-bold text-gray-900 mb-2">
                            <a href="{{ route('tenant.news.public', $news->slug) }}" class="hover:text-blue-600">
                                {{ $news->title }}
                            </a>
                        </h2>

                        @if ($news->excerpt)
                            <p class="text-gray-600 {{ $index === 0 ? '' : 'text-sm' }} line-clamp-3">
                                {{ $news->excerpt }}
                            </p>
                        @endif
                    </article>
                @endforeach
            </div>
        @else
            <div class="p-12 text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Welcome to {{ tenant('name') ?? 'Your News Portal' }}
                </h2>
                <p class="text-gray-600">No news articles published yet. Check back later for updates!</p>
            </div>
        @endif
    </section>

    <div class="grid md:grid-cols-3 gap-8">
        <!-- Latest News -->
        <div class="md:col-span-2">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Latest News</h2>

            @if ($latestNews->count() > 0)
                <div class="space-y-6">
                    @foreach ($latestNews as $news)
                        <article class="bg-white rounded-lg shadow overflow-hidden">
                            <div class="md:flex">
                                @if ($news->featured_image)
                                    <div class="md:w-1/3">
                                        <img src="{{ function_exists('global_asset') ? global_asset($news->featured_image) : url($news->featured_image) }}"
                                            alt="{{ $news->title }}" class="w-full h-48 md:h-full object-cover">
                                    </div>
                                @endif

                                <div class="p-6 {{ $news->featured_image ? 'md:w-2/3' : 'w-full' }}">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-semibold">
                                            {{ $news->category->name }}
                                        </span>
                                        <span
                                            class="text-gray-500 text-sm">{{ $news->published_at->format('M d, Y') }}</span>
                                    </div>

                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                        <a href="{{ route('tenant.news.public', $news->slug) }}"
                                            class="hover:text-blue-600">
                                            {{ $news->title }}
                                        </a>
                                    </h3>

                                    @if ($news->excerpt)
                                        <p class="text-gray-600 mb-3">{{ Str::limit($news->excerpt, 120) }}</p>
                                    @endif

                                    <a href="{{ route('tenant.news.public', $news->slug) }}"
                                        class="text-blue-600 hover:underline font-medium">Read more →</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-lg shadow p-8 text-center">
                    <p class="text-gray-600">No news articles available.</p>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <aside class="space-y-6">
            <!-- Categories -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Categories</h3>
                <ul class="space-y-2">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('tenant.category.news', $category->slug) }}"
                                class="flex justify-between items-center text-gray-600 hover:text-blue-600 py-2">
                                <span>{{ $category->name }}</span>
                                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">
                                    {{ $category->news_count }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- About Section -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">About Us</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Welcome to {{ tenant('name') ?? 'our news portal' }}. We bring you the latest news and updates
                    from around the world. Stay informed with our comprehensive coverage.
                </p>
            </div>
        </aside>
    </div>
@endsection
