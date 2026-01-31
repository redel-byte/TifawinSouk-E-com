# TifawinSouk – Catalogue Management Web Application

##  Description
TifawinSouk is a Laravel-based web application designed to help a local Moroccan SME manage its product catalogue through a secure back-office, while providing a minimal public interface for customers to browse categories and products.

---

##  Objectives
- Provide administrators with a secure interface to manage categories and products.
- Allow public users to browse categories and view product details.
- Apply Laravel best practices (MVC, Validation, Middleware, Eloquent ORM).

---

##  Technologies
- **Backend**: Laravel (latest stable)
- **Frontend**: Blade, HTML, CSS, JavaScript
- **Database**: MySQL / MariaDB
- **Authentication**: Laravel Breeze / UI
- **Storage**: Laravel Storage (images upload)

---

##  Features

### Admin (Back-Office)
- Secure authentication
- CRUD categories
- CRUD products
- Image upload
- Server-side validation
- Success & error notifications
- Soft delete (optional)

### Public Interface
- Categories listing
- Products listing by category
- Product detail page
- Simple pagination

---

##  Database Structure

### Categories
- id
- name
- slug
- description
- created_at
- updated_at

### Products
- id
- name
- reference
- short_description
- price
- stock
- image
- category_id
- created_at
- updated_at
- deleted_at

---

##  Installation

```bash
git clone https://github.com/your-username/tifawinsouk.git
cd tifawinsouk
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

##  Bonus

Database seeders & factories
Soft deletes
Query caching
Performance optimization
