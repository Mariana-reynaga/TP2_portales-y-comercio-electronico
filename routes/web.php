<?php

use Illuminate\Support\Facades\Route;

    // Landing
Route::get('/', [App\Http\Controllers\LandingController::class, "landingPage"])
    ->name('landing.page');

    // Productos
Route::get('/lamparas', [App\Http\Controllers\ProductController::class, "products"])
    ->name('landing.page');
