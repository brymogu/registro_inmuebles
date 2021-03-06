@extends('layouts.plantilla')
@section('title', 'Consigna tu inmueble')
@section('more_head')
    <script src="{!! asset('js/ocultos.js') !!}"></script>
    <script src="{!! asset('js/selects.js') !!}"></script>
    <script src="{!! asset('js/funciones.js') !!}"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
@endsection

@section('content')
    <div class="card bg-default tarjeta shadow-lg animate__animated animate__fadeInRight" id="negocio_tarjeta">
        <div class="card-body">
            {{ Form::open(['method' => 'post', 'files' => true]) }}
            <div class="grupo">
                <div class="row">
                    <div class="col-12">
                        <h5>Negocio</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group row border-end">
                            <label for="id" class="col-5 form-label">Tipo DI</label>
                            <div class="col-7">
                                {!! Form::select('id', $tipos_documento, null, ['class' => 'form-select', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <label for="idnumber" class="col-5 form-label">Número DI</label>
                            <div class="col-7">
                                <input id="idnumber" name="idnumber" type="number" class="form-control"
                                    required="required" min="800" onkeydown="if(event.key==='.'){event.preventDefault();}"
                                    oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
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
                                {!! Form::select('tipo', $tipo_negocio, null, ['class' => 'form-select', 'id' => 'negocio', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row" id="valorgrupo">
                            <label for="valor" id="valorlabel" class="col-5 form-label">¿Valor tentativo que le vas a
                                asignar al inmueble?</label>
                            <div class="col-7">
                                <input id="valor" name="valor" type="number" class="form-control" min="100000"
                                    required="required" data-bs-container="body" data-bs-toggle="popover"
                                    data-bs-placement="top" data-bs-content="Digite un valor válido">
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
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
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
                                <input type="checkbox" name="espropietario" value="1" id="espropietario" />
                                <label class="slider-v1" for="espropietario"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row" id="pqgrupo">
                            <label for="pqsolicita" class="col-5 form-label">¿Por qué deseas publicar el
                                inmueble?</label>
                            <div class="col-7">
                                <input id="pqsolicita" name="pqsolicita" type="text" class="form-control"
                                    required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="reglasgral">
                    <div class="row">
                        <div class="col-12 col-md-6 border-end">
                            <div class="form-group row">
                                <label for="embargo" class="col-5">Inmueble con embargo</label>
                                <div class="col-2">
                                    <a>No</a>
                                </div>
                                <div class="col-3 bool text-center">
                                    <input type="checkbox" name="embargo" value="1" id="embargo" />
                                    <label class="slider-v1" for="embargo"></label>
                                </div>
                                <div class="col-2">
                                    <a>Si</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group row border-end">
                                <label for="urbano" class="col-5">Inmueble urbano</label>
                                <div class="col-2">
                                    <a>No</a>
                                </div>
                                <div class="col-3 bool text-center">
                                    <input type="checkbox" name="urbano" value="1" id="urbano" checked />
                                    <label class="slider-v1" for="urbano"></label>
                                </div>
                                <div class="col-2">
                                    <a>Si</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="reglas">
                    <div class="row">
                        <div class="col-12 col-md-6 ">
                            <div class="form-group row border-end">
                                <label for="menosano" class="col-5">¿Deseas arrendarlo por menos de 1 año?</label>
                                <div class="col-2">
                                    <a>No</a>
                                </div>
                                <div class="col-3 bool text-center">
                                    <input type="checkbox" name="menosano" value="1" id="menosano" />
                                    <label class="slider-v1" for="menosano"></label>
                                </div>
                                <div class="col-2">
                                    <a>Si</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group row">
                                <label for="serv_independ" class="col-5 form-label">¿Tiene servicios públicos
                                    independientes?</label>
                                <div class="col-2">
                                    <a>No</a>
                                </div>
                                <div class="col-3 bool text-center">
                                    <input type="checkbox" name="serv_independ" value="1" id="serv_independ" checked />
                                    <label class="slider-v1" for="serv_independ"></label>
                                </div>
                                <div class="col-2">
                                    <a>Si</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 border-end">
                            <div class="form-group row">
                                <label for="vacacional" class="col-5">Inmueble vacacional</label>
                                <div class="col-2">
                                    <a>No</a>
                                </div>
                                <div class="col-3 bool text-center">
                                    <input type="checkbox" name="vacacional" value="1" id="vacacional" />
                                    <label class="slider-v1" for="vacacional"></label>
                                </div>
                                <div class="col-2">
                                    <a>Si</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group row">
                                <label for="amoblado" class="col-5">¿Deseas arrendarlo amoblado?</label>
                                <div class="col-2">
                                    <a>No</a>
                                </div>
                                <div class="col-3 bool text-center">
                                    <input type="checkbox" name="amoblado" value="1" id="amoblado" />
                                    <label class="slider-v1" for="amoblado"></label>
                                </div>
                                <div class="col-2">
                                    <a>Si</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group row border-end" id="horizontal">
                                <label for="reglamento" class="col-5">¿Tiene reglamento de propiedad
                                    horizontal?</label>
                                <div class="col-2">
                                    <a>No</a>
                                </div>
                                <div class="col-3 bool text-center">
                                    <input type="checkbox" name="reglamento" value="1" id="reglamento" checked />
                                    <label class="slider-v1" for="reglamento"></label>
                                </div>
                                <div class="col-2">
                                    <a>Si</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 ">
                        <div class="form-group row border-end">
                            <label for="habitado" class="col-5 form-label">Inmueble habitado</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" value="1" name="habitado" id="habitado" />
                                <label class="slider-v1" for="habitado"></label>
                            </div>
                            <div class="col-2">
                                <a>Si</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 ">
                        <div class="form-group row" id="arrendado">
                            <label for="arr_check" class="col-5">¿Se encuentra arrendado actualmente?</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" name="arr_check" id="arr_check" value="1" />
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
                            <label for="asesor" class="col-5 form-label">Nombre del Asesor</label>
                            <div class="col-7">
                                <input id="asesor" name="asesor" type="text" class="form-control">
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
                                        accept="image/*,.pdf" lang="es" required>
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
                            <label for="tipo_inm" class="col-5 form-label">Tipo de inmueble</label>
                            <div class="col-7">
                                {!! Form::select('tipo_inm', $inmueble, null, ['class' => 'form-select', 'id' => 'tipo_inm', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <label for="estado_inb" class="col-5 form-label">Estado del inmueble</label>
                            <div class="col-7" id="estado_apto">
                                {!! Form::select('estado_inb', $estado, null, ['class' => 'form-select', 'required' => 'required', 'id' => 'estado_inb']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 border-end">
                        <div class="form-group row" id="anoconstruido">
                            <label for="tiempo_inm" class="col-5 form-label">Años de
                                contruido</label>
                            <div class="col-7">
                                <input id="tiempo_inm" name="tiempo_inm" type="number" min="1" class="form-control"
                                    max="100">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row" id="SecRemodelado">
                            <label for="remodelado" class="col-5 form-label">Remodelado hace menos de 5
                                años</label>
                            <div class="col-7">
                                {!! Form::select('remodelado', $remodelado, null, ['class' => 'form-select', 'id' => 'remodelado']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group row border-end" id="sec_tuberia">
                            <label for="tuberia" class="col-5 form-label">Incluyó cambio de toda la
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
                    <div class="col-12 col-md-6 ">
                        <div class="form-group row border-end">
                            <label for="piso" class="col-5 form-label">Piso en el que está el
                                inmueble</label>
                            <div class="col-7">
                                <input id="piso" name="piso" type="number" min="1" max="30" class="form-control">
                                <div class="invalid-feedback d-none" id="errorpiso">
                                    Si el piso es superior a 30, dejalo en 30 😉
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <label for="ascensor" class="col-5 form-label">Ascensor</label>
                            <div class="col-2">
                                <a>No</a>
                            </div>
                            <div class="col-3 bool text-center">
                                <input type="checkbox" name="ascensor" value="1" id="ascensor" />
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
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <label for="estrato_inm" class="col-5 form-label">Estrato</label>
                            <div class="col-7">
                                {!! Form::select('estrato_inm', $estratos, null, ['class' => 'form-select', 'id' => 'tipo_inm', 'required' => 'required']) !!}
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
                            <label for="ciudad" class="col-5 form-label">Ciudad</label>
                            <div class="col-7">
                                <input id="ciudad" readonly name="ciudad" type="text" value="Bogotá" required="required"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <label for="direccion" class="col-5 form-label">Dirección inmueble</label>
                            <div class="col-7">
                                <input id="direccion" name="direccion" type="text" class="form-control"
                                    required="required" placeholder="Ejemplo: Calle 25A #52B-06">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group row border-end" id="detalles">
                            <label for="direccion_comp" class="col-5 form-label">Detalles</label>
                            <div class="col-7">
                                <input id="direccion_comp" name="direccion_comp" type="text" class="form-control"
                                    placeholder="Ejemplo: Apto. 302 Torre 7">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                    </div>
                </div>
            </div>
            <div class="row d-none">
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="detalles">
                        <label for="longitud" class="col-5 form-label">Longitud</label>
                        <div class="col-7">
                            <input id="longitud" name="longitud" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="detalles">
                        <label for="latitud" class="col-5 form-label">Latitud</label>
                        <div class="col-7">
                            <input id="latitud" name="latitud" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6 col-md-2 text-start">
                    <a href="{{ route('propietario.edit', $negocio) }}" class="btn botones">Atrás</a>
                </div>
                <div class="d-none d-md-block col-md-8"></div>
                <div class="col-6 col-md-2 text-end">
                    <button type="submit" class="btn botones" id="enviarnegocio">Siguiente</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="sentimos rounded text-center py-1 my-1">
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
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
        var exampleTriggerEl = document.getElementById('valor');
        var popover = bootstrap.Popover.getInstance(exampleTriggerEl);
    </script>
@endsection
