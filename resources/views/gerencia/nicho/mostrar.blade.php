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
    <div class="page-layout carded left-sidebar">
        <div class="top-bg bg-primary"></div>
        <div class="page-content-wrapper">
            <aside class="page-sidebar" data-fuse-bar="demo-sidebar" data-fuse-bar-media-step="md">
                <div class="header p-6 bg-primary text-auto">
                    <span class="h3">Información de Nicho</span>
                </div>
                <div class="demo-sidebar m-2 ">
                    <ul class="nav flex-column">
                        <li class="subheader">Menú</li>
                        <li class="nav-item">
                            <a  href="/createC?nicho_id={{$nicho->nicho_id}}" class=""><button type="button" class="btn btn-info">Constancia <i class="icon-arrow-down-bold-box"></i></button> </a>
                        </li>
                        <md-divider></md-divider>
                        <li class="nav-item">
                            <a class="nav-link">Sidenav Item 2</a>
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
                        <span class="h3">Nicho {{$nicho->nicho_nro}}</span>
                    </div>
                </div>
                <div class="page-content-card">
                    <div class="toolbar p-6">Información General</div>
                    <div class="page-content p-6">
                            <div class="row">
                                        <div class="col-3">
                                            <div class="example"> 
                                                <div class="card m-1">   
                                                     <header class="h6 bg-secondary text-auto p-4">
                                                        <div class="title">Información de Contrato</div>
                                                    </header>
                                                    <div class="content  p-4">
                                                        <div class=" mb-6">
                                                            <div class="title font-weight-bold mb-1">Fecha de Contrato</div>
                                                            <div class="info">{{$contrato->cont_fecha}}</div>
                                                        </div>
                                                        <div class=" mb-6">
                                                            <div class="title font-weight-bold mb-1">Concepto de Contrato</div>
                                                            <div class="info">{{$contrato->cont_tipopago}}</div>
                                                        </div>
                                                        <div class=" mb-6">
                                                            <div class="title font-weight-bold mb-1">Concepto de Contrato</div>
                                                            <div class="info">{{$contrato->cont_concepto}}</div>
                                                        </div>
                                                        <div class=" mb-6">
                                                            <div class="title font-weight-bold mb-1">Estado</div>
                                                            <div class="info">{{$contrato->cont_estado}}</div>
                                                        </div>
                                                        <div class=" mb-6">
                                                            <div class="title font-weight-bold mb-1">Tipo de Contrato</div>
                                                            <div class="info">{{$contrato->cont_tipouso}}</div>
                                                        </div>
                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">Locations</div>
                                                            <div class="info">{{$contrato->cont_tiempo}}
                                                                <span> Años</span>
                                                            </div>
                                                        </div>
                                                        <div class=" mb-6">
                                                            <div class="title font-weight-bold mb-1">Fecha de Sepultura</div>
                                                            <div class="info">{{$contrato->cont_diffechsep}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="example">
                                                <div class="  card m-1"> 
                                                    <header class="h6 bg-secondary text-auto p-4">
                                                        <div class="title">Información de difunto</div>
                                                    </header>
                                                    <div class="content p-4">
                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">Nombre</div>
                                                            <div class="info">{{$contrato->Difunto->dif_nom}}</div>
                                                        </div>
                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">Apellidos</div>
                                                            <div class="info">{{$contrato->Difunto->dif_ape}}</div>
                                                        </div>
                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">DNI</div>
                                                            <div class="info">{{$contrato->Difunto->dif_dni}}</div>
                                                        </div>
                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">Fecha de Fallecimiento</div>
                                                            <div class="info">{{$contrato->Difunto->dif_fechadef}}</div>
                                                        </div>
                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">Observaciones</div>
                                                            <div class="info">{{$contrato->Difunto->dif_nom}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="example">
                                                <div class=" card m-1">
                                                    <header class="h6 bg-secondary text-auto p-4">
                                                        <div class="title">Información de Solicitante</div>
                                                    </header>
                                                    <div class="content p-4">
                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">Nombre</div>
                                                            <div class="info"> {{$contrato->Solicitante->sol_telefono}}</div>
                                                        </div>
                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">Telefono</div>
                                                            <div class="info">
                                                                <span>&#43;{{$contrato->Solicitante->sol_telefono}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">Direccion</div>
                                                            <div class="info"> {{$contrato->Solicitante->sol_dir}}</div>
                                                        </div>

                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">DNI</div>
                                                            <div class="info"> {{$contrato->Solicitante->sol_dni}}</div>
                                                        </div>
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
                                                    <div class="content p-4">
                                                        <div class="content row no-gutters p-4">
                                                            <div class="friend col-3 p-1"></div>
                                                            <div class="friend col-6 p-1">
                                                                <img class="w-100" src="/assets/images/nicho/{{$nicho->nicho_pathimag}}">
                                                            </div>
                                                            <div class="friend col-3 p-1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="example">
                                                <div class=" card m-1"> 
                                                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                                                            <div class="title h6">Servicios Extra</div> 
                                                        </header>
                                                        <div class="content p-4">
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
                                                                                <span class="column-title">Descripcion</span>
                                                                            </div>
                                                                        </th>
                                                                        <th class="secondary-text">
                                                                            <div class="table-header">
                                                                                <span class="column-title">Autorizacion</span>
                                                                            </div>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                                <tr>
                                                                    @php
                                                                    $cont = 1
                                                                    @endphp
                                                                    @foreach($contrato->CSExtras as $CSExtra)
                                                                       <td>{{$cont++}}</td>
                                                                        <td>{{$CSExtra->ServicioExtra->sextra_desc}}</td>
                                                                        <td><a href="/createA?nicho_id={{$nicho->nicho_id}}"><button type="button" class="btn btn-info">Descargar<i class="icon-arrow-down-bold-box"></i></button></a></td> 

                                                                    @endforeach
                                                                    
                                                                </tr>
                                                                
                                                                <tbody>
                                                                    
                                                                </tbody>
                                                            </table>
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
                                        <div class="col-6">
                                            <div class="example"> 
                                                <div class="card m-1">   
                                                     <header class="h6 bg-secondary text-auto p-4">
                                                        <div class="title">Plan de Pagos</div>
                                                    </header>
                                                    <div class="content  p-4">
                                                    <table id="sample-data-table" class="table">
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
                                                                    <tr class="table-success">
                                                                @endif
                                                                @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven < $now)
                                                                    <tr class="table-danger">
                                                                @endif
                                                                @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven > $now)
                                                                    <tr class="table-info">
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
                                                        @else
                                                            <div class="alert alert-danger" role="alert">
                                                                No tiene Cuotas que pagar.
                                                            </div>
                                                        @endif
                                                        </tbody>
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
</div>

<!-- CONTENT -->

@endsection