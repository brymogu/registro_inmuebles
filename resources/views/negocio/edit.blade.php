@extends('layouts.plantilla')
@section('title', 'Consigna tu inmueble')
@section('more_head')
    <script src="{!! asset('js/condiciones_edit.js') !!}"></script>
    <script src="{!! asset('js/funciones.js') !!}"></script>
    <script src="{!! asset('js/selects_edit.js') !!}"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
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
                    <div class="col-12 col-md-6">
                        <div class="form-group row border-end">
                            <label for="id" class="col-5 col-form-label">Tipo DI</label>
                            <div class="col-7">
                                @isset($propietario->tipo_doc)
                                    {!! Form::select('id', $tipos_documento, $propietario->tipo_doc, ['class' => 'form-select', 'required' => 'required', 'disabled' => 'disabled']) !!}
                                @endisset
                                @empty($propietario->tipo_doc)
                                    {!! Form::select('id', $tipos_documento, $propietario->tipo_doc, ['class' => 'form-select vacio', 'required' => 'required', 'disabled' => 'disabled']) !!}
                                @endempty
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <label for="idnumber" class="col-5 col-form-label">Número DI</label>
                            <div class="col-7">
                                <input id="idnumber" name="idnumber" type="number" class="form-control"
                                    value="{{ $propietario->doc_number }}" required="required" min="800" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group row border-end">
                            <label for="tipo" class="col-5">Escoge el negocio a realizar con este
                                inmueble</label>
                            <div class="col-7">
                                @isset($negocio->tipo_negocio)
                                    {!! Form::select('tipo', $tipo_negocio, $negocio->tipo_negocio, ['class' => 'form-select', 'id' => 'negocio', 'required' => 'required']) !!}
                                @endisset
                                @empty($negocio->tipo_negocio)
                                    {!! Form::select('tipo', $tipo_negocio, $negocio->tipo_negocio, ['class' => 'form-select', 'id' => 'negocio', 'required' => 'required']) !!}
                                @endempty
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row" id="valorgrupo">
                            <label for="valor" id="valorlabel" class="col-5 col-form-label">¿Valor tentativo que le vas a
                                asignar al inmueble?</label>
                            <div class="col-7">
                                <input id="valor" name="valor" type="number" value="{{ $negocio->valor }}"
                                    class="form-control" min="99000" required="required">
                                <span id="admonhelper" class="form-text text-muted">Incluida cuota de administración si
                                    aplicara</span>
                                <span id="valorpesos" class="form-text text-muted"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <label for="conjunto" class="col-5">El inmueble se encuentra en
                                conjunto cerrado o edificio </label>
                            <div class="col-7">
                                <select class="form-select" id="conjunto" name="conjunto">
                                    @if ($propiedad->horizontal == 'Si')
                                        <option value="Si" selected>Si</option>
                                        <option value="No">No</option>
                                    @else
                                        <option value="Si">Si</option>
                                        <option value="No" selected>No</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grupo">
                <div class="row">
                    <div class="col-12">
                        <h5>Aspectos para el negocio</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group row border-end">
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
                                <input id="pqsolicita" name="pqsolicita" type="text" class="form-control"
                                    required="required" value="{{ $propiedad->pqsolicita }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group row border-end">
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
                    <div class="col-12 col-md-6">
                        <div class="form-group row" id="arrendado">
                            <label for="arr_check" class="col-5">¿Se encuentra arrendado actualmente?</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                @if ($propiedad->arrendado == 'Si')
                                    <input type="checkbox" name="arr_check" value="1" id="arr_check" checked />
                                @else
                                    <input type="checkbox" name="arr_check" value="1" id="arr_check" />
                                @endif
                                <label class="slider-v1" for="arr_check"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group row border-end">
                            <label for="asesor" class="col-5 col-form-label">Nombre del Asesor</label>
                            <div class="col-7">
                                <input id="asesor" name="asesor" type="text" class="form-control"
                                    value="{{ $negocio->asesor }}">
                                <span class="form-text text-muted">No obligatorio</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12  col-md-6">
                        <div class="form-group row">
                            <label for="certificado" class="col-5">Certificado de tradición del inmueble
                                <a href="#" data-toggle="modal" data-target="#modal_cert" target="_blank"> <i
                                        class="fa fa-question-circle-o"></i></a>
                            </label>
                            <div class="col-7">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="certificado" id="certificado"
                                        accept="image/*,.pdf" lang="es">
                                    <label class="custom-file-label" for="certificado" id="labelcert"
                                        data-browse="Cargar"></label>
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
                    <div class="col-12 col-md-6 border-end">
                        <div class="form-group row">
                            <label for="tipo_inm" class="col-5 col-form-label">Tipo de inmueble</label>
                            <div class="col-7">
                                @isset($propiedad->tipo_inmueble)
                                    {!! Form::select('tipo_inm', $inmueble, $propiedad->tipo_inmueble, ['class' => 'form-select', 'id' => 'tipo_inm', 'required' => 'required']) !!}
                                @endisset
                                @empty($propiedad->tipo_inmueble)
                                    {!! Form::select('tipo_inm', $inmueble, $propiedad->tipo_inmueble, ['class' => 'form-select vacio', 'id' => 'tipo_inm', 'required' => 'required']) !!}
                                @endempty
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <label for="estado_inb" class="col-5 col-form-label">Estado del inmueble</label>
                            <div class="col-7">
                                @isset($estado, $propiedad->estado)
                                    {!! Form::select('estado_inb', $estado, $propiedad->estado, ['class' => 'form-select', 'id' => 'estado_inb', 'required' => 'required']) !!}
                                @endisset
                                @empty($propiedad->estado)
                                    {!! Form::select('estado_inb', $estado, $propiedad->estado, ['class' => 'form-select', 'id' => 'estado_inb', 'required' => 'required']) !!}
                                @endempty
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6" id="anoconstruido">
                        <div class="form-group row border-end">
                            <label for="tiempo_inm" class="col-5 col-form-label">Años de construido</label>
                            <div class="col-7">
                                <input id="tiempo_inm" name="tiempo_inm" type="number"
                                    value="{{ $propiedad->tiempo_inm }}" min="0" class="form-control" max="80"
                                    required="required">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        @if ($propiedad->tiempo_inm <= now()->year - 5)
                            <div class="form-group  row" id="SecRemodelado">
                                <label for="remodelado" class="col-5 col-form-label">Remodelado hace menos de 5
                                    años</label>
                                <div class="col-7">
                                    @isset($propiedad->remodelado)
                                        {!! Form::select('remodelado', $remodelado, $propiedad->remodelado, ['class' => 'form-select', 'id' => 'remodelado']) !!}
                                    @endisset
                                    @empty($propiedad->remodelado)
                                        {!! Form::select('remodelado', $remodelado, $propiedad->remodelado, ['class' => 'form-select vacio', 'id' => 'remodelado']) !!}
                                    @endempty
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group row border-end" id="sec_tuberia">
                            <label for="tuberia" class="col-5  col-form-label @if ($propiedad->remodelado == 'Total') d-none @endif ">Incluyó
                                cambio de toda la tubería</label>
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
                    <div class="col-12 col-md-6 border-end">
                        <div class="form-group row">
                            <label for="piso" class="col-5 col-form-label">Piso en el que está el
                                inmueble</label>
                            <div class="col-7">
                                <input id="piso" name="piso" type="number" min="1" max="30" value="{{ $propiedad->piso }}"
                                    class="form-control">
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
                                @if ($propiedad->ascensor == 'Si')
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
                <div class="row">
                    <div class="col-12 col-md-6" id="sec_n_ascensores">
                        <div class="form-group row border-end">
                            <label for="n_ascensores" class="col-5 form-label">Cantidad de ascensores</label>
                            <div class="col-7">
                                <input id="n_ascensores" name="n_ascensores" type="number" min="1" max="30"
                                    class="form-control" value="{{ $propiedad->n_ascensores }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <label for="estrato_inm" class="col-5 col-form-label">Estrato</label>
                            <div class="col-7">
                                @isset($estado, $propiedad->estrato)
                                    {!! Form::select('estrato_inm', $estratos, $propiedad->estrato, ['class' => 'form-select', 'id' => 'tipo_inm', 'required' => 'required']) !!}
                                @endisset
                                @empty($propiedad->estrato)
                                    {!! Form::select('estrato_inm', $estratos, $propiedad->estrato, ['class' => 'form-select vacio', 'id' => 'tipo_inm', 'required' => 'required']) !!}
                                @endempty
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
                        <div class="form-group row border-end">
                            <label for="ciudad" class="col-5 col-form-label">Ciudad</label>
                            <div class="col-7">
                                <input id="ciudad" readonly name="ciudad" type="text" value="Bogotá D.C."
                                    required="required" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <div class="col-5">
                                <label for="direccion" class="col-form-label">Dirección inmueble</label>
                            </div>
                            <div class="col-7">
                                <input id="direccion" name="direccion" type="text" class="form-control"
                                    required="required" value="{{ $propiedad->direccion }}"
                                    placeholder="Calle 25A #52B-06">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group row border-end" id="detalles">
                            <div class="col-5">
                                <label for="direccion_comp" class="col-form-label">Detalles</label>
                            </div>
                            <div class="col-7">
                                <input id="direccion_comp" name="direccion_comp" value="{{ $propiedad->direccion_comp }}"
                                    type="text" class="form-control" placeholder="Ejemplo: Torre 7 Apto. 302">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                    </div>
                </div>

                <div class="row d-none">
                    <div class="col-12 col-md-6">
                        <div class="form-group row" id="detalles">
                            <div class="col-5">
                                <label for="longitud" class="col-form-label">Longitud</label>
                            </div>
                            <div class="col-7">
                                <input id="longitud" name="longitud" type="text" class="form-control"
                                    value="{{ $propiedad->longitud }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row" id="detalles">
                            <div class="col-5">
                                <label for="latitud" class="col-form-label">Latitud</label>
                            </div>
                            <div class="col-7">
                                <input id="latitud" name="latitud" type="text" class="form-control"
                                    value="{{ $propiedad->latitud }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4 col-md-2 text-start">
                    <a href="{{ route('propietario.edit', $propietario) }}" class="btn botones">Atrás</a>
                </div>
                <div class="d-none d-md-block col-md-3"></div>

                <div class="col-4 col-md-2 text-end">
                    <div>
                        <a type="button" class="btn botones" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom" onclick="mostrarmapa()"><i
                                class="fas fa-map-marker-alt"></i>
                            Ubicar</a>
                    </div>
                </div>
                <div class="d-none d-md-block col-md-3"></div>
                <div class="col-4 col-md-2 text-end">
                    <button type="submit" class="btn botones">Siguiente</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
    <div class="offcanvas offcanvas-bottom rounded" tabindex="-1" id="offcanvasBottom"
        aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <p class="offcanvas-title text-center" id="offcanvasBottomLabel"><i class="far fa-smile-wink"></i> Por
                favor
                ayudanos a localizar tu inmueble</p>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body grupo">
            <div id="map"></div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="sentimos text-center py-3">
                        <img src="{!! asset('img/wesorry.png') !!}" class="img-fluid" alt="Lo sentimos">
                    </div>
                    Lo sentimos, no nos es posible comercializar y administrar el inmueble <span id="motivo"><span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn botones" onclick="noposibles()"
                        data-bs-dismiss="modal">Regresar</button>
                    <a href="https://epicainmobiliaria.com" type="button" class="btn btn-secondary">Salir</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts_footer')
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {})
    </script>
    <script src="{!! asset('js/mapa.js') !!}"></script>
@endsection
