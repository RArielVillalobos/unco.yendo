<template>
    <div>
            <div class="container">

                <div class="row mt-1">
                    <div class="input-field col s6 offset-s2">
                        <i class="material-icons prefix">person</i>
                        <input  v-model="nombre" id="nombre" type="text" class="validate">
                        <label for="nombre">Nombre</label>

                        <span class="helper-text error-login" data-error="wrong" data-success="right"></span>



                    </div>
                </div>
                <div class="row mt-1">
                    <div class="input-field col s6 offset-s2">
                        <i class="material-icons prefix">person</i>
                        <input  v-model="apellido" id="apellido" type="text" class="validate">
                        <label for="apellido">Apellido</label>

                        <span class="helper-text error-login" data-error="wrong" data-success="right"></span>


                    </div>



                </div>
                <div class="row mt-1">
                    <div class="input-field col s6 offset-s2">
                        <i class="material-icons prefix">looks_one</i>
                        <input   v-model="legajo" id="legajo" type="text" class="validate">
                        <label for="legajo">Legajo</label>

                        <span class="helper-text error-login" data-error="wrong" data-success="right"></span>



                    </div>



                </div>
                <div class="row mt-1">
                    <div class="input-field col s6 offset-s2">
                        <i class="material-icons prefix">mail_outline</i>
                        <input id="email" v-model="email" type="email" class="validate"  required autocomplete="email">
                        <label for="email">Email</label>

                        <span class="helper-text error-login" data-error="wrong" data-success="right"></span>



                    </div>



                </div>
                <div class="row mt-1">
                    <div class="input-field col s6 offset-s2">
                        <i class="material-icons prefix">perm_identity</i>
                        <input id="usuario" v-model="nombreUsu" type="text" class="validate"   required autocomplete="usuario">
                        <label for="usuario">Nombre de usuario</label>

                        <span class="helper-text error-login" data-error="wrong" data-success="right"></span>


                    </div>



                </div>
                <div class="row mt-1">
                    <div class="input-field col s6 offset-s2">
                        <i class="material-icons prefix">lock_outline</i>
                        <input id="password" type="password" v-model="contrasenia" class="validate"   required autocomplete="password">
                        <label for="password">Contraseña</label>

                        <span class="helper-text error-login" data-error="wrong" data-success="right"></span>


                    </div>



                </div>
                <div class="row mt-1">
                    <div class="input-field col s6 offset-s2">
                        <i class="material-icons prefix">lock_outline</i>
                        <input id="password-confirm" type="password" v-model="contrasenia_confirmation" class="validate" required autocomplete="new-password">
                        <label for="password-confirm">Ingrese nuevamente la contraseña</label>

                        <span class="helper-text error-login" data-error="wrong" data-success="right"></span>

                    </div>

                </div>
                <div class="row mb-2">
                    <div class="col s6 offset-s2 center">
                        <button @click="enviarForm" class="btn waves-effect orange darken-1light" type="submit" name="action">Registrarme
                            <i class="material-icons right">send</i>
                        </button>

                    </div>


                </div>




            </div>

    </div>
    
</template>

<script>
    import axios from 'axios';
    export default {
        name: "Register",
        data(){
            return {
                nombre:'',
                apellido:'',
                legajo:'',
                email:'',
                nombreUsu:'',
                contrasenia:'',
                contrasenia_confirmation:''
            }
        },
        methods:{
           /* validarAlumno(){
                var existe=false;
                axios.get('/api/students/'+this.legajo)
                    .then(response => {
                       console.log(response.data);
                       if(response.data=='error'){
                           existe=false;
                       }else{
                           existe=true;
                           console.log('existe');
                       }
                    })
                    .catch(e => {
                        // Podemos mostrar los errores en la consola

                    })

                return existe;

            },*/
            enviarForm(){
                //console.log(this.validarAlumno());
                axios.post('/register',
                    {
                        'nombre':this.nombre,
                        'apellido':this.apellido,
                        'legajo':this.legajo,
                        'email': this.email,
                        'usuario':this.nombre,
                        'password':this.contrasenia,
                        'password_confirmation':this.contrasenia_confirmation


                    }).then(function(){
                    Swal.fire({
                        title: 'Viaje creado!',
                        text: 'Acabas de generar un viaje,felicitaciones',
                        type: 'success',
                        confirmButtonText: 'Continuar'
                    })
                    window.location.href = '/';


                }).catch(function(error){
                    console.log(error);
                })

            }
        }
    }
</script>

<style scoped>

</style>