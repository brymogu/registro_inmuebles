$(document).ready(function() {

    if ($('#modelos').val() == 1) {
        $('#contrato').show();
        $('#cpvj').show();
    } else if ($('#modelos').val() == 2) {
        $('#contrato').hide();
        $('#cpvj').show();
    } else {
        $('#contrato').show();
        $('#cpvj').hide();
    }

    $('#modelos').change(function() {
        if ($('#modelos').val() == 1) {
            $('#contrato').show();
            $('#cpvj').show();
        } else if ($('#modelos').val() == 2) {
            $('#contrato').hide();
            $('#cpvj').show();
        } else {
            $('#contrato').show();
            $('#cpvj').hide();
        }
    });

    if ($('#contrato').length) {
        $('#basico').hide();
        $('#estandar').hide();
        $('#premium').hide();
        $('#forestta').hide();
        $('#titventa').hide();
        $('#titventa_rural').hide();
        $('#rural').hide();
        if ($('#tipo_neg').val() == 1) {
            if ($('#sec_contratos').val() == 1) {
                $('#basico_arr').show();
                $('#estandar_arr').hide();
                $('#premium_arr').hide();
                $('#forestta_arr').hide();
            } else if ($('#sec_contratos').val() == 2) {
                $('#basico_arr').show();
                $('#estandar_arr').hide();
                $('#premium_arr').hide();
                $('#forestta_arr').hide();
            } else if ($('#sec_contratos').val() == 3) {
                $('#basico_arr').hide();
                $('#estandar_arr').show();
                $('#premium_arr').hide();
                $('#forestta_arr').hide();
            } else if ($('#sec_contratos').val() == 4) {
                $('#basico_arr').hide();
                $('#estandar_arr').hide();
                $('#premium_arr').hide();
                $('#forestta_arr').show();
            } else {
                $('#basico_arr').hide();
                $('#estandar_arr').hide();
                $('#premium_arr').hide();
                $('#forestta_arr').hide();
            }
        } else if ($('#tipo_neg').val() == 0) {
            if ($('#sec_contratos').val() == 1) {
                $('#titventa').show();
                $('#basico_ven').show();
                $('#estandar_ven').hide();
                $('#premium_ven').hide();
                $('#rural_ven').hide();
            } else if ($('#sec_contratos').val() == 2) {
                $('#titventa_ven').show();
                $('#basico_ven').show();
                $('#estandar_ven').hide();
                $('#premium_ven').hide();
                $('#rural_ven').hide();
            } else if ($('#sec_contratos').val() == 3) {
                $('#titventa_ven').show();
                $('#basico_ven').hide();
                $('#estandar_ven').show();
                $('#premium_ven').hide();
                $('#rural_ven').hide();
            } else if ($('#sec_contratos_ven').val() == 4) {
                $('#titventa_rural_ven').show();
                $('#basico_ven').hide();
                $('#estandar_ven').hide();
                $('#premium_ven').hide();
                $('#forestta_ven').show();
            } else {
                $('#titventa').hide();
                $('#titventa_rural').hide();
                $('#basico_ven').hide();
                $('#estandar_ven').hide();
                $('#premium_ven').hide();
                $('#rural_ven').hide();
            }
        }
    }
});