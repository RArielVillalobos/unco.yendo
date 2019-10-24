<template>
    <div>
        <header id="header" class="page-topbar">
            <!-- start header nav-->
            <div class="navbar-fixed">
                <nav class="navbar-color orange darken-1">
                    <div class="nav-wrapper">

                        <ul class="left">
                            <li>
                                <h1 class="logo-wrapper">
                                    <a href="index.html" class="brand-logo darken-1">
                                        <img src="images/logo/materialize-logo.png" alt="materialize logo">
                                        <span class="logo-text hide-on-med-and-down">Unco.Yendo</span>
                                    </a>
                                </h1>
                            </li>
                        </ul>
                        <ul class="right hide-on-med-and-down">

                            <li>
                                <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                                    <i class="material-icons">settings_overscan</i>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                      <span class="avatar-status avatar-online">
                        <img src="images/avatar/avatar-7.png" alt="avatar">
                        <i></i>
                      </span>
                                </a>
                            </li>

                        </ul>


                        <!-- profile-dropdown -->
                        <ul id="profile-dropdown" class="dropdown-content">
                            <li>
                                <a href="#" class="grey-text text-darken-1">
                                    <i class="material-icons">face</i>Perfil</a>
                            </li>
                            <li>
                                <a href="#" class="grey-text text-darken-1">
                                    <i class="material-icons">settings</i>Ajustes</a>
                            </li>
                            <li>
                                <a href="#" class="grey-text text-darken-1">
                                    <i class="material-icons">live_help</i>Ayuda</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <form method="post" action="/logout">
                                    <input type="hidden" name="_token" :value="csrf">
                                    <button type="submit" class="grey-text text-darken-1">
                                        <i class="material-icons">keyboard_tab</i> Logout
                                    </button>


                                </form>

                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- end header nav-->
        </header>
    </div>

</template>

<script>
    export default {
        name: "Header",
        data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }),
    }
</script>

<style scoped>

</style>