let mapSections = document.querySelectorAll(".map-el");

function initMap(id, zoom, lat, lng) {
  let map = new google.maps.Map(
      document.getElementById(id), 
      {
        zoom: zoom, 
        center: { lat: lat, lng: lng }
      }
    ); 
  let marker = new google.maps.Marker({position: { lat: lat, lng: lng }, map: map});
}

for (var i = 0; i < mapSections.length; i++) {
  let sectionId = mapSections[i].id; 
  let sectionZoom = parseInt(mapSections[i].getAttribute('data-zoom'));
  let sectionLat = parseInt(mapSections[i].getAttribute('data-lat'));
  let sectionLng = parseInt(mapSections[i].getAttribute('data-lng')); 
  initMap(sectionId, sectionZoom, sectionLat, sectionLng);
}