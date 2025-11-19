   <!-- NAVIGATION -->
   <header class="bg-white shadow-sm">
       <div class="max-w-7xl mx-auto px-6 lg:px-8">
           <div class="flex items-center justify-between h-16">
               <a href="{{ url('/') }}" class="flex items-center gap-3">
                   {{-- <img src="https://via.placeholder.com/40x40?text=N" alt="NewsPortal" class="h-10 w-10 rounded"> --}}
                   <div
                       class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold shadow-lg">
                       N
                   </div>
                   <span class="font-bold text-lg text-gray-900">NewsPortal</span>
               </a>

               <nav class="hidden md:flex items-center gap-6">
                   <a href="{{ url('/') }}" class="text-gray-700 hover:text-indigo-600">Home</a>
                   <a href="pricing" class="text-gray-700 hover:text-indigo-600">Pricing</a>
                   <a href="demo" class="text-gray-700 hover:text-indigo-600">Demos</a>
                   <a href="about" class="text-gray-700 hover:text-indigo-600">About</a>
                   <a href="contact" class="text-gray-700 hover:text-indigo-600">Contact</a>
               </nav>

               <div class="hidden md:flex items-center gap-3">
                   <a href="{{ url('landlord/login') }}" class="text-sm text-gray-700 hover:text-indigo-600">Login</a>
                   <a href="{{ url('tenant/register') }}"
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md text-sm">Get
                       Started</a>
               </div>

               <div class="md:hidden">
                   <details class="relative inline-block">
                       <summary class="list-none cursor-pointer p-2 rounded-md bg-gray-100">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none"
                               viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                   d="M4 6h16M4 12h16M4 18h16" />
                           </svg>
                       </summary>
                       <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg p-3 z-50">
                           <a href="{{ url('/') }}"
                               class="block px-2 py-1 text-gray-700 hover:bg-gray-50 rounded">Home</a>
                           <a href="#pricing" class="block px-2 py-1 text-gray-700 hover:bg-gray-50 rounded">Pricing</a>
                           <a href="#demo" class="block px-2 py-1 text-gray-700 hover:bg-gray-50 rounded">Demos</a>
                           <a href="#about" class="block px-2 py-1 text-gray-700 hover:bg-gray-50 rounded">About</a>
                           <a href="#contact" class="block px-2 py-1 text-gray-700 hover:bg-gray-50 rounded">Contact</a>
                           <div class="border-t my-2"></div>
                           <a href="{{ url('landlord/login') }}"
                               class="block px-2 py-1 text-gray-700 hover:bg-gray-50 rounded">Loginasf</a>
                           <a href="{{ url('landlord/register') }}"
                               class="block px-2 py-1 text-white bg-indigo-600 text-center rounded">Get Started</a>
                       </div>
                   </details>
               </div>
           </div>
       </div>
   </header>
