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

            if ($('#habitado').prop('checked')) {
                $('#arrendado').show();

            } else {
                $('#arrendado').hide();
            }

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
            $('#sec_n_ascensores').hide();
            $('#ascensor').removeAttr('checked');
        }


        if ($('#ascensor').prop('checked')) {
            $('#sec_n_ascensores').show();
            $('#n_ascensores').attr("required", "true");
        } else {
            $('#sec_n_ascensores').hide();
            $('#ascensor').removeAttr('checked');
        }

        if ($('#negocio').val() == 2) {
            $('#cortina').show();
            $('#admonhelper').show();
            $('#valorlabel').html("¿Valor tentativo que le vas a  asignar al inmueblee en arriendo?");
        }
        if ($('#negocio').val() == 1) {
            $('#cortina').show();
            $('#valorlabel').html("¿Valor tentativo que le vas a  asignar al inmueble en venta?");
            $('#admonhelper').hide();
        }
        if ($('#negocio').val() == 3) {
            $('#cortina').hide();
            $('#admonhelper').hide();
        }

        var valor = $('#valor').val();
        $('#valorpesos').html("$ " + Intl.NumberFormat("es-CO").format(valor));


        if ($('#estado_inb').val() == 4) {
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

        if ($('#remodelado').val() == 1) {
            $('#sec_tuberia').show();
        } else {
            $('#sec_tuberia').hide();
            $('#tuberia').prop("checked", false);
        }


        $('#arr_check').change(function() {
            console.log("en");
            if ($('#negocio').val() == 1) {
                $('#motivo').html("si se encuentra arrendado");
                myModal.show()
            }
        });



    } else if ($('#detalles').length) {
        $(".usuario i, .negocio i, .detalles i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar, .detalles .progress-bar").css("background-color", "#01303c");


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


        if ($('#balcon').prop('checked')) {
            $('#area_balcon_secc').show();
            $('#area_balcon').attr("required", "true");
        } else {
            $('#area_balcon_secc').hide();
            $('#area_balcon').removeAttr('required');
        }

        if ($('#terraza').prop('checked')) {
            $('#area_terraza_secc').show();
            $('#area_terraza').attr("required", "true");
        } else {
            $('#area_terraza_secca').hide();
            $('#area_terraza').removeAttr('required');
        }


    } else if ($('#conjunto_tarjeta').length) {

        $(".usuario i, .negocio i, .detalles i, .conjunto i").css("color", "#01303c");
        $(".usuario .progress-bar, .negocio .progress-bar, .detalles .progress-bar, .conjunto .progress-bar").css("background-color", "#01303c");


        switch ($('#t_cuota').val()) {
            case '1':
                $('#secc_admon').show();
                $('#adm_cd').removeAttr('required');
                $('#descuento').hide();
                $('#plena').hide();
                $('#c_unica').show();
                $('#plena').attr("required", "true");
                break;
            case '2':
                $('#secc_admon').show();
                $('#descuento').show();
                $('#c_unica').hide();
                $('#plena').show();
                $('#plena').attr("required", "true");
                $('#adm_cd').attr("required", "true");
                break;
            case '3':
                $('#plena').removeAttr('required');
                $('#adm_cd').removeAttr('required');
                $('#descuento').hide();
                $('#secc_admon').hide();
                break;
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