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

    // Autenticación
Route::get('/iniciar', [App\Http\Controllers\AuthController::class, "loginView"])
    ->name('login.form');

Route::get('/crear', [App\Http\Controllers\AuthController::class, "registerView"])
    ->name('register.form');

    // Admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])
    ->name('admin.home');

Route::get('/admin/lamparas', [App\Http\Controllers\ProductController::class, 'adminProducts'])
    ->name('admin.products');

Route::get('/admin/lamparas/crear', [App\Http\Controllers\ProductController::class, "productCreate"])
    ->name('products.create');

Route::post('/admin/lamparas/crear', [App\Http\Controllers\ProductController::class, "createProcess"])
    ->name('products.create.process');

Route::get('/admin/lamparas/{id}', [App\Http\Controllers\ProductController::class, "productEdit"])
    ->name('products.edit')
    ->whereNumber('id');

Route::put('/admin/lamparas/{id}', [App\Http\Controllers\ProductController::class, "editProcess"])
    ->name('products.edit.process')
    ->whereNumber('id');

Route::get('/admin/blog', [App\Http\Controllers\AdminController::class, 'adminBlog'])
    ->name('admin.blog');

Route::get('/admin/usuarios', [App\Http\Controllers\AdminController::class, 'adminUsers'])
    ->name('admin.users');
