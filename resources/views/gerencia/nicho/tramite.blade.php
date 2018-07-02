@extends('layouts.appgerencia')

@section('javascript')
<script type="text/javascript">
$('#sample-data-table').DataTable({
    responsive: true
});
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


    <div class="modal fade" id="eliminarContratoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Seguro que desea eliminar el contrato?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Cuando <strong>elimine</strong> el contrato, se elminarán el difunto, solicitante(de no tener a su cargo otros nichos), se desocupará el nicho y se eliminará cualquier registro de pago que exista en el contrato en mención.</label>
                    <form method="post" action="/gerencia/contrato/eliminar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="cont_id" value="{{$contrato->cont_id}}">
                        <input type="hidden" name="pab_id" value="{{$pabellon->pab_id}}">
                    <button type="submit" class="submit-button btn btn-block btn-danger my-4 mx-auto fuse-ripple-ready">ELIMINAR</button>
                    <button type="button" class="submit-button btn btn-block btn-info my-4 mx-auto fuse-ripple-ready" data-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="page-layout carded left-sidebar">
        <div class="top-bg bg-primary"></div>
		<div class="page-content-wrapper">
            <aside class="page-sidebar" data-fuse-bar="demo-sidebar" data-fuse-bar-media-step="md">
                <div class="header p-6 bg-primary text-auto">
                    <span class="h3">{{$nicho->Pabellon->Cementerio->cement_nom}}</span><br>
                    <span class="h5">{{$nicho->Pabellon->pab_nom}}</span><br>
                    <span class="h6">Nicho Nro. {{$nicho->nicho_nro}}</span>
                </div>
                <div class="demo-sidebar m-2 ">
                    <ul class="nav flex-column">
                        <li class="subheader">Menú</li>
                        <div class="p-6">
                            <a  href="/createC?nicho_id={{$nicho->nicho_id}}" class="btn btn-secondary btn-block fuse-ripple-ready disabled">Constancia <i class="icon-arrow-down-bold-box"></i></button> </a>
                        </div>

                        <li class="nav-item">
                            <button type="button" class="btn btn-block btn-danger ml-5 fuse-ripple-ready" data-toggle="modal" data-target="#eliminarContratoModal" onclick=""> ELMINAR CONTRATO <i class="icon-delete"></i></button>
                        </li>
                        <md-divider class="mb-5"></md-divider>
                        <li class="nav-item">
                            <a href="/gerencia/pabellon/nicho/ticketcompra?cont_id={{$contrato->cont_id}}" class="btn btn-block btn-primary ml-5 fuse-ripple-ready" onclick=""> TICKET DE PAGO <i class="icon-ticket-confirmation"></i></a>
                        </li>


                    </ul>
                </div>
            </aside>
            <div class="page-content">
                <div class="header py-6 bg-primary text-auto">
                     <div class="d-flex flex-row align-items-center">
                        <button type="button" class="sidebar-toggle-button btn btn-icon d-block d-lg-none mr-2" data-fuse-bar-toggle="demo-sidebar">
                            <i class="icon icon-menu"></i>
                        </button>
                        <span class="h3">Información del Nicho</span>
                    </div>
                </div>
                <div class="page-content-card">
                    <div class="toolbar p-6">Información General</div>
                    <div class="page-content p-6">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">¡ATENCIÓN! - NICHO SIN PAGOS REGISTRADOS - INFORMACIÓN SOLAMENTE</h4>
                            <p>Éste nicho se encuentra en trámite, motivo por el cual ninguna acción está permitida hasta cancelar el pago inicial si es convenio o el pago total del nicho en caso la compra sea al contado</p>
                            <hr>
                            <p class="mb-0">En la parte izquierda, encontrará la opción de <strong>ELIMINAR CONTRATO EN TRÁMITE</strong> en caso de no registrarse el pago en un corto plazo</p>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                <div class="example"> 
                                    <div class="card m-1">
                                         <header class="h6 bg-secondary text-auto p-4">
                                            <div class="title">Información de Contrato</div>
                                        </header>
                                        <div class="content p-4">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Fecha de Contrato</th>
                                                            <th>Tipo de Pago</th>
                                                            <th>Concepto de Contrato</th>
                                                            <th>Estado</th>
                                                            <th>Tipo de Contrato</th>
                                                            <th>Duración de Contrato</th>
                                                            <th>Año de fin de Contrato</th>
                                                            <th>Fecha de Sepultura</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>{{$contrato->cont_fecha}}</td>
                                                            <td>{{$contrato->cont_tipopago}}</td>
                                                            <td>{{$contrato->cont_concepto}}</td>
                                                            <td>{{$contrato->cont_estado}}</td>
                                                            <td>{{$contrato->cont_tipouso}}</td>
                                                            <td>{{$contrato->cont_tiempo}} años.</td>
                                                            <td>{{Carbon\Carbon::createFromFormat('Y-m-d',$contrato->cont_fecha)->addYears($contrato->cont_tiempo)->format('Y-m-d')}}</td>
                                                            <td>{{$contrato->cont_diffechsep}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <a  href="/createC?nicho_id={{$nicho->nicho_id}}" class="btn btn-secondary pull-right disabled">Constancia <i class="icon-arrow-down-bold-box"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="example">
                                    <div class=" card m-1">
                                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                                            <div class="title h6">Imagen del Nicho</div>
                                            <div class="more text-muted">
                                                <span>Imagen</span>
                                                <span>Referencial</span>
                                            </div>
                                        </header>
                                        <div class="content">
                                            <div class="content row no-gutters p-2">
                                                <div class="col-3"></div>
                                                <div class="col-6">
                                                    <img class="w-100" src="/assets/images/nicho/{{$nicho->nicho_pathimag}}">
                                                </div>
                                                <div class="col-3">
                                                    <button class="btn btn-secondary btn-fab btn-sm fuse-ripple-ready align-items-bottom disabled"><i class="icon-pencil"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                          
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="example">
                                    <div class="card m-1"> 
                                        <header class="h6 bg-secondary text-auto p-4">
                                            <div class="title">Información de difunto</div>
                                        </header>
                                        <div class="content p-4">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre</th>
                                                            <th>Apellido Paterno</th>
                                                            <th>Apellido Materno</th>
                                                            <th>Nro. DNI</th>
                                                            <th>Fecha de Defunción</th>
                                                            <th>Observaciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>{{$contrato->Difunto->dif_nom}}</td>
                                                            <td>{{$contrato->Difunto->dif_ape}}</td>
                                                            <td>{{$contrato->Difunto->dif_ape2}}</td>
                                                            <td>{{$contrato->Difunto->dif_dni}}</td>
                                                            <td>{{$contrato->Difunto->dif_fechadef}}</td>
                                                            <td>{{$contrato->Difunto->dif_obser}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-6">
                                <div class="example">
                                    <div class="card m-1">
                                        <header class="h6 bg-secondary text-auto p-4">
                                            <div class="title">Información de Solicitante</div>
                                        </header>
                                        <div class="content p-4">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre</th>
                                                            <th>Telefono</th>
                                                            <th>Dirección</th>
                                                            <th>Nro. DNI</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>{{$contrato->Solicitante->sol_nombre}}</td>
                                                            <td>{{$contrato->Solicitante->sol_telefono}}</td>
                                                            <td>{{$contrato->Solicitante->sol_dir}}</td>
                                                            <td>{{$contrato->Solicitante->sol_dni}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="page-content p-6">
                        <div class="divider"></div>
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
                                            <tbody><tr>
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
                                        </tbody></table>
                                        <div class="divider mt-5"></div>
                                        <a href="/createPDF?conv_id=11" class="btn btn-secondary fuse-ripple-ready mt-5 mr-8 disabled">Imprimir Pagos</a>
                                        <a href="/createN?conv_id=11" class="btn btn-secondary fuse-ripple-ready mt-5 disabled">Imprimir Notificación</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="example"> 
                                    <div class="card m-1">   
                                        <header class="h6 bg-secondary text-auto p-4">
                                            <div class="title">Plan de Pagos</div>
                                        </header>
                                        <div class="content  p-4">
                                            <table id="sample-data-table" class="table table-hover">
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
                                                                <span class="column-title">Monto de Cuota</span>
                                                            </div>
                                                        </th>
                                                        <th class="secondary-text">
                                                            <div class="table-header">
                                                                <span class="column-title">Saldo de Cuota</span>
                                                            </div>
                                                        </th>
                                                        <th class="secondary-text">
                                                            <div class="table-header">
                                                                <span class="column-title">Estado de Cuota</span>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                @if(sizeof($planpagos)>0)
                                                    <tbody>
                                                        @foreach ($planpagos as $ppago)
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
                                                                <td><i class="icon-check-all"></td>
                                                            @endif
                                                            @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven < $now)
                                                                <td><i class="icon-clock-alert"></td>
                                                            @endif
                                                            @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven > $now)
                                                                <td><i class="icon-check"></td> 
                                                            @endif
                                                            @if($ppago->ppago_nrocuota==0)
                                                              <td>Cuota Inicial</td>
                                                            @else
                                                              <td>Cuota Mensual</td>
                                                            @endif
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                @else
                                                    <div class="alert alert-success" role="alert">
                                                        No tiene Cuotas que pagar o la deuda está cancelada
                                                    </div>
                                                @endif
                                            </table>
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