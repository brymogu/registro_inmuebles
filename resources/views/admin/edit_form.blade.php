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
                        <label for="tipo" class="col-5">Tipo de negocio</label>
                        <div class="col-7">
                            {!! Form::select('tipo', $negocio_tipo, $negocio_unico->tipo_negocio, ['class' => 'form-select', 'id' => 'negocio', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="valorgrupo">
                        <label for="valor" id="valorlabel" class="col-5 col-form-label">Valor tentativo</label>
                        <div class="col-7">
                            <input id="valor" name="valor" type="number" value="{{ $negocio_unico->valor }}"
                                class="form-control" min="99000" required="required">
                            <span id="valorpesos" class="form-text text-muted"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="espropietario" class="col-5">Propietario del
                            inmueble</label>
                        <div class="col-7">
                            <select id="espropietario" class="form-select" name="espropietario" required="required">
                                @if ($propiedad->espropietario == 'Si')
                                    <option selected value="Si">Si</option>
                                    <option value="No">No</option>
                                @else
                                    <option value="Si">Si</option>
                                    <option selected value="No">No</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="pqgrupo">
                        <label for="pqsolicita" class="col-5 col-form-label">¿Por qué desea publicar el
                            inmueble?</label>
                        <div class="col-7">
                            <input id="pqsolicita" name="pqsolicita" type="text" class="form-control" required="required"
                                value="{{ $propiedad->pqsolicita }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="habitado" class="col-5 col-form-label">Inmueble habitado</label>
                        <div class="col-7">
                            <select id="habitado" class="form-select" name="habitado" required="required">
                                @if ($propiedad->habitado == 'Si')
                                    <option selected value="Si">Si</option>
                                    <option value="No">No</option>
                                @else
                                    <option value="Si">Si</option>
                                    <option selected value="No">No</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="arrendado" class="col-5">¿Arrendado actualmente?</label>
                        <div class="col-7">
                            <select id="arrendado" class="form-select" name="arrendado" required="required">
                                @if ($propiedad->arrendado == 'Si')
                                    <option selected value="Si">Si</option>
                                    <option value="No">No</option>
                                @else
                                    <option value="Si">Si</option>
                                    <option selected value="No">No</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="urbano" class="col-5 col-form-label">Inmueble urbano</label>
                        <div class="col-7">
                            <select id="urbano" class="form-select" name="urbano" required="required">
                                @if ($propiedad->urbano == 'Si')
                                    <option selected value="Si">Si</option>
                                    <option value="No">No</option>
                                @else
                                    <option value="Si">Si</option>
                                    <option selected value="No">No</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="embargo" class="col-5">Inmueble con embargo</label>
                        <div class="col-7">
                            <select id="embargo" class="form-select" name="embargo" required="required">
                                @if ($propiedad->embargo == 'Si')
                                    <option selected value="Si">Si</option>
                                    <option value="No">No</option>
                                @else
                                    <option value="Si">Si</option>
                                    <option selected value="No">No</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="asesor" class="col-5 col-form-label">Nombre del Asesor</label>
                        <div class="col-7">
                            <input id="asesor" name="asesor" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="fw-bold my-3">Datos del inmueble</p>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="tipo_inm" class="col-5 col-form-label">Tipo de inmueble</label>
                        <div class="col-7">
                            {!! Form::select('tipo_inm', $inmueble, $propiedad->tipo_inmueble, ['class' => 'form-select', 'id' => 'tipo_inm', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="estado_inb" class="col-5 col-form-label">Estado del inmueble</label>
                        <div class="col-7">
                            {!! Form::select('estado_inb', $estado, $propiedad->estado, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="estrato_inm" class="col-5 col-form-label">Estrato</label>
                        <div class="col-7">
                            {!! Form::select('estrato_inm', $estratos, $propiedad->estrato, ['class' => 'form-select', 'id' => 'tipo_inm', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="conjunto" class="col-5">El inmueble se encuentra en
                            conjunto cerrado o edificio </label>
                        <div class="col-7">
                            <select id="conjunto" class="form-select" name="conjunto" required="required">
                                @if ($propiedad->horizontal == 'Si')
                                    <option selected value="Si">Si</option>
                                    <option value="No">No</option>
                                @else
                                    <option value="Si">Si</option>
                                    <option selected value="No">No</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row">
                        <label for="tiempo_inm" class="col-5 col-form-label">Años de
                            contruido</label>
                        <div class="col-7">
                            <input id="tiempo_inm" name="tiempo_inm" type="number" value="{{ $propiedad->tiempo_inm }}"
                                min="0" class="form-control" max="80" required="required">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row" id="SecRemodelado">
                        <label for="remodelado" class="col-5 col-form-label">Remodelado hace menos de 5
                            años</label>
                        <div class="col-7">
                            {!! Form::select('remodelado', $remodelado, null, ['class' => 'form-select', 'id' => 'remodelado']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="sec_tuberia">
                        <label for="tuberia" class="col-5 col-form-label">Incluyó cambio de toda la
                            tubería</label>
                        <div class="col-7">
                            <select id="tuberia" class="form-select" name="tuberia" required="required">
                                @if ($propiedad->tuberia == 'Si')
                                    <option selected value="Si">Si</option>
                                    <option value="No">No</option>
                                @else
                                    <option value="Si">Si</option>
                                    <option selected value="No">No</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row" id="aptos2">
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row">
                        <label for="piso" class="col-5 col-form-label">Piso en el que está el
                            inmueble</label>
                        <div class="col-7">
                            <input id="piso" name="piso" type="number" min="1" max="30" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="ascensor" class="col-5 col-form-label">Ascensor</label>
                        <div class="col-7">
                            <select id="ascensor" class="form-select" name="ascensor" required="required">
                                @if ($propiedad->ascensor == 'Si')
                                    <option selected value="Si">Si</option>
                                    <option value="No">No</option>
                                @else
                                    <option value="Si">Si</option>
                                    <option selected value="No">No</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="fw-bold my-3">Ubicación</p>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="ciudad" class="col-5 col-form-label">Ciudad</label>
                        <div class="col-7">
                            {!! Form::select('ciudad', $ciudad, 1, ['class' => 'form-select', 'id' => 'ciudad']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row">
                        <div class="col-5">
                            <label for="direccion" class="col-form-label">Dirección inmueble</label>
                        </div>
                        <div class="col-7">
                            <input id="direccion" name="direccion" type="text" class="form-control" required="required"
                                value="{{ $propiedad->direccion }}" placeholder="Calle 25A #52B-06">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="detalles">
                        <div class="col-5">
                            <label for="direccion_comp" class="col-form-label">Detalles</label>
                        </div>
                        <div class="col-7">
                            <input id="direccion_comp" name="direccion_comp" type="text" class="form-control"
                                value="{{ $propiedad->direccion_comp }}" placeholder="Torre 7 Apto. 302">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="detalles">
                        <div class="col-5">
                            <label for="longitud" class="col-form-label">Longitud</label>
                        </div>
                        <div class="col-7">
                            <input id="longitud" name="longitud" type="text" class="form-control"
                                value="{{ $propiedad->longitud }}">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="detalles">
                        <div class="col-5">
                            <label for="latitud" class="col-form-label">Latitud</label>
                        </div>
                        <div class="col-7">
                            <input id="latitud" name="latitud" type="text" class="form-control"
                                value="{{ $propiedad->latitud }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="fw-bold my-3">Más detalles del inmueble</h5>
        <p class="fw-bold my-3">Área (m<sup>2</sup>)</p>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="a_construida" class="col-5 col-form-label">Construida</label>
                        <div class="col-7">
                            <input id="a_construida" name="a_construida" type="number" step="0.1" min="11"
                                class="form-control" value="{{ $propiedad->a_construida }}" required="required">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="a_privada" class="col-5 col-form-label">Privada</label>
                        <div class="col-7">
                            <input id="a_privada" name="a_privada" type="number" min="11" step="0.1"
                                value="{{ $propiedad->a_privada }}" required="required" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    @if ($propiedad->tipo_inmueble == 1)
                        <div class="form-group row" id="s3_terreno">
                            <label for="a_terreno" class="col-5 col-form-label">De terreno</label>
                            <div class="col-7">
                                <input id="a_terreno" name="a_terreno" type="number" min="11" step="0.1"
                                  value="{{$propiedad->a_terreno}}"  class="form-control" required>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <p class="fw-bold my-3">Cantidad de:</p>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="piso" class="col-6 col-form-label">Nivel(es)</label>
                        <div class="col-6">
                            <input class="form-control" type="number" min="1" max="100" name="piso" id="piso"
                            value="{{$propiedad->piso}}" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row mb-3">
                        <label for="n_hab" class="col-6 col-form-label">Habitación(es)</label>
                        <div class="col-6">
                            <input class="form-control" name="n_hab" type="number" min="1" max="100" id="n_hab"
                            value="{{$propiedad->n_hab}}" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row mb-3">
                        <label for="no_banos" class="col-6 col-form-label">Baño(s)</label>
                        <div class="col-6">
                            <input class="form-control" type="number" name="n_banos" min="1" max="100" id="n_banos" 
                            value="{{$propiedad->n_banos}}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    @endsection

    @section('final')

    @endsection
