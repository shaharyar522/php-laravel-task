# PHP Developer Technical Task - Implementation

This repository contains the completed technical tasks for the PHP Developer position. The project is built using Laravel and addresses 5 key tasks including REST API development, external API consumption, web scraping, and custom HTTP requests.

## Task 1: Simple REST API (Laravel)
- **Features**: CRUD for products (Name, Price, Description).
- **Endpoints**:
  - `GET /api/products`: List all products with pagination (Bonus implemented).
  - `POST /api/products`: Create a new product with validation.
  - `DELETE /api/products/{id}`: Delete a product by ID.
- **Tech**: Migrations, Eloquent ORM, JSON Responses.

## Task 2: Consume External API
- **Endpoint**: `GET /api/posts`
- **Features**: Fetches first 10 posts from JSONPlaceholder, displaying only `title` and `body`.
- **Bonus**: Search functionality implemented (`/api/posts?search=query`).

## Task 3: Basic Web Scraping
- **Endpoint**: `GET /api/quotes`
- **Features**: Scrapes quotes and authors from `http://quotes.toscrape.com/`.
- **Bonus**: Multiple pages scraping implemented using `DOMDocument` and `XPath`.

## Task 4: HTTP Request with Custom Headers
- **Endpoint**: `GET /api/custom-request`
- **Features**: Sends an HTTP request with custom `User-Agent` and `Accept` headers.
- **Bonus**: Retry logic (3 times) implemented for failed requests.
   ```

### Running Tests (Postman)
You can now access the API at `http://127.0.0.1:8000/api/`.
- **Products**: `GET /api/products`
- **Posts**: `GET /api/posts?search=optio`
- **Quotes**: `GET /api/quotes`
- **Custom Request**: `GET /api/custom-request`