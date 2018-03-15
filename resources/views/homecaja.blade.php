@extends('layouts.appcaja')
@section('javascript')
<script type="text/javascript">
    function select(){
    $("select[value=nombre]").change(function(){
            $("#nombre_div").removeAttr( "hidden")
            $("#dni_div").attr("hidden","true");
        });
    $("select[value=dni]").change(function(){
            $("#dni_div").removeAttr( "hidden")
            $("#nombre_div").attr("hidden","true");
        });
    }
</script>
@endsection
@section('content')
<div class="content">
        @if (session('status'))
            <strong>{{ session('status') }}</strong>         
        @endif
            <div class="doc forms-doc page-layout simple full-width">
                <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
                    <h2 class="doc-title" id="content">Realice la busqueda para realizar pago.</h2>
                </div>
                <div class="page-content p-12">
                    <div class="content container">
                        <div class="row">
                    <!-- FORM CONTROLS -->
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div class="example">
                                    <div class="card">
                                        <div class="description">
                                            <div class="description-text">
                                                <header class="h6 bg-secondary text-auto p-4">
                                                    <div class="title">Ingrese los datos solicitados</div>
                                                </header>
                                            </div>
                                        </div>
                                        <div class="source-preview-wrapper">
                                            <div class="preview">
                                                <form class="form" action="/caja/buscar" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="row">
                                                        <div class="col-1"></div>
                                                        <div class="form-group p-7  col-6" id="nombre_div" >
                                                          <label for="sol_nombre" class="form-label">Ingrese datos del solicitante o del difunto</label>
                                                          <input type="text" class="form-control" name="busqueda"  id="busqueda" placeholder="Nombre,DNI">
                                                        </div>
                                                        <div class="form-group p-12 col-5">
                                                            <button type="submit" class="btn btn-primary m-1">Buscar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="example">
                                    <div class="card">
                                        <div class="description">
                                            <div class="description-text">
                                                <header class="h6 bg-secondary text-auto p-4">
                                                    <div class="title">Resultados Obtenidos</div>
                                                </header>
                                            </div>
                                        </div>
                                        <div class="source-preview-wrapper">
                                            <div class="preview">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection