<template>
    <div>
        <h4>Busca tu canción preferida</h4>
        <form @submit.prevent>
            <input type="text" v-model="query">
            <button @click="buscarCancion()" type="submit" class="btn waves-effect orange darken-1light">Buscar</button>
        </form>
        <div  v-for="(track,index) in tracks" v-bind:key="index">
            <img :src="track.album.images[0].url"  width="200"/>
            <pre>{{track.name}} - {{track.album.artists[0].name}}</pre>
            <pre>{{track.preview_url}}</pre>
        </div>

    </div>
    
</template>

<script>
    export default {
        name: "SearchSong",

        data(){
            return {
                query:'',
                tracks:[]
            }
        },
        mounted(){

        },
        methods:{
            buscarCancion(){
                const accessToken="BQCxqffM81gmkrw_ZM1quk3pGimRRL9roLD_BdxvJj-aO4OLeysH6hwDpvgxgVQ7TWar3QJTh2wvSdiuHHfey_Ji-FCjGl7cj0YMkfprNIA5ezShBk6rgv7pP9N49oSyY_rH5RoLYXYRfiWVm_p3lSTjNyG47d_dey9kBbiUmyG0x-Acj8dLV9HCDo9EA0bIhgOIUCCXD_HhZaR_l0fa3zdZEstpdGUql2rUDdXQcXgGMjeTxHzqCqdNrY5BmeQHEp6VVMn76KLLrB11A-jVJ0KjEA54m9Ug";
                const headers={
                    "Content-Type": "application/json",
                    Authorization:`Bearer ${accessToken}`
                };
                let url=`https://api.spotify.com/v1/search?q=${this.query}&type=track`;
                fetch(url,{headers})
                    .then(resp=>resp.json())
                    .then(data=>this.tracks=data.tracks.items)
            }
        }

    }


</script>

<style scoped>

</style>