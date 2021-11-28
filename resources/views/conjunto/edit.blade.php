@extends('layouts.plantilla')
@section('title', 'Consigna tu inmueble')
@section('more_head')
    <script src="{!! asset('js/condiciones_edit.js') !!}"></script>
@endsection

@section('content')
    <div class="card bg-default tarjeta shadow-lg animate__animated animate__fadeInDown" id="conjunto_tarjeta">
        <div class="card-body">
            <div class="row seccion">
                <div class="col-12">
                    <h4>Características conjunto cerrado o edificio</h4>
                </div>
            </div>
            {{ Form::open(['method' => 'post']) }}
            <div class="row seccion">
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="vigilancia" class="col-6 col-form-label">Vigilancia</label>
                        <div class="col-6">
                            {!! Form::select('vigilancia', $vigilancia, $propiedad->tipo_vigilancia, ['class' => 'form-select', 'id' => 'vigilancia', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="seguridad" class="col-6 col-form-label">Seguridad</label>
                        <div class="col-6">
                            {!! Form::select('seguridad', $seguridad, $propiedad->tipo_seguridad, ['class' => 'form-select', 'id' => 'seguridad', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="t_cuota" class="col-6 col-form-label">Tipo de cuota
                            <span class="sub">Administración P.H.<span>
                        </label>
                        <div class="col-6">
                            {!! Form::select('t_cuota', $cuota, $propiedad->tipo_cuota, ['class' => 'form-select', 'id' => 't_cuota', 'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="nombre_c_e" class="col-6 col-form-label">Nombre del conjunto o
                            edificio</label>
                        <div class="col-6 ">
                            <input id="nombre_c_e" name="nombre_c_e" type="text" class="form-control"
                                value="{{ $propiedad->nombre_c_e }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="adm_cp" class="col-6 col-form-label">Valor Administración
                            <span class="sub">Cuota plena<span>
                        </label>
                        <div class="col-6">
                            <div class="input-group">
                                <input id="adm_cp" name="adm_cp" type="number" min="0" class="form-control"
                                    value="{{ $propiedad->adm_cp }}" required>
                            </div>
                            <span id="adm_cp_pesos" class="form-text text-muted"></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4" id="descuento">
                    <div class="form-group row">
                        <label for="adm_cd" class="col-6 col-form-label">Valor Administración
                            <span class="sub">Cuota con descuento<span>
                        </label>
                        <div class="col-6">
                            <div class="input-group">
                                <input id="adm_cd" name="adm_cd" type="number" min="0" class="form-control"
                                    value="{{ $propiedad->adm_cd }}">
                            </div>
                            <span id="adm_cd_pesos" class="form-text text-muted"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row seccion">
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="pq_visitantes" class="border-end col-5 col-form-label">
                            Parqueadero de visitantes</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->pq_visitantes == 'Si')
                                <input type="checkbox" value="1" name="pq_visitantes" id="pq_visitantes" checked />
                            @else
                                <input type="checkbox" value="1" name="pq_visitantes" id="pq_visitantes" />
                            @endif
                            <label class="slider-v1" for="pq_visitantes"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="bicicletero" class="col-5 col-form-label">
                            Bicicletero</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->bicicletero == 'Si')
                                <input type="checkbox" value="1" name="bicicletero" id="bicicletero" checked />
                            @else
                                <input type="checkbox" value="1" name="bicicletero" id="bicicletero" />
                            @endif

                            <label class="slider-v1" for="bicicletero"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="s_social" class="col-5 col-form-label">
                            Salón social</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->s_social == 'Si')
                                <input type="checkbox" value="1" name="s_social" id="s_social" checked />
                            @else
                                <input type="checkbox" value="1" name="s_social" id="s_social" />
                            @endif
                            <label class="slider-v1" for="s_social"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="bbq" class="col-5 col-form-label">
                            BBQ</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->bbq == 'Si')
                                <input type="checkbox" value="1" name="bbq" id="bbq" checked />
                            @else
                                <input type="checkbox" value="1" name="bbq" id="bbq" />
                            @endif

                            <label class="slider-v1" for="bbq"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="s_juntas" class="col-5 col-form-label">
                            Sala de juntas</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->s_juntas == 'Si')
                                <input type="checkbox" value="1" name="s_juntas" id="s_juntas" checked />
                            @else
                                <input type="checkbox" value="1" name="s_juntas" id="s_juntas" />
                            @endif

                            <label class="slider-v1" for="s_juntas"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="p_infantil" class="col-5 col-form-label">
                            Parque infantil</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->p_infantil == 'Si')
                                <input type="checkbox" value="1" name="p_infantil" id="p_infantil" checked />
                            @else
                                <input type="checkbox" value="1" name="p_infantil" id="p_infantil" />
                            @endif

                            <label class="slider-v1" for="p_infantil"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="gimnasio" class="col-5 col-form-label">
                            Gimnasio</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->gimnasio == 'Si')
                                <input type="checkbox" value="1" name="gimnasio" id="gimnasio" checked />
                            @else
                                <input type="checkbox" value="1" name="gimnasio" id="gimnasio" />
                            @endif
                            <label class="slider-v1" for="gimnasio"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="turco" class="col-5 col-form-label">
                            Turco</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->turco == 'Si')
                                <input type="checkbox" value="1" name="turco" id="turco" checked />
                            @else
                                <input type="checkbox" value="1" name="turco" id="turco" />
                            @endif
                            <label class="slider-v1" for="turco"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="sauna" class="col-5 col-form-label">
                            Sauna</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->sauna == 'Si')
                                <input type="checkbox" value="1" name="sauna" id="sauna" checked />
                            @else
                                <input type="checkbox" value="1" name="sauna" id="sauna" />
                            @endif
                            <label class="slider-v1" for="sauna"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="c_squash" class="col-5 col-form-label">
                            Cancha de squash</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->c_squash == 'Si')
                                <input type="checkbox" value="1" name="c_squash" id="c_squash" checked />
                            @else
                                <input type="checkbox" value="1" name="c_squash" id="c_squash" />
                            @endif
                            <label class="slider-v1" for="c_squash"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="c_tenis" class="col-5 col-form-label">
                            Cancha de tenis</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->c_tenis == 'Si')
                                <input type="checkbox" value="1" name="c_tenis" id="c_tenis" checked />
                            @else
                                <input type="checkbox" value="1" name="c_tenis" id="c_tenis" />
                            @endif
                            <label class="slider-v1" for="c_tenis"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="c_multiple" class="col-5 col-form-label">
                            Cancha múltiple</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->c_multiple == 'Si')
                                <input type="checkbox" value="1" name="c_multiple" id="c_multiple" checked />
                            @else
                                <input type="checkbox" value="1" name="c_multiple" id="c_multiple" />
                            @endif
                            <label class="slider-v1" for="c_multiple"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="s_juegos" class="col-5 col-form-label">
                            Salón de juegos
                        </label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->s_juegos == 'Si')
                                <input type="checkbox" value="1" name="s_juegos" id="s_juegos" checked />
                            @else
                                <input type="checkbox" value="1" name="s_juegos" id="s_juegos" />
                            @endif
                            <label class="slider-v1" for="s_juegos"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="s_estudio" class="col-5 col-form-label">
                            Salón de estudio
                        </label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->s_estudio == 'Si')
                                <input type="checkbox" value="1" name="s_estudio" id="s_estudio" checked />
                            @else
                                <input type="checkbox" value="1" name="s_estudio" id="s_estudio" />
                            @endif

                            <label class="slider-v1" for="s_estudio"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group row">
                        <label for="lavanderia_c" class="col-5 col-form-label">
                            Lavandería comunal
                        </label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->lavanderia_c == 'Si')
                                <input type="checkbox" value="1" name="lavanderia_c" id="lavanderia_c" checked />
                            @else
                                <input type="checkbox" value="1" name="lavanderia_c" id="lavanderia_c" />
                            @endif
                            <label class="slider-v1" for="lavanderia_c"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="planta_e" class="col-5 col-form-label">
                            Planta eléctrica </label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->planta_e == 'Si')
                                <input type="checkbox" value="1" name="planta_e" id="planta_e" checked />
                            @else
                                <input type="checkbox" value="1" name="planta_e" id="planta_e" />
                            @endif
                            <label class="slider-v1" for="planta_e"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 border-end">
                    <div class="form-group row">
                        <label for="piscina" class="col-5 col-form-label">
                            Piscina</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            @if ($propiedad->piscina == 'Si')
                                <input type="checkbox" value="1" name="piscina" id="piscina" checked />
                            @else
                                <input type="checkbox" value="1" name="piscina" id="piscina" />
                            @endif
                            <label class="slider-v1" for="piscina"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-6 col-md-2 text-left">
                    <a href="{{ route('detalles.edit', $propiedad) }}" class="btn botones">Atrás</a>
                </div>
                <div class="d-none d-md-block col-md-8">
                </div>
                <div class="col-6 col-md-2 text-end">
                    <button type="submit" class="btn botones">Siguiente</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
