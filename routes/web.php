<?php

use Illuminate\Support\Facades\Route;

    // Landing
Route::get('/', [App\Http\Controllers\LandingController::class, "landingPage"])
    ->name('landing.page');

    // Productos
    Route::controller(App\Http\Controllers\ProductController::class)->group( function(){
        Route::get('/lamparas', "products")->name('products.page');
        Route::get('/lamparas/{id}', "productDetail")->name('products.detail')->whereNumber('id');

        // Admin
        Route::get('/admin/lamparas', 'adminProducts')->name('admin.products')
        ->middleware('auth')
        ->middleware('adminCheck');

        Route::get('/admin/lamparas/detalle/{id}', "adminDetail")
        ->name('admin.products.detail')
        ->whereNumber('id')
        ->middleware('auth')
        ->middleware('adminCheck');

            // Crear producto
        Route::get('/admin/lamparas/crear', "productCreate")
        ->name('products.create')
        ->middleware('auth')
        ->middleware('adminCheck');

        Route::post('/admin/lamparas/crear', "createProcess")
        ->name('products.create.process')
        ->middleware('auth')
        ->middleware('adminCheck');

            // Editar producto
        Route::get('/admin/lamparas/{id}', "productEdit")
        ->name('products.edit')
        ->whereNumber('id')
        ->middleware('auth')
        ->middleware('adminCheck');

        Route::put('/admin/lamparas/{id}', "editProcess")
        ->name('products.edit.process')
        ->whereNumber('id')
        ->middleware('auth')
        ->middleware('adminCheck');

            // Eliminar producto
        Route::delete('/admin/lamparas/{id}', "deleteProcess")
        ->name('products.delete.process')
        ->whereNumber('id')
        ->middleware('auth')
        ->middleware('adminCheck');
    });

    // Blog
    Route::controller(App\Http\Controllers\BlogController::class)->group( function(){
        Route::get('/blog', "blog")->name('blog.page');

        Route::get('/blog/{id}', "article")->name('blog.article')->whereNumber('id');

        // Admin
        Route::get('/admin/blog', 'adminBlog')
        ->name('admin.blogs')
        ->middleware('auth')
        ->middleware('adminCheck');

        Route::get('/admin/blog/detalle/{id}', 'adminBlogDetails')
        ->name('admin.blogs.detail')
        ->whereNumber('id')
        ->middleware('auth')
        ->middleware('adminCheck');

            // Crear Blog
        Route::get('/admin/blog/crear', 'createBlog')
        ->name('blog.create')
        ->middleware('auth')
        ->middleware('adminCheck');

        Route::post('/admin/blog/crear', 'createBlogProcess')
        ->name('blog.create.process')
        ->middleware('auth')
        ->middleware('adminCheck');

            // Editar Blog
        Route::get('/admin/blog/{id}', 'editBlog')
        ->name('blog.edit')
        ->whereNumber('id')
        ->middleware('auth')
        ->middleware('adminCheck');

        Route::put('/admin/blog/{id}', 'editBlogProcess')
        ->name('blog.edit.process')
        ->whereNumber('id')
        ->middleware('auth')
        ->middleware('adminCheck');

            // Eliminar Blog
        Route::delete('/admin/blog/{id}', 'deleteBlog')
        ->name('blog.delete.process')
        ->middleware('auth')
        ->middleware('adminCheck');
    } );

    // Autenticación
    Route::controller(App\Http\Controllers\AuthController::class)->group( function(){
            // Iniciar sesión
        Route::get('/iniciar', "loginView")->name('login');

        Route::post('/iniciar', "loginProcess")->name('login.process');

            // Crear cuenta
        Route::get('/crear', "registerView")->name('register.form');

        Route::post('/crear', "registerProcess")->name('register.process');

            // Cerrar sesión
        Route::post('/cerrar', "logOut")->name('logout');

            // Perfil del usuario
        Route::get('/perfil/{id}', "profile")->name('perfil')->whereNumber('id')->middleware('auth')->middleware('urlUserCheck');

            // Editar Perfil
        Route::get('/perfil/editar/{id}', "editProfile")->name('perfil.edit')->whereNumber('id')->middleware('auth');

        Route::put('/perfil/editar/{id}', "editProfileProcess")->name('perfil.edit.process')->whereNumber('id')->middleware('auth');

            // Ver detalles de la orden
        Route::get('/perfil/order/{id}', "orderDetails")->name('perfil.order')->whereNumber('id')->middleware('auth');
    });

    // Carrito
    Route::controller(App\Http\Controllers\CartController::class)->group( function(){
        Route::get('/carrito', "index")->name('cart');

        Route::post('/carrito/add', 'addToCart')->name('cart.add');

        Route::put('/carrito/increase/{rowId}', 'increaseQnty')->name('cart.increase');

        Route::put('/carrito/decrease/{rowId}', 'decreaseQnty')->name('cart.decrease');

        Route::delete('/carrito/remove/{rowId}', 'removeItem')->name('cart.remove');

        Route::delete('/carrito/delete', 'delete')->name('cart.delete');

        Route::get('/carrito/checkout', 'checkout')->name('cart.checkout')->middleware('auth')->middleware('cartCheck');

        Route::post('/mercadopago', "checkoutProcess")->name('mercadopago.index');
    });

    // Mercado Pago
    Route::controller(App\Http\Controllers\MercadoPagoController::class)->group( function(){
        Route::get('/mercadopago/success', "successProcess")->name('mercadopago.successProcess')->middleware('auth')->middleware('cartCheck');

        Route::get('/mercadopago/pending', "pendingProcess")->name('mercadopago.pendingProcess')->middleware('auth');

        Route::get('/mercadopago/failure', "failureProcess")->name('mercadopago.failureProcess')->middleware('auth');
    });

    // Admin
    Route::controller(App\Http\Controllers\AdminController::class)->group( function(){
        Route::get('/admin', "admin")->name('admin.home')->middleware('auth')->middleware('adminCheck');

            // Pagina de usuarios
        Route::get('/admin/usuarios', "users")->name('admin.users')->middleware('auth')->middleware('adminCheck');

        Route::get('/admin/usuarios/{id}', "userDetails")->name('admin.users.details')->whereNumber('id')->middleware('auth')->middleware('adminCheck');

            // ver detalle de la compra
        Route::get('/admin/usuarios/{user_id}/{purchase_id}', "userPurchase")->name('admin.users.purchase')->whereNumber('user_id')->whereNumber('purchase_id')->middleware('auth')->middleware('adminCheck');

            // Completar compra
        Route::put('/admin/user/{user_id}/purchase/{purchase_id}/complete', 'completePurchase')
            ->name('purchase.complete')
            ->whereNumber('user_id')
            ->whereNumber('purchase_id')
            ->middleware('auth')
            ->middleware('adminCheck');

            // Cancelar compra
        Route::put('/admin/user/{user_id}/purchase/{purchase_id}/cancel', 'cancelPurchase')
            ->name('purchase.cancel')
            ->whereNumber('user_id')
            ->whereNumber('purchase_id')
            ->middleware('auth')
            ->middleware('adminCheck');

            // Marcar en camino
        Route::put('/admin/user/{user_id}/purchase/{purchase_id}/onWay', 'onWayPurchase')
            ->name('purchase.onway')
            ->whereNumber('user_id')
            ->whereNumber('purchase_id')
            ->middleware('auth')
            ->middleware('adminCheck');
    });
