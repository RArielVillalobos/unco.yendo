<template>
<div >
    <input v-model="autocomplete" ref="autocomplete" 
        placeholder="origen" 
        onfocus="value = ''" 
        type="text" />
</div>
</template>

<script>
export default {
  name: "AutocompleteAddress",
  data(){
    return autocomplete=''
  },
  mounted() {

    this.autocomplete = new google.maps.places.Autocomplete(
      (this.$refs.autocomplete),
      {types: ['geocode']}
    );

  // para obtener las coordenadas y el nombre de la calle que eligio
  this.autocomplete.addListener('place_changed', () => {
  let place = this.autocomplete.getPlace();
  let ac = place.address_components;
  let lat = place.geometry.location.lat();
  let lon = place.geometry.location.lng();
  let city = ac[0]["short_name"];
  var calle = (`el usuario eligio ${city} con las coordenadas ${lat}, ${lon}`);
   });

  }
}
</script>

<style scoped>
</style>