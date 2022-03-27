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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{!! asset('css/admin.css') !!}">
    <script src="{!! asset('js/admin.js') !!}"></script>
    @yield('more_head')
    <title>@yield('title')</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 menu d-flex">
                <div class="card tarjeta shadow-sm border-0  align-self-center py-3 align-items-start vh-95 rounded">
                    <div class="card-body">
                        <ul class="nav flex-column">
                            <div class="btn-group dropend mb-5">
                                <a class="btn btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{!! asset('img/epica.svg') !!}" alt="" class="logo">
                                </a>
                                <ul class="dropdown-menu shadow border-0 dropdown-menu-end" aria-labelledby="logmenu">
                                    <li><a class="dropdown-item disabled">
                                            {{ $_SESSION['nombre'] }}
                                        </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item salir " href="{{ route('salir') }}"><i
                                                class="fas fa-sign-out-alt"></i> Salir</a>
                                    </li>
                                </ul>
                            </div>

                            <li class="nav-item rounded-pill home">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('administrador.main') }}"><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="nav-item rounded-pill editar">
                                <a class="nav-link" href="{{ route('administrador.edit') }}"> <i
                                        class="fas fa-pencil-alt"></i> Editar</a>
                            </li>
                            <li class="nav-item rounded-pill descargas">
                                <a class="nav-link" href="{{ route('administrador.download') }}"><i
                                        class="fas fa-angle-double-down"></i> Descargas </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-10 contenido vh-100">
                @yield('content')
            </div>
        </div>
    </div>
    @yield('final')
</body>

</html>
