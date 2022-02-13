<?php

namespace App\Http\Controllers;

use App\Models\Tipos_vigilancia;
use App\Models\Tipos_seguridad;
use App\Models\Tipos_cuotas;
use App\Models\Negocios;
use App\Models\Propietarios;
use App\Models\Propiedades;

use Illuminate\Http\Request;


class ConjuntoController extends Controller
{
    //
    public function show($id)
    {

        $propiedad = Propiedades::find($id);

        if ($propiedad->horizontal == "Si") {

            $vigilancia = Tipos_vigilancia::pluck('desc_tipo_vigilancia', 'id');
            $seguridad = Tipos_seguridad::pluck('desc_tipo_seguridad', 'id');
            $cuota = Tipos_cuotas::pluck('desc_tipo_cuota', 'id');

            return view('conjunto.conjunto', compact('vigilancia', 'seguridad', 'cuota'), ['tipo' => $propiedad->horizontal, 'propiedad' => $id]);
        } else {
            return redirect()->route('planes.show', $id);
        }
    }

    public function store(Request $request, $id)
    {
        $Propiedad = Propiedades::find($id);
        $Propiedad->tipo_vigilancia = $request->vigilancia;
        $Propiedad->tipo_seguridad = $request->seguridad;
        $Propiedad->tipo_cuota = $request->t_cuota;
        $Propiedad->nombre_c_e = $request->nombre_c_e;
        $Propiedad->adm_cp = $request->adm_cp;
        $Propiedad->adm_cd = $request->adm_cd;

        // checks
        if ($request->pq_visitantes) {
            $Propiedad->pq_visitantes = "Si";
        } else {
            $Propiedad->pq_visitantes = "No";
        }

        if ($request->bicicletero) {
            $Propiedad->bicicletero = "Si";
        } else {
            $Propiedad->bicicletero = "No";
        }

        if ($request->s_social) {
            $Propiedad->s_social = "Si";
        } else {
            $Propiedad->s_social = "No";
        }

        if ($request->bbq) {
            $Propiedad->bbq = "Si";
        } else {
            $Propiedad->bbq = "No";
        }

        if ($request->s_juntas) {
            $Propiedad->s_juntas = "Si";
        } else {
            $Propiedad->s_juntas = "No";
        }

        if ($request->p_infantil) {
            $Propiedad->p_infantil = "Si";
        } else {
            $Propiedad->p_infantil = "No";
        }

        if ($request->gimnasio) {
            $Propiedad->gimnasio = "Si";
        } else {
            $Propiedad->gimnasio = "No";
        }

        if ($request->turco) {
            $Propiedad->turco = "Si";
        } else {
            $Propiedad->turco = "No";
        }

        if ($request->sauna) {
            $Propiedad->sauna = "Si";
        } else {
            $Propiedad->sauna = "No";
        }

        if ($request->c_squash) {
            $Propiedad->c_squash = "Si";
        } else {
            $Propiedad->c_squash = "No";
        }

        if ($request->c_tenis) {
            $Propiedad->c_tenis = "Si";
        } else {
            $Propiedad->c_tenis = "No";
        }

        if ($request->c_multiple) {
            $Propiedad->c_multiple = "Si";
        } else {
            $Propiedad->c_multiple = "No";
        }

        if ($request->s_juegos) {
            $Propiedad->s_juegos = "Si";
        } else {
            $Propiedad->s_juegos = "No";
        }

        if ($request->s_estudio) {
            $Propiedad->s_estudio = "Si";
        } else {
            $Propiedad->s_estudio = "No";
        }

        if ($request->lavanderia_c) {
            $Propiedad->lavanderia_c = "Si";
        } else {
            $Propiedad->lavanderia_c = "No";
        }

        if ($request->planta_e) {
            $Propiedad->planta_e = "Si";
        } else {
            $Propiedad->planta_e = "No";
        }

        if ($request->piscina) {
            $Propiedad->piscina = "Si";
        } else {
            $Propiedad->piscina = "No";
        }

        $Propiedad->save();

        $negocio = Negocios::where('propiedad', $Propiedad->id)->first();
        $negocio->paso = "Conjunto";
        $negocio->save();

        $codigo_pptrio = $negocio->propietario;
        $propietario = Propietarios::find($codigo_pptrio);
        $propietario->save();

        return redirect()->route('planes.show', $Propiedad);
    }

    public function edit(Propiedades $propiedad)
    {
        if ($propiedad->horizontal == "Si") {

            $vigilancia = Tipos_vigilancia::pluck('desc_tipo_vigilancia', 'id');
            $seguridad = Tipos_seguridad::pluck('desc_tipo_seguridad', 'id');
            $cuota = Tipos_cuotas::pluck('desc_tipo_cuota', 'id');

            return view('conjunto.edit', compact('vigilancia', 'seguridad', 'cuota'), ['tipo' => $propiedad->horizontal, 'propiedad' => $propiedad]);
        } else {
            return redirect()->route('planes.show', $propiedad);
        }
    }

    public function update(Request $request, Propiedades $propiedad)
    {
        $propiedad->tipo_vigilancia = $request->vigilancia;
        $propiedad->tipo_seguridad = $request->seguridad;
        $propiedad->tipo_cuota = $request->t_cuota;
        $propiedad->nombre_c_e = $request->nombre_c_e;
        $propiedad->adm_cp = $request->adm_cp;
        $propiedad->adm_cd = $request->adm_cd;

        // checks
        if ($request->pq_visitantes) {
            $propiedad->pq_visitantes = "Si";
        } else {
            $propiedad->pq_visitantes = "No";
        }

        if ($request->bicicletero) {
            $propiedad->bicicletero = "Si";
        } else {
            $propiedad->bicicletero = "No";
        }

        if ($request->s_social) {
            $propiedad->s_social = "Si";
        } else {
            $propiedad->s_social = "No";
        }

        if ($request->bbq) {
            $propiedad->bbq = "Si";
        } else {
            $propiedad->bbq = "No";
        }

        if ($request->s_juntas) {
            $propiedad->s_juntas = "Si";
        } else {
            $propiedad->s_juntas = "No";
        }

        if ($request->p_infantil) {
            $propiedad->p_infantil = "Si";
        } else {
            $propiedad->p_infantil = "No";
        }

        if ($request->gimnasio) {
            $propiedad->gimnasio = "Si";
        } else {
            $propiedad->gimnasio = "No";
        }

        if ($request->turco) {
            $propiedad->turco = "Si";
        } else {
            $propiedad->turco = "No";
        }

        if ($request->sauna) {
            $propiedad->sauna = "Si";
        } else {
            $propiedad->sauna = "No";
        }

        if ($request->c_squash) {
            $propiedad->c_squash = "Si";
        } else {
            $propiedad->c_squash = "No";
        }

        if ($request->c_tenis) {
            $propiedad->c_tenis = "Si";
        } else {
            $propiedad->c_tenis = "No";
        }

        if ($request->c_multiple) {
            $propiedad->c_multiple = "Si";
        } else {
            $propiedad->c_multiple = "No";
        }

        if ($request->s_juegos) {
            $propiedad->s_juegos = "Si";
        } else {
            $propiedad->s_juegos = "No";
        }

        if ($request->s_estudio) {
            $propiedad->s_estudio = "Si";
        } else {
            $propiedad->s_estudio = "No";
        }

        if ($request->lavanderia_c) {
            $propiedad->lavanderia_c = "Si";
        } else {
            $propiedad->lavanderia_c = "No";
        }

        if ($request->planta_e) {
            $propiedad->planta_e = "Si";
        } else {
            $propiedad->planta_e = "No";
        }

        if ($request->piscina) {
            $propiedad->piscina = "Si";
        } else {
            $propiedad->piscina = "No";
        }

        if ($request->jardin_interior) {
            $propiedad->jardin_interior = "Si";
        } else {
            $propiedad->jardin_interior = "No";
        }


        $propiedad->save();

        return redirect()->route('planes.show', $propiedad);
    }
}
