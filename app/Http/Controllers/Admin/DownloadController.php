<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Negocios;
use App\Models\Propietarios;
use App\Models\Tipos_documento;

class DownloadController extends Controller {

    public function showtable()
    {
        
        $propietarios = Propietarios::all();
        //$propietarios = Propietarios::where('paso' , 'Planes')->get();
        $todos_documentos = Tipos_documento::all();
        $negocios = Negocios::all();
        //return view('admin.edit')->with('propietarios',$propietarios)->with('tipo_doc',Tipos_documento::all());
        return view('admin.download', compact('propietarios','todos_documentos'));
    }

    public function showfile(){
        
    }
    
}