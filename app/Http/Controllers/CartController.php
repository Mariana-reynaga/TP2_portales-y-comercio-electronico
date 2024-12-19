<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

use App\Models\Orders;
use App\Models\OrderItems;

use App\Payment\MPpayment;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class CartController extends Controller
{
    public function index(){
        $items = Cart::instance('cart')->content();

        return view('cart.index', compact('items'));
    }

    public function addToCart(Request $req){
        Cart::instance('cart')->add($req->lamp_id, $req->lamp_name, $req->qnty, $req->lamp_price)->associate('App\Models\Lamparas');
        return redirect()->back()->with('feedback', 'Producto añadido exitosamente.');
    }

    public function increaseQnty($rowId){

        $product = Cart::instance('cart')->get($rowId);

        $qty = $product->qty + 1;

        Cart::instance('cart')->update($rowId, $qty);

        return redirect()->back();
    }

    public function decreaseQnty($rowId){
        $product = Cart::instance('cart')->get($rowId);

        $qty = $product->qty - 1;

        Cart::instance('cart')->update($rowId, $qty);

        return redirect()->back();
    }

    public function removeItem($rowId){
        Cart::instance('cart')->remove($rowId);

        return redirect()->back();
    }

    public function delete(){
        Cart::instance('cart')->destroy();

        return redirect()->back();
    }

    public function checkout(){
        $user = auth()->user();

        $carrito = Cart::instance('cart')->content();

        $items_mp = [];

        foreach ($carrito as $lamp) {
            $items_mp[] = [
                'id' => $lamp->id,
                'title' => $lamp->name,
                'unit_price' => $lamp->price,
                'quantity' => (int)$lamp->qty,
            ];
        }

        try{
            MercadoPagoConfig::setAccessToken(config('mercadopago.accessToken'));

            $preferenceFactory = new PreferenceClient;

            $preference = $preferenceFactory->create([
                'items' => $items_mp,

                'back_urls' => [
                    'success' => route('mercadopago.successProcess'),
                    'pending' => route('mercadopago.pendingProcess'),
                    'failure' => route('mercadopago.failureProcess'),
                ],
                'auto_return' => 'approved',
            ]);

        }catch(\Throwable $e){
            dd($e);
        }

        return view('cart.checkout', [
            'user' => $user,
            'items' => $carrito,
            'preference' => $preference,
            'mpPublicKey'=> config('mercadopago.publicKey')
        ]);
    }

    public function checkoutProcess(Request $req){
        $req->validate([
            'reciever_name'             => 'required | min:4 | max:25',
            'order_adress'              => 'required | min:10',
            'order_postal_code'         => 'required | min:4 | max:4',
            'order_notes'               => 'max:50',],[
            'reciever_name.required'    => 'El nombre del destinatario es requerido',
            'reciever_name.min'         => 'El nombre del destinatario debe tener un minimo de 4 caracteres.',
            'reciever_name.max'         => 'El nombre del destinatario debe tener un maximo de 25 caracteres.',
            ////
            'order_adress.required'     => 'La dirección de envio es requerida.',
            'adrorder_adressess.min'    => 'La dirección debe tener un minimo de 10 caracteres',
            ////
            'order_postal_code.required'      => 'El codigo postal es requerido',
            'order_postal_code.min'           => 'El codigo postal debe tener un minimo de 4 caracteres.',
            'order_postal_code.max'           => 'El codigo postal debe tener un maximo de 4 caracteres.',
            ////
            'order_notes.max'                 => 'Las notas deben tener un maximo de 50 caracteres.'
        ]);

        session(['user_shipping' => [
            'reciever_name' => $req->reciever_name,
            'order_adress' => $req->order_adress,
            'order_postal_code' => $req->order_postal_code,
            'order_notes' => $req->order_notes,
        ]]);

        return view('mercadopago.index',[
            'lamps' => $carrito,
        ]);
    }
}
