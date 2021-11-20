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
                            <input id="piso" name="piso" type="number" min="1" max="30" value="{{ $propiedad->piso }}" class="form-control">
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
        <p class="fw-bold my-3">Material del piso en:</p>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="form-group row">
                        <label for="material_hab" class="col-6 col-form-label">Habitación(es)</label>
                        <div class="col-6">
                            {!! Form::select('material_hab', $mat_habitaciones, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 text-center">
                    <div class="form-group row">
                        <label for="mp_cocina" class="col-4 col-form-label">Cocina</label>
                        <div class="col-8">
                            {!! Form::select('mp_cocina', $mat_cocina, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 text-center">
                    <div class="form-group row">
                        <label for="mat_piso_bano" class="col-4 col-form-label">Baño(s)</label>
                        <div class="col-8">
                            {!! Form::select('mat_piso_bano', $mat_bano, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 text-center">
                    <div class="form-group row">
                        <label for="mat_piso_zona_social" class="col-4 col-form-label">Zona
                            social</label>
                        <div class="col-8">
                            {!! Form::select('mat_piso_zona_social', $mat_zsocial, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="fw-bold my-3">Características internas inmueble:</p>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="mb_cocina" class="col-6 col-form-label">Mobiliario cocina</label>
                        <div class="col-6">
                            {!! Form::select('mb_cocina', $mb_cocina, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="estufa" class="col-6 col-form-label">Estufa</label>
                        <div class="col-6">
                            {!! Form::select('estufa', $estufa, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="horno" class="col-6 col-form-label">Horno</label>
                        <div class="col-6">
                            {!! Form::select('horno', $horno, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="tp_cocina" class="col-6 col-form-label">Tipo de cocina</label>
                        <div class="col-6">
                            {!! Form::select('tp_cocina', $tipo_cocina, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="calentador" class="col-6 col-form-label">Calentador</label>
                        <div class="col-6">
                            {!! Form::select('calentador', $calentador, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="vista" class="col-6 col-form-label">Vista</label>
                        <div class="col-6">
                            {!! Form::select('vista', $vista, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="zona_social" class="col-6 col-form-label">Zona social</label>
                        <div class="col-6">
                            {!! Form::select('zona_social', $zonas, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="material_fachada" class="col-6 col-form-label">Material
                            fachada</label>
                        <div class="col-6">
                            {!! Form::select('material_fachada', $mat_fachada, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-block col-md-4"></div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="garaje" class="col-5 col-form-label">Garaje</label>
                        <div class="col-7">
                            <select id="garaje" class="form-select" name="garaje" required="required">
                                @if ($propiedad->garaje == 'Si')
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
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="chimenea" class="col-5 col-form-label">Chimenea</label>
                        <div class="col-7">
                            <select id="chimenea" class="form-select" name="chimenea" required="required">
                                @if ($propiedad->chimenea == 'Si')
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
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="balcon" class="col-5 col-form-label">Balcón</label>
                        <div class="col-7">
                            <select id="balcon" class="form-select" name="balcon" required="required">
                                @if ($propiedad->balcon == 'Si')
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
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="b_servicio" class="col-5 col-form-label">Baño servicio</label>
                        <div class="col-7">
                            <select id="b_servicio" class="form-select" name="b_servicio" required="required">
                                @if ($propiedad->b_servicio == 'Si')
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
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="b_social" class="col-5 col-form-label">Baño social</label>
                        <div class="col-7">
                            <select id="b_social" class="form-select" name="b_social" required="required">
                                @if ($propiedad->b_social == 'Si')
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
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="star" class="col-5 col-form-label">Estudio</label>
                        <div class="col-7">
                            <select id="estudio" class="form-select" name="estudio" required="required">
                                @if ($propiedad->estudio == 'Si')
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
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="deposito" class="col-5 col-form-label">Depósito</label>
                        <div class="col-7">
                            <select id="deposito" class="form-select" name="deposito" required="required">
                                @if ($propiedad->deposito == 'Si')
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
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="hab_servicio" class="col-5 col-form-label">Habitación de
                            servicio</label>
                        <div class="col-7">
                            <select id="hab_servicio" class="form-select" name="hab_servicio" required="required">
                                @if ($propiedad->hab_servicio == 'Si')
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
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="star" class="col-5 col-form-label">Star de entretenimiento</label>
                        <div class="col-7">
                            <select id="star" class="form-select" name="star" required="required">
                                @if ($propiedad->star == 'Si')
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
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="zona_lavanderia" class="col-5 col-form-label">Zona de lavanderia</label>
                        <div class="col-7">
                            <select id="zona_lavanderia" class="form-select" name="zona_lavanderia" required="required">
                                @if ($propiedad->zona_lavanderia == 'Si')
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
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="entrega_cortinas" class="col-5 col-form-label">Entrega con cortinas</label>
                        <div class="col-7">
                            <select id="entrega_cortinas" class="form-select" name="entrega_cortinas" required="required">
                                @if ($propiedad->entrega_cortinas == 'Si')
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
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="terraza" class="col-5 col-form-label">Terraza</label>
                        <div class="col-7">
                            <select id="terraza" class="form-select" name="terraza" required="required">
                                @if ($propiedad->terraza == 'Si')
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
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="piscina_p" class="col-5 col-form-label">Piscina privada</label>
                        <div class="col-7">
                            <select id="piscina_p" class="form-select" name="piscina_p" required="required">
                                @if ($propiedad->piscina_p == 'Si')
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
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="sauna_p" class="col-5 col-form-label">Sauna privado</label>
                        <div class="col-7">
                            <select id="sauna_p" class="form-select" name="sauna_p" required="required">
                                @if ($propiedad->sauna_p == 'Si')
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
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="turco_p" class="col-5 col-form-label">Turco privado</label>
                        <div class="col-7">
                            <select id="turco_p" class="form-select" name="turco_p" required="required">
                                @if ($propiedad->turco_p == 'Si')
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
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="jacuzzi_p" class="col-5 col-form-label">Jacuzzi privado</label>
                        <div class="col-7">
                            <select id="jacuzzi_p" class="form-select" name="jacuzzi_p" required="required">
                                @if ($propiedad->jacuzzi_p == 'Si')
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
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="tina_p" class="col-5 col-form-label">Tina privada</label>
                        <div class="col-7">
                            <select id="tina_p" class="form-select" name="tina_p" required="required">
                                @if ($propiedad->tina_p == 'Si')
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
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="turco_p" class="col-5 col-form-label">Aire acondicionado privado</label>
                        <div class="col-7">
                            <select id="turco_p" class="form-select" name="turco_p" required="required">
                                @if ($propiedad->turco_p == 'Si')
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
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="calefaccion_p" class="col-5 col-form-label">Calefacción privada</label>
                        <div class="col-7">
                            <select id="calefaccion_p" class="form-select" name="calefaccion_p" required="required">
                                @if ($propiedad->calefaccion_p == 'Si')
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
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="patio" class="col-5 col-form-label">Patio interior</label>
                        <div class="col-7">
                            <select id="patio" class="form-select" name="patio" required="required">
                                @if ($propiedad->patio == 'Si')
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
        <p class="fw-bold my-3">Garaje(s):</p>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="no_garajes" class="col-6 col-form-label">Cantidad de Garajes</label>
                        <div class="col-6">
                            <input class="form-control" type="number" min="1" max="100" id="no_garajes" 
                            value="{{ $propiedad->no_garajes }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="tipo_garaje" class="col-4 col-form-label">Tipo</label>
                        <div class="col-8">
                            {!! Form::select('tipo_garaje', $tipo_garaje, null, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group row">
                        <label for="garaje_c" class="col-5 col-form-label">Cubierto(s)</label>
                        <div class="col-7">
                            <select id="garaje_c" class="form-select" name="garaje_c" required="required">
                                @if ($propiedad->garaje_c == 'Si')
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
        <h5 class="fw-bold my-3">Características conjunto cerrado o edificio</h5>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="vigilancia" class="col-6 col-form-label">Vigilancia</label>
                        <div class="col-6">
                            {!! Form::select('vigilancia', $vigilancia, $propiedad->tipo_vigilancia, ['class' => 'form-select', 'id' => 'no_garajes', 'required' => 'required']) !!}
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
        {{ Form::close() }}
    @endsection

    @section('final')

    @endsection
