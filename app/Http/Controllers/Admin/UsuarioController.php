<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //
    public function show()
    {

        return view('admin.login');
    }

    public function validar(Request $request)
    {

        $usuario = Usuarios::where('usuario', $request->usuario)->first();

        if ($usuario != null) {
            session_start();
            $_SESSION['nombre'] = $request['usuario'];
            return redirect()->route('administrador.main');
        }
        return $request->usuario;
    }

    public function salir()
    {
        session_start();
        session_unset();
        session_destroy();

        return redirect()->route('login');
    }
}
