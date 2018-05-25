@extends('layouts.appcaja')
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
            today = now.getFullYear() + '-' + month + '-' + day;
            $('#bol_fecha').val(today);
            $('#bol_fecha').focus();
            $('#bol_fecha').blur();

        });
        //<input type="text" name="qty[]" value="1" />
        

        function marcarPago() {
            $('#detalleboletacuerpo').empty();
            $('#items').empty();
            checkboxes = document.getElementsByName('checkItem');
            var j = 0;
            var vacio = true;
            if (checkboxes.length > 0) {
                
                $('#btnPagar').removeAttr('hidden');
                for(var i=0, n=checkboxes.length;i<n;i++) {
                    if (checkboxes[i].checked == true) {
                        vacio=false;
                        j++;
                        if(checkboxes[i].getAttribute("cont_id") == 0 && checkboxes[i].getAttribute("csextra_id") != 0){
                            var concepto = checkboxes[i].getAttribute("concepto");
                            var csextra_id = checkboxes[i].getAttribute("csextra_id");
                            var sextra_costo = checkboxes[i].getAttribute("sextra_costo");
                            $("#detalleboletacuerpo")
                                .append($('<tr>')
                                    .append($('<td>'+ (j) +'</td><td> Orden de Servicio</td><td>'+concepto+'</td><td>S/. '+sextra_costo+'</td>')));
                            $('#items').append($("<input type='text' name='csextras[]' value='"+csextra_id+"' hidden/>"));
                        }
                        else{
                            if (checkboxes[i].getAttribute("cont_id") != 0 && checkboxes[i].getAttribute("csextra_id") == 0) {

                                var cont_id = checkboxes[i].getAttribute("cont_id");
                                var cont_tipopago = checkboxes[i].getAttribute("cont_tipopago");
                                var cont_monto = checkboxes[i].getAttribute("cont_monto");
                                if ( cont_tipopago == "contado"){
                                    $("#detalleboletacuerpo")
                                        .append($('<tr>')
                                            .append($('<td>'+ (j) +'</td>' +'<td> Compra de Nicho</td><td> Compra al Contado</td><td>S/. '+cont_monto+'</td>')));
                                }
                                else{
                                    if (cont_tipopago == "credito") {
                                        $("#detalleboletacuerpo")
                                            .append($('<tr>')
                                                .append($('<td>'+ (j) +'</td>' +'<td> Compra de Nicho</td><td>Compra al crédito | Cuota inicial</td><td>S/. '+cont_monto+'</td>')));
                                    }
                                }
                            }
                            $('#items').append($("<input type='text' name='contratos[]' value='"+cont_id+"' hidden />"));
                        }
                    }
                }
                if (vacio) {

                    $('#btnPagar').attr('hidden','hidden');    
                }
            }
            
            $("#detalleboletacuerpo")
                .append($('<tr>')
                    .append($("<td colspan='3' style='align:center;'><strong>TOTAL</strong></td><td>total</td>")));
        }
        
    </script>
@endsection
@section('content')

<div class="content">
    <div class="doc data-table-doc page-layout simple full-width">
        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h2 class="doc-title" id="content">Órdenes de Pago pendientes</h2>
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
        <div class="modal fade" id="boletaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-extendido">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Boleta de Pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/caja/pagospendientes/pagar" id="frmBoleta">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div id="items">
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="bol_nro" name="bol_nro" placeholder="Número de Boleta" required>
                                    <label for="bol_nro" class="col-form-label">Nro. de Boleta</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="bol_dni" name="bol_dni" placeholder="Ingrese el DNI de quien realiza el pago" required>
                                    <label for="bol_dni" class="col-form-label">Nro. de DNI</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="bol_nom" name="bol_nom" placeholder="Juan Pérez Pérez" required>
                                    <label for="bol_nom" class="col-form-label">Nombres y Apellidos</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="date" class="form-control" id="bol_fecha" name="bol_fecha" placeholder="Apartment, studio, or floor">
                                    <label for="bol_fecha" class="col-form-label">Fecha de Pago</label>
                                </div>
                            </div>

                            <div class="divider m-5"></div>
                            <table id="detalleboleta" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="secondary-text">
                                            <div class="table-header">
                                                <span class="column-title">#</span>
                                            </div>
                                        </th>
                                        <th class="secondary-text">
                                            <div class="table-header">
                                                <span class="column-title">Tipo</span>
                                            </div>
                                        </th>
                                        <th class="secondary-text">
                                            <div class="table-header">
                                                <span class="column-title">Concepto</span>
                                            </div>
                                        </th>
                                        <th class="secondary-text">
                                            <div class="table-header">
                                                <span class="column-title">Monto</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="detalleboletacuerpo">
                                    
                                </tbody>
                            </table>
                            <button type="submit" class="submit-button btn btn-block btn-info my-4 mx-auto fuse-ripple-ready">Realizar Pago</button>
                            <button type="button" class="submit-button btn btn-block btn-danger my-4 mx-auto fuse-ripple-ready" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         
       
        <!-- CONTENT -->
        <div class="page-content p-6">
            <div class="row">
                <div class="col-12">
                    <div class="profile-box latest-activity card" >
                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                            <div class="title">Ordenes de Pago</div>
                            <div class="more text-muted">Seleccione los ítems que desee pagar</div>
                        </header>
                        <div class="content activities p-4" id="contenedorprincipal">
                            @if(sizeof($contratos) > 0)
                                <button id="btnPagar" hidden="hidden" type="button" class="btn btn-info pull-right fuse-ripple-ready" data-toggle="modal" data-target="#boletaModal">Pagar Items Seleccionados <i class="icon-file-plus"></i>
                            </button>
                                <table id="sample-data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th class="secondary-text">
                                                <div class="table-header">
                                                    <span class="column-title">#</span>
                                                </div>
                                            </th>
                                            <th class="secondary-text">
                                                <div class="table-header">
                                                    <span class="column-title">Tipo</span>
                                                </div>
                                            </th>
                                            <th class="secondary-text">
                                                <div class="table-header">
                                                    <span class="column-title">Concepto</span>
                                                </div>
                                            </th>
                                            <th class="secondary-text">
                                                <div class="table-header">
                                                    <span class="column-title">Monto</span>
                                                </div>
                                            </th>
                                            <th class="secondary-text">
                                                <div class="table-header">
                                                    <span class="column-title">Solicitante</span>
                                                </div>
                                            </th>
                                            <th class="secondary-text">
                                                <div class="table-header">
                                                    <span class="column-title">Difunto</span>
                                                </div>
                                            </th>
                                            <th class="secondary-text">
                                                <div class="table-header">
                                                    <span class="column-title">Selección</span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contratos as $i => $contrato)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>Compra Nicho</td>
                                                @if($contrato->cont_tipopago == "contado")
                                                    <td>Compra al contado</td>
                                                    <td>S/. {{$contrato->cont_monto}}</td>
                                                    <td>{{$contrato->Solicitante->sol_nombre}}</td>
                                                    <td>{{$contrato->Difunto->dif_nom}} {{$contrato->Difunto->dif_ape}}</td>
                                                    <td><label class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="checkItem" class="custom-control-input" cont_id="{{$contrato->cont_id}}" csextra_id="0" onchange="marcarPago();" name="checkItem" cont_tipopago="{{$contrato->cont_tipopago}}" cont_monto="{{$contrato->cont_monto}}">
                                                        <span class="custom-control-indicator fuse-ripple-ready"></span>
                                                        </label></td>
                                                @else
                                                    @if($contrato->cont_tipopago == "credito")
                                                        <td>Compra al crédito | Cuota inicial</td>   
                                                        <td>S/. {{$contrato->Convenio->conv_cuotaini}}</td>
                                                        <td>{{$contrato->Solicitante->sol_nombre}}</td>
                                                        <td>{{$contrato->Difunto->dif_nom}} {{$contrato->Difunto->dif_ape}}</td>
                                                        <td><label class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="checkItem" class="custom-control-input" cont_id="{{$contrato->cont_id}}" csextra_id="0" onchange="marcarPago();" name="checkItem" cont_tipopago="{{$contrato->cont_tipopago}}" cont_monto="{{$contrato->Convenio->conv_cuotaini}}">
                                                            <span class="custom-control-indicator fuse-ripple-ready"></span>
                                                            </label></td>
                                                    @endif
                                                @endif
 
                                            </tr>
                                        @endforeach
                                        @if(sizeof($csextras)>0)
                                            @php
                                                $j = sizeof($contratos);
                                            @endphp
                                            @foreach($csextras as $csextra)
                                                <tr>
                                                    <td>{{++$j}}</td>
                                                    <td>Orden de Servicio</td>
                                                    
                                                    <td>{{$csextra->ServicioExtra->sextra_desc}}</td> 
                                                    <td>S/. {{$csextra->ServicioExtra->sextra_costo}}</td> 
                                                    
                                                    <td>{{$csextra->Contrato->Solicitante->sol_nombre}}</td>
                                                    <td>{{$csextra->Contrato->Difunto->dif_nom}} {{$csextra->Contrato->Difunto->dif_ape}}</td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="checkItem" class="custom-control-input" cont_id="0" csextra_id="{{$csextra->csextra_id}}" onchange="marcarPago();" name="checkItem" cont_tipopago="{{$contrato->cont_tipopago}}" cont_monto="{{$csextra->Contrato->cont_monto}}" concepto="{{$csextra->ServicioExtra->sextra_desc}}" sextra_costo="{{$csextra->ServicioExtra->sextra_costo}}">
                                                        <span class="custom-control-indicator fuse-ripple-ready">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                                <script type="text/javascript">
                                    $('#sample-data-table').DataTable({
                                        responsive: true
                                    });
                                </script>
                            @else
                                No existen pagos pendientes, puede ir a <a href="http://sicem.com/home"> Búsqueda para Pagos</a> para pagar cuotas pendientes de conratos.
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        <!-- CONTENT -->
    </div>
</div>


@endsection