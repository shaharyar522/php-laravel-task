# PHP Laravel Technical Task

## Setup Instructions

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

## API Endpoints

### Product API
GET    /api/products
POST   /api/products
DELETE /api/products/{id}

### External API
GET /posts

### Scraping API
GET /quotes

### Custom API
GET /custom

Best Regarded 
Muhammad Shahar Yar