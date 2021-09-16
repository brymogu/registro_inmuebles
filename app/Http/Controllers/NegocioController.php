<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Estados_inmueble;
use App\Models\Tipos_documento;
use App\Models\Tipos_negocios;
use App\Models\Propiedades;
use App\Models\Propietarios;
use App\Models\Remodelados;
use App\Models\Tipos_inmueble;
use App\Models\Negocios;

use Illuminate\Support\Facades\Storage;
use Negocio;

class NegocioController extends Controller
{
    //
    public function show(Propietarios $propietario)
    {

        $tipos_documento = Tipos_documento::pluck('desc_tipos_documento', 'id');
        $negocio = Tipos_negocios::pluck('desc_tipo_negocio', 'id');
        $inmueble = Tipos_inmueble::pluck('desc_tipo_inmueble', 'id');
        $estado = Estados_inmueble::pluck('desc_estado', 'id');
        $remodelado = Remodelados::pluck('desc_remodelado', 'id');
        return view('negocio.negocio', compact('tipos_documento', 'negocio', 'inmueble', 'estado', 'remodelado'), ['tipo' => 'No', 'propietario' => $propietario]);
    }



    public function store(Request $request, Propietarios $propietario)
    {
        //Actualización Propietario        
        $propietario->doc_number = $request->idnumber;
        $propietario->tipo_doc = $request->id;
        $propietario->save();

        //Creación Propiedad
        $propiedad = new Propiedades();
        $propiedad->pqsolicita = $request->pqsolicita;
        $propiedad->tipo_inmueble = $request->tipo_inm;
        $propiedad->estrato = $request->estrato_inm;
        $propiedad->direccion = $request->direccion;
        $propiedad->direccion_comp = $request->direccion_comp;
        $propiedad->tiempo_inm = $request->tiempo_inm;
        $propiedad->estado = $request->estado_inb;
        $propiedad->remodelado = $request->remodelado;
        $propiedad->piso = $request->piso;

        // checks
        if ($request->espropietario) {
            $propiedad->espropietario = "Si";
        } else {
            $propiedad->espropietario = "No";
        }
        if ($request->conjunto) {
            $propiedad->horizontal = "Si";
        } else {
            $propiedad->horizontal = "No";
        }
        if ($request->habitado) {
            $propiedad->habitado = "Si";
        } else {
            $propiedad->habitado = "No";
        }
        if ($request->tuberia) {
            $propiedad->tuberia = "Si";
        } else {
            $propiedad->tuberia = "No";
        }
        if ($request->ascensor) {
            $propiedad->ascensor = "Si";
        } else {
            $propiedad->ascensor = "No";
        }
        if ($request->arrendado) {
            $propiedad->arrendado = "Si";
        } else {
            $propiedad->arrendado = "No";
        }
        $propiedad->certificado = Storage::put('public\certificados', $request->file('certificado'));
        $propiedad->save();

        $negocio = new Negocios();
        $negocio->propietario = $propietario->id;
        $negocio->propiedad = $propiedad->id;
        $negocio->tipo_negocio = $request->tipo;

        $negocio->valor = $request->valor;
        $negocio->save();

        return redirect()->route('detalles.show', $propiedad);
    }

    public function edit(Propiedades $propiedad)
    {
        $negocio_unico = Negocios::where('propiedad', $propiedad->id)->first();
        $codigo_pptrio = $negocio_unico->propietario;
        $propietario = Propietarios::find($codigo_pptrio);

        $tipos_documento = Tipos_documento::pluck('desc_tipos_documento', 'id');
        $negocio = Tipos_negocios::pluck('desc_tipo_negocio', 'id');
        $inmueble = Tipos_inmueble::pluck('desc_tipo_inmueble', 'id');
        $estado = Estados_inmueble::pluck('desc_estado', 'id');
        $remodelado = Remodelados::pluck('desc_remodelado', 'id');


        return view('negocio.edit', compact('propietario', 'propiedad', 'negocio_unico', 'tipos_documento', 'negocio', 'inmueble', 'estado', 'remodelado'), ['tipo' => $propiedad->horizontal]);
    }
}
