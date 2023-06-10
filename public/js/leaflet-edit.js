var tileLayer = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
    maxZoom: 18,
});

var map = new L.map('map', {
    'center': [-8.309882117649769, 114.56416986814997],
    'zoom': 11,
    'layers': [tileLayer]
});


const puraIcon = L.Icon.extend({
    options: {
        iconSize:     [40, 40],
        iconAnchor:   [20, 40],
    }
});

const swaginaIcon = new puraIcon({iconUrl: '/foto/swaginaIcon.png'});
const kawitanIcon = new puraIcon({iconUrl: '/foto/kawitanIcon.png'});
const tigaIcon = new puraIcon({iconUrl: '/foto/tigaIcon.png'});
const jagatIcon = new puraIcon({iconUrl: '/foto/jagatIcon.png'});

var marker = null;
var lat = 0.0;
var lng = 0.0;

var onDrag = function(e) {
    var latlng = marker.getLatLng();
    document.getElementById("lat").value = latlng.lat;
    document.getElementById("lng").value = latlng.lng;
};

if (puras.jenis == "Kawitan") {
    var marker = new L.Marker([puras.lat, puras.lng], {
        icon: kawitanIcon,
        draggable: false,
    }).addTo(map);
} else if (puras.jenis == "Swagina") {
    var marker = new L.Marker([puras.lat, puras.lng], {
        icon: swaginaIcon,
        draggable: false,
    }).addTo(map);
} else if (puras.jenis == "Kahyangan Tiga") {
    var marker = new L.Marker([puras.lat, puras.lng], {
        icon: tigaIcon,
        draggable: false,
    }).addTo(map);
} else if (puras.jenis == "Kahyangan Jagat") {
    var marker = new L.Marker([puras.lat, puras.lng], {
        icon: jagatIcon,
        draggable: false,
    }).addTo(map);
}

var onClick = function(e) {
    map.off('click', onclick);
    // marker = L.marker(e.latlng, {draggable: true}).addTo(map);
    if (marker !== null) {
        map.removeLayer(marker);
    }
    if (jenis == "Kawitan") {
        marker = L.marker(e.latlng, {
            icon: kawitanIcon,
            draggable: true
        }).addTo(map);
    } else if (jenis == "Swagina"){
        marker = L.marker(e.latlng, {
            icon: swaginaIcon,
            draggable: true
        }).addTo(map);
    } else if (jenis == "Kahyangan Tiga"){
        marker = L.marker(e.latlng, {
            icon: tigaIcon,
            draggable: true
        }).addTo(map);
    } else if (jenis == "Kahyangan Jagat"){
        marker = L.marker(e.latlng, {
            icon: jagatIcon,
            draggable: true
        }).addTo(map);
    } else {
        
    }
    lat = e.latlng.lat;
    lng = e.latlng.lng;
    document.getElementById("lat").value = e.latlng.lat;
    document.getElementById("lng").value = e.latlng.lng;

    marker.on('drag', onDrag);
};

map.on('click', onClick);

