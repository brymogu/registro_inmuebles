<?php

namespace App\Http\Controllers;

use App\Models\Negocios;
use App\Models\Propietarios;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __invoke()
    {
        return view('propietario.create', ['tipo' => 'No']);
    }

    public function store(Request $request)
    {

        $correo = $request->email;
        $user = Propietarios::where('email', '=', $correo)->first();

        if ($user === null) {
            $propietario = new Propietarios();
            $propietario->name = $request->name;
            $propietario->lastname = $request->lastname;
            $propietario->email = $request->email;
            $propietario->phone = $request->phone;
            $propietario->full_number = $request->full_number;
            $propietario->save();

            $negocio = new Negocios();
            $negocio->propietario = $propietario->id;
            $negocio->paso = "Datos";
            $negocio->save();
            return redirect()->route('negocio.show', $negocio);
        } else {
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->phone = $request->phone;
            $user->full_number = $request->full_number;
            $user->save();

            $negocio = new Negocios();
            $negocio->propietario = $user->id;
            $negocio->paso = "Datos";
            $negocio->save();

            return redirect()->route('negocio.show', $negocio);
        }
    }

    public function edit(Negocios $negocio)
    {
        $propietario = Propietarios::find($negocio->propietario);
        return view('propietario.edit', compact('propietario'), ['tipo' => 'No']);
    }

    public function update(Request $request, Negocios $negocio)
    {
        $propietario = Propietarios::find($negocio->propietario);
        $propietario->name = $request->name;
        $propietario->lastname = $request->lastname;
        $propietario->phone = $request->phone;
        $propietario->full_number = $request->full_number;
        $propietario->save();

        return redirect()->route('negocio.show', $propietario);
    }
}
