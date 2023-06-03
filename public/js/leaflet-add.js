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

map.on('click', function (e) {
    document.getElementById("lat").value = e.latlng.lat;
    document.getElementById("lng").value = e.latlng.lng;
    
    // alert(e.latlng);

    if (marker !== null) {
        map.removeLayer(marker);
    }
    if (country == "Kawitan") {
        marker = L.marker(e.latlng, {
            icon: kawitanIcon
        }).addTo(map);
    } else if (country == "Swagina"){
        marker = L.marker(e.latlng, {
            icon: swaginaIcon
        }).addTo(map);
    } else if (country == "Kahyangan Tiga"){
        marker = L.marker(e.latlng, {
            icon: tigaIcon
        }).addTo(map);
    } else if (country == "Kahyangan Jagat"){
        marker = L.marker(e.latlng, {
            icon: jagatIcon
        }).addTo(map);
    } else {
        
    }
});
