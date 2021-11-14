$(document).ready(function() {

    $('#descuento').hide();
    $('#admonhelper').hide();
    var year = (new Date).getFullYear();



    if ($('#propietario').length) {
        $(".usuario i").css("color", "#01303c");
        $(".usuario .progress-bar").css("background-color", "#01303c");
        $('.toast').toast("show");

    } else if ($('#negocio_tarjeta').length) {

        $(".usuario i, .negocio i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar").css("background-color", "#01303c");

        $('#reglas').hide();
        $('#sec_tuberia').hide();
        if ($('#tipo_inm').val() == 2) {
            $('#aptos2').show();
            $('#piso').attr("required", "true");
        } else {
            $('#aptos2').hide();
            $('#piso').removeAttr('required');
        }


        if ($('#conjunto').prop('checked')) {
            $('#detalles').show();
        } else {
            $('#detalles').hide();
        }

        if ($('#tiempo_inm').val() == "") {
            $('#SecRemodelado').hide();
        }

        $('#espropietario').change(function() {
            if ($('#espropietario').prop('checked')) {
                $('#pqsolicita').removeAttr('required');
                $('#pqgrupo').hide();
            } else {
                $('#pqsolicita').attr("required", "true");
                $('#pqgrupo').show();
            }
        });

        $('#conjunto').change(function() {
            if ($('#conjunto').prop('checked')) {
                $('#detalles').show();
                $('#direccion_comp').attr("required", "true");
                $('#iconjunto').show();
                $('#conjunto_bar').show();
            } else {
                $('#direccion_comp').removeAttr('required');
                $('#detalles').hide();
                $('#iconjunto').hide();
                $('#conjunto_bar').hide();
            }
        });


        $('#reglamento').change(function() {
            $('#motivo').html("el reglamento de propiedad horizontal");
            myModal.show()
        });

        $('#serv_independ').change(function() {
            $('#motivo').html("servicios públicos independientes");
            myModal.show()
        });

        $('#tipo_inm').change(function() {
            if ($('#tipo_inm').val() == 2) {
                $('#aptos2').show();
                $('#piso').attr("required", "true");
            }
            if ($('#tipo_inm').val() == 1) {
                $('#piso').removeAttr('required');
                $('#aptos2').hide();
            }
        });

        $('#negocio').change(function() {
            if ($('#negocio').val() == 2) {
                $('#cortina').show();
                $('#admonhelper').show();
                $('#reglas').show();
                $('#valorlabel').html("¿Cu&aacute;l valor tentativo le vas a asignar al inmueble en arriendo?");
            }
            if ($('#negocio').val() == 1) {
                $('#cortina').show();
                $('#valorlabel').html("¿Cu&aacute;l valor tentativo le vas a asignar al inmueble en venta?");
                $('#admonhelper').hide();
                $('#reglas').hide();
            }
            if ($('#negocio').val() == 3) {
                $('#cortina').hide();
                $('#admonhelper').hide();
                $('#reglas').hide();
            }
        });

        $('#valor').keyup(function() {
            var valor = $('#valor').val();
            $('#valorpesos').html("$ " + Intl.NumberFormat("es-CO").format(valor));
        });



        $('#tiempo_inm').change(function() {
            if ($('#tiempo_inm').val() >= 5 && $('#tiempo_inm').val() > 0 && $('#tiempo_inm').val() != "") {
                console.log("si");
                $('#SecRemodelado').show();
                $('#remodelado').attr("required", "true");
            } else {
                $('#SecRemodelado').hide();
                $('#remodelado').removeAttr('required');
            }
        });

        $('#remodelado').change(function() {
            if ($('#remodelado').val() == 1) {
                $('#sec_tuberia').show();
            } else {
                $('#sec_tuberia').hide();
                $('#tuberia').prop("checked", false);
            }
        });

    } else if ($('#detalles').length) {
        $(".usuario i, .negocio i, .detalles i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar, .detalles .progress-bar").css("background-color", "#01303c");
        $('#sec_garajes').hide();

        $('#no_garajes').change(function() {
            console.log("cambió");
            if ($('#no_garajes').val() > 2) {
                $('#sec_garajes').show();
            } else {
                $('#sec_garajes').hide();
            }
        });

    } else if ($('#conjunto_tarjeta').length) {

        $(".usuario i, .negocio i, .detalles i, .conjunto i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar, .detalles .progress-bar, .conjunto .progress-bar").css("background-color", "#01303c");



        $('#t_cuota').change(function() {
            if ($('#t_cuota').val() == 2) {
                $('#descuento').show();
                console.log("ya");
                $('#adm_cd').attr("required", "true");

            } else {
                $('#descuento').hide();
                $('#adm_cd').val("");
                $('#adm_cd').removeAttr('required');
            }
        });

        $('#adm_cp').keyup(function() {
            var valor = $('#adm_cp').val();
            $('#adm_cp_pesos').html("$ " + Intl.NumberFormat("es-CO").format(valor));
        });

        $('#adm_cd').keyup(function() {
            var valor = $('#adm_cd').val();
            $('#adm_cd_pesos').html("$ " + Intl.NumberFormat("es-CO").format(valor));
        });


    } else if ($('#fotos').length) {

        $(".usuario i, .negocio i, .detalles i, .conjunto i,.camara i").css("color", "#01303c");

    } else if ($('#planes_tarjeta').length) {

        $(".usuario i, .negocio i, .detalles i, .conjunto i, .planes i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar, .detalles .progress-bar, .conjunto .progress-bar, .camara .progress-bar").css("background-color", "#01303c");
    }
});