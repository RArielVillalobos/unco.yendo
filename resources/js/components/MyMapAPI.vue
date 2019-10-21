<template>
<div id="container">
  <div id="location-field">
    <input id="autocomplete" placeholder="Origen" onFocus="geolocate()" type="text"/>
    <input id="end" type="text" value="Buenos Aires 1400, Q8300 Neuquén, Argentina" style="visibility:hidden"/>
    <input type="submit" id="submit" value="ver ruta">
  </div>
<div id="map"></div>
</div>
 
</template>


<script>
  export default {
        name: "MyMapAPI",
        mounted(){

   var placeSearch, autocomplete;
   var directionsService = new google.maps.DirectionsService;
   var directionsRenderer = new google.maps.DirectionsRenderer;
   var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: -38.94014990000001, lng: -68.0573579}
        });
        directionsRenderer.setMap(map);
        document.getElementById('submit').addEventListener('click', function() {
          calculateAndDisplayRoute(directionsService, directionsRenderer);
        });
        
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['address']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);


// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
          directionsService.route({
          origin: document.getElementById('autocomplete').value,
          destination: document.getElementById('end').value,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsRenderer.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
          } else {
            window.alert('Direccion Fallida debido a ' + status);
          }
        });
}

  }

  }
</script>

<style scoped>
#map {
        height: 300px;
        width: 500px
      }
#autocomplete {
        top: 0px;
        left: 0px;
        width: 50%;
      }
#locationField {
        -webkit-box-flex: 1 1 190px;
        -ms-flex: 1 1 190px;
        flex: 1 1 190px;
        margin: 0 8px;
      }
</style>