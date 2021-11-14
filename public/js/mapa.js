var mymap = L.map('map').setView([4.6791626, -74.1148519], 10);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(mymap);


function localizar() {

    direccion = $('#direccion').val();
    direccion = direccion.replace(/ /g, '+');
    direccion = direccion.replace('#', '%23');
    var url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + direccion + ",+Bogota,+CO&key=AIzaSyDoeTIRXgizNo-4sAMEORiO5Jtblf_0t0k";

    $.getJSON(url, function(data) {

        if (data.status == "OK") {
            $('#nolocation').hide();
            var coordenadas = data.results[0].geometry.location;
            var zoom = 15;
            console.log("si" + coordenadas);
            addmapa(coordenadas, zoom);
        } else {
            $('#nolocation').show();
            var coordenadas = [4.61095135, -74.070241299422];
            var zoom = 12;
            console.log("no" + coordenadas);
            addmapa(coordenadas, zoom);
        }
    });

}

function addmapa(coordenadas, zoom) {
    var marker = new L.marker(coordenadas, {
        draggable: true,
        autoPan: true,
    }).addTo(mymap);
    mymap.flyTo(coordenadas, zoom);

    var myCollapse = document.getElementById('collapsarmapa')
    var bsCollapse = new bootstrap.Collapse(myCollapse, {
        toggle: true
    });
}