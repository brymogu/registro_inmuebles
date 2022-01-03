<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Acuerdos;
use App\Models\Conc_juridicos;
use App\Models\Negocios;
use App\Models\Planes;
use App\Models\Propiedades;


class FormatosController extends Controller
{
    public function cpvj(Request $request)
    {
        $codineg = $request->codineg;

        $datos = DB::table("negocios")
            ->where('negocios.id', '=', $codineg)
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
            ->select("negocios.id as id_neg", "negocios.propietario as id_pptario", "negocios.propiedad as id_ppdad", "negocios.tipo_negocio as id_tiponeg", "negocios.plan as id_plan", "negocios.conc_juridico as id_concjuridico", "propietarios.tipo_doc as id_tipodoc", "propiedades.tipo_inmueble as id_tipoinm", "propiedades.ciudad as id_ciudad", "propiedades.estrato as id_estrato", "propiedades.estado as id_estado", "propiedades.remodelado as id_remodelado", "propiedades.mat_habitacion as id_mathab", "propiedades.mat_piso_cocina as id_matpcocina", "propiedades.mat_piso_bano as id_matpbano", "propiedades.mat_piso_zsocial as id_matpsocial", "propiedades.nivel as id_nivel", "propiedades.tipo_garajes as id_tipogaraje", "propiedades.mb_cocina as id_mbcocina", "propiedades.tipo_estufa as id_tipoest", "propiedades.tipo_horno as id_tipohor", "propiedades.tipo_cocina as id_tipococ", "propiedades.tipo_calentador as id_calentador", "propiedades.tipo_vista as id_vista", "propiedades.zona_social as id_zonasocial", "propiedades.material_fachada as id_matfachada", "propiedades.tipo_vigilancia as id_tipovigilancia", "propiedades.tipo_seguridad as id_tiposeguridad", "propiedades.tipo_cuota as id_tipocuota", "propietarios.name", "propietarios.lastname", "propietarios.doc_number", "tipos_documentos.desc_tipos_documento", "propietarios.email", "propietarios.phone", "propietarios.paso", "tipos_negocios.desc_tipo_negocio as tipo_negocio", "planes.desc_plan as plan", "negocios.valor", "negocios.conc_precio", "negocios.precio_contrato", "conc_juridicos.des_conc_juridicos as conc_juridico", "negocios.obs_conc_juridico", "negocios.cpvj", "negocios.asesor", "tipos_inmuebles.desc_tipo_inmueble as tipo_inmueble", "propiedades.espropietario", "propiedades.pqsolicita", "propiedades.horizontal", "propiedades.arrendado", "estratos.estrato", "ciudades.desc_ciudades as ciudad", "propiedades.direccion", "propiedades.direccion_comp", "propiedades.tiempo_inm", "propiedades.longitud", "propiedades.latitud", "estados_inmuebles.desc_estado as estado", "remodelados.desc_remodelado as remodelado", "propiedades.tuberia", "propiedades.piso", "propiedades.ascensor", "propiedades.a_construida", "propiedades.a_privada", "propiedades.a_terreno", "mats_piso_habitacions.desc_mats_piso_habitaciones as mat_habitacion", "mats_piso_cocinas.desc_mats_piso_cocina as mat_piso_cocina", "mats_piso_banos.desc_mats_piso_bano as mat_piso_bano", "mats_piso_zsocials.desc_mats_piso_zsocial as mat_piso_zsocial", "niveles.des_nivel as nivel", "propiedades.n_hab", "propiedades.n_banos", "tipo_garajes.tipo_garajes as tipo_garaje", "propiedades.tiene_garajes", "propiedades.gje_cubierto", "propiedades.no_garajes", "mb_cocinas.desc_mbs_cocina as mb_cocina", "tipos_estufas.desc_tipos_estufa as tipo_estufa", "tipos_hornos.desc_tipos_horno as tipo_horno", "tipos_cocinas.desc_tipos_cocina as tipo_cocina", "calentadores.desc_tipos_calentador as tipo_calentador", "vistas.desc_vista as tipo_vista", "zonas_sociales.desc_zona_social as zona_social", "materiales_fachadas.desc_mats_fachada as material_fachada", "propiedades.terraza", "propiedades.area_terraza", "propiedades.chimenea", "propiedades.balcon", "propiedades.area_balcon", "propiedades.b_servicio", "propiedades.b_social", "propiedades.estudio", "propiedades.deposito", "propiedades.hab_servicio", "propiedades.star", "propiedades.zona_lavanderia", "propiedades.patio", "propiedades.entrega_cortinas", "propiedades.piscina_privada", "propiedades.sauna_privada", "propiedades.turco_privado", "propiedades.jacuzzi_privado", "propiedades.tina_privada", "propiedades.aire_privado", "propiedades.calefaccion_privada", "tipos_vigilancias.desc_tipo_vigilancia as tipo_vigilancia", "tipos_seguridads.desc_tipo_seguridad as tipo_seguridad", "tipos_cuotas.desc_tipo_cuota as tipo_cuota", "propiedades.nombre_c_e", "propiedades.adm_cp", "propiedades.adm_cd", "propiedades.pq_visitantes", "propiedades.bicicletero", "propiedades.s_social", "propiedades.bbq", "propiedades.s_juntas", "propiedades.p_infantil", "propiedades.gimnasio", "propiedades.turco", "propiedades.sauna", "propiedades.c_squash", "propiedades.c_tenis", "propiedades.c_multiple", "propiedades.s_juegos", "propiedades.s_estudio", "propiedades.lavanderia_c", "propiedades.planta_e", "propiedades.certificado", "propiedades.habitado", "propiedades.piscina", "propiedades.n_ascensores", "propiedades.jardin_interior", "propiedades.chip", "propiedades.matricula", "propiedades.barrio_catastral", "propiedades.upz", "propiedades.localidad")
            ->get();

        $conc_juridico = Conc_juridicos::pluck('des_conc_juridicos', 'id');
        $todos_planes = Planes::Pluck('desc_plan', 'id');
        $acuerdos = Acuerdos::find(1);

        return view('admin.descargas.cpvj', compact('datos', 'conc_juridico', 'todos_planes','acuerdos'));
    }

    public function update(Request $request, Negocios $codineg)
    {
        //Negocio
        $codineg->conc_precio = $request->conc_precio_edit;
        $codineg->conc_juridico = $request->conc_juridico_edit;
        $codineg->obs_conc_juridico = $request->obs_conc_juridico_edit;
        $codineg->precio_contrato = $request->precio_contrato_edit;

        //Propiedad
        $propiedad = Propiedades::find($codineg->propiedad);
        $propiedad->chip = $request->chip_edit;
        $propiedad->matricula = $request->matricula_edit;
        $propiedad->barrio_catastral = $request->barrio_catastral_edit;
        $propiedad->upz = $request->upz_edit;
        $propiedad->localidad = $request->localidad_edit;

        $codineg->save();
        $propiedad->save();

        return redirect()->route('administrador.formatos', $codineg->id);
    }

}
