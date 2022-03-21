@extends('layouts.plantilla')
@section('title', 'Gracias')

@section('content')
    <div class="card bg-default tarjeta animate__animated animate__fadeIn" id="agradecimiento">
        <div class="card-body">
            <div id="agradecpvj" class="col-12">
                <div class="row">
                    <div class="col-12">
                        <p>Gracias {{ $propietario->name }} por el registro de tu inmueble, al hacer clic en el botón
                            “finalizar” habrás culminado este paso. </p>
                        <p>Si has cargado correctamente la información solicitada en este registro, en 24 horas de días
                            hábiles una persona de nuestro equipo te enviará el concepto de precio gratuito al correo
                            registrado indicando los pasos a seguir
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-10"></div>
                    <div class="col-6 col-md-2 text-end">
                        <a class="btn botones" id="final" href="https://epicainmobiliaria.com/">Finalizar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
