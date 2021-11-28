@extends('layouts.plantilla')
@section('title', 'Consigna tu inmueble')
@section('more_head')
    <script src="{!! asset('js/selects.js') !!}"></script>
@endsection

@section('content')
    <div class="card bg-default tarjeta shadow-lg animate__animated animate__fadeInDown" id="detalles">
        <div class="card-body">
            <div class="row seccion">
                <div class="col-12">
                    <h5>Detalles del inmueble</h5>
                </div>
            </div>
            {{ Form::open(['method' => 'post']) }}
            <div class="row grupo seccion">
                <div class="col-12">
                    <p>Área (m<sup>2</sup>)<br />
                        <span>(Sin incluir balcón(es) y/o terraza(s)<span>
                    </p>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="a_construida" class="col-5 col-form-label">Construida</label>
                        <div class="col-7">
                            <input id="a_construida" name="a_construida" type="number" step="0.1" min="11"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="a_privada" class="col-5 col-form-label">Privada</label>
                        <div class="col-7">
                            <input id="a_privada" name="a_privada" type="number" min="11" step="0.1" 
                                class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    @if ($tipo_inm == 1)
                        <div class="form-group row" id="s3_terreno">
                            <label for="a_terreno" class="col-5 col-form-label">De terreno</label>
                            <div class="col-7">
                                <input id="a_terreno" name="a_terreno" type="number" min="11" step="0.1"
                                    class="form-control" required>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row grupo seccion">
                <div class="col-12">
                    <p>Cantidad de:</p>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="niveles" class="col-6 col-form-label">Nivel(es)</label>
                        <div class="col-6">
                            {!! Form::select('niveles', $niveles, null, ['class' => 'form-select', 'id' => 'niveles', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row mb-3">
                        <label for="n_hab" class="col-6 col-form-label">Habitación(es)</label>
                        <div class="col-6">
                            <input class="form-control" name="n_hab" type="number" min="1" max="100" id="n_hab" required>
                        </div>
                    </div>
                    <span>(Sin incluir servicio)<span>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row mb-3">
                        <label for="no_banos" class="col-6 col-form-label">Baño(s)</label>
                        <div class="col-6">
                            <input class="form-control" type="number" name="n_banos" min="1" max="100" id="n_banos"
                                required>
                        </div>
                    </div>
                    <span>(Sin incluir servicio o social)<span>
                </div>
            </div>
            <div class="row grupo seccion">
                <div class="col-12">
                    <p>Material del piso en:</p>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group row">
                        <label for="material_hab" class="col-6 col-form-label">Habitación(es)</label>
                        <div class="col-6">
                            {!! Form::select('material_hab', $mat_habitaciones, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group row">
                        <label for="mp_cocina" class="col-4 col-form-label">Cocina</label>
                        <div class="col-8">
                            {!! Form::select('mp_cocina', $mat_cocina, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group row">
                        <label for="mat_piso_bano" class="col-4 col-form-label">Baño(s)</label>
                        <div class="col-8">
                            {!! Form::select('mat_piso_bano', $mat_bano, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group row">
                        <label for="mat_piso_zona_social" class="col-4 col-form-label">Zona
                            social</label>
                        <div class="col-8">
                            {!! Form::select('mat_piso_zona_social', $mat_zsocial, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row grupo seccion">
                <div class="col-12">
                    <p>Características específicas inmueble:</p>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="mb_cocina" class="col-6 col-form-label">Mobiliario cocina</label>
                            <div class="col-6">
                                {!! Form::select('mb_cocina', $mb_cocina, null, ['class' => 'form-select', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="estufa" class="col-6 col-form-label">Estufa</label>
                            <div class="col-6">
                                {!! Form::select('estufa', $estufa, null, ['class' => 'form-select', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="horno" class="col-6 col-form-label">Horno</label>
                            <div class="col-6">
                                {!! Form::select('horno', $horno, null, ['class' => 'form-select', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="tp_cocina" class="col-6 col-form-label">Tipo de cocina</label>
                            <div class="col-6">
                                {!! Form::select('tp_cocina', $tipo_cocina, null, ['class' => 'form-select', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="calentador" class="col-6 col-form-label">Calentador</label>
                            <div class="col-6">
                                {!! Form::select('calentador', $calentador, null, ['class' => 'form-select', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="vista" class="col-6 col-form-label">Vista</label>
                            <div class="col-6">
                                {!! Form::select('vista', $vista, null, ['class' => 'form-select', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="zona_social" class="col-6 col-form-label">Zona social</label>
                            <div class="col-6">
                                {!! Form::select('zona_social', $zonas, null, ['class' => 'form-select', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="material_fachada" class="col-6 col-form-label">Material
                                fachada</label>
                            <div class="col-6">
                                {!! Form::select('material_fachada', $mat_fachada, null, ['class' => 'form-select', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-md-block col-md-4"></div>
                </div>
                <div class="row seccion">
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="balcon" class="col-5 col-form-label">Balcón</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" name="balcon" id="balcon" />
                                <label class="slider-v1" for="balcon"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="terraza" class="col-5 col-form-label">Terraza</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" name="terraza" id="terraza" />
                                <label class="slider-v1" for="terraza"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="chimenea" class="col-5 col-form-label">Chimenea</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" id="chimenea" name="chimenea" value="1" />
                                <label class="slider-v1" for="chimenea"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="b_servicio" class="col-5 col-form-label">Baño servicio</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" name="b_servicio" id="b_servicio" />
                                <label class="slider-v1" for="b_servicio"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="b_social" class="col-5 col-form-label">Baño social</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" name="b_social" id="b_social" />
                                <label class="slider-v1" for="b_social"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="estudio" class="col-5 col-form-label">Estudio</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" name="estudio" id="estudio" />
                                <label class="slider-v1" for="estudio"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="deposito" class="col-5 col-form-label">Depósito</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" id="deposito" name="deposito" />
                                <label class="slider-v1" for="deposito"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="hab_servicio" class="col-5 col-form-label">Habitación de
                                servicio</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" id="hab_servicio" name="hab_servicio" />
                                <label class="slider-v1" for="hab_servicio"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="star" class="col-5 col-form-label">Star de entretenimiento</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" id="star" name="star" />
                                <label class="slider-v1" for="star"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="zona_lavanderia" class="col-5 col-form-label">Zona de
                                lavandería</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" id="zona_lavanderia" name="zona_lavanderia" />
                                <label class="slider-v1" for="zona_lavanderia"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row" id="cortina">
                            <label for="entrega_cortinas" class="col-5 col-form-label">
                                Entrega con cortinas</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" name="entrega_cortinas" id="entrega_cortinas" />
                                <label class="slider-v1" for="entrega_cortinas"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="calefaccion_p" class="col-5 col-form-label">Calefacción privada</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" id="calefaccion_p" name="calefaccion_p" />
                                <label class="slider-v1" for="calefaccion_p"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="piscina_p" class="col-5 col-form-label">Piscina privada</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" id="piscina_p" name="piscina_p" />
                                <label class="slider-v1" for="piscina_p"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="sauna_p" class="col-5 col-form-label">Sauna privado</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" id="sauna_p" name="sauna_p" />
                                <label class="slider-v1" for="sauna_p"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="turco_p" class="col-5 col-form-label">Turco privado</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" id="turco_p" name="turco_p" />
                                <label class="slider-v1" for="turco_p"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="jacuzzi_p" class="col-5 col-form-label">Jacuzzi privado</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" id="jacuzzi_p" name="jacuzzi_p" />
                                <label class="slider-v1" for="jacuzzi_p"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="tina_p" class="col-5 col-form-label">Tina privada</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" id="tina_p" name="tina_p" />
                                <label class="slider-v1" for="tina_p"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="aire_p" class="col-5 col-form-label">Aire acondicionado privado</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" id="aire_p" name="aire_p" />
                                <label class="slider-v1" for="aire_p"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        @if ($tipo_inm == 1)
                            <div class="form-group row">
                                <label for="patio" class="col-5 col-form-label">Patio interior</label>
                                <div class="col-2">
                                    <a>No</a>
                                </div>
                                <div class="col-3 bool text-center">
                                    <input type="checkbox" value="1" id="patio" name="patio" />
                                    <label class="slider-v1" for="patio"></label>
                                </div>
                                <div class="col-2">
                                    <a>Si</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 col-md-4">
                        @if ($tipo_inm == 1)
                            <div class="form-group row">
                                <label for="jardin_interior" class="col-5 col-form-label">
                                    Jardín Interior</label>
                                <div class="col-2">
                                    <a>No</a>
                                </div>
                                <div class="col-3 bool text-center">
                                    <input type="checkbox" value="1" name="jardin_interior" id="jardin_interior" />
                                    <label class="slider-v1" for="jardin_interior"></label>
                                </div>
                                <div class="col-2">
                                    <a>Si</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4" id="area_balcon_secc">
                        <div class="form-group row border-end">
                            <label for="area_balcon" class="col-5 col-form-label">Área del balcón</label>
                            <div class="col-7">
                                <input id="area_balcon" name="area_balcon" type="number" step="1" min="1"
                                    class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4" id="area_terraza_secc">
                        <div class="form-group row">
                            <label for="area_terraza" class="col-5 col-form-label">Área de la terraza</label>
                            <div class="col-7">
                                <input id="area_terraza" name="area_terraza" type="number" step="1" min="1"
                                    class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row grupo seccion">
                <div class="col-12">
                    <p>Garaje(s):</p>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="garaje" class="col-5 col-form-label">Cuenta con garaje(s)</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" id="garaje" name="garaje" value="1" />
                                <label class="slider-v1" for="garaje"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row" id="sec_independiente">
                            <label for="gje_comunal" class="col-5 col-form-label">Garaje(s) comunal(es)</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" id="gje_comunal" name="gje_comunal" value="1" checked />
                                <label class="slider-v1" for="gje_comunal"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="sec_garajes">
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="no_garajes" class="col-6 col-form-label">Cantidad de garajes</label>
                            <div class="col-6">
                                <input class="form-control" type="number" min="1" max="100" name="no_garajes"
                                    id="no_garajes">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="tipo_garaje" class="col-4 col-form-label">Tipo</label>
                            <div class="col-8">
                                {!! Form::select('tipo_garaje', $tipo_garaje, null, ['class' => 'form-select']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group row">
                            <label for="gje_cubierto" class="col-5 col-form-label">Cubierto(s)</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" name="gje_cubierto" id="gje_cubierto" />
                                <label class="slider-v1" for="gje_cubierto"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row tb-3">
                <div class="col-6 col-md-2 text-left">
                    <a href="{{ route('negocio.edit', $propiedad) }}" class="btn botones">Atrás</a>
                </div>
                <div class="d-none d-md-block col-md-8">

                </div>
                <div class="col-6 col-md-2 text-end">
                    <button type="submit" id="enviar3" class="btn botones">Siguiente</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

@endsection
