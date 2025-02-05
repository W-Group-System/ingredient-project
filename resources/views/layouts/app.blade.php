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
        background: #57B657 !important;
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

    .preloader {
		background-color: #f7f7f7;
		width: 100%;
		height: 100%;
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		z-index: 999999;
		-webkit-transition: .6s;
		-o-transition: .6s;
		transition: .6s;
		margin: 0 auto;
        /* opacity: .8; */
	}

	.preloader .preloader-circle {
		width: 100px;
		height: 100px;
		position: relative;
		border-style: solid;
		border-width: 1px;
		border-top-color:$theme-color;
		border-bottom-color: transparent;
		border-left-color: transparent;
		border-right-color: transparent;
		z-index: 10;
		border-radius: 50%;
		-webkit-box-shadow: 0 1px 5px 0 rgba(35, 181, 185, 0.15);
		box-shadow: 0 1px 5px 0 rgba(35, 181, 185, 0.15);
		background-color: #ffffff;
		-webkit-animation: zoom 2000ms infinite ease;
		animation: zoom 2000ms infinite ease;
		-webkit-transition: .6s;
		-o-transition: .6s;
		transition: .6s;
	}
	.preloader .preloader-circle2 {
		border-top-color: #0078ff;
	}
	.preloader .preloader-img {
		position: absolute;
		top: 50%;
		z-index: 200;
		left: 0;
		right: 0;
		margin: 0 auto;
		text-align: center;
		display: inline-block;
		-webkit-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		transform: translateY(-50%);
		padding-top: 6px;
		-webkit-transition: .6s;
		-o-transition: .6s;
		transition: .6s;
	}

	.preloader .preloader-img img {
		max-width: 55px;
	}
	.preloader .pere-text strong{
		font-weight: 800;
		color:#dca73a ;
		text-transform: uppercase;
	}

    @-webkit-keyframes zoom {
		0% {
			-webkit-transform: rotate(0deg);
			transform: rotate(0deg);
			-webkit-transition: .6s;
			-o-transition: .6s;
			transition: .6s;
		}

		100% {
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg);
			-webkit-transition: .6s;
			-o-transition: .6s;
			transition: .6s;
		}
	}
</style>

<body>
    {{-- <div id="loader" style="display:none;" class="loader">
    </div> --}}
    <!-- Preloader Start -->
    <div id="preloader-active" style="display: none;">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('img/wgroup.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script type='text/javascript'>
        function show() {
            document.getElementById("preloader-active").style.display="block";
        }
    </script>
</body>

</html>