$(document).ready(function() {


    var year = (new Date).getFullYear();

    if ($('#tipo_inm').val() == 2) {
        $('#aptos2').show();
        $('#piso').attr("required", "true");
        $('#zonas_verdes').hide();
    } else if ($('#tipo_inm').val() == 1) {
        $('#aptos2').hide();
        $('#piso').removeAttr('required');
        $('#zonas_verdes').show();
        $('#sec_n_ascensores').hide();
        $('#ascensor').removeAttr('checked');
    }

    $('#tipo_inm').change(function() {
        if ($('#tipo_inm').val() == 2) {
            $('#aptos2').show();
        } else if ($('#tipo_inm').val() == 1) {
            $('#aptos2').hide();
        }
    });


    if ($('#ascensor').val() == "Si") {
        $('#sec_n_ascensores').show();
        $('#n_ascensores').attr("required", "true");
    } else {
        $('#sec_n_ascensores').hide();
        $('#n_ascensores').removeAttr('required');
    }

    $('#ascensor').change(function() {
        if ($('#ascensor').val() == "Si") {
            $('#sec_n_ascensores').show();
            $('#n_ascensores').attr("required", "true");
        } else {
            $('#sec_n_ascensores').hide();
            $('#n_ascensores').removeAttr('required');
        }
    });

    if ($('#conjunto').val() == "Si") {
        $('#detalles').show();
        $('#direccion_comp').attr("required", "true");
        $('#caracteristicas').show();
    } else {
        $('#direccion_comp').removeAttr('required');
        $('#detalles').hide();
        $('#caracteristicas').hide();
        $('#adm_cp').removeAttr('required');
        $('#vigilancia').removeAttr('required');
        $('#seguridad').removeAttr('required');
        $('#t_cuota').removeAttr('required');
        $('#nombre_c_e').removeAttr('required');
    }

    $('#conjunto').change(function() {
        if ($('#conjunto').val() == "Si") {
            $('#detalles').show();
            $('#direccion_comp').attr("required", "true");
            $('#caracteristicas').show();
        } else {
            $('#direccion_comp').removeAttr('required');
            $('#detalles').hide();
            $('#caracteristicas').hide();
            $('#adm_cp').removeAttr('required');
            $('#vigilancia').removeAttr('required');
            $('#seguridad').removeAttr('required');
            $('#t_cuota').removeAttr('required');
            $('#nombre_c_e').removeAttr('required');
        }
    });


    if ($('#espropietario').val() == "Si") {
        $('#pqsolicita').removeAttr('required');
        $('#pqgrupo').hide();
    } else {
        $('#pqsolicita').attr("required", "true");
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



    if ($('#habitado').val() == 'Si') {
        $('#arrendado').show();

    } else {
        $('#arrendado').hide();
    }

    $('#habitado').change(function() {
        if ($('#habitado').val() == 'Si') {
            $('#arrendado').show();

        } else {
            $('#arrendado').hide();
        }
    });


    if ($('#tipo').val() == 2) {
        $('#cortina').show();
    }
    if ($('#tipo').val() == 1) {
        $('#cortina').hide();
    }

    $('#tipo').change(function() {
        console.log("cmbio la chingada");
        if ($('#tipo').val() == 2) {
            $('#cortina').show();
        }
        if ($('#tipo').val() == 1) {
            $('#cortina').hide();
        }
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

    $('#garaje').change(function() {
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

    if ($('#balcon').val() == 'No' && $('#terraza').val() == 'No') {
        $('#area_bt').hide();
    } else {
        $('#area_bt').show();
    }

    $('#balcon').change(function() {
        if ($('#balcon').val() == 'No' && $('#terraza').val() == 'No') {
            $('#area_bt').hide();
        } else {
            $('#area_bt').show();
        }
    });

    $('#terraza').change(function() {
        if ($('#balcon').val() == 'No' && $('#terraza').val() == 'No') {
            $('#area_bt').hide();
        } else {
            $('#area_bt').show();
        }
    });

    if ($('#balcon').val() == 'Si') {
        $('#area_balcon_secc').show();
        $('#area_balcon').attr("required", "true");
    } else {
        $('#area_balcon_secc').hide();
        $('#area_balcon').removeAttr('required');
    }

    $('#balcon').change(function() {
        if ($('#balcon').val() == 'Si') {
            $('#area_balcon_secc').show();
            $('#area_balcon').attr("required", "true");
        } else {
            $('#area_balcon_secc').hide();
            $('#area_balcon').removeAttr('required');
        }
    });

    if ($('#terraza').val() == 'Si') {
        $('#area_terraza_secc').show();
        $('#area_terraza').attr("required", "true");
    } else {
        $('#area_terraza_secca').hide();
        $('#area_terraza').removeAttr('required');
    }

    $('#terraza').change(function() {
        if ($('#terraza').val() == 'Si') {
            $('#area_terraza_secc').show();
            $('#area_terraza').attr("required", "true");
        } else {
            $('#area_terraza_secc').hide();
            $('#area_terraza').removeAttr('required');
        }
    });

    if ($('#t_cuota').val() == 2) {
        $('#descuento').show();
        $('#adm_cd').show();
        $('#plena').show();
        $('#adm_cd').attr("required", "true");
    } else if ($('#t_cuota').val() == 1) {
        $('#descuento').hide();
        $('#adm_cd').show();
        $('#adm_cd').val("");
        $('#plena').hide();
        $('#adm_cd').removeAttr('required');
    } else if ($('#t_cuota').val() == 3) {
        $('#descuento').hide();
        $('#adm_cd').hide();
        $('#adm_cp').hide();
        $('#plena').hide();
        $('#adm_cd').removeAttr('required');
    }

    $('#t_cuota').change(function() {
        if ($('#t_cuota').val() == 2) {
            $('#descuento').show();
            $('#adm_cd').show();
            $('#adm_cp').show();
            $('#plena').show();
            $('#adm_cd').attr("required", "true");
        } else if ($('#t_cuota').val() == 1) {
            $('#descuento').hide();
            $('#adm_cd').show();
            $('#adm_cp').show();
            $('#adm_cd').val("");
            $('#plena').hide();
            $('#adm_cd').removeAttr('required');
        } else if ($('#t_cuota').val() == 3) {
            $('#descuento').hide();
            $('#adm_cd').hide();
            $('#adm_cp').hide();
            $('#plena').hide();
            $('#adm_cd').removeAttr('required');
        }
    });



    //$('#adm_cd_pesos').html("$ " + Intl.NumberFormat("es-CO").format($('#adm_cd').val()));
    //$('#valorpesos').html("$ " + Intl.NumberFormat("es-CO").format($('#valor').val()));


    $('#conc_precio').keyup(function() {
        $('#conceptopesos').html("$ " + Intl.NumberFormat("es-CO").format($('#conc_precio').val()));
    });

    $('#precio_contrato').keyup(function() {
        $('#contratopesos').html("$ " + Intl.NumberFormat("es-CO").format($('#precio_contrato').val()));
    });

});