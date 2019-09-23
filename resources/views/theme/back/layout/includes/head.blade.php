
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <!-- Scripts -->
    <!-- jQuery Library -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('theme/back/css/materialize.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('theme/back/css/style.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('theme/back/css/custom.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('theme/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('theme/plugins/flag-icon/css/flag-icon.min.css')}}" type="text/css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    @yield('head')