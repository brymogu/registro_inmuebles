@extends('layouts.formatos')
@section('more_head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
@endsection

@section('content')
    @foreach ($datos as $datos)

        @section('title', 'Epica Inmobiliaria - ' . $datos->doc_number)
        <!-- Editables-->
        {{ Form::open(['method' => 'post']) }}
        <div class="row mb-5 d-print-none">
            <div class="col-12 seccion">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10 cabeza">
                        <p class="fw-bold">
                            <i class="far fa-edit"></i>
                            Editables
                        </p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="row mt-1 interior">
                    <div class="col-4">
                        <input id="conc_precio_edit" name="conc_precio_edit" type="number" class="form-control"
                            value="{{ $datos->conc_precio }}" required>
                        <small class="fw-light fst-italic">Concepto de precio</small>
                    </div>
                    <div class="col-4">
                        <input id="chip_edit" name="chip_edit" type="text" class="form-control"
                            value="{{ $datos->chip }}" required>
                        <small class="fw-light fst-italic">Chip</small>
                    </div>
                    <div class="col-4">
                        <input id="matricula_edit" name="matricula_edit" type="text" class="form-control"
                            value="{{ $datos->matricula }}" required>
                        <small class="fw-light fst-italic">N° matricula</small>
                    </div>
                </div>
                <div class="row mt-1 interior">
                    <div class="col-4">
                        <input id="barrio_catastral_edit" name="barrio_catastral_edit" type="text" class="form-control"
                            value="{{ $datos->barrio_catastral }}" required>
                        <small class="fw-light fst-italic">Barrio catastral</small>
                    </div>
                    <div class="col-4">
                        <input id="upz_edit" name="upz_edit" type="text" class="form-control" value="{{ $datos->upz }}" required>
                        <small class="fw-light fst-italic">UPZ</small>
                    </div>
                    <div class="col-4">
                        <input id="localidad_edit" name="localidad_edit" type="text" class="form-control"
                            value="{{ $datos->localidad }}" required>
                        <small class="fw-light fst-italic">Localidad</small>
                    </div>
                </div>
                <div class="row mt-1 interior">
                    <div class="col-4">
                        {!! Form::select('conc_juridico_edit', $conc_juridico, $datos->id_concjuridico, ['class' => 'form-select', 'required' => 'required', 'id' => 'conc_juridico_edit']) !!}
                        <small class="fw-light fst-italic">Concepto jurídico</small>
                    </div>
                    <div class="col-4">
                        <input id="obs_conc_juridico_edit" name="obs_conc_juridico_edit" type="text" class="form-control"
                            value="{{ $datos->obs_conc_juridico }}" required>
                        <small class="fw-light fst-italic">Obs. concepto jurídico</small>
                    </div>
                    <div class="col-4 text-center pt-1">

                        <button type="submit" class="btn shadow-sm">Guardar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10 pie">
                        <p></p>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
        <!-- Fin editables-->
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 mb-3 text-center rayita_down rounded-bottom">
                <h6>Concepto de precio y viabilidad jurídica</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="row lateral d-flex align-content-around flex-wrap rounded-3 fs-6 text-left">
                    <div class="col-12">
                        @if ($datos->tipo_inmueble == 'Casa uso vivienda')
                            <i class="fas fa-home"></i>
                        @else
                            <i class="fas fa-building"></i>
                        @endif
                        <small class="fw-bold">{{ $datos->tipo_inmueble }}</small><br>
                        <small class="fw-light fst-italic">Tipo de inmueble</small>
                    </div>
                    <div class="col-12">
                        @if ($datos->tipo_negocio == 'Arriendo')
                            <i class="fas fa-business-time"></i>
                        @else
                            <i class="fas fa-file-contract"></i>
                        @endif
                        <small class="fw-bold">{{ $datos->tipo_negocio }}</small><br>
                        <small class="fw-light fst-italic">Tipo de negocio</small>
                    </div>
                    <div class="col-12">
                        <i class="fas fa-map-marked-alt"></i>
                        <small class="fw-bold" id="metrocuadrado">$
                            {{ number_format($datos->conc_precio / $datos->a_construida, 0, ',', '.') }}</small><br>
                        <small class="fw-light fst-italic">Valor por m<sup>2</sup></small>
                    </div>
                </div>
            </div>
            <div class="col-8 pe-0">
                <div id="map" class="rounded-start">
                </div>
            </div>
        </div>
        <div class="row my-3 d-flex justify-content-around">
            <div class="interior rayita col-4">
                @if ($datos->conc_juridico == 'Viable')
                    <i class="far fa-check-circle"></i>
                @elseif($datos->conc_juridico == 'No viable')
                    <i class="far fa-times-circle"></i>
                @else
                    <i class="fas fa-minus-circle"></i>
                @endif
                <small class="fw-bold" id="concepto_juridico">{{ $datos->conc_juridico }}</small><br>
                <small class="fw-light fst-italic">Concepto jurídico<sup>*</sup></small>
            </div>
            <div class="interior rayita col-4">
                <i class="fas fa-handshake"></i>
                <small class="fw-bold" id="concepto_precio">$
                    {{ number_format($datos->conc_precio, 0, ',', '.') }}
                </small><br>
                <small class="fw-light fst-italic">Valor total calculado</small>
            </div>
        </div>
        <div class="row ficha shadow-sm rounded mb-2 px-1">
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <small class="mt-2 fw-normal">Ficha técnica:</small>
                    </div>
                    <div class="col-9">
                    </div>
                </div>
                <div class="row my-1">
                    <div class="col-12 seccion">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10 cabeza">
                                <p class="fw-bold">
                                    @if ($datos->tipo_inmueble == 'Casa uso vivienda')
                                        <i class="fas fa-home"></i>
                                    @else
                                        <i class="far fa-building"></i>
                                    @endif
                                    Datos del inmueble
                                </p>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <div class="row mt-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->direccion }}</small><br>
                                <small class="fw-light fst-italic">Dirección</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->matricula }}</small><br>
                                <small class="fw-light fst-italic">N° matricula</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->chip }}</small><br>
                                <small class="fw-light fst-italic">Chip</small>
                            </div>
                        </div>
                        <div class="row my-1 interior">
                            <div class="col-4"><small class="fw-bold">{{ $datos->estado }}</small><br>
                                <small class="fw-light fst-italic">Estado del inmueble</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->horizontal }}</small><br>
                                <small class="fw-light fst-italic">En propiedad horizontal</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->estrato }}</small><br>
                                <small class="fw-light fst-italic">Estrato</small>
                            </div>
                        </div>
                        <div class="row my-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->ciudad }}</small><br>
                                <small class="fw-light fst-italic">Ciudad</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->barrio_catastral }}</small><br>
                                <small class="fw-light fst-italic">Barrio catastral</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->upz }}</small><br>
                                <small class="fw-light fst-italic">UPZ</small>
                            </div>
                        </div>

                        <div class="row my-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->nivel }}</small><br>
                                <small class="fw-light fst-italic">N° de niveles</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->n_hab }}</small><br>
                                <small class="fw-light fst-italic">N° de habitaciones</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->n_banos }}</small><br>
                                <small class="fw-light fst-italic">N° de baños</small>
                            </div>
                        </div>

                        @if ($datos->tiene_garajes == 'Si')
                            <div class="row my-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->no_garajes }}</small><br>
                                    <small class="fw-light fst-italic">N° de garajes</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->tipo_garaje }}</small><br>
                                    <small class="fw-light fst-italic">Tipo de garaje(s)</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->gje_cubierto }}</small><br>
                                    <small class="fw-light fst-italic">garaje(s) cubierto(s)</small>
                                </div>
                            </div>
                        @endif
                        <div class="row my-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->a_construida }}</small><br>
                                <small class="fw-light fst-italic">Área construida</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->a_privada }}</small><br>
                                <small class="fw-light fst-italic">Área privada</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">
                                    @if ($datos->tipo_inmueble == 'Casa uso vivienda')
                                        {{ $datos->a_terreno }}
                                    @else
                                        N/A
                                    @endif
                                </small>
                                <br>
                                <small class="fw-light fst-italic">Área del terreno</small>
                            </div>
                        </div>
                        @if ($datos->tipo_inmueble == 'Apartamento')
                            <div class="row my-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->piso }}</small><br>
                                    <small class="fw-light fst-italic">Piso del apartamento</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->ascensor }}</small><br>
                                    <small class="fw-light fst-italic">Ascensor</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">
                                        @if ($datos->ascensor == 'Si')
                                            {{ $datos->n_ascensores }}
                                        @else
                                            N/A
                                        @endif
                                    </small><br>
                                    <small class="fw-light fst-italic">N° Ascensores</small>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10 pie">
                                <p></p>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12 interior rayita">
                        <small><sup>*</sup>{{ $datos->obs_conc_juridico }}</small><br />
                        <small>
                            <b>Importante: </b>Este concepto se ha basado en la revisión del certificado aportado, no es un
                            estudio
                            de títulos.
                        </small>
                    </div>
                </div>
                <div class="pagebreak"> </div>
                <div class="separador d-none d-print-block"></div>
                <div class="row my-3">
                    <div class="col-12 seccion">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10 cabeza">
                                <p class="fw-bold">
                                    <i class="fas fa-bath"></i>
                                    Descripción baño
                                </p>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <div class="row mt-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->mat_piso_bano }}</small><br>
                                <small class="fw-light fst-italic">Material piso baño </small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->b_social }}</small><br>
                                <small class="fw-light fst-italic">Baño social</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->b_servicio }}</small><br>
                                <small class="fw-light fst-italic">Baño de servicio</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10 pie">
                                <p></p>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 seccion">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10 cabeza">
                                <p class="fw-bold">
                                    <i class="fas fa-utensils"></i>
                                    Descripción cocina
                                </p>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <div class="row mt-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->tipo_cocina }}</small><br>
                                <small class="fw-light fst-italic">Tipo cocina</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->mb_cocina }}</small><br>
                                <small class="fw-light fst-italic">Mobiliario cocina</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->mat_piso_cocina }}</small><br>
                                <small class="fw-light fst-italic">Material piso cocina</small>
                            </div>
                        </div>
                        <div class="row my-1 interior">
                            <div class="col-4"><small
                                    class="fw-bold">{{ $datos->tipo_estufa }}</small><br>
                                <small class="fw-light fst-italic">Estufa</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->tipo_horno }}</small><br>
                                <small class="fw-light fst-italic">Horno</small>
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10 pie">
                                <p></p>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12 seccion">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10 cabeza">
                                <p class="fw-bold">
                                    <i class="fas fa-clipboard-list"></i>
                                    Descripción complementaria del inmueble
                                </p>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <div class="row mt-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->tipo_vista }}</small><br>
                                <small class="fw-light fst-italic">Vista </small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->zona_social }}</small><br>
                                <small class="fw-light fst-italic">Zona social</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->tipo_calentador }}</small><br>
                                <small class="fw-light fst-italic">Calentador</small>
                            </div>
                        </div>
                        <div class="row mt-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->mat_habitacion }}</small><br>
                                <small class="fw-light fst-italic">Material piso habitacion(es)</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->mat_piso_zsocial }}</small><br>
                                <small class="fw-light fst-italic">Material piso zona social</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->material_fachada }}</small><br>
                                <small class="fw-light fst-italic">Material fachada</small>
                            </div>
                        </div>
                        <div class="row mt-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->balcon }}</small><br>
                                <small class="fw-light fst-italic">Balcón</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->terraza }}</small><br>
                                <small class="fw-light fst-italic">Terraza</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->chimenea }}</small><br>
                                <small class="fw-light fst-italic">Chimenea</small>
                            </div>
                        </div>
                        <div class="row mt-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->estudio }}</small><br>
                                <small class="fw-light fst-italic">Estudio</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->deposito }}</small><br>
                                <small class="fw-light fst-italic">Déposito</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->hab_servicio }}</small><br>
                                <small class="fw-light fst-italic">Habitación de servicio</small>
                            </div>
                        </div>
                        <div class="row mt-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->star }}</small><br>
                                <small class="fw-light fst-italic">Star de entretenimiento</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->zona_lavanderia }}</small><br>
                                <small class="fw-light fst-italic">Zona de lavandería</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->entrega_cortinas }}</small><br>
                                <small class="fw-light fst-italic">Entrega cortinas</small>
                            </div>
                        </div>
                        <div class="row mt-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->calefaccion_privada }}</small><br>
                                <small class="fw-light fst-italic">Calefacción privada</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->piscina_privada }}</small><br>
                                <small class="fw-light fst-italic">Piscina privada</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->sauna_privada }}</small><br>
                                <small class="fw-light fst-italic">Sauna privado</small>
                            </div>
                        </div>
                        <div class="row mt-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->calefaccion_privada }}</small><br>
                                <small class="fw-light fst-italic">Calefacción privada</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->piscina_privada }}</small><br>
                                <small class="fw-light fst-italic">Piscina privada</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->sauna_privada }}</small><br>
                                <small class="fw-light fst-italic">Sauna privado</small>
                            </div>
                        </div>
                        <div class="row mt-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->turco_privado }}</small><br>
                                <small class="fw-light fst-italic">Turco privado</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->jacuzzi_privado }}</small><br>
                                <small class="fw-light fst-italic">Jacuzzi privado</small>
                            </div>
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->tina_privada }}</small><br>
                                <small class="fw-light fst-italic">Tina privada</small>
                            </div>
                        </div>
                        <div class="row mt-1 interior">
                            <div class="col-4">
                                <small class="fw-bold">{{ $datos->aire_privado }}</small><br>
                                <small class="fw-light fst-italic">Aire acondicionado privado</small>
                            </div>
                            <div class="col-4">
                                @if ($datos->tipo_inmueble == 'Casa uso vivienda')
                                    <small class="fw-bold">{{ $datos->patio }}</small><br>
                                    <small class="fw-light fst-italic">Patio interior</small>
                                @endif
                            </div>
                            <div class="col-4">
                                @if ($datos->tipo_inmueble == 'Casa uso vivienda')
                                    <small class="fw-bold">{{ $datos->jardin_interior }}</small><br>
                                    <small class="fw-light fst-italic">Jardín Interior</small>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10 pie">
                                <p></p>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
                <div class="pagebreak"> </div>
                <div class="separador d-none d-print-block"></div>
                @if ($datos->horizontal == 'Si')
                    <div class="row my-3">
                        <div class="col-12 seccion">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10 cabeza">
                                    <p class="fw-bold">
                                        <i class="fas fa-building"></i>
                                        Características conjunto cerrado o edificio
                                    </p>
                                </div>
                                <div class="col-1"></div>
                            </div>
                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->nombre_c_e }}</small><br>
                                    <small class="fw-light fst-italic">Nombre</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->tipo_seguridad }}</small><br>
                                    <small class="fw-light fst-italic">Seguridad</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->tipo_vigilancia }}</small><br>
                                    <small class="fw-light fst-italic">Vigilancia</small>
                                </div>
                            </div>
                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->tipo_cuota }}</small><br>
                                    <small class="fw-light fst-italic">Tipo de cuota</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">$
                                        {{ number_format($datos->adm_cp, 0, ',', '.') }}</small><br>
                                    <small class="fw-light fst-italic">Administración plena</small>
                                </div>
                                <div class="col-4">
                                    @if ($datos->tipo_cuota == 'Plena / Pronto pago')
                                        <small class="fw-bold">$
                                            {{ number_format($datos->adm_cd, 0, ',', '.') }}</small><br>
                                        <small class="fw-light fst-italic">Admon. con descuento</small>
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->pq_visitantes }}</small><br>
                                    <small class="fw-light fst-italic">Parqueadero de visitantes</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->bicicletero }}</small><br>
                                    <small class="fw-light fst-italic">Bicicletero</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->s_social }}</small><br>
                                    <small class="fw-light fst-italic">Salón social</small>
                                </div>
                            </div>
                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->bbq }}</small><br>
                                    <small class="fw-light fst-italic">BBQ</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->s_juntas }}</small><br>
                                    <small class="fw-light fst-italic">Sala de juntas</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->p_infantil }}</small><br>
                                    <small class="fw-light fst-italic">Parque infantil</small>
                                </div>
                            </div>
                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->gimnasio }}</small><br>
                                    <small class="fw-light fst-italic">Gimnasio</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->turco }}</small><br>
                                    <small class="fw-light fst-italic">Turco</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->sauna }}</small><br>
                                    <small class="fw-light fst-italic">Sauna</small>
                                </div>
                            </div>
                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->c_squash }}</small><br>
                                    <small class="fw-light fst-italic">Cancha de squash</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->c_tenis }}</small><br>
                                    <small class="fw-light fst-italic">Cancha de tenis</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->c_multiple }}</small><br>
                                    <small class="fw-light fst-italic">Cancha múltiple</small>
                                </div>
                            </div>
                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->s_juegos }}</small><br>
                                    <small class="fw-light fst-italic">Salón de juegos</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->s_estudio }}</small><br>
                                    <small class="fw-light fst-italic">Salón de estudio</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->lavanderia_c }}</small><br>
                                    <small class="fw-light fst-italic">Lavandería comunal</small>
                                </div>
                            </div>
                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->planta_e }}</small><br>
                                    <small class="fw-light fst-italic">Planta eléctrica</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->piscina }}</small><br>
                                    <small class="fw-light fst-italic">Piscina</small>
                                </div>
                                <div class="col-4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10 pie">
                                    <p></p>
                                </div>
                                <div class="col-1"></div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
        <div class="d-none">
            <input type="number" name="latitud" id="latitud" value="{{ $datos->latitud }}">
            <input type="number" name="longitud" id="longitud" value="{{ $datos->longitud }}">
            <input type="number" name="area_c" id="area_c" value="{{ $datos->a_construida }}">

        </div>
    @endforeach
@endsection
@section('final')
    <script>
        latitud = $('#latitud').val();
        longitud = $('#longitud').val();
        coordenadas = [latitud, longitud];

        var mymap = L.map('map').setView(coordenadas, 16);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(mymap);
        var marker = new L.marker(coordenadas, {}).addTo(mymap);
    </script>
@endsection
