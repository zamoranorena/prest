<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;

use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        try {
            // Obtenemos los datos del formulario
            $data = [
                'username' => $request->username,
                'password' => $request->password
            ];

            if (Auth::attempt($data)):
                // Si nuestros datos son correctos mostramos el dashboard
                return redirect(route('admin.dashboard'));
            endif;
            // Si los datos no son los correctos volvemos al login y mostramos un error
            Session::flash('errors', 'Usuario o Contraseña incorrecta');
            return redirect(route('admin.login'));
        } catch (Exception $e) {
            //Si ocurre un error en el sistema
            Session::flash('errors', 'Intentelo nuevamente, no se pudo procesar sus datos');
            return redirect(route('admin.login'));
        }
    }

    public function logout(Request $request)
    {
        // Cerramos la sesión
        Auth::guard()->logout();
        // Volvemos al login y mostramos un mensaje indicando que se cerró la sesión
        return redirect(route('admin.login'));
    }

    public function username()
    {
        return 'username';
    }


}
