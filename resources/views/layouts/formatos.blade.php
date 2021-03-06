<!DOCTYPE html>
<html lang="es">

<head>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{!! asset('css/formatos.css') !!}">
    @yield('more_head')
    <title>@yield('title')</title>
</head>

<body>
    <div class="container">
        <div class="fixed-top px-3">
            <div class="row p-3 rounded-bottom cabecera shadow-sm">
                <div class="col-3">
                    <img src="{!! asset('img/logo_admin.png') !!}" alt="" class="logo">
                </div>
                <div class="col-1"></div>
                <div class="col-4">
                </div>
                <div class="col-4 d-flex align-items-end justify-content-end">
                    <small class="fw-light fecha">{{ date('d/ m/ Y') }}</small>
                </div>
            </div>
        </div>

        <div class="separador"></div>
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
        <div class="row fixed-bottom mb-3 d-print-none">
            <div class="col-3">
                <div class="row  px-3">
                    <div class="col-6 interior rayita">
                        <select class="form-select form-select-sm" id="modelos">
                            <option value="1" selected>Completo</option>
                            <option value="2">CPVJ</option>
                            <option value="3">Contrato</option>
                        </select>
                        <small class="fw-light fst-italic">M??delos</small>
                    </div>
                    <div class="col-6 interior rayita" id="sec_contratos">
                        @if ($datos->id_plan != null)
                        {!! Form::select('plan', $todos_planes, $datos->id_plan, ['class' => 'form-select', 'id' => 'plan']) !!}    
                        @else
                        {!! Form::select('plan', $todos_planes, null, ['class' => 'form-select vacio', 'id' => 'plan']) !!}    
                        @endif
                        
                        <small class="fw-light fst-italic">Planes</small>
                    </div>
                </div>
            </div>
            <div class="col-6"></div>
            <div class="col-3">
                <div class="row  px-3">
                    <div class="col-2">
                        <a href="{{ route('administrador.download') }}"
                            class="rounded-circle imprimir shadow d-flex border justify-content-center align-items-center animate__animated animate__fadeInRight"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Los cambios realizados no ser??n guardados">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="col-2">
                        <div class="rounded-circle imprimir shadow d-flex border justify-content-center align-items-center animate__animated animate__fadeInRight"
                            onclick="window.print();return false;">
                            <i class="fas fa-print"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('final')
</body>
