

let map = L.map('map').setView([-7.812194, 110.372954], 12);
let marker = L.marker([-7.812194, 110.372954], { draggable:true}).addTo(map);
let headquarters = [-7.812194, 110.372954];

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

function updateLocation(lat, lon) {
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lon;
    marker.setLatLng([lat, lon]);
    calculateDistance(lat, lon);
}

function calculateDistance(lat, lon) {
    fetch(`https://api.openrouteservice.org/v2/directions/driving-car?api_key=${apiKey}&start=${headquarters[1]},${headquarters[0]}&end=${lon},${lat}`)
        .then(res => res.json())
        .then(data => {
            let distanceKm = (data.routes[0].summary.distance / 1000).toFixed(2);
            document.getElementById('distance').innerText = distanceKm + " km";
            let transportFee = (distanceKm * 2).toFixed(2);
            document.getElementById('transportFee').innerText = transportFee;
            calculateTotal();
        })
        .catch(() => alert("Failed to calculate distance."));
}

function calculateTotal() {
    let duration = parseInt(document.getElementById('duration').value) || 0;
    let cleaningFee = duration * 10; // $10 per hour
    let transportFee = parseFloat(document.getElementById('transportFee').innerText) || 0;
    document.getElementById('cleaningFee').innerText = cleaningFee;
    document.getElementById('totalPrice').innerText = (cleaningFee + transportFee).toFixed(2);
}

marker.on('dragend', function () {
    let latlng = marker.getLatLng();
    updateLocation(latlng.lat, latlng.lng);
});

document.getElementById('searchLocation').addEventListener('change', function () {
    let query = this.value;
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}`)
        .then(res => res.json())
        .then(data => {
            if (data.length > 0) {
                let lat = parseFloat(data[0].lat);
                let lon = parseFloat(data[0].lon);
                map.setView([lat, lon], 13);
                updateLocation(lat, lon);
            } else {
                alert("Location not found.");
            }
        });
});