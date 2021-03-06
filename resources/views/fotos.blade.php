@extends('layouts.plantilla')
@section('title', 'Consigna tu inmueble')

@section('more_head')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="{!! asset('js/ocultos.js') !!}"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
    <div class="card bg-default tarjeta mt-3 shadow-lg animate__animated animate__fadeInRight" id="fotos">
        <div class="card-body">
            <form action="{{ route('fotos.store', $id) }}" class="dropzone" id="my-awesome-dropzone"></form>
            <div class="row mt-2">
                <div class="col-6 col-md-2 text-start">
                </div>
                <div class="d-none d-md-block col-md-6"></div>
                <div class="col-6 col-md-4 text-end">
                    <a href="{{ route('gracias.show', $id) }}" id="nofotos" class="btn botones">No cuento con fotos por ahora</a>
                    <a href="{{ route('gracias.show', $id) }}" id="finalizar" class="btn botones">Finalizar</a>                    
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

@section('scripts_footer')
    <script>
        Dropzone.options.myAwesomeDropzone = {
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dictDefaultMessage: "<i class='far fa-image'></i> <br/>Arrastre o haga clic en el recuadro para subir las fotos",
            acceptedFiles: "image/*",
            maxFiles: 10,
            init: function() {
                this.on("addedfile", file => {
                    $('#finalizar').show();
                    $('#nofotos').hide();
                });
            }
        };
    </script>

@endsection
