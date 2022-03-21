$(document).ready(function() {
    var valor = $('#valor').val();
    $('#valinval').html("En valores: $ " + Intl.NumberFormat("es-CO").format(valor));

    //Básico 2
    var basico = valor * 0.08;
    $('#estsem').html("$" + Intl.NumberFormat("es-CO").format(basico) + " + IVA<br/><br/> Equivale al 8% mensual incluida poliza");

    //PLUS
    var plus = valor * 0.1;
    $('#plus').html("$" + Intl.NumberFormat("es-CO").format(plus) + " + IVA<br/><br/> Equivale al 10% mensual incluida poliza ");

    //PREMIUM
    var premes = new Intl.NumberFormat("es-CO").format(valor * 0.12);
    $('#premes').html("$" + premes + " + IVA<br/><br/> Equivale al 12% mensual incluida poliza");

    $('#valor').keyup(function() {
        var valor = $('#valor').val();
        $('#valinval').html("En valores: $ " + Intl.NumberFormat("es-CO").format(valor));

        //Básico 2
        var basico = valor * 0.08;
        $('#estsem').html("$" + Intl.NumberFormat("es-CO").format(basico) + " + IVA<br/><br/> Equivale al 8% mensual incluida poliza");

        //PLUS
        var plus = valor * 0.1;
        $('#plus').html("$" + Intl.NumberFormat("es-CO").format(plus) + " + IVA<br/><br/> Equivale al 10% mensual incluida poliza");

        //PREMIUM
        var premes = new Intl.NumberFormat("es-CO").format(valor * 0.12);
        $('#premes').html("$" + premes + " + IVA<br/><br/> Equivale al 12% mensual incluida poliza");
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
    var subtotal = valor * 0.08;
    var porcentaje = "8%";
    var IVA = subtotal * 0.19;
    var cpm = valor * 0.004;
    var total = subtotal + IVA + cpm;
    var plan = "Plan Básico";
    var servicios = valor * 0.0584;
    var poliza = valor * 0.0216;

    llenar_datos(plan, valor, subtotal, IVA, cpm, total, servicios, poliza, porcentaje);

}

function estandar() {
    var valor = $('#valor').val();
    var subtotal = valor * 0.1;
    var porcentaje = "10%";
    var IVA = subtotal * 0.19;
    var cpm = valor * 0.004;
    var total = subtotal + IVA + cpm;
    var plan = "Plan Estándar";
    var servicios = valor * 0.0784;
    var poliza = valor * 0.0216;

    llenar_datos(plan, valor, subtotal, IVA, cpm, total, servicios, poliza, porcentaje);

}

function premium() {
    var valor = $('#valor').val();
    var subtotal = valor * 0.12;
    var porcentaje = "12%";
    var IVA = subtotal * 0.19;
    var cpm = valor * 0.004;
    var total = subtotal + IVA + cpm;
    var plan = "Plan Premium";
    var servicios = valor * 0.0984;
    var poliza = valor * 0.0216;

    llenar_datos(plan, valor, subtotal, IVA, cpm, total, servicios, poliza, porcentaje);

}

function llenar_datos(plan, valor, subtotal, IVA, cpm, total, servicios, poliza, porcentaje) {

    $('#staticBackdropLabel').html(plan);
    $('#plan_nombre').html(plan);
    $('#poliza').html(" $" + Intl.NumberFormat("es-CO").format(poliza));
    $('#valormodal').html(" $" + Intl.NumberFormat("es-CO").format(valor));
    $('#val-mes').html("$" + Intl.NumberFormat("es-CO").format(subtotal));
    $('#porcentaje').html(porcentaje);
    $('#serv').html("$" + Intl.NumberFormat("es-CO").format(servicios));
    $('#subtotal').html("$" + Intl.NumberFormat("es-CO").format(subtotal));
    $('#iva').html("$" + Intl.NumberFormat("es-CO").format(IVA));
    $('#cpm').html("$" + Intl.NumberFormat("es-CO").format(cpm));
    $('#total').html("$" + Intl.NumberFormat("es-CO").format(total));
    $('#recibido').html("$" + Intl.NumberFormat("es-CO").format(valor - total));
}