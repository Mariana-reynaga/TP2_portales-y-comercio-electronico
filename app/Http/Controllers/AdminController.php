<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Orders;
use App\Models\OrderItems;

class AdminController extends Controller
{
    public function admin(){
        return view('admin.index');
    }

    public function users(){
        $users = User::all()->where('user_role', 'user');

        return view('admin.users', [
            'usuarios' => $users
        ]);
    }

    public function userDetails(int $id){
        $user = User::find($id);

        // dd($user);

        $user_id = $user->user_id;

        $orders = Orders::where('user_id_fk', $user_id)->latest()->paginate(3);

        return view('admin.userPurchases', [
            'user_data' => $user,
            'user_orders' => $orders
        ]);
    }

    public function userPurchase(int $user_id, int $purchase_id){
        $user = User::find($user_id);

        $order_details = Orders::find($purchase_id);

        $product_details = OrderItems::where('order_id_fk', $purchase_id)->get();

        return view('admin.order_detail', [
            'user_data' => $user,
            'order' => $order_details,
            'products' => $product_details
        ]);
    }

    public function completePurchase(int $user_id, int $purchase_id){
        $order_details = Orders::find($purchase_id);

        $order_details->order_status = "Completo";

        $order_details->save();

        return redirect()->route('admin.users.details', ['id'=>$user_id])->with('feedback.admin', 'Pedido marcado como completo.');
    }

    public function cancelPurchase(int $user_id, int $purchase_id){
        $order_details = Orders::find($purchase_id);

        $order_details->order_status = "Cancelado";

        $order_details->save();

        return redirect()->route('admin.users.details', ['id'=>$user_id])->with('feedback.admin', 'Pedido cancelado.');
    }

    public function onWayPurchase(int $user_id, int $purchase_id){
        $order_details = Orders::find($purchase_id);

        $order_details->order_status = "En camino";

        $order_details->save();

        return redirect()->route('admin.users.details', ['id'=>$user_id])->with('feedback.admin', 'Pedido marcado como en camino.');
    }
}
