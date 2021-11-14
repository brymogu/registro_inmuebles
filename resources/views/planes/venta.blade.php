@extends('layouts.plantilla')
@section('title', 'Consigna tu inmueble')
@section('more_head')
<script src="{!! asset('js/calcule-vta.js') !!}"></script>
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
                        <i class="far fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Con esto podrás aumentar hasta en un 94% la probabilidad de venta o arriendo"></i>
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
            <div class="table-responsive table-hover ">
                <table id="table" class="table text-center ">
                    <thead>
                        <tr class=" shadow rounded ">
                            <th class="cara">Selecciona el plan que prefieras: </th>
                            <th>
                                <input class="form-check-input" name="plan" type="radio" id="basico" value="1">
                                <label class="form-check-label" for="basico">BÁSICO</label>
                            </th>
                            <th>
                                <input class="form-check-input" name="plan" type="radio" id="estandar" value="2" checked>
                                <label class="form-check-label" for="estandar">ESTÁNDAR</label>
                            </th>
                            <th>
                                <input class="form-check-input" name="plan" type="radio" id="plus" value="4">
                                <label class="form-check-label" for="plus">PLUS</label>
                            </th>
                            <th>
                                <input class="form-check-input" name="plan" type="radio" id="premium" value="3">
                                <label class="form-check-label" for="premium">PREMIUM</label>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="py-3">
                            <td></td>
                            <td>
                                <p id="basano" class="font-weight-bold">$ 0</p>
                            </td>
                            <td>
                                <p id="estsem" class="font-weight-bold">$ 0</p>
                            </td>
                            <td>
                                <p id="plusmes" class="font-weight-bold">$ 0</p>
                            </td>
                            <td>
                                <p id="premes" class="font-weight-bold ">$ 0</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="cara">Asesoría jurídica (no incluye estudio de títulos)</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Elaboración de promesa de compraventa</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Sin exclusividad</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Acompañamiento firma escritura</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Firma electrónica</td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Publicación en internet</td>
                            <td><i class="fa fa-minus"></i></td>
                            <td>1 portal + Web</td>
                            <td>2 portales + Web</td>
                            <td>3 portales + RRSS + Web</td>
                        </tr>
                        <tr>
                            <td class="cara">Atención de visitas presenciales a interesados</td>
                            <td><i class="fa fa-minus"></i></td>
                            <td>Lunes a Viernes</td>
                            <td>Lunes a Sábado</td>
                            <td>Toda la semana </td>
                        </tr>
                        <tr>
                            <td class="cara">Máximo de visitas presenciales a interesados</td>
                            <td><i class="fa fa-minus"></i></td>
                            <td>10</td>
                            <td>20</td>
                            <td>Sin límite</td>
                        </tr>

                        <tr>
                            <td class="cara">Informes de gestión comercial</td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-minus"></i></td>
                            <td>Limitado</td>
                            <td>Sin límite</td>
                        </tr>
                        <tr>
                            <td class="cara">Fotografías tomadas por nosotros</td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-check"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="cara">Video</td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>

                        <tr>
                            <td class="cara">Marketing en redes sociales y bases de datos aliados inmobiliarios</td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-minus"></i></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="card shadow px-3">
                    <div class="card-body">
                        <div class="row text-center align-items-center">
                            ¿Aun tienes dudas?, Agendate y con gusto te apoyamos
                            <a href="https://meetings.hubspot.com/reunion-con-andres-montero-de-epica-inmobiliaria/reunion-con-andres-montero-de-epica-inmobiliaria" target="_blank" class="btn botones mt-3">Vamos</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
        {{ Form::close() }}
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Plan Básico</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-start">
                        <p>Para tu inmueble con valor de <strong id="valormodal">$</strong><br />
                        </p>
                        <p>El costo del <strong id="plan"></strong> está compuesto por: </p>
                        <ul>
                            <li>Un valor de <span id="valor_plan"></span>, equivale al <strong id="porcentaje"></strong> sin incluir IVA</li>
                            <li id="efectivo">Se hará efectivo <strong id="efectivo"></strong> </li>
                        </ul>
                    </div>
                    <div id="noplus">
                        <div class="col-12 mate">
                            <div class="row my-3">
                                <div class="col-2"></div>
                                <div class="col-8 text-end">
                                    <div class="row">
                                        <div class="col">Servicios Inmobiliarios</div>
                                        <div class="col"><span id="serv"></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"> <strong>+</strong> IVA </div>
                                        <div class="col"> <span id="iva"></span> </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col bold"> Total </div>
                                        <div class="col"> <span id="total"></span> </div>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <p></p>
                        </div>
                    </div>
                    <div id="soloplus">
                        <div class="col-12 mate">
                            <div class="row my-3">
                                <div class="col-12 text-end ">
                                    <div class="row">
                                        <div class="col"></div>
                                        <div class="col bold">1° Pago</div>
                                        <div class="col bold">2° Pago</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">Momento del pago:</div>
                                        <div class="col"><span id="efectivo1"></span></div>
                                        <div class="col"><span id="efectivo2"></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Servicios Inmobiliarios</div>
                                        <div class="col"><span id="serv1"></span></div>
                                        <div class="col"><span id="serv2"></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"> <strong>+</strong> IVA </div>
                                        <div class="col"> <span id="iva1"></span> </div>
                                        <div class="col"> <span id="iva2"></span> </div>
                                    </div>
                                    <hr />
                                    <div class="row mb-3">
                                        <div class="col bold"> Subtotal </div>
                                        <div class="col"> <span id="total1"></span></div>
                                        <div class="col"> <span id="total2"></span></div>
                                    </div>
                                    <div class="row py-2 separador text-center">
                                        <div class="col bold">Total</div>
                                        <div class="col"><strong id="totalprem">+</strong> </div>
                                    </div>
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