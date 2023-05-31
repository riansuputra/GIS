var map = L.map('map').setView([-8.309882117649769, 114.56416986814997], 11);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
    maxZoom: 18,
}).addTo(map);

var markers = [];

var markerClusters = L.markerClusterGroup().addTo(map); 

var isOnDrag = false;

var myIcon = L.icon({
    iconUrl: '/foto/icon-temple.png',
    iconSize: [50, 40],
    iconAnchor: [20, 40],
});

puras.forEach(function (pura, index) {
    markers.push(
        new L.Marker([pura.lat, pura.lng], {
            icon: myIcon,
            draggable: false,
        })
    );
    markerClusters.addLayer(L.layerGroup(markers));

});

map.on('click', function(e) {
    
    // document.getElementById("buttonAddModal").click();
    document.getElementById("lat").value = e.latlng.lat;
    document.getElementById("lng").value = e.latlng.lng;
    markers = new L.Marker(e.latlng, { icon: myIcon }).addTo(map);
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
    
// //     // Binding popup ke marker
//     marker.bindPopup(popup);
    // Menambahkan event listener pada marker
// markers.forEach(function (marker, index){
    markers.forEach(function (marker, index) {
        marker.on('click', function(e) {
            // document.getElementById(`buttonPura_${puras[index].id}`).click();
            // document.getElementById(`buttonPura_${puras[index].id}`).action = `https://localhost:8000/${puras[index].id}/detailpura`;;
            // console.log(`${puras[index].id}`);
            window.open(`http://localhost:8000/${puras[index].id}/detailpura`,'_self');
            // var popup = L.popup(e.latlng, {
            //     content: `
            //     <h5>${puras[index].nama}</h5>
            //         <div class="row">
            //             <img src="{{url('foto/pura/'.$fotos->filename)}}" class="d-block w-100">
            //         <div class="row">
            //             <div class="col-4">Longitude</div>
            //             <div class="col-1">:</div>
            //             <div class="col-6">${puras[index].lng}</div>
            //         </div>
            //         <br>
            //         <div class="row">
            //             <div class="col-12 text-center">
            //                 <a data-mdb-ripple-duration=0 type="button" class="btn btn-sm btn-primary active" style="width:100%" onclick="editModal(${index})">Details</a>
            //             </div>
                        
            //         </div>
            //     `
            // }).openOn(map);
            // popup.setLatLng(marker.getLatLng()),
            // popup.setContent(formatContent(marker.getLatLng().lat,marker.getLatLng().lng,index));
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

