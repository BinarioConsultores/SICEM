@extends('layouts.appgerencia')

@section('javascript')
<script type="text/javascript">

    $(document).ready( function() {
        var now = new Date();
        var month = (now.getMonth() + 1);               
        var day = now.getDate();
        if (month < 10) 
            month = "0" + month;
        if (day < 10) 
            day = "0" + day;
        var today = now.getFullYear() + '-' + month + '-' + day;
        $('#cont_fecha').val(today);
        $('#cont_fecha1').val(today);
    });

    function contado(){
        $("#opcionCredito").attr("hidden","true");
        $("#calculadora").attr("hidden","true");
        $("#opcionContado").removeAttr( "hidden" );
    }
    function credito(){
        $("#calculadora").removeAttr( "hidden" );
        $("#opcionContado").attr("hidden","true");
        $("#opcionCredito").removeAttr( "hidden" );
    }


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
    document.getElementById("cont_fecha1").innerHTML = Date();


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
                                
                                <div class="col-3 bs-wizard-step active" id="primero">
                                  <div class="text-center bs-wizard-stepnum">Paso 1</div>
                                  <div class="progress"><div class="progress-bar"></div></div>
                                  <a href="#" class="bs-wizard-dot"></a>
                                  <div class="bs-wizard-info text-center">Lorem ipsum dolor sit amet.</div>
                                </div>
                                
                                <div class="col-3 bs-wizard-step disabled" id="segundo"><!-- complete -->
                                  <div class="text-center bs-wizard-stepnum">Paso 2</div>
                                  <div class="progress"><div class="progress-bar"></div></div>
                                  <a href="#" class="bs-wizard-dot"></a>
                                  <div class="bs-wizard-info text-center">Nam mollis tristique erat vel tristique. Aliquam erat volutpat. Mauris et vestibulum nisi. Duis molestie nisl sed scelerisque vestibulum. Nam placerat tristique placerat</div>
                                </div>
                                
                                <div class="col-3 bs-wizard-step disabled" id="tercero"><!-- complete -->
                                  <div class="text-center bs-wizard-stepnum">Paso 3</div>
                                  <div class="progress"><div class="progress-bar"></div></div>
                                  <a href="#" class="bs-wizard-dot"></a>
                                  <div class="bs-wizard-info text-center">Integer semper dolor ac auctor rutrum. Duis porta ipsum vitae mi bibendum bibendum</div>
                                </div>
                                
                                <div class="col-3 bs-wizard-step disabled" id="cuarto"><!-- active -->
                                  <div class="text-center bs-wizard-stepnum">Paso 4</div>
                                  <div class="progress"><div class="progress-bar"></div></div>
                                  <a href="#" class="bs-wizard-dot"></a>
                                  <div class="bs-wizard-info text-center"> Curabitur mollis magna at blandit vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div> 
            </div>     
        </div>
      <!-- CONTENT -->
        <div class="page-content p-6">
            <div class="row" id="div1">
                <div class="col-3"></div>
                <div class="col-6" id="div1">
                    <div class="example">
                        <div class="profile-box latest-activity card">
                            <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                                
                                    <div class="title h6">Datos del Solicitante</div>
                                
                                <div class="more text-muted">Registro</div>
                            </header>

                            <div class="content activities p-4">
                                <form action="/gerencia/pabellon/nicho/comprar" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sol_nombre" id="NombreSolicitante"  placeholder="Nombre de Solicitante" required="">
                                        <label for="NombreSolicitante">Nombre de Solicitante</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sol_telefono"  id="TelefonoSolicitante"  placeholder="Ingrese su Telefono" required="">
                                        <label for="TelefonoSolicitante">Telefono</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sol_dir"  id="DirSolicitante"  placeholder="Ingrese su Direccion" required="">
                                        <label for="DirSolicitante">Direccion</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sol_dni" id="DNISolicitante"  placeholder="Ingrese su DNI" required="">
                                        <label for="DirSolicitante">DNI</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-6" align="left">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger fuse-ripple-ready">Cancelar <i class="icon-cancel"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-6" align="right">
                                            <div class="form-group">
                                                <input type="text" name="paso"  hidden="" value="1">
                                                <input type="text" name="nicho_id" value="{{$nicho->nicho_id}}" hidden="">
                                                <button  type="submit" class="btn btn-primary fuse-ripple-ready">Siguiente <i class="icon-arrow-right"></i></button>
                                            </div>    
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row" id="div2" hidden="">
                <div class="col-3"></div>
                <div class="col-6" id="div2">
                    <div class="example">
                        <div class="profile-box latest-activity card">
                            <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                                <div class="title h6">Datos del Solicitante</div>
                                <div class="more text-muted">Registro</div>
                            </header>
                            <div class="content activities p-4">
                                <form action="/gerencia/pabellon/nicho/comprar" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dif_nom" id="dif_nom"  placeholder="Nombre del Difunto" required="">
                                        <label for="dif_nom">Nombre del Difunto</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dif_ape" id="dif_ape"  placeholder="Apellido del Difunto" required="">
                                        <label for="dif_ape">Apellido del Difunto</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dif_dni" id="dif_dni"  placeholder="DNI. del Difunto" required="">
                                        <label for="dif_dni">DNI. del Difunto</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dif_fechadef" id="dif_fechadef"  placeholder="Fecha de defunción" required="">
                                        <label for="dif_fechadef">Fecha de defunción</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" name="dif_obser" id="dif_obser"  placeholder="Observaciones" required=""></textarea>
                                        <label for="dif_obser">Observaciones</label>
                                    </div>

                                    <div class="row">
                                        <div class="col-6" align="left">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger fuse-ripple-ready">Atras <i class="icon-arrow-left"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-6" align="right">
                                            <div class="form-group">
                                                <input type="text" name="paso"  hidden="" value="2">
                                                <input type="text" name="nicho_id" value="{{$nicho->nicho_id}}" hidden="">
                                                <button  type="submit" class="btn btn-primary fuse-ripple-ready">Siguiente <i class="icon-arrow-right"></i></button>
                                            </div>    
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row" id="div3" hidden="">
                <div class="col-2">
                    <div class="example">
                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                            <div class="title h6">Datos del Tipo de Pago</div>
                        </header>
                        <div class="content activities p-4">
                            <form action="/gerencia/pabellon/nicho/comprar" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <button type="button" class="btn btn-info fuse-ripple-ready" onclick="contado();">Contado <i class="icon-cash"></i></button>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-info fuse-ripple-ready" onclick="credito();">Credito <i class="icon-document"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-6" id="opcionContado" hidden="">
                    <div class="example">
                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                            <div class="title h6">Compra al Contado</div>
                        </header>
                        <div class="content activities p-4">
                            <form action="/gerencia/pabellon/nicho/comprar" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="cont_fecha" id="cont_fecha"  placeholder="Fecha del Contrato" required="">
                                        <label for="cont_fecha">Fecha del Contrato</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cont_tipopago" id="cont_tipopago"  placeholder="Tipo de Pago" required="" readonly="" value="contado">
                                        <label for="cont_tipopago">Tipo de Pago</label>
                                    </div>
                                    

                                    <div class="row">
                                        <div class="col-6" align="left">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger fuse-ripple-ready">Atras <i class="icon-arrow-left"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-6" align="right">
                                            <div class="form-group">
                                                <input type="text" name="paso"  hidden="" value="3">
                                                <input type="text" name="nicho_id" value="{{$nicho->nicho_id}}" hidden="">
                                                <button  type="submit" class="btn btn-primary fuse-ripple-ready">Siguiente <i class="icon-arrow-right"></i></button>
                                            </div>    
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
                <div class="col-6" id="opcionCredito" hidden="">
                    <div class="example">
                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                            <div class="title h6">Compra al Credito</div>
                        </header>
                        <div class="content activities p-4"> 
                            <form action="/gerencia/pabellon/nicho/comprar" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="row">
                                    
                                    <div class="form-group col-4">
                                        <label for="cont_tipouso">Tipo de Uso</label>
                                        <select  class="form-control" name="cont_tipouso">
                                            <option  selected="" value="cesion">Cesión de uso</option>
                                            <option value="perpetuo">Perpetuo</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                            <label  for="cont_precio">Precio de Nicho</label>
                                            <input class="form-control " type="text" name="cont_precio" value="{{$nicho->nicho_precio}}" required="" >
                                    </div>
                                    <div class="form-group col-1">
                                            <label for="cont_precio">(S/).</label>                     
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="inputZip" >Duración del contrato</label>
                                        <input type="number" class="form-control" id="inputZip" value="25" required="">
                                    </div>
                                    
                                </div>
                                 <div class="row">
                                    <div class="form-group col-4">
                                        <label for="cont_tipopago">TIpo de Pago</label>  
                                        <input  class="form-control" type="text" name="cont_tipopago" value="credito" required="">
                                           
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="cont_concepto">Concepto</label> 
                                        <input class="form-control" type="text" name="cont_concepto" value="concepto" disabled="" required="">
                                              
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="cont_estado">Estado de Contrado</label>
                                        <input class="form-control" type="text" name="cont_estado" value="En Trámite" disabled="" required="">
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-1"></div>
                                     <div class="form-group col-5">
                                        <label for="cont_fecha">Fecha de Contrato</label>
                                        <input class="form-control" type="date" name="cont_fecha" id="cont_fecha1" required="" required="">
                                        
                                    </div>
                                    <div class="form-group col-5">
                                        <label  for="cont_diffechasep">Fecha de Entierro</label>
                                        <input class="form-control" type="date" name="cont_diffechasep" id="cont_diffechasep" required="" required="">
                                        
                                    </div>

                                </div>
                            
                                
                               <div class="divider"></div>
                                <div class="content activities p-4">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label  for="conv_cuotaini">Cuota Inicial</label>
                                                    <input class="form-control " type="text" name="conv_cuotaini"  required="">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="conv_cuotaini">(S/).</label>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="conv_nrocuota">Nro. Cuotas</label>
                                                    <select class="form-control" id="conv_nrocuota">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                </div>
                                <input type="text" name="paso"  hidden="" value="3">
                                <input type="text" name="nicho_id" value="{{$nicho->nicho_id}}" hidden="">
                                <div class="row">
                                    <div class="form-group col-4">
                                        <button  type="" class="btn btn-danger fuse-ripple-ready">Atras<i class="icon-arrow-left"></i></button>
                                    </div>
                                    <div class="form-group col-4">
                                        <button  type="" class="btn btn-primary fuse-ripple-ready">Calcular Cuotas</button>
                                    </div>
                                    <div class="form-group col-4">
                                        <button  type="submit" class="btn btn-primary fuse-ripple-ready">Registrar</button>
                                    </div>
                               </div>
                            </form>
                        </div>
                    </div>
                </div>
                

                <div class="col-4" id="calculadora" hidden="">
                    <div class="example">
                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                            <div class="title h6">Calculadora de Pagos</div>
                        </header>


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
