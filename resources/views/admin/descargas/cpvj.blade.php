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
        {{ Form::open(['method' => 'post', 'route' => 'administrador.irformatos']) }}
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
                        <small class="fw-light fst-italic">N?? matricula</small>
                    </div>
                </div>
                <div class="row mt-1 interior">
                    <div class="col-4">
                        <input id="barrio_catastral_edit" name="barrio_catastral_edit" type="text" class="form-control"
                            value="{{ $datos->barrio_catastral }}" required>
                        <small class="fw-light fst-italic">Barrio catastral</small>
                    </div>
                    <div class="col-4">
                        <input id="upz_edit" name="upz_edit" type="text" class="form-control"
                            value="{{ $datos->upz }}" required>
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
                        {!! Form::select('conc_juridico_edit', $conc_juridico, $datos->id_concjuridico, [
                            'class' => 'form-select',
                            'required' => 'required',
                            'id' => 'conc_juridico_edit',
                        ]) !!}
                        <small class="fw-light fst-italic">Concepto jur??dico</small>
                    </div>
                    <div class="col-4">
                        <input id="obs_conc_juridico_edit" name="obs_conc_juridico_edit" type="text" class="form-control"
                            value="{{ $datos->obs_conc_juridico }}" required>
                        <small class="fw-light fst-italic">Obs. concepto jur??dico</small>
                    </div>
                    <div class="col-4">
                        <input id="precio_contrato_edit" name="precio_contrato_edit" type="text" class="form-control"
                            value="{{ $datos->precio_contrato }}" required>
                        <small class="fw-light fst-italic">Precio contrato</small>
                    </div>
                </div>
                <div class="row mt-1 interior">
                    <div class="col-4">
                        <input type="number" name="latitud" id="latitud" value="{{ $datos->latitud }}"
                            step=".000000000000001" required>
                        <small class="fw-light fst-italic">Latitud</small>
                    </div>
                    <div class="col-4">
                        <input type="number" name="longitud" id="longitud" value="{{ $datos->longitud }}"
                            step=".0000000000000001" required>
                        <small class="fw-light fst-italic">Longitud</small>
                    </div>
                    <div class="col-4 text-center pt-1">
                        <button type="submit" class="btn shadow-sm">Guardar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10 pie">
                        <input type="text" class="d-none" name="codineg" id="codineg" value="{{ $codineg }}">
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
        <!-- Contratos-->
        <div id="contrato" class="contrato">
            <div id="arriendo">
                <!-- Titulo-->
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10 text-center titulo" id="titarr">
                        <p>ACUERDO SOBRE SERVICIOS EN ARRENDAMIENTO DE INMUEBLE</p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <!-- Cuerpo-->
                <div class="row texto" id="basico_arr">
                    <p>Entre <b class="variable">{{ $datos->name }} {{ $datos->lastname }}</b> identificaci??n
                        No. <b class="variable">{{ $datos->doc_number }}</b>
                        documento de identidad tipo <b class="variable">{{ $datos->desc_tipos_documento }}</b>, con
                        facultades suficientes para
                        tomar decisiones sobre el arrendamiento del inmueble identificado en este documento, quien en
                        adelante se
                        denominar?? <b>EL PROPIETARIO O SU REPRESENTANTE</b>, y de otra parte <b>??PICA CONSTRUCCIONES S.A.
                            (??PICA INMOBILIARIA??)</b> sociedad debidamente constituida con domicilio principal en la ciudad
                        de Bogot??, NIT. 900.203.640-0 quien en adelante se denominar?? <b>LA INMOBILIARIA</b>, celebran por
                        medio de este documento un acuerdo de<b> SERVICIOS EN ARRENDAMIENTO</b> sobre el inmueble en las
                        condiciones que a continuaci??n se describen:
                    </p>

                    <p><b>PRIMERA.</b> <b>Objeto del acuerdo</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b> contrata a <b>LA
                            INMOBILIARIA</b> para que oferte al p??blico el bien inmueble identificado as??: DIRECCI??N
                        <b class="variable">{{ $datos->direccion }} {{ $datos->direccion_comp }}</b>
                        CIUDAD O MUNICIPIO <b class="variable">{{ $datos->ciudad }}</b>
                        FOLIO DE
                        MATR??CULA <b class="variable">{{ $datos->matricula }}</b>

                        , CHIP <b class="variable">{{ $datos->chip }}</b>
                        , con las caracter??sticas que se
                        registran en ficha t??cnica anexa a este documento. PRECIO DE PUBLICACI??N:
                        $<b class="variable">{{ $datos->precio_contrato }}</b>
                        incluida la cuota de administraci??n si aplicara.
                    </p>

                    <p><b>SEGUNDA.</b> <b>Facultades de LA INMOBILIARIA</b>: En desarrollo del presente acuerdo <b>LA
                            INMOBILIARIA</b> desplegar?? las actividades que considere convenientes para lograr el
                        <b>arrendamiento</b> del inmueble descrito, de manera independiente, sin subordinaci??n o
                        dependencia, utilizando sus propios medios, elementos de trabajo y personal a su cargo.
                    </p>

                    <p><b>TERCERA. Obligaciones de</b> <b>LA INMOBILIARIA</b>: <b>LA INMOBILIARIA</b> se obliga a: 1.
                        Ofrecer el bien inmueble en el valor autorizado por <b>EL PROPIETARIO O SU REPRESENTANTE</b> e
                        informar sobre propuestas de interesados en el inmueble. 2. Promover comercialmente el inmueble y/o
                        realizar la administraci??n del arrendamiento. 3. Una vez arrendado el inmueble, pagar a <b>EL
                            PROPIETARIO O SU REPRESENTANTE </b>el d??a 05 del mes siguiente a la causaci??n del arrendamiento
                        los c??nones.</p>

                    <p><b>CUARTA. Obligaciones de EL PROPIETARIO O SU REPRESENTANTE</b>: <b>EL PROPIETARIO O SU
                            REPRESENTANTE </b>se obliga a: 1. Una vez arrendado el inmueble por la gesti??n de <b>LA
                            INMOBILIARIA,</b> pagar a esta los valores correspondientes en relaci??n con el arrendamiento del
                        inmueble de que trata este acuerdo. 2. Facilitar a <b>LA INMOBILIARIA</b> el acceso al inmueble para
                        que pueda exhibirlo en tiempos de respuesta ??giles ante posibles interesados. 3. Facilitar la
                        documentaci??n e informaci??n necesaria y real sobre el inmueble propuesto para el arrendamiento. 4.
                        No desconocer los servicios o transacciones inmobiliarias a las que acceda <b>EL PROPIETARIO O SU
                            REPRESENTANTE </b>por gesti??n de <b>LA INMOBILIARIA</b>. 5. <b>EL PROPIETARIO O SU REPRESENTANTE
                        </b>autoriza desde ya a <b>LA INMOBILIARIA</b> a realizar aseo al inmueble cuando encuentre un
                        arrendatario y previo a la entrega con cargo a <b>EL PROPIETARIO O SU REPRESENTANTE </b>por valor de
                        <b>$70.000 </b>cuando se trate de un inmueble para vivienda de hasta 150 m??. Cuando se trate de un
                        inmueble con ??rea superior a 150 m??, o diferente a uso de vivienda se enviar?? previamente cotizaci??n
                        de acuerdo con lo necesario para realizar dicho aseo.
                    </p>

                    <p><b>QUINTA. Publicidad</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b>
                        autoriza a <b>LA INMOBILIARIA</b> a realizar publicidad en internet que considere conveniente <b>LA
                            INMOBILIARIA,</b> y se encuentra incluida en los servicios pactados, durar?? mientras el inmueble
                        sea comercializado por <b>LA INMOBILIARIA</b>. La publicidad en medios diferentes a los antes
                        mencionados y en caso de requerirse se acordar?? con <b>EL PROPIETARIO O SU REPRESENTANTE</b> y este
                        asumir?? dicho valor. <b>EL PROPIETARIO O SU REPRESENTANTE</b> suministrar?? las fotograf??as del
                        inmueble a <b>LA INMOBILIARIA </b>y estas pasar??n a ser propiedad de <b>LA INMOBILIARIA</b>, a??n as??
                        <b>LA INMOBILIARIA</b> podr?? abstenerse del uso de las mismas si considera que no cumplen con los
                        est??ndares requeridos. <b>EL PROPIETARIO O SU REPRESENTANTE</b> se abstendr?? de utilizar los
                        elementos y/o herramientas empleadas por <b>LA INMOBILIARIA</b> para realizar publicidad. <b>EL
                            PROPIETARIO O SU REPRESENTANTE</b> se compromete a que en caso de comercializar el inmueble
                        directamente o a trav??s de la gesti??n realizada por terceros diferentes a <b>LA INMOBILIARIA</b>,
                        todos realizar??n la comercializaci??n en los mismos t??rminos de precio y caracter??sticas.
                    </p>

                    <p><b>SEXTA. Vigencia del acuerdo</b>: Este acuerdo tiene una vigencia de tres (3) meses, contados a
                        partir de su firma, prorrogables por treinta (30) d??as sucesivos autom??ticamente a menos que
                        cualquiera de las partes desee darlo por terminado, para lo cual bastar?? una comunicaci??n escrita
                        dirigida a la otra parte.</p>

                    <p><b>S??PTIMA.</b> Durante la vigencia del contrato de arrendamiento, <b>EL PROPIETARIO O SU
                            REPRESENTANTE </b>reconocer?? a <b>LA INMOBILIARIA</b> el <b>8% + IVA</b> del <b><i>canon de
                                arrendamiento + cuota de administraci??n de P.H. si aplica</i></b> pagado mensualmente.
                        <b>Normas de interpretaci??n.</b> Para todos los efectos no previstos en este acuerdo se aplicar??n
                        las normas del C??digo de Comercio en especial al art??culo 1340 y siguientes.
                    </p>

                    <p><b>OCTAVA. EL PROPIETARIO O SU REPRESENTANTE </b>autoriza desde ya y sin necesidad de aviso la
                        recolecci??n documental por parte de <b>LA INMOBILIARIA</b> al arrendatario que aplique a trav??s de
                        esta y a firmar contrato de arrendamiento cuando el estudio de arrendamiento de quien aplique sea
                        aprobado. Por tratarse de un contrato consensual y sin perjuicio de la ejecuci??n del presente
                        acuerdo, en caso que <b>EL PROPIETARIO O SU REPRESENTANTE</b> se retracte por cualquier motivo y no
                        haya dado aviso a <b>LA INMOBILIARIA</b> a trav??s del correo electr??nico
                        acomercial@epicainmobiliaria.com.co antes de que <b>LA INMOBILIARIA</b> haya recibido documentos por
                        parte del prospecto arrendatario, <b>EL PROPIETARIO O SU REPRESENTANTE</b> se obliga a pagar la suma
                        equivalente a un (1) canon de arrendamiento a <b>LA INMOBILIARIA</b>. Sin perjuicio de lo anterior,
                        <b>EL PROPIETARIO O SU REPRESENTANTE</b> adem??s asumir?? la devoluci??n del dinero pagado por el
                        arrendatario por concepto de estudio de arrendamiento y se har?? responsable de dicho retracto y las
                        sumas de dinero en caso que una o varias entidades competentes condenen el retracto conforme a la
                        legislaci??n colombiana. <b>EL PROPIETARIO O SU REPRESENTANTE </b>no podr?? responsabilizar a <b>LA
                            INMOBILIARIA </b>en caso que el retracto sea decisi??n del arrendatario.
                    </p>

                    <p><b>NOVENA. M??rito ejecutivo.</b> Este acuerdo presta m??rito ejecutivo para el cobro por los servicios
                        inmobiliarios prestados por <b>LA INMOBILIARIA</b> y a los que tiene derecho esta en caso que haya
                        logrado efectivamente el arrendamiento del bien inmueble (incluso si se tratara de la simple
                        presentaci??n del cliente y/o este llegase a <b>EL PROPIETARIO O SU REPRESENTANTE </b>a trav??s de
                        cualquier mecanismo o herramienta empleada por <b>LA INMOBILIARIA</b>) y <b>EL PROPIETARIO O SU
                            REPRESENTANTE</b> se niegue a pagarlos. Sin perjuicio de la ejecuci??n del presente acuerdo,
                        <b>LA INMOBILIARIA</b> se encontrar?? facultada para reportar un incumplimiento de <b>EL PROPIETARIO
                            O SU REPRESENTANTE</b> ante cualquier operador de informaci??n financiera legalmente establecido
                        de conformidad con las leyes de la Rep??blica de Colombia. Sin perjuicio de la ejecuci??n del presente
                        acuerdo, en caso de terminaci??n o del simple aviso de terminaci??n futura por parte de <b>EL
                            PROPIETARIO O SU REPRESENTANTE </b>dentro del t??rmino inicial de tres (3) meses en la
                        comercializaci??n del inmueble, este reconocer?? a <b>LA INMOBILIARIA</b> la suma de <b>$50.000 +
                            IVA</b>. En dicho caso, estar?? a cargo de <b>EL PROPIETARIO O SU REPRESENTANTE</b> recoger la(s)
                        llave(s) en la direcci??n de <b>LA INMOBILIARIA</b> si esta la(s) tuviere. El correo electr??nico de
                        notificaci??n de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es <b
                            class="variable">{{ $datos->email }}</b>

                        y el n??mero de tel??fono celular de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es
                        <b class="variable">{{ $datos->full_number }}</b>.
                    </p>

                    <p><b>D??CIMA. Cl??usula compromisoria.</b> En caso de conflicto entre las partes, relativo a este
                        acuerdo, su ejecuci??n y liquidaci??n, deber?? agotarse en una diligencia de conciliaci??n ante
                        cualquier entidad autorizada para efectuarla, la cual ser?? pagada por partes iguales.</p>
                    <br>
                    <br>
                    <p>En se??al de aprobaci??n y plena validez del presente documento firmo electr??nicamente de acuerdo con
                        la Ley 527 de 1999 y el Decreto 2364 de 2012 en calidad de <b>PROPIETARIO O SU REPRESENTANTE</b>.
                    </p>

                </div>
                <div class="row texto" id="estandar_arr">
                    <p>Entre <b class="variable">{{ $datos->name }} {{ $datos->lastname }}</b>
                        identificaci??n No. <b class="variable">{{ $datos->doc_number }}</b> documento de identidad
                        tipo <b class="variable">{{ $datos->desc_tipos_documento }}</b>, con facultades suficientes
                        para tomar
                        decisiones sobre el arrendamiento del inmueble identificado en este documento, quien en adelante se
                        denominar?? <b>EL PROPIETARIO O SU REPRESENTANTE</b>, y de otra parte <b>??PICA CONSTRUCCIONES S.A.
                            (??PICA INMOBILIARIA??)</b> sociedad debidamente constituida con domicilio principal en la ciudad
                        de Bogot??, NIT. 900.203.640-0 quien en adelante se denominar?? <b>LA INMOBILIARIA</b>, celebran por
                        medio de este documento un acuerdo de<b> SERVICIOS EN ARRENDAMIENTO</b> sobre el inmueble en las
                        condiciones que a continuaci??n se describen: </p>

                    <p><b>PRIMERA.</b> <b>Objeto del acuerdo</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b> contrata a <b>LA
                            INMOBILIARIA</b> para que oferte al p??blico el bien inmueble identificado as??: DIRECCI??N
                        <b class="variable">{{ $datos->direccion }} {{ $datos->direccion_comp }}</b> CIUDAD O
                        MUNICIPIO <b class="variable">{{ $datos->ciudad }}</b> FOLIO DE
                        MATR??CULA <b class="variable">{{ $datos->matricula }}</b>, CHIP <b
                            class="variable">{{ $datos->chip }}</b>
                        , con las caracter??sticas que se
                        registran en ficha t??cnica anexa a este documento. PRECIO DE PUBLICACI??N:
                        $<b class="variable">{{ $datos->precio_contrato }}</b>
                        incluida la cuota de administraci??n si aplicara.
                    </p>

                    <p><b>SEGUNDA.</b> <b>Facultades de LA INMOBILIARIA</b>: En desarrollo del presente acuerdo <b>LA
                            INMOBILIARIA</b> desplegar?? las actividades que considere convenientes para lograr el
                        <b>arrendamiento</b> del inmueble descrito, de manera independiente, sin subordinaci??n o
                        dependencia, utilizando sus propios medios, elementos de trabajo y personal a su cargo.
                    </p>

                    <p><b>TERCERA. Obligaciones de</b> <b>LA INMOBILIARIA</b>: <b>LA INMOBILIARIA</b> se obliga a: 1.
                        Ofrecer el bien inmueble en el valor autorizado por <b>EL PROPIETARIO O SU REPRESENTANTE</b> e
                        informar sobre propuestas de interesados en el inmueble. 2. Enviar informe peri??dico de la gesti??n
                        comercial realizada. 3. Promover comercialmente el inmueble y/o realizar la administraci??n del
                        arrendamiento. 4. Una vez arrendado el inmueble, pagar a <b>EL PROPIETARIO O SU REPRESENTANTE </b>el
                        d??a 05 del mes siguiente a la causaci??n del arrendamiento los c??nones.</p>

                    <p><b>CUARTA. Obligaciones de EL PROPIETARIO O SU REPRESENTANTE</b>: <b>EL PROPIETARIO O SU
                            REPRESENTANTE </b>se obliga a: 1. Una vez arrendado el inmueble por la gesti??n de <b>LA
                            INMOBILIARIA,</b> pagar a esta los valores correspondientes en relaci??n con el arrendamiento del
                        inmueble de que trata este acuerdo. 2. Facilitar a <b>LA INMOBILIARIA</b> el acceso al inmueble para
                        que pueda exhibirlo en tiempos de respuesta ??giles ante posibles interesados. 3. Facilitar la
                        documentaci??n e informaci??n necesaria y real sobre el inmueble propuesto para el arrendamiento. 4.
                        No desconocer los servicios o transacciones inmobiliarias a las que acceda <b>EL PROPIETARIO O SU
                            REPRESENTANTE </b>por gesti??n de <b>LA INMOBILIARIA</b>. 5. <b>EL PROPIETARIO O SU REPRESENTANTE
                        </b>autoriza desde ya a <b>LA INMOBILIARIA</b> a realizar aseo al inmueble cuando encuentre un
                        arrendatario y previo a la entrega con cargo a <b>EL PROPIETARIO O SU REPRESENTANTE </b>por valor de
                        <b>$70.000 </b>cuando se trate de un inmueble para vivienda de hasta 150 m??. Cuando se trate de un
                        inmueble con ??rea superior a 150 m??, o diferente a uso de vivienda se enviar?? previamente cotizaci??n
                        de acuerdo con lo necesario para realizar dicho aseo.
                    </p>

                    <p><b>QUINTA. Publicidad</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b>
                        autoriza a <b>LA INMOBILIARIA</b> a realizar publicidad en internet que considere conveniente <b>LA
                            INMOBILIARIA</b>, y se encuentra incluida en los servicios pactados, durar?? mientras el inmueble
                        sea comercializado por <b>LA INMOBILIARIA</b>. La publicidad en medios diferentes a los antes
                        mencionados y en caso de requerirse se acordar?? con <b>EL PROPIETARIO O SU REPRESENTANTE</b> y este
                        asumir?? dicho valor. <b>EL PROPIETARIO O SU REPRESENTANTE</b> no utilizar??, bajo ning??n prop??sito,
                        las fotograf??as de <b>LA INMOBILIARIA </b>o cualquier otro elemento y/o herramienta publicitaria de
                        la misma y reconoce que estas son propiedad de <b>LA INMOBILIARIA, </b>a??n cuando estas hayan sido
                        suministradas por<b> EL PROPIETARIO O SU REPRESENTANTE</b>. En beneficio de la gesti??n adecuada de
                        publicidad, <b>EL PROPIETARIO O SU REPRESENTANTE</b> acepta que ??nicamente se fijar??n avisos en
                        ventana de <b>LA INMOBILIARIA</b>, en caso que <b>EL PROPIETARIO O SU REPRESENTANTE</b> directamente
                        o a trav??s de terceros fije avisos en ventana, <b>LA INMOBILIARIA</b> se abstendr?? de utilizar los
                        suyos. <b>EL PROPIETARIO O SU REPRESENTANTE</b> se compromete a que en caso de comercializar el
                        inmueble directamente o a trav??s de la gesti??n realizada por terceros diferentes a <b>LA
                            INMOBILIARIA</b>, todos realizar??n la comercializaci??n en los mismos t??rminos de precio y
                        caracter??sticas.</p>

                    <p><b>SEXTA. Vigencia del acuerdo</b>: Este acuerdo tiene una vigencia de tres (3) meses, contados a
                        partir de su firma, prorrogables por treinta (30) d??as sucesivos autom??ticamente a menos que
                        cualquiera de las partes desee darlo por terminado, para lo cual bastar?? una comunicaci??n escrita
                        dirigida a la otra parte.</p>

                    <p><b>S??PTIMA.</b> Durante la vigencia del contrato de arrendamiento, <b>EL PROPIETARIO O SU
                            REPRESENTANTE </b>reconocer?? a <b>LA INMOBILIARIA</b> el <b>10% + IVA</b> del <b><i>canon de
                                arrendamiento + cuota de administraci??n de P.H. si aplica</i></b> pagado mensualmente.
                        <b>Normas de interpretaci??n.</b> Para todos los efectos no previstos en este acuerdo se aplicar??n
                        las normas del C??digo de Comercio en especial al art??culo 1340 y siguientes.
                    </p>

                    <p><b>OCTAVA. EL PROPIETARIO O SU REPRESENTANTE </b>autoriza desde ya y sin necesidad de aviso la
                        recolecci??n documental por parte de <b>LA INMOBILIARIA</b> al arrendatario que aplique a trav??s de
                        esta y a firmar contrato de arrendamiento cuando el estudio de arrendamiento de quien aplique sea
                        aprobado. Por tratarse de un contrato consensual y sin perjuicio de la ejecuci??n del presente
                        acuerdo, en caso que <b>EL PROPIETARIO O SU REPRESENTANTE</b> se retracte por cualquier motivo y no
                        haya dado aviso a <b>LA INMOBILIARIA</b> a trav??s del correo electr??nico
                        acomercial@epicainmobiliaria.com.co antes de que <b>LA INMOBILIARIA</b> haya recibido documentos por
                        parte del prospecto arrendatario, <b>EL PROPIETARIO O SU REPRESENTANTE</b> se obliga a pagar la suma
                        equivalente a un (1) canon de arrendamiento a <b>LA INMOBILIARIA</b>. Sin perjuicio de lo anterior,
                        <b>EL PROPIETARIO O SU REPRESENTANTE</b> adem??s asumir?? la devoluci??n del dinero pagado por el
                        arrendatario por concepto de estudio de arrendamiento y se har?? responsable de dicho retracto y las
                        sumas de dinero en caso que una o varias entidades competentes condenen el retracto conforme a la
                        legislaci??n colombiana. <b>EL PROPIETARIO O SU REPRESENTANTE </b>no podr?? responsabilizar a <b>LA
                            INMOBILIARIA </b>en caso que el retracto sea decisi??n del arrendatario.
                    </p>

                    <p><b>NOVENA. M??rito ejecutivo.</b> Este acuerdo presta m??rito ejecutivo para el cobro por los servicios
                        inmobiliarios prestados por <b>LA INMOBILIARIA</b> y a los que tiene derecho esta en caso que haya
                        logrado efectivamente el arrendamiento del bien inmueble (incluso si se tratara de la simple
                        presentaci??n del cliente y/o este llegase a <b>EL PROPIETARIO O SU REPRESENTANTE </b>a trav??s de
                        cualquier mecanismo o herramienta empleada por <b>LA INMOBILIARIA</b>) y <b>EL PROPIETARIO O SU
                            REPRESENTANTE</b> se niegue a pagarlos. Sin perjuicio de la ejecuci??n del presente acuerdo,
                        <b>LA INMOBILIARIA</b> se encontrar?? facultada para reportar un incumplimiento de <b>EL PROPIETARIO
                            O SU REPRESENTANTE</b> ante cualquier operador de informaci??n financiera legalmente establecido
                        de conformidad con las leyes de la Rep??blica de Colombia. Sin perjuicio de la ejecuci??n del presente
                        acuerdo, en caso de terminaci??n o del simple aviso de terminaci??n futura por parte de <b>EL
                            PROPIETARIO O SU REPRESENTANTE </b>dentro del t??rmino inicial de tres (3) meses en la
                        comercializaci??n del inmueble, este reconocer?? a <b>LA INMOBILIARIA</b> la suma de <b>$50.000 +
                            IVA</b>. En dicho caso, estar?? a cargo de <b>EL PROPIETARIO O SU REPRESENTANTE</b> recoger la(s)
                        llave(s) en la direcci??n de <b>LA INMOBILIARIA</b> si esta la(s) tuviere. El correo electr??nico de
                        notificaci??n de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es <b
                            class="variable">{{ $datos->email }}</b>

                        y el n??mero de tel??fono celular de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es
                        <b class="variable">{{ $datos->full_number }}</b>.
                    </p>

                    <p><b>D??CIMA. Cl??usula compromisoria.</b> En caso de conflicto entre las partes, relativo a este
                        acuerdo, su ejecuci??n y liquidaci??n, deber?? agotarse en una diligencia de conciliaci??n ante
                        cualquier entidad autorizada para efectuarla, la cual ser?? pagada por partes iguales.</p>
                    <br>
                    <br>
                    <p>En se??al de aprobaci??n y plena validez del presente documento firmo electr??nicamente de acuerdo con
                        la Ley 527 de 1999 y el Decreto 2364 de 2012 en calidad de <b>PROPIETARIO O SU REPRESENTANTE</b>.
                    </p>

                </div>
                <div class="row texto" id="premium_arr">
                    <p>Entre <b class="variable">{{ $datos->name }} {{ $datos->lastname }}</b>
                        identificaci??n No.
                        <b class="variable">{{ $datos->doc_number }}</b> documento de identidad tipo <b
                            class="variable">{{ $datos->desc_tipos_documento }}</b>
                        , con facultades suficientes para tomar
                        decisiones sobre el arrendamiento del inmueble identificado en este documento, quien en adelante se
                        denominar?? <b>EL PROPIETARIO O SU REPRESENTANTE</b>, y de otra parte <b>??PICA CONSTRUCCIONES S.A.
                            (??PICA INMOBILIARIA??)</b> sociedad debidamente constituida con domicilio principal en la ciudad
                        de Bogot??, NIT. 900.203.640-0 quien en adelante se denominar?? <b>LA INMOBILIARIA</b>, celebran por
                        medio de este documento un acuerdo de<b> SERVICIOS EN ARRENDAMIENTO</b> sobre el inmueble en las
                        condiciones que a continuaci??n se describen:
                    </p>

                    <p><b>PRIMERA.</b> <b>Objeto del acuerdo</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b> contrata a <b>LA
                            INMOBILIARIA</b> para que oferte al p??blico el bien inmueble identificado as??: DIRECCI??N
                        <b class="variable">{{ $datos->direccion }} {{ $datos->direccion_comp }}</b>
                        CIUDAD O MUNICIPIO <b class="variable">{{ $datos->ciudad }}</b>
                        FOLIO DE
                        MATR??CULA <b class="variable">{{ $datos->matricula }}</b>
                        , CHIP <b class="variable">{{ $datos->chip }}</b>
                        , con las caracter??sticas que se
                        registran en ficha t??cnica anexa a este documento. PRECIO DE PUBLICACI??N:
                        $<b class="variable">{{ $datos->precio_contrato }}</b>
                        incluida la cuota de administraci??n si aplicara.
                    </p>

                    <p><b>SEGUNDA.</b> <b>Facultades de LA INMOBILIARIA</b>: En desarrollo del presente acuerdo <b>LA
                            INMOBILIARIA</b> desplegar?? las actividades que considere convenientes para lograr el
                        <b>arrendamiento</b> del inmueble descrito, de manera independiente, sin subordinaci??n o
                        dependencia, utilizando sus propios medios, elementos de trabajo y personal a su cargo.
                    </p>

                    <p><b>TERCERA. Obligaciones de</b> <b>LA INMOBILIARIA</b>: <b>LA INMOBILIARIA</b> se obliga a: 1.
                        Ofrecer el bien inmueble en el valor autorizado por <b>EL PROPIETARIO O SU REPRESENTANTE</b> e
                        informar sobre propuestas de interesados en el inmueble. 2. Enviar informe peri??dico de la gesti??n
                        comercial realizada. 3. Promover comercialmente el inmueble y/o realizar la administraci??n del
                        arrendamiento. 4. Una vez arrendado el inmueble, pagar a <b>EL PROPIETARIO O SU REPRESENTANTE </b>el
                        d??a 05 del mes siguiente a la causaci??n del arrendamiento los c??nones.</p>

                    <p><b>CUARTA. Obligaciones de EL PROPIETARIO O SU REPRESENTANTE</b>: <b>EL PROPIETARIO O SU
                            REPRESENTANTE </b>se obliga a: 1. Una vez arrendado el inmueble por la gesti??n de <b>LA
                            INMOBILIARIA,</b> pagar a esta los valores correspondientes en relaci??n con el arrendamiento del
                        inmueble de que trata este acuerdo. 2. Facilitar a <b>LA INMOBILIARIA</b> el acceso al inmueble para
                        que pueda exhibirlo en tiempos de respuesta ??giles ante posibles interesados. 3. Facilitar la
                        documentaci??n e informaci??n necesaria y real sobre el inmueble propuesto para el arrendamiento. 4.
                        No desconocer los servicios o transacciones inmobiliarias a las que acceda <b>EL PROPIETARIO O SU
                            REPRESENTANTE </b>por gesti??n de <b>LA INMOBILIARIA</b>. 5. <b>EL PROPIETARIO O SU REPRESENTANTE
                        </b>autoriza desde ya a <b>LA INMOBILIARIA</b> a realizar aseo al inmueble cuando encuentre un
                        arrendatario y previo a la entrega con cargo a <b>EL PROPIETARIO O SU REPRESENTANTE </b>por valor de
                        <b>$70.000 </b>cuando se trate de un inmueble para vivienda de hasta 150 m??. Cuando se trate de un
                        inmueble con ??rea superior a 150 m??, o diferente a uso de vivienda se enviar?? previamente cotizaci??n
                        de acuerdo con lo necesario para realizar dicho aseo.
                    </p>

                    <p><b>QUINTA. Publicidad</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b> autoriza a <b>LA INMOBILIARIA</b>
                        a realizar publicidad en internet que considere conveniente <b>LA INMOBILIARIA</b>, y se encuentra
                        incluida en los servicios pactados, durar?? mientras el inmueble sea comercializado por <b>LA
                            INMOBILIARIA</b>. La publicidad en medios diferentes a los antes mencionados y en caso de
                        requerirse se acordar?? con <b>EL PROPIETARIO O SU REPRESENTANTE</b> y este asumir?? dicho valor.
                        <b>EL PROPIETARIO O SU REPRESENTANTE</b> no utilizar??, bajo ning??n prop??sito, las fotograf??as de
                        <b>LA INMOBILIARIA </b>o cualquier otro elemento y/o herramienta publicitaria de la misma y reconoce
                        que estas son propiedad de <b>LA INMOBILIARIA, </b>a??n cuando estas hayan sido suministradas por<b>
                            EL PROPIETARIO O SU REPRESENTANTE</b>. En beneficio de la gesti??n adecuada de publicidad, <b>EL
                            PROPIETARIO O SU REPRESENTANTE</b> acepta que ??nicamente se fijar??n avisos en ventana de <b>LA
                            INMOBILIARIA</b>, en caso que <b>EL PROPIETARIO O SU REPRESENTANTE</b> directamente o a trav??s
                        de terceros fije avisos en ventana, <b>LA INMOBILIARIA</b> se abstendr?? de utilizar los suyos. <b>EL
                            PROPIETARIO O SU REPRESENTANTE</b> se compromete a que en caso de comercializar el inmueble
                        directamente o a trav??s de la gesti??n realizada por terceros diferentes a <b>LA INMOBILIARIA</b>,
                        todos realizar??n la comercializaci??n en los mismos t??rminos de precio y caracter??sticas.
                    </p>

                    <p><b>SEXTA. Vigencia del acuerdo</b>: Este acuerdo tiene una vigencia de tres (3) meses, contados a
                        partir de su firma, prorrogables por treinta (30) d??as sucesivos autom??ticamente a menos que
                        cualquiera de las partes desee darlo por terminado, para lo cual bastar?? una comunicaci??n escrita
                        dirigida a la otra parte.</p>

                    <p><b>S??PTIMA.</b> Durante la vigencia del contrato de arrendamiento, <b>EL PROPIETARIO O SU
                            REPRESENTANTE </b>reconocer?? a <b>LA INMOBILIARIA</b> el <b>10% + IVA</b> del <b><i>canon de
                                arrendamiento + cuota de administraci??n de P.H. si aplica</i></b> pagado mensualmente.
                        <b>Normas de interpretaci??n.</b> Para todos los efectos no previstos en este acuerdo se aplicar??n
                        las normas del C??digo de Comercio en especial al art??culo 1340 y siguientes.
                    </p>

                    <p><b>OCTAVA. EL PROPIETARIO O SU REPRESENTANTE </b>autoriza desde ya y sin necesidad de aviso la
                        recolecci??n documental por parte de <b>LA INMOBILIARIA</b> al arrendatario que aplique a trav??s de
                        esta y a firmar contrato de arrendamiento cuando el estudio de arrendamiento de quien aplique sea
                        aprobado. Por tratarse de un contrato consensual y sin perjuicio de la ejecuci??n del presente
                        acuerdo, en caso que <b>EL PROPIETARIO O SU REPRESENTANTE</b> se retracte por cualquier motivo y no
                        haya dado aviso a <b>LA INMOBILIARIA</b> a trav??s del correo electr??nico
                        acomercial@epicainmobiliaria.com.co antes de que <b>LA INMOBILIARIA</b> haya recibido documentos por
                        parte del prospecto arrendatario, <b>EL PROPIETARIO O SU REPRESENTANTE</b> se obliga a pagar la suma
                        equivalente a un (1) canon de arrendamiento a <b>LA INMOBILIARIA</b>. Sin perjuicio de lo anterior,
                        <b>EL PROPIETARIO O SU REPRESENTANTE</b> adem??s asumir?? la devoluci??n del dinero pagado por el
                        arrendatario por concepto de estudio de arrendamiento y se har?? responsable de dicho retracto y las
                        sumas de dinero en caso que una o varias entidades competentes condenen el retracto conforme a la
                        legislaci??n colombiana. <b>EL PROPIETARIO O SU REPRESENTANTE </b>no podr?? responsabilizar a <b>LA
                            INMOBILIARIA </b>en caso que el retracto sea decisi??n del arrendatario.
                    </p>

                    <p><b>NOVENA. M??rito ejecutivo.</b> Este acuerdo presta m??rito ejecutivo para el cobro por los servicios
                        inmobiliarios prestados por <b>LA INMOBILIARIA</b> y a los que tiene derecho esta en caso que haya
                        logrado efectivamente el arrendamiento del bien inmueble (incluso si se tratara de la simple
                        presentaci??n del cliente y/o este llegase a <b>EL PROPIETARIO O SU REPRESENTANTE </b>a trav??s de
                        cualquier mecanismo o herramienta empleada por <b>LA INMOBILIARIA</b>) y <b>EL PROPIETARIO O SU
                            REPRESENTANTE</b> se niegue a pagarlos. Sin perjuicio de la ejecuci??n del presente acuerdo,
                        <b>LA INMOBILIARIA</b> se encontrar?? facultada para reportar un incumplimiento de <b>EL PROPIETARIO
                            O SU REPRESENTANTE</b> ante cualquier operador de informaci??n financiera legalmente establecido
                        de conformidad con las leyes de la Rep??blica de Colombia. Sin perjuicio de la ejecuci??n del presente
                        acuerdo, en caso de terminaci??n o del simple aviso de terminaci??n futura por parte de <b>EL
                            PROPIETARIO O SU REPRESENTANTE </b>dentro del t??rmino inicial de tres (3) meses en la
                        comercializaci??n del inmueble, este reconocer?? a <b>LA INMOBILIARIA</b> la suma de <b>$50.000 +
                            IVA</b>. En dicho caso, estar?? a cargo de <b>EL PROPIETARIO O SU REPRESENTANTE</b> recoger la(s)
                        llave(s) en la direcci??n de <b>LA INMOBILIARIA</b> si esta la(s) tuviere. El correo electr??nico de
                        notificaci??n de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es <b
                            class="variable">{{ $datos->email }}</b>
                        y el n??mero de tel??fono celular de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es
                        <b class="variable">{{ $datos->full_number }}</b>.
                    </p>

                    <p><b>D??CIMA. Cl??usula compromisoria.</b> En caso de conflicto entre las partes, relativo a este
                        acuerdo, su ejecuci??n y liquidaci??n, deber?? agotarse en una diligencia de conciliaci??n ante
                        cualquier entidad autorizada para efectuarla, la cual ser?? pagada por partes iguales.</p>
                    <br>
                    <br>
                    <p>En se??al de aprobaci??n y plena validez del presente documento firmo electr??nicamente de acuerdo con
                        la Ley 527 de 1999 y el Decreto 2364 de 2012 en calidad de <b>PROPIETARIO O SU REPRESENTANTE</b>.
                    </p>

                </div>
            </div>
            <div id="venta">
                <!-- Titulo-->
                <div class="row titulo" id="titventa">
                    <div class="col-1"></div>
                    <div class="col-10 text-center">
                        <p>ACUERDO DE COMISI??N O CORRETAJE VENTA INMUEBLE URBANO</p>
                    </div>
                    <div class="col-1"></div>
                </div>
                <!-- Cuerpo-->
                <div class="row texto" id="basico_ven">
                    <p>Entre <b class="variable">{{ $datos->name }} {{ $datos->lastname }}</b> identificaci??n
                        No.
                        <b class="variable">{{ $datos->doc_number }}</b>
                        documento de identidad tipo <b class="variable">{{ $datos->desc_tipos_documento }}</b>,
                        con facultades suficientes para tomar
                        decisiones sobre la venta del inmueble identificado en este documento, quien en adelante se
                        denominar?? <b>EL PROPIETARIO O SU REPRESENTANTE</b>, y de otra parte <b>??PICA CONSTRUCCIONES S.A.
                            (??PICA INMOBILIARIA??)</b> sociedad debidamente constituida con domicilio principal en la ciudad
                        de Bogot??, NIT. 900.203.640-0 quien en adelante se denominar?? <b>LA INMOBILIARIA</b>, celebran por
                        medio de este documento un acuerdo de<b> COMISI??N O CORRETAJE</b> sobre el inmueble en las
                        condiciones que a continuaci??n se describen:
                    </p>

                    <p><b>PRIMERA.</b> <b>Objeto del acuerdo</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b> contrata a <b>LA
                            INMOBILIARIA</b> para que oferte al p??blico el bien inmueble identificado as??:
                        DIRECCI??N <b class="variable">{{ $datos->direccion }} {{ $datos->direccion_comp }}</b>
                        CIUDAD O
                        MUNICIPIO <b class="variable">{{ $datos->ciudad }}</b>
                        FOLIO DE MATR??CULA <b class="variable">{{ $datos->matricula }}</b>
                        ,
                        CHIP <b class="variable">{{ $datos->chip }}</b>, con las caracter??sticas que se registran
                        en ficha t??cnica anexa a este
                        documento. PRECIO DE PUBLICACI??N: $<b class="variable">{{ $datos->precio_contrato }}</b>
                        .</p>

                    <p><b>SEGUNDA.</b> <b>Facultades de LA INMOBILIARIA</b>: En desarrollo del presente acuerdo <b>LA
                            INMOBILIARIA</b> desplegar?? las actividades que considere convenientes para lograr la
                        <b>venta</b> del inmueble descrito, de manera independiente, sin subordinaci??n o dependencia,
                        utilizando sus propios medios, elementos de trabajo y personal a su cargo.
                    </p>

                    <p><b>TERCERA. Obligaciones de</b> <b>LA INMOBILIARIA</b>: <b>LA INMOBILIARIA</b> se obliga a: 1.
                        Ofrecer el bien inmueble en el valor autorizado por <b>EL PROPIETARIO O SU REPRESENTANTE</b> e
                        informar sobre propuestas de interesados en el inmueble. 2. Acompa??amiento durante la totalidad del
                        proceso y tr??mite de la venta del inmueble, incluyendo la gesti??n comercial, la presentaci??n de
                        potenciales compradores, el proceso de documentos, solicitud, radicaci??n, elaboraci??n de promesa de
                        compraventa, diligencias notariales en la Superintendencia de Notariado y Registro. El costo de los
                        tr??mites ser?? asumido por el comprador y/o vendedor seg??n corresponda.</p>

                    <p><b>CUARTA. Obligaciones de EL PROPIETARIO O SU REPRESENTANTE</b>: <b>EL PROPIETARIO O SU
                            REPRESENTANTE </b>se obliga a: 1. Pagar a <b>LA INMOBILIARIA</b> los valores correspondientes en
                        relaci??n con la venta del inmueble de que trata este acuerdo. 2. Facilitar a <b>LA INMOBILIARIA</b>
                        el acceso al inmueble para que pueda exhibirlo en tiempos de respuesta ??giles ante posibles
                        interesados. 3. Facilitar la documentaci??n e informaci??n necesaria y real sobre el inmueble
                        propuesto para la venta. 4. No desconocer los servicios o transacciones inmobiliarias a las que
                        acceda <b>EL PROPIETARIO O SU REPRESENTANTE </b>por gesti??n de <b>LA INMOBILIARIA</b>.</p>

                    <p><b>QUINTA. Publicidad</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b> autoriza a <b>LA INMOBILIARIA</b>
                        a realizar publicidad en internet que considere conveniente <b>LA INMOBILIARIA</b>, y se encuentra
                        incluida en los servicios pactados, durar?? mientras el inmueble sea comercializado por <b>LA
                            INMOBILIARIA</b>. La publicidad en medios diferentes a los antes mencionados y en caso de
                        requerirse se acordar?? con <b>EL PROPIETARIO O SU REPRESENTANTE</b> y este asumir?? dicho valor.
                        <b>EL PROPIETARIO O SU REPRESENTANTE</b> no utilizar??, bajo ning??n prop??sito, las fotograf??as de
                        <b>LA INMOBILIARIA </b>o cualquier otro elemento y/o herramienta publicitaria de la misma y reconoce
                        que estas son propiedad de <b>LA INMOBILIARIA, </b>a??n cuando estas hayan sido suministradas por<b>
                            EL PROPIETARIO O SU REPRESENTANTE</b>. En beneficio de la gesti??n adecuada de publicidad, <b>EL
                            PROPIETARIO O SU REPRESENTANTE</b> acepta que ??nicamente se fijar??n avisos en ventana de <b>LA
                            INMOBILIARIA</b>, en caso que <b>EL PROPIETARIO O SU REPRESENTANTE</b> directamente o a trav??s
                        de terceros fije avisos en ventana, <b>LA INMOBILIARIA</b> se abstendr?? de utilizar los suyos. <b>EL
                            PROPIETARIO O SU REPRESENTANTE</b> se compromete a que en caso de comercializar el inmueble
                        directamente o a trav??s de la gesti??n realizada por terceros diferentes a <b>LA INMOBILIARIA</b>,
                        todos realizar??n la comercializaci??n en los mismos t??rminos de precio y caracter??sticas.
                    </p>

                    <p><b>SEXTA. Vigencia del acuerdo</b>: Este acuerdo tiene una vigencia de tres (3) meses, contados a
                        partir de su firma, prorrogables por treinta (30) d??as sucesivos autom??ticamente a menos que
                        cualquiera de las partes desee darlo por terminado, para lo cual bastar?? una comunicaci??n escrita
                        dirigida a la otra parte.</p>

                    <p><b>S??PTIMA. EL PROPIETARIO O SU REPRESENTANTE </b>reconocer?? a <b>LA INMOBILIARIA</b> el <b>2% +
                            IVA</b> del <b><i>valor de la venta.</i></b> Pagadero en la firma de la promesa de compraventa.
                        <b>Normas de interpretaci??n.</b> Para todos los efectos no previstos en este acuerdo se aplicar??n
                        las normas del C??digo de Comercio en especial al art??culo 1340 y siguientes.
                    </p>

                    <p><b>OCTAVA. M??rito ejecutivo.</b> Este acuerdo presta m??rito ejecutivo para el cobro por los servicios
                        inmobiliarios prestados por <b>LA INMOBILIARIA</b> y a los que tiene derecho esta en caso que haya
                        logrado efectivamente la venta del bien inmueble (incluso si se tratara de la simple presentaci??n
                        del cliente y/o este llegase a <b>EL PROPIETARIO O SU REPRESENTANTE </b>a trav??s de cualquier
                        mecanismo o herramienta empleada por <b>LA INMOBILIARIA</b>) y <b>EL PROPIETARIO O SU
                            REPRESENTANTE</b> se niegue a pagarlos. Sin perjuicio de la ejecuci??n del presente acuerdo,
                        <b>LA INMOBILIARIA</b> se encontrar?? facultada para reportar un incumplimiento de <b>EL PROPIETARIO
                            O SU REPRESENTANTE</b> ante cualquier operador de informaci??n financiera legalmente establecido
                        de conformidad con las leyes de la Rep??blica de Colombia. Sin perjuicio de la ejecuci??n del presente
                        acuerdo, en caso de terminaci??n o del simple aviso de terminaci??n futura por parte de <b>EL
                            PROPIETARIO O SU REPRESENTANTE </b>dentro del t??rmino inicial de tres (3) meses en la
                        comercializaci??n del inmueble, este reconocer?? a <b>LA INMOBILIARIA</b> la suma de <b>$50.000 +
                            IVA</b>. En dicho caso, estar?? a cargo de <b>EL PROPIETARIO O SU REPRESENTANTE</b> recoger la(s)
                        llave(s) en la direcci??n de <b>LA INMOBILIARIA</b> si esta la(s) tuviere. El correo electr??nico de
                        notificaci??n de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es <b
                            class="variable">{{ $datos->email }}</b>

                        y el n??mero de tel??fono celular de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es
                        <b class="variable">{{ $datos->full_number }}</b>.
                    </p>

                    <p><b>NOVENA. Cl??usula compromisoria.</b> En caso de conflicto entre las partes, relativo a este
                        acuerdo, su ejecuci??n y liquidaci??n, deber?? agotarse en una diligencia de conciliaci??n ante
                        cualquier entidad autorizada para efectuarla, la cual ser?? pagada por partes iguales.</p>
                    <br>
                    <br>
                    <p>En se??al de aprobaci??n y plena validez del presente documento firmo electr??nicamente de acuerdo con
                        la Ley 527 de 1999 y el Decreto 2364 de 2012 en calidad de <b>PROPIETARIO O SU REPRESENTANTE</b>.
                    </p>

                </div>
                <div class="row texto" id="estandar_ven">
                    <p>Entre <b class="variable">{{ $datos->name }} {{ $datos->lastname }}</b> identificaci??n
                        No.
                        <b class="variable">{{ $datos->doc_number }}</b>
                        documento de identidad tipo <b class="variable">{{ $datos->desc_tipos_documento }}</b>
                        , con facultades suficientes para tomar
                        decisiones sobre la venta del inmueble identificado en este documento, quien en adelante se
                        denominar?? <b>EL PROPIETARIO O SU REPRESENTANTE</b>, y de otra parte <b>??PICA CONSTRUCCIONES S.A.
                            (??PICA INMOBILIARIA??)</b> sociedad debidamente constituida con domicilio principal en la ciudad
                        de Bogot??, NIT. 900.203.640-0 quien en adelante se denominar?? <b>LA INMOBILIARIA</b>, celebran por
                        medio de este documento un acuerdo de<b> COMISI??N O CORRETAJE</b> sobre el inmueble en las
                        condiciones que a continuaci??n se describen:
                    </p>

                    <p><b>PRIMERA.</b> <b>Objeto del acuerdo</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b> contrata a <b>LA
                            INMOBILIARIA</b> para que oferte al p??blico el bien inmueble identificado as??:
                        DIRECCI??N <b class="variable">{{ $datos->direccion }} {{ $datos->direccion_comp }}</b>
                        CIUDAD O
                        MUNICIPIO <b class="variable">{{ $datos->ciudad }}</b>
                        FOLIO DE MATR??CULA <b class="variable">{{ $datos->matricula }}</b>
                        ,
                        CHIP <b class="variable">{{ $datos->chip }}</b>
                        , con las caracter??sticas que se registran en ficha t??cnica anexa a este
                        documento. PRECIO DE PUBLICACI??N: $<b class="variable">{{ $datos->precio_contrato }}</b>
                        .</p>

                    <p><b>SEGUNDA.</b> <b>Facultades de LA INMOBILIARIA</b>: En desarrollo del presente acuerdo <b>LA
                            INMOBILIARIA</b> desplegar?? las actividades que considere convenientes para lograr la
                        <b>venta</b> del inmueble descrito, de manera independiente, sin subordinaci??n o dependencia,
                        utilizando sus propios medios, elementos de trabajo y personal a su cargo.
                    </p>

                    <p><b>TERCERA. Obligaciones de</b> <b>LA INMOBILIARIA</b>: <b>LA INMOBILIARIA</b> se obliga a: 1.
                        Ofrecer el bien inmueble en el valor autorizado por <b>EL PROPIETARIO O SU REPRESENTANTE</b> e
                        informar sobre propuestas de interesados en el inmueble. 2. Enviar informe peri??dico de la gesti??n
                        comercial realizada. 3. Acompa??amiento durante la totalidad del proceso y tr??mite de la venta del
                        inmueble, incluyendo la gesti??n comercial, la presentaci??n de potenciales compradores, el proceso de
                        documentos, solicitud, radicaci??n, elaboraci??n de promesa de compraventa, diligencias notariales en
                        la Superintendencia de Notariado y Registro. El costo de los tr??mites ser?? asumido por el comprador
                        y/o vendedor seg??n corresponda.</p>

                    <p><b>CUARTA. Obligaciones de EL PROPIETARIO O SU REPRESENTANTE</b>: <b>EL PROPIETARIO O SU
                            REPRESENTANTE </b>se obliga a: 1. Pagar a <b>LA INMOBILIARIA</b> los valores correspondientes en
                        relaci??n con la venta del inmueble de que trata este acuerdo. 2. Facilitar a <b>LA INMOBILIARIA</b>
                        el acceso al inmueble para que pueda exhibirlo en tiempos de respuesta ??giles ante posibles
                        interesados. 3. Facilitar la documentaci??n e informaci??n necesaria y real sobre el inmueble
                        propuesto para la venta. 4. No desconocer los servicios o transacciones inmobiliarias a las que
                        acceda <b>EL PROPIETARIO O SU REPRESENTANTE </b>por gesti??n de <b>LA INMOBILIARIA</b>.</p>

                    <p><b>QUINTA. Publicidad</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b> autoriza a <b>LA INMOBILIARIA</b>
                        a realizar publicidad en internet que considere conveniente <b>LA INMOBILIARIA</b>, y se encuentra
                        incluida en los servicios pactados, durar?? mientras el inmueble sea comercializado por <b>LA
                            INMOBILIARIA</b>. La publicidad en medios diferentes a los antes mencionados y en caso de
                        requerirse se acordar?? con <b>EL PROPIETARIO O SU REPRESENTANTE</b> y este asumir?? dicho valor.
                        <b>EL PROPIETARIO O SU REPRESENTANTE</b> no utilizar??, bajo ning??n prop??sito, las fotograf??as de
                        <b>LA INMOBILIARIA </b>o cualquier otro elemento y/o herramienta publicitaria de la misma y reconoce
                        que estas son propiedad de <b>LA INMOBILIARIA, </b>a??n cuando estas hayan sido suministradas por<b>
                            EL PROPIETARIO O SU REPRESENTANTE</b>. En beneficio de la gesti??n adecuada de publicidad, <b>EL
                            PROPIETARIO O SU REPRESENTANTE</b> acepta que ??nicamente se fijar??n avisos en ventana de <b>LA
                            INMOBILIARIA</b>, en caso que <b>EL PROPIETARIO O SU REPRESENTANTE</b> directamente o a trav??s
                        de terceros fije avisos en ventana, <b>LA INMOBILIARIA</b> se abstendr?? de utilizar los suyos. <b>EL
                            PROPIETARIO O SU REPRESENTANTE</b> se compromete a que en caso de comercializar el inmueble
                        directamente o a trav??s de la gesti??n realizada por terceros diferentes a <b>LA INMOBILIARIA</b>,
                        todos realizar??n la comercializaci??n en los mismos t??rminos de precio y caracter??sticas.
                    </p>

                    <p><b>SEXTA. Vigencia del acuerdo</b>: Este acuerdo tiene una vigencia de tres (3) meses, contados a
                        partir de su firma, prorrogables por treinta (30) d??as sucesivos autom??ticamente a menos que
                        cualquiera de las partes desee darlo por terminado, para lo cual bastar?? una comunicaci??n escrita
                        dirigida a la otra parte.</p>

                    <p><b>S??PTIMA. EL PROPIETARIO O SU REPRESENTANTE </b>reconocer?? a <b>LA INMOBILIARIA</b> el <b>3% +
                            IVA</b> del <b><i>valor de la venta.</i></b> 50% pagadero en la firma de la promesa de
                        compraventa y 50% pagadero en la firma de la escritura. <b>Normas de interpretaci??n.</b> Para todos
                        los efectos no previstos en este acuerdo se aplicar??n las normas del C??digo de Comercio en especial
                        al art??culo 1340 y siguientes.</p>

                    <p><b>OCTAVA. M??rito ejecutivo.</b> Este acuerdo presta m??rito ejecutivo para el cobro por los servicios
                        inmobiliarios prestados por <b>LA INMOBILIARIA</b> y a los que tiene derecho esta en caso que haya
                        logrado efectivamente la venta del bien inmueble (incluso si se tratara de la simple presentaci??n
                        del cliente y/o este llegase a <b>EL PROPIETARIO O SU REPRESENTANTE </b>a trav??s de cualquier
                        mecanismo o herramienta empleada por <b>LA INMOBILIARIA</b>) y <b>EL PROPIETARIO O SU
                            REPRESENTANTE</b> se niegue a pagarlos. Sin perjuicio de la ejecuci??n del presente acuerdo,
                        <b>LA INMOBILIARIA</b> se encontrar?? facultada para reportar un incumplimiento de <b>EL PROPIETARIO
                            O SU REPRESENTANTE</b> ante cualquier operador de informaci??n financiera legalmente establecido
                        de conformidad con las leyes de la Rep??blica de Colombia. Sin perjuicio de la ejecuci??n del presente
                        acuerdo, en caso de terminaci??n o del simple aviso de terminaci??n futura por parte de <b>EL
                            PROPIETARIO O SU REPRESENTANTE </b>dentro del t??rmino inicial de tres (3) meses en la
                        comercializaci??n del inmueble, este reconocer?? a <b>LA INMOBILIARIA</b> la suma de <b>$50.000 +
                            IVA</b>. En dicho caso, estar?? a cargo de <b>EL PROPIETARIO O SU REPRESENTANTE</b> recoger la(s)
                        llave(s) en la direcci??n de <b>LA INMOBILIARIA</b> si esta la(s) tuviere. El correo electr??nico de
                        notificaci??n de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es <b
                            class="variable">{{ $datos->email }}</b>

                        y el n??mero de tel??fono celular de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es
                        <b class="variable">{{ $datos->full_number }}</b>.
                    </p>

                    <p><b>NOVENA. Cl??usula compromisoria.</b> En caso de conflicto entre las partes, relativo a este
                        acuerdo, su ejecuci??n y liquidaci??n, deber?? agotarse en una diligencia de conciliaci??n ante
                        cualquier entidad autorizada para efectuarla, la cual ser?? pagada por partes iguales.</p>
                    <br>
                    <br>
                    <p>En se??al de aprobaci??n y plena validez del presente documento firmo electr??nicamente de acuerdo con
                        la Ley 527 de 1999 y el Decreto 2364 de 2012 en calidad de <b>PROPIETARIO O SU REPRESENTANTE</b>.
                    </p>

                </div>
                <div class="row texto" id="premium_ven">
                    <p>Entre <b class="variable">{{ $datos->name }} {{ $datos->lastname }}</b>

                        identificaci??n No.
                        <b class="variable">{{ $datos->doc_number }}</b>
                        documento de identidad tipo <b class="variable">{{ $datos->desc_tipos_documento }}</b>
                        , con facultades suficientes para tomar
                        decisiones sobre la venta del inmueble identificado en este documento, quien en adelante se
                        denominar?? <b>EL PROPIETARIO O SU REPRESENTANTE</b>, y de otra parte <b>??PICA CONSTRUCCIONES S.A.
                            (??PICA INMOBILIARIA??)</b> sociedad debidamente constituida con domicilio principal en la ciudad
                        de Bogot??, NIT. 900.203.640-0 quien en adelante se denominar?? <b>LA INMOBILIARIA</b>, celebran por
                        medio de este documento un acuerdo de<b> COMISI??N O CORRETAJE</b> sobre el inmueble en las
                        condiciones que a continuaci??n se describen:
                    </p>

                    <p><b>PRIMERA.</b> <b>Objeto del acuerdo</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b> contrata a <b>LA
                            INMOBILIARIA</b> para que oferte al p??blico el bien inmueble identificado as??:
                        DIRECCI??N <b class="variable">{{ $datos->direccion }} {{ $datos->direccion_comp }}</b>
                        CIUDAD O
                        MUNICIPIO <b class="variable">{{ $datos->ciudad }}</b>
                        FOLIO DE MATR??CULA <b class="variable">{{ $datos->matricula }}</b>
                        ,
                        CHIP <b class="variable">{{ $datos->chip }}</b>
                        , con las caracter??sticas que se registran en ficha t??cnica anexa a este
                        documento. PRECIO DE PUBLICACI??N: $<b class="variable">{{ $datos->precio_contrato }}</b>
                        .</p>

                    <p><b>SEGUNDA.</b> <b>Facultades de LA INMOBILIARIA</b>: En desarrollo del presente acuerdo <b>LA
                            INMOBILIARIA</b> desplegar?? las actividades que considere convenientes para lograr la
                        <b>venta</b> del inmueble descrito, de manera independiente, sin subordinaci??n o dependencia,
                        utilizando sus propios medios, elementos de trabajo y personal a su cargo.
                    </p>

                    <p><b>TERCERA. Obligaciones de</b> <b>LA INMOBILIARIA</b>: <b>LA INMOBILIARIA</b> se obliga a: 1.
                        Ofrecer el bien inmueble en el valor autorizado por <b>EL PROPIETARIO O SU REPRESENTANTE</b> e
                        informar sobre propuestas de interesados en el inmueble. 2. Enviar informe peri??dico de la gesti??n
                        comercial realizada. 3. Acompa??amiento durante la totalidad del proceso y tr??mite de la venta del
                        inmueble, incluyendo la gesti??n comercial, la presentaci??n de potenciales compradores, el proceso de
                        documentos, solicitud, radicaci??n, elaboraci??n de promesa de compraventa, diligencias notariales en
                        la Superintendencia de Notariado y Registro. El costo de los tr??mites ser?? asumido por el comprador
                        y/o vendedor seg??n corresponda.</p>

                    <p><b>CUARTA. Obligaciones de EL PROPIETARIO O SU REPRESENTANTE</b>: <b>EL PROPIETARIO O SU
                            REPRESENTANTE </b>se obliga a: 1. Pagar a <b>LA INMOBILIARIA</b> los valores correspondientes en
                        relaci??n con la venta del inmueble de que trata este acuerdo. 2. Facilitar a <b>LA INMOBILIARIA</b>
                        el acceso al inmueble para que pueda exhibirlo en tiempos de respuesta ??giles ante posibles
                        interesados. 3. Facilitar la documentaci??n e informaci??n necesaria y real sobre el inmueble
                        propuesto para la venta. 4. No desconocer los servicios o transacciones inmobiliarias a las que
                        acceda <b>EL PROPIETARIO O SU REPRESENTANTE </b>por gesti??n de <b>LA INMOBILIARIA</b>.</p>

                    <p><b>QUINTA. Publicidad</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b> autoriza a <b>LA INMOBILIARIA</b>
                        a realizar publicidad en internet que considere conveniente <b>LA INMOBILIARIA</b>, y se encuentra
                        incluida en los servicios pactados, durar?? mientras el inmueble sea comercializado por <b>LA
                            INMOBILIARIA</b>. La publicidad en medios diferentes a los antes mencionados y en caso de
                        requerirse se acordar?? con <b>EL PROPIETARIO O SU REPRESENTANTE</b> y este asumir?? dicho valor.
                        <b>EL PROPIETARIO O SU REPRESENTANTE</b> no utilizar??, bajo ning??n prop??sito, las fotograf??as de
                        <b>LA INMOBILIARIA </b>o cualquier otro elemento y/o herramienta publicitaria de la misma y reconoce
                        que estas son propiedad de <b>LA INMOBILIARIA, </b>a??n cuando estas hayan sido suministradas por<b>
                            EL PROPIETARIO O SU REPRESENTANTE</b>. En beneficio de la gesti??n adecuada de publicidad, <b>EL
                            PROPIETARIO O SU REPRESENTANTE</b> acepta que ??nicamente se fijar??n avisos en ventana de <b>LA
                            INMOBILIARIA</b>, en caso que <b>EL PROPIETARIO O SU REPRESENTANTE</b> directamente o a trav??s
                        de terceros fije avisos en ventana, <b>LA INMOBILIARIA</b> se abstendr?? de utilizar los suyos. <b>EL
                            PROPIETARIO O SU REPRESENTANTE</b> se compromete a que en caso de comercializar el inmueble
                        directamente o a trav??s de la gesti??n realizada por terceros diferentes a <b>LA INMOBILIARIA</b>,
                        todos realizar??n la comercializaci??n en los mismos t??rminos de precio y caracter??sticas.
                    </p>

                    <p><b>SEXTA. Vigencia del acuerdo</b>: Este acuerdo tiene una vigencia de tres (3) meses, contados a
                        partir de su firma, prorrogables por treinta (30) d??as sucesivos autom??ticamente a menos que
                        cualquiera de las partes desee darlo por terminado, para lo cual bastar?? una comunicaci??n escrita
                        dirigida a la otra parte.</p>

                    <p><b>S??PTIMA. EL PROPIETARIO O SU REPRESENTANTE </b>reconocer?? a <b>LA INMOBILIARIA</b> el <b>4% +
                            IVA</b> del <b><i>valor de la venta.</i></b> 50% pagadero en la firma de la promesa de
                        compraventa y 50% pagadero en la firma de la escritura. <b>Normas de interpretaci??n.</b> Para todos
                        los efectos no previstos en este acuerdo se aplicar??n las normas del C??digo de Comercio en especial
                        al art??culo 1340 y siguientes.</p>

                    <p><b>OCTAVA. M??rito ejecutivo.</b> Este acuerdo presta m??rito ejecutivo para el cobro por los servicios
                        inmobiliarios prestados por <b>LA INMOBILIARIA</b> y a los que tiene derecho esta en caso que haya
                        logrado efectivamente la venta del bien inmueble (incluso si se tratara de la simple presentaci??n
                        del cliente y/o este llegase a <b>EL PROPIETARIO O SU REPRESENTANTE </b>a trav??s de cualquier
                        mecanismo o herramienta empleada por <b>LA INMOBILIARIA</b>) y <b>EL PROPIETARIO O SU
                            REPRESENTANTE</b> se niegue a pagarlos. Sin perjuicio de la ejecuci??n del presente acuerdo,
                        <b>LA INMOBILIARIA</b> se encontrar?? facultada para reportar un incumplimiento de <b>EL PROPIETARIO
                            O SU REPRESENTANTE</b> ante cualquier operador de informaci??n financiera legalmente establecido
                        de conformidad con las leyes de la Rep??blica de Colombia. Sin perjuicio de la ejecuci??n del presente
                        acuerdo, en caso de terminaci??n o del simple aviso de terminaci??n futura por parte de <b>EL
                            PROPIETARIO O SU REPRESENTANTE </b>dentro del t??rmino inicial de tres (3) meses en la
                        comercializaci??n del inmueble, este reconocer?? a <b>LA INMOBILIARIA</b> la suma de <b>$50.000 +
                            IVA</b>. En dicho caso, estar?? a cargo de <b>EL PROPIETARIO O SU REPRESENTANTE</b> recoger la(s)
                        llave(s) en la direcci??n de <b>LA INMOBILIARIA</b> si esta la(s) tuviere. El correo electr??nico de
                        notificaci??n de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es <b
                            class="variable">{{ $datos->email }}</b>
                        y el n??mero de tel??fono celular de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es
                        <b class="variable">{{ $datos->full_number }}</b>.
                    </p>

                    <p><b>NOVENA. Cl??usula compromisoria.</b> En caso de conflicto entre las partes, relativo a este
                        acuerdo, su ejecuci??n y liquidaci??n, deber?? agotarse en una diligencia de conciliaci??n ante
                        cualquier entidad autorizada para efectuarla, la cual ser?? pagada por partes iguales.</p>

                    <br>
                    <br>

                    <p>En se??al de aprobaci??n y plena validez del presente documento firmo electr??nicamente de acuerdo con
                        la Ley 527 de 1999 y el Decreto 2364 de 2012 en calidad de <b>PROPIETARIO O SU REPRESENTANTE</b>.
                    </p>

                </div>
                <div class="row" id="rural_ven">
                    <div class="col-12">
                        <div class="row titulo">
                            <div class="col-1"></div>
                            <div class="col-10 text-center">
                                <p>ACUERDO DE COMISI??N O CORRETAJE VENTA INMUEBLE RURAL</p>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                    <div class="col-12 texto">
                        <p>Entre <b class="variable">{{ $datos->name }} {{ $datos->lastname }}</b>
                            identificaci??n No. <b class="variable">{{ $datos->doc_number }}</b>
                            documento de identidad tipo <b class="variable">{{ $datos->desc_tipos_documento }}</b>
                            , con facultades suficientes para tomar
                            decisiones sobre la venta del inmueble identificado en este documento, quien en adelante se
                            denominar?? <b>EL PROPIETARIO O SU REPRESENTANTE</b>, y de otra parte <b>??PICA CONSTRUCCIONES
                                S.A.
                                (??PICA INMOBILIARIA??)</b> sociedad debidamente constituida con domicilio principal en la
                            ciudad
                            de Bogot??, NIT. 900.203.640-0 quien en adelante se denominar?? <b>LA INMOBILIARIA</b>, celebran
                            por
                            medio de este documento un acuerdo de<b> COMISI??N O CORRETAJE</b> sobre el inmueble en las
                            condiciones que a continuaci??n se describen: </p>

                        <p><b>PRIMERA.</b> <b>Objeto del acuerdo</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b> contrata a
                            <b>LA
                                INMOBILIARIA</b> para que oferte al p??blico el bien inmueble identificado as??:
                            DIRECCI??N <b class="variable">{{ $datos->direccion }}
                                {{ $datos->direccion_comp }}</b>
                            CIUDAD O
                            MUNICIPIO <b class="variable">{{ $datos->ciudad }}</b>
                            FOLIO DE MATR??CULA <b class="variable">{{ $datos->matricula }}</b>
                            , con las
                            caracter??sticas que se registran en ficha t??cnica anexa a este documento. PRECIO DE PUBLICACI??N:
                            $<b class="variable">{{ $datos->precio_contrato }}</b>
                        </p>

                        <p><b>SEGUNDA.</b> <b>Facultades de LA INMOBILIARIA</b>: En desarrollo del presente acuerdo <b>LA
                                INMOBILIARIA</b> desplegar?? las actividades que considere convenientes para lograr la
                            <b>venta</b> del inmueble descrito, de manera independiente, sin subordinaci??n o dependencia,
                            utilizando sus propios medios, elementos de trabajo y personal a su cargo. <b>EL PROPIETARIO O
                                SU
                                REPRESENTANTE</b> no utilizar??, bajo ning??n prop??sito, las fotograf??as de <b>LA INMOBILIARIA
                            </b>o cualquier otro elemento de la misma y reconoce que estas son propiedad de <b>LA
                                INMOBILIARIA</b>.
                        </p>

                        <p><b>TERCERA. Obligaciones de</b> <b>LA INMOBILIARIA</b>: <b>LA INMOBILIARIA</b> se obliga a: 1.
                            Ofrecer el bien inmueble en el valor autorizado por <b>EL PROPIETARIO O SU REPRESENTANTE</b> e
                            informar sobre propuestas de interesados en el inmueble 2. Enviar informe peri??dico de la
                            gesti??n
                            comercial realizada. 3. Acompa??amiento durante la totalidad del proceso y tr??mite de la venta
                            del
                            inmueble, incluyendo la gesti??n comercial, la presentaci??n de potenciales compradores, el
                            proceso de
                            documentos, solicitud, radicaci??n, elaboraci??n de promesa de compraventa, diligencias notariales
                            en
                            la Superintendencia de Notariado y Registro. El costo de los tr??mites ser?? asumido por el
                            comprador
                            y/o vendedor seg??n corresponda.</p>

                        <p><b>CUARTA. Obligaciones de EL PROPIETARIO O SU REPRESENTANTE</b>: <b>EL PROPIETARIO O SU
                                REPRESENTANTE </b>se obliga a: 1. Pagar a <b>LA INMOBILIARIA</b> en la firma de la promesa
                            de
                            compraventa el <b>cinco por ciento (5%) m??s IVA</b> por comisi??n en la venta del inmueble de que
                            trata este acuerdo sobre el valor efectivo de la venta. 2. Facilitar a <b>LA INMOBILIARIA</b> el
                            acceso al inmueble para que pueda exhibirlo en tiempos de respuesta ??giles ante posibles
                            interesados. 3. Facilitar la documentaci??n e informaci??n necesaria y real sobre el inmueble
                            propuesto para la venta 4. No desconocer los servicios o transacciones inmobiliarias a las que
                            acceda <b>EL PROPIETARIO O SU REPRESENTA </b>por gesti??n de <b>LA INMOBILIARIA</b>.</p>

                        <p><b>QUINTA. Publicidad</b>: <b>EL PROPIETARIO O SU REPRESENTANTE</b> autoriza a <b>LA
                                INMOBILIARIA</b>
                            a realizar publicidad en su p??gina web, en los portales y redes sociales que considere
                            convenientes
                            <b>LA INMOBILIARIA</b>, negocios en red con inmobiliarios e inmobiliarias aliadas, avisos en
                            ventana. La publicidad aqu?? mencionada se encuentra incluida en la comisi??n pactada, y durar??
                            mientras el inmueble sea comercializado por <b>LA INMOBILIARIA</b>. La publicidad en medios
                            diferentes a los antes mencionados y en caso de requerirse se acordar?? con <b>EL PROPIETARIO O
                                SU
                                REPRESENTANTE</b> y este asumir?? dicho valor. En beneficio de la gesti??n adecuada de
                            publicidad,
                            <b>EL PROPIETARIO O SU REPRESENTANTE</b> acepta que ??nicamente se fijar??n avisos en ventana de
                            <b>LA
                                INMOBILIARIA</b>, en caso que <b>EL PROPIETARIO O SU REPRESENTANTE</b> directamente o a
                            trav??s
                            de terceros fije avisos en ventana, <b>LA INMOBILIARIA</b> se abstendr?? de utilizar los suyos.
                            <b>EL
                                PROPIETARIO O SU REPRESENTANTE</b> se compromete a que en caso de comercializar el inmueble
                            directamente o a trav??s de la gesti??n realizada por terceros diferentes a <b>LA
                                INMOBILIARIA</b>,
                            todos realizar??n la comercializaci??n en los mismos t??rminos de precio y caracter??sticas.
                        </p>

                        <p><b>SEXTA. Vigencia del acuerdo</b>: Este acuerdo tiene una vigencia de tres (3) meses, contados a
                            partir de su firma, prorrogables por treinta (30) d??as sucesivos autom??ticamente a menos que
                            cualquiera de las partes desee darlo por terminado, para lo cual bastar?? con una comunicaci??n
                            escrita dirigida a la otra parte.</p>

                        <p><b>S??PTIMA. Normas de interpretaci??n.</b> Para todos los efectos no previstos en este acuerdo se
                            aplicar??n las normas del C??digo de Comercio en especial al art??culo 1340 y siguientes.</p>

                        <p><b>OCTAVA. M??rito ejecutivo.</b> Este acuerdo presta m??rito ejecutivo para el cobro por los
                            servicios
                            inmobiliarios prestados por <b>LA INMOBILIARIA</b> y a los que tiene derecho esta en caso que
                            haya
                            logrado efectivamente la venta del bien inmueble (incluso si se tratara de la simple
                            presentaci??n
                            del cliente y/o este llegase a <b>EL PROPIETARIO O SU REPRESENTANTE </b>a trav??s de cualquier
                            mecanismo o herramienta empleada por <b>LA INMOBILIARIA</b>) y <b>EL PROPIETARIO O SU
                                REPRESENTANTE</b> se niegue a pagarlos. Sin perjuicio de la ejecuci??n del presente acuerdo,
                            <b>LA INMOBILIARIA</b> se encontrar?? facultada para reportar un incumplimiento de <b>EL
                                PROPIETARIO
                                O SU REPRESENTANTE</b> ante cualquier operador de informaci??n financiera legalmente
                            establecido
                            de conformidad con las leyes de la Rep??blica de Colombia. Sin perjuicio de la ejecuci??n del
                            presente
                            acuerdo, en caso de terminaci??n o del simple aviso de terminaci??n futura por parte de <b>EL
                                PROPIETARIO O SU REPRESENTANTE </b>dentro del t??rmino inicial de tres (3) meses en la
                            comercializaci??n del inmueble, este reconocer?? a <b>LA INMOBILIARIA</b> la suma de <b>$50.000 +
                                IVA</b>. En dicho caso, estar?? a cargo de <b>EL PROPIETARIO O SU REPRESENTANTE</b> recoger
                            la(s)
                            llave(s) en la direcci??n de <b>LA INMOBILIARIA</b> si esta la(s) tuviere. El correo electr??nico
                            de
                            notificaci??n de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es <b
                                class="variable">{{ $datos->email }}</b>

                            y el n??mero de tel??fono celular de <b>EL PROPIETARIO O SU REPRESENTANTE</b> es
                            <b class="variable">{{ $datos->full_number }}</b>.
                        </p>

                        <p><b>NOVENA. Cl??usula compromisoria.</b> En caso de conflicto entre las partes, relativo a este
                            acuerdo, su ejecuci??n y liquidaci??n, deber?? agotarse en una diligencia de conciliaci??n ante
                            cualquier entidad autorizada para efectuarla, la cual ser?? pagada por partes iguales.</p>
                        <br>
                        <p>En se??al de aprobaci??n y plena validez del presente documento firmo electr??nicamente de acuerdo
                            con
                            la Ley 527 de 1999 y el Decreto 2364 de 2012 en calidad de <b>PROPIETARIO O SU
                                REPRESENTANTE</b>.
                        </p>
                    </div>
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
                    <h6>Concepto de precio y viabilidad jur??dica</h6>
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
                    <small class="fw-light fst-italic">Concepto jur??dico<sup>*</sup></small>
                </div>
                <div class="interior rayita col-4">
                    <i class="fas fa-handshake"></i>
                    <small class="fw-bold" id="concepto_precio">$
                        {{ number_format($datos->conc_precio, 0, ',', '.') }}
                    </small><br>
                    <small class="fw-light fst-italic">Valor total calculado</small>
                </div>
            </div>
            <!-- Ficha t??c-->
            <div class="row ficha shadow-sm rounded mb-2 px-1">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3">
                            <small class="mt-2 fw-normal">Ficha t??cnica:</small>
                        </div>
                        <div class="col-9">
                        </div>
                    </div>
                    <div class="row my-2">
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
                                    <small class="fw-light fst-italic">Direcci??n</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->matricula }}</small><br>
                                    <small class="fw-light fst-italic">N?? matricula</small>
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
                                    <small class="fw-light fst-italic">N?? de niveles</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->n_hab }}</small><br>
                                    <small class="fw-light fst-italic">N?? de habitaciones</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->n_banos }}</small><br>
                                    <small class="fw-light fst-italic">N?? de ba??os</small>
                                </div>
                            </div>


                            <div class="row my-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->a_construida }}</small><br>
                                    <small class="fw-light fst-italic">??rea construida</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->a_privada }}</small><br>
                                    <small class="fw-light fst-italic">??rea privada</small>
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
                                    <small class="fw-light fst-italic">??rea del terreno</small>
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
                                        <i class="fas fa-car"></i>
                                        Descripci??n garaje(s)
                                    </p>
                                </div>
                                <div class="col-1"></div>
                            </div>
                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->tiene_garajes }}</small><br>
                                    <small class="fw-light fst-italic">Tiene Garaje(s)</small>
                                </div>
                                <div class="col-4">

                                </div>
                                <div class="col-4">

                                </div>
                            </div>
                            @if ($datos->tiene_garajes == 'Privado')
                                <div class="row my-1 interior">
                                    <div class="col-4">
                                        <small class="fw-bold">{{ $datos->no_garajes }}</small><br>
                                        <small class="fw-light fst-italic">N?? de garajes</small>
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
                    <div class="row my-3">
                        <div class="col-12 seccion">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10 cabeza">
                                    <p class="fw-bold">
                                        <i class="fas fa-bath"></i>
                                        Descripci??n ba??o
                                    </p>
                                </div>
                                <div class="col-1"></div>
                            </div>
                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->mat_piso_bano }}</small><br>
                                    <small class="fw-light fst-italic">Material piso ba??o </small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->b_social }}</small><br>
                                    <small class="fw-light fst-italic">Ba??o social</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->b_servicio }}</small><br>
                                    <small class="fw-light fst-italic">Ba??o de servicio</small>
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
                                        Descripci??n cocina
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
                                <div class="col-4"><small class="fw-bold">{{ $datos->tipo_estufa }}</small><br>
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
                                        Descripci??n complementaria del inmueble
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
                                        <small class="fw-light fst-italic">N?? Ascensores</small>
                                    </div>
                                </div>
                            @endif
                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->balcon }}</small><br>
                                    <small class="fw-light fst-italic">Balc??n</small>
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
                                    <small class="fw-light fst-italic">D??posito</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->hab_servicio }}</small><br>
                                    <small class="fw-light fst-italic">Habitaci??n de servicio</small>
                                </div>
                            </div>
                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->star }}</small><br>
                                    <small class="fw-light fst-italic">Star de entretenimiento</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->zona_lavanderia }}</small><br>
                                    <small class="fw-light fst-italic">Zona de lavander??a</small>
                                </div>
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->entrega_cortinas }}</small><br>
                                    <small class="fw-light fst-italic">Entrega cortinas</small>
                                </div>
                            </div>

                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->calefaccion_privada }}</small><br>
                                    <small class="fw-light fst-italic">Calefacci??n privada</small>
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
                                        <small class="fw-light fst-italic">Jard??n Interior</small>
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-1 interior">
                                <div class="col-4">
                                    <small class="fw-bold">{{ $datos->zonas_verdes }}</small><br>
                                    <small class="fw-light fst-italic">Zonas Verdes</small>
                                </div>
                                <div class="col-4">

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
                                            Caracter??sticas conjunto cerrado o edificio
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
                                        <small class="fw-bold">{{ $datos->direccion_comp }}</small><br>
                                        <small class="fw-light fst-italic">Complemento de direcci??n</small>
                                    </div>
                                    <div class="col-4">

                                    </div>
                                </div>
                                <div class="row mt-1 interior">
                                    <div class="col-4">
                                        <small class="fw-bold">{{ $datos->tipo_seguridad }}</small><br>
                                        <small class="fw-light fst-italic">Seguridad</small>
                                    </div>
                                    <div class="col-4">
                                        <small class="fw-bold">{{ $datos->tipo_vigilancia }}</small><br>
                                        <small class="fw-light fst-italic">Vigilancia</small>
                                    </div>
                                    <div class="col-4">

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
                                        <small class="fw-light fst-italic">Administraci??n plena</small>
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
                                        <small class="fw-light fst-italic">Sal??n social</small>
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
                                        <small class="fw-light fst-italic">Cancha m??ltiple</small>
                                    </div>
                                </div>
                                <div class="row mt-1 interior">
                                    <div class="col-4">
                                        <small class="fw-bold">{{ $datos->s_juegos }}</small><br>
                                        <small class="fw-light fst-italic">Sal??n de juegos</small>
                                    </div>
                                    <div class="col-4">
                                        <small class="fw-bold">{{ $datos->s_estudio }}</small><br>
                                        <small class="fw-light fst-italic">Sal??n de estudio</small>
                                    </div>
                                    <div class="col-4">
                                        <small class="fw-bold">{{ $datos->lavanderia_c }}</small><br>
                                        <small class="fw-light fst-italic">Lavander??a comunal</small>
                                    </div>
                                </div>
                                <div class="row mt-1 interior">
                                    <div class="col-4">
                                        <small class="fw-bold">{{ $datos->planta_e }}</small><br>
                                        <small class="fw-light fst-italic">Planta el??ctrica</small>
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
                        <div class="row my-1">
                            <div class="col-12 interior rayita">
                                <small class="my-1"><sup>*</sup>El valor sugerido por el cliente fue de:
                                    ${{ number_format($datos->valor, 0, ',', '.') }}</small>
                                <br>
                                <small class="my-1"><sup>**</sup>{{ $datos->obs_conc_juridico }}</small><br />
                                <small>
                                    <b>Importante: </b>Este concepto se ha basado en la revisi??n del certificado aportado,
                                    no es
                                    un estudio de t??tulos.
                                </small>
                            </div>
                        </div>
                    @else
                        <div class="pagebreak"> </div>
                        <div class="separador d-none d-print-block"></div>
                        <div class="row my-1">
                            <div class="col-12 interior rayita">
                                <small class="my-1"><sup>*</sup>El valor sugerido por el cliente fue de:
                                    ${{ number_format($datos->valor, 0, ',', '.') }}</small>
                                <br>
                                <small><sup>*</sup>{{ $datos->obs_conc_juridico }}</small><br />
                                <small>
                                    <b>Importante: </b>Este concepto se ha basado en la revisi??n del certificado aportado,
                                    no es
                                    un estudio de t??tulos.
                                </small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="d-none">
                <input type="text" name="tipo_neg" id="tipo_neg" value="{{ $datos->tipo_negocio }}">
                <input type="text" name="direccion" id="direccion" value="{{ $datos->direccion }}">
                <input type="text" name="ciudad" id="ciudad" value="{{ $datos->ciudad }}">
            </div>
        </div>
    @endforeach
@endsection
@section('final')
    <script src="{!! asset('js/mapa.js') !!}">
        < script >
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
