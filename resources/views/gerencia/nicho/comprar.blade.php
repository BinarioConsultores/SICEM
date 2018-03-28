@extends('layouts.appgerencia')

@section('javascript')
<script type="text/javascript">
    var today = 0;
    $(document).ready( function() {
        var now = new Date();
        var month = (now.getMonth() + 1);               
        var day = now.getDate();
        if (month < 10) 
            month = "0" + month;
        if (day < 10) 
            day = "0" + day;
        today = now.getFullYear() + '-' + month + '-' + day;
        $('#cont_fecha').val(today);
        $('#cont_fecha1').val(today);
        $('#dif_fechadef').val(today);
        $('#dif_fechadef').focus();
        $('#dif_fechadef').blur();
        $('#dif_obser').focus();
        $('#dif_obser').blur();

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
        $("#div2").removeAttr( "hidden" );
        $("#div1").attr("hidden","true");
        $("#primero").attr("class","col-3 bs-wizard-step complete");
        $("#segundo").attr("class","col-3 bs-wizard-step active");

    }
    function iralpaso3(){
        $("#div2").removeAttr( "hidden" );
        $("#div3").removeAttr( "hidden" );
        $("#div1").attr("hidden","true");
        $("#div2").attr("hidden","true");
        $("#primero").attr("class","col-3 bs-wizard-step complete");
        $("#segundo").attr("class","col-3 bs-wizard-step complete");
        $("#tercero").attr("class","col-3 bs-wizard-step active");
    }

    

    $(function() {
        $("#busca_sol_nombre").on('keyup', function (e) {
            if (e.keyCode == 13) {
                var sol_nombre = $(this).val();
                $('#infoListSol').empty();
                $('#infoListSol').append("<img align='center' src='{{asset('assets/images/cargandop.gif')}}'>");
                var request = $.ajax({
                    url: '/ajax/get/ObtenerSolicitantesPorNombre',
                    type: 'GET',
                    data: { sol_nombre: sol_nombre} ,
                    contentType: 'application/json; charset=utf-8',
                });

                request.done(function(data) {
                    $('#infoListSol').empty();
                    if (data.length == 0) {
                        $('#infoListSol').append("<div class='alert alert-danger m-4' role='alert'>No existen solicitantes con los datos ingresados.</div>");
                        $('#listSol').empty();
                        $('#listSol').attr("hidden","hidden");
                        $('#listSol').append($('<option>', { 
                            value: 0,
                            text: "No se encontraron registros",
                        }));                     
                    }
                    else{
                        $('#listSol').empty();
                        $('#listSol').removeAttr("hidden");
                        $.each(data, function(index,solicitante){
                            $('#listSol').append($('<option>', { 
                                value: solicitante.sol_id,
                                text: solicitante.sol_nombre + " (" + solicitante.sol_dni + ")",
                                sol_dni: solicitante.sol_dni,
                                sol_dir: solicitante.sol_dir,
                                sol_nombre: solicitante.sol_nombre,
                                sol_telefono: solicitante.sol_telefono,
                            }));
                        });
                    }           
                });
            }
        });
    });

    $(function() {
        $("#busca_sol_dni").on('keyup', function (e) {
            if (e.keyCode == 13) {
                var sol_dni = $(this).val();
                $('#infoListSol').empty();
                $('#infoListSol').append("<img align='center' src='{{asset('assets/images/cargandop.gif')}}'>");
                var request = $.ajax({
                    url: '/ajax/get/ObtenerSolicitantesPorDNI',
                    type: 'GET',
                    data: { sol_dni: sol_dni} ,
                    contentType: 'application/json; charset=utf-8'
                });

                request.done(function(data) {
                    $('#infoListSol').empty();
                    if (data.length == 0) {
                        $('#infoListSol').append("<div class='alert alert-danger m-4' role='alert'>No existen solicitantes con los datos ingresados.</div>");
                        $('#listSol').empty();
                        $('#listSol').attr("hidden","hidden");
                        $('#listSol').append($('<option>', { 
                            value: 0,
                            text: "No se encontraron registros"
                        }));                     
                    }
                    else{
                        $('#listSol').empty();
                        $('#listSol').removeAttr("hidden");
                        $.each(data, function(index,solicitante){
                            $('#listSol').append($('<option>', { 
                                value: solicitante.sol_id,
                                text: solicitante.sol_nombre + " (" + solicitante.sol_dni + ")",
                                sol_dni: solicitante.sol_dni,
                                sol_dir: solicitante.sol_dir,
                                sol_nombre: solicitante.sol_nombre,
                                sol_telefono: solicitante.sol_telefono,
                            }));
                        });
                    }
                });
            }
        });
    });
    
    $(function() {
        $('#listSol').change(function() {
            var sol_id = $(this).val();
            $('#sol_nombre').focus();
            $('#sol_nombre').attr('value',$('option:selected', this).attr('sol_nombre')).change();
            $('#sol_nombre').attr('readonly',true).change();

            $('#sol_telefono').focus();
            $('#sol_telefono').attr('value',$('option:selected', this).attr('sol_telefono')).change();
            $('#sol_telefono').attr('readonly',true).change();

            $('#sol_dir').focus();
            $('#sol_dir').attr('value',$('option:selected', this).attr('sol_dir')).change();
            $('#sol_dir').attr('readonly',true).change();

            $('#sol_dni').focus();
            $('#sol_dni').attr('value',$('option:selected', this).attr('sol_dni')).change();
            
            $('#sol_dni').attr('readonly',true).change();

            $('#solselected').attr('value',sol_id).change();
        }); 
    });

    $(function() {
        $('#cont_tipopago').change(function() {
            var cont_tipopago = $(this).val();
            if (cont_tipopago == "contado"){
                $("#campoCredito").attr("hidden","hidden");
                $("#conv_cuotaini").attr("hidden","hidden");
                $("#conv_cuotaini").removeAttr("required");
                $("#calculadora").attr("hidden","hidden");
                $("#btnCalcular").attr("hidden","hidden");

            }else{
                if (cont_tipopago == "credito") {
                    $("#campoCredito").removeAttr("hidden");
                    $("#conv_cuotaini").attr("required","required");
                    $("#conv_cuotaini").removeAttr("hidden");
                    $("#calculadora").removeAttr("hidden");
                    $("#btnCalcular").removeAttr("hidden");
                }
            }
        }); 
    });

    $(function(){
        $("#btnLimpiar").click( function(){
            
            $('#solselected').attr('value','0').change();
            $('#sol_nombre').attr('readonly',false).change();
            $('#sol_telefono').attr('readonly',false).change();
            $('#sol_dir').attr('readonly',false).change();
            $('#sol_dni').attr('readonly',false).change();

            $('#sol_nombre').attr('value','').change();
            $('#sol_telefono').attr('value','').change();
            $('#sol_dir').attr('value','').change();
            $('#sol_dni').attr('value','').change();
            $('#frmSol').trigger("reset");
            }
        );
    });

    $(function(){
        $("#btnCalcular").click( function(){
            $('#calculado').empty();
            var dia_hoy = new Date().getDate();
            var fecha_hoy = new Date();
            var mes_hoy = new Date().getMonth()+1;
            var ano_hoy = new Date().getFullYear();
            var xcost_nicho = $("#cont_monto").val();
            var xcuota_ini = $("#conv_cuotaini").val();
            var xnro_cuotas = $("#conv_nrocuota").val();
            var xpagototal=xcost_nicho - xcuota_ini;
            var xresiduo=xpagototal%xnro_cuotas;
            var xmontocomun=(xpagototal-xresiduo)/xnro_cuotas;

            if(xcuota_ini+1 == 1 || xcuota_ini<1){
                $('#calculado').append("<div class='alert alert-danger m-4' role='alert'>Tiene que colocar una cuota inicial y el monto debe ser entero.</div>");
            }else{
                if(xresiduo>0){
                    xpricuota=xmontocomun+1;
                }
                else{
                    xpricuota=xmontocomun;
                }
                var table = $("<table border=0 cellpadding=5 cellspacing=5 align='center'></table>");
                table.append("<tr bgcolor='#2196F3'> <td><font color='#ffffff'><strong>Nro de cuotas</strong></font></td> <td><font color='#ffffff'><strong>FECHA</strong></font></TD> <td><font color='#ffffff'><strong>S/.</strong></font></td></tr>'");
                table.append("<tr bgcolor='#FFE5B3'><th>Cuota Inicial: </th> <td>" + today + "</td><td>  "+xcuota_ini+"</td></tr>");
                
                var dia_hoyX = dia_hoy;
                mes_hoy=mes_hoy+1;
                var fila = "";
                for(var j=1; j<=xnro_cuotas; j++) 
                {
                    fila = "<tr bgcolor='#B0D9F3'>";
                    fila+= "<th>"+j+" Cuota</th>"; 
                    if(mes_hoy>12){   
                        mes_hoy=1;
                        ano_hoy=ano_hoy+1;
                    }
                    if ((dia_hoy== 31) &&(mes_hoy==4 || mes_hoy==6 || mes_hoy==9 || mes_hoy==11 )) 
                        dia_hoyX = 30;
                    if( mes_hoy == 2 && dia_hoy>27){
                        if ((dia_hoy==29 || dia_hoy==30 || dia_hoy==31) &&  ((ano_hoy % 4 == 0) && !(ano_hoy % 100 == 0 && ano_hoy % 400!= 0)))
                            dia_hoyX = 29;
                        else 
                            dia_hoyX = 28;
                    }   
                    if (mes_hoy <10)
                        fila+= "<th>"+ano_hoy+"-0"+mes_hoy+'-'+dia_hoyX+"</th>";
                    else 
                        fila+= "<th>"+ano_hoy+'-'+mes_hoy+'-'+dia_hoyX+"</th>";    
                        
                    if(j<=xresiduo)
                        fila+= "<td>"+Math.round(xpricuota)+"</td>";
                    else      
                        fila+= "<td>"+Math.round(xmontocomun)+"</td>";
                    
                    dia_hoyX = dia_hoy;
                    mes_hoy=mes_hoy+1;    
                    fila+= "</tr>";
                    table.append(fila);
                }

                $('#calculado').append(table);
            }
        });
    });
    
    

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
                                  <div class="bs-wizard-info text-center">Registrar los datos del Solicitante Nuevo o Buscar uno mendiante nombre o DNI y elegirlo</div>
                                </div>
                                
                                <div class="col-3 bs-wizard-step disabled" id="segundo"><!-- complete -->
                                  <div class="text-center bs-wizard-stepnum">Paso 2</div>
                                  <div class="progress"><div class="progress-bar"></div></div>
                                  <a href="#" class="bs-wizard-dot"></a>
                                  <div class="bs-wizard-info text-center">Registrar a un nuevo difunto con los datos debidamente llenados.</div>
                                </div>
                                
                                <div class="col-3 bs-wizard-step disabled" id="tercero"><!-- complete -->
                                  <div class="text-center bs-wizard-stepnum">Paso 3</div>
                                  <div class="progress"><div class="progress-bar"></div></div>
                                  <a href="#" class="bs-wizard-dot"></a>
                                  <div class="bs-wizard-info text-center">Elegir la forma de pago, CONTADO o CRÉDITO, llenar los datos. Calcular las cuotas en caso sea al crédito.</div>
                                </div>
                                
                                <div class="col-3 bs-wizard-step disabled" id="cuarto"><!-- active -->
                                  <div class="text-center bs-wizard-stepnum">Paso 4</div>
                                  <div class="progress"><div class="progress-bar"></div></div>
                                  <a href="#" class="bs-wizard-dot"></a>
                                  <div class="bs-wizard-info text-center">Resumen de la compra en general</div>
                                </div>
                            </div>
                             @if (Session::has('paso'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('paso')}}
                                    </div>
                                @endif
                                @if (Session::has('solicitante.existe'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('solicitante.existe')}}
                                    </div>
                                @endif
                                @if (Session::has('difunto'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('difunto')}}
                                    </div>
                                @endif
                        </div>    
                    </div>
                </div> 
            </div>     
        </div>
      <!-- CONTENT -->
        <div class="page-content p-6">
            <div class="row" id="div1">
                <div class="col-4">
                    <div class="profile-box latest-activity card">
                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">  
                            <div class="title h6">Buscar un Solicitante</div>
                            <div class="more text-muted">Busca un Solicitante</div>
                        </header>

                        <div class="content activities p-4">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group col-12">
                                <input type="text" class="form-control" name="busca_sol_nombre" id="busca_sol_nombre"  placeholder="Nombre de Solicitante a buscar">
                                <label for="busca_sol_nombre"><i class="icon-magnify"></i> Nombre de Solicitante a buscar</label>
                            </div>
                            <div class="form-group col-12">
                                <input title="Ingrese un D.N.I. válido" pattern="\d*" type="text" class="form-control" name="sol_dni" id="busca_sol_dni"  placeholder="Ingrese el DNI a buscar">
                                <label for="sol_dni"><i class="icon-account-card-details"></i> D.N.I. a buscar</label>
                            </div>
                            <div class="form-group" id="divListSol">
                                <div id="infoListSol">
                                    
                                </div>
                                <label for="listSol">Seleccione un Solicitante</label>
                                <select multiple="" class="form-control" id="listSol">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-8" id="div1">
                    <div class="profile-box latest-activity card">
                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4"> 
                            <div class="title h6">Registrar los datos del Solicitante</div>
                            <div class="more text-muted">Registro</div>
                        </header>

                        <div class="content activities p-4">
                            <form action="/gerencia/pabellon/nicho/comprar" method="POST" id="frmSol">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" name="sol_nombre" id="sol_nombre"  placeholder="Nombre de Solicitante" required>
                                    <label for="sol_nombre"><i class="icon-account-box"></i> Nombre de Solicitante</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="sol_telefono"  id="sol_telefono"  placeholder="Ingrese su Telefono" required>
                                    <label for="sol_telefono"><i class="icon-cellphone-android"></i> Telefono</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="sol_dir"  id="sol_dir"  placeholder="Ingrese su Direccion" required>
                                    <label for="sol_dir"><i class="icon-map-marker-radius"></i> Direccion</label>
                                </div>
                                <div class="form-group">
                                    <input pattern=".{8,8}" required title="Ingrese un D.N.I. válido" type="text" class="form-control" name="sol_dni" id="sol_dni"  placeholder="Ingrese su DNI">
                                    <label for="sol_dni"><i class="icon-account-card-details"></i> DNI</label>
                                </div>
                                
                                <input type="text" class="form-control" name="solselected" id="solselected" value="0" readonly hidden>
                                    
                                <div class="row">
                                    <div class="col-6" align="left">
                                        <div class="form-group">
                                            <button type="button" id="btnLimpiar" class="btn btn-info fuse-ripple-ready">Cancelar Búsqueda <i class=""></i></button>
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
                <div class="col-3"></div>
            </div>

            <div class="row" id="div2" hidden="">
                <div class="col-3"></div>
                <div class="col-6" id="div2">
                    <div class="example">
                        <div class="profile-box latest-activity card">
                            <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                                <div class="title h6">Datos del Difunto</div>
                                <div class="more text-muted">Registro</div>
                            </header>
                            <div class="content activities p-4">
                                <form action="/gerencia/pabellon/nicho/comprar" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dif_nom" id="dif_nom"  placeholder="Nombre del Difunto" required="">
                                        <label for="dif_nom"><i class="icon-account-box"></i> Nombre del Difunto</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dif_ape" id="dif_ape"  placeholder="Apellido del Difunto" required="">
                                        <label for="dif_ape"><i class="icon-account-box"></i> Apellido del Difunto</label>
                                    </div>
                                    <div class="form-group">
                                        <input pattern=".{8,8}" type="text" class="form-control" name="dif_dni" id="dif_dni"  placeholder="DNI. del Difunto" required="">
                                        <label for="dif_dni"><i class="icon-account-card-details"></i> DNI. del Difunto</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="dif_fechadef" id="dif_fechadef"  placeholder="Fecha de defunción" required="">
                                        <label for="dif_fechadef"><i class="icon-calendar"></i> Fecha de defunción</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" name="dif_obser" id="dif_obser"  placeholder="Ejm: Pendiente copia de Dni." required="" >Sin Observaciones</textarea>
                                        <label for="dif_obser"><i class="icon-comment-text-outline"></i> Observaciones</label>
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

                <div class="col-8" id="opcionCredito">
                    <div class="example">
                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                            <div class="title h6">Compra al Credito</div>
                        </header>
                        <div class="content activities p-4"> 
                            <form action="/gerencia/pabellon/nicho/comprar" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="cont_tipouso"><i class="icon-arrange-bring-forward"></i> Tipo de Uso</label>
                                        <select  class="form-control" name="cont_tipouso">
                                            <option  selected="" value="cesion">Cesión de uso</option>
                                            <option value="perpetuo">Perpetuo</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label  for="cont_monto"><i class="icon-cash"></i> Precio de Nicho en S/.</label>
                                        <input class="form-control" placeholder="Ejm: 1500.00" type="text" id="cont_monto" name="cont_monto" value="{{$nicho->nicho_precio}}" required="" >
                                    </div>
                                    
                                    <div class="form-group col-4">
                                        <label for="cont_tiempo"><i class="icon-timetable"></i> Duración del contrato (años)</label>
                                        <input type="number" class="form-control" id="cont_tiempo" value="25" name="cont_tiempo" required="">
                                    </div>
                                    
                                </div>
                                 <div class="row">

                                    <div class="form-group col-4">
                                        <label for="cont_tipopago"><i class="icon-note-multiple-outline"></i> Tipo de Pago</label>  
                                        <select  class="form-control" name="cont_tipopago" id="cont_tipopago">
                                            <option selected value="contado">Contado</option>
                                            <option value="credito">Convenio/Crédito</option>
                                        </select>     
                                    </div>

                                    <div class="form-group col-4">
                                        <label for="cont_concepto"><i class="icon-notification-clear-all"></i> Concepto</label> 
                                        <input class="form-control" type="text" name="cont_concepto" value="concepto" readonly="" required="">
                                              
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="cont_estado"><i class="icon-information-variant"></i> Estado de Contrado</label>
                                        <input class="form-control" type="text" name="cont_estado" value="En Trámite" readonly="" required="">
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="cont_fecha"><i class="icon-calendar"></i> Fecha de Contrato</label>
                                        <input class="form-control" type="date" name="cont_fecha" id="cont_fecha1" readonly="" required="">    
                                    </div>
                                    <div class="form-group col-4">
                                        <label  for="cont_diffechsep"><i class="icon-church"></i> Fecha de Sepultura</label>
                                        <input class="form-control" type="date" name="cont_diffechsep" id="cont_diffechsep" required="" required="">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="usu_id_auto"><i class="icon-person-box"></i> Usuario que autoriza</label>

                                        @if(sizeof($usuarios)>0)
                                            <select  class="form-control" name="usu_id_auto" required="">
                                                <option  selected="" value="0">Seleccione usuario autorizador </option>
                                                @foreach($usuarios as $usuario)
                                                    <option  selected="" value="{{$usuario->id}}">{{$usuario->name}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            NO EXISTEN USUARIOS AUTORIZADORES
                                        @endif
                                        
                                    </div>

                                </div>
                            
                               <div class="divider"></div>
                                <div class="content activities p-4" id="campoCredito" hidden="">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label  for="conv_cuotaini"><i class="icon-cash-100"></i> Cuota Inicial en S/.</label>
                                                    <input class="form-control " type="text" name="conv_cuotaini" id="conv_cuotaini">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="conv_nrocuota"><i class="icon-counter"></i> Nro. Cuotas</label>
                                                    <select class="form-control" id="conv_nrocuota" name="conv_nrocuota">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
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
                                        <label type="" class="btn btn-primary fuse-ripple-ready" id="btnCalcular" hidden="">Calcular Cuotas</label>
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
                        <div class="content activities p-1" id="calculado">
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
