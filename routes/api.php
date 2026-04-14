<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']); 
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

// Task 2: External API
Route::get('/posts', [TaskController::class, 'fetchPosts']);

// Task 3: Web Scraping
Route::get('/quotes', [TaskController::class, 'scrapeQuotes']);

// Task 4: Custom Headers
Route::get('/custom-request', [TaskController::class, 'customRequest']);