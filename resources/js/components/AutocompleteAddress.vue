<template>
<div id="container">
      <input  id="autocomplete"
             placeholder="Enter your address"
             type="text"/>
     <input v-model="calle" id="calle"  type="text" value=" " style="visibility:hidden"/>

</div>
 
</template>

<script>
  export default {
        name: "autocompleteaddress",
        data(){
            return{
                calle:''
            }
        },
        mounted(){
var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

  autocomplete = new google.maps.places.Autocomplete(
    document.getElementById('autocomplete'), {types: ['geocode']});
    autocomplete.setFields(['address_component']);

  autocomplete.addListener('place_changed', fillInAddress);
  
  $(document).ready(function () {
    $("autocomplete").keyup(function () {
        var value = $(this).val();
        $("calle").val(value);
    });
});


function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
};



      }

  } 
</script>

<style scoped>
</style>