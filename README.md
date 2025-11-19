# Multi-Tenant News Portal SaaS - Laravel 10 + Stancl/Tenancy

A comprehensive multi-tenant news portal system built with Laravel 10 and the stancl/tenancy package. Each tenant gets their own isolated database, domain/subdomain access, and complete news management capabilities.

## 🏗️ Architecture Overview

```
┌─────────────────────────────────────────────────────────────────┐
│                    MULTI-TENANT NEWS PORTAL                     │
│                         ARCHITECTURE                            │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  ┌─────────────────┐           ┌─────────────────────────────┐  │
│  │   LANDLORD      │           │         TENANTS             │  │
│  │   (Main App)    │           │    (Individual Portals)     │  │
│  ├─────────────────┤           ├─────────────────────────────┤  │
│  │ • Tenant Mgmt   │◄─────────►│ • somoynews.mainnews.com   │  │
│  │ • Domain Setup  │           │ • prothomalo.mainnews.com   │  │
│  │ • User Admin    │           │ • dailystar.mainnews.com    │  │
│  │ • Monitoring    │           │                             │  │
│  └─────────────────┘           └─────────────────────────────┘  │
│           │                                    │                │
│           ▼                                    ▼                │
│  ┌─────────────────┐           ┌─────────────────────────────┐  │
│  │  CENTRAL DB     │           │       TENANT DBs            │  │
│  │                 │           │                             │  │
│  │ • tenants       │           │ • tenant_xxx_news           │  │
│  │ • domains       │           │   - news                    │  │
│  │ • subscriptions │           │   - categories              │  │
│  └─────────────────┘           │   - users                   │  │
│                                 │ • tenant_yyy_news           │  │
│                                 │ • tenant_zzz_news           │  │
│                                 └─────────────────────────────┘  │
└─────────────────────────────────────────────────────────────────┘
```

## 🚀 Key Features

### Multi-Tenancy Features

-   **Complete Database Isolation**: Each tenant has its own separate database
-   **Domain-Based Identification**: Access via subdomains (e.g., `tenant1.mainnews.com`)
-   **Automatic Context Switching**: Seamless tenant detection and database switching
-   **Tenant Management**: Easy creation and management of tenants via admin panel

### News Portal Features

-   **Content Management**: Full CRUD for news articles, categories, and users
-   **Rich Text Editing**: Support for featured images, excerpts, and content
-   **Category System**: Organized news categorization with color coding
-   **User Management**: Role-based access control for content creators
-   **SEO Optimization**: Meta titles, descriptions, and URL slugs
-   **Responsive Design**: Mobile-friendly interface with Tailwind CSS

## 📁 Project Structure

```
news-portal-multy-tenant/
├── app/
│   ├── Console/Commands/
│   │   ├── CreateTenantCommand.php     # CLI tenant creation
│   │   └── SeedTenantCommand.php       # Tenant database seeding
│   ├── Http/Controllers/
│   │   ├── Landlord/
│   │   │   └── TenantController.php    # Tenant management
│   │   └── Tenant/
│   │       ├── NewsController.php      # News CRUD
│   │       ├── CategoryController.php  # Category management
│   │       ├── DashboardController.php # Admin dashboard
│   │       └── HomeController.php      # Front-end display
│   ├── Models/
│   │   ├── Tenant.php                  # Custom tenant model
│   │   ├── News.php                    # News article model
│   │   ├── Category.php                # Category model
│   │   └── User.php                    # User model
│   └── Providers/
│       └── TenancyServiceProvider.php  # Tenancy configuration
├── resources/views/
│   ├── landlord/                       # Admin panel views
│   │   ├── layout.blade.php
│   │   ├── dashboard.blade.php
│   │   └── tenants/
│   └── tenant/                         # Tenant portal views
│       ├── layout.blade.php
│       └── home.blade.php
├── routes/
│   ├── web.php                         # Landlord routes
│   └── tenant.php                      # Tenant routes
└── config/
    └── tenancy.php                     # Tenancy configuration
```

## 🛠️ Installation & Setup

### Prerequisites

-   PHP 8.1 or higher
-   Composer
-   MySQL/PostgreSQL/SQLite database
-   Node.js & npm (optional, for asset compilation)

### Quick Start Commands

```bash
# Install all dependencies
composer install

# Set up environment
cp .env.example .env
php artisan key:generate

# Configure database in .env file
DB_CONNECTION=mysql
DB_DATABASE=news_portal_central
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Run migrations (ensure database is configured)
php artisan migrate

# Create your first tenant
php artisan tenant:create "My News Portal" mynews admin@mynews.com

# Seed with sample data
php artisan tenant:seed --categories --news --admin

# Start development server
php artisan serve
```

## 🏢 Tenant Management

### Creating Tenants via Command Line

```bash
# Create a new tenant
php artisan tenant:create "Somoy News" somoynews admin@somoynews.com --plan=premium

# Seed tenant with sample data
php artisan tenant:seed --categories --news --admin
```

### Creating Tenants via Web Interface

1. Visit `http://localhost:8000` (Landlord dashboard)
2. Click "Create New Tenant"
3. Fill in tenant details and submit

### Accessing Tenant Portals

-   **Tenant Home**: `http://tenant.localhost`
-   **Tenant Admin**: `http://tenant.localhost/admin`

## 🔧 VS Code Extensions Included

```vscode-extensions
bmewburn.vscode-intelephense-client,onecentlin.laravel-blade,onecentlin.laravel5-snippets,amiralizadeh9480.laravel-extra-intellisense,ryannaddy.laravel-artisan,codingyu.laravel-goto-view,shufo.vscode-blade-formatter,onecentlin.laravel-extension-pack,naoray.laravel-goto-components,ihunte.laravel-blade-wrapper,glitchbl.laravel-create-view,xdebug.php-debug,formulahendry.code-runner
```

## 🚀 Development Tasks

Use VS Code's task runner:

-   **Start Laravel Dev Server**: `Ctrl+Shift+P` → `Tasks: Run Task` → `Start Laravel Dev Server`

## 📊 Example Usage

### Tenant Examples

-   `somoynews.mainnews.com` - Somoy News Portal
-   `prothomalo.mainnews.com` - Prothom Alo News Portal
-   `dailystar.mainnews.com` - Daily Star News Portal

Each tenant operates independently with:

-   Separate databases
-   Independent user management
-   Custom branding and content
-   Isolated news and categories

## 🛡️ Security Features

-   **Complete Data Isolation**: No cross-tenant data access
-   **Domain Verification**: Prevents unauthorized domain access
-   **User Authentication**: Separate user bases per tenant
-   **Input Validation**: Comprehensive validation for all inputs

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

**Built with Laravel 10 + Stancl/Tenancy for scalable multi-tenant news portal solutions.**
