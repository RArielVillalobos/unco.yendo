import Vue from 'vue'
import Router from 'vue-router'
import CrearViajeComponent from './components/CrearViajeComponent.vue';
import PublicarAnuncio from "./components/PublicarAnuncio";
import SearchSong from "./components/SearchSong";
Vue.use(Router);


export default new Router({
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
    mode: 'history',
    scrollBehavior() {
        return {x:0, y:0}
    }
})
