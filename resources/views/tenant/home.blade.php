@extends('tenant.layout')

@section('title', 'Home - ' . (tenant('name') ?? 'News Portal'))

@section('content')
    <!-- Breaking News Ticker -->
    <div class="bg-red-600 text-white py-2 mb-6 shadow-md">
        <div class="container mx-auto px-4 flex items-center">
            <span class="bg-white text-red-600 px-4 py-1 rounded-md font-bold text-sm mr-4 flex-shrink-0">BREAKING</span>
            <div class="overflow-hidden flex-1">
                <div class="animate-scroll whitespace-nowrap">
                    @if ($latestNews->count() > 0)
                        @foreach ($latestNews->take(3) as $news)
                            <span class="mx-8">{{ $news->title }}</span>
                        @endforeach
                    @else
                        <span class="mx-8">Stay tuned for breaking news updates...</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section with Featured News -->
    @if ($featuredNews->count() > 0)
        <section class="mb-12">
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Main Featured Article -->
                <article class="md:col-span-2 bg-white rounded-xl shadow-xl overflow-hidden group hover:shadow-2xl transition-all duration-300">
                    @if ($featuredNews[0]->featured_image)
                        <div class="relative overflow-hidden h-96">
                            <img src="{{ function_exists('global_asset') ? global_asset($featuredNews[0]->featured_image) : url($featuredNews[0]->featured_image) }}"
                                alt="{{ $featuredNews[0]->title }}"
                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-8">
                                <span class="inline-block px-4 py-2 bg-red-600 text-white rounded-full text-sm font-bold uppercase mb-4">
                                    {{ $featuredNews[0]->category->name }}
                                </span>
                                <h2 class="text-3xl md:text-4xl font-bold text-white mb-3 leading-tight">
                                    <a href="{{ route('tenant.news.public', $featuredNews[0]->slug) }}" class="hover:text-red-400 transition-colors">
                                        {{ $featuredNews[0]->title }}
                                    </a>
                                </h2>
                                @if ($featuredNews[0]->excerpt)
                                    <p class="text-gray-200 text-lg mb-4 line-clamp-2">{{ $featuredNews[0]->excerpt }}</p>
                                @endif
                                <div class="flex items-center text-white text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $featuredNews[0]->published_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @endif
                </article>

                <!-- Side Featured Articles -->
                <div class="space-y-6">
                    @foreach ($featuredNews->slice(1, 2) as $news)
                        <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            @if ($news->featured_image)
                                <div class="relative h-48 overflow-hidden">
                                    <img src="{{ function_exists('global_asset') ? global_asset($news->featured_image) : url($news->featured_image) }}"
                                        alt="{{ $news->title }}"
                                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                </div>
                            @endif
                            <div class="p-5">
                                <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold uppercase mb-2">
                                    {{ $news->category->name }}
                                </span>
                                <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 hover:text-blue-600 transition-colors">
                                    <a href="{{ route('tenant.news.public', $news->slug) }}">
                                        {{ $news->title }}
                                    </a>
                                </h3>
                                <span class="text-gray-500 text-xs flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $news->published_at->diffForHumans() }}
                                </span>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-12">
            <!-- Latest News Section -->
            <section>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 flex items-center gap-2">
                        <span class="w-1 h-8 bg-red-600 rounded-full"></span>
                        Latest News
                    </h2>
                    <a href="#" class="text-blue-600 hover:underline font-medium flex items-center gap-1">
                        View All
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                @if ($latestNews->count() > 0)
                    <div class="space-y-6">
                        @foreach ($latestNews as $news)
                            <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                                <div class="md:flex">
                                    @if ($news->featured_image)
                                        <div class="md:w-1/3 relative overflow-hidden">
                                            <img src="{{ function_exists('global_asset') ? global_asset($news->featured_image) : url($news->featured_image) }}"
                                                alt="{{ $news->title }}" 
                                                class="w-full h-64 md:h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                            <div class="absolute top-4 left-4">
                                                <span class="px-3 py-1 bg-{{ $news->category->color ?? 'blue' }}-600 text-white rounded-full text-xs font-bold uppercase shadow-lg">
                                                    {{ $news->category->name }}
                                                </span>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="p-6 {{ $news->featured_image ? 'md:w-2/3' : 'w-full' }} flex flex-col justify-between">
                                        <div>
                                            <div class="flex items-center gap-3 mb-3">
                                                @if (!$news->featured_image)
                                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold uppercase">
                                                        {{ $news->category->name }}
                                                    </span>
                                                @endif
                                                <span class="text-gray-500 text-sm flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                    </svg>
                                                    {{ $news->published_at->format('M d, Y') }}
                                                </span>
                                            </div>

                                            <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors leading-tight">
                                                <a href="{{ route('tenant.news.public', $news->slug) }}">
                                                    {{ $news->title }}
                                                </a>
                                            </h3>

                                            @if ($news->excerpt)
                                                <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3">{{ $news->excerpt }}</p>
                                            @endif
                                        </div>

                                        <a href="{{ route('tenant.news.public', $news->slug) }}"
                                            class="inline-flex items-center gap-2 text-blue-600 hover:gap-3 font-semibold transition-all group-hover:translate-x-1">
                                            Read Full Story
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white rounded-xl shadow-lg p-12 text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                        <h3 class="text-xl font-bold text-gray-700 mb-2">No News Available</h3>
                        <p class="text-gray-500">Check back later for the latest updates and stories.</p>
                    </div>
                @endif
            </section>
        </div>

        <!-- Sidebar -->
        <aside class="space-y-8">
            <!-- Categories Widget -->
            <div class="bg-white rounded-xl shadow-lg p-6 sticky top-6">
                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <span class="w-1 h-6 bg-blue-600 rounded-full"></span>
                    Categories
                </h3>
                <ul class="space-y-2">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('tenant.category.news', $category->slug) }}"
                                class="flex justify-between items-center p-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all group">
                                <span class="font-medium">{{ $category->name }}</span>
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-1 bg-gray-100 group-hover:bg-blue-100 text-gray-700 group-hover:text-blue-600 rounded-full text-xs font-bold transition-colors">
                                        {{ $category->news_count }}
                                    </span>
                                    <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Trending Widget -->
            <div class="bg-gradient-to-br from-red-50 to-orange-50 rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"/>
                    </svg>
                    Trending Now
                </h3>
                <ul class="space-y-4">
                    @foreach ($latestNews->take(5) as $index => $news)
                        <li class="flex gap-3">
                            <span class="flex-shrink-0 w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center font-bold text-sm">
                                {{ $index + 1 }}
                            </span>
                            <div>
                                <a href="{{ route('tenant.news.public', $news->slug) }}" class="text-gray-900 hover:text-red-600 font-medium line-clamp-2 transition-colors">
                                    {{ $news->title }}
                                </a>
                                <span class="text-xs text-gray-500 mt-1 block">{{ $news->published_at->diffForHumans() }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- About Widget -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">About Us</h3>
                <p class="text-gray-600 leading-relaxed text-sm mb-4">
                    Welcome to <strong>{{ tenant('name') ?? 'our news portal' }}</strong>. We bring you the latest news and updates
                    from around the world. Stay informed with our comprehensive coverage.
                </p>
                <div class="flex gap-3">
                    <a href="#" class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-red-600 text-white rounded-full flex items-center justify-center hover:bg-red-700 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Advertisement Placeholder -->
            <div class="bg-gray-100 rounded-xl p-8 text-center">
                <div class="text-gray-400 text-sm font-medium mb-2">Advertisement</div>
                <div class="bg-white rounded-lg h-64 flex items-center justify-center">
                    <span class="text-gray-400">300x250</span>
                </div>
            </div>
        </aside>
    </div>

    <style>
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        .animate-scroll {
            animation: scroll 30s linear infinite;
        }
    </style>
@endsection
