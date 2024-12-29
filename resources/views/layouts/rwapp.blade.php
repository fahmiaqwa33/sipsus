<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'rw Dashboard')</title>

    <!-- Include Star Admin 2 CSS -->
    <link rel="stylesheet" href="{{ asset('src/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('src/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('src/assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('src/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('src/assets/vendor.bundle.base.css') }}">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('src/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('src/assets/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('src/assets/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('src/assets/css/style.css') }}">
    
    
    
    <!-- Custom Styles -->
</head>
<body>
    <div class="container-scroller">
        <!-- Navbar -->
        @include('partials.navbar')

        <!-- Main Content -->
        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            @include('sidebar.rw')

            <!-- Main Panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                
            </div>
            <!-- main-panel ends -->
            
        </div>
        <!-- page-body-wrapper ends -->

    </div>
    <!-- container-scroller -->
    
    <!-- Include JS -->
<!-- Vendor Scripts -->
<script src="{{ asset('src/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('src/assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('src/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('src/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>

<!-- Core Scripts -->
<script src="{{ asset('src/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('src/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('src/assets/js/template.js') }}"></script>
<script src="{{ asset('src/assets/js/settings.js') }}"></script>
<script src="{{ asset('src/assets/js/todolist.js') }}"></script>

<!-- Custom Scripts -->
<script src="{{ asset('src/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('src/assets/js/dashboard.js') }}"></script>
<script src="{{ asset('src/assets/js/Chart.roundedBarCharts.js') }}"></script>

</body>
</html>
