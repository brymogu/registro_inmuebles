<!DOCTYPE html>
<html lang="es">

<head>
    @yield('cabeza')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('img/icons/apple-touch-icon.png') !!}">
    <link rel="icon" type="image/png" sizes="32x32" href="{!! asset('img/icons/favicon-32x32.png') !!}">
    <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('img/icons/favicon-16x16.png') !!}">
    <link rel="manifest" href="{!! asset('img/icons/site.webmanifest') !!}">
    <link rel="mask-icon" href="{!! asset('img/icons/safari-pinned-tab.svg') !!}" color="#f6c015">
    <link rel="shortcut icon" href="{!! asset('img/icons/favicon.ico') !!}">
    <meta name="msapplication-TileColor" content="#01303c">
    <meta name="msapplication-config" content="{!! asset('img/icons/browserconfig.xml') !!}">
    <meta name="theme-color" content="#01303c">
    <!--Boostrap-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="{!! asset('css/intlTelInput.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
    <script src="{!! asset('js/condiciones.js') !!}"></script>
    @yield('more_head')
    <title>@yield('title')</title>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="d-none d-md-block col-md-1"></div>
            <div class="col-12 col-md-10">
                <div class="card bg-default tarjeta my-1 shadow-lg animate__animated">
                    <div class="cabecera">
                        <div class="row progreso align-items-center">
                            <div class="col-12 col-md-2 text-center">
                                <img id="logo_image" src="{!! asset('img/epica.svg') !!}" class="img-fluid"
                                    alt="company logo">
                            </div>
                            <div class="d-none d-md-block col-md-1"></div>
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="d-none d-md-block col-md-1"></div>
                                    <div class="col-12 col-md-10 text-center">
                                        <h4>Portal de consignación de inmuebles</h4>
                                    </div>
                                    <div class="d-none d-md-block col-md-1"></div>
                                </div>
                                <div class="row mt-3 text-center steps align-items-center">
                                    <div class="col usuario">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="col usuario barra">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                                style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col negocio">
                                        <i class="far fa-handshake"></i>
                                    </div>
                                    <div class="col negocio barra">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                                style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col detalles ">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="col detalles barra">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                                style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    @if ($tipo == 'Si')
                                        <div class="col conjunto" id="iconjunto">
                                            <i class="far fa-building"></i>
                                        </div>
                                        <div class="col conjunto barra" id="conjunto_bar">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped" role="progressbar"
                                                    style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    @endif


                                    <div class="col camara">
                                        <i class="fas fa-camera-retro"></i>
                                    </div>
                                    <div class="col camara barra">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                                style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col planes">
                                        <i class="far fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-md-block col-md-1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-md-block col-md-1"></div>
        </div>

        <div class="row">
            <div class="d-none d-md-block col-md-1"></div>
            <div class="col-12 col-md-10">
                <!-- tarjeta 1-->
                @yield('content')
            </div>
            <div class="d-none d-md-block col-md-1"></div>
        </div>        
    </div>
    @yield('scripts_footer')
</body>

</html>
