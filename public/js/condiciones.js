$(document).ready(function () {

    if ($('#propietario').length) {
        $('.toast').toast("show");
        $('#m_usuario').addClass("activo");
    } else if ($('#negocio_tarjeta').length) {
        $('#m_usuario').addClass("activo");
        $('#m_negocio').addClass("activo");
        $('#m_barra').css("width", "32%");

        $('#espropietario').change(function () {
            if ($('#espropietario').prop('checked')) {
                $('#pqsolicita').removeAttr('required');
                $('#pqgrupo').hide();
            } else {
                $('#pqsolicita').attr("required", "true");
                $('#pqgrupo').show();
            }
        });

        $('#conjunto').change(function () {
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


        $('#habitado').change(function () {
            if ($('#habitado').prop('checked')) {
                $('#arrendado').show();

            } else {
                $('#arrendado').hide();
            }
        });

        $('#reglamento').change(function () {
            $('#motivo').html("si no cuenta con el reglamento de propiedad horizontal");
            myModal.show()
        });

        $('#serv_independ').change(function () {
            $('#motivo').html("si no cuenta con servicios públicos independientes");
            myModal.show()
        });

        $('#vacacional').change(function () {
            $('#motivo').html("con fines vacacionales");
            myModal.show()
        });

        $('#amoblado').change(function () {
            $('#motivo').html("si está amoblado");
            myModal.show()
        });

        $('#menosano').change(function () {
            $('#motivo').html("por periodos inferiores a un año");
            myModal.show()
        });

        $('#urbano').change(function () {
            $('#motivo').html("si pertenece a una zona rural");
            myModal.show()
        });

        $('#embargo').change(function () {
            $('#motivo').html("si se encuentra embargado");
            myModal.show()
        });


        $('#arr_check').change(function () {
            if ($('#negocio').val() == 1) {
                $('#motivo').html("si se encuentra arrendado");
                myModal.show()
            }
        });
        $('#tipo_inm').change(function () {
            if ($('#tipo_inm').val() == 2) {
                $('#aptos2').show();
                $('#piso').attr("required", "true");
                $("#estado_inb option[value='3']").show();
                $("#estado_inb option[value='2']").show();
            }
            if ($('#tipo_inm').val() == 1) {
                $("#estado_inb option[value='3']").hide();
                $("#estado_inb option[value='2']").hide();
                $('#piso').removeAttr('required');
                $('#aptos2').hide();
                $('#n_ascensores').removeAttr('required');
                $('#sec_n_ascensores').hide();
                $('#n_ascensores').removeAttr('required');
            }
        });

        $('#ascensor').change(function () {
            if ($('#ascensor').prop('checked')) {
                $('#sec_n_ascensores').show();
                $('#n_ascensores').attr("required", "true");
            } else {
                $('#sec_n_ascensores').hide();
                $('#n_ascensores').removeAttr('required');
            }
        });

        $('#negocio').change(function () {
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
        });

        $('#valor').keyup(function () {
            var valor = $('#valor').val();
            $('#valorpesos').html("$ " + Intl.NumberFormat("es-CO").format(valor));
            if (valor <= 100000) {
                popover.enable();
                popover.show()
            } else {
                popover.disable();
                popover.hide()
            }
        });

        $('#estado_inb').change(function () {
            if ($('#estado_inb').val() >= 4) {
                $('#anoconstruido').show();
                $('#tiempo_inm').attr("required", "true");
            } else {
                $('#anoconstruido').hide();
                $('#tiempo_inm').removeAttr('required');
            }
        });

        $('#tiempo_inm').change(function () {
            if ($('#tiempo_inm').val() >= 5 && $('#tiempo_inm').val() > 0 && $('#tiempo_inm').val() != "" && $('#estado_inb').val() == 4) {
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

        $('#remodelado').change(function () {
            if ($('#remodelado').val() == 1) {
                $('#sec_tuberia').show();
            } else {
                $('#sec_tuberia').hide();
                $('#tuberia').prop("checked", false);
            }
        });

    } else if ($('#detalles').length) {
        $('#m_usuario').addClass("activo");
        $('#m_negocio').addClass("activo");
        $('#m_detalles').addClass("activo");
        $('#m_barra').css("width", "48%");

        $('#garaje').change(function () {
            if ($('#garaje').val() == 'Privado') {
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

        $('#no_garajes').change(function () {
            if ($('#no_garajes').val() < 2) {
                if ($('#tipo_garaje').val() == 3) {
                    $("#tipo_garaje option[value='1']").attr('selected', 'selected');
                }
                $("#tipo_garaje option[value='3']").hide();

            } else {

                $("#tipo_garaje option[value='3']").show();
            }
        });


        $('#balcon').change(function () {
            if ($('#balcon').prop('checked')) {
                $('#area_balcon_secc').show();
                $('#area_balcon').attr("required", "true");
            } else {
                $('#area_balcon_secc').hide();
                $('#area_balcon').removeAttr('required');
            }
        });

        $('#terraza').change(function () {
            if ($('#terraza').prop('checked')) {
                $('#area_terraza_secc').show();
                $('#area_terraza').attr("required", "true");
            } else {
                $('#area_terraza_secc').hide();
                $('#area_terraza').removeAttr('required');
            }
        });
    } else if ($('#conjunto_tarjeta').length) {
        $('#m_usuario').addClass("activo");
        $('#m_negocio').addClass("activo");
        $('#m_detalles').addClass("activo");
        $('#m_conjunto').addClass("activo");
        $('#m_barra').css("width", "50%");

        $('#seguridad').change(function () {
            if ($('#seguridad').val() == 1) {
                $('#sec_vigilancia').show();
                $('#vigilancia').attr("required", "true");
            } else {
                $('#vigilancia').removeAttr('required');
                $('#sec_vigilancia').hide();
            }
        });

        $('#t_cuota').change(function () {
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

        });

        $('#adm_cp').keyup(function () {
            var valor = $('#adm_cp').val();
            $('#adm_cp_pesos').html("$ " + Intl.NumberFormat("es-CO").format(valor));
        });

        $('#adm_cd').keyup(function () {
            var valor = $('#adm_cd').val();
            $('#adm_cd_pesos').html("$ " + Intl.NumberFormat("es-CO").format(valor));
        });


    } else if ($('#planes_tarjeta').length) {
        $('#m_usuario').addClass("activo");
        $('#m_negocio').addClass("activo");
        $('#m_detalles').addClass("activo");
        $('#m_conjunto').addClass("activo");
        $('#m_planes').addClass("activo");
        $('#m_barra').css("width", "65%");
        $('.toast').toast("show");

        $('#modificar').change(function () {
            if ($('#modificar').prop('checked')) {
                $('#sec_valor').show();
            } else {
                $('#sec_valor').hide();
            }
        });

        $('#planes').change(function () {
            $('#calculadora').show();
        });

    } else if ($('#fotos').length) {
        $('#m_usuario').addClass("activo");
        $('#m_negocio').addClass("activo");
        $('#m_detalles').addClass("activo");
        $('#m_conjunto').addClass("activo");
        $('#m_planes').addClass("activo");
        $('#m_camara').addClass("activo");
        $('#m_barra').css("width", "80%");
    } else if ($('#agradecimiento').length) {
        $('#m_usuario').addClass("activo");
        $('#m_negocio').addClass("activo");
        $('#m_detalles').addClass("activo");
        $('#m_conjunto').addClass("activo");
        $('#m_planes').addClass("activo");
        $('#m_camara').addClass("activo");
        $('#m_final').addClass("activo");
        $('#m_barra').css("width", "100%");
    }
});