<!DOCTYPE html>
<html>
<head>
  <head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    <meta name="description" content="">

    <!-- STYLESHEETS -->
    <style type="text/css">
            [fuse-cloak],
            .fuse-cloak {
                display: none !important;
            }
        </style>
    <!-- Icons.css -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/icons/fuse-icon-font/style.css')}}">
    <!-- Animate.css -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendor/animate.css/animate.min.css')}}">
    <!-- PNotify -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendor/pnotify/pnotify.custom.min.css')}}">
    <!-- Nvd3 - D3 Charts -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendor/nvd3/build/nv.d3.min.css')}}" />
    <!-- Perfect Scrollbar -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" />
    <!-- Fuse Html -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendor/fuse-html/fuse-html.min.css')}}" />
    <!-- Main CSS -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/steps.css')}}">
    @yield('css')
    <!-- / STYLESHEETS -->

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <!-- Mobile Detect -->
    <script type="text/javascript" src="{{asset('assets/vendor/mobile-detect/mobile-detect.min.js')}}"></script>
    <!-- Perfect Scrollbar -->
    <script type="text/javascript" src="{{asset('assets/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!-- Popper.js -->
    <script type="text/javascript" src="{{asset('assets/vendor/popper.js/index.js')}}"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="{{asset('assets/vendor/bootstrap/bootstrap.min.js')}}"></script>
    <!-- Nvd3 - D3 Charts -->
    <script type="text/javascript" src="{{asset('assets/vendor/d3/d3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendor/nvd3/build/nv.d3.min.js')}}"></script>
    <!-- Data tables -->
    <script type="text/javascript" src="{{asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendor/datatables-responsive/js/dataTables.responsive.js')}}"></script>
    <!-- PNotify -->
    <script type="text/javascript" src="{{asset('assets/vendor/pnotify/pnotify.custom.min.js')}}"></script>
    <!-- Fuse Html -->
    <script type="text/javascript" src="{{asset('assets/vendor/fuse-html/fuse-html.min.js')}}"></script>
    <!-- Main JS -->
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
    
    @yield('javascript')

    <!-- / JAVASCRIPT -->
</head>
</head>
<body>
  @yield('conten')
</body>
</html>
?>