let mapSections = document.querySelectorAll(".map-el");

function initMap(id, zoom, lat, lng) {
  let mapCenter = {lat: lat, lng: lng};
  let map = new google.maps.Map(
      document.querySelector(id), {zoom: zoom, center: mapCenter});
  let marker = new google.maps.Marker({position: mapCenter, map: map});
}

for (var i = 0; i < mapSections.length; i++) {
  let sectionId = mapSections[i].id;
  let sectionZoom = mapSections[i].getAttribute('data-zoom');
  let sectionLat = mapSections[i].getAttribute('data-lat');
  let sectionLng = mapSections[i].getAttribute('data-lng');
  initMap(sectionId, sectionZoom, sectionLat, sectionLng);
}