<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class InicioController extends Controller
{
    //
    public function show()
    {
        session_start();

        if (isset($_SESSION['nombre'])) {
            $solodatos = DB::table("negocios")
                ->leftJoin("propietarios", function ($join) {
                    $join->on("negocios.propietario", "=", "propietarios.id");
                })
                ->select("negocios.id as id_neg", "negocios.created_at", "propietarios.id as id_pptario", "propietarios.email", "propietarios.full_number", "propietarios.name", "propietarios.lastname", "negocios.paso")
                ->where("negocios.paso", '!=', "final")
                ->get();


            $venta = DB::table("negocios")
                ->where("tipo_negocio", 1)
                ->where("paso", "final")
                ->count();

            $arriendo = DB::table("negocios")
                ->where("tipo_negocio", 2)
                ->where("paso", "final")
                ->count();

            $apartamentos = DB::table("propiedades")
                ->where("tipo_inmueble", 2)
                ->count();
            $casas = DB::table("propiedades")
                ->where("tipo_inmueble", 1)
                ->count();


            return view('admin.main', compact('venta', 'arriendo', 'apartamentos', 'casas', 'solodatos'));
        }

        return redirect('login');
    }
}
