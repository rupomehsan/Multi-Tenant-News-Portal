   <!-- NAVIGATION -->
   <header class="bg-white shadow-sm">
       <!-- Top Bar -->
       <div class="bg-gray-900 text-white py-2">
           <div class="container mx-auto px-4 flex justify-between items-center text-sm">
               <div class="flex items-center gap-6">
                   <div class="flex items-center gap-2">
                       <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                           <path fill-rule="evenodd"
                               d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                               clip-rule="evenodd" />
                       </svg>
                       <span>{{ date('l, F d, Y') }}</span>
                   </div>
                   <div class="hidden md:flex items-center gap-2">
                       <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                           <path fill-rule="evenodd"
                               d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                               clip-rule="evenodd" />
                       </svg>
                       <span>{{ date('h:i A') }}</span>
                   </div>
               </div>
               <div class="flex items-center gap-4">
                   <a href="#" class="hover:text-blue-400 transition-colors">About</a>
                   <a href="#" class="hover:text-blue-400 transition-colors">Contact</a>
                   @auth
                       <a href="{{ url('/admin/dashboard') }}" class="hover:text-blue-400 transition-colors">Dashboard</a>
                   @else
                       <a href="{{ url('/admin/login') }}" class="hover:text-blue-400 transition-colors">Login</a>
                   @endauth
               </div>
           </div>
       </div>

       <!-- Main Navigation -->
       <nav class="bg-white shadow-lg sticky top-0 z-50">
           <div class="container mx-auto px-4">
               <div class="flex justify-between items-center py-4">
                   <!-- Logo -->
                   <div class="flex items-center space-x-4">
                       <a href="{{ url('/') }}" class="flex items-center gap-3">
                           <div
                               class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg">
                               {{ substr(tenant('name') ?? 'N', 0, 1) }}
                           </div>
                           <div>
                               <h1 class="text-2xl font-bold text-gray-900">
                                   {{ tenant('name') ?? 'News Portal' }}
                               </h1>
                               <p class="text-xs text-gray-500">Your trusted source for news</p>
                           </div>
                       </a>
                   </div>

                   <!-- Desktop Navigation -->
                   <div class="hidden lg:flex items-center space-x-8">
                       <a href="{{ url('/') }}"
                           class="text-gray-700 hover:text-blue-600 font-medium transition-colors border-b-2 border-transparent hover:border-blue-600 py-1">
                           Home
                       </a>
                       @foreach (\App\Models\Category::active()->take(6)->get() as $category)
                           <a href="{{ url('/category/' . $category->slug) }}"
                               class="text-gray-700 hover:text-blue-600 font-medium transition-colors border-b-2 border-transparent hover:border-blue-600 py-1">
                               {{ $category->name }}
                           </a>
                       @endforeach
                   </div>

                   <!-- Search -->
                   <div class="flex items-center gap-4">
                       <form action="{{ url('/search') }}" method="GET" class="hidden md:block">
                           <div class="relative">
                               <input type="text" name="q" placeholder="Search news..."
                                   class="pl-10 pr-4 py-2 border-2 border-gray-200 rounded-full text-sm focus:outline-none focus:border-blue-500 w-64 transition-all">
                               <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none"
                                   stroke="currentColor" viewBox="0 0 24 24">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                       d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                               </svg>
                           </div>
                       </form>

                       <!-- Mobile Menu Button -->
                       <button id="mobile-menu-button" class="lg:hidden p-2 rounded-md hover:bg-gray-100">
                           <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                   d="M4 6h16M4 12h16M4 18h16" />
                           </svg>
                       </button>
                   </div>
               </div>

               <!-- Mobile Menu -->
               <div id="mobile-menu" class="hidden lg:hidden pb-4 border-t">
                   <div class="space-y-2 mt-4">
                       <a href="{{ url('/') }}"
                           class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                           Home
                       </a>
                       @foreach (\App\Models\Category::active()->take(6)->get() as $category)
                           <a href="{{ url('/category/' . $category->slug) }}"
                               class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                               {{ $category->name }}
                           </a>
                       @endforeach
                       <form action="{{ url('/search') }}" method="GET" class="px-4 pt-2">
                           <input type="text" name="q" placeholder="Search news..."
                               class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                       </form>
                   </div>
               </div>
           </div>
       </nav>
   </header>
