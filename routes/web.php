<?php

use Illuminate\Support\Facades\Route;

    // Landing
Route::get('/', [App\Http\Controllers\LandingController::class, "landingPage"])
    ->name('landing.page');

    // Productos
Route::get('/lamparas', [App\Http\Controllers\ProductController::class, "products"])
    ->name('products.page');

Route::get('/lamparas/{id}', [App\Http\Controllers\ProductController::class, "productDetail"])
    ->name('products.detail')
    ->whereNumber('id');

    // Blog
Route::get('/blog', [App\Http\Controllers\BlogController::class, "blog"])
    ->name('blog.page');

Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, "article"])
    ->name('blog.article')
    ->whereNumber('id');
