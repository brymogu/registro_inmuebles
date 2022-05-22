@extends('layouts.plantilla')
@section('title', 'Consigna tu inmueble')
@section('more_head')
    <script src="{!! asset('js/selects.js') !!}"></script>
    <link rel="stylesheet" href="{!! asset('css/intlTelInput.css') !!}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"
        integrity="sha256-eiohPQlDytO6qQO+k+xX6LyVgfXcTzlPCy9t/VjceYo=" crossorigin="anonymous"></script>

    <script src="https://www.google.com/recaptcha/enterprise.js?render=6Le5xAggAAAAAPmJRp9onjRJL6SAuIkjs-lBggOs"></script>
    <script>
        grecaptcha.enterprise.ready(function() {
            grecaptcha.enterprise.execute('6Le5xAggAAAAAPmJRp9onjRJL6SAuIkjs-lBggOs', {
                action: 'login'
            }).then(function(token) {
                ...
            });
        });
    </script>
@endsection

@section('content')
    <div class="card bg-default tarjeta animate__animated animate__fadeInUp" id="propietario">
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
                                    <input id="text" name="lastname" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group row">
                                <label class="col-5 col-form-label" for="name">Nombres</label>
                                <div class="col-7">
                                    <input id="name" name="name" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 border-end">
                            <div class="form-group row">
                                <label for="email" class="col-5 col-form-label">E-mail</label>
                                <div class="col-7">
                                    <input id="email" name="email" type="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group row">
                                <label for="phone" class="col-5 col-form-label">Teléfono celular</label>
                                <div class="col-7">
                                    <input type="number" id="phone" name="phone" class="form-control" placeholder=" "
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 my-3 text-left">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="tyc" name="tyc" required>
                                <label class="form-check-label tyc" for="tyc">
                                    Acepto <a
                                        href="http://www.epicainmobiliaria.com.co/politica-de-privacidad-y-proteccion-de-datos-personales/"
                                        data-toggle="modal" data-target="#exampleModal" target="_blank">términos y
                                        condiciones </a>
                                    del servicio de registro de inmuebles y/o concepto de precio y viabilidad jurídica,
                                    ademas acepto recibir comunicaciones de Épica Inmobiliaria<sup>&reg;</sup> de
                                    acuerdo con su <a
                                        href="http://epicainmobiliaria.com/politica-de-privacidad-y-proteccion-de-datos-personales/"
                                        target="_blank">política de privacidad </a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 col-md-10"></div>
                        <input type="text" id="countrycode" class="d-none">
                        <div class="col-6 col-md-2 text-end">
                            <button type="submit" class="btn botones g-recaptcha" data-sitekey="reCAPTCHA_site_key"
                                data-callback='onSubmit' data-action='submit'>Siguiente</button>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
    <div class="row">
        <div class="position-fixed col-10 bottom-0 start-0 p-3 animate__animated animate__fadeInUp animate__delay-2s"
            style="z-index: 11">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-animation="false"
                data-bs-autohide="false">
                <div class="toast-header">
                    <img src="{!! asset('img/icons/favicon-16x16.png') !!}" class="rounded me-2" alt="...">
                    <strong class="me-auto">Epica Inmobiliaria</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Recuerda que el fin de este registro es únicamente realizar un concepto de precio y no estás obligado a
                    consignar tu inmueble
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts_footer')
    <script src="{!! asset('js/tel/intlTelInput.js') !!}"></script>
    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            allowDropdown: true,
            autoHideDialCode: false,
            //autoPlaceholder: "aggressive",
            // dropdownContainer: document.body,
            // excludeCountries: ["us"],
            formatOnDisplay: true,
            // geoIpLookup: function(callback) {
            //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            //     var countryCode = (resp && resp.country) ? resp.country : "";
            //     callback(countryCode);
            //   });
            // },
            hiddenInput: "full_number",
            initialCountry: "co",
            // localizedCountries: { 'de': 'Deutschland' },
            nationalMode: false,
            // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            placeholderNumberType: "MOBILE",
            preferredCountries: ['co', 'us'],
            separateDialCode: true,
            utilsScript: "js/tel/utils.js",
        });
    </script>
@endsection
