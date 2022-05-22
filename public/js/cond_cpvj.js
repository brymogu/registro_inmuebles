$(document).ready(function() {


    if ($('#tipo_neg').val() == 'Arriendo') {
        $('#venta').hide();
        $('#titarr').show();
        $("#plan option[value='4']").hide();
        var plan_selected = $('#plan').val();
        console.log(plan_selected);
        switch (plan_selected) {
            case "1":
                $('#basico_arr').show();
                $('#estandar_arr').hide();
                $('#premium_arr').hide();
                break;
            case "2":
                $('#basico_arr').hide();
                $('#estandar_arr').show();
                $('#premium_arr').hide();
                break;
            case "3":
                $('#basico_arr').hide();
                $('#estandar_arr').hide();
                $('#premium_arr').show();
                break;
        }
    } else {
        $('#arriendo').hide();
        $("#plan option[value='4']").show();
        $('#titventa').show();
        var plan_selected = $('#plan').val();
        switch (plan_selected) {
            case "1":
                $('#basico_ven').show();
                $('#estandar_ven').hide();
                $('#premium_ven').hide();
                $('#rural_ven').hide();
                break;
            case "2":
                $('#basico_ven').hide();
                $('#estandar_ven').show();
                $('#premium_ven').hide();
                $('#rural_ven').hide();
                break;
            case "3":
                $('#basico_ven').hide();
                $('#estandar_ven').hide();
                $('#premium_ven').show();
                $('#rural_ven').hide();
                break;
            case "4":
                $('#titventa_ven').hide();
                $('#basico_ven').hide();
                $('#estandar_ven').hide();
                $('#premium_ven').hide();
                $('#rural_ven').show();
                break;
        }
    }

    $('#modelos').change(function() {
        if ($('#modelos').val() == 1) {
            $('#contrato').show();
            $('#salto_contrato').show();
            $('#cpvj').show();
        } else if ($('#modelos').val() == 2) {
            $('#sec_contratos').hide();
            $('#contrato').hide();
            $('#salto_contrato').hide();
            $('#cpvj').show();
        } else {
            $('#salto_contrato').hide();
            $('#sec_contratos').show();
            $('#contrato').show();
            $('#cpvj').hide();
        }
    });



    $('#plan').change(function() {
        if ($('#tipo_neg').val() == 'Arriendo') {
            $('#venta').hide();
            $('#titarr').show();
            $("#plan option[value='4']").hide();
            var plan_selected = $('#plan').val();
            console.log(plan_selected);
            switch (plan_selected) {
                case "1":
                    $('#basico_arr').show();
                    $('#estandar_arr').hide();
                    $('#premium_arr').hide();
                    break;
                case "2":
                    $('#basico_arr').hide();
                    $('#estandar_arr').show();
                    $('#premium_arr').hide();
                    break;
                case "3":
                    $('#basico_arr').hide();
                    $('#estandar_arr').hide();
                    $('#premium_arr').show();
                    break;
            }
        } else {
            $('#arriendo').hide();
            $("#plan option[value='4']").show();
            $('#titventa').show();
            var plan_selected = $('#plan').val();
            switch (plan_selected) {
                case "1":
                    $('#basico_ven').show();
                    $('#estandar_ven').hide();
                    $('#premium_ven').hide();
                    $('#rural_ven').hide();
                    break;
                case "2":
                    $('#basico_ven').hide();
                    $('#estandar_ven').show();
                    $('#premium_ven').hide();
                    $('#rural_ven').hide();
                    break;
                case "3":
                    $('#basico_ven').hide();
                    $('#estandar_ven').hide();
                    $('#premium_ven').show();
                    $('#rural_ven').hide();
                    break;
                case "4":
                    $('#titventa').hide();
                    $('#basico_ven').hide();
                    $('#estandar_ven').hide();
                    $('#premium_ven').hide();
                    $('#rural_ven').show();
                    break;
            }
        }

    });
})