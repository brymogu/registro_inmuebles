<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    //
    public function show()
    {
        return view('admin.login');
    }

    public function validar(Request $request)
    {

        $credenciales = request()->only('email', 'password');

       if (Auth::attempt($credenciales,true)) {
           request()->session()->regenerate();
           return redirect('administrador');
       }
       return redirect('login');
    }
}
