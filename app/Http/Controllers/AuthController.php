<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $titulo = "login de usuarios";
        return view("modules.auth.login", compact("titulo"));
    }
    public function logear(Request $request)
    {
        //validar los datos de las credenciales
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //buscar el email
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['enail' => 'El email o la contraseña son incorrectos.'])->withInput();
        }
        //el usuario este activo
        if (!$user->activo) {
            return back()->withErrors(['enail' => 'Tu cuenta esta inactiva!']);
        }

        //crear la session de usuario
        Auth::login($user);
        $request->session()->regenerate();
        
        return to_route('home');
    }

    public function crearAdmin()
    {
        //crear directamente un admin
        User::create([
            'name' => 'Administrador Juan',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'activo' => true,
            'rol' => 'admin'
        ]);
        return "Admin creado";
    }

    public function logout(){
        Auth::logout();
        return to_route('login');
    }
}
