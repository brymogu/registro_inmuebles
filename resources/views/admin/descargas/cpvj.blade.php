@extends('layouts.formatos')
@section('more_head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="{!! asset('js/cond_cpvj.js') !!}"></script>
    <script src="{!! asset('js/selects_edit.js') !!}"></script>
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
                        <input id="upz_edit" name="upz_edit" type="text" class="form-control" value="{{ $datos->upz }}"
                            required>
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
                    <div class="col-4">
                        <input id="precio_contrato_edit" name="precio_contrato_edit" type="text" class="form-control"
                            value="{{ $datos->precio_contrato }}" required>
                        <small class="fw-light fst-italic">Precio contrato</small>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-4">

                    </div>
                    <div class="col-4">

                    </div>
                    <div class="col-4 text-end pt-1">
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
        <!-- Contratos-->
        <div id="contrato">
            <div id="arriendo">
                <!-- Titulo-->
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10 text-center" id="titarr">
                        <p style="font-size:12px;"><strong>ACUERDO SOBRE SERVICIOS EN ARRENDAMIENTO DE INMUEBLE</strong></p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <!-- Cuerpo-->
                <div class="row" id="basico_arr">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">Entre <strong>{{ $datos->name }} {{ $datos->lastname }} </strong>
                            identificaci&oacute;n No. <strong>{{ $datos->doc_number }} </strong> documento de identidad
                            tipo <strong>{{ $datos->desc_tipos_documento }} </strong>, con
                            facultades suficientes para tomar decisiones sobre el arrendamiento del inmueble identificado en
                            este documento, quien en adelante se denominar&aacute; <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong>, y de otra parte <strong>&Eacute;PICA CONSTRUCCIONES S.A.
                                (&Eacute;PICA INMOBILIARIA&reg;)</strong> sociedad debidamente constituida con domicilio
                            principal en la ciudad de Bogot&aacute;, NIT. 900.203.640-0 quien en adelante se
                            denominar&aacute; <strong>LA INMOBILIARIA</strong>, celebran por medio de este documento un
                            acuerdo de<strong>&nbsp;SERVICIOS EN ARRENDAMIENTO</strong> sobre el inmueble en las condiciones
                            que a continuaci&oacute;n se describen:&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">PRIMERA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Objeto del acuerdo</strong>: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> contrata a <strong>LA INMOBILIARIA</strong> para que oferte al
                            p&uacute;blico el bien inmueble identificado as&iacute;: DIRECCI&Oacute;N
                            <strong>{{ $datos->direccion }} {{ $datos->direccion_comp }} </strong> CIUDAD O MUNICIPIO
                            <strong>{{ $datos->ciudad }} </strong> FOLIO DE
                            MATR&Iacute;CULA <strong>{{ $datos->matricula }} </strong>, CHIP
                            <strong>{{ $datos->chip }}
                            </strong>, con las
                            caracter&iacute;sticas que se registran en ficha t&eacute;cnica anexa a este documento. PRECIO
                            DE PUBLICACI&Oacute;N: $<strong>{{ $datos->precio_contrato }} </strong> incluida la cuota de
                            administraci&oacute;n si aplicara.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEGUNDA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Facultades de LA INMOBILIARIA</strong>: En desarrollo del
                            presente acuerdo <strong>LA INMOBILIARIA</strong> desplegar&aacute; las actividades que
                            considere convenientes para lograr el <strong>arrendamiento</strong> del inmueble descrito, de
                            manera independiente, sin subordinaci&oacute;n o dependencia, utilizando sus propios medios,
                            elementos de trabajo y personal a su cargo.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">TERCERA. Obligaciones de</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>LA INMOBILIARIA</strong>: &nbsp;<strong>LA
                                INMOBILIARIA</strong> se obliga a: 1. Ofrecer el bien inmueble en el valor autorizado por
                            <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> e informar sobre propuestas de interesados en
                            el inmueble. 2. Promover comercialmente el inmueble y/o realizar la administraci&oacute;n del
                            arrendamiento. 3. Una vez arrendado el inmueble, pagar a <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>el d&iacute;a 05 del mes siguiente a la causaci&oacute;n del
                            arrendamiento los c&aacute;nones.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">CUARTA. Obligaciones de EL PROPIETARIO O SU
                                REPRESENTANTE</span></strong><span style="font-size:10px;">: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>se obliga a: 1. Una vez arrendado el inmueble por la
                            gesti&oacute;n de <strong>LA INMOBILIARIA,</strong> pagar a esta los valores correspondientes en
                            relaci&oacute;n con el arrendamiento del inmueble de que trata este acuerdo. 2. Facilitar a
                            <strong>LA INMOBILIARIA</strong> el acceso al inmueble para que pueda exhibirlo en tiempos de
                            respuesta &aacute;giles ante posibles interesados. 3. Facilitar la documentaci&oacute;n e
                            informaci&oacute;n necesaria y real sobre el inmueble propuesto para el arrendamiento. 4. No
                            desconocer los servicios o transacciones inmobiliarias a las que acceda <strong>EL PROPIETARIO O
                                SU REPRESENTANTE&nbsp;</strong>por gesti&oacute;n de <strong>LA INMOBILIARIA</strong>. 5.
                            <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>autoriza desde ya a <strong>LA
                                INMOBILIARIA</strong> a realizar aseo al inmueble cuando encuentre un arrendatario y previo
                            a la entrega con cargo a <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>por valor de
                            <strong>$40.000 + IVA&nbsp;</strong>cuando se trate de un inmueble para vivienda hasta de 100
                            m<span style="color:#202124;background:white;">&sup2; y&nbsp;</span><strong>$60.000 +
                                IVA&nbsp;</strong>cuando se trate de un inmueble para vivienda superior a 100 m<span
                                style="color:#202124;background:white;">&sup2;. Cuando se trate de un inmueble diferente a
                                uso de vivienda se enviar&aacute; previamente cotizaci&oacute;n de acuerdo con lo necesario
                                para realizar dicho aseo.</span></span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">QUINTA. Publicidad</span></strong><span
                            style="font-size:10px;">: <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> autoriza a
                            <strong>LA INMOBILIARIA</strong> a realizar publicidad en internet que considere conveniente
                            <strong>LA INMOBILIARIA,</strong> y se encuentra incluida en los servicios pactados,
                            durar&aacute; mientras el inmueble sea comercializado por <strong>LA INMOBILIARIA</strong>. La
                            publicidad en medios diferentes a los antes mencionados y en caso de requerirse se
                            acordar&aacute; con <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> y este asumir&aacute;
                            dicho valor. <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> suministrar&aacute; las
                            fotograf&iacute;as del inmueble a <strong>LA INMOBILIARIA&nbsp;</strong>y estas pasar&aacute;n a
                            ser propiedad de <strong>LA INMOBILIARIA</strong>, a&uacute;n as&iacute; <strong>LA
                                INMOBILIARIA</strong> podr&aacute; abstenerse del uso de las mismas si considera que no
                            cumplen con los est&aacute;ndares requeridos. <strong>EL PROPIETARIO O SU REPRESENTANTE</strong>
                            se abstendr&aacute; de utilizar los elementos y/o &nbsp; herramientas empleadas por <strong>LA
                                INMOBILIARIA</strong> para realizar publicidad. <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> se compromete a que en caso de comercializar el inmueble directamente
                            o a trav&eacute;s de la gesti&oacute;n realizada por terceros diferentes a <strong>LA
                                INMOBILIARIA</strong>, todos realizar&aacute;n la comercializaci&oacute;n en los mismos
                            t&eacute;rminos de precio y caracter&iacute;sticas.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEXTA. Vigencia del acuerdo</span></strong><span
                            style="font-size:10px;">: Este acuerdo tiene una vigencia de tres (3) meses, contados a partir
                            de su firma, prorrogables por treinta (30) d&iacute;as sucesivos autom&aacute;ticamente a menos
                            que cualquiera de las partes desee darlo por terminado, para lo cual bastar&aacute; una
                            comunicaci&oacute;n escrita dirigida a la otra parte.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">S&Eacute;PTIMA.</span></strong><span
                            style="font-size:10px;">&nbsp;Durante la vigencia del contrato de arrendamiento, <strong>EL
                                PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>reconocer&aacute; a <strong>LA
                                INMOBILIARIA</strong> el <strong>8% + IVA</strong> del <strong><em>canon de arrendamiento +
                                    cuota de administraci&oacute;n de P.H. si aplica</em></strong> pagado mensualmente.
                            <strong>Normas de interpretaci&oacute;n.</strong> Para todos los efectos no previstos en este
                            acuerdo se aplicar&aacute;n las normas del C&oacute;digo de Comercio en especial al
                            art&iacute;culo 1340 y siguientes.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">OCTAVA. EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</span></strong><span style="font-size:10px;">autoriza desde ya la
                            recolecci&oacute;n documental por parte de <strong>LA INMOBILIARIA</strong> al arrendatario que
                            aplique a trav&eacute;s de esta y a firmar contrato de arrendamiento cuando el estudio de
                            arrendamiento de quien aplique sea aprobado. Por tratarse de un contrato consensual y sin
                            perjuicio de la ejecuci&oacute;n del presente acuerdo, en caso que <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> se retracte por cualquier motivo y no haya dado aviso a <strong>LA
                                INMOBILIARIA</strong> a trav&eacute;s del correo electr&oacute;nico
                            acomercial@epicainmobiliaria.com.co antes de que <strong>LA INMOBILIARIA</strong> haya recibido
                            documentos por parte del prospecto arrendatario, <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> se obliga a pagar la suma equivalente a un (1) canon de arrendamiento
                            a <strong>LA INMOBILIARIA</strong>. Sin perjuicio de lo anterior, <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> adem&aacute;s asumir&aacute; la devoluci&oacute;n del dinero pagado
                            por el arrendatario por concepto de estudio de arrendamiento y se har&aacute; responsable de
                            dicho retracto y las sumas de dinero en caso que una o varias entidades competentes condenen el
                            retracto conforme a la legislaci&oacute;n colombiana. <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>no podr&aacute; responsabilizar a <strong>LA
                                INMOBILIARIA&nbsp;</strong>en caso que el retracto sea decisi&oacute;n del
                            arrendatario.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">NOVENA M&eacute;rito ejecutivo.</span></strong><span
                            style="font-size:10px;">&nbsp;Este acuerdo presta m&eacute;rito ejecutivo para el cobro por los
                            servicios inmobiliarios prestados por <strong>LA INMOBILIARIA</strong> y a los que tiene derecho
                            esta en caso que haya logrado efectivamente el arrendamiento del bien inmueble (incluso si se
                            tratara de la simple presentaci&oacute;n del cliente y/o este llegase a <strong>EL PROPIETARIO O
                                SU REPRESENTANTE&nbsp;</strong>a trav&eacute;s de cualquier mecanismo o herramienta empleada
                            por <strong>LA INMOBILIARIA</strong>) y <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> se
                            niegue a pagarlos. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, <strong>LA
                                INMOBILIARIA</strong> se encontrar&aacute; facultada para reportar un eventual
                            incumplimiento de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> ante cualquier operador de
                            informaci&oacute;n financiera legalmente establecido de conformidad con las leyes de la
                            Rep&uacute;blica de Colombia. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, en caso
                            de desistimiento por parte de <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>dentro del
                            t&eacute;rmino inicial de tres (3) meses en la comercializaci&oacute;n del inmueble, este
                            reconocer&aacute; a <strong>LA INMOBILIARIA</strong> la suma de <strong>$50.000 + IVA</strong>.
                            En dicho caso, estar&aacute; a cargo de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong>
                            recoger la(s) llave(s) en la direcci&oacute;n de <strong>LA INMOBILIARIA</strong> si esta la(s)
                            tuviere. El correo electr&oacute;nico de notificaci&oacute;n de <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> es <strong>{{ $datos->email }} </strong> y el n&uacute;mero de
                            tel&eacute;fono celular de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> es
                            <strong>{{ $datos->phone }} </strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">D&Eacute;CIMA. Cl&aacute;usula
                                compromisoria.</span></strong><span style="font-size:10px;">&nbsp;En caso de conflicto entre
                            las partes, relativo a este acuerdo, su ejecuci&oacute;n y liquidaci&oacute;n, deber&aacute;
                            agotarse en una diligencia de conciliaci&oacute;n ante cualquier entidad autorizada para
                            efectuarla, la cual ser&aacute; pagada por partes iguales.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">En se&ntilde;al de aprobaci&oacute;n y plena validez del presente
                            documento firmo electr&oacute;nicamente de acuerdo con la Ley 527 de 1999 y el Decreto 2364 de
                            2012 en calidad de <strong>PROPIETARIO O SU REPRESENTANTE</strong>.</span>
                    </p>
                </div>
                <div class="row" id="estandar_arr">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">Entre <strong>{{ $datos->name }} {{ $datos->lastname }}
                            </strong>
                            identificaci&oacute;n No. <strong>{{ $datos->doc_number }} </strong> documento de identidad
                            tipo <strong>{{ $datos->desc_tipos_documento }} </strong>, con
                            facultades suficientes para tomar decisiones sobre el arrendamiento del inmueble identificado en
                            este documento, quien en adelante se denominar&aacute; <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong>, y de otra parte <strong>&Eacute;PICA CONSTRUCCIONES S.A.
                                (&Eacute;PICA INMOBILIARIA&reg;)</strong> sociedad debidamente constituida con domicilio
                            principal en la ciudad de Bogot&aacute;, NIT. 900.203.640-0 quien en adelante se
                            denominar&aacute; <strong>LA INMOBILIARIA</strong>, celebran por medio de este documento un
                            acuerdo de<strong>&nbsp;SERVICIOS EN ARRENDAMIENTO</strong> sobre el inmueble en las condiciones
                            que a continuaci&oacute;n se describen:&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">PRIMERA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Objeto del acuerdo</strong>: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> contrata a <strong>LA INMOBILIARIA</strong> para que oferte al
                            p&uacute;blico el bien inmueble identificado as&iacute;:
                            DIRECCI&Oacute;N <strong>{{ $datos->direccion }} {{ $datos->direccion_comp }} </strong>
                            CIUDAD
                            O MUNICIPIO <strong>{{ $datos->ciudad }} </strong> FOLIO DE
                            MATR&Iacute;CULA <strong>{{ $datos->matricula }} </strong>, CHIP
                            <strong>{{ $datos->chip }}
                            </strong>, con las
                            caracter&iacute;sticas que se registran en ficha t&eacute;cnica anexa a este documento. PRECIO
                            DE PUBLICACI&Oacute;N: $<strong>{{ $datos->precio_contrato }} </strong> incluida la cuota de
                            administraci&oacute;n si aplicara.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEGUNDA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Facultades de LA INMOBILIARIA</strong>: En desarrollo del
                            presente acuerdo <strong>LA INMOBILIARIA</strong> desplegar&aacute; las actividades que
                            considere convenientes para lograr el <strong>arrendamiento</strong> del inmueble descrito, de
                            manera independiente, sin subordinaci&oacute;n o dependencia, utilizando sus propios medios,
                            elementos de trabajo y personal a su cargo.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">TERCERA. Obligaciones de</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>LA INMOBILIARIA</strong>: &nbsp;<strong>LA
                                INMOBILIARIA</strong> se obliga a: 1. Ofrecer el bien inmueble en el valor autorizado por
                            <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> e informar sobre propuestas de interesados en
                            el inmueble. 2. Enviar informe peri&oacute;dico de la gesti&oacute;n comercial realizada. 3.
                            Promover comercialmente el inmueble y/o realizar la administraci&oacute;n del arrendamiento. 4.
                            Una vez arrendado el inmueble, pagar a <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>el d&iacute;a 05 del mes siguiente a la causaci&oacute;n del
                            arrendamiento los c&aacute;nones.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">CUARTA. Obligaciones de EL PROPIETARIO O SU
                                REPRESENTANTE</span></strong><span style="font-size:10px;">: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>se obliga a: 1. Una vez arrendado el inmueble por la
                            gesti&oacute;n de <strong>LA INMOBILIARIA,</strong> pagar a esta los valores correspondientes en
                            relaci&oacute;n con el arrendamiento del inmueble de que trata este acuerdo. 2. Facilitar a
                            <strong>LA INMOBILIARIA</strong> el acceso al inmueble para que pueda exhibirlo en tiempos de
                            respuesta &aacute;giles ante posibles interesados. 3. Facilitar la documentaci&oacute;n e
                            informaci&oacute;n necesaria y real sobre el inmueble propuesto para el arrendamiento. 4. No
                            desconocer los servicios o transacciones inmobiliarias a las que acceda <strong>EL PROPIETARIO O
                                SU REPRESENTANTE&nbsp;</strong>por gesti&oacute;n de <strong>LA INMOBILIARIA</strong>. 5.
                            <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>autoriza desde ya a <strong>LA
                                INMOBILIARIA</strong> a realizar aseo al inmueble cuando encuentre un arrendatario y previo
                            a la entrega con cargo a <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>por valor de
                            <strong>$40.000 + IVA&nbsp;</strong>cuando se trate de un inmueble para vivienda hasta de 100
                            m<span style="color:#202124;background:white;">&sup2; y&nbsp;</span><strong>$60.000 +
                                IVA&nbsp;</strong>cuando se trate de un inmueble para vivienda superior a 100 m<span
                                style="color:#202124;background:white;">&sup2;. Cuando se trate de un inmueble diferente a
                                uso de vivienda se enviar&aacute; previamente cotizaci&oacute;n de acuerdo con lo necesario
                                para realizar dicho aseo.</span></span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">QUINTA. Publicidad</span></strong><span
                            style="font-size:10px;">: <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> autoriza a
                            <strong>LA INMOBILIARIA</strong> a realizar publicidad en internet que considere conveniente
                            <strong>LA INMOBILIARIA</strong>, y se encuentra incluida en los servicios pactados,
                            durar&aacute; mientras el inmueble sea comercializado por <strong>LA INMOBILIARIA</strong>. La
                            publicidad en medios diferentes a los antes mencionados y en caso de requerirse se
                            acordar&aacute; con <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> y este asumir&aacute;
                            dicho valor. <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> no utilizar&aacute;, bajo
                            ning&uacute;n prop&oacute;sito, las fotograf&iacute;as de <strong>LA
                                INMOBILIARIA&nbsp;</strong>o cualquier otro elemento y/o herramienta publicitaria de la
                            misma y reconoce que estas son propiedad de <strong>LA INMOBILIARIA,&nbsp;</strong>a&uacute;n
                            cuando estas hayan sido suministradas por<strong>&nbsp;EL PROPIETARIO O SU
                                REPRESENTANTE</strong>. En beneficio de la gesti&oacute;n adecuada de publicidad, <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> acepta que &uacute;nicamente se fijar&aacute;n
                            avisos en ventana de <strong>LA INMOBILIARIA</strong>, en caso que <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> directamente o a trav&eacute;s de terceros fije avisos en ventana,
                            <strong>LA INMOBILIARIA</strong> se abstendr&aacute; de utilizar los suyos. <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> se compromete a que en caso de comercializar el
                            inmueble directamente o a trav&eacute;s de la gesti&oacute;n realizada por terceros diferentes a
                            <strong>LA INMOBILIARIA</strong>, todos realizar&aacute;n la comercializaci&oacute;n en los
                            mismos t&eacute;rminos de precio y caracter&iacute;sticas.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEXTA. Vigencia del acuerdo</span></strong><span
                            style="font-size:10px;">: Este acuerdo tiene una vigencia de tres (3) meses, contados a partir
                            de su firma, prorrogables por treinta (30) d&iacute;as sucesivos autom&aacute;ticamente a menos
                            que cualquiera de las partes desee darlo por terminado, para lo cual bastar&aacute; una
                            comunicaci&oacute;n escrita dirigida a la otra parte.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">S&Eacute;PTIMA.</span></strong><span
                            style="font-size:10px;">&nbsp;Durante la vigencia del contrato de arrendamiento, <strong>EL
                                PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>reconocer&aacute; a <strong>LA
                                INMOBILIARIA</strong> el <strong>10% + IVA</strong> del <strong><em>canon de arrendamiento +
                                    cuota de administraci&oacute;n de P.H. si aplica</em></strong> pagado mensualmente.
                            <strong>Normas de interpretaci&oacute;n.</strong> Para todos los efectos no previstos en este
                            acuerdo se aplicar&aacute;n las normas del C&oacute;digo de Comercio en especial al
                            art&iacute;culo 1340 y siguientes.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">OCTAVA. EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</span></strong><span style="font-size:10px;">autoriza desde ya la
                            recolecci&oacute;n documental por parte de <strong>LA INMOBILIARIA</strong> al arrendatario que
                            aplique a trav&eacute;s de esta y a firmar contrato de arrendamiento cuando el estudio de
                            arrendamiento de quien aplique sea aprobado. Por tratarse de un contrato consensual y sin
                            perjuicio de la ejecuci&oacute;n del presente acuerdo, en caso que <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> se retracte por cualquier motivo y no haya dado aviso a <strong>LA
                                INMOBILIARIA</strong> a trav&eacute;s del correo electr&oacute;nico
                            acomercial@epicainmobiliaria.com.co antes de que <strong>LA INMOBILIARIA</strong> haya recibido
                            documentos por parte del prospecto arrendatario, <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> se obliga a pagar la suma equivalente a un (1) canon de arrendamiento
                            a <strong>LA INMOBILIARIA</strong>. Sin perjuicio de lo anterior, <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> adem&aacute;s asumir&aacute; la devoluci&oacute;n del dinero pagado
                            por el arrendatario por concepto de estudio de arrendamiento y se har&aacute; responsable de
                            dicho retracto y las sumas de dinero en caso que una o varias entidades competentes condenen el
                            retracto conforme a la legislaci&oacute;n colombiana. <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>no podr&aacute; responsabilizar a <strong>LA
                                INMOBILIARIA&nbsp;</strong>en caso que el retracto sea decisi&oacute;n del
                            arrendatario.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">NOVENA. M&eacute;rito ejecutivo.</span></strong><span
                            style="font-size:10px;">&nbsp;Este acuerdo presta m&eacute;rito ejecutivo para el cobro por los
                            servicios inmobiliarios prestados por <strong>LA INMOBILIARIA</strong> y a los que tiene derecho
                            esta en caso que haya logrado efectivamente el arrendamiento del bien inmueble (incluso si se
                            tratara de la simple presentaci&oacute;n del cliente y/o este llegase a <strong>EL PROPIETARIO O
                                SU REPRESENTANTE&nbsp;</strong>a trav&eacute;s de cualquier mecanismo o herramienta empleada
                            por <strong>LA INMOBILIARIA</strong>) y <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> se
                            niegue a pagarlos. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, <strong>LA
                                INMOBILIARIA</strong> se encontrar&aacute; facultada para reportar un eventual
                            incumplimiento de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> ante cualquier operador de
                            informaci&oacute;n financiera legalmente establecido de conformidad con las leyes de la
                            Rep&uacute;blica de Colombia. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, en caso
                            de desistimiento por parte de <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>dentro del
                            t&eacute;rmino inicial de tres (3) meses en la comercializaci&oacute;n del inmueble, este
                            reconocer&aacute; a <strong>LA INMOBILIARIA</strong> la suma de <strong>$50.000 + IVA</strong>.
                            En dicho caso, estar&aacute; a cargo de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong>
                            recoger la(s) llave(s) en la direcci&oacute;n de <strong>LA INMOBILIARIA</strong> si esta la(s)
                            tuviere. &nbsp;El correo electr&oacute;nico de notificaci&oacute;n de <strong>EL PROPIETARIO O
                                SU REPRESENTANTE</strong> es <strong>{{ $datos->email }} </strong> y el n&uacute;mero de
                            tel&eacute;fono celular de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> es
                            <strong>{{ $datos->phone }} </strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">D&Eacute;CIMA. Cl&aacute;usula
                                compromisoria.</span></strong><span style="font-size:10px;">&nbsp;En caso de conflicto entre
                            las partes, relativo a este acuerdo, su ejecuci&oacute;n y liquidaci&oacute;n, deber&aacute;
                            agotarse en una diligencia de conciliaci&oacute;n ante cualquier entidad autorizada para
                            efectuarla, la cual ser&aacute; pagada por partes iguales.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">En se&ntilde;al de aprobaci&oacute;n y plena validez del presente
                            documento firmo electr&oacute;nicamente de acuerdo con la Ley 527 de 1999 y el Decreto 2364 de
                            2012 en calidad de <strong>PROPIETARIO O SU REPRESENTANTE</strong>.</span>
                    </p>
                </div>
                <div class="row" id="premium_arr">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">Entre <strong>{{ $datos->name }} {{ $datos->lastname }}
                            </strong>
                            identificaci&oacute;n No. <strong>{{ $datos->doc_number }} </strong> documento de identidad
                            tipo <strong>{{ $datos->desc_tipos_documento }} </strong>, con
                            facultades suficientes para tomar decisiones sobre el arrendamiento del inmueble identificado en
                            este documento, quien en adelante se denominar&aacute; <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong>, y de otra parte <strong>&Eacute;PICA CONSTRUCCIONES S.A.
                                (&Eacute;PICA INMOBILIARIA&reg;)</strong> sociedad debidamente constituida con domicilio
                            principal en la ciudad de Bogot&aacute;, NIT. 900.203.640-0 quien en adelante se
                            denominar&aacute; <strong>LA INMOBILIARIA</strong>, celebran por medio de este documento un
                            acuerdo de<strong>&nbsp;SERVICIOS EN ARRENDAMIENTO</strong> sobre el inmueble en las condiciones
                            que a continuaci&oacute;n se describen:&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">PRIMERA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Objeto del acuerdo</strong>: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> contrata a <strong>LA INMOBILIARIA</strong> para que oferte al
                            p&uacute;blico el bien inmueble identificado as&iacute;:
                            DIRECCI&Oacute;N <strong>{{ $datos->direccion }} {{ $datos->direccion_comp }} </strong>
                            CIUDAD
                            O MUNICIPIO <strong>{{ $datos->ciudad }} </strong> FOLIO DE
                            MATR&Iacute;CULA <strong>{{ $datos->matricula }} </strong>, CHIP
                            <strong>{{ $datos->chip }}
                            </strong>, con las
                            caracter&iacute;sticas que se registran en ficha t&eacute;cnica anexa a este documento. PRECIO
                            DE PUBLICACI&Oacute;N: $<strong>{{ $datos->precio_contrato }} </strong> incluida la cuota de
                            administraci&oacute;n si aplicara.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEGUNDA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Facultades de LA INMOBILIARIA</strong>: En desarrollo del
                            presente acuerdo <strong>LA INMOBILIARIA</strong> desplegar&aacute; las actividades que
                            considere convenientes para lograr el <strong>arrendamiento</strong> del inmueble descrito, de
                            manera independiente, sin subordinaci&oacute;n o dependencia, utilizando sus propios medios,
                            elementos de trabajo y personal a su cargo.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">TERCERA. Obligaciones de</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>LA INMOBILIARIA</strong>: &nbsp;<strong>LA
                                INMOBILIARIA</strong> se obliga a: 1. Ofrecer el bien inmueble en el valor autorizado por
                            <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> e informar sobre propuestas de interesados en
                            el inmueble. 2. Enviar informe peri&oacute;dico de la gesti&oacute;n comercial realizada. 3.
                            Promover comercialmente el inmueble y/o realizar la administraci&oacute;n del arrendamiento. 4.
                            Una vez arrendado el inmueble, pagar a <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>el d&iacute;a 05 del mes siguiente a la causaci&oacute;n del
                            arrendamiento los c&aacute;nones.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">CUARTA. Obligaciones de EL PROPIETARIO O SU
                                REPRESENTANTE</span></strong><span style="font-size:10px;">: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>se obliga a: 1. Una vez arrendado el inmueble por la
                            gesti&oacute;n de <strong>LA INMOBILIARIA,</strong> pagar a esta los valores correspondientes en
                            relaci&oacute;n con el arrendamiento del inmueble de que trata este acuerdo. 2. Facilitar a
                            <strong>LA INMOBILIARIA</strong> el acceso al inmueble para que pueda exhibirlo en tiempos de
                            respuesta &aacute;giles ante posibles interesados. 3. Facilitar la documentaci&oacute;n e
                            informaci&oacute;n necesaria y real sobre el inmueble propuesto para el arrendamiento. 4. No
                            desconocer los servicios o transacciones inmobiliarias a las que acceda <strong>EL PROPIETARIO O
                                SU REPRESENTANTE&nbsp;</strong>por gesti&oacute;n de <strong>LA INMOBILIARIA</strong>. 5.
                            <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>autoriza desde ya a <strong>LA
                                INMOBILIARIA</strong> a realizar aseo al inmueble cuando encuentre un arrendatario y previo
                            a la entrega con cargo a <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>por valor de
                            <strong>$40.000 + IVA&nbsp;</strong>cuando se trate de un inmueble para vivienda hasta de 100
                            m<span style="color:#202124;background:white;">&sup2; y&nbsp;</span><strong>$60.000 +
                                IVA&nbsp;</strong>cuando se trate de un inmueble para vivienda superior a 100 m<span
                                style="color:#202124;background:white;">&sup2;. Cuando se trate de un inmueble diferente a
                                uso de vivienda se enviar&aacute; previamente cotizaci&oacute;n de acuerdo con lo necesario
                                para realizar dicho aseo.</span></span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">QUINTA. Publicidad</span></strong><span
                            style="font-size:10px;">: <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> autoriza a
                            <strong>LA INMOBILIARIA</strong> a realizar publicidad en internet que considere conveniente
                            <strong>LA INMOBILIARIA</strong>, y se encuentra incluida en los servicios pactados,
                            durar&aacute; mientras el inmueble sea comercializado por <strong>LA INMOBILIARIA</strong>. La
                            publicidad en medios diferentes a los antes mencionados y en caso de requerirse se
                            acordar&aacute; con <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> y este asumir&aacute;
                            dicho valor. <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> no utilizar&aacute;, bajo
                            ning&uacute;n prop&oacute;sito, las fotograf&iacute;as de <strong>LA
                                INMOBILIARIA&nbsp;</strong>o cualquier otro elemento y/o herramienta publicitaria de la
                            misma y reconoce que estas son propiedad de <strong>LA INMOBILIARIA,&nbsp;</strong>a&uacute;n
                            cuando estas hayan sido suministradas por<strong>&nbsp;EL PROPIETARIO O SU
                                REPRESENTANTE</strong>. En beneficio de la gesti&oacute;n adecuada de publicidad, <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> acepta que &uacute;nicamente se fijar&aacute;n
                            avisos en ventana de <strong>LA INMOBILIARIA</strong>, en caso que <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> directamente o a trav&eacute;s de terceros fije avisos en ventana,
                            <strong>LA INMOBILIARIA</strong> se abstendr&aacute; de utilizar los suyos. <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> se compromete a que en caso de comercializar el
                            inmueble directamente o a trav&eacute;s de la gesti&oacute;n realizada por terceros diferentes a
                            <strong>LA INMOBILIARIA</strong>, todos realizar&aacute;n la comercializaci&oacute;n en los
                            mismos t&eacute;rminos de precio y caracter&iacute;sticas.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEXTA. Vigencia del acuerdo</span></strong><span
                            style="font-size:10px;">: Este acuerdo tiene una vigencia de tres (3) meses, contados a partir
                            de su firma, prorrogables por treinta (30) d&iacute;as sucesivos autom&aacute;ticamente a menos
                            que cualquiera de las partes desee darlo por terminado, para lo cual bastar&aacute; una
                            comunicaci&oacute;n escrita dirigida a la otra parte.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">S&Eacute;PTIMA.</span></strong><span
                            style="font-size:10px;">&nbsp;Durante la vigencia del contrato de arrendamiento, <strong>EL
                                PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>reconocer&aacute; a <strong>LA
                                INMOBILIARIA</strong> el <strong>12% + IVA</strong> del <strong><em>canon de arrendamiento +
                                    cuota de administraci&oacute;n de P.H. si aplica</em></strong> pagado mensualmente.
                            <strong>Normas de interpretaci&oacute;n.</strong> Para todos los efectos no previstos en este
                            acuerdo se aplicar&aacute;n las normas del C&oacute;digo de Comercio en especial al
                            art&iacute;culo 1340 y siguientes.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">OCTAVA. EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</span></strong><span style="font-size:10px;">autoriza desde ya la
                            recolecci&oacute;n documental por parte de <strong>LA INMOBILIARIA</strong> al arrendatario que
                            aplique a trav&eacute;s de esta y a firmar contrato de arrendamiento cuando el estudio de
                            arrendamiento de quien aplique sea aprobado. Por tratarse de un contrato consensual y sin
                            perjuicio de la ejecuci&oacute;n del presente acuerdo, en caso que <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> se retracte por cualquier motivo y no haya dado aviso a <strong>LA
                                INMOBILIARIA</strong> a trav&eacute;s del correo electr&oacute;nico
                            acomercial@epicainmobiliaria.com.co antes de que <strong>LA INMOBILIARIA</strong> haya recibido
                            documentos por parte del prospecto arrendatario, <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> se obliga a pagar la suma equivalente a un (1) canon de arrendamiento
                            a <strong>LA INMOBILIARIA</strong>. Sin perjuicio de lo anterior, <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> adem&aacute;s asumir&aacute; la devoluci&oacute;n del dinero pagado
                            por el arrendatario por concepto de estudio de arrendamiento y se har&aacute; responsable de
                            dicho retracto y las sumas de dinero en caso que una o varias entidades competentes condenen el
                            retracto conforme a la legislaci&oacute;n colombiana. <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>no podr&aacute; responsabilizar a <strong>LA
                                INMOBILIARIA&nbsp;</strong>en caso que el retracto sea decisi&oacute;n del
                            arrendatario.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">NOVENA. M&eacute;rito ejecutivo.</span></strong><span
                            style="font-size:10px;">&nbsp;Este acuerdo presta m&eacute;rito ejecutivo para el cobro por los
                            servicios inmobiliarios prestados por <strong>LA INMOBILIARIA</strong> y a los que tiene derecho
                            esta en caso que haya logrado efectivamente el arrendamiento del bien inmueble (incluso si se
                            tratara de la simple presentaci&oacute;n del cliente y/o este llegase a <strong>EL PROPIETARIO O
                                SU REPRESENTANTE&nbsp;</strong>a trav&eacute;s de cualquier mecanismo o herramienta empleada
                            por <strong>LA INMOBILIARIA</strong>) y <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> se
                            niegue a pagarlos. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, <strong>LA
                                INMOBILIARIA</strong> se encontrar&aacute; facultada para reportar un eventual
                            incumplimiento de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> ante cualquier operador de
                            informaci&oacute;n financiera legalmente establecido de conformidad con las leyes de la
                            Rep&uacute;blica de Colombia. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, en caso
                            de desistimiento por parte de <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>dentro del
                            t&eacute;rmino inicial de tres (3) meses en la comercializaci&oacute;n del inmueble, este
                            reconocer&aacute; a <strong>LA INMOBILIARIA</strong> la suma de <strong>$50.000 + IVA</strong>.
                            En dicho caso, estar&aacute; a cargo de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong>
                            recoger la(s) llave(s) en la direcci&oacute;n de <strong>LA INMOBILIARIA</strong> si esta la(s)
                            tuviere. El correo electr&oacute;nico de notificaci&oacute;n de <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> es <strong>{{ $datos->email }} </strong> y el n&uacute;mero de
                            tel&eacute;fono celular de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> es
                            <strong>{{ $datos->phone }} </strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">D&Eacute;CIMA. Cl&aacute;usula
                                compromisoria.</span></strong><span style="font-size:10px;">&nbsp;En caso de conflicto entre
                            las partes, relativo a este acuerdo, su ejecuci&oacute;n y liquidaci&oacute;n, deber&aacute;
                            agotarse en una diligencia de conciliaci&oacute;n ante cualquier entidad autorizada para
                            efectuarla, la cual ser&aacute; pagada por partes iguales.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">En se&ntilde;al de aprobaci&oacute;n y plena validez del presente
                            documento firmo electr&oacute;nicamente de acuerdo con la Ley 527 de 1999 y el Decreto 2364 de
                            2012 en calidad de <strong>PROPIETARIO O SU REPRESENTANTE</strong>.</span>
                    </p>
                </div>
                <div class="row" id="forestta_arr">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">Entre <strong>{{ $datos->name }} {{ $datos->lastname }}
                            </strong>
                            identificaci&oacute;n No. <strong>{{ $datos->doc_number }} </strong> documento de identidad
                            tipo <strong>{{ $datos->desc_tipos_documento }} </strong>, con
                            facultades suficientes para tomar decisiones sobre el arrendamiento del inmueble identificado en
                            este documento, quien en adelante se denominar&aacute; <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong>, y de otra parte <strong>&Eacute;PICA CONSTRUCCIONES S.A.
                                (&Eacute;PICA INMOBILIARIA&reg;)</strong> sociedad debidamente constituida con domicilio
                            principal en la ciudad de Bogot&aacute;, NIT. 900.203.640-0 quien en adelante se
                            denominar&aacute; <strong>LA INMOBILIARIA</strong>, celebran por medio de este documento un
                            acuerdo de<strong>&nbsp;SERVICIOS EN ARRENDAMIENTO</strong> sobre el inmueble en las condiciones
                            que a continuaci&oacute;n se describen:&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">PRIMERA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Objeto del acuerdo</strong>: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> contrata a <strong>LA INMOBILIARIA</strong> para que oferte al
                            p&uacute;blico el bien inmueble identificado as&iacute;:
                            DIRECCI&Oacute;N <strong>{{ $datos->direccion }} {{ $datos->direccion_comp }} </strong>
                            CIUDAD
                            O MUNICIPIO <strong>{{ $datos->ciudad }} </strong> FOLIO DE
                            MATR&Iacute;CULA <strong>{{ $datos->matricula }} </strong>, CHIP
                            <strong>{{ $datos->chip }}
                            </strong>, con las
                            caracter&iacute;sticas que se registran en ficha t&eacute;cnica anexa a este documento. PRECIO
                            DE PUBLICACI&Oacute;N: $<strong>{{ $datos->precio_contrato }} </strong> incluida la cuota de
                            administraci&oacute;n si aplicara.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEGUNDA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Facultades de LA INMOBILIARIA</strong>: En desarrollo del
                            presente acuerdo <strong>LA INMOBILIARIA</strong> desplegar&aacute; las actividades que
                            considere convenientes para lograr el <strong>arrendamiento</strong> del inmueble descrito, de
                            manera independiente, sin subordinaci&oacute;n o dependencia, utilizando sus propios medios,
                            elementos de trabajo y personal a su cargo.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">TERCERA. Obligaciones de</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>LA INMOBILIARIA</strong>: &nbsp;<strong>LA
                                INMOBILIARIA</strong> se obliga a: 1. Ofrecer el bien inmueble en el valor autorizado por
                            <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> e informar sobre propuestas de interesados en
                            el inmueble. 2. Enviar informe peri&oacute;dico de la gesti&oacute;n comercial realizada. 3.
                            Promover comercialmente el inmueble y/o realizar la administraci&oacute;n del arrendamiento. 4.
                            Una vez arrendado el inmueble, pagar a <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>el d&iacute;a 05 del mes siguiente a la causaci&oacute;n del
                            arrendamiento los c&aacute;nones.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">CUARTA. Obligaciones de EL PROPIETARIO O SU
                                REPRESENTANTE</span></strong><span style="font-size:10px;">: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>se obliga a: 1. Una vez arrendado el inmueble por la
                            gesti&oacute;n de <strong>LA INMOBILIARIA,</strong> pagar a esta los valores correspondientes en
                            relaci&oacute;n con el arrendamiento del inmueble de que trata este acuerdo. 2. Facilitar a
                            <strong>LA INMOBILIARIA</strong> el acceso al inmueble para que pueda exhibirlo en tiempos de
                            respuesta &aacute;giles ante posibles interesados. 3. Facilitar la documentaci&oacute;n e
                            informaci&oacute;n necesaria y real sobre el inmueble propuesto para el arrendamiento. 4. No
                            desconocer los servicios o transacciones inmobiliarias a las que acceda <strong>EL PROPIETARIO O
                                SU REPRESENTANTE&nbsp;</strong>por gesti&oacute;n de <strong>LA INMOBILIARIA</strong>. 5.
                            <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>autoriza desde ya a <strong>LA
                                INMOBILIARIA</strong> a realizar aseo al inmueble cuando encuentre un arrendatario con cargo
                            a <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>por valor de <strong>$40.000 +
                                IVA&nbsp;</strong>cuando se trate de un inmueble para vivienda hasta de 100 m<span
                                style="color:#202124;background:white;">&sup2; y&nbsp;</span><strong>$60.000 +
                                IVA&nbsp;</strong>cuando se trate de un inmueble para vivienda superior a 100 m<span
                                style="color:#202124;background:white;">&sup2;. Cuando se trate de un inmueble diferente a
                                uso de vivienda se enviar&aacute; previamente cotizaci&oacute;n de acuerdo con lo necesario
                                para realizar dicho aseo.</span></span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">QUINTA. Publicidad</span></strong><span
                            style="font-size:10px;">: <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> autoriza a
                            <strong>LA INMOBILIARIA</strong> a realizar publicidad en internet que considere conveniente
                            <strong>LA INMOBILIARIA</strong>, y se encuentra incluida en los servicios pactados,
                            durar&aacute; mientras el inmueble sea comercializado por <strong>LA INMOBILIARIA</strong>. La
                            publicidad en medios diferentes a los antes mencionados y en caso de requerirse se
                            acordar&aacute; con <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> y este asumir&aacute;
                            dicho valor. <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> no utilizar&aacute;, bajo
                            ning&uacute;n prop&oacute;sito, las fotograf&iacute;as de <strong>LA
                                INMOBILIARIA&nbsp;</strong>o cualquier otro elemento y/o herramienta publicitaria de la
                            misma y reconoce que estas son propiedad de <strong>LA INMOBILIARIA,&nbsp;</strong>a&uacute;n
                            cuando estas hayan sido suministradas por<strong>&nbsp;EL PROPIETARIO O SU
                                REPRESENTANTE</strong>. En beneficio de la gesti&oacute;n adecuada de publicidad, <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> acepta que &uacute;nicamente se fijar&aacute;n
                            avisos en ventana de <strong>LA INMOBILIARIA</strong>, en caso que <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> directamente o a trav&eacute;s de terceros fije avisos en ventana,
                            <strong>LA INMOBILIARIA</strong> se abstendr&aacute; de utilizar los suyos. <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> se compromete a que en caso de comercializar el
                            inmueble directamente o a trav&eacute;s de la gesti&oacute;n realizada por terceros diferentes a
                            <strong>LA INMOBILIARIA</strong>, todos realizar&aacute;n la comercializaci&oacute;n en los
                            mismos t&eacute;rminos de precio y caracter&iacute;sticas.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEXTA. Vigencia del acuerdo</span></strong><span
                            style="font-size:10px;">: Este acuerdo tiene una vigencia de tres (3) meses, contados a partir
                            de su firma, prorrogables por treinta (30) d&iacute;as sucesivos autom&aacute;ticamente a menos
                            que cualquiera de las partes desee darlo por terminado, para lo cual bastar&aacute; una
                            comunicaci&oacute;n escrita dirigida a la otra parte.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">S&Eacute;PTIMA.</span></strong><span
                            style="font-size:10px;">&nbsp;Durante la vigencia del contrato de arrendamiento, <strong>EL
                                PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>reconocer&aacute; a <strong>LA
                                INMOBILIARIA</strong> el <strong>12,16% + IVA</strong> del <strong><em>canon de
                                    arrendamiento + cuota de administraci&oacute;n de P.H. si aplica</em></strong> pagado
                            mensualmente. <strong>Normas de interpretaci&oacute;n.</strong> Para todos los efectos no
                            previstos en este acuerdo se aplicar&aacute;n las normas del C&oacute;digo de Comercio en
                            especial al art&iacute;culo 1340 y siguientes.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">OCTAVA. EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</span></strong><span style="font-size:10px;">autoriza desde ya la
                            recolecci&oacute;n documental por parte de <strong>LA INMOBILIARIA</strong> al arrendatario que
                            aplique a trav&eacute;s de esta y a firmar contrato de arrendamiento cuando el estudio de
                            arrendamiento de quien aplique sea aprobado. Por tratarse de un contrato consensual y sin
                            perjuicio de la ejecuci&oacute;n del presente acuerdo, en caso que <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> se retracte por cualquier motivo y no haya dado aviso a <strong>LA
                                INMOBILIARIA</strong> a trav&eacute;s del correo electr&oacute;nico
                            acomercial@epicainmobiliaria.com.co antes de que <strong>LA INMOBILIARIA</strong> haya recibido
                            documentos por parte del prospecto arrendatario, <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> se obliga a pagar la suma equivalente a un (1) canon de arrendamiento
                            a <strong>LA INMOBILIARIA</strong>. Sin perjuicio de lo anterior, <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> adem&aacute;s asumir&aacute; la devoluci&oacute;n del dinero pagado
                            por el arrendatario por concepto de estudio de arrendamiento y se har&aacute; responsable de
                            dicho retracto y las sumas de dinero en caso que una o varias entidades competentes condenen el
                            retracto conforme a la legislaci&oacute;n colombiana. <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>no podr&aacute; responsabilizar a <strong>LA
                                INMOBILIARIA&nbsp;</strong>en caso que el retracto sea decisi&oacute;n del
                            arrendatario.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">NOVENA. M&eacute;rito ejecutivo.</span></strong><span
                            style="font-size:10px;">&nbsp;Este acuerdo presta m&eacute;rito ejecutivo para el cobro por los
                            servicios inmobiliarios prestados por <strong>LA INMOBILIARIA</strong> y a los que tiene derecho
                            esta en caso que haya logrado efectivamente el arrendamiento del bien inmueble (incluso si se
                            tratara de la simple presentaci&oacute;n del cliente y/o este llegase a <strong>EL PROPIETARIO O
                                SU REPRESENTANTE&nbsp;</strong>a trav&eacute;s de cualquier mecanismo o herramienta empleada
                            por <strong>LA INMOBILIARIA</strong>) y <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> se
                            niegue a pagarlos. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, <strong>LA
                                INMOBILIARIA</strong> se encontrar&aacute; facultada para reportar un eventual
                            incumplimiento de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> ante cualquier operador de
                            informaci&oacute;n financiera legalmente establecido de conformidad con las leyes de la
                            Rep&uacute;blica de Colombia. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, en caso
                            de desistimiento por parte de <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>dentro del
                            t&eacute;rmino inicial de tres (3) meses en la comercializaci&oacute;n del inmueble, este
                            reconocer&aacute; a <strong>LA INMOBILIARIA</strong> la suma de <strong>$50.000 + IVA</strong>.
                            En dicho caso, estar&aacute; a cargo de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong>
                            recoger la(s) llave(s) en la direcci&oacute;n de <strong>LA INMOBILIARIA</strong> si esta la(s)
                            tuviere. El correo electr&oacute;nico de notificaci&oacute;n de <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> es <strong>{{ $datos->email }} </strong> y el n&uacute;mero de
                            tel&eacute;fono celular de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> es
                            <strong>{{ $datos->phone }} </strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">D&Eacute;CIMA. Cl&aacute;usula
                                compromisoria.</span></strong><span style="font-size:10px;">&nbsp;En caso de conflicto entre
                            las partes, relativo a este acuerdo, su ejecuci&oacute;n y liquidaci&oacute;n, deber&aacute;
                            agotarse en una diligencia de conciliaci&oacute;n ante cualquier entidad autorizada para
                            efectuarla, la cual ser&aacute; pagada por partes iguales.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">En se&ntilde;al de aprobaci&oacute;n y plena validez del presente
                            documento firmo electr&oacute;nicamente de acuerdo con la Ley 527 de 1999 y el Decreto 2364 de
                            2012 en calidad de <strong>PROPIETARIO O SU REPRESENTANTE</strong>.</span>
                    </p>
                </div>
            </div>
            <div id="venta">
                <!-- Titulo-->
                <div class="row" id="titventa">
                    <div class="col-1"></div>
                    <div class="col-10 text-center">
                        <strong>
                            <p style="font-size:14px;">ACUERDO DE COMISIÓN O CORRETAJE VENTA INMUEBLE URBANO</p>
                        </strong>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="row" id="titventa_rural">
                    <div class="col-1"></div>
                    <div class="col-10 text-center">
                        <strong>
                            <p style="font-size:14px;">ACUERDO DE COMISIÓN O CORRETAJE VENTA INMUEBLE RURAL</p>
                        </strong>
                    </div>
                    <div class="col-1"></div>
                </div>
                <!-- Cuerpo-->
                <div class="row" id="basico_ven">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">Entre <strong>{{ $datos->name }} {{ $datos->lastname }}
                            </strong>
                            identificaci&oacute;n No. <strong>{{ $datos->doc_number }} </strong> documento de identidad
                            tipo <strong>{{ $datos->desc_tipos_documento }} </strong>, con
                            facultades suficientes para tomar decisiones sobre la venta del inmueble identificado en este
                            documento, quien en adelante se denominar&aacute; <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong>, y de otra parte <strong>&Eacute;PICA CONSTRUCCIONES S.A.
                                (&Eacute;PICA INMOBILIARIA&reg;)</strong> sociedad debidamente constituida con domicilio
                            principal en la ciudad de Bogot&aacute;, NIT. 900.203.640-0 quien en adelante se
                            denominar&aacute; <strong>LA INMOBILIARIA</strong>, celebran por medio de este documento un
                            acuerdo de<strong>&nbsp;COMISI&Oacute;N O CORRETAJE</strong> sobre el inmueble en las
                            condiciones que a continuaci&oacute;n se describen:&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">PRIMERA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Objeto del acuerdo</strong>: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> contrata a <strong>LA INMOBILIARIA</strong> para que oferte al
                            p&uacute;blico el bien inmueble identificado as&iacute;:
                            DIRECCI&Oacute;N <strong>{{ $datos->direccion }} {{ $datos->direccion_comp }} </strong>
                            CIUDAD
                            O
                            MUNICIPIO <strong>{{ $datos->ciudad }} </strong> FOLIO DE MATR&Iacute;CULA
                            <strong>{{ $datos->matricula }} </strong>,
                            CHIP <strong>{{ $datos->chip }} </strong>, con las caracter&iacute;sticas que se registran en
                            ficha
                            t&eacute;cnica anexa a este documento. PRECIO DE PUBLICACI&Oacute;N:
                            $<strong>{{ $datos->precio_contrato }} </strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEGUNDA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Facultades de LA INMOBILIARIA</strong>: En desarrollo del
                            presente acuerdo <strong>LA INMOBILIARIA</strong> desplegar&aacute; las actividades que
                            considere convenientes para lograr la <strong>venta</strong> del inmueble descrito, de manera
                            independiente, sin subordinaci&oacute;n o dependencia, utilizando sus propios medios, elementos
                            de trabajo y personal a su cargo.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">TERCERA. Obligaciones de</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>LA INMOBILIARIA</strong>: &nbsp;<strong>LA
                                INMOBILIARIA</strong> se obliga a: 1. Ofrecer el bien inmueble en el valor autorizado por
                            <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> e informar sobre propuestas de interesados en
                            el inmueble. 2. Acompa&ntilde;amiento durante la totalidad del proceso y tr&aacute;mite de la
                            venta del inmueble, incluyendo la gesti&oacute;n comercial, la presentaci&oacute;n de
                            potenciales compradores, el proceso de documentos, solicitud, radicaci&oacute;n,
                            elaboraci&oacute;n de promesa de compraventa, diligencias notariales en la Superintendencia de
                            Notariado y Registro. El costo de los tr&aacute;mites ser&aacute; asumido por el comprador y/o
                            vendedor seg&uacute;n corresponda.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">CUARTA. Obligaciones de EL PROPIETARIO O SU
                                REPRESENTANTE</span></strong><span style="font-size:10px;">: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>se obliga a: 1. Pagar a <strong>LA INMOBILIARIA</strong> los
                            valores correspondientes en relaci&oacute;n con la venta del inmueble de que trata este acuerdo.
                            2. Facilitar a <strong>LA INMOBILIARIA</strong> el acceso al inmueble para que pueda exhibirlo
                            en tiempos de respuesta &aacute;giles ante posibles interesados. 3. Facilitar la
                            documentaci&oacute;n e informaci&oacute;n necesaria y real sobre el inmueble propuesto para la
                            venta. 4. No desconocer los servicios o transacciones inmobiliarias a las que acceda <strong>EL
                                PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>por gesti&oacute;n de <strong>LA
                                INMOBILIARIA</strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">QUINTA. Publicidad</span></strong><span
                            style="font-size:10px;">: <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> autoriza a
                            <strong>LA INMOBILIARIA</strong> a realizar publicidad en internet que considere conveniente
                            <strong>LA INMOBILIARIA</strong>, y se encuentra incluida en los servicios pactados,
                            durar&aacute; mientras el inmueble sea comercializado por <strong>LA INMOBILIARIA</strong>. La
                            publicidad en medios diferentes a los antes mencionados y en caso de requerirse se
                            acordar&aacute; con <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> y este asumir&aacute;
                            dicho valor. <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> no utilizar&aacute;, bajo
                            ning&uacute;n prop&oacute;sito, las fotograf&iacute;as de <strong>LA
                                INMOBILIARIA&nbsp;</strong>o cualquier otro elemento y/o herramienta publicitaria de la
                            misma y reconoce que estas son propiedad de <strong>LA INMOBILIARIA,&nbsp;</strong>a&uacute;n
                            cuando estas hayan sido suministradas por<strong>&nbsp;EL PROPIETARIO O SU
                                REPRESENTANTE</strong>. En beneficio de la gesti&oacute;n adecuada de publicidad, <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> acepta que &uacute;nicamente se fijar&aacute;n
                            avisos en ventana de <strong>LA INMOBILIARIA</strong>, en caso que <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> directamente o a trav&eacute;s de terceros fije avisos en ventana,
                            <strong>LA INMOBILIARIA</strong> se abstendr&aacute; de utilizar los suyos. <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> se compromete a que en caso de comercializar el
                            inmueble directamente o a trav&eacute;s de la gesti&oacute;n realizada por terceros diferentes a
                            <strong>LA INMOBILIARIA</strong>, todos realizar&aacute;n la comercializaci&oacute;n en los
                            mismos t&eacute;rminos de precio y caracter&iacute;sticas.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEXTA. Vigencia del acuerdo</span></strong><span
                            style="font-size:10px;">: Este acuerdo tiene una vigencia de tres (3) meses, contados a partir
                            de su firma, prorrogables por treinta (30) d&iacute;as sucesivos autom&aacute;ticamente a menos
                            que cualquiera de las partes desee darlo por terminado, para lo cual bastar&aacute; una
                            comunicaci&oacute;n escrita dirigida a la otra parte.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">S&Eacute;PTIMA. EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</span></strong><span style="font-size:10px;">reconocer&aacute; a
                            <strong>LA INMOBILIARIA</strong> el <strong>2% + IVA</strong> del <strong><em>valor de la
                                    venta.</em></strong> Pagadero en la firma de la promesa de compraventa. <strong>Normas
                                de interpretaci&oacute;n.</strong> Para todos los efectos no previstos en este acuerdo se
                            aplicar&aacute;n las normas del C&oacute;digo de Comercio en especial al art&iacute;culo 1340 y
                            siguientes.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">OCTAVA. M&eacute;rito ejecutivo.</span></strong><span
                            style="font-size:10px;">&nbsp;Este acuerdo presta m&eacute;rito ejecutivo para el cobro de la
                            comisi&oacute;n a que tiene derecho <strong>LA INMOBILIARIA</strong> en caso que haya logrado
                            efectivamente la venta del bien inmueble (incluso si se tratara de la simple presentaci&oacute;n
                            del cliente y/o este llegase a <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>a
                            trav&eacute;s de cualquier mecanismo o herramienta empleada por <strong>LA
                                INMOBILIARIA</strong>) y <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> se niegue a
                            pagarla. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, <strong>LA
                                INMOBILIARIA</strong> se encontrar&aacute; facultada para reportar un eventual
                            incumplimiento de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> ante cualquier operador de
                            informaci&oacute;n financiera legalmente establecido de conformidad con las leyes de la
                            Rep&uacute;blica de Colombia. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, en caso
                            de desistimiento por parte de <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>dentro del
                            t&eacute;rmino inicial de tres (3) meses en la comercializaci&oacute;n del inmueble, este
                            reconocer&aacute; a <strong>LA INMOBILIARIA</strong> la suma de <strong>$50.000 + IVA</strong>.
                            El correo electr&oacute;nico de notificaci&oacute;n de <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> es <strong>{{ $datos->email }} </strong> y el n&uacute;mero de
                            tel&eacute;fono celular de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> es
                            <strong>{{ $datos->phone }} </strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">NOVENA. Cl&aacute;usula compromisoria.</span></strong><span
                            style="font-size:10px;">&nbsp;En caso de conflicto entre las partes, relativo a este acuerdo, su
                            ejecuci&oacute;n y liquidaci&oacute;n, deber&aacute; agotarse en una diligencia de
                            conciliaci&oacute;n ante cualquier entidad autorizada para efectuarla, la cual ser&aacute;
                            pagada por partes iguales.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">En se&ntilde;al de aprobaci&oacute;n y plena validez del presente
                            documento firmo electr&oacute;nicamente de acuerdo con la Ley 527 de 1999 y el Decreto 2364 de
                            2012 en calidad de <strong>PROPIETARIO O SU REPRESENTANTE</strong>.</span>
                    </p>
                </div>
                <div class="row" id="estandar_ven">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">Entre <strong>{{ $datos->name }} {{ $datos->lastname }}
                            </strong>
                            identificaci&oacute;n No. <strong>{{ $datos->doc_number }} </strong> documento de identidad
                            tipo <strong>{{ $datos->desc_tipos_documento }} </strong>, con
                            facultades suficientes para tomar decisiones sobre la venta del inmueble identificado en este
                            documento, quien en adelante se denominar&aacute; <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong>, y de otra parte <strong>&Eacute;PICA CONSTRUCCIONES S.A.
                                (&Eacute;PICA INMOBILIARIA&reg;)</strong> sociedad debidamente constituida con domicilio
                            principal en la ciudad de Bogot&aacute;, NIT. 900.203.640-0 quien en adelante se
                            denominar&aacute; <strong>LA INMOBILIARIA</strong>, celebran por medio de este documento un
                            acuerdo de<strong>&nbsp;COMISI&Oacute;N O CORRETAJE</strong> sobre el inmueble en las
                            condiciones que a continuaci&oacute;n se describen:&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">PRIMERA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Objeto del acuerdo</strong>: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> contrata a <strong>LA INMOBILIARIA</strong> para que oferte al
                            p&uacute;blico el bien inmueble identificado as&iacute;:
                            DIRECCI&Oacute;N <strong>{{ $datos->direccion }} {{ $datos->direccion_comp }} </strong>
                            CIUDAD
                            O
                            MUNICIPIO <strong>{{ $datos->ciudad }} </strong> FOLIO DE MATR&Iacute;CULA
                            <strong>{{ $datos->matricula }} </strong>,
                            CHIP <strong>{{ $datos->chip }} </strong>, con las caracter&iacute;sticas que se registran en
                            ficha
                            t&eacute;cnica anexa a este documento. PRECIO DE PUBLICACI&Oacute;N:
                            $<strong>{{ $datos->precio_contrato }} </strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEGUNDA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Facultades de LA INMOBILIARIA</strong>: En desarrollo del
                            presente acuerdo <strong>LA INMOBILIARIA</strong> desplegar&aacute; las actividades que
                            considere convenientes para lograr la <strong>venta</strong> del inmueble descrito, de manera
                            independiente, sin subordinaci&oacute;n o dependencia, utilizando sus propios medios, elementos
                            de trabajo y personal a su cargo.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">TERCERA. Obligaciones de</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>LA INMOBILIARIA</strong>: &nbsp;<strong>LA
                                INMOBILIARIA</strong> se obliga a: 1. Ofrecer el bien inmueble en el valor autorizado por
                            <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> e informar sobre propuestas de interesados en
                            el inmueble. 2. Enviar informe peri&oacute;dico de la gesti&oacute;n comercial realizada. 3.
                            Acompa&ntilde;amiento durante la totalidad del proceso y tr&aacute;mite de la venta del
                            inmueble, incluyendo la gesti&oacute;n comercial, la presentaci&oacute;n de potenciales
                            compradores, el proceso de documentos, solicitud, radicaci&oacute;n, elaboraci&oacute;n de
                            promesa de compraventa, diligencias notariales en la Superintendencia de Notariado y Registro.
                            El costo de los tr&aacute;mites ser&aacute; asumido por el comprador y/o vendedor seg&uacute;n
                            corresponda.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">CUARTA. Obligaciones de EL PROPIETARIO O SU
                                REPRESENTANTE</span></strong><span style="font-size:10px;">: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>se obliga a: 1. Pagar a <strong>LA INMOBILIARIA</strong> los
                            valores correspondientes en relaci&oacute;n con la venta del inmueble de que trata este acuerdo.
                            2. Facilitar a <strong>LA INMOBILIARIA</strong> el acceso al inmueble para que pueda exhibirlo
                            en tiempos de respuesta &aacute;giles ante posibles interesados. 3. Facilitar la
                            documentaci&oacute;n e informaci&oacute;n necesaria y real sobre el inmueble propuesto para la
                            venta. 4. No desconocer los servicios o transacciones inmobiliarias a las que acceda <strong>EL
                                PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>por gesti&oacute;n de <strong>LA
                                INMOBILIARIA</strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">QUINTA. Publicidad</span></strong><span
                            style="font-size:10px;">: <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> autoriza a
                            <strong>LA INMOBILIARIA</strong> a realizar publicidad en internet que considere conveniente
                            <strong>LA INMOBILIARIA</strong>, y se encuentra incluida en los servicios pactados,
                            durar&aacute; mientras el inmueble sea comercializado por <strong>LA INMOBILIARIA</strong>. La
                            publicidad en medios diferentes a los antes mencionados y en caso de requerirse se
                            acordar&aacute; con <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> y este asumir&aacute;
                            dicho valor. <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> no utilizar&aacute;, bajo
                            ning&uacute;n prop&oacute;sito, las fotograf&iacute;as de <strong>LA
                                INMOBILIARIA&nbsp;</strong>o cualquier otro elemento y/o herramienta publicitaria de la
                            misma y reconoce que estas son propiedad de <strong>LA INMOBILIARIA,&nbsp;</strong>a&uacute;n
                            cuando estas hayan sido suministradas por<strong>&nbsp;EL PROPIETARIO O SU
                                REPRESENTANTE</strong>. En beneficio de la gesti&oacute;n adecuada de publicidad, <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> acepta que &uacute;nicamente se fijar&aacute;n
                            avisos en ventana de <strong>LA INMOBILIARIA</strong>, en caso que <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> directamente o a trav&eacute;s de terceros fije avisos en ventana,
                            <strong>LA INMOBILIARIA</strong> se abstendr&aacute; de utilizar los suyos. <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> se compromete a que en caso de comercializar el
                            inmueble directamente o a trav&eacute;s de la gesti&oacute;n realizada por terceros diferentes a
                            <strong>LA INMOBILIARIA</strong>, todos realizar&aacute;n la comercializaci&oacute;n en los
                            mismos t&eacute;rminos de precio y caracter&iacute;sticas.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEXTA. Vigencia del acuerdo</span></strong><span
                            style="font-size:10px;">: Este acuerdo tiene una vigencia de tres (3) meses, contados a partir
                            de su firma, prorrogables por treinta (30) d&iacute;as sucesivos autom&aacute;ticamente a menos
                            que cualquiera de las partes desee darlo por terminado, para lo cual bastar&aacute; una
                            comunicaci&oacute;n escrita dirigida a la otra parte.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">S&Eacute;PTIMA. EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</span></strong><span style="font-size:10px;">reconocer&aacute; a
                            <strong>LA INMOBILIARIA</strong> el <strong>3% + IVA</strong> del <strong><em>valor de la
                                    venta.</em></strong> 50% pagadero en la firma de la promesa de compraventa y 50%
                            pagadero en la firma de la escritura. <strong>Normas de interpretaci&oacute;n.</strong> Para
                            todos los efectos no previstos en este acuerdo se aplicar&aacute;n las normas del C&oacute;digo
                            de Comercio en especial al art&iacute;culo 1340 y siguientes.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">OCTAVA. M&eacute;rito ejecutivo.</span></strong><span
                            style="font-size:10px;">&nbsp;Este acuerdo presta m&eacute;rito ejecutivo para el cobro de la
                            comisi&oacute;n a que tiene derecho <strong>LA INMOBILIARIA</strong> en caso que haya logrado
                            efectivamente la venta del bien inmueble (incluso si se tratara de la simple presentaci&oacute;n
                            del cliente y/o este llegase a <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>a
                            trav&eacute;s de cualquier mecanismo o herramienta empleada por <strong>LA
                                INMOBILIARIA</strong>) y <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> se niegue a
                            pagarla. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, <strong>LA
                                INMOBILIARIA</strong> se encontrar&aacute; facultada para reportar un eventual
                            incumplimiento de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> ante cualquier operador de
                            informaci&oacute;n financiera legalmente establecido de conformidad con las leyes de la
                            Rep&uacute;blica de Colombia. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, en caso
                            de desistimiento por parte de <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>dentro del
                            t&eacute;rmino inicial de tres (3) meses en la comercializaci&oacute;n del inmueble, este
                            reconocer&aacute; a <strong>LA INMOBILIARIA</strong> la suma de <strong>$50.000 + IVA</strong>.
                            El correo electr&oacute;nico de notificaci&oacute;n de <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> es <strong>{{ $datos->email }} </strong> y el n&uacute;mero de
                            tel&eacute;fono celular de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> es
                            <strong>{{ $datos->phone }} </strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">NOVENA. Cl&aacute;usula compromisoria.</span></strong><span
                            style="font-size:10px;">&nbsp;En caso de conflicto entre las partes, relativo a este acuerdo, su
                            ejecuci&oacute;n y liquidaci&oacute;n, deber&aacute; agotarse en una diligencia de
                            conciliaci&oacute;n ante cualquier entidad autorizada para efectuarla, la cual ser&aacute;
                            pagada por partes iguales.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">En se&ntilde;al de aprobaci&oacute;n y plena validez del presente
                            documento firmo electr&oacute;nicamente de acuerdo con la Ley 527 de 1999 y el Decreto 2364 de
                            2012 en calidad de <strong>PROPIETARIO O SU REPRESENTANTE</strong>.</span>
                    </p>
                </div>
                <div class="row" id="premium_ven">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">Entre <strong>{{ $datos->name }} {{ $datos->lastname }}
                            </strong>
                            identificaci&oacute;n No. <strong>{{ $datos->doc_number }} </strong> documento de identidad
                            tipo <strong>{{ $datos->desc_tipos_documento }} </strong>, con
                            facultades suficientes para tomar decisiones sobre la venta del inmueble identificado en este
                            documento, quien en adelante se denominar&aacute; <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong>, y de otra parte <strong>&Eacute;PICA CONSTRUCCIONES S.A.
                                (&Eacute;PICA INMOBILIARIA&reg;)</strong> sociedad debidamente constituida con domicilio
                            principal en la ciudad de Bogot&aacute;, NIT. 900.203.640-0 quien en adelante se
                            denominar&aacute; <strong>LA INMOBILIARIA</strong>, celebran por medio de este documento un
                            acuerdo de<strong>&nbsp;COMISI&Oacute;N O CORRETAJE</strong> sobre el inmueble en las
                            condiciones que a continuaci&oacute;n se describen:&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">PRIMERA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Objeto del acuerdo</strong>: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> contrata a <strong>LA INMOBILIARIA</strong> para que oferte al
                            p&uacute;blico el bien inmueble identificado as&iacute;:
                            DIRECCI&Oacute;N <strong>{{ $datos->direccion }} {{ $datos->direccion_comp }} </strong>
                            CIUDAD
                            O
                            MUNICIPIO <strong>{{ $datos->ciudad }} </strong> FOLIO DE MATR&Iacute;CULA
                            <strong>{{ $datos->matricula }} </strong>,
                            CHIP <strong>{{ $datos->chip }} </strong>, con las caracter&iacute;sticas que se registran en
                            ficha
                            t&eacute;cnica anexa a este documento. PRECIO DE PUBLICACI&Oacute;N:
                            $<strong>{{ $datos->precio_contrato }} </strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEGUNDA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Facultades de LA INMOBILIARIA</strong>: En desarrollo del
                            presente acuerdo <strong>LA INMOBILIARIA</strong> desplegar&aacute; las actividades que
                            considere convenientes para lograr la <strong>venta</strong> del inmueble descrito, de manera
                            independiente, sin subordinaci&oacute;n o dependencia, utilizando sus propios medios, elementos
                            de trabajo y personal a su cargo.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">TERCERA. Obligaciones de</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>LA INMOBILIARIA</strong>: &nbsp;<strong>LA
                                INMOBILIARIA</strong> se obliga a: 1. Ofrecer el bien inmueble en el valor autorizado por
                            <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> e informar sobre propuestas de interesados en
                            el inmueble. 2. Enviar informe peri&oacute;dico de la gesti&oacute;n comercial realizada. 3.
                            Acompa&ntilde;amiento durante la totalidad del proceso y tr&aacute;mite de la venta del
                            inmueble, incluyendo la gesti&oacute;n comercial, la presentaci&oacute;n de potenciales
                            compradores, el proceso de documentos, solicitud, radicaci&oacute;n, elaboraci&oacute;n de
                            promesa de compraventa, diligencias notariales en la Superintendencia de Notariado y Registro.
                            El costo de los tr&aacute;mites ser&aacute; asumido por el comprador y/o vendedor seg&uacute;n
                            corresponda.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">CUARTA. Obligaciones de EL PROPIETARIO O SU
                                REPRESENTANTE</span></strong><span style="font-size:10px;">: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>se obliga a: 1. Pagar a <strong>LA INMOBILIARIA</strong> los
                            valores correspondientes en relaci&oacute;n con la venta del inmueble de que trata este acuerdo.
                            2. Facilitar a <strong>LA INMOBILIARIA</strong> el acceso al inmueble para que pueda exhibirlo
                            en tiempos de respuesta &aacute;giles ante posibles interesados. 3. Facilitar la
                            documentaci&oacute;n e informaci&oacute;n necesaria y real sobre el inmueble propuesto para la
                            venta. 4. No desconocer los servicios o transacciones inmobiliarias a las que acceda <strong>EL
                                PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>por gesti&oacute;n de <strong>LA
                                INMOBILIARIA</strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">QUINTA. Publicidad</span></strong><span
                            style="font-size:10px;">: <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> autoriza a
                            <strong>LA INMOBILIARIA</strong> a realizar publicidad en internet que considere conveniente
                            <strong>LA INMOBILIARIA</strong>, y se encuentra incluida en los servicios pactados,
                            durar&aacute; mientras el inmueble sea comercializado por <strong>LA INMOBILIARIA</strong>. La
                            publicidad en medios diferentes a los antes mencionados y en caso de requerirse se
                            acordar&aacute; con <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> y este asumir&aacute;
                            dicho valor. <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> no utilizar&aacute;, bajo
                            ning&uacute;n prop&oacute;sito, las fotograf&iacute;as de <strong>LA
                                INMOBILIARIA&nbsp;</strong>o cualquier otro elemento y/o herramienta publicitaria de la
                            misma y reconoce que estas son propiedad de <strong>LA INMOBILIARIA,&nbsp;</strong>a&uacute;n
                            cuando estas hayan sido suministradas por<strong>&nbsp;EL PROPIETARIO O SU
                                REPRESENTANTE</strong>. En beneficio de la gesti&oacute;n adecuada de publicidad, <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> acepta que &uacute;nicamente se fijar&aacute;n
                            avisos en ventana de <strong>LA INMOBILIARIA</strong>, en caso que <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> directamente o a trav&eacute;s de terceros fije avisos en ventana,
                            <strong>LA INMOBILIARIA</strong> se abstendr&aacute; de utilizar los suyos. <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> se compromete a que en caso de comercializar el
                            inmueble directamente o a trav&eacute;s de la gesti&oacute;n realizada por terceros diferentes a
                            <strong>LA INMOBILIARIA</strong>, todos realizar&aacute;n la comercializaci&oacute;n en los
                            mismos t&eacute;rminos de precio y caracter&iacute;sticas.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEXTA. Vigencia del acuerdo</span></strong><span
                            style="font-size:10px;">: Este acuerdo tiene una vigencia de tres (3) meses, contados a partir
                            de su firma, prorrogables por treinta (30) d&iacute;as sucesivos autom&aacute;ticamente a menos
                            que cualquiera de las partes desee darlo por terminado, para lo cual bastar&aacute; una
                            comunicaci&oacute;n escrita dirigida a la otra parte.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">S&Eacute;PTIMA. EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</span></strong><span style="font-size:10px;">reconocer&aacute; a
                            <strong>LA INMOBILIARIA</strong> el <strong>4% + IVA</strong> del <strong><em>valor de la
                                    venta.</em></strong> 50% pagadero en la firma de la promesa de compraventa y 50%
                            pagadero en la firma de la escritura. <strong>Normas de interpretaci&oacute;n.</strong> Para
                            todos los efectos no previstos en este acuerdo se aplicar&aacute;n las normas del C&oacute;digo
                            de Comercio en especial al art&iacute;culo 1340 y siguientes.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">OCTAVA. M&eacute;rito ejecutivo.</span></strong><span
                            style="font-size:10px;">&nbsp;Este acuerdo presta m&eacute;rito ejecutivo para el cobro de la
                            comisi&oacute;n a que tiene derecho <strong>LA INMOBILIARIA</strong> en caso que haya logrado
                            efectivamente la venta del bien inmueble (incluso si se tratara de la simple presentaci&oacute;n
                            del cliente y/o este llegase a <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>a
                            trav&eacute;s de cualquier mecanismo o herramienta empleada por <strong>LA
                                INMOBILIARIA</strong>) y <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> se niegue a
                            pagarla. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, <strong>LA
                                INMOBILIARIA</strong> se encontrar&aacute; facultada para reportar un eventual
                            incumplimiento de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> ante cualquier operador de
                            informaci&oacute;n financiera legalmente establecido de conformidad con las leyes de la
                            Rep&uacute;blica de Colombia. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, en caso
                            de desistimiento por parte de <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>dentro del
                            t&eacute;rmino inicial de tres (3) meses en la comercializaci&oacute;n del inmueble, este
                            reconocer&aacute; a <strong>LA INMOBILIARIA</strong> la suma de <strong>$50.000 + IVA</strong>.
                            El correo electr&oacute;nico de notificaci&oacute;n de <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> es <strong>{{ $datos->email }} </strong> y el n&uacute;mero de
                            tel&eacute;fono celular de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> es
                            <strong>{{ $datos->phone }} </strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">NOVENA. Cl&aacute;usula compromisoria.</span></strong><span
                            style="font-size:10px;">&nbsp;En caso de conflicto entre las partes, relativo a este acuerdo, su
                            ejecuci&oacute;n y liquidaci&oacute;n, deber&aacute; agotarse en una diligencia de
                            conciliaci&oacute;n ante cualquier entidad autorizada para efectuarla, la cual ser&aacute;
                            pagada por partes iguales.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">En se&ntilde;al de aprobaci&oacute;n y plena validez del presente
                            documento firmo electr&oacute;nicamente de acuerdo con la Ley 527 de 1999 y el Decreto 2364 de
                            2012 en calidad de <strong>PROPIETARIO O SU REPRESENTANTE</strong>.</span>
                    </p>
                </div>
                <div class="row" id="rural_ven">
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">Entre <strong>{{ $datos->name }} {{ $datos->lastname }}
                            </strong>
                            identificaci&oacute;n No. <strong>{{ $datos->doc_number }} </strong> documento de identidad
                            tipo <strong>{{ $datos->desc_tipos_documento }} </strong>, con
                            facultades suficientes para tomar decisiones sobre la venta del inmueble identificado en este
                            documento, quien en adelante se denominar&aacute; <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong>, y de otra parte <strong>&Eacute;PICA CONSTRUCCIONES S.A.
                                (&Eacute;PICA INMOBILIARIA&reg;)</strong> sociedad debidamente constituida con domicilio
                            principal en la ciudad de Bogot&aacute;, NIT. 900.203.640-0 quien en adelante se
                            denominar&aacute; <strong>LA INMOBILIARIA</strong>, celebran por medio de este documento un
                            acuerdo de<strong>&nbsp;COMISI&Oacute;N O CORRETAJE</strong> sobre el inmueble en las
                            condiciones que a continuaci&oacute;n se describen:&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">PRIMERA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Objeto del acuerdo</strong>: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> contrata a <strong>LA INMOBILIARIA</strong> para que oferte al
                            p&uacute;blico el bien inmueble identificado as&iacute;:
                            DIRECCI&Oacute;N <strong>{{ $datos->direccion }} {{ $datos->direccion_comp }} </strong>
                            CIUDAD
                            O
                            MUNICIPIO <strong>{{ $datos->ciudad }} </strong> FOLIO DE MATR&Iacute;CULA
                            <strong>{{ $datos->matricula }} </strong>, con
                            las caracter&iacute;sticas que se registran en ficha t&eacute;cnica anexa a este documento.
                            PRECIO DE PUBLICACI&Oacute;N: $<strong>{{ $datos->precio_contrato }} </strong></span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEGUNDA.</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>Facultades de LA INMOBILIARIA</strong>: En desarrollo del
                            presente acuerdo <strong>LA INMOBILIARIA</strong> desplegar&aacute; las actividades que
                            considere convenientes para lograr la <strong>venta</strong> del inmueble descrito, de manera
                            independiente, sin subordinaci&oacute;n o dependencia, utilizando sus propios medios, elementos
                            de trabajo y personal a su cargo. &nbsp;<strong>EL PROPIETARIO O SU REPRESENTANTE</strong> no
                            utilizar&aacute;, bajo ning&uacute;n prop&oacute;sito, las fotograf&iacute;as de <strong>LA
                                INMOBILIARIA&nbsp;</strong>o cualquier otro elemento de la misma y reconoce que estas son
                            propiedad de <strong>LA INMOBILIARIA</strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">TERCERA. Obligaciones de</span></strong><span
                            style="font-size:10px;">&nbsp;<strong>LA INMOBILIARIA</strong>: &nbsp;<strong>LA
                                INMOBILIARIA</strong> se obliga a: 1. Ofrecer el bien inmueble en el valor autorizado por
                            <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> e informar sobre propuestas de interesados en
                            el inmueble 2. Enviar informe peri&oacute;dico de la gesti&oacute;n comercial realizada. 3.
                            Acompa&ntilde;amiento durante la totalidad del proceso y tr&aacute;mite de la venta del
                            inmueble, incluyendo la gesti&oacute;n comercial, la presentaci&oacute;n de potenciales
                            compradores, el proceso de documentos, solicitud, radicaci&oacute;n, elaboraci&oacute;n de
                            promesa de compraventa, diligencias notariales en la Superintendencia de Notariado y Registro.
                            El costo de los tr&aacute;mites ser&aacute; asumido por el comprador y/o vendedor seg&uacute;n
                            corresponda.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">CUARTA. Obligaciones de EL PROPIETARIO O SU
                                REPRESENTANTE</span></strong><span style="font-size:10px;">: <strong>EL PROPIETARIO O SU
                                REPRESENTANTE&nbsp;</strong>se obliga a: 1. Pagar a <strong>LA INMOBILIARIA</strong> en la
                            firma de la promesa de compraventa el <strong>cinco por ciento (5%) m&aacute;s IVA</strong> por
                            comisi&oacute;n en la venta del inmueble de que trata este acuerdo sobre el valor efectivo de la
                            venta. 2. Facilitar a <strong>LA INMOBILIARIA</strong> el acceso al inmueble para que pueda
                            exhibirlo en tiempos de respuesta &aacute;giles ante posibles interesados. 3. Facilitar la
                            documentaci&oacute;n e informaci&oacute;n necesaria y real sobre el inmueble propuesto para la
                            venta 4. No desconocer los servicios o transacciones inmobiliarias a las que acceda <strong>EL
                                PROPIETARIO O SU REPRESENTA&nbsp;</strong>por gesti&oacute;n de <strong>LA
                                INMOBILIARIA</strong>.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">QUINTA. Publicidad</span></strong><span
                            style="font-size:10px;">: <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> autoriza a
                            <strong>LA INMOBILIARIA</strong> a realizar publicidad en su p&aacute;gina web, en los portales
                            y redes sociales que considere convenientes <strong>LA INMOBILIARIA</strong>, negocios en red
                            con inmobiliarios e inmobiliarias aliadas, avisos en ventana. La publicidad aqu&iacute;
                            mencionada se encuentra incluida en la comisi&oacute;n pactada, y durar&aacute; mientras el
                            inmueble sea comercializado por <strong>LA INMOBILIARIA</strong>. La publicidad en medios
                            diferentes a los antes mencionados y en caso de requerirse se acordar&aacute; con <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> y este asumir&aacute; dicho valor. En beneficio de
                            la gesti&oacute;n adecuada de publicidad, <strong>EL PROPIETARIO O SU REPRESENTANTE</strong>
                            acepta que &uacute;nicamente se fijar&aacute;n avisos en ventana de <strong>LA
                                INMOBILIARIA</strong>, en caso que <strong>EL PROPIETARIO O SU REPRESENTANTE</strong>
                            directamente o a trav&eacute;s de terceros fije avisos en ventana, <strong>LA
                                INMOBILIARIA</strong> se abstendr&aacute; de utilizar los suyos. <strong>EL PROPIETARIO O SU
                                REPRESENTANTE</strong> se compromete a que en caso de comercializar el inmueble directamente
                            o a trav&eacute;s de la gesti&oacute;n realizada por terceros diferentes a <strong>LA
                                INMOBILIARIA</strong>, todos realizar&aacute;n la comercializaci&oacute;n en los mismos
                            t&eacute;rminos de precio y caracter&iacute;sticas.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">SEXTA. Vigencia del acuerdo</span></strong><span
                            style="font-size:10px;">: Este acuerdo tiene una vigencia de tres (3) meses, contados a partir
                            de su firma, prorrogables por treinta (30) d&iacute;as sucesivos autom&aacute;ticamente a menos
                            que cualquiera de las partes desee darlo por terminado, para lo cual bastar&aacute; con una
                            comunicaci&oacute;n escrita dirigida a la otra parte.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">S&Eacute;PTIMA. Normas de
                                interpretaci&oacute;n.</span></strong><span style="font-size:10px;">&nbsp;Para todos los
                            efectos no previstos en este acuerdo se aplicar&aacute;n las normas del C&oacute;digo de
                            Comercio en especial al art&iacute;culo 1340 y siguientes.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">OCTAVA. M&eacute;rito ejecutivo.</span></strong><span
                            style="font-size:10px;">&nbsp;Este acuerdo presta m&eacute;rito ejecutivo para el cobro de la
                            comisi&oacute;n a que tiene derecho <strong>LA INMOBILIARIA</strong> en caso que haya logrado
                            efectivamente la venta del bien inmueble (incluso si se tratara de la simple presentaci&oacute;n
                            del cliente y/o este llegase a <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>a
                            trav&eacute;s de cualquier mecanismo o herramienta empleada por <strong>LA
                                INMOBILIARIA</strong>) y <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> se niegue a
                            pagarla. Sin perjuicio de la ejecuci&oacute;n del presente acuerdo, <strong>LA
                                INMOBILIARIA</strong> se encontrar&aacute; facultada para reportar un eventual
                            incumplimiento de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong> ante cualquier operador de
                            informaci&oacute;n financiera legalmente establecido de conformidad con las leyes de la
                            Rep&uacute;blica de Colombia. Correo electr&oacute;nico de notificaci&oacute;n de <strong>EL
                                PROPIETARIO O SU REPRESENTANTE</strong> <strong>{{ $datos->email }} </strong> y
                            n&uacute;mero de tel&eacute;fono celular de <strong>EL PROPIETARIO O SU REPRESENTANTE</strong>
                            <strong>{{ $datos->phone }} </strong>. Sin perjuicio de la ejecuci&oacute;n del presente
                            acuerdo, en caso de
                            desistimiento por parte de <strong>EL PROPIETARIO O SU REPRESENTANTE&nbsp;</strong>dentro del
                            t&eacute;rmino inicial de tres (3) meses en la comercializaci&oacute;n del inmueble, este
                            reconocer&aacute; a <strong>LA INMOBILIARIA</strong> la suma de <strong>$50.000 +
                                IVA</strong>.&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <strong><span style="font-size:10px;">NOVENA. Cl&aacute;usula compromisoria.</span></strong><span
                            style="font-size:10px;">&nbsp;En caso de conflicto entre las partes, relativo a este acuerdo, su
                            ejecuci&oacute;n y liquidaci&oacute;n, deber&aacute; agotarse en una diligencia de
                            conciliaci&oacute;n ante cualquier entidad autorizada para efectuarla, la cual ser&aacute;
                            pagada por partes iguales.</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">&nbsp;</span>
                    </p>
                    <p
                        style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:10px;font-family:"Calibri",sans-serif;text-align:justify;'>
                        <span style="font-size:10px;">En se&ntilde;al de aprobaci&oacute;n y plena validez del presente
                            documento firmo electr&oacute;nicamente de acuerdo con la Ley 527 de 1999 y el Decreto 2364 de
                            2012 en calidad de <strong>PROPIETARIO O SU REPRESENTANTE</strong>.</span>
                    </p>
                </div>
            </div>
        </div>
        <div id="salto_contrato">
            <div class="pagebreak"></div>
            <div class="separador d-none d-print-block"></div>
        </div>
        <div id="cpvj">
            <!-- Titulo-->
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 mb-3 text-center rayita_down rounded-bottom">
                    <h6>Concepto de precio y viabilidad jurídica</h6>
                </div>
            </div>
            <!-- mapa-->
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
            <!-- concepto-->
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
            <!-- Ficha téc-->
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
                                <div class="col-4"><small
                                        class="fw-bold">{{ $datos->estado }}</small><br>
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
                                <b>Importante: </b>Este concepto se ha basado en la revisión del certificado aportado, no es
                                un estudio de títulos.
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
                    @if ($datos->horizontal == 'Si')
                        <div class="pagebreak"> </div>
                        <div class="separador d-none d-print-block"></div>
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
                <input type="text" name="tipo_neg" id="tipo_neg" value="{{ $datos->tipo_negocio }}">
            </div>
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
