$(document).ready(function () {

    if ($('#editar').length) {
        $(".editar a").css("color", "#01303c");
        $(".editar").css("background", "#ffeece");

    } else if ($('#home').length) {
        $(".home a").css("color", "#01303c");
        $(".home").css("background", "#ffeece");
    } else if ($('#descargas').length) {
        $(".descargas a").css("color", "#01303c");
        $(".descargas").css("background", "#ffeece");
    }
    else if ($('#usuarios').length) {
        $(".usuarios a").css("color", "#01303c");
        $(".usuarios").css("background", "#ffeece");
    }
    else if ($('#contrasena').length) {
        $(".usuarios a").css("color", "#01303c");
        $(".usuarios").css("background", "#ffeece");
        $("#validacion").hide();
        $("#boton").hide();

        $("#confirmar").on('keyup', function () {
            var password = $("#password").val();
            var confirmPassword = $("#confirmar").val();

            if (password != confirmPassword) {
                $("#validacion").show();
                $("#boton").hide();
            }
            else {
                $("#validacion").hide();
                $("#boton").show();
            }

        });
    }

});