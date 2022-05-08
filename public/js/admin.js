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
});