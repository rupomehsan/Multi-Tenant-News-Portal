<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $baseRouteFrontEnd = 'landlord.frontend.pages.';
    protected $baseRouteAdmin = 'landlord.admin.pages.';
    /**
     * Display the main SaaS landing page or tenant home
     */
    public function index()
    {
        if (tenant()) {
            // Tenant home page
            $featuredNews = News::published()->latest()->take(3)->get();
            $latestNews = News::published()->latest()->skip(3)->take(10)->get();
            $categories = Category::active()->withCount(['news' => function ($query) {
                $query->published();
            }])->get();

            return view('tenant.frontend.pages.home.index', compact('featuredNews', 'latestNews', 'categories'));
        }

        // Landlord pricing page
        $plans = [
            [
                'name' => 'Basic',
                'price' => 29,
                'features' => [
                    'Up to 1,000 articles',
                    '5 categories',
                    'Basic analytics',
                    'Email support',
                    'Standard themes'
                ]
            ],
            [
                'name' => 'Premium',
                'price' => 79,
                'popular' => true,
                'features' => [
                    'Up to 10,000 articles',
                    'Unlimited categories',
                    'Advanced analytics',
                    'Priority support',
                    'Custom themes',
                    'API access'
                ]
            ],
            [
                'name' => 'Enterprise',
                'price' => 199,
                'features' => [
                    'Unlimited articles',
                    'Unlimited categories',
                    'White-label solution',
                    'Dedicated support',
                    'Custom development',
                    'Advanced integrations'
                ]
            ]
        ];

        $stats = [
            'tenants' => \App\Models\Tenant::count(),
            'articles' => $this->getTotalArticles(),
            'domains' => \Stancl\Tenancy\Database\Models\Domain::count()
        ];

        // Choose two featured demo tenants to showcase on the landing page.
        // Prefer tenants that have at least one domain configured.
        $demoSites = \App\Models\Tenant::with('domains')
            ->whereHas('domains')
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get()
            ->map(function ($t) {
                return [
                    'name' => $t->name ?: ($t->id ?? 'Tenant'),
                    'domain' => optional($t->domains->first())->domain ?? ($t->domain ?? null),
                    'description' => $t->plan ? ucfirst($t->plan) . ' plan' : null,
                ];
            });

        return view($this->baseRouteFrontEnd . 'home.index', compact('plans', 'stats', 'demoSites'));
    }

    /**
     * Display pricing page
     */
    public function pricing()
    {
        return view($this->baseRouteFrontEnd . 'pricing.index');
    }

    /**
     * Display about page
     */
    public function about()
    {
        return view($this->baseRouteFrontEnd . 'about.index');
    }
    public function demo()
    {
        // Provide all tenants that have a domain configured to the demo gallery
        $demoSites = \App\Models\Tenant::with('domains')
            ->whereHas('domains')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($t) {
                return [
                    'id' => $t->id,
                    'name' => $t->name ?: ('Tenant ' . ($t->id ?? '')),
                    'domain' => optional($t->domains->first())->domain ?? ($t->domain ?? null),
                    'description' => $t->description ?? ($t->plan ? ucfirst($t->plan) . ' plan' : 'Sample tenant site'),
                    'uses' => $t->tags ?? null,
                ];
            });

        return view($this->baseRouteFrontEnd . 'demo.index', compact('demoSites'));
    }

    /**
     * Display contact page
     */
    public function contact()
    {
        return view($this->baseRouteFrontEnd . 'contact.index');
    }

    /**
     * Display landlord dashboard
     */
    public function dashboard()
    {
        // If this request is running inside a tenant context but landed on the
        // landlord admin route (route registration ordering can cause this),
        // delegate to the tenant dashboard controller so the tenant sees their
        // own admin UI instead of the landlord dashboard.
        if (tenant()) {
            return app(\App\Http\Controllers\Tenant\DashboardController::class)->index();
        }

        $totalTenants = \App\Models\Tenant::count();
        $activeTenants = \App\Models\Tenant::where('is_active', true)->count();
        $recentTenants = \App\Models\Tenant::with('domains')->latest()->take(5)->get();

        return view($this->baseRouteAdmin . 'dashboard.index', compact('totalTenants', 'activeTenants', 'recentTenants'));
    }

    /**
     * Handle contact form submission
     */
    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|in:sales,support,billing,partnership,other',
            'message' => 'required|string|min:10|max:2000',
        ]);

        // Here you would typically send an email or store the contact message
        // For now, we'll just redirect back with a success message

        return redirect()->back()->with('success', 'Thank you for your message! We\'ll get back to you within 24 hours.');
    }

    /**
     * Get total articles across all tenants
     */
    private function getTotalArticles()
    {
        $total = 0;
        $tenants = \App\Models\Tenant::all();

        foreach ($tenants as $tenant) {
            tenancy()->initialize($tenant);
            $total += \App\Models\News::count();
            tenancy()->end();
        }

        return $total;
    }
}
