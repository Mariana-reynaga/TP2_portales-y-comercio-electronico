<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            // $req->session()->regenerate();

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

}
