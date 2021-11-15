var mymap = L.map('map').setView([4.6791626, -74.1148519], 10);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(mymap);


function mostrarmapa() {
    direccion = $('#direccion').val();
    direccion = direccion.replace(/ /g, '+');
    direccion = direccion.replace('#', '%23');
    ciudad = $('#ciudad option:selected').text();
    ciudad = ciudad.normalize();
    var url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + direccion + "|locality:" + ciudad + "|country:CO,+CO&key=AIzaSyDoeTIRXgizNo-4sAMEORiO5Jtblf_0t0k";
    console.log(url);

    $.getJSON(url, function(data) {
        if (data.status == "OK") {
            var coordenadas = data.results[0].geometry.location;
            var zoom = 15;
        } else {
            var coordenadas = [4.61095135, -74.070241299422];
            var zoom = 12;
        }
        pintarmapa(coordenadas, zoom);
    });
}

function pintarmapa(coordenadas, zoom) {
    var marker = new L.marker(coordenadas, {
        draggable: true,
        autoPan: true,
    }).addTo(mymap);
    mymap.flyTo(coordenadas, zoom);
    document.getElementById('latitud').value = marker.getLatLng().lat;
    document.getElementById('longitud').value = marker.getLatLng().lng;

    marker.on('dragend', function(e) {
        lat = marker.getLatLng().lat;
        long = marker.getLatLng().lng;
        document.getElementById('latitud').value = lat;
        document.getElementById('longitud').value = long;
    });

    var myOffcanvas = document.getElementById('offcanvasBottom')
    myOffcanvas.addEventListener('hidden.bs.offcanvas', function() {
        $('#botonmapa').hide();
        $('#enviarnegocio').show();
        mymap.removeLayer(marker);
    })

}