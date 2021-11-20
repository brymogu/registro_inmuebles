@extends('layouts.plantilla')
@section('title', 'Consigna tu inmueble')
@section('more_head')
<script src="{!! asset('js/condiciones_edit.js') !!}"></script>
@endsection


@section('content')
<div class="card bg-default tarjeta animate__animated animate__fadeIn" id="propietario">
    <div class="card-body">
        {{ Form::open(['method' => 'post']) }}
        <div class="row seccion">
            <div class="col-12">
                <div class="row seccion">
                    <div class="col-12">
                        <h4>Datos personales del solicitante</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 border-end">
                        <div class="form-group row">
                            <label for="text" class="col-5 col-form-label">Apellidos</label>
                            <div class="col-7">
                                <input id="text" name="lastname" type="text" class="form-control" value="{{ $propietario->lastname }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <label class="col-5 col-form-label" for="name">Nombres</label>
                            <div class="col-7">
                                <input id="name" name="name" type="text" class="form-control" value="{{ $propietario->name }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <label for="phone" class="col-5 col-form-label">Teléfono celular</label>
                            <div class="col-7">
                                <input id="phone" name="phone" type="tel" value="{{ $propietario->phone }}" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 border-end">
                        <div class="form-group row">
                            <label for="email" class="col-5 col-form-label">E-mail</label>
                            <div class="col-7">
                                <input id="email" name="email" type="email" value="{{ $propietario->email }}" class="form-control" disabled required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 my-3 text-left">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="tyc" name="tyc" checked required>
                            <label class="form-check-label tyc" for="tyc">
                                Acepto <a href="http://www.epicainmobiliaria.com.co/politica-de-privacidad-y-proteccion-de-datos-personales/" data-toggle="modal" data-target="#exampleModal" target="_blank">términos y
                                    condiciones </a>
                                del servicio de registro de inmuebles y/o concepto de precio y viabilidad jurídica,
                                ademas acepto recibir comunicaciones de Épica Inmobiliaria<sup>&reg;</sup> de
                                acuerdo con su <a href="http://epicainmobiliaria.com/politica-de-privacidad-y-proteccion-de-datos-personales/" target="_blank">política de privacidad </a>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 col-md-10"></div>
                    <input type="text" id="countrycode" class="d-none">
                    <div class="col-6 col-md-2 text-end">
                        <button type="submit" class="btn botones">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
<div class="position-fixed bottom-0 start-0 p-3 animate__animated animate__fadeInUp animate__delay-2s	" style="z-index: 11">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-animation="false" data-bs-autohide="false">
        <div class="toast-header">
            <img src="{!! asset('img/icons/favicon-16x16.png') !!}" class="rounded me-2" alt="...">
            <strong class="me-auto">Epica Inmobiliaria</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hola, recuerda que este registro no corresponde a un contrato
        </div>
    </div>
</div>
<a href="https://api.whatsapp.com/send?phone=573174231781&text=Hola,%20deseo%20un%20concepto%20de%20precio%20y%20viabilidad%20jurídica.%20Mi%20inmueble%20es%20diferente%20a%20tipo%20apartamento,%20apartaestudio%20y%20casa%20uso%20vivienda" class="float whts" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
</a>
<script src="{!! asset('js/tel/intlTelInput.js') !!}"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        // allowDropdown: false,
        // autoHideDialCode: false,
        autoPlaceholder: "aggressive",
        // dropdownContainer: document.body,
        // excludeCountries: ["us"],
        // formatOnDisplay: false,
        // geoIpLookup: function(callback) {
        //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        //     var countryCode = (resp && resp.country) ? resp.country : "";
        //     callback(countryCode);
        //   });
        // },
        // hiddenInput: "full_number",
        initialCountry: "co",
        // localizedCountries: { 'de': 'Deutschland' },
        nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        placeholderNumberType: "MOBILE",
        preferredCountries: ['co', 'us'],
        // separateDialCode: true,
        utilsScript: "js/tel/utils.js",
    });
</script>
@endsection