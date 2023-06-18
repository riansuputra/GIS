var tileLayer = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
    maxZoom: 18,
});

var map = new L.map('map', {
    'center': [puras.lat, puras.lng],
    'zoom': 11,
    'layers': [tileLayer]
});

const puraIcon = L.Icon.extend({
    options: {
        iconSize:     [40, 40],
        iconAnchor:   [20, 40],
    }
});

const jagatIcon = new puraIcon({iconUrl: '/foto/jagatIcon.png'});

var marker = L.marker([puras.lat, puras.lng],{
    icon: jagatIcon,
    draggable: true
}).addTo(map);

marker.on('drag', function(event) {
    var latlng = marker.getLatLng();
    document.getElementById("lat").value = latlng.lat;
    document.getElementById("lng").value = latlng.lng;
});
var lat = puras.lat;
var lng = puras.lng;

var onDrag = function(e) {
    var latlng = marker.getLatLng();
    document.getElementById("lat").value = latlng.lat;
    document.getElementById("lng").value = latlng.lng;
};

// var marker = new L.Marker([lat, lng], {
//     icon: jagatIcon,
//     draggable: true,
// }).addTo(map);

var onClick = function(e) {
    map.off('click', onclick);
    // marker = L.marker(e.latlng, {draggable: true}).addTo(map);
    if (marker !== null) {
        map.removeLayer(marker);
    }
    
    marker = L.marker(e.latlng, {
        icon: jagatIcon,
        draggable: true
    }).addTo(map);
    
    lat = e.latlng.lat;
    lng = e.latlng.lng;
    document.getElementById("lat").value = e.latlng.lat;
    document.getElementById("lng").value = e.latlng.lng;

    marker.on('drag', onDrag);
};

map.on('click', onClick);

