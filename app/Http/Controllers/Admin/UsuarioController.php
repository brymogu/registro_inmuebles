<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        if ($usuario != null && Hash::check($request->contrasenia, $usuario->contrasenia) ) {
            session_start();
            $_SESSION['nombre'] = $request['usuario'];
            return redirect()->route('administrador.main');
        }
        return 'Datos Icorrectos, por favor validar';
        
        
    }

    public function salir()
    {
        session_start();
        session_unset();
        session_destroy();

        return redirect()->route('login');
    }
}
