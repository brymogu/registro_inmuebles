@extends('layouts.formatos')
@section('title', 'Concepto de precio y viabilidad jurídica')
@section('more_head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
@endsection

@section('content')
    @foreach ($datos as $datos)
        <div class="row">
            <div class="col-4">
                <div class="row lateral d-flex align-content-around flex-wrap rounded-3 fs-6 text-left">
                    <div class="col-12">
                        <i class="fas fa-handshake"></i>
                        <small class="fw-bold">{{ $datos->conc_precio }} </small><br>
                        <small class="fw-light fst-italic">Valor total calculado</small>
                    </div>
                    <div class="col-12">
                        @if ($datos->tipo_inmueble == 'Casa uso vivienda')
                            <i class="fas fa-home"></i>
                        @else
                            <i class="fas fa-building"></i>
                        @endif
                        <small class="fw-bold">{{ $datos->tipo_negocio }}</small> <br>
                        <small class="fw-light fst-italic">Tipo de negocio</small>
                    </div>
                    <div class="col-12">
                        @if ($datos->conc_juridico == 'Viable')
                            <i class="far fa-check-circle"></i>
                        @else
                            <i class="far fa-times-circle"></i>
                        @endif
                        <small class="fw-bold">{{ $datos->conc_juridico }}</small> <br>
                        <small class="fw-light fst-italic">Concepto jurídico</small>
                    </div>
                </div>
            </div>
            <div class="col-8 pe-0">
                <div id="map" class="rounded-start">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 seccion">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10 cabeza">
                        <p class="fw-bold">
                            @if ($datos->tipo_inmueble == 'Casa uso vivienda')
                                <i class="fas fa-home"></i>
                            @else
                                <i class="far fa-building"></i>
                            @endif
                            Datos del inmueble
                        </p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="row mt-1 interior">
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->tipo_inmueble }}</small> <br>
                        <small class="fw-light fst-italic">Tipo de inmueble</small>
                    </div>
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->matricula }}</small> <br>
                        <small class="fw-light fst-italic">N° matricula</small>
                    </div>
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->chip }}</small> <br>
                        <small class="fw-light fst-italic">Chip</small>
                    </div>
                </div>
                <div class="row my-1 interior">
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->direccion }}</small> <br>
                        <small class="fw-light fst-italic">Dirección</small>
                    </div>
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->ciudad }}</small> <br>
                        <small class="fw-light fst-italic">Ciudad</small>
                    </div>
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->estrato }}</small> <br>
                        <small class="fw-light fst-italic">Estrato</small>
                    </div>
                </div>
                <div class="row my-1 interior">
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->a_construida }}</small> <br>
                        <small class="fw-light fst-italic">Área construida</small>
                    </div>
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->a_privada }}</small> <br>
                        <small class="fw-light fst-italic">Área privada</small>
                    </div>
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->a_terreno }}</small> <br>
                        <small class="fw-light fst-italic">Área del terreno</small>
                    </div>
                </div>
                <div class="row my-1 interior">
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->horizontal }}</small> <br>
                        <small class="fw-light fst-italic">En propiedad horizontal</small>
                    </div>
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->estado }}</small> <br>
                        <small class="fw-light fst-italic">Estado del inmueble</small>
                    </div>
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->tiempo_inm }}</small> <br>
                        <small class="fw-light fst-italic">Tiempo de construido</small>
                    </div>
                </div>
                <div class="row my-1 interior">
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->n_hab }}</small> <br>
                        <small class="fw-light fst-italic">N° de habitaciones</small>
                    </div>
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->n_banos }}</small> <br>
                        <small class="fw-light fst-italic">N° de baños</small>
                    </div>
                    <div class="col-4">
                        <small class="fw-bold">{{ $datos->nivel }}</small> <br>
                        <small class="fw-light fst-italic">Niveles</small>
                    </div>
                </div>
                @if ($datos->gje_comunal == 'No')
                    <div class="row my-1 interior">
                        <div class="col-4">
                            <small class="fw-bold">{{ $datos->gje_comunal }}</small> <br>
                            <small class="fw-light fst-italic">Garaje Comunal</small>
                        </div>
                        <div class="col-4">
                            <small class="fw-bold">{{ $datos->no_garajes }}</small> <br>
                            <small class="fw-light fst-italic">N° de garajes</small>
                        </div>
                        <div class="col-4">
                            <small class="fw-bold">{{ $datos->gje_cubierto }}</small> <br>
                            <small class="fw-light fst-italic">Niveles</small>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10 pie">
                        <p></p>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
        <div class="d-none">
            <input type="number" name="latitud" id="latitud" value="{{ $datos->latitud }}">
            <input type="number" name="longitud" id="longitud" value="{{ $datos->longitud }}">
        </div>
    @endforeach
@endsection
@section('final')
    <script>
        latitud = $('#latitud').val();
        longitud = $('#longitud').val();
        coordenadas = [latitud, longitud];

        var mymap = L.map('map').setView(coordenadas, 16);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(mymap);
        var marker = new L.marker(coordenadas, {}).addTo(mymap);
    </script>
@endsection