<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AcuerdosController extends Controller
{
    public function showtable()
    {
        
        $negocios = DB::table("negocios")
        ->leftJoin("propiedades", function($join){
            $join->on("negocios.propiedad", "=", "propiedades.id");
        })
        ->leftJoin("propietarios", function($join){
            $join->on("negocios.propietario", "=", "propietarios.id");
        })
        ->leftJoin("tipos_documentos", function($join){
            $join->on("propietarios.tipo_doc", "=", "tipos_documentos.id");
        })
        ->leftJoin("planes", function($join){
            $join->on("negocios.plan", "=", "planes.id");
        })
        ->leftJoin("tipos_negocios", function($join){
            $join->on("negocios.tipo_negocio", "=", "tipos_negocios.id");
        })
        ->select("negocios.id", "negocios.created_at", "propiedades.id", "propietarios.id", "tipos_documentos.desc_nombres_corto", "propietarios.doc_number", "propietarios.name", "propietarios.lastname", "planes.id", "tipos_negocios.id", "propiedades.certificado", "planes.desc_plan", "tipos_negocios.desc_tipo_negocio", "tipos_documentos.id")
        ->get();
        
        return view('admin.acuerdos', compact('negocios'));
    }
}
