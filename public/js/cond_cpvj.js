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
        $('#basico_arr').hide();
        $('#estandar_arr').hide();
        $('#premium_arr').hide();
        $('#forestta_arr').hide();
        $('#basico_ven').hide();
        $('#estandar_ven').hide();
        $('#premium_ven').hide();
        $('#rural_ven').hide();
        $('#titventa').hide();
        $('#titarr').hide();
        $('#titventa_rural').hide();
        if ($('#tipo_neg').val() == 'Arriendo') {
            if ($('#plan').val() == 1) {
                $('#titarr').show();
                $('#basico_arr').show();
                $('#estandar_arr').hide();
                $('#premium_arr').hide();
                $('#forestta_arr').hide();
            } else if ($('#plan').val() == 2) {
                $('#titarr').show();
                $('#basico_arr').hide();
                $('#estandar_arr').show();
                $('#premium_arr').hide();
                $('#forestta_arr').hide();
            } else if ($('#plan').val() == 3) {
                $('#titarr').show();
                $('#basico_arr').hide();
                $('#estandar_arr').hide();
                $('#premium_arr').show();
                $('#forestta_arr').hide();
            } else if ($('#plan').val() == 4) {
                $('#titarr').show();
                $('#basico_arr').hide();
                $('#estandar_arr').hide();
                $('#premium_arr').hide();
                $('#forestta_arr').show();
            } else {
                $('#titarr').hide();
                $('#basico_arr').hide();
                $('#estandar_arr').hide();
                $('#premium_arr').hide();
                $('#forestta_arr').hide();
            }
        } else if ($('#tipo_neg').val() == 'Venta') {
            if ($('#plan').val() == 1) {
                $('#titventa').show();
                $('#basico_ven').show();
                $('#estandar_ven').hide();
                $('#premium_ven').hide();
                $('#rural_ven').hide();
            } else if ($('#plan').val() == 2) {
                $('#titventa_ven').show();
                $('#basico_ven').show();
                $('#estandar_ven').hide();
                $('#premium_ven').hide();
                $('#rural_ven').hide();
            } else if ($('#plan').val() == 3) {
                $('#titventa_ven').show();
                $('#basico_ven').hide();
                $('#estandar_ven').show();
                $('#premium_ven').hide();
                $('#rural_ven').hide();
            } else if ($('#plan_ven').val() == 4) {
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
    $('#plan').change(function() {
        if ($('#contrato').length) {
            $('#basico_arr').hide();
            $('#estandar_arr').hide();
            $('#premium_arr').hide();
            $('#forestta_arr').hide();
            $('#basico_ven').hide();
            $('#estandar_ven').hide();
            $('#premium_ven').hide();
            $('#rural_ven').hide();
            $('#titventa').hide();
            $('#titarr').hide();
            $('#titventa_rural').hide();
            if ($('#tipo_neg').val() == 'Arriendo') {
                if ($('#plan').val() == 1) {
                    $('#titarr').show();
                    $('#basico_arr').show();
                    $('#estandar_arr').hide();
                    $('#premium_arr').hide();
                    $('#forestta_arr').hide();
                } else if ($('#plan').val() == 2) {
                    $('#titarr').show();
                    $('#basico_arr').hide();
                    $('#estandar_arr').show();
                    $('#premium_arr').hide();
                    $('#forestta_arr').hide();
                } else if ($('#plan').val() == 3) {
                    $('#titarr').show();
                    $('#basico_arr').hide();
                    $('#estandar_arr').hide();
                    $('#premium_arr').show();
                    $('#forestta_arr').hide();
                } else if ($('#plan').val() == 4) {
                    $('#titarr').show();
                    $('#basico_arr').hide();
                    $('#estandar_arr').hide();
                    $('#premium_arr').hide();
                    $('#forestta_arr').show();
                } else {
                    $('#titarr').hide();
                    $('#basico_arr').hide();
                    $('#estandar_arr').hide();
                    $('#premium_arr').hide();
                    $('#forestta_arr').hide();
                }
            } else if ($('#tipo_neg').val() == 'Venta') {
                if ($('#plan').val() == 1) {
                    $('#titventa').show();
                    $('#basico_ven').show();
                    $('#estandar_ven').hide();
                    $('#premium_ven').hide();
                    $('#rural_ven').hide();
                } else if ($('#plan').val() == 2) {
                    $('#titventa').show();
                    $('#basico_ven').hide();
                    $('#estandar_ven').show();
                    $('#premium_ven').hide();
                    $('#rural_ven').hide();
                } else if ($('#plan').val() == 3) {
                    $('#titventa').show();
                    $('#basico_ven').hide();
                    $('#estandar_ven').hide();
                    $('#premium_ven').show();
                    $('#rural_ven').hide();
                } else if ($('#plan').val() == 4) {
                    $('#titventa_rural').show();
                    $('#basico_ven').hide();
                    $('#estandar_ven').hide();
                    $('#premium_ven').hide();
                    $('#rural_ven').show();
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
})