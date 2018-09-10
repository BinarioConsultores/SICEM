@extends('layouts.appadmin')
@section('javascript')
<script type="text/javascript">
    function verNumeracion(){
        var sel = $('#pab_tiponum');
        var divTotalNichos = $('#divTotalNichos');
        if (sel.val()=="tierra") {
            $('#divTotalNichos').removeAttr("hidden");
            $('#divFilColNichos').attr("hidden","false");
            $('#pab_nrocol').val(-1);
            $('#pab_nrofil').val(-1);
            $('#pab_cantnicho').val(0);
        }
        else{
            $('#divTotalNichos').attr("hidden", "true");
            $('#divFilColNichos').removeAttr("hidden");
            $('#pab_nrofil').val(0);
            $('#pab_nrocol').val(0);
        }
    }
</script>

@endsection

@section('content')
    <div class="content">

        <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="gridModalLabel">Tipos de Numeración</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="row">
                                <div class="col-md-6"><img src="{{asset('assets\images\numeracion\numA.png')}}"></div>
                                <div class="col-md-6"><img src="{{asset('assets\images\numeracion\numB.png')}}"></div>
                                <div class="col-md-6"><img src="{{asset('assets\images\numeracion\numC.png')}}"></div>
                                <div class="col-md-6"><img src="{{asset('assets\images\numeracion\numD.png')}}"></div>
                                <div class="col-md-6"><img src="{{asset('assets\images\numeracion\numE.png')}}"></div>
                                <div class="col-md-6"><img src="{{asset('assets\images\numeracion\numF.png')}}"></div>
                                <div class="col-md-6"><img src="{{asset('assets\images\numeracion\numG.png')}}"></div>
                                <div class="col-md-6"><img src="{{asset('assets\images\numeracion\numH.png')}}"></div>
                                <div class="col-md-6"><img src="{{asset('assets\images\numeracion\numI.png')}}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="doc forms-doc page-layout simple full-width">

            <!-- HEADER -->
            <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
                <h2 class="doc-title" id="content">Crear Nuevo Pabellón</h2>

            </div>
            <!-- / HEADER -->
<!-- CONTENT -->
            <div class="page-content p-6">
                <div class="content container">
                    <div class="row">
                        <!-- FORM CONTROLS -->
                        <div class="col-12 col-md-12">
                            <div class="example">
                                <div class="description">
                                    <div class="description-text">
                                        <h5>Datos del Pabellón</h5>
                                    </div>
                                </div>

                                <div class="source-preview-wrapper">
                                    <div class="preview">
                                        <div class="preview-elements">
                                            <form method="POST" action="/admin/pabellon/crear" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="text" hidden="" name="cement_id" value="{{$cementerio->cement_id}}">
                                                <div class="form-group">
                                                    <input autocomplete="off" type="text" name="pab_nom" class="form-control" id="pab_nom" placeholder="Ingrese el Nombre del Pabellón">
                                                    <label for="pab_nom">Nombre de Pabellón</label> 
                                                </div>
                                               <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="pab_tiponum">Seleccione el tipo de numeración</label>
                                                            <select class="form-control" id="pab_tiponum" name="pab_tiponum" onchange="verNumeracion();">
                                                                <option value="tierra">Nichos en Tierra</option>
                                                                <option value="A" selected>A</option>
                                                                <option value="B">B</option>
                                                                <option value="C">C</option>
                                                                <option value="D">D</option>
                                                                <option value="E">E</option>
                                                                <option value="F">F</option>
                                                                <option value="G">G</option>
                                                                <option value="H">H</option>
                                                                <option value="I">I</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-4">
                                                        <div class="form-group" align="center">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gridSystemModal">
                                                            Mostrar Tipos
                                                        </button>
                                                        </div>
                                                    </div>
                                                </div>
                                               <div class="row" id="divFilColNichos">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="number" name="pab_nrofil" class="form-control" id="pab_nrofil" placeholder="Ingrese el número de filas">
                                                            <label for="pab_nrofil">Número de Filas</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="number" name="pab_nrocol" class="form-control" id="pab_nrocol" placeholder="Ingrese el número de columnas">
                                                            <label for="pab_nrocol">Número de Columnas</label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row" hidden id="divTotalNichos">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="number" name="pab_cantnicho" class="form-control" id="pab_cantnicho" placeholder="Ingrese el total de nichos del pabellon" value="-1">
                                                            <label id="pab_cantnicho_help" for="pab_cantnicho">Número Total de Nichos</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                {{-- <div class="form-group">
                                                    <label for="pab_pathimag">Seleccione una Imagen</label>
                                                    <input type="file" class="form-control-file" id="pab_pathimag" name="pab_pathimag">
                                                </div> --}}

                                                                                                
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>

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

