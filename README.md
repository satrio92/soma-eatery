# 🍽 Soma Eatery

A modern fullstack restaurant web application built with Laravel. Includes a public-facing menu catalog and a complete admin panel for managing categories and menu items.

## ✨ Key Features

-   🌐 **Public Menu Page** — Customers can browse the full menu with category filtering
-   🔐 **Admin Authentication** — Secure login system powered by Laravel Breeze
-   📋 **Menu Management** — Add, edit, and delete menu items with image, price, and availability status
-   📂 **Category Management** — Organize menu items into categories
-   📱 **Fully Responsive** — Optimized for mobile, tablet, and desktop
-   ☁️ **Cloud Deployed** — Live on Vercel with cloud database via Aiven

## 🧰 Tech Stack

-   **Backend** — Laravel 11, PHP 8.3
-   **Frontend** — Blade Templating, Tailwind CSS, Alpine.js
-   **Database** — MySQL (Aiven Cloud)
-   **Auth** — Laravel Breeze
-   **Deployment** — Vercel

## 📁 Project Structure

```
soma-eatery/
├── app/
│   ├── Http/Controllers/
│   │   ├── CategoryController.php
│   │   └── MenuController.php
│   └── Models/
│       ├── Category.php
│       └── Menu.php
├── database/migrations/
├── resources/views/
│   ├── admin/
│   │   ├── layouts/
│   │   ├── categories/
│   │   └── menus/
│   └── welcome.blade.php
├── routes/
│   └── web.php
├── api/
│   └── index.php
└── vercel.json
```

## 🚀 Getting Started

### Requirements

-   PHP 8.1+
-   Composer
-   Node.js & npm
-   MySQL

### Installation

```bash
# Clone the repository
git clone https://github.com/satrio92/soma-eatery.git
cd soma-eatery

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Configure your database in .env, then run migrations
php artisan migrate

# Build assets
npm run dev

# Serve the application
php artisan serve
```

## 🔗 Live Demo

[soma-eatery-web.vercel.app](https://soma-eatery-web.vercel.app)
