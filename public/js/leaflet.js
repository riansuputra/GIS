var map = L.map('map').setView([-8.3641659, 115.0553845], 10.5);
var routingControl;

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
    maxZoom: 18,
}).addTo(map);

routingControl = L.Routing.control({
    routeWhileDragging: true
}).addTo(map);

var markers = [];

var markerClusters = L.markerClusterGroup().addTo(map); 

var isOnDrag = false;
var firstWaypoint = null;
var secondWaypoint = null;
// L.Routing.control({
    
//     routeWhileDragging: true
// }).addTo(map);

const puraIcon = L.Icon.extend({
    options: {
        iconSize:     [40, 40],
        iconAnchor:   [20, 40],
    }
});

function getColor(d) {
    return d === 'Swagina' ? "btn-warning" :
    d === 'Kawitan'  ? "btn-danger" :
    d === 'Kahyangan Tiga'  ? "btn-primary" :
    d === 'Kahyangan Jagat' ? "btn-dark" :
                        "#ff7f00";
}

function style(feature) {
    return {
        weight: 1.5,
        opacity: 1,
        fillOpacity: 1,
        radius: 6,
        fillColor: getColor(feature.properties.TypeOfIssue),
        color: "grey"

    };
}

var legend = L.control({position: 'bottomleft'});
    legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend mx-3 my-3');
    labels = ['<strong>Jenis Pura</strong>'],
    categories = ['Swagina','Kawitan','Kahyangan Tiga','Kahyangan Jagat'];

    for (var i = 0; i < categories.length; i++) {

            div.innerHTML += 
            labels.push(
                '<button type="button" class="btn ' + getColor(categories[i]) + ' rounded-pill"></button> ' +
            (categories[i] ? categories[i] : '+'));

        }
        div.innerHTML = labels.join('<br>');
    return div;
    };
    legend.addTo(map);

const swaginaIcon = new puraIcon({iconUrl: '/foto/swaginaIcon.png'});
const kawitanIcon = new puraIcon({iconUrl: '/foto/kawitanIcon.png'});
const tigaIcon = new puraIcon({iconUrl: '/foto/tigaIcon.png'});
const jagatIcon = new puraIcon({iconUrl: '/foto/jagatIcon.png'});

puras.forEach(function (pura, index) {
    if(pura.jenis == "Kawitan") {

        markers.push(
            new L.Marker([pura.lat, pura.lng], {
                icon: kawitanIcon,
                draggable: false,
            })
        );
    } else if(pura.jenis == "Swagina") {

        markers.push(
            new L.Marker([pura.lat, pura.lng], {
                icon: swaginaIcon,
                draggable: false,
            })
        );
    } else if(pura.jenis == "Kahyangan Tiga") {

        markers.push(
            new L.Marker([pura.lat, pura.lng], {
                icon: tigaIcon,
                draggable: false,
            })
        );
    } else if(pura.jenis == "Kahyangan Jagat") {

        markers.push(
            new L.Marker([pura.lat, pura.lng], {
                icon: jagatIcon,
                draggable: false,
            })
        );
    }
    markerClusters.addLayer(L.layerGroup(markers));

});

map.on('click', function(e) {
    
    // document.getElementById("buttonAddModal").click();
    var popupContent;
    if (firstWaypoint === null) {
        popupContent = `
            <h5 class="text-center">Atur Titik Posisi Awal</h5>
            <p>Apakah Anda ingin mengatur lokasi ini sebagai titik posisi awal??</p>
            <div class="text-center">
                <button data-mdb-ripple-duration=0 id="confirmBtn" class="btn btn-sm btn-primary">Pilih</button>
            </div>
        `;
    } else {
        popupContent = `
            <h5 class="text-center">Ubah Titik Posisi Awal</h5>
            <p>Apakah Anda ingin mengubah titk posisi awal?</p>
            <div class="text-center">
                <button data-mdb-ripple-duration=0 id="confirmBtn" class="btn btn-sm btn-primary">Ubah</button>
            </div>
        `;
    }

    var popup = L.popup()
        .setLatLng(e.latlng)
        .setContent(popupContent)
        .openOn(map);

    document.getElementById('confirmBtn').addEventListener('click', function() {
        var waypoints = routingControl.getWaypoints();

        if (firstWaypoint === null) {
            // Set the first waypoint as the clicked location
            firstWaypoint = e.latlng;
        } else {
            // Change the first waypoint to the clicked location
            firstWaypoint = e.latlng;
            waypoints[0] = L.Routing.waypoint(firstWaypoint);
        }

        routingControl.setWaypoints(waypoints);
        map.closePopup(popup);
    });
        // Buat marker baru
        // var newMarker = addMarker(e.latlng,markers.length);
        // console.log(document.getElementById('email').value);
        
        // Tambahkan marker ke array markers
        // markers.push(newMarker);

        

    
});


// addMarker =  function(latlng,index){

//     // Menambahkan marker
//     var marker = L.marker(latlng,{
//         icon: myIcon,
//         draggable: true
//     }).addTo(map);

//     // Membuat popup baru
//     var popup = L.popup({ offset: [0, -30]})
//         .setLatLng(latlng);
    
// var popup = L.popup()
//     .setContent("I am a standalone popup.");

// marker.bindPopup(popup).openPopup();

// //     // Binding popup ke marker
//     marker.bindPopup(popup);
    // Menambahkan event listener pada marker
// markers.forEach(function (marker, index){
    markers.forEach(function (marker, index) {
        marker.on('click', function(e) {
            var waypoints = routingControl.getWaypoints();
        var markerLatLng = marker.getLatLng();

        if (firstWaypoint === null) {
            // Set the first waypoint as the clicked marker
            firstWaypoint = markerLatLng;
            routingControl.setWaypoints([
                L.Routing.waypoint(firstWaypoint),
                waypoints[1]
            ]);
        } else if (secondWaypoint === null) {
            // Set the second waypoint as the clicked marker
            secondWaypoint = markerLatLng;
            routingControl.setWaypoints([
                waypoints[0],
                L.Routing.waypoint(secondWaypoint)
            ]);
        } else {
            // Reset the waypoints and set the clicked marker as the new destination
            routingControl.setWaypoints([
                waypoints[0],
                L.Routing.waypoint(markerLatLng)
            ]);
        }
            
            // routingControl.spliceWaypoints(routingControl.getWaypoints().length - 1, 1, e.latlng);
            // alert(fotos);


            // var popup = L.popup()
            //     .setContent("I am a standalone popup.");

            // marker.bindPopup(popup).openPopup();
            // document.getElementById(`buttonPura_${puras[index].id}`).click();
            // document.getElementById(`buttonPura_${puras[index].id}`).action = `https://localhost:8000/${puras[index].id}/detailpura`;;
            // console.log(`${puras[index].id}`);
            // window.open(`http://localhost:8000/${puras[index].id}/detailpura`,'_self');
            var popup = L.popup(e.latlng, {
                content: `
                    <h5 class="text-center">${puras[index].nama}</h5>
                    <br>
                    <div class="row text-center">
                        <div class="col-12 text-center">
                           <img src="foto/pura/${puras[index].foto}" alt="..." style="width:280px;height:260px">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="http://localhost:8000/${puras[index].id}/detailpura" data-mdb-ripple-duration=0 type="button" class="btn btn-sm btn-primary active" style="width:100%">Detail Pura</a>
                        </div>
                        
                    </div>
                `
            }).openOn(map);
            // popup.setLatLng(marker.getLatLng()),
            // popup.setContent(formatContent(marker.getLatLng().lat,marker.getLatLng().lng,index));
            // marker.bindPopup(popup).openPopup();

        });

        

    
    });
    // marker.on('dragstart', function(event) {
    //     isOnDrag = true;
    // });

    // // Menambahkan event listener pada marker
    // marker.on('drag', function(event) {
    //     popup.setLatLng(marker.getLatLng()),
    //     popup.setContent(formatContent(marker.getLatLng().lat,marker.getLatLng().lng,index));
    //     marker.openPopup();
    // });

    // marker.on('dragend', function(event) {
    //     setTimeout(function() {
    //         isOnDrag = false;
    //     }, 500);
    // });

    

    // Return marker
//     return marker;
// };

const editModal = (index) => {
    document.getElementById("buttonEditModal").click();
    document.getElementById("formEdit").action = `https://localhost:8000/${puras[index].id}/edit`;
    document.getElementById("nama_edit").value = puras[index].nama;
    document.getElementById("status_edit").value = puras[index].status;
    document.getElementById("piodalan_edit").value = puras[index].piodalan;
    document.getElementById("pemangku_edit").value = puras[index].pemangku;
    document.getElementById("alamat_edit").value = puras[index].alamat;
    document.getElementById("telepon_edit").value = puras[index].telepon;
    document.getElementById("lat_edit").value = puras[index].lat;
    document.getElementById("lng_edit").value = puras[index].lng;
};


// var btnKirim = document.getElementById('btnKirim');
// btnKirim.addEventListener('click',function(){
//     // Ambil koordinat masing-masing marker dan simpan ke dalam array koordinat
//     var koordinat = markers.map(function(marker) {
//         return [marker.getLatLng().lat, marker.getLatLng().lng];
//     });

//     // Kirim data ke server dalam format JSON menggunakan method fetch()
//     fetch("simpan.php", {
//         method: "POST",
//         body: JSON.stringify(koordinat),
//         headers: {
//             "Content-Type": "application/json"
//         }
//     }).then(function(response) {
//         return response.json();
//     })
//     .then(function(data) {
//         console.log(data);
//     })
//     .catch(function(error) {
//         console.log(error);
//     });
// });

// // Ambil data dari server dalam format JSON menggunakan method fetch()
// fetch("baca.php").then(function(response) {
//         // return response.text();
//         return response.json();
//     })
//     .then(function(data) {
//         // console.log(data);
//         // const originalData = ArchUtils.bz2.decode(data);
//         // console.log(originalData);
//         //console.log(JSON.stringify(data).length);

//         data.forEach(function(c,i){
//             let latlng = L.latLng(c[0], c[1]);
//             var newMarker = addMarker(latlng,markers.length);
//             markers.push(newMarker);
//         })
//     })
//     .catch(function(error) {
//         console.log(error);
//     });

