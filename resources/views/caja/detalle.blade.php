@extends('layouts.appcaja')
@section('css')
    <style type="text/css">
       .deuda-pagada {
            background: #D2FFBD;
            border: 1px;
            width: 2em;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 7px 7px 7px 7px;
            height: 2em;
            margin-right: 2px;
        }
        .deuda-vencida {
            background: #FFA6A2;
            border: 1px;
            width: 2em;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 7px 7px 7px 7px;
            height: 2em;
            margin-right: 2px;
        }
        .pendiente {
            background: #C7E3FF;
            border: 1px;
            width: 2em;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 7px 7px 7px 7px;
            height: 2em;
            margin-right: 2px;
        }
    </style>
@endsection
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

    function marcarPago(){
    
        $('#detalleboletacuerpo').empty();
        $('#items').empty();
        checkboxes = document.getElementsByName('checkItem');
        var j = 0;
        var total = 0;
        var vacio = true;
        if (checkboxes.length > 0) {
            $('#btnPagar').removeAttr('hidden');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                if (checkboxes[i].checked == true) {
                    vacio=false;
                    j++;
                    var ppago_id = checkboxes[i].getAttribute("ppago_id");
                    var ppago_montocuota = checkboxes[i].getAttribute("ppago_montocuota");
                    var ppago_nrocuota = checkboxes[i].getAttribute("ppago_nrocuota");
                    total = total + parseInt(ppago_montocuota);
                    $("#detalleboletacuerpo")
                        .append($('<tr>')
                            .append($('<td>'+ (j) + '</td><td>Pago de Cuota</td><td>'+ppago_nrocuota+' cuota</td><td>S/. '+ppago_montocuota + '</td>')));
                    $('#items').append($("<input type='text' name='ppagos[]' value='"+ ppago_id +"' hidden/>"));
                }
            }
            $("#detalleboletacuerpo")
                .append($('<tr>')
                    .append($('<td><strong>TOTAL</strong> </td><td></td><td> </td><td><strong>S/. '+total + '</strong></td>')));
            if (vacio) {
                $('#btnPagar').attr('hidden','hidden');    
            }
        }
    }
</script>
@endsection

@section('content')
    <div class="content">
        <div class="doc forms-doc page-layout simple full-width ">
            <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
                <h2 class="doc-title" id="content">Realice la busqueda para realizar pago.</h2>
            </div>

            @if( ! empty($exito))
                <div class="alert alert-success" role="alert">
                    {{$exito}}
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
                        <form method="post" action="/caja/pagoscuotas/pagar" id="frmBoleta">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="conv_id" value="{{ $contrato->Convenio->conv_id }}">
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
                                    <input type="date" class="form-control" id="bol_fecha" name="bol_fecha" >
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

            <div class="page-content p-12">
                <div class="content container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="description">
                                    <div class="description-text">
                                        <header class="h6 bg-secondary text-auto p-4">
                                            <div class="title">Reporte de Pagos</div>
                                        </header>
                                    </div>
                                </div>
                                <div class="preview m-5">
                                    <table  class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="secondary-text">
                                                    <div class="table-header">
                                                        <span class="column-title">Nro. Cuota</span>
                                                    </div>
                                                </th>
                                                <th class="secondary-text">
                                                    <div class="table-header">
                                                        <span class="column-title">Fecha de Pago</span>
                                                    </div>
                                                </th>
                                                <th class="secondary-text">
                                                    <div class="table-header">
                                                        <span class="column-title">Monto de Cuota (S/.)</span>
                                                    </div>
                                                </th>
                                                <th class="secondary-text">
                                                    <div class="table-header">
                                                        <span class="column-title">Saldo de Cuota (S/.)</span>
                                                    </div>
                                                </th>
                                                <th class="secondary-text">
                                                    <div class="table-header">
                                                        <span class="column-title">Descripcion</span>
                                                    </div>
                                                </th>
                                                <th class="secondary-text">
                                                    <div class="table-header">
                                                        <span class="column-title">Estado de Cuota</span>
                                                    </div>
                                                </th>
                                                <th class="secondary-text">
                                                    <div class="table-header">
                                                        <span class="column-title">Acciones</span>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>                  
                                            @foreach ($planpago as $ppago)
                                                @if($ppago->ppago_saldocuota==0)
                                                    <tr class="deuda-pagada">
                                                @endif
                                                @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven < $now)
                                                    <tr class="deuda-vencida">
                                                @endif
                                                @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven > $now)
                                                    <tr class="pendiente">
                                                @endif
                                                    
                                                <td>{{$ppago->ppago_nrocuota}}</td>
                                                <td>{{$ppago->ppago_fechaven}}</td>
                                                <td>{{$ppago->ppago_montocuota}}</td>
                                                <td>{{$ppago->ppago_saldocuota}}</td>

                                                @if($ppago->ppago_nrocuota==0)
                                                  <td>Cuota Inicial</td>
                                                @else
                                                  <td>Cuota Mensual</td>
                                                @endif

                                                @if($ppago->ppago_saldocuota==0)
                                                    <td>Pagado <i class="icon-check-all"></i></td>
                                                    <td><label class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="checkItem" class="custom-control-input" ppago_id="{{$ppago->ppago_id}}" ppago_montocuota = "{{$ppago->ppago_montocuota}}" name="checkItem" disabled="" onchange="marcarPago();" ppago_nrocuota="{{$ppago->ppago_nrocuota}}">
                                                            <span class="custom-control-indicator fuse-ripple-ready"></span>
                                                            </label></td>
                                                @endif
                                                @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven < $now)
                                                    <td><span>Retraso <i class="icon-clock-alert"></i></span></td>
                                                    <td><label class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="checkItem" class="custom-control-input" ppago_id="{{$ppago->ppago_id}}" ppago_montocuota = "{{$ppago->ppago_montocuota}}" name="checkItem" onchange="marcarPago();" ppago_nrocuota="{{$ppago->ppago_nrocuota}}">
                                                            <span class="custom-control-indicator fuse-ripple-ready"></span>
                                                            </label></td>
                                                    
                                                @endif
                                                @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven > $now)
                                                    <td>Pendiente <i class="icon-clock"></i></td>
                                                    <td><label class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="checkItem" class="custom-control-input" ppago_id="{{$ppago->ppago_id}}" ppago_montocuota = "{{$ppago->ppago_montocuota}}" name="checkItem" onchange="marcarPago();" ppago_nrocuota="{{$ppago->ppago_nrocuota}}">
                                                            <span class="custom-control-indicator fuse-ripple-ready"></span>
                                                            </label></td>
                                                @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button id="btnPagar" type="button" hidden="" class="btn btn-block btn-info pull-right fuse-ripple-ready" data-toggle="modal" data-target="#boletaModal">Pagar Items Seleccionados <i class="icon-currency-usd"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection