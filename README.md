# Multi-Tenant News Portal SaaS - Laravel 10 + Stancl/Tenancy

A comprehensive multi-tenant news portal system built with Laravel 10 and the stancl/tenancy package. Each tenant gets their own isolated database, domain/subdomain access, and complete news management capabilities.

**🌐 Production Domain:** `https://news-saas.techparkit.info`  
**🔗 Example Tenant:** `https://test.news-saas.techparkit.info`

---

## 🚀 Production Deployment

### 📚 Complete Production Guides

| Guide                                                              | Purpose                                              | Start Here?       |
| ------------------------------------------------------------------ | ---------------------------------------------------- | ----------------- |
| **[PRODUCTION_QUICK_REFERENCE.md](PRODUCTION_QUICK_REFERENCE.md)** | ⚡ Quick reference card - Commands & troubleshooting | ✅ **First!**     |
| **[PRODUCTION_COMPLETE_SETUP.md](PRODUCTION_COMPLETE_SETUP.md)**   | 📋 Complete step-by-step production setup            | ✅ **Start here** |
| **[MYSQL_PERMISSIONS_SETUP.md](MYSQL_PERMISSIONS_SETUP.md)**       | 🔐 MySQL permissions for tenant DB creation          | Required          |
| **[CLOUDFLARE_DNS_SETUP.md](CLOUDFLARE_DNS_SETUP.md)**             | 🌐 DNS and wildcard subdomain configuration          | Required          |
| **[PRODUCTION_SSL_SETUP.md](PRODUCTION_SSL_SETUP.md)**             | 🔒 SSL certificate setup (Cloudflare/Let's Encrypt)  | Required          |
| **[NGINX_AAPANEL_CONFIG.md](NGINX_AAPANEL_CONFIG.md)**             | ⚙️ NGINX configuration for aaPanel                   | Required          |
| **[TENANT_VERIFICATION_GUIDE.md](TENANT_VERIFICATION_GUIDE.md)**   | ✅ Tenant health checks and verification             | Verification      |
| **[DEPLOYMENT_GUIDE.md](DEPLOYMENT_GUIDE.md)**                     | 🚀 General deployment workflow                       | Reference         |

### ⚡ Quick Start Commands

```bash
# Health check
php artisan tenant:health [--fix]

# Verify tenant creation
php artisan tenant:verify {tenant_id} [--detailed]

# List all tenants
php artisan tenants:list

# Clear caches
php artisan cache:clear && php artisan config:clear
```

### 🔧 Critical Production Settings

```env
# .env
APP_URL=https://news-saas.techparkit.info
CENTRAL_DOMAIN=news-saas.techparkit.info
DB_DATABASE=news_saas
DB_USERNAME=news_saas
```

```sql
-- MySQL Permissions (one-time setup)
GRANT ALL PRIVILEGES ON `tenant%`.* TO 'news_saas'@'localhost';
GRANT CREATE, DROP ON *.* TO 'news_saas'@'localhost';
FLUSH PRIVILEGES;
```

```nginx
# NGINX
server_name news-saas.techparkit.info *.news-saas.techparkit.info;
```

---

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

## 📚 Production Deployment & Troubleshooting

### Essential Documentation

| Document                                                         | Purpose                                                 |
| ---------------------------------------------------------------- | ------------------------------------------------------- |
| **[QUICK_START.md](QUICK_START.md)**                             | 🚀 Quick reference for deployment and common tasks      |
| **[MYSQL_PERMISSIONS_SETUP.md](MYSQL_PERMISSIONS_SETUP.md)**     | 🔐 MySQL permissions for multi-tenant database creation |
| **[DEPLOYMENT_GUIDE.md](DEPLOYMENT_GUIDE.md)**                   | 📋 Complete deployment workflow and checklist           |
| **[TENANT_VERIFICATION_GUIDE.md](TENANT_VERIFICATION_GUIDE.md)** | ✅ Tenant verification and validation procedures        |
| **[PRODUCTION_ISSUE_SUMMARY.md](PRODUCTION_ISSUE_SUMMARY.md)**   | 📊 Complete analysis of production issues and solutions |

### Quick Commands

```bash
# Deploy to production
npm run track && npm run deploy:files

# Verify tenant health
php artisan tenant:health

# Check specific tenant
php artisan tenant:verify {tenant_id}

# Fix common issues
php artisan tenant:health --fix
```

### Production Checklist

**Before First Deployment:**

-   [ ] Apply MySQL permissions (see `MYSQL_PERMISSIONS_SETUP.md`)
-   [ ] Configure `.env` with production database credentials
-   [ ] Set `CENTRAL_DOMAIN` in `.env`

**After Every Deployment:**

-   [ ] Clear Laravel cache: `php artisan cache:clear`
-   [ ] Run health check: `php artisan tenant:health`
-   [ ] Verify tenant creation works

**After Creating New Tenant:**

-   [ ] Run: `php artisan tenant:verify {tenant_id}`
-   [ ] Test subdomain accessibility
-   [ ] Check tenant database exists

For detailed instructions, see **[QUICK_START.md](QUICK_START.md)**

---

**Built with Laravel 10 + Stancl/Tenancy for scalable multi-tenant news portal solutions.**
