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
  @yield('content')
</body>
</html>
?>
<div class="col-md-3 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">Búsqueda</div>
            <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/validado/producto">
                        <input type="hidden" name="_token" value="Vf2LWVSqFdimJ4Q6WFm76uaIlM8egDkTVlQyFzSf">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Código</label>
                            <div class="col-md-8 col-md-offset-1">
                                <input type="text" class="form-control text-uppercase" name="prod_cod">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Descripción</label>
                            <div class="col-md-8 col-md-offset-1">
                                <input type="text" class="form-control text-uppercase" name="prod_desc">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Exonerado</label>
                            <div class="col-md-8 col-md-offset-1">
                                <input type="radio" checked="checked" class="radio-inline" name="prod_exo" value="A">Ambos
                                <input type="radio" class="radio-inline" name="prod_exo" value="SI">Sí
                                <input type="radio" class="radio-inline" name="prod_exo" value="NO">No
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Familia</label>
                            <div class="col-md-8 col-md-offset-1">
                                <select name="fam_id" class="form-control text-uppercase">
                                    <option value="0">Elija Familia</option>
                                                                           <option value="1">FAM1</option>
                                                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Categoría</label>
                            <div class="col-md-8 col-md-offset-1">
                                <select name="cat_id" class="form-control text-uppercase">
                                    <option value="0">Elija Categoría</option>
                                                                           <option value="1">CAT1</option>
                                                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Unidad</label>
                            <div class="col-md-8 col-md-offset-1">
                                <select name="um_id" class="form-control text-uppercase">
                                    <option value="0">Elija Unidad</option>
                                                                           <option value="2">KILO</option>
                                                                           <option value="1">TONELADA</option>
                                                                    </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-2">
                                <button type="submit" name="buscar" value="buscar" class="btn btn-default">
                                    <img src="/images/buscar.png" title="BUSCAR">
                                </button>
                            </div>
                            <div class="col-md-3 col-md-offset-2">
                                <button type="submit" name="imprimir" value="imprimir" class="btn btn-default">
                                    <img src="/images/imprimir.png" title="IMPRIMIR">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>