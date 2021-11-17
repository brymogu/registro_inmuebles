<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estados_inmueble;
use App\Models\Estratos;
use App\Models\Negocios;
use App\Models\Propiedades;
use App\Models\Propietarios;
use App\Models\Remodelados;
use App\Models\Tipos_documento;
use App\Models\Tipos_inmueble;
use App\Models\Tipos_negocios;
use Illuminate\Http\Request;

class EditController extends Controller
{
    //
    public function edit_table()
    {
        
        $propietarios = Propietarios::all();
        $todos_documentos = Tipos_documento::all();
        //return view('admin.edit')->with('propietarios',$propietarios)->with('tipo_doc',Tipos_documento::all());
        return view('admin.edit', compact('propietarios','todos_documentos'));
    }
    public function editform(Request $request){
        $codigo_pptario = $request->irForm;
        $propietario = Propietarios::find($codigo_pptario);
        $negocio_unico = Negocios::where('propietario', $codigo_pptario)->first();
        $negocio_tipo = Tipos_negocios::pluck('desc_tipo_negocio', 'id');
        $codigo_ppdad = $negocio_unico->propiedad;
        $propiedad = Propiedades::find($codigo_ppdad);
        $tipos_documento = Tipos_documento::pluck('desc_tipos_documento', 'id');
        $inmueble = Tipos_inmueble::pluck('desc_tipo_inmueble', 'id');
        $estratos = Estratos::pluck('estrato', 'id');
        $estado = Estados_inmueble::pluck('desc_estado', 'id');
        $remodelado = Remodelados::pluck('desc_remodelado', 'id');
        
        return view('admin.edit_form', compact('propiedad', 'propietario','tipos_documento','negocio_unico','negocio_tipo','inmueble','estratos','estado','remodelado'));

    }
}