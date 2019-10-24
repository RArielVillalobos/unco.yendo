<template>
    <div class="row">
        <br>
        <div class="col s6">
            <div class="input-field col s6 offset-s2">
                <i class="material-icons prefix">add_location</i>
                <input v-model="calle" id="calle" type="text" class="validate" required>
                <label for="calle">Calle y altura</label>
            </div>
            <div class="input-field col s6 offset-s2">
                <i class="material-icons prefix">date_range</i>
                <input v-model="fecha"  id="fecha" type="date" class="validate" required>

            </div>
        </div>
        <div class="col s6">
            <div class="input-field col s6 offset-s2">
                <i class="material-icons prefix">date_range</i>
                <input v-model="hora"  id="hora" type="time" class="validate" required>

            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">mode_edit</i>
                <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                <label for="icon_prefix2">Comentario</label>
            </div>
        </div>

   </div>

</template>

<script>
    export default {
        name: "PublicarAnuncio"
    }
</script>

<style scoped>

</style>