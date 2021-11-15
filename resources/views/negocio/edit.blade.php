@extends('layouts.plantilla')
@section('title', 'Consigna tu inmueble')
@section('more_head')
<script src="{!! asset('js/condiciones_edit.js') !!}"></script>
<script src="{!! asset('js/condiciones.js') !!}"></script>
@endsection

@section('content')
<div class="card bg-default tarjeta shadow-lg animate__animated animate__fadeIn" id="negocio_tarjeta">
    <div class="card-body">
        {{ Form::open(['method' => 'post', 'files' => true]) }}
        <div class="grupo">
            <div class="row">
                <div class="col-12">
                    <h5>Negocio</h5>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row">
                        <label for="id" class="col-5 col-form-label">Tipo DI</label>
                        <div class="col-7">
                            {!! Form::select('id', $tipos_documento, $propietario->tipo_doc, ['class' => 'form-select', 'required' => 'required', 'disabled' => 'disabled']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="idnumber" class="col-5 col-form-label">Número DI</label>
                        <div class="col-7">
                            <input id="idnumber" name="idnumber" type="number" class="form-control" value="{{ $propietario->doc_number }}" required="required" min="800" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="tipo" class="col-5">Escoge el negocio a realizar con este
                            inmueble</label>
                        <div class="col-7">
                            {!! Form::select('tipo', $negocio, $negocio_unico->tipo_negocio, ['class' => 'form-select', 'id' => 'negocio', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="valorgrupo">
                        <label for="valor" id="valorlabel" class="col-5 col-form-label">¿Valor tentativo que le vas a
                            asignar al inmueble?</label>
                        <div class="col-7">
                            <input id="valor" name="valor" type="number" value="{{ $negocio_unico->valor }}" class="form-control" min="99000" required="required">
                            <span id="admonhelper" class="form-text text-muted">Incluida cuota de administración si
                                aplicara</span>
                            <span id="valorpesos" class="form-text text-muted"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row">
                        <label for="espropietario" class="col-5">Soy el propietario del
                            inmueble</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->espropietario == 'Si')
                            <input type="checkbox" name="espropietario" value="1" id="espropietario" checked>
                            @else
                            <input type="checkbox" name="espropietario" value="1" id="espropietario" />
                            @endif
                            <label class="slider-v1" for="espropietario"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="pqgrupo">
                        <label for="pqsolicita" class="col-5 col-form-label">¿Por qué deseas publicar el
                            inmueble?</label>
                        <div class="col-7">
                            <input id="pqsolicita" name="pqsolicita" type="text" class="form-control" required="required" value="{{ $propiedad->pqsolicita }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row">
                        <label for="habitado" class="col-5 col-form-label">Inmueble habitado</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->habitado == 'Si')
                            <input type="checkbox" value="1" name="habitado" id="habitado" checked />
                            @else
                            <input type="checkbox" value="1" name="habitado" id="habitado" />
                            @endif

                            <label class="slider-v1" for="habitado"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row">
                        <label for="arrendado" class="col-5">¿Se encuentra arrendado actualmente?</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->arrendado == 'Si')
                            <input type="checkbox" name="arrendado" value="1" id="arrendado" checked />
                            @else
                            <input type="checkbox" name="arrendado" value="1" id="arrendado" />
                            @endif
                            <label class="slider-v1" for="arrendado"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="asesor" class="col-5 col-form-label">Nombre del Asesor</label>
                        <div class="col-7">
                            <input id="asesor" name="asesor" type="text" class="form-control" value="{{ $negocio_unico->asesor }}">
                        </div>
                    </div>
                </div>
                <div class="col-12  col-md-6">
                    <div class="form-group row">
                        <label for="certificado" class="col-5">Certificado de tradición del inmueble
                            <a href="#" data-toggle="modal" data-target="#modal_cert" target="_blank"> <i class="fa fa-question-circle-o"></i></a>
                        </label>
                        <div class="col-7">
                            <div class="custom-file">
                                <input type="file" class="form-control" name="certificado" id="certificado" accept="image/*,.pdf" lang="es" required>
                                <label class="custom-file-label" for="certificado" id="labelcert" data-browse="Cargar"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grupo">
            <div class="row seccion">
                <div class="col-12">
                    <h5>Datos del inmueble</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row">
                        <label for="tipo_inm" class="col-5 col-form-label">Tipo de inmueble</label>
                        <div class="col-7">
                            {!! Form::select('tipo_inm', $inmueble, $propiedad->tipo_inmueble, ['class' => 'form-select', 'id' => 'tipo_inm', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="estado_inb" class="col-5 col-form-label">Estado del inmueble</label>
                        <div class="col-7">
                            {!! Form::select('estado_inb', $estado, $propiedad->estado, ['class' => 'form-select','id' => 'estado_inb', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="estrato_inm" class="col-5 col-form-label">Estrato</label>
                        <div class="col-7">
                            {!! Form::select('estrato_inm', $estratos, $propiedad->estrato, ['class' => 'form-select', 'id' => 'tipo_inm', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row">
                        <label for="conjunto" class="col-5">El inmueble se encuentra en
                            conjunto cerrado o edificio </label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->horizontal == 'Si')
                            <input type="checkbox" name="conjunto" value="1" id="conjunto" checked />
                            @else
                            <input type="checkbox" name="conjunto" value="1" id="conjunto" />
                            @endif
                            <label class="slider-v1" for="conjunto"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 border-right" id="anoconstruido">
                    <div class="form-group row">
                        <label for="tiempo_inm" class="col-5 col-form-label">Años de construido</label>
                        <div class="col-7">
                            <input id="tiempo_inm" name="tiempo_inm" type="number" value="{{ $propiedad->tiempo_inm }}" min="0" class="form-control" max="80" required="required">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border-right">
                    @if ($propiedad->tiempo_inm <= now()->year - 5)
                        <div class="form-group  row" id="SecRemodelado">
                            <label for="remodelado" class="col-5 col-form-label">Remodelado hace menos de 5
                                años</label>
                            <div class="col-7">
                                {!! Form::select('remodelado', $remodelado, $propiedad->remodelado, ['class' => 'form-select', 'id' => 'remodelado']) !!}
                            </div>
                        </div>
                        @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="sec_tuberia">
                        <label for="tuberia" class="col-5  col-form-label @if ($propiedad->remodelado == 'Total') d-none @endif ">Incluyó
                            cambio de toda la
                            tubería</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            <input type="checkbox" value="1" name="tuberia" id="tuberia" />
                            <label class="slider-v1" for="tuberia"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="aptos2">
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row">
                        <label for="piso" class="col-5 col-form-label">Piso en el que está el
                            inmueble</label>
                        <div class="col-7">
                            <input id="piso" name="piso" type="number" min="1" max="30" value="{{ $propiedad->piso }}" class="form-control">
                            <div class="invalid-feedback d-none" id="errorpiso">
                                Si el piso es superior a 30, dejalo en 30 😉
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="ascensor" class="col-5 col-form-label">Ascensor</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->piso == 'Si')
                            <input type="checkbox" name="ascensor" value="1" id="ascensor" checked />
                            @else
                            <input type="checkbox" name="ascensor" value="1" id="ascensor" />
                            @endif
                            <label class="slider-v1" for="ascensor"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grupo mb-3">
            <div class="row seccion">
                <div class="col-12">
                    <h5>Ubicación</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="ciudad" class="col-5 col-form-label">Ciudad</label>
                        <div class="col-7">
                            <input id="ciudad" readonly name="ciudad" type="text" value="Bogotá D.C." required="required" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row">
                        <div class="col-5">
                            <label for="direccion" class="col-form-label">Dirección inmueble</label>
                        </div>
                        <div class="col-7">
                            <input id="direccion" name="direccion" type="text" class="form-control" required="required" value="{{ $propiedad->direccion }}" placeholder="Calle 25A #52B-06">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="detalles">
                        <div class="col-5">
                            <label for="direccion_comp" class="col-form-label">Detalles</label>
                        </div>
                        <div class="col-7">
                            <input id="direccion_comp" name="direccion_comp" value="{{ $propiedad->direccion_comp }}" type="text" class="form-control" placeholder="Torre 7 Apto. 302">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="text-center mt-3">
                        <a type="button" class="btn botones" onclick="mostrarmapa()"><i class="fas fa-map-marker-alt"></i> Localizar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6 col-md-2 text-start">
                <a href="{{ route('propietario.edit', $propietario) }}" class="btn botones">Atrás</a>
            </div>
            <div class="d-none d-md-block col-md-8"></div>
            <div class="col-6 col-md-2 text-end">
                <button type="submit" class="btn botones">Siguiente</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

@endsection