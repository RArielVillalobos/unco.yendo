<template>
    <div class="row mb-1">
        <div class="col s12 m12 mt-1 l4">
            <router-link class="waves-effect orange darken-1 btn" to="/publicaranuncio">Publicar busqueda de viaje </router-link>


        </div>
        <div class="col s12 m12 mt-1 l4">

                <router-link class="waves-effect orange darken-1 btn" to="/crear">Crear Viaje </router-link>
        </div>
        <div class="col s12 m12 mt-1 l4">

            <router-link class="waves-effect orange darken-1 btn" to="/crearplaylist">Crear Playlist </router-link>
        </div>



    </div>
</template>

<script>
    export default {
        name: "Home"
    }
</script>

<style scoped>

</style>