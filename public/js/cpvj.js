$(document).ready(function() {
    $('#conc_precio_edit').keyup(function() {
        var valor = $('#conc_precio_edit').val();
        var area_c = $('#area_c').val();

        $('#concepto_precio').html("$ " + Intl.NumberFormat("es-CO").format(valor));
        $('#metrocuadrado').html("$ " + Intl.NumberFormat("es-CO").format(valor / area_c));
    });

    $('#conc_juridico_edit').change(function() {
        $('#concepto_juridico').html($('#conc_juridico_edit').find(":selected").text());
    });

});