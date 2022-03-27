<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Negocios;
use App\Models\Planes;
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
        $planes = Planes::pluck('desc_plan', 'id');

        if ($tipo_negocio == '1') {
            return view('planes.venta', compact('planes'), ['valor' => $valor, 'tipo' => $Propiedad->horizontal]);
        } else if ($tipo_negocio == '2') {
            return view('planes.arriendo', compact('planes'), ['valor' => $valor, 'tipo' => $Propiedad->horizontal]);
        }
    }

    public function store(Request $request, Propiedades $id)
    {
        $negocio = Negocios::where('propiedad', $id->id)->first();

        if ($request->modificar) {
            $negocio->valor = $request->valor;
        }
        $negocio->plan = $request->plan;
        $negocio->paso = "Final";
        $negocio->save();

        $codigo_pptrio = $negocio->propietario;
        $propietario = Propietarios::find($codigo_pptrio);
        $propietario->save();

        if ($request->plan == '1') {
            return redirect()->route('fotos.show', $id);
        } else {

            return redirect()->route('gracias.show', $id);
        }
    }
}
