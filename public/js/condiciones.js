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
        $('#anoconstruido').hide();
        $('#botonmapa').hide();
        $('#enviarnegocio').hide();
        $('#arrendado').hide();
        $('#horizontal').hide();

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
                $('#horizontal').show();

            } else {
                $('#direccion_comp').removeAttr('required');
                $('#detalles').hide();
                $('#iconjunto').hide();
                $('#conjunto_bar').hide();
                $('#horizontal').hide();
            }
        });

        $('#habitado').change(function() {
            if ($('#habitado').prop('checked')) {
                $('#arrendado').show();

            } else {
                $('#arrendado').hide();
            }
        });

        $('#reglamento').change(function() {
            $('#motivo').html("si no cuenta con el reglamento de propiedad horizontal");
            myModal.show()
        });

        $('#serv_independ').change(function() {
            $('#motivo').html("si no cuenta con servicios públicos independientes");
            myModal.show()
        });

        $('#vacacional').change(function() {
            $('#motivo').html("con fines vacacionales");
            myModal.show()
        });

        $('#amoblado').change(function() {
            $('#motivo').html("si está amoblado");
            myModal.show()
        });

        $('#menosano').change(function() {
            $('#motivo').html("por periodos inferiores a un año");
            myModal.show()
        });

        $('#urbano').change(function() {
            $('#motivo').html("si pertenece a una zona rural");
            myModal.show()
        });

        $('#embargo').change(function() {
            $('#motivo').html("si se encuentra embargado");
            myModal.show()
        });

        $('#arr_check').change(function() {
            $('#motivo').html("si se encuentra arrendado");
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

        $('#estado_inb').change(function() {
            if ($('#estado_inb').val() >= 4) {
                $('#anoconstruido').show();
                $('#tiempo_inm').attr("required", "true");
            } else {
                $('#anoconstruido').hide();
                $('#tiempo_inm').removeAttr('required');
            }
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

        if ($('#tiempo_inm').val() == "") {
            $('#SecRemodelado').hide();
        }

        $('#remodelado').change(function() {
            if ($('#remodelado').val() == 1) {
                $('#sec_tuberia').show();
            } else {
                $('#sec_tuberia').hide();
                $('#tuberia').prop("checked", false);
            }
        });

        $('#ciudad').change(function() {
            if ($('#ciudad').val() != "" && $('#direccion').val() != "") {
                $('#botonmapa').show();
                $('#enviarnegocio').hide();
            } else {
                $('#botonmapa').hide();
            }
        });

        $('#direccion').change(function() {
            if ($('#ciudad').val() != "" && $('#direccion').val() != "") {
                $('#botonmapa').show();
                $('#enviarnegocio').hide();
            } else {
                $('#botonmapa').hide();
            }
        });
    } else if ($('#detalles').length) {
        $(".usuario i, .negocio i, .detalles i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar, .detalles .progress-bar").css("background-color", "#01303c");
        $('#sec_garajes').hide();
        $('#sec_independiente').hide();


        $('#garaje').change(function() {
            if ($('#garaje').prop('checked')) {
                $('#sec_independiente').show();

            } else {
                $('#sec_garajes').hide();
                $('#sec_independiente').hide();
            }
        });

        $('#gje_independiente').change(function() {
            if ($('#gje_independiente').prop('checked')) {
                $('#sec_garajes').show();
                $('#no_garajes').attr("required", "true");
                $('#tipo_garaje').attr("required", "true");

            } else {
                $('#sec_garajes').hide();
                $('#no_garajes').removeAttr('required');
                $('#tipo_garaje').removeAttr('required');
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