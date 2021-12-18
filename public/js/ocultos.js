$(document).ready(function() {

    if ($('#negocio_tarjeta').length) {
        $('#reglas').hide();
        $('#detalles').hide();
        $('#sec_tuberia').hide();
        $('#anoconstruido').hide();
        $('#botonmapa').hide();
        $('#enviarnegocio').hide();
        $('#arrendado').hide();
        $('#horizontal').hide();
        $('#sec_n_ascensores').hide();

    } else if ($('#detalles').length) {
        $('#sec_garajes').hide();
        $('#sec_independiente').hide();
        $('#area_terraza_secc').hide();
        $('#area_balcon_secc').hide();

    } else if ($('#conjunto_tarjeta').length) {
        $('#descuento').hide();
        $('#admonhelper').hide();
    } else if ($('#fotos').length) {
        $('#finalizar').hide()

    } else if ($('#planes_tarjeta').length) {
        $('#sec_valor').hide();
    }
});