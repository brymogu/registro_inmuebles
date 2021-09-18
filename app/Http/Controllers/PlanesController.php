<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Negocios;
use App\Models\Propietarios;
use App\Models\Propiedades;

class PlanesController extends Controller
{
    //
    public function show($id)
    {
        $Propiedad = Propiedades::find($id);

        $negocio = Negocios::where('propiedad', $id)->first();
        $tipo_negocio = $negocio->tipo_negocio;
        $valor = $negocio->valor;


        if ($tipo_negocio == '1') {
            return view('planes.venta', ['valor' => $valor], ['tipo' => $Propiedad->horizontal]);
        } else if ($tipo_negocio == '2') {
            return view('planes.arriendo', ['valor' => $valor], ['tipo' => $Propiedad->horizontal]);
        }
    }

    public function store(Request $request,Propiedades $id)
    {
        $negocio = Negocios::where('propiedad', $id->id)->first();
        $negocio->plan = $request->plan;

        if ($request->cpvj) {
            $negocio->cpvj = "Si";
        } else {
            $negocio->cpvj = "No";
        }
        $negocio->save();

        $codigo_pptrio = $negocio->propietario;
        $propietario = Propietarios::find($codigo_pptrio);
        $propietario->paso = "Planes";
        $propietario->save();

        return view('gracias', ['cpvj' => $request->cpvj], ['tipo' => $id->horizontal]);
    }
}
