<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct(){
        $this->middleware('can:dashboard')->only('dashboard');
    }

    public function login(LoginRequest $request)
    {
        $credenciales = $request->only('email', 'password');
        
        if (!Auth::attempt($credenciales)) {
            return redirect("login")->withErrors(['credenciales' => ['Credenciales incorrectas.']]);
        }

        $usuario = Auth::getProvider()->retrieveByCredentials($credenciales);

        Auth::login($usuario);

        return redirect('/')->with('message', 'Logeo exitoso');

    }

    public function register(RegisterRequest $request)
    {
        $usuario = User::create($request->only(
            [
                'name', 'email', 'password', 
                'apellido_paterno', 'documento', 'celular', 'direccion'
            ]
        ))->assignRole('cliente');

        auth()->login($usuario);
        return redirect("/")->with('message', 'Registrado exitosamente');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->back();
    }

    public function dashboard()
    {
        return view('dashboard');
    }

}
