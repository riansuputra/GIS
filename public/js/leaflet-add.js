var tileLayer = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
    maxZoom: 18,
});

var map = new L.map('map', {
    'center': [-8.3641659, 115.0553845],
    'zoom': 10,
    'layers': [tileLayer]
});


const puraIcon = L.Icon.extend({
    options: {
        iconSize:     [40, 40],
        iconAnchor:   [20, 40],
    }
});

const jagatIcon = new puraIcon({iconUrl: '/foto/jagatIcon.png'});

var marker = null;
var lat = 0.0;
var lng = 0.0;

var onDrag = function(e) {
    var latlng = marker.getLatLng();
    document.getElementById("lat").value = latlng.lat;
    document.getElementById("lng").value = latlng.lng;
};

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

// map.on('click', function (e) {
//     document.getElementById("lat").value = e.latlng.lat;
//     document.getElementById("lng").value = e.latlng.lng;
    
//     // alert(e.latlng);

//     if (marker !== null) {
//         map.removeLayer(marker);
//     }
//     if (country == "Kawitan") {
//         marker = L.marker(e.latlng, {
//             icon: kawitanIcon,
//             draggable: true
//         }).addTo(map);
//     } else if (country == "Swagina"){
//         marker = L.marker(e.latlng, {
//             icon: swaginaIcon
//         }).addTo(map);
//     } else if (country == "Kahyangan Tiga"){
//         marker = L.marker(e.latlng, {
//             icon: tigaIcon
//         }).addTo(map);
//     } else if (country == "Kahyangan Jagat"){
//         marker = L.marker(e.latlng, {
//             icon: jagatIcon
//         }).addTo(map);
//     } else {
        
//     }
// });

// // marker.on('dragend', function (e) {
// //     document.getElementById("lat").value = e.latlng.lat;
// marker.on('drag', function(e) {
//     document.getElementById("lat").value = marker.getLatLng().lat;
//     document.getElementById("lng").value = marker.getLatLng().lng;
    
// });
// //     document.getElementById("lng").value = e.latlng.lng;
// //   });
