import Vue from 'vue'
import Router from 'vue-router'
import CrearViajeComponent from './components/CrearViajeComponent.vue';
Vue.use(Router);


export default new Router({
    routes: [
        {
            path: '/crear',
            name: 'crear',
            component: CrearViajeComponent
        },

    ],
    mode: 'history',
    scrollBehavior() {
        return {x:0, y:0}
    }
})
