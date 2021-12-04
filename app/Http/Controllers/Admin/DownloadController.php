<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Propiedades;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use League\CommonMark\Inline\Element\Strong;


class DownloadController extends Controller {

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
        
        

        return view('admin.download', compact('negocios'));
    }

    //public function download_public( ) {
        //if (Storage::disk('public')->exists("certificados/$propiedad->certificado")) {
           // $path = Storage::disk('public')->path("certificados/$propiedad->certificado");
            //$content = file_get_contents($path);
            //return redirect()->route('download_public',$propiedad->certificado);
            //return response($content)->withHeaders(['Content-Type'=>mime_content_type($path)]);
       // } 
        //return redirect("/404");
      //  $path = Storage::url('public/certificados/0owTScXvNsDOYsQ34DxYvnCqYgvA5iIJ7rpyO5vS.pdf');

     //   return redirect()->route('download_public',$path);
    //}

    
}