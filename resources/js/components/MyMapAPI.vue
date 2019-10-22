<template>
<div >
  <input  id="from" placeholder="calle" type="text"/>
    <input id="waypoints"  type="text" value=" " style="visibility:hidden"/>
    <input id="end"  type="text" value="Buenos Aires 1400, Q8300 Neuquén, Argentina" style="visibility:hidden"/>
    <input type="submit" id="submit" value="ver ruta">
    <div id="map"></div>
</div>
</template>

<script>
  export default {
        name: "mymap-api",
        data(){
          return {
            from:""
          }
        },
        mounted(){
          //autocomplete
        var  autocomplete = new google.maps.places.Autocomplete(
          document.getElementById('from'), {types: ['geocode']});

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
      

      function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < checkboxArray.length; i++) {
          if (checkboxArray.options[i].selected) {
            waypts.push({
              location: checkboxArray[i].value,
              stopover: true
            });
          }
        }

        directionsService.route({
          origin: document.getElementById('from').value,
          destination: document.getElementById('end').value,
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsRenderer.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' hacia ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }

  }

  }
        
    
</script>

<style scoped>
#map {
    width:400px ;
    height: 300px;
    }

</style>