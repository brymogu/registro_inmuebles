<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DownloadController extends Controller
{

    public function showtable()
    {

        session_start();

        if (isset($_SESSION['nombre'])) {
            $negocios = DB::table("negocios")
                ->leftJoin("propiedades", function ($join) {
                    $join->on("negocios.propiedad", "=", "propiedades.id");
                })
                ->leftJoin("propietarios", function ($join) {
                    $join->on("negocios.propietario", "=", "propietarios.id");
                })
                ->leftJoin("tipos_documentos", function ($join) {
                    $join->on("propietarios.tipo_doc", "=", "tipos_documentos.id");
                })
                ->leftJoin("planes", function ($join) {
                    $join->on("negocios.plan", "=", "planes.id");
                })
                ->leftJoin("tipos_negocios", function ($join) {
                    $join->on("negocios.tipo_negocio", "=", "tipos_negocios.id");
                })
                ->select("negocios.id as id_neg", "negocios.created_at", "propiedades.id as id_ppdad", "propietarios.id as id_pptario", "tipos_documentos.desc_nombres_corto", "propietarios.doc_number", "propietarios.name", "propietarios.lastname", "planes.id as id_plan", "tipos_negocios.id as id_tipo_neg", "propiedades.certificado", "planes.desc_plan", "tipos_negocios.desc_tipo_negocio", "tipos_documentos.id as id_tipos_doc", "negocios.paso","propiedades.latitud","propiedades.longitud")
                ->get();

            return view('admin.descargas.download', compact('negocios'));
        }
        return redirect('login');
    }
}
