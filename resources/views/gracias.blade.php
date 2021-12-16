@extends('layouts.plantilla')
@section('title', 'Gracias')

@section('content')
    <div class="card bg-default tarjeta animate__animated animate__fadeIn" id="agradecimiento">
        <div class="card-body">
            <div id="agradecpvj" class="col-12">
                <div class="row">
                    <div class="col-12">
                        <p>Gracias {{ $propietario->name }} por el registro de tu inmueble, al hacer clic en el botón
                            “finalizar” habrás
                            culminado este proceso. </p>
                        <p>En el menor tiempo posible una persona de nuestro equipo te contactará para llevar a cabo la
                            firma electrónica del contrato de consignación y posterior inicio de la gestión comercial de
                            tu inmueble.
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
