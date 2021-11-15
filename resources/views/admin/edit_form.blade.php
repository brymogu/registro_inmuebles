@extends('layouts.administrador')
@section('more_head')

@endsection

@section('title', 'Editar Form')

@section('content')
    <div class="col-12 pt-5 px-3 formulario_edit">
        <p class="fw-bold ">Datos Personales</p>
        {{ Form::open(['method' => 'post']) }}
        <div class="card p-3 shadow-sm border-0 ">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label class="col-5 col-form-label" for="name">Nombres</label>
                        <div class="col-7">
                            <input id="name" name="name" type="text" class="form-control"
                                value="{{ $propietario->name }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="text" class="col-5 col-form-label">Apellidos</label>
                        <div class="col-7">
                            <input id="text" name="lastname" type="text" class="form-control"
                                value="{{ $propietario->lastname }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0 ">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="phone" class="col-5 col-form-label">Teléfono celular</label>
                        <div class="col-7">
                            <input id="phone" name="phone" type="tel" value="{{ $propietario->phone }}"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="email" class="col-5 col-form-label">E-mail</label>
                        <div class="col-7">
                            <input id="email" name="email" type="email" value="{{ $propietario->email }}"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0 ">
            <div class="row">
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row">
                        <label for="id" class="col-5 col-form-label">Tipo DI</label>
                        <div class="col-7">
                            {!! Form::select('id', $tipos_documento, $propietario->tipo_doc, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="idnumber" class="col-5 col-form-label">Número DI</label>
                        <div class="col-7">
                            <input id="idnumber" name="idnumber" type="number" class="form-control"
                                value="{{ $propietario->doc_number }}" required="required" min="800">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="fw-bold my-3">Negocio</p>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label class="col-5 col-form-label" for="name">CHIP</label>
                        <div class="col-7">
                            <input id="name" name="name" type="text" class="form-control" value="{{ $propiedad->chip }}"
                                required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="text" class="col-5 col-form-label">Matricula</label>
                        <div class="col-7">
                            <input id="text" name="lastname" type="text" class="form-control"
                                value="{{ $propiedad->matricula }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="tipo" class="col-5">Escoge el negocio a realizar con este
                            inmueble</label>
                        <div class="col-7">
                            {!! Form::select('tipo', $negocio, $negocio_unico->tipo_negocio, ['class' => 'form-select', 'id' => 'negocio', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="text" class="col-5 col-form-label">Matricula</label>
                        <div class="col-7">
                            <input id="text" name="lastname" type="text" class="form-control"
                                value="{{ $propiedad->matricula }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    @endsection

    @section('final')

    @endsection
