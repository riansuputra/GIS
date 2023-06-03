var map = L.map('map').setView([-8.309882117649769, 114.56416986814997], 11);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
    maxZoom: 18,
}).addTo(map);

var markerClusters = L.markerClusterGroup().addTo(map);

var markers = [];

var isOnDrag = false;

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

addMarker = function(latlng, index) {
    if (country == "Kawitan" ) {

        var iSwagina = L.marker(latlng, {
            icon: swaginaIcon
        }).addTo(map);
    } else {
        
        var iKawitan = L.marker(latlng, {
            icon: kawitanIcon
        }).addTo(map);
    }
    

    // return marker;

};

// puras.forEach(function (pura, index) {
//     markers.push(
//         new L.Marker([pura.lat, pura.lng], {
//             icon: tigaIcon,
//             draggable: false,
//         })
//     );
//     markerClusters.addLayer(L.layerGroup(markers));

// });

map.on('click', function(e) {
    var newMarker = addMarker(e.latlng,markers.length);
    markers.push(newMarker);


    // document.getElementById("lat").value = e.latlng.lat;
    // document.getElementById("lng").value = e.latlng.lng;
    // const iSwagina = L.marker(e.latlng, {icon: swaginaIcon}).bindPopup('I am a green leaf.').addTo(map);
    // const iKawitan = L.marker(e.latlng, {icon: kawitanIcon}).bindPopup('I am a red leaf.').addTo(map);
    // const iTiga = L.marker(e.latlng, {icon: tigaIcon}).bindPopup('I am an orange leaf.').addTo(map);
    // const iJagat = L.marker(e.latlng, {icon: jagatIcon}).bindPopup('I am an orange leaf.').addTo(map);
});