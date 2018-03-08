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
        $("#primero").attr("class","col-4 bs-wizard-step complete");
        $("#segundo").attr("class","col-4 bs-wizard-step complete");
        $("#tercero").attr("class","col-4 bs-wizard-step active");
    }
    
    document.getElementById("cont_fecha").innerHTML = Date();


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
                <div class="col-3"></div>
                <div class="col-6 ">
                    <div class="example">
                        <div class="description">
                            <div class="description-text">

                                @if (Session::has('paso'))
                                    @if(Session::get('paso')==1)
                                        <h5>Registro de Difunto</h5>
                                    @endif
                                    @if(Session::get('paso')==2)
                                        <h5>Tipo de pago</h5>
                                    @endif
                                @else
                                    <h5>Registro de Solicitante</h5>
                                @endif
                            </div>
                            
                        </div>

                        <div class="source-preview-wrapper">
                            
                                    <div class="preview" id="div1">
                                        <div class="preview-elements">
                                            <form action="/gerencia/pabellon/nicho/comprar">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="sol_nombre" id="Nombre---Solicitante"  placeholder="Nombre de Solicitante">
                                                    <label for="NombreSolicitante">Nombre de Solicitante</label>
                                                    <small id="emailHelp" class="form-text text-muted">Ingrese datos de solicitante.
                                                    </small>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="sol_telefono"  id="TelefonoSolicitante"  placeholder="Ingrese su Telefono">
                                                    <label for="TelefonoSolicitante">Telefono</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="sol_dir"  id="DirSolicitante"  placeholder="Ingrese su Direccion">
                                                    <label for="DirSolicitante">Direccion</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="sol_dni" id="DNISolicitante"  placeholder="Ingrese su DNI">
                                                    <label for="DirSolicitante">DNI</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="paso"  hidden="" value="1">
                                                    <input type="text" name="nicho_id" value="{{$nicho->nicho_id}}" hidden="">
                                                    <button  type="submit" class="btn btn-primary fuse-ripple-ready">Siguiente</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                        
                                    <div class="preview" id="div2" hidden="">
                                        <div class="preview-elements">
                                            <form action="/gerencia/pabellon/nicho/comprar">
                                                <div class="form-group">
                                                    <input type="text"   name="dif_nom" class="form-control" id="NombreSolicitante"  placeholder="Nombre de Solicitante">
                                                    <label for="NombreSolicitante">Nombre de Difunto</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="dif_ape"  class="form-control" id="TelefonoSolicitante"  placeholder="Ingrese sus Apellidos">
                                                    <label for="TelefonoSolicitante">Apellidos</label>
                                                </div>
                                                <div class="form-group">   
                                                    <input type="text"  name="dif_dni" class="form-control" id="DirSolicitante"  placeholder="Ingrese su DNI">
                                                    <label for="DirSolicitante">DNI</label>
                                                </div> 
                                                <div class="form-group">  
                                                    <input type="date" name="dif_fechadef"  class="form-control" id="DNISolicitante" >
                                                    <label for="DNISolicitante">Fecha de fallecido</label>
                                                </div> 
                                                <div class="form-group">
                                                    <textarea class="form-control" name="dif_obser" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    <label for="exampleFormControlTextarea1">Obervaciones</label>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <input type="text" name="paso" hidden="" value="2">
                                                    <input type="text" name="nicho_id" value="{{$nicho->nicho_nro}}" hidden="">
                                                    <button type="submit" class="btn btn-primary fuse-ripple-ready">Siguiente</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="preview" id="div3" hidden="">
                                        <div class="row">
                                            <div class="preview-elements">
                                                <form action="/gerencia/pabellon/nicho/comprar">
                                                    <div class="form-group">
                                                        <button  type="submit" class="btn btn-primary fuse-ripple-ready">Contado</button>
                                                        <button  type="submit" class="btn btn-primary fuse-ripple-ready">Credito</button>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <input type="text" name="nicho_id" value="{{$nicho->nicho_nro}}" hidden=""> 
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row m-6">
                
                <div class="col-6 ">
                    <div class="example">
                        <div class="source-preview-wrapper">
                            <div class="preview">
                                <div class="preview-elements">
                                    <form>
                                        <div class="form-group">
                                            <label for="cont_tipouso"></label>
                                            <select  class="form-control" name="cont_tipouso" id="cont_tipouso">
                                                <option value="cesion"> Cesión de uso</option>
                                                <option value="perpetuo">Perpetuo</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                           <input type="number"  class="form-control"  id="cont_tiempo" name="cont_tiempo" value="25">
                                        <div class="form-group mx-sm-3">
                                           <label for="cont_tiempo">años</label>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  class="form-control" name="cont_monto" id="cont_monto" value="{{$nicho->nicho_precio}}">
                                            <label  class="form-control" for="cont_monto">Precio de nicho</label>
                                        </div>
                                        <div class="form-group">
                                            <select  class="form-control" name="cont_tipopago">
                                                    <option value="contado">contado</option>
                                                    <option value="credito">credito</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  class="form-control" name="cont_concepto" value="concepto">
                                            <label  class="form-control" for="cont_concepto"></label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="cont_estado" id="cont_estado" value="bloqueado">
                                            <label for="cont_estado">Estado de contrato</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" name="cont_fecha" id="cont_fecha">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="example">
                        <div class="source-preview-wrapper">
                            <div class="preview">
                                <form action="">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="dif_nom"  value="{{Session::get('difunto')->dif_nom}}">
                                        <label class="form-control" for="dif_nom">Nombre de difunto</label>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="dif_ape"  value="{{Session::get('difunto')->dif_ape}}">
                                        <label class="form-control" for="dif_ape">Apellidos</label>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="dif_dni" value="{{Session::get('difunto')->dif_dni}}">
                                        <label class="form-control" for="dif_dni">DNI</label>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="dif_fechadef" value="{{Session::get('difunto')->dif_fechadef}}">
                                        <label class="form-control" for="dif_fechadef">Fecha de Fallecimiento</label>
                                    </div>
                                    <div class="form-group">
                                        <input  class="form-controlclass="form-control" " type="text" name="dif_obser" value="{{Session::get('difunto')->dif_obser}}">
                                        <label  class="form-control" for="dif_obser">Obervaciones</label>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
               
            </div>
        </div>
</div>
<!-- CONTENT -->
@endsection



@section('javascriptFinal')

    @if (Session::has('paso'))
        @if(Session::get('paso')==1)
            <script type="text/javascript">
                iralpaso2();
            </script>
        @endif
        @if(Session::get('paso')==2)
            <script type="text/javascript">
                iralpaso3();
            </script>
        @endif

    @endif
@endsection
