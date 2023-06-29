// Menampilkan peta
var mymap = L.map('map').setView([-8.4095188,115.188919], 11);

// Menambahkan layer peta
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
    maxZoom: 18,
}).addTo(mymap);

// Array markers
var markers = [];

// Marker cluster
var markerClusters = L.markerClusterGroup().addTo(mymap);        

// Is On Drag
var isOnDrag = false;

// Membuat icon dari gambar PNG
var myIcon = L.icon({
    iconUrl: 'icon.png',
    iconSize: [40, 40],
    iconAnchor: [20, 40],
});

// Format popup content
formatContent = function(lat, lng, index){
    return `
            <div class="row">
                <div class="cell merged" style="text-align:center">Marker [ ${index+1} ]</div>
            </div>
            <div class="row">
                <div class="col">Latitude</div>
                <div class="col">${lat}</div>
            </div>
            <div class="row">
                <div class="col">Longitude</div>
                <div class="col">${lng}</div>
            </div>
            <div class="row">
                <div class="col">Left click</div>
                <div class="col">New marker / show popup</div>
            </div>
            <div class="row">
                <div class="col">Right click</div>
                <div class="col">Delete marker</div>
            </div>
    `;
}

addMarker =  function(latlng,index){

    // Menambahkan marker
    var marker = L.marker(latlng,{
        icon: myIcon,
        draggable: true
    });

    // Membuat popup baru
    var popup = L.popup({ offset: [0, -30]})
        .setLatLng(latlng);
    
    // Binding popup ke marker
    marker.bindPopup(popup);

    // Menambahkan event listener pada marker
    marker.on('click', function() {
        popup.setLatLng(marker.getLatLng()),
        popup.setContent(formatContent(marker.getLatLng().lat,marker.getLatLng().lng,index));
    });

    marker.on('dragstart', function(event) {
        isOnDrag = true;
    });

    // Menambahkan event listener pada marker
    marker.on('drag', function(event) {
        popup.setLatLng(marker.getLatLng()),
        popup.setContent(formatContent(marker.getLatLng().lat,marker.getLatLng().lng,index));
        marker.openPopup();
    });

    marker.on('dragend', function(event) {
        setTimeout(function() {
            isOnDrag = false;
        }, 500);
    });

    marker.on('contextmenu', function(event) {
        // Hapus semua marker dari array markers
        markers.forEach(function (m,i) {
            if(marker == m){
                m.removeFrom(mymap); // hapus marker dari peta
                markers.splice(i, 1);
            }
        });
        //console.log(markers);
    });

    // Return marker
    return marker;
}

// Tambahkan event listener click pada peta
mymap.on('click', function(e) {
    console.log(isOnDrag);
    if(!isOnDrag){
        // Buat marker baru
        var newMarker = addMarker(e.latlng,markers.length);
        
        // Tambahkan marker ke array markers
        markers.push(newMarker);

        // Tambahkan ke markercluster
        markerClusters.addLayer(L.layerGroup(markers));
    }
});

var btnKirim = document.getElementById('btnKirim');
btnKirim.addEventListener('click',function(){
    // Ambil koordinat masing-masing marker dan simpan ke dalam array koordinat
    var koordinat = markers.map(function(marker) {
        return [marker.getLatLng().lat, marker.getLatLng().lng];
    });

    // Kirim data ke server dalam format JSON menggunakan method fetch()
    fetch("simpan.php", {
        method: "POST",
        body: JSON.stringify(koordinat),
        headers: {
            "Content-Type": "application/json"
        }
    }).then(function(response) {
        return response.json();
    })
    .then(function(data) {
        console.log(data);
    })
    .catch(function(error) {
        console.log(error);
    });
});

// Ambil data dari server dalam format JSON menggunakan method fetch()
fetch("baca.php").then(function(response) {
        // return response.text();
        return response.json();
    })
    .then(function(data) {
        var latlangs = [];
        data.forEach(function(c,i){
            let latlng = L.latLng(c[0], c[1]);
            latlangs.push(latlng);
            var newMarker = addMarker(latlng,markers.length);
            markers.push(newMarker);
        })

        // Tambahkan ke markercluster
        markerClusters.addLayer(L.layerGroup(markers));
    })
    .catch(function(error) {
        console.log(error);
    });