<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use Illuminate\Http\Request;
use App\Models\Estados_inmueble;
use App\Models\Estratos;
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
    public function show(Negocios $negocio)
    {
        $propietario = Propietarios::find($negocio->propietario);
        $tipos_documento = Tipos_documento::pluck('desc_tipos_documento', 'id');
        $tipo_negocio = Tipos_negocios::pluck('desc_tipo_negocio', 'id');
        $inmueble = Tipos_inmueble::pluck('desc_tipo_inmueble', 'id');
        $estratos = Estratos::pluck('estrato', 'id');
        $estado = Estados_inmueble::pluck('desc_estado', 'id');
        $remodelado = Remodelados::pluck('desc_remodelado', 'id');
        $ciudad = Ciudades::pluck('desc_ciudades', 'id');

        return view('negocio.negocio', compact('tipos_documento', 'ciudad', 'negocio','tipo_negocio', 'inmueble', 'estratos', 'estado', 'remodelado'), ['tipo' => 'No', 'propietario' => $propietario]);
    }
    public function store(Request $request, Negocios $negocio)
    {

        $propietario = Propietarios::find($negocio->propietario);
        //Actualización Propietario        
        $propietario->doc_number = $request->idnumber;
        $propietario->tipo_doc = $request->id;
        $propietario->save();

        //Creación Propiedad
        $propiedad = new Propiedades();
        //directos 
        $propiedad->tipo_inmueble = $request->tipo_inm;
        $propiedad->estrato = $request->estrato_inm;
        $propiedad->ciudad = 1;
        $propiedad->direccion = $request->direccion;
        $propiedad->estado = $request->estado_inb;

        //condicionados
        if ($request->tipo_inm == 2) {
            $propiedad->piso = $request->piso;
            if ($request->ascensor) {
                $propiedad->ascensor = "Si";
                $propiedad->n_ascensores = $request->n_ascensores;
            } else {
                $propiedad->ascensor = "No";
            }
        }

        if ($request->estado_inb == 4) {
            $propiedad->tiempo_inm = $request->tiempo_inm;
            $propiedad->remodelado = $request->remodelado;
            if ($request->remodelado == 1) {
                if ($request->tuberia) {
                    $propiedad->tuberia = "Si";
                } else {
                    $propiedad->tuberia = "No";
                }
            }
        }

        // checks
        if ($request->espropietario) {
            $propiedad->espropietario = "Si";            
        } else {
            $propiedad->espropietario = "No";
            $propiedad->pqsolicita = $request->pqsolicita;
        }

        if ($request->conjunto  == "Si") {
            $propiedad->horizontal = "Si";
            $propiedad->direccion_comp = $request->direccion_comp;
        } else {
            $propiedad->horizontal = "No";
        }

        if ($request->habitado) {
            $propiedad->habitado = "Si";
            if ($request->arr_check) {
                $propiedad->arrendado = "Si";
            } else {
                $propiedad->arrendado = "No";
            }
        } else {
            $propiedad->habitado = "No";
        }


        $propiedad->certificado = Storage::put('public/certificados', $request->file('certificado'));
        $propiedad->save();

        $negocio->propiedad = $propiedad->id;
        $negocio->tipo_negocio = $request->tipo;
        $negocio->asesor = $request->asesor;
        $negocio->valor = $request->valor;
        $negocio->paso = "negocio";
        $negocio->save();

        return redirect()->route('detalles.show', $propiedad);
    }

    public function edit(Negocios $negocio)
    {
        $propietario = Propietarios::find($negocio->propietario);
        $propiedad = Propiedades::find($negocio->propiedad);
        $tipos_documento = Tipos_documento::pluck('desc_tipos_documento', 'id');
        $tipo_negocio = Tipos_negocios::pluck('desc_tipo_negocio', 'id');
        $inmueble = Tipos_inmueble::pluck('desc_tipo_inmueble', 'id');
        $estratos = Estratos::pluck('estrato', 'id');
        $estado = Estados_inmueble::pluck('desc_estado', 'id');
        $remodelado = Remodelados::pluck('desc_remodelado', 'id');

        return view('negocio.edit', compact('propietario', 'propiedad','tipo_negocio', 'negocio', 'tipos_documento', 'negocio', 'inmueble', 'estratos', 'estado', 'remodelado'), ['tipo' => $propiedad->horizontal]);
    }

    public function update(Request $request, Negocios $negocio)
    {
        $propiedad = Propiedades::find($negocio->propiedad);
        //directos
        $propiedad->tipo_inmueble = $request->tipo_inm;
        $propiedad->estrato = $request->estrato_inm;
        $propiedad->direccion = $request->direccion;
        $propiedad->estado = $request->estado_inb;
        $propiedad->longitud = $request->longitud;
        $propiedad->latitud = $request->latitud;

        //condicionados
        if ($request->tipo_inm == 2) {
            $propiedad->piso = $request->piso;
            if ($request->ascensor) {
                $propiedad->ascensor = "Si";
                $propiedad->n_ascensores = $request->n_ascensores;
            } else {
                $propiedad->ascensor = "No";
            }
        }

        if ($request->estado_inb == 4) {
            $propiedad->tiempo_inm = $request->tiempo_inm;
            $propiedad->remodelado = $request->remodelado;
            if ($request->remodelado == 1) {
                if ($request->tuberia) {
                    $propiedad->tuberia = "Si";
                } else {
                    $propiedad->tuberia = "No";
                }
            }
        }
        // checks
        if ($request->espropietario) {
            $propiedad->espropietario = "Si";
            $propiedad->pqsolicita = $request->pqsolicita;
        } else {
            $propiedad->espropietario = "No";
        }

        if ($request->conjunto  == "Si") {
            $propiedad->horizontal = "Si";
            $propiedad->direccion_comp = $request->direccion_comp;
        } else {
            $propiedad->horizontal = "No";
        }

        if ($request->habitado) {
            $propiedad->habitado = "Si";
            if ($request->arr_check) {
                $propiedad->arrendado = "Si";
            } else {
                $propiedad->arrendado = "No";
            }
        } else {
            $propiedad->habitado = "No";
        }

        if ($request->certificado != null) {
            $propiedad->certificado = Storage::put('public\certificados', $request->file('certificado'));
        }
        $propiedad->save();

        //Negocio

        $negocio->tipo_negocio = $request->tipo;
        $negocio->valor = $request->valor;
        $negocio->asesor = $request->asesor;
        $negocio->save();

        return redirect()->route('detalles.show', $propiedad);
    }
}
