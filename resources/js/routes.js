import Vue from 'vue'

import CrearViajeComponent from './components/CrearViajeComponent.vue';
import PublicarAnuncio from "./components/PublicarAnuncio";
import SearchSong from "./components/SearchSong";
//Vue.use(Router);


export default {
    mode:'history',
    routes: [
        {
            path: '/crear',
            name: 'crear',
            component: CrearViajeComponent
        },
        {
            path:'/publicaranuncio',
            name:'publicarnunacio',
            component:PublicarAnuncio
        },
        {
            path:'/crearplaylist',
            name:'crearplaylist',
            component:SearchSong
        }

    ],

}
