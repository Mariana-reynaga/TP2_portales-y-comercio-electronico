<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Cart::instance('cart')->content()->count() == 0) {

            return redirect()->route('cart');
        }else{
            return $next($request);
        }
    }
}
