  <aside class="w-64 bg-white rounded-lg shadow p-4 sticky top-6 h-[80vh] overflow-auto">
      <div class="mb-6">
          <div class="text-sm text-gray-500 uppercase">Admin</div>
          <div class="text-lg font-semibold">{{ tenant('name') ?? 'Publisher' }}</div>
      </div>

      <nav class="space-y-2">
          <a href="{{ url('/admin/dashboard') }}"
              class="block px-3 py-2 rounded hover:bg-gray-50 {{ request()->is('admin/dashboard') ? 'bg-gray-100 font-medium' : 'text-gray-700' }}">Dashboard</a>

          <div class="mt-3 text-xs text-gray-400 uppercase">Content</div>
          <a href="{{ route('tenant.news.index') }}"
              class="block px-3 py-2 rounded hover:bg-gray-50 {{ request()->is('admin/news*') ? 'bg-gray-100 font-medium' : 'text-gray-700' }}">All
              News</a>
          <a href="{{ route('tenant.news.create') }}"
              class="block px-3 py-2 rounded hover:bg-gray-50 text-gray-700">Create News</a>

          <div class="mt-3 text-xs text-gray-400 uppercase">Taxonomy</div>
          <a href="{{ route('tenant.categories.index') }}"
              class="block px-3 py-2 rounded hover:bg-gray-50 {{ request()->is('admin/categories*') ? 'bg-gray-100 font-medium' : 'text-gray-700' }}">Categories</a>
          <a href="{{ route('tenant.categories.create') }}"
              class="block px-3 py-2 rounded hover:bg-gray-50 text-gray-700">Create Category</a>

          <div class="mt-3 text-xs text-gray-400 uppercase">Account</div>
          <a href="#" class="block px-3 py-2 rounded hover:bg-gray-50 text-gray-700">Profile</a>
          <form method="POST" action="{{ route('tenant.logout') }}">
              @csrf
              <button type="submit"
                  class="w-full text-left px-3 py-2 rounded hover:bg-gray-50 text-red-600">Logout</button>
          </form>
      </nav>
  </aside>
