<template>
     <div class="container">
         <form method="post" @submit.prevent>
             <div class="row mt-2">
                 <div class="input-field col s6 offset-s2">
                     <autocompleteaddress v-on:direccion="setDireccion"></autocompleteaddress>
                 </div>
             </div>
             <div class="row mt-2">
                 <div class="input-field col s6 offset-s2">
                     <i class="material-icons prefix">date_range</i>
                     <input v-model="fecha"  id="fecha" type="date" class="validate" required>
                 </div>
             </div>


             <div class="row mt-2">
                 <div class="input-field col s6 offset-s2">
                     <i class="material-icons prefix">timelapse</i>
                     <input  id="hora" v-model="hora" type="time" class="validate" required>
                 </div>
             </div>
             <div class="row mb-2">
                 <div class="col s6 offset-s2 center">
                     <button @click="crearViaje" class="btn waves-effect orange darken-1light" type="submit" name="action">Crear Viaje
                         <i class="material-icons right">send</i>
                     </button>
                 </div>
             </div>
         </form>
     
     </div>
     

</template>

<script>
    import axios from 'axios';

    export default {
        name: "PublicarAnuncio",
        props:{
            usuario:Object
        },

        data(){
            return {
                fecha:'',
                numero:'',
                hora:'',
                lugares_disponibles:'0',
                arrayMsjs:[],
                error:0,
                direccion:'',
                cars:[],
                user:''
            }
        },

        created(){

            axios.get('cars/'+this.usuario.id)
                .then(response => {
                    if(response.data){
                        this.cars=response.data
                    }
                })
                //si no existe o hubo algún error
                .catch(e => {
                });
        },
        methods:{
            validarFormularioViaje(){
                if(this.calle===''){
                    //this.errorMsjs.calle='';
                    this.arrayMsjs.push('Ingrese calle de partida');
                }
                if(this.fecha===''){
                    //this.errorMsjs.fecha='Ingrese fecha del viaje';
                    this.arrayMsjs.push('Ingrese fecha del viaje');

                }
                if(this.hora===''){
                    //this.errorMsjs.hora='Ingrese hora del viaje';
                    this.arrayMsjs.push('Ingrese hora del viaje');
                }
                if(this.numero===''){
                   // this.errorMsjs.numero='Ingrese numero de la calle';
                    this.arrayMsjs.push('Ingrese numero de la calle');
                }
                if(this.arrayMsjs.length){
                    this.error=1
                }
                return this.arrayMsjs;
            },
            crearViaje(){
                axios.post('/trip/store',
                    {
                        'fecha':this.fecha,
                        'calle':this.direccion.route,
                        'numero':this.direccion.street_number,
                        'hora': this.hora,
                        'latitud':this.direccion.latitude,
                        'longitud':this.direccion.longitude,
                        'ciudad':this.locality,
                        'lugares_disponibles':this.lugares_disponibles,
                    }).then(function(){
                    Swal.fire({
                        title: 'Viaje Publicado!',
                        text: 'Acabas de publicar un viaje,felicitaciones',
                        type: 'success',
                        confirmButtonText: 'Continuar'
                    }).then((result)=>{
                        if(result.value){
                            window.location.href = '/';
                        }
                    })

                }).catch(function(error){
                    console.log(error);
                })
            },
            setDireccion(direccion){
                this.direccion=direccion;
            }
           
        }
    }

</script>


<style scoped>

</style>