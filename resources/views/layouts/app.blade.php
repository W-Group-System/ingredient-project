<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <link rel="shortcut icon" href="{{ URL::asset(config('logo.logos')::first()->icon)}}"> --}}
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    
    {{-- <link rel="stylesheet" href="{{asset('login_css/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('login_css/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('login_css/css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('login_css/css/style.css')}}">

    {{-- <link rel="stylesheet" href="{{ asset('/body_css/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('/body_css/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/body_css/vendors/css/vendor.bundle.base.css') }}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('/body_css/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('/body_css/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/body_css/js/select.dataTables.min.css') }}"> --}}
    <!-- Plugin css for this page -->
    {{-- <link rel="stylesheet" href="{{ asset('/body_css/vendors/select2/select2.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/body_css/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/body_css/css/vertical-layout-light/style.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    {{--
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}
</head>

<style>
    .control input:checked ~ .control__indicator {
        background: #3f3e91 !important;
    }
    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url("{{ asset('img/loading.gif')}}") 50% 50% no-repeat white ;
        opacity: .8;
        background-size:120px 120px;
    }
</style>

<body>
    <div id="loader" style="display:none;" class="loader">
    </div>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script type='text/javascript'>
        function show() {
            document.getElementById("loader").style.display="block";
        }
    </script>
</body>

</html>