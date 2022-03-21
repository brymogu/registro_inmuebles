$(document).ready(function() {
    var valor = $('#valor').val();
    $('#valinval').html("En valores: $ " + Intl.NumberFormat("es-CO").format(valor));
    //Básico
    var basmes = new Intl.NumberFormat("es-CO").format(valor * 0.005);

    $('#basano').html("$" + basmes + " + IVA<br/><br/>Equivale al 0.5% <br/><strong>(una vez sea vendido)</strong> ");

    //ESTÁNDAR
    var estmes = new Intl.NumberFormat("es-CO").format(valor * 0.01);
    $('#estsem').html("$" + estmes + " + IVA<br/><br/>Equivale al 1% <br/><strong>(una vez sea vendido)</strong>");
    //PLUS
    var plus = new Intl.NumberFormat("es-CO").format((valor * 0.02));
    $('#plusmes').html("$" + plus + " + IVA<br/><br/>Equivale al 2% <br/><strong>(una vez sea vendido)</strong>");

    //PREMIUM
    var premes = new Intl.NumberFormat("es-CO").format(valor * 0.03);
    $('#premes').html("$" + premes + " + IVA<br/><br/>Equivale al 3% <br/><strong>(una vez sea vendido)</strong>");

    $('#valor').keyup(function() {
        var valor = $('#valor').val();
        $('#valinval').html("En valores: $ " + Intl.NumberFormat("es-CO").format(valor));
        //Básico
        var basmes = new Intl.NumberFormat("es-CO").format(valor * 0.005);

        $('#basano').html("$" + basmes + " + IVA<br/><br/>Equivale al 0.5% <br/><strong>(una vez sea vendido)</strong>");

        //ESTÁNDAR
        var estmes = new Intl.NumberFormat("es-CO").format(valor * 0.01);
        $('#estsem').html("$" + estmes + " + IVA<br/><br/>Equivale al 1% <br/><strong>(una vez sea vendido)</strong>");
        //PLUS
        var plus = new Intl.NumberFormat("es-CO").format((valor * 0.02));
        $('#plusmes').html("$" + plus + " + IVA<br/><br/>Equivale al 2% <br/><strong>(una vez sea vendido)</strong>");

        //PREMIUM
        var premes = new Intl.NumberFormat("es-CO").format(valor * 0.03);
        $('#premes').html("$" + premes + " + IVA<br/><br/>Equivale al 3% <br/><strong>(una vez sea vendido)</strong>");

        selector();
    });

});

function selector() {
    var plan_selected = $('#planes').val();
    switch (plan_selected) {
        case "1":
            basico();
            break;
        case "2":
            estandar();
            break;
        case "3":
            premium();
            break;
    }
}

function basico() {
    var valor = $('#valor').val();
    var mensual = valor * 0.005;
    var iva = mensual * 0.19;
    var total = mensual + iva;
    var plan = "Plan Básico";
    var efectivo = "Previo elaboración de promesa compraventa";
    var porcentaje = "0.5%";

    llenar_datos(plan, efectivo, valor, mensual, iva, total, porcentaje);
}

function estandar() {
    var valor = $('#valor').val();
    var mensual = valor * 0.01;
    var iva = mensual * 0.19;
    var total = mensual + iva;
    var plan = "Plan Estandar";
    var efectivo = "En la firma promesa compraventa";
    var porcentaje = "1%";

    llenar_datos(plan, efectivo, valor, mensual, iva, total, porcentaje);
}

function premium() {
    var valor = $('#valor').val();
    var mensual = valor * 0.02;
    var iva = mensual * 0.19;
    var total = mensual + iva;
    var plan = "Plan Plus";
    var efectivo = "En la firma promesa compraventa";
    var porcentaje = "2%";
    llenar_datos(plan, efectivo, valor, mensual, iva, total, porcentaje);
}

function premium() {
    var valor = $('#valor').val();
    var mensual = (valor * 0.03);
    var premium_mitad = mensual / 2;
    var iva = mensual * 0.19;
    var total = mensual + iva;
    var plan = "Plan Premium";
    var efectivo = "En firma en promesa compraventa";
    var porcentaje = "3%";

    llenar_datos(plan, efectivo, valor, mensual, iva, total, porcentaje, premium_mitad);
}

function llenar_datos(plan, efectivo, valor, mensual, iva, total, porcentaje, premium_mitad) {

    $('#plan').html(plan);
    $('#porcentaje').html(porcentaje);
    $('#valor_plan').html("$" + Intl.NumberFormat("es-CO").format(mensual));
    $('#efectivo').html(efectivo);
    $('#valormodal').html(" $" + Intl.NumberFormat("es-CO").format(valor));
    $('#val-mes').html("$" + Intl.NumberFormat("es-CO").format(mensual));
    $('#serv').html("$" + Intl.NumberFormat("es-CO").format(mensual));
    $('#iva').html("$" + Intl.NumberFormat("es-CO").format(iva));
    $('#total').html("$" + Intl.NumberFormat("es-CO").format(total));
    $('#total').html("$" + Intl.NumberFormat("es-CO").format(total));

    if (plan != "Plan Premium") {
        $('#soloplus').hide();
        $('#noplus').show();
        $('#efectivo').show();
    } else {
        $('#soloplus').show();
        $('#noplus').hide();
        $('#efectivo').hide();
        $('#serv1').html("$" + Intl.NumberFormat("es-CO").format(premium_mitad));
        $('#iva1').html("$" + Intl.NumberFormat("es-CO").format(premium_mitad * 0.19));
        $('#total1').html("$" + Intl.NumberFormat("es-CO").format(premium_mitad + (premium_mitad * 0.19)));
        $('#efectivo1').html(efectivo);
        $('#serv2').html("$" + Intl.NumberFormat("es-CO").format(premium_mitad));
        $('#iva2').html("$" + Intl.NumberFormat("es-CO").format(premium_mitad * 0.19));
        $('#total2').html("$" + Intl.NumberFormat("es-CO").format(premium_mitad + (premium_mitad * 0.19)));
        $('#efectivo2').html("En firma escritura");
        $('#totalprem').html("$" + Intl.NumberFormat("es-CO").format((premium_mitad + (premium_mitad * 0.19)) * 2));
    }
}