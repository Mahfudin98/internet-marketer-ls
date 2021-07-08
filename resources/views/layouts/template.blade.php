<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/src/assets/vendors/iconfonts/mdi/css/materialdesignicons.css') }}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/src/assets/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('admin/src/assets/css/demo_1/style.css') }}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{ asset('admin/src/asssets/images/favicon.ico') }}" />
    @yield('css')
  </head>
  <body class="header-fixed">
    <!-- partial:partials/_header.html -->
    @include('layouts.module.header')
    <!-- partial -->
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      @include('layouts.module.sidebar')
      <!-- partial -->
      <div class="page-content-wrapper">
        @yield('content')
        <!-- content viewport ends -->
        <!-- partial:partials/_footer.html -->
        @include('layouts.module.footer')
        <!-- partial -->
      </div>
      <!-- page content ends -->
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="{{ asset('admin/src/assets/vendors/js/core.js') }}"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="{{ asset('admin/src/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/src/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/src/assets/js/charts/chartjs.addon.js') }}"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="{{ asset('admin/src/assets/js/template.js') }}"></script>
    <script src="{{ asset('admin/src/assets/js/dashboard.js') }}"></script>
    <!-- endbuild -->
    @yield('js')
  </body>
</html>
