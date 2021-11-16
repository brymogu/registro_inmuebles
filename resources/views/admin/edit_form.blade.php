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
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="arrendado" class="col-5">¿Se encuentra arrendado actualmente?</label>
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
                        <label for="estrato_inm" class="col-5 col-form-label">Estrato</label>
                        <div class="col-7">
                            {!! Form::select('estrato_inm', $estratos, $propiedad->estrato, ['class' => 'form-select', 'id' => 'tipo_inm', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6 border-right">
                    <div class="form-group row">
                        <label for="departamento" class="col-5 col-form-label">Departamento</label>
                        <div class="col-7">
                            <input id="departamento" readonly name="departamento" type="text" class="form-control"
                                value="Bogotá D.C." required="required">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="ciudad" class="col-5 col-form-label">Ciudad</label>
                        <div class="col-7">
                            <input id="ciudad" readonly name="ciudad" type="text" value="Bogotá D.C." required="required"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
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
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="detalles">
                        <div class="col-5">
                            <label for="direccion_comp" class="col-form-label">Detalles</label>
                        </div>
                        <div class="col-7">
                            <input id="direccion_comp" name="direccion_comp" value="{{ $propiedad->direccion_comp }}"
                                type="text" class="form-control" placeholder="Torre 7 Apto. 302">
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
                <div class="col-12 col-md-6 border-right">
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
                        <label for="estado_inb" class="col-5 col-form-label">Estado del inmueble</label>
                        <div class="col-7">
                            {!! Form::select('estado_inb', $estado, $propiedad->estado, ['class' => 'form-select', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    @endsection

    @section('final')

    @endsection
