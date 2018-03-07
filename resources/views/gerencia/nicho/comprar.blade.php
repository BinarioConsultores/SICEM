@extends('layouts.appgerencia')

@section('javascript')
<script type="text/javascript">

    function iralpaso2(){
        $("#div2").removeAttr( "hidden" )
        $("#div1").attr("hidden","true");
        $("#primero").attr("class","col-4 bs-wizard-step complete");
        $("#segundo").attr("class","col-4 bs-wizard-step active");

    }
    function iralpaso3(){
        $("#div2").removeAttr( "hidden" )
        $("#div3").removeAttr( "hidden" )
        $("#div1").attr("hidden","true");
        $("#div2").attr("hidden","true");
        $("#segundo").attr("class","col-4 bs-wizard-step complete");
        $("#tercero").attr("class","col-4 bs-wizard-step active");
    }

</script>
@endsection

@section('content')


<div class="content">
    <div class="doc data-table-doc page-layout simple full-width">
        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h2 class="doc-title" id="content">Nicho {{$nicho->nicho_nro}}</h2>
        </div>

        @if (Session::has('creado'))
        <div class="alert alert-success" role="alert">
            {{Session::get('creado')}}
        </div>
        @endif
        @if (Session::has('editado'))
        <div class="alert alert-success" role="alert">
            {{Session::get('editado')}}
        </div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('error')}}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (Session::has('eliminado'))
        <div class="alert alert-success" role="alert">
            {{Session::get('eliminado')}}
        </div>
        @endif

        <div class="page-content p-6">
            <div class="example">
                <div class="col-12">
                    <div class="row">
                        <div class="container">
                            <div class="row bs-wizard" style="border-bottom:0;">
                                <div class="col-4 bs-wizard-step active" id="primero">
                                    <div class="text-center bs-wizard-stepnum">Paso 1</div>
                                    <div class="progress"><div class="progress-bar"></div></div>
                                    <a href="#" class="bs-wizard-dot"></a>
                                    <div class="bs-wizard-info text-center">Registrar o Buscar los Datos del Solicitante</div>
                                </div>

                                <div class="col-4 bs-wizard-step disabled" id="segundo"><!-- complete -->
                                    <div class="text-center bs-wizard-stepnum">Paso 2</div>
                                    <div class="progress"><div class="progress-bar"></div></div>
                                    <a href="#" class="bs-wizard-dot"></a>
                                    <div class="bs-wizard-info text-center">Registrar o Buscar los Datos del Difunto</div>
                                </div>

                                <div class="col-4 bs-wizard-step disabled" id="tercero"><!-- complete -->
                                    <div class="text-center bs-wizard-stepnum">Paso 3</div>
                                    <div class="progress"><div class="progress-bar"></div></div>
                                    <a href="#" class="bs-wizard-dot"></a>
                                    <div class="bs-wizard-info text-center">Elegir la forma de pago</div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div> 
            </div>     
        </div>
      <!-- CONTENT -->
        <div class="page-content p-6">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8" >
                    <div class="example" >
                        <div class="description">
                            <div class="description-text">
                                <h5>Registrar Solicitante</h5>
                            </div>
                        </div>
                        <div class="source-preview-wrapper">
                            <div class="preview" id="div1">
                                <form action="/gerencia/pabellon/nicho/comprar">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Example multiple select</label>
                                        <select multiple="" class="form-control" id="exampleFormControlSelect2">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <input type="text" name="paso"  hidden="" value="1">
                                    <button class="btn btn-primary fuse-ripple-ready" onclick="iralpaso2();">Siguiente</button>
                                </form>
                            </div>
                            <div class="preview" id="div2" hidden="">
                                <form action="/gerencia/pabellon/nicho/comprar">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Example multiple select</label>
                                        <select multiple="" class="form-control" id="exampleFormControlSelect2">
                                            <option>segundo</option> 
                                        </select>
                                    </div>
                                    <input type="text" name="paso" hidden="" value="2">
                                    <button class="btn btn-primary fuse-ripple-ready" onclick="iralpaso3();">Siguiente</button>
                                </form>
                            </div>
                            <div class="preview" id="div3" hidden="">
                                <form action="/gerencia/pabellon/nicho/comprar">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Example multiple select</label>
                                        <select multiple="" class="form-control" id="exampleFormControlSelect2">
                                            <option>tercero</option> 
                                        </select>
                                    </div>
                                    <input type="text" name="paso" hidden="" value="3">
                                    <button class="btn btn-primary fuse-ripple-ready">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT -->

@endsection