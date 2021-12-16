@extends('layouts.administrador')
@section('more_head')
    <script src="{!! asset('js/selects_edit.js') !!}"></script>

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
                            <input id="name" name="name" type="text" class="form-control" value="{{ $codiprop->name }}"
                                required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="text" class="col-5 col-form-label">Apellidos</label>
                        <div class="col-7">
                            <input id="text" name="lastname" type="text" class="form-control"
                                value="{{ $codiprop->lastname }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0 ">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="email" class="col-5 col-form-label">E-mail</label>
                        <div class="col-7">
                            <input id="email" name="email" type="email" value="{{ $codiprop->email }}"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="phone" class="col-5 col-form-label">Teléfono celular</label>
                        <div class="col-7">
                            <input id="phone" name="phone" type="tel" value="{{ $codiprop->phone }}"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0 ">
            <div class="row">
                <div class="col-12 col-md-6 border-end">
                    <div class="form-group row">
                        <label for="id" class="col-5 col-form-label">Tipo DI</label>
                        <div class="col-7">
                            @isset($codiprop->tipo_doc)
                                {!! Form::select('id', $tipos_documento, $codiprop->tipo_doc, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($codiprop->tipo_doc)
                                {!! Form::select('id', $tipos_documento, $codiprop->tipo_doc, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="idnumber" class="col-5 col-form-label">Número DI</label>
                        <div class="col-7">
                            <input id="idnumber" name="idnumber" type="number" class="form-control"
                                value="{{ $codiprop->doc_number }}" required="required" min="800">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="fw-bold my-3">Negocio</p>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="conc_precio" class="col-5 col-form-label">Concepto de precio</label>
                        <div class="col-7">
                            <input id="conc_precio" name="conc_precio" type="text" class="form-control"
                                value="{{ $negocio_unico->conc_precio }}">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label class="col-5 col-form-label" for="chip">CHIP</label>
                        <div class="col-7">
                            <input id="chip" name="chip" type="text" class="form-control" value="{{ $propiedad->chip }}"
                                required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="matricula" class="col-5 col-form-label">Matricula</label>
                        <div class="col-7">
                            <input id="matricula" name="matricula" type="text" class="form-control"
                                value="{{ $propiedad->matricula }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="precio_contrato" class="col-5 col-form-label">Precio contrato</label>
                        <div class="col-7">
                            <input id="precio_contrato" name="precio_contrato" type="text" class="form-control"
                                value="{{ $negocio_unico->precio_contrato }}">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label class="col-5 col-form-label" for="conc_juridico">Concepto jurídico</label>
                        <div class="col-7">
                            @isset($negocio_unico->conc_juridico)
                                {!! Form::select('conc_juridico', $conc_juridico, $negocio_unico->conc_juridico, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($negocio_unico->conc_juridico)
                                {!! Form::select('conc_juridico', $conc_juridico, $negocio_unico->conc_juridico, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="obs_conc_juridico" class="col-5 col-form-label">Observación concepto jurídico</label>
                        <div class="col-7">
                            <input id="obs_conc_juridico" name="obs_conc_juridico" type="text" class="form-control"
                                value="{{ $negocio_unico->obs_conc_juridico }}" required>
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
                            @isset($negocio_unico->tipo_negocio)
                                {!! Form::select('tipo', $negocio_tipo, $negocio_unico->tipo_negocio, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($negocio_unico->tipo_negocio)
                                {!! Form::select('tipo', $negocio_tipo, $negocio_unico->tipo_negocio, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row" id="valorgrupo">
                        <label for="valor" class="col-5 col-form-label">Valor tentativo</label>
                        <div class="col-7">
                            <input id="valor" readonly name="valor" type="number" value="{{ $negocio_unico->valor }}"
                                class="form-control" min="99000" required="required" >
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
        <p class="fw-bold my-3">Aspectos para el negocio</p>
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
                            <input id="pqsolicita" name="pqsolicita" type="text" class="form-control"
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
                        <label for="asesor" class="col-5 col-form-label">Nombre del Asesor</label>
                        <div class="col-7">
                            <input id="asesor" name="asesor" type="text" class="form-control "
                                value="{{ $negocio_unico->asesor }}">
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
                            @isset($propiedad->tipo_inmueble)
                                {!! Form::select('tipo_inm', $inmueble, $propiedad->tipo_inmueble, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->tipo_inmueble)
                                {!! Form::select('tipo_inm', $inmueble, $propiedad->tipo_inmueble, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="estado_inb" class="col-5 col-form-label">Estado del inmueble</label>
                        <div class="col-7">
                            @isset($propiedad->estado)
                                {!! Form::select('estado_inb', $estado, $propiedad->estado, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->estado)
                                {!! Form::select('estado_inb', $estado, $propiedad->estado, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6 border-end">
                    <div class="form-group row">
                        <label for="tiempo_inm" class="col-5 col-form-label">Años de
                            contruido</label>
                        <div class="col-7">
                            <input id="tiempo_inm" name="tiempo_inm" type="number" value="{{ $propiedad->tiempo_inm }}"
                                min="0" class="form-control" max="80">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border-end">
                    <div class="form-group row" id="SecRemodelado">
                        <label for="remodelado" class="col-5 col-form-label">Remodelado hace menos de 5
                            años </label>
                        <div class="col-7">
                            @isset($propiedad->remodelado)
                                {!! Form::select('remodelado', $remodelado, $propiedad->remodelado, ['class' => 'form-select', 'id' => 'remodelado']) !!}
                            @endisset
                            @empty($propiedad->remodelado)
                                {!! Form::select('remodelado', $remodelado, $propiedad->remodelado, ['class' => 'form-select vacio', 'id' => 'remodelado']) !!}
                            @endempty
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
                <div class="col-12 col-md-6 border-end">
                    <div class="form-group row">
                        <label for="piso" class="col-5 col-form-label">Piso en el que está el
                            inmueble</label>
                        <div class="col-7">
                            <input id="piso" name="piso" type="number" min="1" max="30" value="{{ $propiedad->piso }}"
                                class="form-control">
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
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group row">
                        <label for="estrato_inm" class="col-5 col-form-label">Estrato</label>
                        <div class="col-7">
                            @isset($propiedad->estrato)
                                {!! Form::select('estrato_inm', $estratos, $propiedad->estrato, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->estrato)
                                {!! Form::select('estrato_inm', $estratos, $propiedad->estrato, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    
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
                            @isset($propiedad->ciudad)
                                {!! Form::select('ciudad', $ciudad, $propiedad->ciudad, ['class' => 'form-select', 'id' => 'ciudad']) !!}
                            @endisset
                            @empty($propiedad->ciudad)
                                {!! Form::select('ciudad', $ciudad,$propiedad->ciudad, ['class' => 'form-select vacio', 'id' => 'ciudad']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 border-end">
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
                            <label for="latitud" class="col-form-label">Latitud</label>
                        </div>
                        <div class="col-7">
                            <input id="latitud" name="latitud" type="text" class="form-control"
                                value="{{ $propiedad->latitud }}">
                        </div>
                    </div>
                </div>
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
            </div>
        </div>
        <h5 class="fw-bold my-3">Detalles del inmueble</h5>
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
                                    value="{{ $propiedad->a_terreno }}" class="form-control" required>
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
                        <label for="niveles" class="col-5 col-form-label">Nivel(es)</label>
                        <div class="col-7">
                            @isset($propiedad->nivel)
                                {!! Form::select('niveles', $niveles, $propiedad->nivel, ['class' => 'form-select', 'id' => 'niveles', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->nivel)
                                {!! Form::select('niveles', $niveles, $propiedad->nivel, ['class' => 'form-select vacio', 'id' => 'niveles', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ">
                    <div class="form-group row mb-3">
                        <label for="n_hab" class="col-5 col-form-label">Habitación(es)</label>
                        <div class="col-7">
                            <input class="form-control" name="n_hab" type="number" min="1" max="100" id="n_hab"
                                value="{{ $propiedad->n_hab }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row mb-3">
                        <label for="no_banos" class="col-5 col-form-label">Baño(s)</label>
                        <div class="col-7">
                            <input class="form-control" type="number" name="n_banos" min="1" max="100" id="n_banos"
                                value="{{ $propiedad->n_banos }}" required>
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
                            @isset($propiedad->mat_habitacion)
                                {!! Form::select('material_hab', $mat_habitaciones, $propiedad->mat_habitacion, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->mat_habitacion)
                                {!! Form::select('material_hab', $mat_habitaciones, $propiedad->mat_habitacion, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 ">
                    <div class="form-group row">
                        <label for="mp_cocina" class="col-4 col-form-label">Cocina</label>
                        <div class="col-8">
                            @isset($propiedad->mat_piso_cocina)
                                {!! Form::select('mp_cocina', $mat_cocina, $propiedad->mat_piso_cocina, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->mat_piso_cocina)
                                {!! Form::select('mp_cocina', $mat_cocina, $propiedad->mat_piso_cocina, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 ">
                    <div class="form-group row">
                        <label for="mat_piso_bano" class="col-4 col-form-label">Baño(s)</label>
                        <div class="col-8">
                            @isset($propiedad->mat_piso_bano)
                                {!! Form::select('mat_piso_bano', $mat_bano, $propiedad->mat_piso_bano, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->mat_piso_bano)
                                {!! Form::select('mat_piso_bano', $mat_bano, $propiedad->mat_piso_bano, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 ">
                    <div class="form-group row">
                        <label for="mat_piso_zona_social" class="col-4 col-form-label">Zona
                            social</label>
                        <div class="col-8">
                            @isset($propiedad->mat_piso_zsocial)
                                {!! Form::select('mat_piso_zona_social', $mat_zsocial, $propiedad->mat_piso_zsocial, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->mat_piso_zsocial)
                                {!! Form::select('mat_piso_zona_social', $mat_zsocial, $propiedad->mat_piso_zsocial, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="fw-bold my-3">Características específicas inmueble:</p>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="mb_cocina" class="col-5 col-form-label">Mobiliario cocina</label>
                        <div class="col-7">
                            @isset($propiedad->mb_cocina)
                                {!! Form::select('mb_cocina', $mb_cocina, $propiedad->mb_cocina, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->mb_cocina)
                                {!! Form::select('mb_cocina', $mb_cocina, $propiedad->mb_cocina, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ">
                    <div class="form-group row">
                        <label for="estufa" class="col-5 col-form-label">Estufa</label>
                        <div class="col-7">
                            @isset($propiedad->tipo_estufa)
                                {!! Form::select('estufa', $estufa, $propiedad->tipo_estufa, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->mb_cocina)
                                {!! Form::select('estufa', $estufa, $propiedad->tipo_estufa, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ">
                    <div class="form-group row">
                        <label for="horno" class="col-5 col-form-label">Horno</label>
                        <div class="col-7">
                            @isset($propiedad->tipo_horno)
                                {!! Form::select('horno', $horno, $propiedad->tipo_horno, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->tipo_horno)
                                {!! Form::select('horno', $horno, $propiedad->tipo_horno, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="tp_cocina" class="col-5 col-form-label">Tipo de cocina</label>
                        <div class="col-7">
                            @isset($propiedad->tipo_cocina)
                                {!! Form::select('tp_cocina', $tipo_cocina, $propiedad->tipo_cocina, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->tipo_cocina)
                                {!! Form::select('tp_cocina', $tipo_cocina, $propiedad->tipo_cocina, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ">
                    <div class="form-group row">
                        <label for="calentador" class="col-5 col-form-label">Calentador</label>
                        <div class="col-7">
                            @isset($propiedad->tipo_calentador)
                                {!! Form::select('calentador', $calentador, $propiedad->tipo_calentador, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->tipo_calentador)
                                {!! Form::select('calentador', $calentador, $propiedad->tipo_calentador, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ">
                    <div class="form-group row">
                        <label for="vista" class="col-5 col-form-label">Vista</label>
                        <div class="col-7">
                            @isset($propiedad->tipo_vista)
                                {!! Form::select('vista', $vista, $propiedad->tipo_vista, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->tipo_vista)
                                {!! Form::select('vista', $vista, $propiedad->tipo_vista, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="zona_social" class="col-5 col-form-label">Zona social</label>
                        <div class="col-7">
                            @isset($propiedad->zona_social)
                                {!! Form::select('zona_social', $zonas, $propiedad->zona_social, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->zona_social)
                                {!! Form::select('zona_social', $zonas, $propiedad->zona_social, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ">
                    <div class="form-group row">
                        <label for="material_fachada" class="col-5 col-form-label">Material
                            fachada</label>
                        <div class="col-7">
                            @isset($propiedad->material_fachada)
                                {!! Form::select('material_fachada', $mat_fachada, $propiedad->material_fachada, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->material_fachada)
                                {!! Form::select('material_fachada', $mat_fachada, $propiedad->material_fachada, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-block col-md-4"></div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4 ">
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
                <div class="col-12 col-md-4 ">
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
                <div class="col-12 col-md-4 ">
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
                <div class="col-12 col-md-4 ">
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
                <div class="col-12 col-md-4 ">
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
                <div class="col-12 col-md-4 ">
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
                <div class="col-12 col-md-4 ">
                    <div class="form-group row">
                        <label for="star" class="col-5 col-form-label">Star de entre<br>tenimiento</label>
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
                <div class="col-12 col-md-4 ">
                    <div class="form-group row">
                        <label for="entrega_cortinas" class="col-5 col-form-label">Entrega con cortinas</label>
                        <div class="col-7">
                            <select id="entrega_cortinas" class="form-select" name="entrega_cortinas"
                                required="required">
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
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="calefaccion_p" class="col-5 col-form-label">Calefacción privada</label>
                        <div class="col-7">
                            <select id="calefaccion_p" class="form-select" name="calefaccion_p" required="required">
                                @if ($propiedad->calefaccion_privada == 'Si')
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
                                @if ($propiedad->piscina_privada == 'Si')
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
                <div class="col-12 col-md-4 ">
                    <div class="form-group row">
                        <label for="sauna_p" class="col-5 col-form-label">Sauna privado</label>
                        <div class="col-7">
                            <select id="sauna_p" class="form-select" name="sauna_p" required="required">
                                @if ($propiedad->sauna_privada == 'Si')
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
                <div class="col-12 col-md-4 ">
                    <div class="form-group row">
                        <label for="turco_p" class="col-5 col-form-label">Turco privado</label>
                        <div class="col-7">
                            <select id="turco_p" class="form-select" name="turco_p" required="required">
                                @if ($propiedad->turco_privado == 'Si')
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
                                @if ($propiedad->jacuzzi_privado == 'Si')
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
                <div class="col-12 col-md-4 ">
                    <div class="form-group row">
                        <label for="tina_p" class="col-5 col-form-label">Tina privada</label>
                        <div class="col-7">
                            <select id="tina_p" class="form-select" name="tina_p" required="required">
                                @if ($propiedad->tina_privada == 'Si')
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
                <div class="col-12 col-md-4 ">
                    <div class="form-group row">
                        <label for="aire_p" class="col-5 col-form-label">Aire acondicionado privado</label>
                        <div class="col-7">
                            <select id="aire_p" class="form-select" name="aire_p" required="required">
                                @if ($propiedad->aire_privado == 'Si')
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
                <div class="col-12 col-md-4 ">
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
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="jardin_interior" class="col-5 col-form-label">Jardín Interior</label>
                        <div class="col-7">
                            <select id="jardin_interior" class="form-select" name="jardin_interior" required="required">
                                @if ($propiedad->jardin_interior == 'Si')
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
                <div class="col-12 col-md-4" id="area_balcon_secc">
                    <div class="form-group row">
                        <label for="area_balcon" class="col-5 col-form-label">Área del balcón</label>
                        <div class="col-7">
                            <input id="area_balcon" name="area_balcon" type="number" step="1" min="1"
                                class="form-control" value="{{ $propiedad->area_balcon }}">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4" id="area_terraza_secc">
                    <div class="form-group row">
                        <label for="area_terraza" class="col-5 col-form-label">Área de la terraza</label>
                        <div class="col-7">
                            <input id="area_terraza" name="area_terraza" type="number" step="1" min="1"
                                class="form-control" value="{{ $propiedad->area_terraza }}">
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
                        <label for="garaje" class="col-5 col-form-label">Cuenta con garaje(s)</label>
                        <div class="col-7">
                            <select id="garaje" class="form-select" name="garaje" required="required">
                                @if ($propiedad->tiene_garajes == 'Si')
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
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="gje_comunal" class="col-5 col-form-label">Garaje(s) comunal(es)</label>
                        <div class="col-7">
                            <select id="gje_comunal" class="form-select" name="gje_comunal" required="required">
                                @if ($propiedad->gje_comunal == 'Si')
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
                        <label for="no_garajes" class="col-5 col-form-label">Cantidad</label>
                        <div class="col-7">
                            <input class="form-control" name="no_garajes" type="number" min="1" max="100" id="no_garajes"
                                value="{{ $propiedad->no_garajes }}">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ">
                    <div class="form-group row">
                        <label for="tipo_garaje" class="col-5 col-form-label">Tipo</label>
                        <div class="col-7">
                            @isset($propiedad->tipo_garajes)
                                {!! Form::select('tipo_garaje', $tipo_garaje, $propiedad->tipo_garajes, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->tipo_garajes)
                                {!! Form::select('tipo_garaje', $tipo_garaje, $propiedad->tipo_garajes, ['class' => 'form-select vacio']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ">
                    <div class="form-group row">
                        <label for="gje_cubierto" class="col-5 col-form-label">Cubierto(s)</label>
                        <div class="col-7">
                            <select id="gje_cubierto" class="form-select" name="gje_cubierto" required="required">
                                @if ($propiedad->gje_cubierto == 'Si')
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
                        <label for="vigilancia" class="col-5 col-form-label">Vigilancia</label>
                        <div class="col-7">
                            @isset($propiedad->tipo_vigilancia)
                                {!! Form::select('vigilancia', $vigilancia, $propiedad->tipo_vigilancia, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->tipo_vigilancia)
                                {!! Form::select('vigilancia', $vigilancia, $propiedad->tipo_vigilancia, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="seguridad" class="col-5 col-form-label">Seguridad</label>
                        <div class="col-7">
                            @isset($propiedad->tipo_seguridad)
                                {!! Form::select('seguridad', $seguridad, $propiedad->tipo_seguridad, ['class' => 'form-select', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->tipo_seguridad)
                                {!! Form::select('seguridad', $seguridad, $propiedad->tipo_seguridad, ['class' => 'form-select vacio', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="t_cuota" class="col-5 col-form-label">Tipo de cuota
                            <span class="sub">Administración P.H.<span>
                        </label>
                        <div class="col-7">
                            @isset($propiedad->tipo_cuota)
                                {!! Form::select('t_cuota', $cuota, $propiedad->tipo_cuota, ['class' => 'form-select', 'id' => 't_cuota', 'required' => 'required']) !!}
                            @endisset
                            @empty($propiedad->tipo_cuota)
                                {!! Form::select('t_cuota', $cuota, $propiedad->tipo_cuota, ['class' => 'form-select vacio', 'id' => 't_cuota', 'required' => 'required']) !!}
                            @endempty
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="nombre_c_e" class="col-5 col-form-label">Nombre del conjunto o
                            edificio</label>
                        <div class="col-7">
                            <input id="nombre_c_e" name="nombre_c_e" type="text" class="form-control"
                                value="{{ $propiedad->nombre_c_e }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="adm_cp" class="col-5 col-form-label">Valor Administración
                            <span class="sub">Cuota plena<span>
                        </label>
                        <div class="col-7">
                            <div class="input-group">
                                <input id="adm_cp" name="adm_cp" type="number" min="0" class="form-control"
                                    value="{{ $propiedad->adm_cp }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4" id="descuento">
                    <div class="form-group row">
                        <label for="adm_cd" class="col-5 col-form-label">Valor Administración
                            <span class="sub">Cuota con descuento<span>
                        </label>
                        <div class="col-7">
                            <div class="input-group">
                                <input id="adm_cd" name="adm_cd" type="number" min="0" class="form-control"
                                    value="{{ $propiedad->adm_cd }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3 shadow-sm border-0">
            <div class="row">
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="pq_visitantes" class="col-5 col-form-label">Parqueadero de visitantes</label>
                        <div class="col-7">
                            <select id="pq_visitantes" class="form-select" name="pq_visitantes" required="required">
                                @if ($propiedad->pq_visitantes == 'Si')
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
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="bicicletero" class="col-5 col-form-label">Bicicletero</label>
                        <div class="col-7">
                            <select id="bicicletero" class="form-select" name="bicicletero" required="required">
                                @if ($propiedad->bicicletero == 'Si')
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
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="s_social" class="col-5 col-form-label">Salón social</label>
                        <div class="col-7">
                            <select id="s_social" class="form-select" name="s_social" required="required">
                                @if ($propiedad->s_social == 'Si')
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
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="bbq" class="col-5 col-form-label">BBQ</label>
                        <div class="col-7">
                            <select id="bbq" class="form-select" name="bbq" required="required">
                                @if ($propiedad->bbq == 'Si')
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
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="s_juntas" class="col-5 col-form-label">Sala de juntas</label>
                        <div class="col-7">
                            <select id="s_juntas" class="form-select" name="s_juntas" required="required">
                                @if ($propiedad->s_juntas == 'Si')
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
                <div class="col-12 col-md-4" id="descuento">
                    <div class="form-group row">
                        <label for="p_infantil" class="col-5 col-form-label">Parque infantil</label>
                        <div class="col-7">
                            <select id="p_infantil" class="form-select" name="p_infantil" required="required">
                                @if ($propiedad->p_infantil == 'Si')
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
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="gimnasio" class="col-5 col-form-label">Gimnasio</label>
                        <div class="col-7">
                            <select id="gimnasio" class="form-select" name="gimnasio" required="required">
                                @if ($propiedad->gimnasio == 'Si')
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
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="turco" class="col-5 col-form-label">Turco</label>
                        <div class="col-7">
                            <select id="turco" class="form-select" name="turco" required="required">
                                @if ($propiedad->turco == 'Si')
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
                <div class="col-12 col-md-4" id="descuento">
                    <div class="form-group row">
                        <label for="sauna" class="col-5 col-form-label">Sauna</label>
                        <div class="col-7">
                            <select id="sauna" class="form-select" name="sauna" required="required">
                                @if ($propiedad->sauna == 'Si')
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
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="c_squash" class="col-5 col-form-label">Cancha de squash</label>
                        <div class="col-7">
                            <select id="c_squash" class="form-select" name="c_squash" required="required">
                                @if ($propiedad->c_squash == 'Si')
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
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="c_tenis" class="col-5 col-form-label">Cancha de tenis</label>
                        <div class="col-7">
                            <select id="c_tenis" class="form-select" name="c_tenis" required="required">
                                @if ($propiedad->c_tenis == 'Si')
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
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="c_multiple" class="col-5 col-form-label">Cancha múltiple</label>
                        <div class="col-7">
                            <select id="c_multiple" class="form-select" name="c_multiple" required="required">
                                @if ($propiedad->c_multiple == 'Si')
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
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="s_juegos" class="col-5 col-form-label">Salón de juegos</label>
                        <div class="col-7">
                            <select id="s_juegos" class="form-select" name="s_juegos" required="required">
                                @if ($propiedad->s_juegos == 'Si')
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
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="s_estudio" class="col-5 col-form-label">Salón de estudio</label>
                        <div class="col-7">
                            <select id="s_estudio" class="form-select" name="s_estudio" required="required">
                                @if ($propiedad->s_estudio == 'Si')
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
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="lavanderia_c" class="col-5 col-form-label">Lavandería comunal</label>
                        <div class="col-7">
                            <select id="lavanderia_c" class="form-select" name="lavanderia_c" required="required">
                                @if ($propiedad->lavanderia_c == 'Si')
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
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="planta_e" class="col-5 col-form-label">Planta eléctrica</label>
                        <div class="col-7">
                            <select id="planta_e" class="form-select" name="planta_e" required="required">
                                @if ($propiedad->planta_e == 'Si')
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
                <div class="col-12 col-md-4 border-right">
                    <div class="form-group row">
                        <label for="piscina" class="col-5 col-form-label">Piscina</label>
                        <div class="col-7">
                            <select id="piscina" class="form-select" name="piscina" required="required">
                                @if ($propiedad->piscina == 'Si')
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
        <div class="row  my-3">
            <div class="col-6 col-md-2 text-left">
                <a href="{{ route('administrador.edit') }}" class="btn botones">Atrás</a>
            </div>
            <div class="d-none d-md-block col-md-8">
            </div>
            <div class="col-6 col-md-2 text-end">
                <button type="submit" class="btn botones">Enviar</button>
            </div>
        </div>
        {{ Form::close() }}
    @endsection

    @section('final')
    @endsection
