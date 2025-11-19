<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the tenant's home page with latest news
     */
    public function index()
    {
        $featuredNews = News::published()->latest()->take(3)->get();
        $latestNews = News::published()->latest()->skip(3)->take(10)->get();
        $categories = Category::active()->withCount(['news' => function ($query) {
            $query->published();
        }])->get();

        return view('tenant.home', compact('featuredNews', 'latestNews', 'categories'));
    }

    /**
     * Display a single news article
     */
    public function showNews(News $news)
    {
        if (!$news->is_published) {
            abort(404);
        }

        $relatedNews = News::published()
            ->where('category_id', $news->category_id)
            ->where('id', '!=', $news->id)
            ->take(5)
            ->get();

        return view('tenant.news-detail', compact('news', 'relatedNews'));
    }

    /**
     * Display news by category
     */
    public function categoryNews(Category $category)
    {
        if (!$category->is_active) {
            abort(404);
        }

        $news = $category->news()->published()->latest()->paginate(12);

        return view('tenant.category-news', compact('category', 'news'));
    }

    /**
     * Search news articles
     */
    public function search(Request $request)
    {
        $query = $request->get('q');

        $news = News::published()
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%")
                    ->orWhere('excerpt', 'like', "%{$query}%");
            })
            ->latest()
            ->paginate(12);

        return view('tenant.search-results', compact('news', 'query'));
    }
}
