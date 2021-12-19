$(document).ready(function() {

    $('#descuento').hide();
    var year = (new Date).getFullYear();

    if ($('#propietario').length) {
        $(".usuario i").css("color", "#01303c");
        $(".usuario .progress-bar").css("background-color", "#01303c");
        $('.toast').toast("show");

    } else if ($('#negocio_tarjeta').length) {
        $(".usuario i, .negocio i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar").css("background-color", "#01303c");

        $('#sec_tuberia').hide();
        $('#anoconstruido').hide();
        $('#arrendado').hide();
        $('#horizontal').hide();

        if ($('#tipo_inm').val() == 2) {
            $('#aptos2').show();
            $('#piso').attr("required", "true");
        } else {
            $('#aptos2').hide();
            $('#piso').removeAttr('required');
        }

        if ($('#conjunto').val() == "Si") {
            $('#detalles').show();
        } else {
            $('#detalles').hide();
        }

        if ($('#espropietario').val() == "Si") {
            $('#pqgrupo').hide();
        } else {
            $('#pqgrupo').show();
        }

        $('#espropietario').change(function() {
            if ($('#espropietario').val() == 'Si') {
                $('#pqsolicita').removeAttr('required');
                $('#pqgrupo').hide();
            } else {
                $('#pqsolicita').attr("required", "true");
                $('#pqgrupo').show();
            }
        });

        $('#conjunto').change(function() {
            if ($('#conjunto').val() == "Si") {
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
            if ($('#habitado').val() == 'Si') {
                $('#arrendado').show();

            } else {
                $('#arrendado').hide();
            }
        });

        $('#tipo_inm').change(function() {
            if ($('#tipo_inm').val() == 2) {
                $('#aptos2').show();
            } else if ($('#tipo_inm').val() == 1) {
                $('#aptos2').hide();
            }
        });

        $('#negocio').change(function() {
            if ($('#negocio').val() == 2) {
                $('#cortina').show();
            }
            if ($('#negocio').val() == 1) {
                $('#cortina').hide();
            }
        });

        $('#valor').keyup(function() {
            var valor = $('#valor').val();
            $('#valorpesos').html("$ " + Intl.NumberFormat("es-CO").format(valor));
        });

        if ($('#estado_inb').val() >= 4) {
            $('#anoconstruido').show();
        } else {
            $('#anoconstruido').hide();
        }

        $('#estado_inb').change(function() {
            if ($('#estado_inb').val() >= 4) {
                $('#anoconstruido').show();
                $('#tiempo_inm').attr("required", "true");
            } else {
                $('#anoconstruido').hide();
                $('#tiempo_inm').removeAttr('required');
            }
        });

        if ($('#tiempo_inm').val() >= 5 && $('#tiempo_inm').val() > 0 && $('#tiempo_inm').val() != "") {
            $('#SecRemodelado').show();
        } else {
            $('#SecRemodelado').hide();
        }

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
        $('#area_terraza_secc').hide();
        $('#area_balcon_secc').hide();


        $('#garaje').change(function() {
            if ($('#garaje').val() == 'Si') {
                $('#sec_garajes').show();
                $('#no_garajes').attr("required", "true");
                $('#tipo_garaje').attr("required", "true");
            } else {
                $('#sec_garajes').hide();
                $('#no_garajes').val('');
                $('#no_garajes').removeAttr('required');
                $('#tipo_garaje').removeAttr('required');
            }
        });




        $('#balcon').change(function() {
            if ($('#balcon').val() == 'Si') {
                $('#area_balcon_secc').show();
                $('#area_balcon').attr("required", "true");
            } else {
                $('#area_balcon_secc').hide();
                $('#area_balcon').removeAttr('required');
            }
        });

        $('#terraza').change(function() {
            if ($('#terraza').val() == 'Si') {
                $('#area_terraza_secc').show();
                $('#area_terraza').attr("required", "true");
            } else {
                $('#area_terraza_secca').hide();
                $('#area_terraza').removeAttr('required');
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
        $(".usuario i, .negocio i, .detalles i, .conjunto i,.planes i,.camara i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar, .detalles .progress-bar, .conjunto .progress-bar, .camara .progress-bar").css("background-color", "#01303c");

        $('#finalizar').hide()

    } else if ($('#planes_tarjeta').length) {
        $(".usuario i, .negocio i, .detalles i, .conjunto i, .planes i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar, .detalles .progress-bar, .conjunto .progress-bar, .camara .progress-bar").css("background-color", "#01303c");
        $('.toast').toast("show");
        $('#sec_valor').hide();

        $('#modificar').change(function() {
            if ($('#modificar').val() == 'Si') {
                $('#sec_valor').show();
            } else {
                $('#sec_valor').hide();
            }
        });

    }
});