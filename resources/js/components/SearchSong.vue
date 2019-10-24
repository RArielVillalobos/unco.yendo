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
                const accessToken="BQAL4G43dRNjln2WgHx7a4YuVh30fhPPyZumCHCUC3CbmbFUHBs_QxobGeCagE_4jGW7ryh5QeMMO7rp7d1UNJDP6BrgUddzo5kb0-A7Q0WgB2SW9tTDgLB6M_4SrFnllaI0M5FOUdUk_Rrj9m_-p4WtipMwn-h79rcLFPma6qMlj3T60f-6XZmlJZMpAn-v___aq6Ju182JbRzmx5zp9dPxL1I6SLB6G0ZFOUv65u6MgXaeO5L0ZZpuiT14JEK7Eo_DAT2IHbNLzu0p4K0DPkwoVnr8TKWC";
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