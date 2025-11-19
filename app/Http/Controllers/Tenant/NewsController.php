<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    protected $baseRouteAdmin = 'tenant.admin.pages.news.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with(['category', 'user'])->latest()->paginate(15);
        return view($this->baseRouteAdmin . 'index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::active()->get();
        return view($this->baseRouteAdmin . 'create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|max:2048',
            'tags' => 'nullable|array',
            'is_published' => 'boolean',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = Auth::id();

        if ($request->is_published) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            // Save directly into public/news so images are accessible under /news/filename
            $file->move(public_path('news'), $filename);
            $data['featured_image'] = 'news/' . $filename;
        }

        // dd($data);

        News::create($data);

        return redirect()->route($this->baseRouteAdmin . 'index')
            ->with('success', 'News article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $news->load(['category', 'user']);
        return view($this->baseRouteAdmin . 'show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::active()->get();
        return view($this->baseRouteAdmin . 'edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|max:2048',
            'tags' => 'nullable|array',
            'is_published' => 'boolean',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->is_published && !$news->is_published) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            // Remove old image if it exists in public
            if ($news->featured_image && file_exists(public_path($news->featured_image))) {
                @unlink(public_path($news->featured_image));
            }

            $file = $request->file('featured_image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('news'), $filename);
            $data['featured_image'] = 'news/' . $filename;
        }

        $news->update($data);

        return redirect()->route($this->baseRouteAdmin . 'index')
            ->with('success', 'News article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        // Remove image file if stored in public
        if ($news->featured_image && file_exists(public_path($news->featured_image))) {
            @unlink(public_path($news->featured_image));
        }

        $news->delete();

        return redirect()->route($this->baseRouteAdmin . 'index')
            ->with('success', 'News article deleted successfully!');
    }
}
