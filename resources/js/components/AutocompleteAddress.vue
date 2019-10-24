<template>
<div>      
    <input id="autocomplete" placeholder="ingrese origen" type="text" />
        <select id="country">
          <option value="all">All</option>
          <option value="ar" selected>argentina.</option>
        </select>   
    <div id="map"></div>
</div>
</template>

<script>
export default {
	name: "autocompleteaddress",
	mounted(){
      var directionsService = new google.maps.DirectionsService;
      var directionsDisplay = new google.maps.DirectionsRenderer;
      var map, places, infoWindow,autocomplete;
      var markers = [];
      var countryRestrict = {'country': 'ar'};

      var countries = {
        'ar': {
          center: {lat: -38.94, lng: -68.05},
          zoom: 13
        }
      };
      //inicializamos y personalizamos el mapa
      map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: -38.94014990000001, lng: -68.0573579},
          mapTypeControl: false,// tipo de mapa
          panControl: false, // panel de control
          zoomControl: false, // para ver el simbolo + - 
          streetViewControl: false //para habilitar street view
        });
        
        infoWindow = new google.maps.InfoWindow({
          content: document.getElementById('info-content')
        });
      //creamos el autocomplete y el tipo de datos que queremos pedir y restringimos a el pais
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */ (
                document.getElementById('autocomplete')), {
                types: ['address'],
                componentRestrictions: countryRestrict
            });
        places = new google.maps.places.PlacesService(map);

        autocomplete.addListener('place_changed', onPlaceChanged);

        
      // Agrega un detector de eventos DOM para reaccionar cuando el usuario selecciona un país.
        document.getElementById('country').addEventListener('change', setAutocompleteCountry);
      
      // Cuando el usuario selecciona una ciudad, obtenga los detalles 
      // del lugar para la ciudad y acerca el mapa a la ciudad y dibuja la ruta 
      function onPlaceChanged() {
        var place = autocomplete.getPlace();
        if (place.geometry) {
          var latitude = place.geometry.location.lat();
          var longitude = place.geometry.location.lng(); 
          map.panTo(place.geometry.location);
          map.setZoom(16);
          ruta(latitude,longitude);
        } else {
          document.getElementById('autocomplete').placeholder = 'Calle ';
        }
        
      }
      //para limpiar el mapa
      function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
          if (markers[i]) {
            markers[i].setMap(null);
          }
        }
        markers = [];
      }
      
    // Establece la restricción de país según la entrada del usuario.
    // También centre y amplíe el mapa en el país dado.
      function setAutocompleteCountry() {
        var country = document.getElementById('country').value;
        if (country == 'all') {
          autocomplete.setComponentRestrictions({'country': []});
          map.setCenter({lat: 15, lng: 0});
          map.setZoom(2);
        } else {
          autocomplete.setComponentRestrictions({'country': country});
          map.setCenter(countries[country].center);
          map.setZoom(countries[country].zoom);
        }
        clearMarkers();
      }
      // dibuja la ruta en el mapa 
      function ruta(latitude,longitude){
      directionsDisplay.setMap(map);
      directionsService.route({
            origin: { lat: latitude, lng: longitude},//origen
            destination: { lat:-38.94014990000001, lng:-68.0573579 },//fin            
            travelMode: google.maps.TravelMode.WALKING
        }, function (response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('fallo la coneccion con el mapa a causa de: ' + status);
            }
        });
      } 
  }
}
</script>

<style scoped>
 #map {
        height: 300px;
        width: 300px;
      }
</style>