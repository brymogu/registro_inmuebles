$(document).ready(function() {
    var valor = $('#valor').val();
    $('#valinval').html("En valores: $ " + Intl.NumberFormat("es-CO").format(valor));

    //Básico 2
    var basico = valor * 0.08;
    $('#estsem').html("$" + Intl.NumberFormat("es-CO").format(basico) + " + IVA<br/><br/> Equivale al 8% mensual incluida poliza<br/><strong>(una vez sea arrendado)</strong><br/><br/><a href='#' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick='basico()' >Ver detalles</a>");

    //PLUS
    var plus = valor * 0.1;
    $('#plus').html("$" + Intl.NumberFormat("es-CO").format(plus) + " + IVA<br/><br/> Equivale al 10% mensual incluida poliza <br/><strong>(una vez sea arrendado)</strong><br/><br/><a href='#' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick='plus()' >Ver detalles</a>");

    //PREMIUM
    var premes = new Intl.NumberFormat("es-CO").format(valor * 0.12);
    $('#premes').html("$" + premes + " + IVA<br/><br/> Equivale al 12% mensual incluida poliza<strong><br/>(una vez sea arrendado)</strong><br/><br/><a href='#' data-bs-toggle='modal' class='btn btn-warning btn-sm' data-bs-target='#staticBackdrop' onclick='premium()' >Ver detalles</a>");

    $('#valor').keyup(function() {
        var valor = $('#valor').val();
        $('#valinval').html("En valores: $ " + Intl.NumberFormat("es-CO").format(valor));

        //Básico 2
        var basico = valor * 0.08;
        $('#estsem').html("$" + Intl.NumberFormat("es-CO").format(basico) + " + IVA<br/><br/> Equivale al 8% mensual incluida poliza<br/><strong>(una vez sea arrendado)</strong><br/><br/><a href='#' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick='basico()' >Ver detalles</a>");

        //PLUS
        var plus = valor * 0.1;
        $('#plus').html("$" + Intl.NumberFormat("es-CO").format(plus) + " + IVA<br/><br/> Equivale al 10% mensual incluida poliza <br/><strong>(una vez sea arrendado)</strong><br/><br/><a href='#' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick='plus()' >Ver detalles</a>");

        //PREMIUM
        var premes = new Intl.NumberFormat("es-CO").format(valor * 0.12);
        $('#premes').html("$" + premes + " + IVA<br/><br/> Equivale al 12% mensual incluida poliza<strong><br/>(una vez sea arrendado)</strong><br/><br/><a href='#' data-bs-toggle='modal' class='btn btn-warning btn-sm' data-bs-target='#staticBackdrop' onclick='premium()' >Ver detalles</a>");

    });
});

function basico() {
    var valor = $('#valor').val();
    var mensual = valor * 0.08;
    var porcentaje = "8%";
    var meses = 1;
    var subtotal = mensual * meses;
    var IVA = subtotal * 0.19;
    var cpm = valor * 0.004;
    var total = subtotal + IVA + cpm;
    var plan = "Plan Básico";
    var efectivo = "mensual";
    var servicios = valor * 0.0584;
    var poliza = valor * 0.0216;

    llenar_datos(plan, meses, efectivo, valor, mensual, subtotal, IVA, cpm, total, servicios, poliza, porcentaje);
    tabla(meses, valor, total);
}

function plus() {
    var valor = $('#valor').val();
    var mensual = valor * 0.1;
    var porcentaje = "10%";
    var meses = 1;
    var subtotal = mensual * meses;
    var IVA = subtotal * 0.19;
    var cpm = valor * 0.004;
    var total = subtotal + IVA + cpm;
    var plan = "Plan Estándar";
    var efectivo = "mensual";
    var servicios = valor * 0.0784;
    var poliza = valor * 0.0216;

    llenar_datos(plan, meses, efectivo, valor, mensual, subtotal, IVA, cpm, total, servicios, poliza, porcentaje);
    tabla(meses, valor, total);
}

function premium() {
    var valor = $('#valor').val();
    var mensual = valor * 0.12;
    var porcentaje = "12%";
    var meses = 1;
    var subtotal = mensual * meses;
    var IVA = subtotal * 0.19;
    var cpm = valor * 0.004;
    var total = subtotal + IVA + cpm;
    var plan = "Plan Premium";
    var efectivo = "mensual";
    var servicios = valor * 0.0984;
    var poliza = valor * 0.0216;

    llenar_datos(plan, meses, efectivo, valor, mensual, subtotal, IVA, cpm, total, servicios, poliza, porcentaje);
    tabla(meses, valor, total);
}

function llenar_datos(plan, meses, efectivo, valor, mensual, subtotal, IVA, cpm, total, servicios, poliza, porcentaje) {

    $('#staticBackdropLabel').html(plan);
    $('#plan').html(plan);
    $('#poliza').html(" $" + Intl.NumberFormat("es-CO").format(poliza));
    $('#efectivo').html(efectivo);
    $('#valormodal').html(" $" + Intl.NumberFormat("es-CO").format(valor));
    $('#val-mes').html("$" + Intl.NumberFormat("es-CO").format(mensual));
    $('#porcentaje').html(porcentaje);
    $('#serv').html("$" + Intl.NumberFormat("es-CO").format(servicios));
    $('#subtotal').html("$" + Intl.NumberFormat("es-CO").format(subtotal));
    $('#iva').html("$" + Intl.NumberFormat("es-CO").format(IVA));
    $('#cpm').html("$" + Intl.NumberFormat("es-CO").format(cpm));
    $('#total').html("$" + Intl.NumberFormat("es-CO").format(total));

}


function tabla(meses, valor, total) {
    var tabla = document.getElementById('basico_tabla');
    for (var i = 1; i <= 12; i++) {
        var hilera = document.createElement("tr");
        for (var j = 0; j <= 2; j++) {
            var celda = document.createElement("td");
            switch (j) {
                case 0:
                    var textoCelda = document.createTextNode(i);
                    celda.appendChild(textoCelda);
                    break
                case 1:
                    var textoCelda = document.createTextNode("$ " + Intl.NumberFormat("es-CO").format(total));
                    celda.appendChild(textoCelda);
                    break
                case 2:
                    var textoCelda = document.createTextNode("$ " + Intl.NumberFormat("es-CO").format((valor - total)) + " *");
                    celda.appendChild(textoCelda);
                    break
            }
            hilera.appendChild(celda);
        }
        tabla.append(hilera);
    }

}

function limpiar_tabla() {
    var tabla = document.getElementById('basico_tabla');
    $("#basico_tabla tr").remove();
}