<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class finco extends Controller
{
    //
    public function consulta(Request $request)
    {
        $codineg = $request->codineg;
        $datos = $this->obetenerdatos($codineg);

        //Asiganciones 

        foreach ($datos as $datos) {

            //Directos
            $apikey = "9866d0e4faa287b06a732995586f434ad92131a117cddbb82fbbae5b44ed";
            $direccion = $datos->direccion;
            $latitud = $datos->latitud;
            $longitud = $datos->longitud;
            $a_construida = $datos->a_construida;
            $a_terreno = $datos->a_terreno;
            $n_hab = $datos->n_hab;
            $n_banos = $datos->n_banos;
            $estrato = $datos->estrato;
            $piso = $datos->piso;
            $zonas_verdes = $datos->zonas_verdes;

            if ($datos->id_tipoinm == 1) {
                $propertyType = "HOUSE";
            } elseif ($datos->id_tipoinm == 2) {
                $propertyType = "APARTMENT";
            }

            switch ($datos->id_estado) {
                case (1):
                    $estado = "ON_PLANS";
                    break;
                case (2):
                    $estado = "IN_CONSTRUCTION";
                    break;
                case (3):
                    $estado = "BRAND_NEW";
                    break;
                case (4):
                    $estado = "RENEWED";
                    break;
                case (5):
                    $estado = "USED";
                    break;
            }

            if ($datos->no_garajes) {
                $parkingSpaces = $datos->no_garajes;
            } else {
                $parkingSpaces = 0;
            }

            if ($datos->id_estado == 4) {
                $age =  $datos->tiempo_inm;
            } else {
                $age = 0;
            }

            if ($datos->hab_servicio == "Si") {
                $hasServiceRoom =  true;
            } else {
                $hasServiceRoom =  false;
            }

            if ($datos->balcon == "Si") {
                $hasBalcony =  true;
            } else {
                $hasBalcony =  false;
            }

            if ($datos->estudio == "Si") {
                $hasStudy =  true;
            } else {
                $hasStudy =  false;
            }

            if ($datos->terraza == "Si") {
                $hasTerrace =  true;
            } else {
                $hasTerrace =  false;
            }

            if ($datos->zona_lavanderia == "Si") {
                $hasLaundryZone =  true;
            } else {
                $hasLaundryZone =  false;
            }

            if ($datos->b_servicio == "Si") {
                $hasServiceToilet =  true;
            } else {
                $hasServiceToilet =  false;
            }

            if ($datos->id_vista == 1) {
                $isExterior =  true;
            } else {
                $isExterior =  false;
            }

            if ($datos->deposito == "Si") {
                $hasDeposit =  true;
            } else {
                $hasDeposit =  false;
            }

            if ($datos->id_nivel > 1) {
                $isDuplex =  true;
            } else {
                $isDuplex =  false;
            }

            if ($datos->horizontal = "Si") {
                $isResidentialComplex =  true;
            } else {
                $isResidentialComplex =  false;
            }

            if ($datos->s_social = "Si") {
                $hasCommunalHall =  true;
            } else {
                $hasCommunalHall =  false;
            }

            if ($datos->p_infantil = "Si") {
                $hasKidsPlayZone =  true;
            } else {
                $hasKidsPlayZone =  false;
            }

            if ($datos->piscina = "Si") {
                $hasPool =  true;
            } else {
                $hasPool =  false;
            }

            if ($datos->c_tenis = "Si") {
                $hasTennisCourt =  true;
            } else {
                $hasTennisCourt =  false;
            }

            if ($datos->pq_visitantes = "Si") {
                $hasVisitorParking =  true;
            } else {
                $hasVisitorParking =  false;
            }

            if ($datos->n_ascensores) {
                $elevators =  $datos->n_ascensores;
            } else {
                $elevators =  0;
            }

            if ($datos->area_terraza) {
                $terraceArea = $datos->area_terraza;
            } else {
                $terraceArea = 0;
            }

            if ($datos->c_multiple = "Si") {
                $hasSoccerField = true;
            } else {
                $hasSoccerField =  false;
            }

            // finco Viabilidad

            $finco_disponible = HTTP::post('https://api.finco.co/v1/query-available', [
                'APIKey' => $apikey,
                'test' => true,
                'location' => [
                    'latitude' => $latitud,
                    'longitude' => $longitud
                ],
                'propertyType' => $propertyType,
            ]);
            if ($finco_disponible['queryAvailable']['available']) {

                if ($propertyType == "HOUSE") {
                    //Finco Casa
                    $finco_query = HTTP::post('https://api.finco.co/v1/new-query', [
                        'APIKey' => $apikey,
                        'test' => true,
                        'makePublic' => true,
                        'location' => [
                            'latitude' => $latitud,
                            'longitude' => $longitud
                        ],
                        'propertyType' => $propertyType,
                        'query' => [
                            'address' => $direccion,
                            'builtArea' => $a_construida,
                            'lotArea' => $a_terreno,
                            'rooms' => $n_hab,
                            'toilets' => $n_banos,
                            'parkingSpaces' => $parkingSpaces,
                            'ageStatus' => $estado,
                            'ageNumeric' => $age,
                            'stratum' => $estrato,
                            'hasBalcony' => $hasBalcony,
                            'hasDeposit' => $hasDeposit,
                            'hasLaundryZone' => $hasLaundryZone,
                            'hasServiceRoom' => $hasServiceRoom,
                            'hasServiceToilet' => $hasServiceToilet,
                            'hasStudy' => $hasStudy,
                            'hasTerrace' => $hasTerrace,
                            'isExterior' => $isExterior,
                        ]
                    ]);
                    return  redirect()->away($finco_query['query']['url']);
                } elseif ($propertyType == "APARTMENT") {
                    //Finco Apto 
                    $finco_query = HTTP::post('https://api.finco.co/v1/new-query', [
                        'APIKey' => $apikey,
                        'test' => true,
                        'makePublic' => true,
                        'location' => [
                            'latitude' => $latitud,
                            'longitude' => $longitud
                        ],
                        'propertyType' => $propertyType,
                        'query' => [
                            'address' => $direccion,
                            'builtArea' => $a_construida,
                            'rooms' => $n_hab,
                            'toilets' => $n_banos,
                            'parkingSpaces' => $parkingSpaces,
                            'floor' => $piso,
                            'elevators' => $elevators,
                            'ageStatus' => $estado,
                            'ageNumeric' => $age,
                            'stratum' => $estrato,
                            'hasDeposit' => $hasDeposit,
                            'hasBalcony' => $hasBalcony,
                            'isDuplex' => $isDuplex,
                            'isExterior' => $isExterior,
                            'hasLaundryZone' => $hasLaundryZone,
                            'hasServiceRoom' => $hasServiceRoom,
                            'hasServiceToilet' => $hasServiceToilet,
                            'hasStudy' => $hasStudy,
                            'hasTerrace' => $hasTerrace,
                            'terraceArea' => $terraceArea,
                            'isResidentialComplex' => $isResidentialComplex,
                            'hasCommunalHall' => $hasCommunalHall,
                            'hasKidsPlayZone' => $hasKidsPlayZone,
                            'hasPool' => $hasPool,
                            'hasTennisCourt' => $hasTennisCourt,
                            'hasVisitorParking' => $hasVisitorParking,
                            'hasGreenZones' => $zonas_verdes,
                            'hasSoccerField' => $hasSoccerField
                        ]
                    ]);
                    return  redirect()->away($finco_query['query']['url']);
                }
            } else {
                return "Las coordenadas están fuera de la zona de cobertura";
            }
        }
    }

    function obetenerdatos($codineg)
    {
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
            ->select("negocios.id as id_neg", "negocios.propietario as id_pptario", "negocios.propiedad as id_ppdad", "negocios.tipo_negocio as id_tiponeg", "negocios.plan as id_plan", "negocios.conc_juridico as id_concjuridico", "propietarios.tipo_doc as id_tipodoc", "propiedades.tipo_inmueble as id_tipoinm", "propiedades.ciudad as id_ciudad", "propiedades.estrato as id_estrato", "propiedades.estado as id_estado", "propiedades.remodelado as id_remodelado", "propiedades.mat_habitacion as id_mathab", "propiedades.mat_piso_cocina as id_matpcocina", "propiedades.mat_piso_bano as id_matpbano", "propiedades.mat_piso_zsocial as id_matpsocial", "propiedades.nivel as id_nivel", "propiedades.tipo_garajes as id_tipogaraje", "propiedades.mb_cocina as id_mbcocina", "propiedades.tipo_estufa as id_tipoest", "propiedades.tipo_horno as id_tipohor", "propiedades.tipo_cocina as id_tipococ", "propiedades.tipo_calentador as id_calentador", "propiedades.tipo_vista as id_vista", "propiedades.zona_social as id_zonasocial", "propiedades.material_fachada as id_matfachada", "propiedades.tipo_vigilancia as id_tipovigilancia", "propiedades.tipo_seguridad as id_tiposeguridad", "propiedades.tipo_cuota as id_tipocuota", "propietarios.name", "propietarios.lastname", "propietarios.doc_number", "tipos_documentos.desc_tipos_documento", "propietarios.email", "propietarios.phone", "propietarios.paso", "tipos_negocios.desc_tipo_negocio as tipo_negocio", "planes.desc_plan as plan", "negocios.valor", "negocios.conc_precio", "negocios.precio_contrato", "conc_juridicos.des_conc_juridicos as conc_juridico", "negocios.obs_conc_juridico", "negocios.cpvj", "negocios.asesor", "tipos_inmuebles.desc_tipo_inmueble as tipo_inmueble", "propiedades.espropietario", "propiedades.pqsolicita", "propiedades.horizontal", "propiedades.arrendado", "estratos.estrato", "ciudades.desc_ciudades as ciudad", "propiedades.direccion", "propiedades.direccion_comp", "propiedades.tiempo_inm", "propiedades.longitud", "propiedades.latitud", "estados_inmuebles.desc_estado as estado", "remodelados.desc_remodelado as remodelado", "propiedades.tuberia", "propiedades.piso", "propiedades.ascensor", "propiedades.a_construida", "propiedades.a_privada", "propiedades.a_terreno", "mats_piso_habitacions.desc_mats_piso_habitaciones as mat_habitacion", "mats_piso_cocinas.desc_mats_piso_cocina as mat_piso_cocina", "mats_piso_banos.desc_mats_piso_bano as mat_piso_bano", "mats_piso_zsocials.desc_mats_piso_zsocial as mat_piso_zsocial", "niveles.des_nivel as nivel", "propiedades.n_hab", "propiedades.n_banos", "tipo_garajes.tipo_garajes as tipo_garaje", "propiedades.tiene_garajes", "propiedades.gje_cubierto", "propiedades.no_garajes", "mb_cocinas.desc_mbs_cocina as mb_cocina", "tipos_estufas.desc_tipos_estufa as tipo_estufa", "tipos_hornos.desc_tipos_horno as tipo_horno", "tipos_cocinas.desc_tipos_cocina as tipo_cocina", "calentadores.desc_tipos_calentador as tipo_calentador", "vistas.desc_vista as tipo_vista", "zonas_sociales.desc_zona_social as zona_social", "materiales_fachadas.desc_mats_fachada as material_fachada", "propiedades.terraza", "propiedades.area_terraza", "propiedades.chimenea", "propiedades.balcon", "propiedades.area_balcon", "propiedades.b_servicio", "propiedades.b_social", "propiedades.estudio", "propiedades.deposito", "propiedades.hab_servicio", "propiedades.star", "propiedades.zona_lavanderia", "propiedades.patio", "propiedades.entrega_cortinas", "propiedades.piscina_privada", "propiedades.sauna_privada", "propiedades.turco_privado", "propiedades.jacuzzi_privado", "propiedades.tina_privada", "propiedades.aire_privado", "propiedades.zonas_verdes", "propiedades.calefaccion_privada", "tipos_vigilancias.desc_tipo_vigilancia as tipo_vigilancia", "tipos_seguridads.desc_tipo_seguridad as tipo_seguridad", "tipos_cuotas.desc_tipo_cuota as tipo_cuota", "propiedades.nombre_c_e", "propiedades.adm_cp", "propiedades.adm_cd", "propiedades.pq_visitantes", "propiedades.bicicletero", "propiedades.s_social", "propiedades.bbq", "propiedades.s_juntas", "propiedades.p_infantil", "propiedades.gimnasio", "propiedades.turco", "propiedades.sauna", "propiedades.c_squash", "propiedades.c_tenis", "propiedades.c_multiple", "propiedades.s_juegos", "propiedades.s_estudio", "propiedades.lavanderia_c", "propiedades.planta_e", "propiedades.certificado", "propiedades.habitado", "propiedades.piscina", "propiedades.n_ascensores", "propiedades.jardin_interior", "propiedades.chip", "propiedades.matricula", "propiedades.barrio_catastral", "propiedades.upz", "propiedades.localidad")
            ->get();

        return $datos;
    }
}
