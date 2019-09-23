<template>
     <div class="container">
          <div class="row mt-2">
               <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">date_range</i>
                    <input name="fecha"  id="fecha" type="date" class="validate">



               </div>



          </div>
          <div class="row mt-2">
               <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">add_location</i>
                    <input name="calle" id="calle" type="text" class="validate">
                    <label for="calle">Calle</label>



               </div>
          </div>
          <div class="row mt-2">
               <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">looks_two</i>
                    <input id="numero" type="number" class="validate" name="numero" required autocomplete="numero">
                    <label for="numero">Numero</label>



               </div>

          </div>

          <div class="row mt-2">
               <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">timelapse</i>
                    <input  name="hora" id="hora" type="time" class="validate">
                    <label for="hora">Hora</label>

               </div>



          </div>

          <div class="row mt-2">
               <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">directions_car</i>
                    <input id="lugares_disponibles" type="number" class="validate" name="lugares_disponibles" required autocomplete="lugares_disponibles">
                    <label for="lugares_disponibles">Lugares Disponibles</label>



               </div>



          </div>


          <div class="row mb-2">
               <div class="col s6 offset-s2 center">
                    <button class="btn waves-effect orange darken-1light" type="submit" name="action">Crear Viaje
                         <i class="material-icons right">send</i>
                    </button>

               </div>


          </div>




     </div>

</template>

<script>
    export default {
        name: "CrearViaje",

        data(){
            return {
                fecha:'',
                calle:'',
                numero:'',
                hora:'',
                lugares_disponibles:''

            }
        }
    }
</script>

<style scoped>

</style>