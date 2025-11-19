<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the tenant admin dashboard
     */
    public function index()
    {
        $stats = [
            'total_news' => News::count(),
            'published_news' => News::published()->count(),
            'draft_news' => News::where('is_published', false)->count(),
            'total_categories' => Category::count(),
            'active_categories' => Category::active()->count(),
            'total_users' => User::count(),
        ];
        // Individual variables expected by the tenant dashboard view
        $totalNews = News::count();
        $publishedNews = News::published()->count();
        $draftNews = News::where('is_published', false)->count();
        $totalCategories = Category::count();
        $activeCategories = Category::active()->count();
        $totalUsers = User::count();

        $recentNews = News::with(['category', 'user'])
            ->latest()
            ->take(5)
            ->get();

        $popularCategories = Category::withCount(['news' => function ($query) {
            $query->published();
        }])
            ->orderBy('news_count', 'desc')
            ->take(5)
            ->get();

        return view('tenant.dashboard', compact(
            'totalNews',
            'publishedNews',
            'draftNews',
            'totalCategories',
            'activeCategories',
            'totalUsers',
            'recentNews',
            'popularCategories'
        ));
    }
}
