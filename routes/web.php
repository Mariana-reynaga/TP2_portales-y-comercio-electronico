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

        // Productos
    Route::get('/admin/lamparas', [App\Http\Controllers\ProductController::class, 'adminProducts'])
        ->name('admin.products');

    Route::get('/admin/lamparas/detalle/{id}', [App\Http\Controllers\ProductController::class, "adminDetail"])
        ->name('admin.products.detail')
        ->whereNumber('id');

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

    Route::delete('/admin/lamparas/{id}', [App\Http\Controllers\ProductController::class, "deleteProcess"])
        ->name('products.delete.process')
        ->whereNumber('id');

        // Blog
    Route::get('/admin/blog', [App\Http\Controllers\BlogController::class, 'adminBlog'])
        ->name('admin.blogs');

    Route::get('/admin/blog/detalle/{id}', [App\Http\Controllers\BlogController::class, 'adminBlogDetails'])
        ->name('admin.blogs.detail')
        ->whereNumber('id');

    Route::get('/admin/blog/crear', [App\Http\Controllers\BlogController::class, 'createBlog'])
        ->name('blog.create');

    Route::post('/admin/blog/crear', [App\Http\Controllers\BlogController::class, 'createBlogProcess'])
        ->name('blog.create.process');

    Route::get('/admin/blog/{id}', [App\Http\Controllers\BlogController::class, 'editBlog'])
        ->name('blog.edit')
        ->whereNumber('id');

    Route::put('/admin/blog/{id}', [App\Http\Controllers\BlogController::class, 'editBlogProcess'])
        ->name('blog.edit.process')
        ->whereNumber('id');

    Route::delete('/admin/blog/{id}', [App\Http\Controllers\BlogController::class, 'deleteBlog'])
        ->name('blog.delete.process');

        // Users
    Route::get('/admin/usuarios', [App\Http\Controllers\BlogController::class, 'adminUsers'])
        ->name('admin.users');
