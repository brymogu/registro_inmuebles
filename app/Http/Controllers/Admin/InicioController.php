<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InicioController extends Controller
{
    //
    public function show()
    {
        session_start();
        
        if (isset($_SESSION['nombre'])) {
            return view('admin.main');
        }
        
        return redirect('login');
    }
}
