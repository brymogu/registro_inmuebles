<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Negocios extends Model
{
    use HasFactory;

    public static function obtenernegocios($f_inicio, $f_final)
    {
        $datos = DB::table("negocios")
            ->where('negocios.created_at', '<=', $f_final)
            ->Where('negocios.created_at', '>=', $f_inicio)
            ->leftJoin("propietarios", function ($join) {
                $join->on("negocios.propietario", "=", "propietarios.id");
            })
            ->leftJoin("propiedades", function ($join) {
                $join->on("negocios.propiedad", "=", "propiedades.id");
            })
            ->leftJoin("tipos_documentos", function ($join) {
                $join->on("propietarios.tipo_doc", "=", "tipos_documentos.id");
            })
            ->leftJoin("tipos_negocios", function ($join) {
                $join->on("negocios.tipo_negocio", "=", "tipos_negocios.id");
            })
            ->leftJoin("planes", function ($join) {
                $join->on("negocios.plan", "=", "planes.id");
            })
            ->leftJoin("conc_juridicos", function ($join) {
                $join->on("negocios.conc_juridico", "=", "conc_juridicos.id");
            })
            ->leftJoin("tipos_inmuebles", function ($join) {
                $join->on("propiedades.tipo_inmueble", "=", "tipos_inmuebles.id");
            })
            ->leftJoin("estratos", function ($join) {
                $join->on("propiedades.estrato", "=", "estratos.id");
            })
            ->leftJoin("ciudades", function ($join) {
                $join->on("propiedades.ciudad", "=", "ciudades.id");
            })
            ->leftJoin("estados_inmuebles", function ($join) {
                $join->on("propiedades.estado", "=", "estados_inmuebles.id");
            })
            ->leftJoin("remodelados", function ($join) {
                $join->on("propiedades.remodelado", "=", "remodelados.id");
            })
            ->leftJoin("mats_piso_habitacions", function ($join) {
                $join->on("propiedades.mat_habitacion", "=", "mats_piso_habitacions.id");
            })
            ->leftJoin("mats_piso_cocinas", function ($join) {
                $join->on("propiedades.mat_piso_cocina", "=", "mats_piso_cocinas.id");
            })
            ->leftJoin("mats_piso_banos", function ($join) {
                $join->on("propiedades.mat_piso_bano", "=", "mats_piso_banos.id");
            })
            ->leftJoin("mats_piso_zsocials", function ($join) {
                $join->on("propiedades.mat_piso_zsocial", "=", "mats_piso_zsocials.id");
            })
            ->leftJoin("niveles", function ($join) {
                $join->on("propiedades.nivel", "=", "niveles.id");
            })
            ->leftJoin("tipo_garajes", function ($join) {
                $join->on("propiedades.tipo_garajes", "=", "tipo_garajes.id");
            })
            ->leftJoin("mb_cocinas", function ($join) {
                $join->on("propiedades.mb_cocina", "=", "mb_cocinas.id");
            })
            ->leftJoin("tipos_estufas", function ($join) {
                $join->on("propiedades.tipo_estufa", "=", "tipos_estufas.id");
            })
            ->leftJoin("tipos_hornos", function ($join) {
                $join->on("propiedades.tipo_horno", "=", "tipos_hornos.id");
            })
            ->leftJoin("tipos_cocinas", function ($join) {
                $join->on("propiedades.tipo_cocina", "=", "tipos_cocinas.id");
            })
            ->leftJoin("calentadores", function ($join) {
                $join->on("propiedades.tipo_calentador", "=", "calentadores.id");
            })
            ->leftJoin("vistas", function ($join) {
                $join->on("propiedades.tipo_vista", "=", "vistas.id");
            })
            ->leftJoin("zonas_sociales", function ($join) {
                $join->on("propiedades.zona_social", "=", "zonas_sociales.id");
            })
            ->leftJoin("materiales_fachadas", function ($join) {
                $join->on("propiedades.material_fachada", "=", "materiales_fachadas.id");
            })
            ->leftJoin("tipos_vigilancias", function ($join) {
                $join->on("propiedades.tipo_vigilancia", "=", "tipos_vigilancias.id");
            })
            ->leftJoin("tipos_seguridads", function ($join) {
                $join->on("propiedades.tipo_seguridad", "=", "tipos_seguridads.id");
            })
            ->leftJoin("tipos_cuotas", function ($join) {
                $join->on("propiedades.tipo_cuota", "=", "tipos_cuotas.id");
            })
            ->select("negocios.created_at", "propietarios.name", "propietarios.lastname", "tipos_documentos.desc_tipos_documento", "propietarios.doc_number",  "propietarios.email", "propietarios.phone", "negocios.paso", "tipos_negocios.desc_tipo_negocio as tipo_negocio", "planes.desc_plan as plan", "negocios.valor", "negocios.conc_precio", "negocios.precio_contrato", "conc_juridicos.des_conc_juridicos as conc_juridico", "negocios.obs_conc_juridico", "negocios.asesor", "tipos_inmuebles.desc_tipo_inmueble as tipo_inmueble", "propiedades.espropietario", "propiedades.pqsolicita", "propiedades.horizontal", "propiedades.arrendado", "estratos.estrato", "ciudades.desc_ciudades as ciudad", "propiedades.direccion", "propiedades.direccion_comp", "propiedades.tiempo_inm", "propiedades.longitud", "propiedades.latitud", "estados_inmuebles.desc_estado as estado", "remodelados.desc_remodelado as remodelado", "propiedades.tuberia", "propiedades.piso", "propiedades.ascensor", "propiedades.a_construida", "propiedades.a_privada", "propiedades.a_terreno", "mats_piso_habitacions.desc_mats_piso_habitaciones as mat_habitacion", "mats_piso_cocinas.desc_mats_piso_cocina as mat_piso_cocina", "mats_piso_banos.desc_mats_piso_bano as mat_piso_bano", "mats_piso_zsocials.desc_mats_piso_zsocial as mat_piso_zsocial", "niveles.des_nivel as nivel", "propiedades.n_hab", "propiedades.n_banos", "propiedades.tiene_garajes", "propiedades.no_garajes", "tipo_garajes.tipo_garajes as tipo_garaje", "propiedades.gje_cubierto",  "mb_cocinas.desc_mbs_cocina as mb_cocina", "tipos_estufas.desc_tipos_estufa as tipo_estufa", "tipos_hornos.desc_tipos_horno as tipo_horno", "tipos_cocinas.desc_tipos_cocina as tipo_cocina", "calentadores.desc_tipos_calentador as tipo_calentador", "vistas.desc_vista as tipo_vista", "zonas_sociales.desc_zona_social as zona_social", "materiales_fachadas.desc_mats_fachada as material_fachada", "propiedades.terraza", "propiedades.area_terraza", "propiedades.chimenea", "propiedades.balcon", "propiedades.area_balcon", "propiedades.b_servicio", "propiedades.b_social", "propiedades.estudio", "propiedades.deposito", "propiedades.hab_servicio", "propiedades.star", "propiedades.zona_lavanderia", "propiedades.patio", "propiedades.entrega_cortinas", "propiedades.piscina_privada", "propiedades.sauna_privada", "propiedades.turco_privado", "propiedades.jacuzzi_privado", "propiedades.tina_privada", "propiedades.aire_privado", "propiedades.calefaccion_privada", "tipos_vigilancias.desc_tipo_vigilancia as tipo_vigilancia", "tipos_seguridads.desc_tipo_seguridad as tipo_seguridad", "propiedades.nombre_c_e", "tipos_cuotas.desc_tipo_cuota as tipo_cuota", "propiedades.adm_cp", "propiedades.adm_cd", "propiedades.pq_visitantes", "propiedades.bicicletero", "propiedades.s_social", "propiedades.bbq", "propiedades.s_juntas", "propiedades.p_infantil", "propiedades.gimnasio", "propiedades.turco", "propiedades.sauna", "propiedades.c_squash", "propiedades.c_tenis", "propiedades.c_multiple", "propiedades.s_juegos", "propiedades.s_estudio", "propiedades.lavanderia_c", "propiedades.planta_e", "propiedades.habitado", "propiedades.piscina", "propiedades.n_ascensores", "propiedades.jardin_interior", "propiedades.chip", "propiedades.matricula", "propiedades.barrio_catastral", "propiedades.upz", "propiedades.localidad")
            ->get();

        return $datos;
    }
}
