@extends('layouts.plantilla')
@section('title', 'Consigna tu inmueble')
@section('more_head')
    <script src="{!! asset('js/ocultos.js') !!}"></script>
    <script src="{!! asset('js/calcule-vta.js') !!}"></script>
@endsection

@section('content')
    {{ Form::open(['method' => 'post']) }}
    <div class="card bg-default tarjeta shadow-lg animate__animated animate__fadeInDown" id="planes_tarjeta">
        <div class="card-body">
            <div class="row my-3">
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
                        <label for="valor">valor de venta</label>
                    </div>
                    <div class="bold text-center">
                        <span id="valinval" class="form-text text-muted"></span>
                    </div>
                </div>

            </div>
            <div class="row mt-5">
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
                            <tr class="py-5">
                                <td></td>
                                <td>
                                    <p id="basano" class="font-weight-bold"></p>
                                </td>
                                <td>
                                    <p id="estsem" class="font-weight-bold"></p>
                                </td>
                                <td>
                                    <p id="premes" class="font-weight-bold"></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="cara">Asesoría jurídica (no incluye estudio de títulos)</td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                            </tr>
                            <tr>
                                <td class="cara">Elaboración de promesa de compraventa</td>
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
                                <td class="cara">Acompañamiento firma escritura</td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                            </tr>
                            <tr>
                                <td class="cara">Firma electrónica</td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                            </tr>
                            <tr>
                                <td class="cara">Publicación en internet</td>
                                <td>1 portal + Web</td>
                                <td>2 portales + Web</td>
                                <td>3 portales + RRSS + Web</td>
                            </tr>
                            <tr>
                                <td class="cara">Atención de visitas presenciales a interesados</td>
                                <td>Lunes a Viernes</td>
                                <td>Lunes a Sábado</td>
                                <td>Toda la semana </td>
                            </tr>


                            <tr>
                                <td class="cara">Informes de gestión comercial</td>
                                <td><i class="fa fa-minus"></i></td>
                                <td>Limitado</td>
                                <td>Sin límite</td>
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
                                <td><i class="fa fa-minus"></i></td>
                                <td><i class="fa fa-check"></i></td>
                            </tr>

                            <tr>
                                <td class="cara">Marketing en redes sociales y bases de datos aliados
                                    inmobiliarios</td>
                                <td><i class="fa fa-minus"></i></td>
                                <td><i class="fa fa-minus"></i></td>
                                <td><i class="fa fa-check"></i></td>
                            </tr>
                            <tr>
                                <td class="cara"></td>
                                <td><button name="plan" class="btn botones" type="submit" value="1">Elegir</button></td>
                                <td><button name="plan" class="btn botones" type="submit" value="2">Elegir</button></td>
                                <td><button name="plan" class="btn botones" type="submit" value="3">Elegir</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
    <div class="row mb-3">
        <div class="d-none d-md-block col-md-4"></div>
        <div class="col-12 col-md-4">
            <div class="card shadow px-3">
                <div class="card-body">
                    <div class="row text-center align-items-center">
                        ¿Tienes preguntas?
                        <a href="https://meetings.hubspot.com/reunion-con-andres-montero-de-epica-inmobiliaria/reunion-con-andres-montero-de-epica-inmobiliaria"
                            target="_blank" class="btn botones mt-3">Reunión virtual con el asesor</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-md-block col-md-4"></div>
    </div>

    <div class="position-fixed bottom-0 start-0 p-3 animate__animated animate__fadeInUp animate__delay-2s	"
        style="z-index: 11">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-animation="false"
            data-bs-autohide="false">
            <div class="toast-header">
                <img src="{!! asset('img/icons/favicon-16x16.png') !!}" class="rounded me-2" alt="...">
                <strong class="me-auto">Epica Inmobiliaria</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hola, recuerda que este registro no corresponde a un contrato
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Plan Básico</h5> <button type="button"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-start">
                            <p>Para tu inmueble con valor de <strong id="valormodal">$</strong>, el costo del <strong
                                    id="plan"></strong> está conformado por: </p>
                            <ul>
                                <li>Un valor de <span id="valor_plan"></span>, equivale al <strong id="porcentaje"></strong>
                                    sin incluir IVA</li>
                                <li id="secfectivo">Se hará efectivo <strong id="efectivo"></strong> </li>
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
                                    <div class="col-12 text-end">
                                        <div class="row">
                                            <div class="col"></div>
                                            <div class="col bold">1° Pago
                                                <hr />
                                            </div>
                                            <div class="col bold">2° Pago
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col">Momento del pago:</div>
                                            <div class="col"><span id="efectivo1"></span>
                                            </div>
                                            <div class="col"><span id="efectivo2"></span>
                                            </div>
                                        </div>

                                        <div class="row my-3">
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
                                        <div class="row my-3">
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
