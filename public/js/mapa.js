var mymap = L.map('map').setView([4.610932545057497, -74.07031589840588], 12);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(mymap);

function mapa_escoger() {
    latitud = $('#latitud').val();
    longitud = $('#longitud').val();
    direccion = $('#direccion').val();

    if (longitud != "" && latitud != "") {
        coordenadas = [latitud, longitud];
        var marker = new L.marker(coordenadas, {
            draggable: false,
            autoPan: true,
        }).addTo(mymap);
        mymap.flyTo(coordenadas, 15);
    } else {
        mostrarmapa();
    }
}



function mostrarmapa() {
    direccion = $('#direccion').val();
    ciudad = $('#ciudad').val();
    direccion = direccion.replace(/ /g, '+');
    direccion = direccion.replace('#', '%23');
    // ciudad = $('#ciudad option:selected').text();
    ciudad = ciudad.normalize();
    direccion = direccion + ',' + ciudad;

    var url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + direccion + "|locality:" + ciudad + "|country:CO&key=AIzaSyDoeTIRXgizNo-4sAMEORiO5Jtblf_0t0k";
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
        draggable: false,
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

    mymap.on('click', function(e) {
        mymap.removeLayer(marker);
        marker = new L.marker(e.latlng, {
            draggable: true,
            autoPan: true,
        }).addTo(mymap);
        document.getElementById('latitud').value = marker.getLatLng().lat;
        document.getElementById('longitud').value = marker.getLatLng().lng;
    });
}