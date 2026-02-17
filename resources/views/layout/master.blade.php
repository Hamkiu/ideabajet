<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('template/images/mbi_logo.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Belanjawan 2027 | @yield('title')</title>
    <!-- Custom CSS -->
    <link href="{{ asset('template/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/libs/morris.js/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('template/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <link href="{{ asset('template/libs/jquery-steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('template/libs/jquery-steps/steps.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('template/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    @stack('styles')
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('layout.topbar')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('layout.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        {{-- <h4 class="page-title">
                            @yield('page-title', 'Dashboard')
                        </h4> --}}
                    </div>
            
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            {{ Breadcrumbs::render() }}
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="text-center mb-4">
                    <h2 class="font-weight-bold text-uppercase">
                        IDEA BAJET <script>document.write(new Date().getFullYear() + 1)</script>
                    </h2>
                </div>
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                <p class="">Copyright © <script>document.write(new Date().getFullYear())</script> All Rights Reserved <a target="_blank" href="https://designreset.com/cork-admin/">Musyhabizu</a>.</p>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    @include('layout.setting')
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('template/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('template/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('template/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('template/js/app.min.js') }}"></script>
    <script src="{{ asset('template/js/app.init.js') }}"></script>
    <script src="{{ asset('template/js/app-style-switcher.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('template/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('template/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('template/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('template/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('template/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ asset('template/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('template/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!--c3 charts -->
    <script src="{{ asset('template/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('template/extra-libs/c3/c3.min.js') }}"></script>
    <!--chartjs -->
    <script src="{{ asset('template/libs/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('template/libs/morris.js/morris.min.js') }}"></script>

    <script src="{{ asset('template/js/pages/dashboards/dashboard1.js') }}"></script>
    <script src="{{ asset('template/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/js/pages/datatable/datatable-basic.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('template/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('template/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>



    @stack('scripts')
</body>

</html>