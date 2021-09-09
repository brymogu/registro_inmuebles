@extends('layouts.plantilla')
@section('title', 'Consigna tu inmueble')

@section('content')
    <div class="card bg-default tarjeta shadow-lg animate__animated animate__fadeInDown" id="detalles">
        <div class="card-body">
            <div class="row seccion">
                <div class="col-12">
                    <h4>Más detalles del inmueble</h4>
                </div>
            </div>
            {{ Form::open(['method' => 'post']) }}
            <div class="row grupo seccion">
                <div class="col-12">
                    <p>Área (m<sup>2</sup>)</p>
                </div>
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="a_construida" class="col-5 col-form-label">Construida</label>
                        <div class="col-7">
                            <input id="a_construida" name="a_construida" type="number" step="0.1" min="11"
                                class="form-control" required="required">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="a_privada" class="col-5 col-form-label">Privada</label>
                        <div class="col-7">
                            <input id="a_privada" name="a_privada" type="number" min="11" step="0.1" required="required"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    @if ($tipo == 1)
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
                <div class="col-12 col-md-3 border-right">
                    <div class="form-group row">
                        <label for="niveles" class="col-6 col-form-label">Nivel(es)</label>
                        <div class="col-6">
                            <select id="niveles" name="niveles" aria-describedby="no_banosHelpBlock" required="required"
                                class="form-select">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3+</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 border-right">
                    <div class="form-group row">
                        <label for="n_hab" class="col-6 col-form-label">Habitación(es) <br />
                            <span>(Sin incluir servicio)<span>
                        </label>
                        <div class="col-6">
                            <select id="n_hab" name="n_hab" aria-describedby="no_banosHelpBlock" required="required"
                                class="form-select">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5+</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 border-right">
                    <div class="form-group row">
                        <label for="no_banos" class="col-6 col-form-label">Baño(s)<br />
                            <span>(Sin incluir servicio o social)<span>
                        </label>
                        <div class="col-6">
                            <select id="no_banos" name="no_banos" aria-describedby="no_banosHelpBlock" required="required"
                                class="form-select">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4+">4+</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group row">
                        <label for="no_garajes" class="col-6 col-form-label">Garaje(s)</label>
                        <div class="col-6">
                            {!! Form::select('no_garajes', $garajes, null, ['class' => 'form-select', 'id' => 'no_garajes', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row grupo seccion">
                <div class="col-12">
                    <p>Material del piso en:</p>
                </div>
                <div class="col-12 col-md-3 border-right">
                    <div class="form-group row">
                        <label for="material_hab" class="col-6 col-form-label">Habitación(es)</label>
                        <div class="col-6">
                            {!! Form::select('material_hab', $mat_habitaciones, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 border-right">
                    <div class="form-group row">
                        <label for="mp_cocina" class="col-6 col-form-label">Cocina</label>
                        <div class="col-6">
                            {!! Form::select('mp_cocina', $mat_cocina, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 border-right">
                    <div class="form-group row">
                        <label for="mat_piso_bano" class="col-6 col-form-label">Baño(s)</label>
                        <div class="col-6">
                            {!! Form::select('mat_piso_bano', $mat_bano, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 ">
                    <div class="form-group row">
                        <label for="mat_piso_zona_social" class="col-6 col-form-label">Zona
                            social</label>
                        <div class="col-6">
                            {!! Form::select('mat_piso_zona_social', $mat_zsocial, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row seccion">
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="mb_cocina" class="col-6 col-form-label">Mobiliario cocina</label>
                        <div class="col-6">
                            {!! Form::select('mb_cocina', $mb_cocina, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-right">
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
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="tp_cocina" class="col-6 col-form-label">Tipo de cocina</label>
                        <div class="col-6">
                            {!! Form::select('tp_cocina', $tipo_cocina, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-right">
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
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="zona_social" class="col-6 col-form-label">Zona social</label>
                        <div class="col-6">
                            {!! Form::select('zona_social', $zonas, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-right">
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
                <div class="col-12 col-md-4 border-right">
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
                <div class="col-12 col-md-4 border-right">
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
            </div>
            <div class="row">
                <div class="col-12 col-md-4 border-right">
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
                <div class="col-12 col-md-4 border-right">
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
                <div class="col-12 col-md-4 border-right">
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
                <div class="col-12 col-md-4 border-right">
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
                    <div class="form-group row ">
                        <label for="star" class="col-5 col-form-label">Star de
                            entretenimiento</label>
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
                <div class="col-12 col-md-4 border-right">
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
                <div class="col-12 col-md-4 border-right">
                    @if ($tipo == 1)
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
                <div class="col-12 col-md-4 ">
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
            </div>
            <div class="row" id="sec_garajes">
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="garaje_i" class="col-5 col-form-label">Garaje(s)
                            independientes</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            <input type="checkbox" value="1" id="garaje_i" name="garaje_i" />
                            <label class="slider-v1" for="garaje_i"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="garaje_c" class="col-5 col-form-label">Garaje(s)
                            Cubiertos</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            <input type="checkbox" value="1" name="garaje_c" id="garaje_c" />
                            <label class="slider-v1" for="garaje_c"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-block col-md-4">

                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-2 text-left">
                    <button type="button" class="btn botones">Atrás</button>
                </div>
                <div class="d-none d-md-block col-md-8"></div>
                <div class="col-6 col-md-2 text-end">
                    <button type="submit" id="enviar3" class="btn botones ">Siguiente</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
