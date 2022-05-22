<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Calentadores;
use App\Models\Ciudades;
use App\Models\Conc_juridicos;
use App\Models\Estados_inmueble;
use App\Models\Estratos;
use App\Models\Materiales_fachada;
use App\Models\Mats_piso_bano;
use App\Models\Mats_piso_cocina;
use App\Models\Mats_piso_habitacion;
use App\Models\Mats_piso_zsocial;
use App\Models\Mb_cocina;
use App\Models\Negocios;
use App\Models\Niveles;
use App\Models\Propiedades;
use App\Models\Propietarios;
use App\Models\Remodelados;
use App\Models\tipo_garajes;
use App\Models\Tipos_cocina;
use App\Models\Tipos_cuotas;
use App\Models\Tipos_documento;
use App\Models\Tipos_estufa;
use App\Models\Tipos_horno;
use App\Models\Tipos_inmueble;
use App\Models\Tipos_negocios;
use App\Models\Tipos_seguridad;
use App\Models\Tipos_vigilancia;
use App\Models\Vista;
use App\Models\Zonas_sociales;

class RegistroController extends Controller
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
                ->leftJoin("tipos_inmuebles", function ($join) {
                    $join->on("propiedades.tipo_inmueble", "=", "tipos_inmuebles.id");
                })
                ->leftJoin("ciudades", function ($join) {
                    $join->on("propiedades.ciudad", "=", "ciudades.id");
                })
                ->select("negocios.id as id_neg", "ciudades.id as id_ciudad", "negocios.created_at", "propiedades.id as id_ppdad", "propietarios.id as id_pptario", "tipos_documentos.desc_nombres_corto", "propietarios.doc_number", "propietarios.email", "propietarios.full_number", "propietarios.phone","propietarios.name", "propietarios.lastname", "planes.id as id_plan", "tipos_negocios.id as id_tipo_neg", "propiedades.certificado", "planes.desc_plan", "tipos_negocios.desc_tipo_negocio", "tipos_documentos.id as id_tipos_doc", "negocios.paso", "propiedades.latitud", "propiedades.longitud", "negocios.asesor", "ciudades.desc_ciudades", "tipos_inmuebles.desc_tipo_inmueble")
                ->get();

            return view('admin.descargas.download', compact('negocios'));
        }
        return redirect('login');
    }
    public function show(Request $request)
    {

        session_start();

        if (isset($_SESSION['nombre'])) {

            $negocio = Negocios::find($request->codineg);
            $propiedad = Propiedades::find($negocio->propiedad);
            $propietario = Propietarios::find($negocio->propietario);
            $negocio_tipo = Tipos_negocios::pluck('desc_tipo_negocio', 'id');
            $tipos_documento = Tipos_documento::pluck('desc_tipos_documento', 'id');
            $inmueble = Tipos_inmueble::pluck('desc_tipo_inmueble', 'id');
            $estratos = Estratos::pluck('estrato', 'id');
            $estado = Estados_inmueble::pluck('desc_estado', 'id');
            $remodelado = Remodelados::pluck('desc_remodelado', 'id');
            $ciudad = Ciudades::pluck('desc_ciudades', 'id');
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
            $tipo_garaje = tipo_garajes::pluck('tipo_garajes', 'id');
            $niveles = Niveles::pluck('des_nivel', 'id');
            $vigilancia = Tipos_vigilancia::pluck('desc_tipo_vigilancia', 'id');
            $seguridad = Tipos_seguridad::pluck('desc_tipo_seguridad', 'id');
            $cuota = Tipos_cuotas::pluck('desc_tipo_cuota', 'id');
            $conc_juridico = Conc_juridicos::pluck('des_conc_juridicos', 'id');

            return view('admin.editar.edit_form', compact(
                'propiedad',
                'propietario',
                'negocio',
                'tipos_documento',
                'negocio_tipo',
                'inmueble',
                'estratos',
                'estado',
                'remodelado',
                'ciudad',
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
                'mat_fachada',
                'tipo_garaje',
                'niveles',
                'vigilancia',
                'seguridad',
                'cuota',
                'conc_juridico'
            ));
        }

        return redirect('login');
    }

    public function update(Request $request)
    {

        $negocio = Negocios::find($request->codineg);
        $propiedad = Propiedades::find($negocio->propiedad);
        $propietario = Propietarios::find($negocio->propietario);
        //propietario
        $propietario->name = $request->name;
        $propietario->lastname = $request->lastname;
        $propietario->phone = $request->phone;
        $propietario->email = $request->email;
        $propietario->tipo_doc = $request->id;
        $propietario->doc_number = $request->idnumber;

        //Negocio
        $negocio->tipo_negocio = $request->tipo;
        $negocio->valor = $request->valor;
        $negocio->asesor = $request->asesor;
        $negocio->conc_precio = $request->conc_precio;
        $negocio->precio_contrato = $request->precio_contrato;
        $negocio->conc_juridico = $request->conc_juridico;
        $negocio->obs_conc_juridico = $request->obs_conc_juridico;

        //propiedad
        $propiedad->chip = $request->chip;
        $propiedad->matricula = $request->matricula;
        $propiedad->barrio_catastral = $request->barrio_catastral;
        $propiedad->upz = $request->upz;
        $propiedad->localidad = $request->localidad;
        $propiedad->tipo_inmueble = $request->tipo_inm;
        $propiedad->estrato = $request->estrato_inm;
        $propiedad->ciudad = $request->ciudad;
        $propiedad->direccion = $request->direccion;
        $propiedad->latitud = $request->latitud;
        $propiedad->longitud = $request->longitud;
        $propiedad->estado = $request->estado_inb;
        $propiedad->piso = $request->piso;
        $propiedad->espropietario = $request->espropietario;
        $propiedad->arrendado = $request->arrendado;
        //mas detalles del inmueble
        $propiedad->a_construida = $request->a_construida;
        $propiedad->a_privada = $request->a_privada;
        $propiedad->a_terreno = $request->a_terreno;
        $propiedad->nivel = $request->niveles;
        $propiedad->n_hab = $request->n_hab;
        $propiedad->n_banos = $request->n_banos;
        $propiedad->mat_habitacion = $request->material_hab;
        $propiedad->mat_piso_cocina = $request->mp_cocina;
        $propiedad->mat_piso_bano = $request->mat_piso_bano;
        $propiedad->mat_piso_zsocial = $request->mat_piso_zona_social;
        //caracteristicas del inmueble
        $propiedad->mb_cocina = $request->mb_cocina;
        $propiedad->tipo_estufa = $request->estufa;
        $propiedad->tipo_horno = $request->horno;
        $propiedad->tipo_cocina = $request->tp_cocina;
        $propiedad->tipo_calentador = $request->calentador;
        $propiedad->tipo_vista = $request->vista;
        $propiedad->zona_social = $request->zona_social;
        $propiedad->material_fachada = $request->material_fachada;

        $propiedad->chimenea = $request->chimenea;
        $propiedad->balcon = $request->balcon;
        $propiedad->b_servicio = $request->b_servicio;
        $propiedad->b_social = $request->b_social;
        $propiedad->estudio = $request->estudio;
        $propiedad->deposito = $request->deposito;
        $propiedad->hab_servicio = $request->hab_servicio;
        $propiedad->star = $request->star;
        $propiedad->zona_lavanderia = $request->zona_lavanderia;
        $propiedad->entrega_cortinas = $request->entrega_cortinas;
        $propiedad->terraza = $request->terraza;
        $propiedad->piscina_privada = $request->piscina_p;
        $propiedad->sauna_privada = $request->sauna_p;
        $propiedad->turco_privado = $request->turco_p;
        $propiedad->jacuzzi_privado = $request->jacuzzi_p;
        $propiedad->tina_privada = $request->tina_p;
        $propiedad->aire_privado = $request->aire_p;
        $propiedad->calefaccion_privada = $request->calefaccion_p;
        $propiedad->patio = $request->patio;
        $propiedad->area_terraza = $request->area_terraza;
        $propiedad->area_balcon = $request->area_balcon;

        //Caracteristicas conjunto
        $propiedad->tipo_vigilancia = $request->vigilancia;
        $propiedad->tipo_seguridad = $request->seguridad;
        $propiedad->tipo_cuota = $request->t_cuota;
        $propiedad->nombre_c_e = $request->nombre_c_e;
        $propiedad->adm_cp = $request->adm_cp;
        $propiedad->adm_cd = $request->adm_cd;
        $propiedad->pq_visitantes = $request->pq_visitantes;
        $propiedad->bicicletero = $request->bicicletero;
        $propiedad->s_social = $request->s_social;
        $propiedad->bbq = $request->bbq;
        $propiedad->s_juntas = $request->s_juntas;
        $propiedad->p_infantil = $request->p_infantil;
        $propiedad->gimnasio = $request->gimnasio;
        $propiedad->turco = $request->turco;
        $propiedad->sauna = $request->sauna;
        $propiedad->c_squash = $request->c_squash;
        $propiedad->c_tenis = $request->c_tenis;
        $propiedad->c_multiple = $request->c_multiple;
        $propiedad->s_juegos = $request->s_juegos;
        $propiedad->s_estudio = $request->s_estudio;
        $propiedad->lavanderia_c = $request->lavanderia_c;
        $propiedad->planta_e = $request->planta_e;
        $propiedad->piscina = $request->piscina;
        $propiedad->jardin_interior = $request->jardin_interior;
        $propiedad->zonas_verdes = $request->zonas_verdes;

        //condicionados
        $propiedad->tiene_garajes = $request->garaje;

        if ($request->garaje == "Privado") {
            $propiedad->no_garajes = $request->no_garajes;
            $propiedad->tipo_garajes = $request->tipo_garaje;
            if ($request->gje_cubierto) {
                $propiedad->gje_cubierto = "Si";
            } else {
                $propiedad->gje_cubierto = "No";
            }
        } else {
            $propiedad->no_garajes = null;
            $propiedad->tipo_garajes = null;
            $propiedad->gje_cubierto = null;
        }

        if ($request->tipo_inm == 2) {
            $propiedad->piso = $request->piso;
            if ($request->ascensor) {
                $propiedad->ascensor = "Si";
                $propiedad->n_ascensores = $request->n_ascensores;
            } else {
                $propiedad->ascensor = "No";
            }
        }

        if ($request->estado_inb == 4) {
            $propiedad->tiempo_inm = $request->tiempo_inm;
            $propiedad->remodelado = $request->remodelado;
            if ($request->remodelado == 1) {
                if ($request->tuberia) {
                    $propiedad->tuberia = "Si";
                } else {
                    $propiedad->tuberia = "No";
                }
            }
        }
        // checks
        if ($request->espropietario) {
            $propiedad->espropietario = "Si";
            $propiedad->pqsolicita = $request->pqsolicita;
        } else {
            $propiedad->espropietario = "No";
        }

        if ($request->conjunto  == "Si") {
            $propiedad->horizontal = "Si";
            $propiedad->direccion_comp = $request->direccion_comp;
        } else {
            $propiedad->horizontal = "No";
        }

        if ($request->habitado) {
            $propiedad->habitado = "Si";
            if ($request->arr_check) {
                $propiedad->arrendado = "Si";
            } else {
                $propiedad->arrendado = "No";
            }
        } else {
            $propiedad->habitado = "No";
        }

        $propietario->save();
        $negocio->save();
        $propiedad->save();



        return redirect()->route('administrador.editform', $request->codiprop);
    }
}
