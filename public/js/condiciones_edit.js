$(document).ready(function() {
    $('#descuento').hide();
    $('#admonhelper').hide();
    var year = (new Date).getFullYear();


    if ($('#propietario').length) {

        $(".usuario i").css("color", "#01303c");
        $(".usuario .progress-bar").css("background-color", "#01303c");

    } else if ($('#negocio_tarjeta').length) {

        $(".usuario i, .negocio i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar").css("background-color", "#01303c");


        if ($('#espropietario').prop('checked')) {
            $('#pqsolicita').removeAttr('required');
            $('#pqgrupo').hide();
        } else {
            $('#pqsolicita').attr("required", "true");
            $('#pqgrupo').show();
        }

        if ($('#conjunto').prop('checked')) {
            $('#detalles').show();
            $('#direccion_comp').attr("required", "true");

        } else {
            $('#direccion_comp').removeAttr('required');
            $('#detalles').hide();
        }

        if ($('#tipo_inm').val() == 2) {
            $('#aptos2').show();
            $('#piso').attr("required", "true");
        }
        if ($('#tipo_inm').val() == 1) {
            $('#piso').removeAttr('required');
            $('#aptos2').hide();
        }

        if ($('#negocio').val() == 2) {
            $('#cortina').show();
            $('#admonhelper').show();
            $('#valorlabel').html("¿Cu&aacute;l valor le vas a asignar al inmueble en arriendo?");
        }
        if ($('#negocio').val() == 1) {
            $('#cortina').show();
            $('#valorlabel').html("¿Cu&aacute;l valor le vas a asignar al inmueble en venta?");
            $('#admonhelper').hide();
        }
        if ($('#negocio').val() == 3) {
            $('#cortina').hide();
            $('#admonhelper').hide();
        }

        var valor = $('#valor').val();
        $('#valorpesos').html("$ " + Intl.NumberFormat("es-CO").format(valor));


        if ($('#estado_inb').val() >= 4) {
            $('#anoconstruido').show();
            $('#tiempo_inm').attr("required", "true");
        } else {
            $('#anoconstruido').hide();
            $('#tiempo_inm').removeAttr('required');
        }


        if ($('#tiempo_inm').val() >= 5 && $('#tiempo_inm').val() > 0) {
            $('#SecRemodelado').show();
            $('#remodelado').attr("required", "true");
        } else {
            $('#SecRemodelado').hide();
            $('#remodelado').removeAttr('required');
        }


        if ($('#remodelado').val() == 1) {
            $('#sec_tuberia').show();
        } else {
            $('#sec_tuberia').hide();
            $('#tuberia').prop("checked", false);
        }


    } else if ($('#detalles').length) {
        $(".usuario i, .negocio i, .detalles i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar, .detalles .progress-bar").css("background-color", "#01303c");
        if ($('#no_garajes').val() > 2) {
            $('#sec_garajes').show();
        } else {
            $('#sec_garajes').hide();
        }

    } else if ($('#conjunto_tarjeta').length) {

        $(".usuario i, .negocio i, .detalles i, .conjunto i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar, .detalles .progress-bar, .conjunto .progress-bar").css("background-color", "#01303c");



        if ($('#t_cuota').val() == 2) {
            $('#descuento').show();
            console.log("ya");
            $('#adm_cd').attr("required", "true");

        } else {
            $('#descuento').hide();
            $('#adm_cd').val("");
            $('#adm_cd').removeAttr('required');
        }



        var valor = $('#adm_cp').val();
        $('#adm_cp_pesos').html("$ " + Intl.NumberFormat("es-CO").format(valor));



        var valor = $('#adm_cd').val();
        $('#adm_cd_pesos').html("$ " + Intl.NumberFormat("es-CO").format(valor));



    } else if ($('#fotos').length) {

        $(".usuario i, .negocio i, .detalles i, .conjunto i,.camara i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar, .detalles .progress-bar, .conjunto .progress-bar, .camara .progress-bar").css("background-color", "#01303c");
    } else if ($('#planes_tarjeta').length) {
        $(".usuario i, .negocio i, .detalles i, .conjunto i,.camara i, .planes i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar, .detalles .progress-bar, .conjunto .progress-bar, .camara .progress-bar").css("background-color", "#01303c");


    }
});