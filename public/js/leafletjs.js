var tileLayer = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
    maxZoom: 18,
});

var map = new L.map('map', {
    'center': [-8.309882117649769, 114.56416986814997],
    'zoom': 11,
    'layers': [tileLayer]
});


// var markerClusters = L.markerClusterGroup().addTo(map);

// var markers = [];

// var marker = null;

// var isOnDrag = false;

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
  if (marker !== null) {
    map.removeLayer(marker);
  }
  if (country == "Kawitan") {
    marker = L.marker(e.latlng, {
        icon: kawitanIcon
    }).addTo(map);
  } else {

      marker = L.marker(e.latlng, {
        icon: swaginaIcon
      }).addTo(map);
  }
});

// addMarker = function(latlng, index) {
//     if (country == "Kawitan" ) {

//         var marker = L.marker(latlng, {
//             icon: swaginaIcon
//         }).addTo(map);
//     } else {
        
//         var marker = L.marker(latlng, {
//             icon: kawitanIcon
//         }).addTo(map);
//     }
    

//     // return marker;

// };

// // puras.forEach(function (pura, index) {
// //     markers.push(
// //         new L.Marker([pura.lat, pura.lng], {
// //             icon: tigaIcon,
// //             draggable: false,
// //         })
// //     );
// //     markerClusters.addLayer(L.layerGroup(markers));

// // });
// // var newMarker = null;

// // map.on('click', function (e) {
// //     if (newMarker !== null) {
// //         map.removeLayer(newMarker);
// //     }
// //     newMarker = addMarker(e.latlng,markers.length);
// // });

// map.on('click', function(e) {
//     if(marker !== null){
//         map.removeLayer(marker);
//     }
//     marker = addMarker(e.latlng,markers.length);

//     // var newMarker = null;
//     // if (newMarker) { // check
//     //     newMarker.removeFrom(map); // remove
//     // } else { //
//     //     newMarker = addMarker(e.latlng,markers.length);
//     // }
//     // markers.push(newMarker);

//     // marker = new L.Marker(e.latlng); // set

//     // document.getElementById("lat").value = e.latlng.lat;
//     // document.getElementById("lng").value = e.latlng.lng;
//     // const iSwagina = L.marker(e.latlng, {icon: swaginaIcon}).bindPopup('I am a green leaf.').addTo(map);
//     // const iKawitan = L.marker(e.latlng, {icon: kawitanIcon}).bindPopup('I am a red leaf.').addTo(map);
//     // const iTiga = L.marker(e.latlng, {icon: tigaIcon}).bindPopup('I am an orange leaf.').addTo(map);
//     // const iJagat = L.marker(e.latlng, {icon: jagatIcon}).bindPopup('I am an orange leaf.').addTo(map);
// });