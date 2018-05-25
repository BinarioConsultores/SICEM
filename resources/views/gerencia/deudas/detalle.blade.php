@extends('layouts.appgerencia')

@section('javascript')
<script type="text/javascript">
        $('#sample-data-table').DataTable({
            responsive: true
        });
        function imprimirdiv() {
        var ficha = document.getElementById('imprimirdiv');
        var ventimp = window.open(' ', '_blank');
        ventimp.document.write( ficha.innerHTML );
        ventimp.document.close();
        ventimp.print( );
        ventimp.close();
        }
</script>
	
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pabellon.css')}}">
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

@section('content')
<div class="content">
    <div class="doc forms-doc page-layout simple full-width">
		<div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h2 class="doc-title" id="content">Deudas por cobrar.</h2>
        </div>
        <div class="page-content p-6">
            <div class="row">
                <div class="col-4">
                    <div class="profile-box latest-activity card">
                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                            <div class="title">Leyenda</div>
                            <div class="more text-muted">Indicadores</div>
                        </header>
                        <div class="content activities p-4">
                            <table>
                                <tr>
                                    <td><div class="deuda-pagada"></div></td>
                                    <td><span>Deuda Pagada</span></td>
                                </tr>
                                <tr>
                                    <td><div class="deuda-vencida"></div></td>
                                    <td><span>Deuda Vencida</span></td>
                                </tr>
                                <tr>
                                    <td><div class="pendiente"></div></td>
                                    <td><span>Pendiente</span></td>
                                </tr>
                            </table>
                            <div class="divider mt-5"></div>
                            <a href="/createPDF?conv_id={{$contrato->conv_id}}" class="btn btn-primary fuse-ripple-ready mt-5 mr-8">Imprimir Pagos</a>
                            <a href="/createN?conv_id={{$contrato->conv_id}}" class="btn btn-primary fuse-ripple-ready mt-5">Imprimir Notificación</a>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="profile-box latest-activity card">   
                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                            <div class="title">Plan de Pagos</div>
                            <div class="more text-muted">Indicadores</div>
                        </header>
                        <div class="content activities p-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="secondary-text">
                                            <div class="table-header">
                                                <span class="column-title">Nombre de Difunto</span>
                                            </div>
                                        </th>
                                        <th class="secondary-text">
                                            <div class="table-header">
                                                <span class="column-title">Nro. Nicho</span>
                                            </div>
                                        </th>
                                        <th class="secondary-text">
                                            <div class="table-header">
                                                <span class="column-title">Nombre de Solicitante</span>
                                            </div>
                                        </th>
                                        <th class="secondary-text">
                                            <div class="table-header">
                                                <span class="column-title">Cementerio</span>
                                            </div>
                                        </th>
                                        <th class="secondary-text">
                                            <div class="table-header">
                                                <span class="column-title">Pabellon</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$contrato->Difunto->dif_nom}} {{$contrato->Difunto->dif_ape}}</td>
                                        <td>{{$contrato->Nicho->nicho_nro}}</td>
                                        <td>{{$contrato->Solicitante->sol_nombre}}</td>
                                        <td>{{$contrato->Nicho->Pabellon->Cementerio->cement_nom}}</td>
                                        <td>{{$contrato->Nicho->Pabellon->pab_nom}}</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="content p-4">
                            <table  class="table table-hover">
                                <thead align="center">
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
                                                <span class="column-title">Estado de Cuota</span>
                                            </div>
                                        </th>
                                        <th class="secondary-text">
                                            <div class="table-header">
                                                <span class="column-title">Descripcion</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody align="center">                  
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
                                        @if($ppago->ppago_saldocuota==0)
                                            <td>Pagado <i class="icon-check-all"></i></td>
                                        @endif
                                        @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven < $now)
                                            <td>Atrasado <i class="icon-clock-alert"></i></td>
                                        @endif
                                        @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven > $now)
                                            <td>Pendiente <i class="icon-clock"></i></td> 
                                        @endif
                                        @if($ppago->ppago_nrocuota==0)
                                          <td>Cuota Inicial</td>
                                        @else
                                          <td>Cuota Mensual</td>
                                        @endif
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection