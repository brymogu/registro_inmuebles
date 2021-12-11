<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Negocios;
use App\Models\Propiedades;
use App\Models\Propietarios;
use App\Models\Tipos_documento;
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
use App\Models\Niveles;
use App\Models\Remodelados;
use App\Models\tipo_garajes;
use App\Models\Tipos_cocina;
use App\Models\Tipos_cuotas;
use App\Models\Tipos_estufa;
use App\Models\Tipos_horno;
use App\Models\Tipos_inmueble;
use App\Models\Tipos_negocios;
use App\Models\Tipos_seguridad;
use App\Models\Tipos_vigilancia;
use App\Models\Vista;
use App\Models\Zonas_sociales;

class FormatosContraller extends Controller
{
    //
    public function show($codineg)
    {
        $negocio_unico = Negocios::find($codineg);
        $propietario = Propietarios::find($negocio_unico->propietario);
        $propiedad = Propiedades::find($negocio_unico->propiedad);

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

        return view('admin.descargas.cpvj', compact('propiedad', 'negocio_unico', 'propietario','tipos_documento','negocio_tipo','inmueble','estratos','estado','remodelado',
        'ciudad','mat_habitaciones','mat_cocina','mat_bano','mat_zsocial','mb_cocina','estufa','horno','tipo_cocina','calentador','vista','zonas','mat_fachada','tipo_garaje','niveles'
        ,'vigilancia','seguridad','cuota','conc_juridico'));
    }
}
