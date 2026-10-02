<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.radixtouch.in/templates/admin/gati/source/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Mar 2021 12:27:37 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>Biopharma Academy</title>


    <!-- General CSS Files -->
    <link rel="stylesheet" href={{ asset('admin-assets/css/app.min.css') }}>
    <!-- Template CSS -->
    <link rel="stylesheet" href={{ asset('admin-assets/css/style.css') }}>
    <link rel="stylesheet" href={{ asset('admin-assets/css/components.css') }}>
    <link rel="stylesheet" href={{ asset('admin-assets/css/bootstrap.min.css') }}>
    <link rel="stylesheet" href={{ asset('admin-assets/bundles/jqvmap/dist/jqvmap.min.css') }}>
    <!-- Custom style CSS -->
    <link rel="stylesheet" href={{ asset('admin-assets/css/custom.css') }}>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    {{-- data table --}}
    <link rel="stylesheet" href={{ asset('admin-assets/bundles/datatables/datatables.min.css') }}>
    <link rel="stylesheet"
        href={{ asset('admin-assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}>
    {{-- font Awesome --}}
    {{-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}
    {{-- dropzone --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    <link type="text/css" rel="stylesheet" href={{ asset('admin-assets/dist/image-uploader.min.css') }}>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<style>
    select.form-control.form-control-sm {
    padding: 0px !important;
}
</style>

<body>

    @include('admin_blogs.layouts.header')


    <!-- Sidebar start -->


    @include('admin_blogs.layouts.sidebar')

    <!-- Sidebar End -->


    @yield('content')

    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>







        </div>
    </div>

    @include('admin_blogs.layouts.footer')

    <!-- General JS Scripts -->
    <script src={{ asset('admin-assets/js/app.min.js') }}></script>
    <!-- JS Libraies -->
    <script src={{ asset('admin-assets/bundles/apexcharts/apexcharts.min.js') }}></script>
    <script src={{ asset('admin-assets/bundles/jqvmap/dist/jquery.vmap.min.js') }}></script>
    <script src={{ asset('admin-assets/bundles/jqvmap/dist/maps/jquery.vmap.world.js') }}></script>
    <!-- Page Specific JS File -->
    <script src={{ asset('admin-assets/js/page/index.js') }}></script>
    <!-- Template JS File -->
    <script src={{ asset('admin-assets/js/scripts.js') }}></script>
    <!-- Custom JS File -->
    <script src={{ asset('admin-assets/js/custom.js') }}></script>

    {{-- datatable --}}

    <script src={{ asset('admin-assets/bundles/datatables/datatables.min.js') }}></script>
    <script src={{ asset('admin-assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}></script>
    <script src={{ asset('admin-assets/bundles/jquery-ui/jquery-ui.min.js') }}></script>
    {{-- text editor --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
    {{-- Dropzone --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
    <script src={{ asset('admin-assets/dist/image-uploader.min.js') }}></script>
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
    @stack('script')
</body>


<!-- Mirrored from www.radixtouch.in/templates/admin/gati/source/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Mar 2021 12:29:15 GMT -->

</html>
