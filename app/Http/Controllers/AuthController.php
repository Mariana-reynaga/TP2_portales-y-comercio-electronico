<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Orders;
use App\Models\OrderItems;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function loginView(){
        return view('auth.login');
    }

    public function loginProcess(Request $req){
        $req->validate(
            [
                'email' => 'required | email:rfc,dns',
                'password' => 'required'
            ],
            [
                'email.required' => 'El email es requerido.',
                'password.required' => 'La contraseña es requerida.'
            ]
        );

        $credentials = $req->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            return redirect()
                   ->back(fallback: route('login'))
                   ->withInput();
        }else{
            return redirect()->route('landing.page')->with('feedback', 'Bienvenido '.auth()->user()->user);
        }
    }

    public function registerView(){
        return view('auth.register');
    }

    public function registerProcess(Request $req) {
        $req->validate(
            [
                'user'      => 'required | min: 4 | max: 10',
                'email'     => 'required | max:50 |unique:users,email',
                'password'  => 'required | min: 8'
            ],
            [
                'user.required' => 'El nombre es requerido.',
                'user.min' => 'El nombre debe tener un minimo de 4 caracteres.',
                'user.max' => 'El nombre debe tener un maximo de 10 caracteres',
                ////
                'email.required' => 'El email es requerido.',
                'email.unique' => 'El email ya esta registrado.',
                ////
                'password.required' => 'La contraseña es requerida.',
                'password.min' => 'La contraseña debe tener un minimo de 8 caracteres.'
            ]
        );

        $newUser = User::create([
            'user'      => $req->user,
            'email'     => $req->email,
            'password'  => Hash::make($req->password),
            'user_role' => 'user'
        ]);

        $creds = $req->only('email', 'password');

        Auth::attempt($creds);

        $req->session()->regenerate();

        return redirect()->route('landing.page')->with('feedback', 'Cuenta creada exitosamente.');
    }

    public function logOut(Request $req){
        auth()->logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect()
               ->route('landing.page')
               ->with('feedback', 'Sesión cerrada exitosamente.');
    }

    public function profile(Int $id){
        $user = User::find($id);

        $user_id = $user->user_id;

        $orders = Orders::where('user_id_fk', $user_id)->latest()->paginate(3);

        return view('profile.user_profile', [
            'user_data' => $user,
            'user_orders' => $orders
        ]);
    }

    public function orderDetails(int $id){
        $user = auth()->user();

        $order_details = Orders::find($id);

        $product_details = OrderItems::where('order_id_fk', $id)->get();

        return view('profile.order_detail', [
            'user_data' => $user,
            'order' => $order_details,
            'products' => $product_details
        ]);
    }

    public function editProfile(Int $id){
        $user = User::find($id);

        return view('profile.edit_profile', [
            'user_data' => $user
        ]);
    }

    public function editProfileProcess(int $id, Request $req){
        $user = User::findOrFail($id);

        $req->validate(
            [
                'user'          =>  'required | min:4  | max:10',
                'email'         =>  ['required', 'email', Rule::unique('users', 'email')->ignore($user)],
                'user_adress'   =>  'max:50',
                'user_phone'    =>  'min:8    | max:8'
            ],
            [
                'user.required'     => 'El nombre es requerido.',
                'user.min'          => 'El nombre debe tener un minimo de 4 caracteres.',
                'user.max'          => 'El nombre debe tener un maximo de 10 caracteres.',
                // //
                'email.required'    => 'El email es requerido.',
                // //
                'user_adress.max'   => 'La direción debe tener un maximo de 50 caracteres.',
                ////
                'user_phone.min'    => 'El telefono debe tener 8 números.',
                'user_phone.max'    => 'El telefono debe tener 8 números.'
            ]
        );

        $input = $req->all([]);

        $user->update($input);

        return redirect()->route('perfil',['id'=>$user->user_id])->with('feedback', 'Perfil editado Exitosamente.');
    }

}
