function initGoogleAPIMaps() {
  console.log("initialize");

  if (typeof google === 'object' && typeof google.maps === 'object'){
    console.log("exists");
    findMaps()
  }

  return; 
}

initGoogleAPIMaps();


function findMaps() {
  let mapSections = document.querySelectorAll(".map-el");

  for (let i = 0; i < mapSections.length; i++) {
    let sectionId = mapSections[i].id; 
    let sectionZoom = parseInt(mapSections[i].getAttribute('data-zoom'));
    let sectionLat = parseFloat(mapSections[i].getAttribute('data-lat'));
    let sectionLng = parseFloat(mapSections[i].getAttribute('data-lng'));
    let sectionAddress = mapSections[i].getAttribute('data-address');
    let mapsLink = 'https://www.google.com/maps/place/' + sectionAddress.replace( /\./g, '+').replace( / /g, "+" ) + '/@' + sectionLat + ',' + sectionLng + ',17z';
    let infoBoxHtml = '<p class="maps-addy">' + sectionAddress.replace( /\./g, '<br/>') + '</p><a class="btn btn-clr-black btn-arrow" href="' + mapsLink + '" target="_blank">Directions</a>' 
    initMap(sectionId, sectionZoom, sectionLat, sectionLng, infoBoxHtml);
  }

  return;
}

function initMap(id, zoom, lat, lng, addy) {
  let map = new google.maps.Map(
      document.getElementById(id), 
      {
        zoom: zoom, 
        center: { lat: lat, lng: lng }
      }
    ); 
    
  let marker = new google.maps.Marker({position: { lat: lat, lng: lng }, map: map});

  // Create info window.
  let infowindow = new google.maps.InfoWindow({
      content: addy
  });

  // Show info window when marker is clicked.
  google.maps.event.addListener(marker, 'click', function() {
      infowindow.open( map, marker );
  });

  return;
}