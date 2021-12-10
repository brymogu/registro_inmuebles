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
    <div class="row my-3 d-flex justify-content-evenly">
        <div class="col-3 card rounded shadow border-0 text-center">
            {!! Form::select('tipo_inm', $inmueble, $propiedad->tipo_inmueble, ['class' => 'form-select text-center', 'required' => 'required']) !!}
            <small>Tipo de inmueble</small>
        </div>
        <div class="col-3 card rounded shadow border-0 text-center">
            {!! Form::select('tipo', $negocio_tipo, $negocio_unico->tipo_negocio, ['class' => 'form-select text-center', 'required' => 'required', 'disabled' => 'disabled']) !!}
            <small>Tipo de negocio</small>
        </div>
        <div class="col-4 card rounded shadow border-0 text-center">
            <h3> {!! Form::select('conc_juridico', $conc_juridico, $negocio_unico->conc_juridico, ['class' => 'form-select text-center', 'required' => 'required', 'disabled' => 'disabled']) !!}</h3>
            <small>Concepto jurídico</small>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow rounded border-0">
                <div id="map">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('final')
    <script>
        var mymap = L.map('map').setView([4.6791626, -74.1148519], 10);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(mymap);
    </script>
@endsection
