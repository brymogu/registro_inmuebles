@extends('layouts.administrador')

@section('content')
    <div class="row" id="home">
        <div class="col-12">
            <h3 class="mt-5">Holi {{ $_SESSION['nombre'] }}</h3>
        </div>
    </div>
@endsection
