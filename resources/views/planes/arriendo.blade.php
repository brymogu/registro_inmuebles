@extends('layouts.plantilla')
@section('title', 'Consigna tu inmueble')
@section('more_head')
    <script src="{!! asset('js/ocultos.js') !!}"></script>
    <script src="{!! asset('js/selects.js') !!}"></script>
    <script src="{!! asset('js/calcule-arr.js') !!}"></script>

@endsection

@section('content')
    <div class="card bg-default tarjeta shadow-lg animate__animated animate__fadeInDown" id="planes_tarjeta">
        <div class="card-body">
            {{ Form::open(['method' => 'post']) }}
            <div class="row my-3 text-center">
                <div class="col-12">
                    <h4>Planes arrendamiento</h4>
                    <p>En Épica Inmobiliaria® contamos con tres planes para el arrendamiento de tu inmueble que pagas
                        mensualmente <strong>solo a partir del momento en que sea arrendado</strong>. Elige el de tu interés, luego podrás cambiarlo 🤗</p>
                    <hr class="encabezado">
                </div>
            </div>
            <div class="table-responsive table-hover align-middle border-0">
                <table id="table" class="table">
                    <thead>
                        <tr>
                            <th class="cara">CARACTERÍSTICAS</th>
                            <th>BÁSICO</th>
                            <th>ESTÁNDAR</th>
                            <th>PREMIUM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="precios">
                            <td></td>
                            <td>
                                <p id="estsem" class="pt-3"></p>
                            </td>
                            <td>
                                <p id="plus" class="pt-3"></p>
                            </td>
                            <td>
                                <p id="premes" class="pt-3"></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="cara">Elaboración y firma de contrato de arrendamiento</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Sin exclusividad</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Cobertura arrendamientos</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Cobertura de servicios públicos </td>
                            <td><i class="fa fa-minus"></i></td>
                            <td>Hasta $300.000</td>
                            <td>Hasta $500.000</td>
                        </tr>
                        <tr>
                            <td class="cara">Cobertura de daños y faltantes</td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-minus"></i></td>
                            <td>Hasta 30% del canon</td>
                        </tr>
                        <tr>
                            <td class="cara">Publicación en internet</td>
                            <td>1 Portal + Web</td>
                            <td>2 Portales + Web</td>
                            <td>3 Portales + RRSS + Web</td>
                        </tr>
                        <tr>
                            <td class="cara">Atención de visitas presenciales a interesados</td>
                            <td>Lunes a Viernes</td>
                            <td>Lunes a Sábado</td>
                            <td>Toda la semana</td>
                        </tr>
                        <tr>
                            <td class="cara">Informes de gestión comercial</td>
                            <td><i class="fa fa-minus"></i></td>
                            <td>Limitado</td>
                            <td>Sin límite</td>
                        </tr>
                        <tr>
                            <td class="cara">Firma electrónica</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Elaboración del inventario físico y digital</td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Inspección y recibimiento con inventario al terminar el arrendamiento
                            </td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Fotografías tomadas por nosotros</td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Video</td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Marketing en redes sociales y bases de datos aliados inmobiliarios
                            </td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Reporte de fecha de asambleas de copropiedad</td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>            
        </div>
    </div>
    <div class="card bg-default tarjeta shadow-lg">
        <div class="card-body">
            <div class="row my-3 align-items-center">
                <div class="col-12 col-md-6">
                    <div class="form-group row border-end">
                        <label for="modificar" class="col-5">¿Deseas modificar el valor de tu inmueble?</label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            <input type="checkbox" name="modificar" value="1" id="modificar" />
                            <label class="slider-v1" for="modificar"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6" id="sec_valor">
                    <div class="form-floating  shadow-lg my-3">
                        <input type="number" name="valor" class="form-control border-0 rounded" id="valor"
                            value="{!! $valor !!}" placeholder="10000000">
                        <label for="valor">valor de arriendo</label>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-6 border-end">
                    <label for="tipo_inm" class="form-label">Seleccione el plan de su preferencia</label>
                    {!! Form::select('plan', $planes, null, ['class' => 'form-select', 'id' => 'plan', 'required' => 'required']) !!}
                </div>
                <div class="col-6">
                    <p>Para tu inmueble con canon de <strong class="bold" id="valormodal">$
                            {!! $valor !!}</strong><br />
                        <small class="text-muted">(incluida cuota de administración si aplicara)</small>
                    </p>
                    <div class="col-12 text-start">
                        <p>El costo del <strong id="plan"></strong> está compuesto por: </p>
                        <ul>
                            <li>Un valor mensual de <span id="val-mes"></span>, equivale al <strong
                                    id="porcentaje"></strong> sin incluir IVA</li>
                            <li>Póliza incluida </li>
                            <li>Cobro <span id="efectivo"></span>, <strong>una vez sea
                                    arrendado</strong> </li>
                        </ul>
                    </div>
                    <div class="col-12 mate">
                        <div class="row my-3">
                            <div class="col-2"></div>
                            <div class="col-8 text-start">
                                <div class="row">
                                    <div class="col">Servicios Inmobiliarios</div>
                                    <div class="col"><span id="serv"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col"><strong>+ </strong>Poliza</div>
                                    <div class="col"><span id="poliza"></span></div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col fw-bold"> Subtotal<sup>*</sup> </div>
                                    <div class="col fw-bold"> <span id="subtotal"></span> </div>
                                </div>
                                <div class="row">
                                    <div class="col"> <strong>+</strong> IVA </div>
                                    <div class="col"> <span id="iva"></span> </div>
                                </div>
                                <div class="row">
                                    <div class="col"> <strong>+</strong> 4 x mil </div>
                                    <div class="col"> <span id="cpm"></span> </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col fw-bold"> Total </div>
                                    <div class="col fw-bold"> <span id="total"></span> </div>
                                </div>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>

    <div class="row my-4">
        <div class="d-none d-md-block col-md-4"></div>
        <div class="col-12 col-md-4">
            <div class="card shadow px-3">
                <div class="card-body">
                    <div class="row text-center align-items-center">
                        ¿Tienes preguntas?
                        <a href="https://meetings.hubspot.com/reunion-con-andres-montero-de-epica-inmobiliaria/reunion-con-andres-montero-de-epica-inmobiliaria"
                            target="_blank" class="btn botones mt-3">Reunión virtual con asesor</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-md-block col-md-4"></div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="accordion" id="accordionFlushExample">
                        <div class="accordion-item">

                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cara">Mes</th>
                                                <th>Te cobramos</th>
                                                <th>Tu recibes</th>
                                            </tr>
                                        </thead>
                                        <tbody id="basico_tabla"> </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
