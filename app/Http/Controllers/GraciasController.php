<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedades;
use App\Models\Negocios;
use App\Models\Propietarios;

class GraciasController extends Controller
{
    public function show($id)
    {
        $Propiedad = Propiedades::find($id);
        $tipo_inm =  $Propiedad->tipo_inmueble;

        $negocio = Negocios::where('propiedad', $id)->first();
        $codigo_pptrio = $negocio->propietario;
        $propietario = Propietarios::find($codigo_pptrio);

        return view('gracias', ['tipo' => $tipo_inm], compact('propietario'));
    }
}
