<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Negocios;
use App\Models\Propiedades;
use App\Models\Propietarios;
use App\Models\Tipos_documento;
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
        $negocio = Negocios::where('propietario', $codigo_pptario)->first();
        $negocio_unico = Negocios::where('propiedad', $request->id)->first();
        $codigo_ppdad = $negocio->propiedad;
        $propiedad = Propiedades::find($codigo_ppdad);
        $tipos_documento = Tipos_documento::pluck('desc_tipos_documento', 'id');

        return view('admin.edit_form', compact('propiedad', 'propietario','tipos_documento','negocio','negocio_unico'));

    }
}