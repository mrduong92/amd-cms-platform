# NMT AUTO - Laravel CMS

This is a Laravel 12 CMS for NMT AUTO industrial equipment and renewable energy solutions company.

## Technology Stack

- **Backend**: Laravel 12 (PHP 8.3)
- **Admin Panel**: AdminLTE 4 (Bootstrap 5)
- **Database**: MySQL 8.0
- **Containerization**: Docker Compose
- **Image Processing**: Intervention Image
- **Slugs**: Eloquent Sluggable

## Development

### Prerequisites
- Docker Desktop installed and running

### Quick Start
```bash
# Start all containers
docker compose up -d

# Access the application
# Frontend: http://localhost:8001
# Admin: http://localhost:8001/admin
# phpMyAdmin: http://localhost:8080

# Default admin credentials
# Email: admin@nmtauto.vn
# Password: password
```

### Running Commands
```bash
# Run artisan commands
docker compose run --rm app php artisan <command>

# Run npm commands
docker compose run --rm node npm <command>

# Build frontend assets
docker compose run --rm node npm run build

# Run migrations
docker compose run --rm app php artisan migrate

# Seed database
docker compose run --rm app php artisan db:seed
```

## Project Structure

```
nmtauto/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/           # Admin panel controllers
│   │   │   └── Frontend/        # Frontend controllers
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/                  # Eloquent models
├── database/
│   ├── migrations/              # Database migrations
│   └── seeders/                 # Database seeders
├── resources/views/
│   ├── admin/                   # AdminLTE views
│   │   ├── layouts/
│   │   ├── categories/
│   │   ├── products/
│   │   ├── services/
│   │   ├── posts/
│   │   ├── pages/
│   │   ├── sliders/
│   │   ├── menus/
│   │   ├── partners/
│   │   ├── media/
│   │   ├── settings/
│   │   ├── inquiries/
│   │   └── users/
│   └── frontend/                # Tailwind frontend views
│       ├── layouts/
│       ├── components/
│       ├── products/
│       ├── services/
│       ├── posts/
│       └── pages/
├── routes/
│   ├── web.php                  # Frontend routes
│   └── admin.php                # Admin routes
├── docker/                      # Docker configuration
│   ├── nginx/
│   └── php/
├── docker-compose.yml
├── Dockerfile
└── backup/                      # Original static files
```

## Database Schema

### Core Tables
- `users` - Admin users with is_admin flag
- `categories` - Product/service/post categories (tree structure)
- `products` - Products with specs and gallery
- `product_specs` - Product specifications
- `product_images` - Product gallery images
- `services` - Industrial services
- `posts` - News, projects, success stories
- `pages` - Static pages (about, contact, etc.)
- `sliders` - Hero banner slides
- `menus` - Navigation menus (header/footer)
- `partners` - Partner companies
- `settings` - Site-wide settings (key-value)
- `media` - Media library
- `contact_inquiries` - Contact form submissions
- `newsletter_subscribers` - Newsletter subscriptions

## Admin Panel

### CRUD Modules
- **Dashboard** - Statistics and quick actions
- **Categories** - Product/service/post categories
- **Products** - Products with specs and images
- **Services** - Industrial services
- **Posts** - News articles and projects
- **Pages** - Static pages with SEO
- **Sliders** - Hero banner management
- **Menus** - Header/footer navigation
- **Partners** - Partner companies
- **Settings** - Site configuration by groups
- **Media** - File manager
- **Inquiries** - Contact form management
- **Users** - Admin user management

### Settings Groups
- General: site_name, logo, favicon
- Contact: phone, email, address, map
- Social: facebook, youtube, tiktok, zalo
- SEO: meta tags, OG image
- Footer: about text, copyright

## Frontend Routes

- `/` - Homepage with sliders, services, products, news
- `/san-pham` - Products listing
- `/san-pham/danh-muc/{slug}` - Products by category
- `/san-pham/{slug}` - Product detail
- `/dich-vu` - Services listing
- `/dich-vu/{slug}` - Service detail
- `/tin-tuc` - News listing (with type filter)
- `/tin-tuc/{slug}` - Post detail
- `/du-an` - Projects listing
- `/lien-he` - Contact page with form
- `/{slug}` - Dynamic pages

## Design System

**Colors:**
- Primary: `#F97316` (orange)
- Secondary: `#0F172A` (deep navy)

## Notes

- Vietnamese language (`lang="vi"`)
- Timezone: Asia/Ho_Chi_Minh
- All images stored in `storage/app/public`
- Run `php artisan storage:link` for image access
