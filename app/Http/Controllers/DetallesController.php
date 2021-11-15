<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mats_piso_habitacion;
use App\Models\Mats_piso_cocina;
use App\Models\Mats_piso_bano;
use App\Models\Mats_piso_zsocial;
use App\Models\Mb_cocina;
use App\Models\Tipos_estufa;
use App\Models\Tipos_horno;
use App\Models\Tipos_cocina;
use App\Models\Calentadores;
use App\Models\Vista;
use App\Models\Zonas_sociales;
use App\Models\Materiales_fachada;
use App\Models\Negocios;
use App\Models\Niveles;
use App\Models\Propietarios;
use App\Models\Propiedades as Inmueble;

use Propiedades;

class DetallesController extends Controller
{
    public function show($id)
    {

        $niveles = Niveles::pluck('des_nivel', 'id');
        $mat_habitaciones = Mats_piso_habitacion::pluck('desc_mats_piso_habitaciones', 'id');
        $mat_cocina = Mats_piso_cocina::pluck('desc_mats_piso_cocina', 'id');
        $mat_bano = Mats_piso_bano::pluck('desc_mats_piso_bano', 'id');
        $mat_zsocial = Mats_piso_zsocial::pluck('desc_mats_piso_zsocial', 'id');
        $mb_cocina = Mb_cocina::pluck('desc_mbs_cocina', 'id');
        $estufa = Tipos_estufa::pluck('desc_tipos_estufa', 'id');
        $horno = Tipos_horno::pluck('desc_tipos_horno', 'id');
        $tipo_cocina = Tipos_cocina::pluck('desc_tipos_cocina', 'id');
        $calentador = Calentadores::pluck('desc_tipos_calentador', 'id');
        $vista = Vista::pluck('desc_vista', 'id');
        $zonas = Zonas_sociales::pluck('desc_zona_social', 'id');
        $mat_fachada = Materiales_fachada::pluck('desc_mats_fachada', 'id');

        $Propiedad = Inmueble::find($id);

        return view(
            'detalles.detalles',
            compact(
                'niveles',              
                'mat_habitaciones',
                'mat_cocina',
                'mat_bano',
                'mat_zsocial',
                'mb_cocina',
                'estufa',
                'horno',
                'tipo_cocina',
                'calentador',
                'vista',
                'zonas',
                'mat_fachada'
            ),
            ['tipo' => $Propiedad->horizontal, 'tipo_inm' => $Propiedad->tipo_inmueble, 'propiedad' => $id]
        );
    }
    public function store(Request $request, $id)
    {
        $Propiedad = Inmueble::find($id);
        $Propiedad->a_construida = $request->a_construida;
        $Propiedad->a_privada = $request->a_privada;
        $Propiedad->a_terreno = $request->a_terreno;
        $Propiedad->nivel = $request->niveles;
        $Propiedad->n_hab = $request->n_hab;
        $Propiedad->n_banos = $request->no_banos;
        $Propiedad->no_garajes = $request->no_garajes;
        $Propiedad->mat_habitacion = $request->material_hab;
        $Propiedad->mat_piso_cocina = $request->mp_cocina;
        $Propiedad->mat_piso_bano = $request->mat_piso_bano;
        $Propiedad->mat_piso_zsocial = $request->mat_piso_zona_social;
        $Propiedad->mb_cocina = $request->mb_cocina;
        $Propiedad->tipo_estufa = $request->estufa;
        $Propiedad->tipo_horno = $request->horno;
        $Propiedad->tipo_cocina = $request->tp_cocina;
        $Propiedad->tipo_calentador = $request->calentador;
        $Propiedad->tipo_vista = $request->vista;
        $Propiedad->zona_social = $request->zona_social;
        $Propiedad->material_fachada = $request->material_fachada;

        // checks
        if ($request->terraza) {
            $Propiedad->terraza = "Si";
        } else {
            $Propiedad->terraza = "No";
        }

        if ($request->chimenea) {
            $Propiedad->chimenea = "Si";
        } else {
            $Propiedad->chimenea = "No";
        }

        if ($request->balcon) {
            $Propiedad->balcon = "Si";
        } else {
            $Propiedad->balcon = "No";
        }

        if ($request->b_servicio) {
            $Propiedad->b_servicio = "Si";
        } else {
            $Propiedad->b_servicio = "No";
        }

        if ($request->b_social) {
            $Propiedad->b_social = "Si";
        } else {
            $Propiedad->b_social = "No";
        }

        if ($request->estudio) {
            $Propiedad->estudio = "Si";
        } else {
            $Propiedad->estudio = "No";
        }

        if ($request->deposito) {
            $Propiedad->deposito = "Si";
        } else {
            $Propiedad->deposito = "No";
        }

        if ($request->hab_servicio) {
            $Propiedad->hab_servicio = "Si";
        } else {
            $Propiedad->hab_servicio = "No";
        }

        if ($request->star) {
            $Propiedad->star = "Si";
        } else {
            $Propiedad->star = "No";
        }

        if ($request->zona_lavanderia) {
            $Propiedad->zona_lavanderia = "Si";
        } else {
            $Propiedad->zona_lavanderia = "No";
        }

        if ($request->patio) {
            $Propiedad->patio = "Si";
        } else {
            $Propiedad->patio = "No";
        }

        if ($request->entrega_cortinas) {
            $Propiedad->entrega_cortinas = "Si";
        } else {
            $Propiedad->entrega_cortinas = "No";
        }

        if ($request->piscina_p) {
            $Propiedad->piscina_privada = "Si";
        } else {
            $Propiedad->piscina_privada = "No";
        }

        if ($request->sauna_p) {
            $Propiedad->sauna_privada = "Si";
        } else {
            $Propiedad->sauna_privada = "No";
        }

        if ($request->turco_p) {
            $Propiedad->turco_privado = "Si";
        } else {
            $Propiedad->turco_privado = "No";
        }

        if ($request->jacuzzi_p) {
            $Propiedad->jacuzzi_privado = "Si";
        } else {
            $Propiedad->jacuzzi_privado = "No";
        }

        if ($request->tina_p) {
            $Propiedad->tina_privada = "Si";
        } else {
            $Propiedad->tina_privada = "No";
        }

        if ($request->aire_p) {
            $Propiedad->aire_privado = "Si";
        } else {
            $Propiedad->aire_privado = "No";
        }

        
        if ($request->calefaccion_p) {
            $Propiedad->calefaccion_privada = "Si";
        } else {
            $Propiedad->calefaccion_privada = "No";
        }

        if ($request->garaje_c) {
            $Propiedad->garaje_c = "Si";
        } else {
            $Propiedad->garaje_c = "No";
        }

        if ($request->garaje) {
            $Propiedad->tiene_garaje = "Si";
        } else {
            $Propiedad->tiene_garaje = "No";
        }

        $Propiedad->save();

        $negocio_unico = Negocios::where('propiedad', $Propiedad->id)->first();
        $codigo_pptrio = $negocio_unico->propietario;
        $propietario = Propietarios::find($codigo_pptrio);
        $propietario->paso = "Detalles";
        $propietario->save();

        return redirect()->route('conjunto.show', $Propiedad);
    }
    public function edit(Inmueble $propiedad)
    {
        $niveles = Niveles::pluck('des_nivel', 'id');        
        $mat_habitaciones = Mats_piso_habitacion::pluck('desc_mats_piso_habitaciones', 'id');
        $mat_cocina = Mats_piso_cocina::pluck('desc_mats_piso_cocina', 'id');
        $mat_bano = Mats_piso_bano::pluck('desc_mats_piso_bano', 'id');
        $mat_zsocial = Mats_piso_zsocial::pluck('desc_mats_piso_zsocial', 'id');
        $mb_cocina = Mb_cocina::pluck('desc_mbs_cocina', 'id');
        $estufa = Tipos_estufa::pluck('desc_tipos_estufa', 'id');
        $horno = Tipos_horno::pluck('desc_tipos_horno', 'id');
        $tipo_cocina = Tipos_cocina::pluck('desc_tipos_cocina', 'id');
        $calentador = Calentadores::pluck('desc_tipos_calentador', 'id');
        $vista = Vista::pluck('desc_vista', 'id');
        $zonas = Zonas_sociales::pluck('desc_zona_social', 'id');
        $mat_fachada = Materiales_fachada::pluck('desc_mats_fachada', 'id');

        return view(
            'detalles.edit',
            compact(
                'niveles',
                'mat_habitaciones',
                'mat_cocina',
                'mat_bano',
                'mat_zsocial',
                'mb_cocina',
                'estufa',
                'horno',
                'tipo_cocina',
                'calentador',
                'vista',
                'zonas',
                'mat_fachada'
            ),
            ['tipo' => $propiedad->horizontal, 'tipo_inm' => $propiedad->tipo_inmueble, 'propiedad' => $propiedad]
        );
    }

    public function update(Request $request, Inmueble $propiedad)
    {
        $propiedad->a_construida = $request->a_construida;
        $propiedad->a_privada = $request->a_privada;
        $propiedad->a_terreno = $request->a_terreno;
        $propiedad->nivel = $request->niveles;
        $propiedad->n_hab = $request->n_hab;
        $propiedad->n_banos = $request->no_banos;
        $propiedad->no_garajes = $request->no_garajes;
        $propiedad->mat_habitacion = $request->material_hab;
        $propiedad->mat_piso_cocina = $request->mp_cocina;
        $propiedad->mat_piso_bano = $request->mat_piso_bano;
        $propiedad->mat_piso_zsocial = $request->mat_piso_zona_social;
        $propiedad->mb_cocina = $request->mb_cocina;
        $propiedad->tipo_estufa = $request->estufa;
        $propiedad->tipo_horno = $request->horno;
        $propiedad->tipo_cocina = $request->tp_cocina;
        $propiedad->tipo_calentador = $request->calentador;
        $propiedad->tipo_vista = $request->vista;
        $propiedad->zona_social = $request->zona_social;
        $propiedad->material_fachada = $request->material_fachada;

        // checks
        if ($request->terraza) {
            $propiedad->terraza = "Si";
        } else {
            $propiedad->terraza = "No";
        }

        if ($request->chimenea) {
            $propiedad->chimenea = "Si";
        } else {
            $propiedad->chimenea = "No";
        }

        if ($request->balcon) {
            $propiedad->balcon = "Si";
        } else {
            $propiedad->balcon = "No";
        }

        if ($request->b_servicio) {
            $propiedad->b_servicio = "Si";
        } else {
            $propiedad->b_servicio = "No";
        }

        if ($request->b_social) {
            $propiedad->b_social = "Si";
        } else {
            $propiedad->b_social = "No";
        }

        if ($request->estudio) {
            $propiedad->estudio = "Si";
        } else {
            $propiedad->estudio = "No";
        }

        if ($request->deposito) {
            $propiedad->deposito = "Si";
        } else {
            $propiedad->deposito = "No";
        }

        if ($request->hab_servicio) {
            $propiedad->hab_servicio = "Si";
        } else {
            $propiedad->hab_servicio = "No";
        }

        if ($request->star) {
            $propiedad->star = "Si";
        } else {
            $propiedad->star = "No";
        }

        if ($request->zona_lavanderia) {
            $propiedad->zona_lavanderia = "Si";
        } else {
            $propiedad->zona_lavanderia = "No";
        }

        if ($request->patio) {
            $propiedad->patio = "Si";
        } else {
            $propiedad->patio = "No";
        }

        if ($request->entrega_cortinas) {
            $propiedad->entrega_cortinas = "Si";
        } else {
            $propiedad->entrega_cortinas = "No";
        }

        if ($request->piscina_p) {
            $propiedad->piscina_privada = "Si";
        } else {
            $propiedad->piscina_privada = "No";
        }

        if ($request->sauna_p) {
            $propiedad->sauna_privada = "Si";
        } else {
            $propiedad->sauna_privada = "No";
        }

        if ($request->turco_p) {
            $propiedad->turco_privado = "Si";
        } else {
            $propiedad->turco_privado = "No";
        }

        if ($request->jacuzzi_p) {
            $propiedad->jacuzzi_privado = "Si";
        } else {
            $propiedad->jacuzzi_privado = "No";
        }

        if ($request->tina_p) {
            $propiedad->tina_privada = "Si";
        } else {
            $propiedad->tina_privada = "No";
        }

        if ($request->aire_p) {
            $propiedad->aire_privado = "Si";
        } else {
            $propiedad->aire_privado = "No";
        }

        if ($request->aire_p) {
            $propiedad->aire_privado = "Si";
        } else {
            $propiedad->aire_privado = "No";
        }

        if ($request->calefaccion_p) {
            $propiedad->calefaccion_privada = "Si";
        } else {
            $propiedad->calefaccion_privada = "No";
        }

        if ($request->garaje_c) {
            $propiedad->garaje_c = "Si";
        } else {
            $propiedad->garaje_c = "No";
        }

        if ($request->garaje_i) {
            $propiedad->garaje_i = "Si";
        } else {
            $propiedad->garaje_i = "No";
        }

        if ($request->garaje_c) {
            $propiedad->garaje_c = "Si";
        } else {
            $propiedad->garaje_c = "No";
        }

        $propiedad->save();
        return redirect()->route('conjunto.show', $propiedad);
    }
}
