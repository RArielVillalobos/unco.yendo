<template>
    <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <img src="images/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">
                    </div>
                    <div class="col col s8 m8 l8">
                        <ul id="profile-dropdown-nav" class="dropdown-content">
                            <li>
                                <a href="#" class="grey-text text-darken-1">
                                    <i class="material-icons">face</i> Perfil</a>
                            </li>
                            <li>
                                <a href="#" class="grey-text text-darken-1">
                                    <i class="material-icons">settings</i> Ajustes</a>
                            </li>
                            <li>
                                <a href="#" class="grey-text text-darken-1">
                                    <i class="material-icons">live_help</i> Ayuda</a>
                            </li>
                            <li class="divider"></li>

                            <li>
                                <a href="#" class="grey-text text-darken-1">
                                    <i class="material-icons">keyboard_tab</i>Salir</a>
                            </li>
                        </ul>
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav">Menu<i class="mdi-navigation-arrow-drop-down right"></i></a>
                        <p class="user-roal"></p>
                    </div>
                </div>
            </li>
            <li class="no-padding">
                <ul class="collapsible" data-collapsible="accordion">
                    <li class="bold">
                        <a href="#" class="waves-effect waves-cyan">
                            <i class="material-icons">pie_chart_outlined</i>
                            <span class="nav-text">Mis viajes</span>

                        </a>
                    </li>
                    <li class="bold">
                        <a href="index.html" class="waves-effect waves-cyan">
                            <i class="material-icons">pie_chart_outlined</i>
                            <span class="nav-text">Solicitar viaje</span>

                        </a>
                    </li>
                    <li class="bold">
                        <a href="#">
                            <i class="material-icons">pie_chart_outlined</i>
                            <!-- <router-link class="nav-text"  to="/crear">Crear Viaje </router-link> -->

                            <span class="nav-text">Crear Viaje</span>


                        </a>
                    </li>
                    
                </ul>
            </li>
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
            <i class="material-icons">menu</i>
        </a>
    </aside>
</template>

<script>
    export default {
        name: "LeftSideBar"
    }
</script>

<style scoped>

</style>