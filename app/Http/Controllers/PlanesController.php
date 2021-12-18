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

    public function store(Request $request, Propiedades $id)
    {
        $negocio = Negocios::where('propiedad', $id->id)->first();
        
        if($request->modificar){
            $negocio->valor = $request->valor;
        }
        $negocio->plan = $request->plan;
        $negocio->save();

        $codigo_pptrio = $negocio->propietario;
        $propietario = Propietarios::find($codigo_pptrio);
        $propietario->paso = "Planes";
        $propietario->save();

        if($request->plan == '1'){
            return redirect()->route('fotos.show', $id);
        }else{
            
            return redirect()->route('gracias.show', $id);
        }
        
    }
}
