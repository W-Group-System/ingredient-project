<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{env('APP_NAME', 'Laravel')}}</title>
    <link rel="stylesheet" href="{{ asset('/body_css/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('/body_css/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/body_css/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    @yield('css_header')
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/body_css/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('/body_css/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/body_css/js/select.dataTables.min.css') }}">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/body_css/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/body_css/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    {{--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.6/dist/sweetalert2.min.css"> --}}
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/body_css/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/sweetalert2/sweetalert2.min.css') }}">
    <!-- endinject -->
</head>

<style>
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
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{url('home')}}"><img src="{{asset('img/wgroup.png')}}" class="mr-2" alt="logo" style="height: 8vh;"/></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('img/wgroup.png')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="img/user.png" alt="profile" />
                        </a>

                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="logout(); show();">
                                <i class="ti-power-off text-primary"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/products') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Product</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ingredients" aria-expanded="false"
                            aria-controls="ingredients">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Ingredients</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ingredients">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ url('/ingredient_dashboard') }}">Dashboard</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/available') }}">Available</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/inbound') }}">Inbound</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/outbound') }}">Outbound</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/reserved') }}">Reserved</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/profile') }}">Profile</a></li>
                            </ul>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#orders" aria-expanded="false"
                            aria-controls="orders">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Orders</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="orders">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/order_dashboard') }}">Order
                                        Dashboard</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/new_orders') }}">New Order</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/booked_orders') }}">Book
                                        Order</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/new_stock') }}">New Stock</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false"
                            aria-controls="reports">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Reports</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="reports">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/balance_inventory') }}">Balance
                                        Inventory Report</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/stock_status_level') }}">Stock
                                        Status Level Report</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#setup" aria-expanded="false"
                            aria-controls="setup">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Setup</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="setup">
                            <ul class="nav flex-column sub-menu">
                                {{-- <li class="nav-item"> <a class="nav-link" href="{{ url('/companies') }}">Company</a>
                                </li> --}}
                                {{-- <li class="nav-item"> <a class="nav-link" href="{{ url('/roles') }}">Role</a></li> --}}
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/users') }}">User</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="loader" style="display: none;" id="loader"></div>
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                {{-- <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                            Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                                template</a> from BootstrapDash. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a
                                href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
                    </div>
                </footer> --}}
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    
    <!-- container-scroller -->
    @include('sweetalert::alert')
    <!-- plugins:js -->
    <script src="{{asset('body_css/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('/body_css/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/body_css/vendors/js/vendor.bundle.base.js') }}"></script>

    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('/body_css/vendors/select2/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->

    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('/body_css/js/dashboard.js') }}"></script>
    <script src="{{ asset('body_css/js/select2.js') }}"></script>


    <script src="{{ asset('/body_css/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/body_css/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    {{-- <script src="{{ asset('/body_css/vendors/jquery.repeater/jquery.repeater.min.js') }}"></script> --}}

    <script src="{{ asset('/body_css/js/dataTables.select.min.js') }}"></script>

    <script src="{{ asset('/body_css/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/body_css/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/body_css/js/template.js') }}"></script>
    <script src="{{ asset('/body_css/js/settings.js') }}"></script>
    <script src="{{ asset('/body_css/js/todolist.js') }}"></script>

    <script src="{{ asset('/body_css/js/tabs.js') }}"></script>
    {{-- <script src="{{ asset('/body_css/js/form-repeater.js') }}"></script> --}}
    <script src="{{ asset('/body_css/vendors/sweetalert/sweetalert.min.js') }}"></script>

    <script src="{{ asset('/body_css/vendors/inputmask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('/body_css/vendors/inputmask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('/body_css/js/inputmask.js') }}"></script>
    <script src="{{ asset('/vendor/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        function show() {
            document.getElementById("loader").style.display="block";
        }
        function logout() {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }

        $(document).ready(function() {
            $('.tablewithSearch').DataTable({
                processing: false,
                serverSide: false,
                ordering: false,
                pageLength: 10,
            });
        });
    </script>

    @yield('js')
</body>

</html>