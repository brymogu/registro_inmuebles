@extends('layouts.plantilla')
@section('title', 'Consigna tu inmueble')
@section('more_head')
    <script src="{!! asset('js/calcule-arr.js') !!}"></script>
@endsection

@section('content')
    <div class="card bg-default tarjeta shadow-lg animate__animated animate__fadeInDown" id="planes_tarjeta">
        <div class="card-body">
            {{ Form::open(['method' => 'post']) }}
            <div class="row my-2">
                <div class="d-none d-md-block col-md-10"></div>
                <div class="col-6 col-md-2 text-end">
                    <button type="submit" class="btn botones">Finalizar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 border-right">
                    <div class="form-group row">
                        <label for="cpvj" class="col-5">¿Deseas realizar el concepto de precio y viabilidad juridica
                            por $29.900?
                            <i class="far fa-question-circle" aria-hidden="true" data-toggle="tooltip"
                                data-placement="right"
                                title="Con esto podrás aumentar hasta en un 94% la probabilidad de venta o arriendo"></i>
                        </label>
                        <div class="col-2">
                            <a>No</a>
                        </div>
                        <div class="col-3 bool text-center">
                            <input type="checkbox" name="cpvj" value="1" id="cpvj" />
                            <label class="slider-v1" for="cpvj"></label>
                        </div>
                        <div class="col-2">
                            <a>Si</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12 ">
                    <input type="number" name="valor" class="d-none" value="{!! $valor !!}" id="valor">
                </div>
                <div class="table-responsive table-hover border-0">
                    <table id="table" class="table text-center">
                        <thead>
                            <tr class=" shadow rounded py-5">
                                <th class="cara">Selecciona el plan que prefieras: </th>
                                <div class="form-check">
                                    <th>
                                        <input class="form-check-input" name="plan" type="radio" id="basico" value="1" >
                                        <label class="form-check-label" for="basico">BÁSICO</label>
                                    </th>
                                    <th>
                                        <input class="form-check-input" name="plan" type="radio" id="estandar" value="2" checked>
                                        <label class="form-check-label" for="estandar">ESTÁNDAR</label>
                                    </th>
                                    <th>
                                        <input class="form-check-input" name="plan" type="radio" id="premium" value="3">
                                        <label class="form-check-label" for="premium">PREMIUM</label>
                                    </th>
                                </div>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="precios">
                                <td></td>
                                <td>
                                    <p id="estsem" class="font-weight-bold pt-3">$ 0</p>
                                </td>
                                <td>
                                    <p id="plus" class="font-weight-bold pt-3">$ 0</p>
                                </td>
                                <td>
                                    <p id="premes" class="font-weight-bold pt-3">$ 0</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="cara">Respaldo en arrendamientos dejados de pagar por los arrendatarios</td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
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
                                <td class="cara">Seguro de servicios públicos </td>
                                <td><i class="fa fa-minus"></i></td>
                                <td>Hasta $300.000</td>
                                <td>Hasta $1.000.000</td>
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
                                <td class="cara">Máximo de visitas presenciales a interesados</td>
                                <td>10</td>
                                <td>30</td>
                                <td>Sin límite</td>
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
                                <td class="cara">Marketing en redes sociales y bases de datos aliados inmobiliarios</td>
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
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <div class="card shadow px-3">
                            <div class="card-body">
                                <div class="row text-center align-items-center">
                                    ¿Aun tienes dudas?, Agendate y con gusto te apoyamos
                                    <a href="https://meetings.hubspot.com/reunion-con-andres-montero-de-epica-inmobiliaria/reunion-con-andres-montero-de-epica-inmobiliaria"
                                        target="_blank" class="btn botones mt-3">Vamos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>

            </div>
            {{ Form::close() }}
        </div>
    </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Plan Básico</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="limpiar_tabla()" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="accordion" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne"> Precios servicios en arrendamiento </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <p>Para tu inmueble con canon de <span id="valormodal">$</span><br />
                                                    <strong>(incluida cuota de administración de aplicar)</strong>
                                                </p>
                                            </div>
                                            <div class="col-12 text-start">
                                                <p>El costo del <strong id="plan"></strong> está compuesto por: </p>
                                                <ul>
                                                    <li>Un valor mensual de <span id="val-mes"></span>, equivale al <strong id="porcentaje"></strong> sin incluir IVA</li>
                                                    <li>Póliza incluida </li>
                                                    <li>Se hará efectivo <span id="efectivo"></span>, <strong>al ser arrendado</strong> </li>
                                                </ul>
                                            </div>
                                            <div class="col-12 mate">
                                                <div class="row my-3">
                                                    <div class="col-2"></div>
                                                    <div class="col-8 text-end">
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
                                                            <div class="col bold"> Subtotal<sup>*</sup> </div>
                                                            <div class="col bold"> <span id="subtotal"></span> </div>
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
                                                            <div class="col bold"> Total </div>
                                                            <div class="col bold"> <span id="total"></span> </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo"> <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"> Estructura de pagos mes a mes durante un año
                                        de arrendamiento </button> </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
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
                                        <div class="alert alert-warning mate" role="alert"> <strong>*</strong>
                                            <ul>
                                                <li>De los valores mensuales que recibes se debe descontar la cuota de administración de propiedad horizontal, si este aplicara.</li>
                                                <li>Recuerda que este valor lo cobran edificios o conjuntos a los inmuebles en que se encuentran con el fin de garantizar el mantenimiento y adecuado funcionamiento de zonas comunes, este no es un valor que
                                                    le corresponda a Épica por sus servicios.</li>
                                                <li>El valor de cuota de administración de P.H. puede cambiar de acuerdo con las asambleas de copropiedad.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts_footer')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
