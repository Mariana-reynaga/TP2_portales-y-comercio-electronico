<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ventas;
use App\Models\User;

use App\Http\Controllers\Carbon;

class VentasController extends Controller
{
    public function userSales(){
        $users = User::all()->where('user_role', 'user');

        return view('admin.users', [
            'usuarios' => $users
        ]);
    }

    public function userPurchase(int $id){
        $user = User::find($id);

        $purchases = Ventas::all()->where('user_fk', $id)->groupBy('created_at');

        return view('admin.userPurchases', [
            'user'      => $user,
            'purchases' => $purchases,
        ]);
    }
}
