@extends('layouts.administrador')
@section('title', 'Editar Usurio')
@section('content')
    <div class="row" id="contrasena">
        <div class="col-4"></div>
        <div class="col-4 pt-5 px-3 formulario_edit">
            <div class="card p-5 border-0 shadow">
                <h5 class="text-center">Crear usuario</h5>
                <p class="fw-bold iconogrande text-center"><i class="fas fa-user-plus"></i></p>
                {{ Form::open(['route' => 'administrador.guardarusuarios', 'method' => 'post']) }}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">
                            <label class="col-5 col-form-label" for="name">Usuario</label>
                            <div class="col-7">
                                <input id="usuario" name="usuario" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12">
                        <div class="form-group row">
                            <label class="col-5 col-form-label" for="password">Contraseña</label>
                            <div class="col-7">
                                <div class="input-group">
                                    <input id="password" name="password" type="password" class="form-control" required>
                                    <div class="input-group-text"><a onclick="mostrarContrasena()"><i class="far fa-eye"
                                                id="password_icon"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="confirmar" class="col-5 col-form-label">Confirmar contraseña</label>
                            <div class="col-7">
                                <div class="input-group">
                                    <input id="confirmar" name="confirmar" type="password" class="form-control" required>
                                    <div class="input-group-text"><a onclick="mostrarconfirmar()"><i class="far fa-eye"
                                                id="confirmar_icon"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3" id="validacion">
                    <div class="col-12">
                        <p class="text-warning fw-bold">Las contraseñas no coinciden</p>
                    </div>
                </div>
                <div class="row" id="boton">
                    <div class="col-6">

                    </div>
                    <div class="col-6 text-end">
                        <button type="submit" class="btn botones">Crear</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
        <div class="col-4"></div>
    </div>

@endsection
@section('final')
    <script>
        function mostrarContrasena() {
            var tipo = document.getElementById("password");
            if (tipo.type == "password") {
                tipo.type = "text";
                $('#password_icon').removeClass("far fa-eye");
                $('#password_icon').addClass("fas fa-eye-slash");
            } else {
                tipo.type = "password";
                $('#password_icon').addClass("far fa-eye");
                $('#password_icon').removeClass("fas fa-eye-slash");
            }
        }

        function mostrarconfirmar() {
            var tipo = document.getElementById("confirmar");
            if (tipo.type == "password") {
                tipo.type = "text";
                $('#confirmar_icon').removeClass("far fa-eye");
                $('#confirmar_icon').addClass("fas fa-eye-slash");

            } else {
                tipo.type = "password";
                $('#confirmar_icon').addClass("far fa-eye");
                $('#confirmar_icon').removeClass("fas fa-eye-slash");
            }
        }
    </script>
@endsection
