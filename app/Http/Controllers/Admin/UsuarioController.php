<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    //
    public function show()
    {
        return view('admin.login',['errormsg' => 'no']);
    }

    public function validar(Request $request)
    {

        $usuario = Usuarios::where('usuario', $request->usuario)->first();

        if ($usuario != null && Hash::check($request->contrasenia, $usuario->contrasenia)) {
            session_start();
            $_SESSION['nombre'] = $request['usuario'];
            return redirect()->route('administrador.main');
        }
        return view('admin.login',['errormsg' => 'si']);
    }

    public function salir()
    {
        session_start();
        session_unset();
        session_destroy();

        return redirect()->route('login');
    }

    public function lista()
    {
        session_start();

        if (isset($_SESSION['nombre'])) {
            $usuarios = DB::table("usuarios")->get();
            return view('admin.usuarios.usuarios', compact('usuarios'));
        }
        return redirect('login');
    }


    public function editar(Request $request)
    {
        session_start();
        if (isset($_SESSION['nombre'])) {

            $usuario = Usuarios::find($request->cod_user);
            return view('admin.usuarios.editusuarios', compact('usuario'));
        }
        return redirect('login');
    }
}
