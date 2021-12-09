<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\MagicConst\Function_;

class EditController extends Controller
{
    
    public function showtable()
    {
        
        $propietarios = Propietarios::where('paso' , 'Planes')->get();
        $todos_documentos = Tipos_documento::all();
        //return view('admin.edit')->with('propietarios',$propietarios)->with('tipo_doc',Tipos_documento::all());
        return view('admin.editar.edit', compact('propietarios','todos_documentos'));
    }

    public function convertir(Request $request) {
        
        return redirect()->route('administrador.editform',$request->codiprop);
        
    }

    public function show(Propietarios $codiprop){
        
        $negocio_unico = Negocios::where('propietario', $codiprop->id)->first();
        $negocio_tipo = Tipos_negocios::pluck('desc_tipo_negocio', 'id');
        $codigo_ppdad = $negocio_unico->propiedad;
        $propiedad = Propiedades::find($codigo_ppdad);
        $tipos_documento = Tipos_documento::pluck('desc_tipos_documento', 'id');
        $inmueble = Tipos_inmueble::pluck('desc_tipo_inmueble', 'id');
        $estratos = Estratos::pluck('estrato', 'id');
        $estado = Estados_inmueble::pluck('desc_estado', 'id');
        $remodelado = Remodelados::pluck('desc_remodelado', 'id');
        $ciudad = Ciudades::pluck('desc_ciudades','id');
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
        
        return view('admin.editar.edit_form', compact('propiedad', 'codiprop','tipos_documento','negocio_unico','negocio_tipo','inmueble','estratos','estado','remodelado',
        'ciudad','mat_habitaciones','mat_cocina','mat_bano','mat_zsocial','mb_cocina','estufa','horno','tipo_cocina','calentador','vista','zonas','mat_fachada','tipo_garaje','niveles'
        ,'vigilancia','seguridad','cuota','conc_juridico'));

    }

    public function update(Request $request, Propietarios $codiprop) {
        
        $negocio_unico = Negocios::where('propietario', $codiprop->id)->first();
        $codigo_ppdad = $negocio_unico->propiedad;
        $propiedad = Propiedades::find($codigo_ppdad);
        //propietario
        $codiprop->name = $request->name;
        $codiprop->lastname = $request->lastname;
        $codiprop->phone = $request->phone;
        $codiprop->email = $request->email;
        $codiprop->tipo_doc = $request->id;
        $codiprop->doc_number = $request->idnumber;
        
        //Negocio
        $negocio_unico->tipo_negocio = $request->tipo;
        $negocio_unico->valor = $request->valor;
        $negocio_unico->asesor = $request->asesor;
        $negocio_unico->conc_precio = $request->conc_precio;
        $negocio_unico->precio_contrato = $request->precio_contrato;
        $negocio_unico->conc_juridico = $request->conc_juridico;
        $negocio_unico->obs_conc_juridico = $request->obs_conc_juridico;
        
        //propiedad
        $propiedad->chip = $request->chip;
        $propiedad->matricula = $request->matricula;
        $propiedad->pqsolicita = $request->pqsolicita;
        $propiedad->tipo_inmueble = $request->tipo_inm;
        $propiedad->estrato = $request->estrato_inm;
        $propiedad->ciudad = $request->ciudad;
        $propiedad->direccion = $request->direccion;
        $propiedad->direccion_comp = $request->direccion_comp;
        $propiedad->latitud = $request->latitud;
        $propiedad->longitud = $request->longitud;
        $propiedad->tiempo_inm = $request->tiempo_inm;
        $propiedad->estado = $request->estado_inb;
        $propiedad->remodelado = $request->remodelado;
        $propiedad->piso = $request->piso;
        $propiedad->espropietario = $request->espropietario;
        $propiedad->habitado = $request->habitado;
        $propiedad->arrendado = $request->arrendado;
        $propiedad->horizontal = $request->horizontal;
        $propiedad->tuberia = $request->tuberia;
        $propiedad->ascensor = $request->ascensor;
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
        $propiedad->tiene_garaje = $request->garaje;
        $propiedad->gje_comunal = $request->gje_comunal;
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
        $propiedad->no_garajes = $request->no_garajes;
        $propiedad->tipo_garajes = $request->tipo_garaje;
        $propiedad->gje_cubierto = $request->gje_cubierto;
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
        $codiprop->save();
        $negocio_unico->save();
        $propiedad->save();
        
        return redirect()->route('administrador.edit',$request->codiprop);
        
    }

}