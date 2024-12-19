<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Surfsidemedia\Shoppingcart\Facades\Cart;

use App\Models\Orders;
use App\Models\OrderItems;

use App\Payment\MPpayment;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;


class MercadoPagoController extends Controller
{
    public function successProcess(Request $req)
    {
        return redirect()->route('landing.page')->with('feedback', '¡Compra realizada exitosamente!');
    }

    public function pendingProcess(Request $request)
    {
        $order = new Orders();
            $order->reciever_name       = session()->get('user_shipping.reciever_name');
            $order->order_adress        = session()->get('user_shipping.order_adress');
            $order->order_postal_code   = session()->get('user_shipping.order_postal_code');
            $order->order_notes         = session()->get('user_shipping.order_notes');
            $order->user_id_fk          = auth()->user()->user_id;
            $order->price_total         = Cart::instance('cart')->subtotal();
        $order->save();

        foreach (Cart::instance('cart')->content() as $product) {
            $item = new OrderItems();
                $item->order_id_fk          = $order->order_id ;
                $item->product_id_fk        = $product->id ;
                $item->order_items_price    = $product->price;
                $item->order_items_qnty     = $product->qty;
            $item->save();
        }

        Cart::instance('cart')->destroy();

        session()->forget('user_shipping');

        return redirect()->route('landing.page')->with('feedback', 'La compra esta pendiente.');
    }

    public function failureProcess(Request $request)
    {
        return redirect()->route('landing.page')->with('feedback', 'La compra fue rechazada.');
    }

}
