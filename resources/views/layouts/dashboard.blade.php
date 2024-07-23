<!DOCTYPE html>

<html lang="fr" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="{{ 'assets/dashboard/' }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title }}</title>
    <meta name="description" content="CNMI Tableau de bord" />
    <meta name="keywords" content="CNMI Tableau de bord">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/dashboard/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/css/rtl/core.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/css/rtl/theme-default.css') }}"/>
    {{-- <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/dashboard/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/dashboard/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/dashboard/js/config.js') }}"></script>

    @stack('css')

</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            <!-- Menu -->
            @include('partials.dashboard_partials._sidebar')
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @include('partials.dashboard_partials._header')
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('partials.dashboard_partials._footer')

                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>


        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>


        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/dashboard/vendor/js/core.js -->

    <script src="{{ asset('assets/dashboard/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->
    @include('sweetalert::alert')

    <!-- Vendors JS -->
    <script src="{{ asset('assets/dashboard/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    {{-- <script src="{{ asset('assets/dashboard/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script> --}}

    <!-- Main JS -->
    <script src="{{ asset('assets/dashboard/js/main.js') }}"></script>


    <!-- Page JS -->
    <script src="{{ asset('assets/dashboard/js/app-ecommerce-dashboard.js') }}"></script>


    <!-- My personnal JS -->

    @stack('js')

</body>

</html>
