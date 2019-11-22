<!DOCTYPE html>
<html lang="en">
<!--================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 4.0
  Author: PIXINVENT
  Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================ -->
<head>
    <title>@yield('title')</title>

    @include('theme.back.layout.includes.head')
</head>
<body>
    <div id="app">
        @include('theme.back.layout.includes.loader')
        <!-- End Page Loading -->
            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START HEADER -->
            @include('theme.back.layout.includes.header')
            {{-- cabeza></cabeza>--}}

        <!-- END HEADER -->
            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START MAIN -->
            <div id="main">
                <!-- START WRAPPER -->
                <div class="wrapper">
                    <!-- START LEFT SIDEBAR NAV-->
                @if(auth()->check())
                    @include('theme.back.layout.includes.left-sidebar')
                   {{-- <left-sidebar></left-sidebar>--}}


                @endif
                <!-- END LEFT SIDEBAR NAV-->
                    <!-- //////////////////////////////////////////////////////////////////////////// -->
                    <!-- START CONTENT -->
                    <section id="content">
                        <!--start container-->
                        <div class="container">
                            @yield('content')
                            <!--<router-view></router-view>-->




                        </div>
                        <!--end container-->
                    </section>
                    <!-- END CONTENT -->

                </div>
                <!-- END WRAPPER -->
            </div>
            <!-- END MAIN -->
            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START FOOTER -->
    </div>
        @include('theme.back.layout.includes.footer')




    <script type="text/javascript" src="{{asset('theme/plugins/jquery-3.2.1.min.js')}}"></script>

    <!--materialize js-->
    <script type="text/javascript" src="{{asset('theme/back/js/materialize.min.js')}}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{asset('theme/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset('theme/back/js/plugins.js')}}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{asset('theme/back/js/custom-script.js')}}"></script>
    <!--para conectar con api de google maps pass y libreria de direcciones-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJi7Yn_GQdgH7fFH1hEs0n2gGjs2Hh2Ew&libraries=places"></script>
    @yield('scripts')

</body>
</html>
