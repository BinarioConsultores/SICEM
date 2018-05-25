@extends('layouts.appgerencia')
 
@section('javascript')
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

        <div class="modal fade" id="nuevoServicioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escoja un Servicio a Solicitar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/gerencia/pabellon/nicho/solicitarsextra">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="cont_id" value="{{$contrato->cont_id}}">
                            <div class="form-group">
                                @if(sizeof($serviciosextra)>0)
                                <label for="sextra_id"><i class="icon-library-plus"></i>Servicios Disponibles</label>
                                    <select  class="form-control" name="sextra_id" required="">
                                        <option  selected="" value="0">Seleccione un Servicio </option>
                                        @foreach($serviciosextra as $sextra)
                                            <option value="{{$sextra->sextra_id}}">{{$sextra->sextra_desc}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <button type="submit" class="submit-button btn btn-block btn-secondary my-4 mx-auto fuse-ripple-ready">Pedir Servicio</button>
                                @else
                                    NO EXISTEN SERVICIOS EXTRA
                                @endif
                            </div>
                        <button type="button" class="submit-button btn btn-block btn-danger my-4 mx-auto fuse-ripple-ready" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editarSolicitanteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar los datos del Solicitante</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/admin/solicitante/editar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="sol_id" value="{{$contrato->sol_id}}">
                            <input type="hidden" name="nicho_id" value="{{$contrato->nicho_id}}">
                            <div class="form-group">
                                <input type="text" class="form-control" name="sol_nombre" id="sol_nombre"  placeholder="Nombre de Solicitante" required value="{{$contrato->Solicitante->sol_nombre}}">
                                <label for="sol_nombre"><i class="icon-account-box"></i> Nombre de Solicitante</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="sol_telefono"  id="sol_telefono"  placeholder="Ingrese su Telefono" required value="{{$contrato->Solicitante->sol_telefono}}">
                                <label for="sol_telefono"><i class="icon-cellphone-android"></i> Telefono</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="sol_dir"  id="sol_dir"  placeholder="Ingrese su Direccion" required value="{{$contrato->Solicitante->sol_dir}}">
                                <label for="sol_dir"><i class="icon-map-marker-radius"></i> Direccion</label>
                            </div>
                            <div class="form-group">
                                <input pattern=".{8,8}" required title="Ingrese un D.N.I. válido" type="text" class="form-control" name="sol_dni" id="sol_dni" value="{{$contrato->Solicitante->sol_dni}}">
                                <label for="sol_dni"><i class="icon-account-card-details"></i> DNI</label>
                            </div>
                            <button type="submit" class="submit-button btn btn-block btn-secondary my-4 mx-auto fuse-ripple-ready" data-toggle="modal" data-target="#editarSolicitanteModal">Guardar Cambios</button>

                            <button type="button" class="submit-button btn btn-block btn-danger my-4 mx-auto fuse-ripple-ready" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
          
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
                        <li class="nav-item">
                            <a  href="/createC?nicho_id={{$nicho->nicho_id}}" class="btn btn-secondary ml-5">Constancia <i class="icon-arrow-down-bold-box"></i> </a>
                        </li>
                        <md-divider class="mb-5"> </md-divider>
                        <li class="nav-item">
                            <a  href="/createC?nicho_id={{$nicho->nicho_id}}" class="btn btn-secondary ml-5">Trasladar  <i class="icon-move-resize-variant"></i> </a>
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
                    @if (Session::has('eliminado'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('eliminado')}}
                        </div>
                    @endif
                    <div class="toolbar p-6">Información General</div>
                    <div class="page-content p-6">
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
                                                            <th>Fin de Contrato</th>
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
                                                            @if($contrato->cont_tiempo == -1)
                                                                <td>El contrato es perpetuo</td>
                                                            @else
                                                                <td>{{$contrato->cont_tiempo}} años</td>
                                                            @endIf
                                                            <td><strong>{{Carbon\Carbon::createFromFormat('Y-m-d',$contrato->cont_fecha)->addYears($contrato->cont_tiempo)->format('Y-m-d')}}</strong></td>
                                                            <td>{{$contrato->cont_diffechsep}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <a  href="/createContrato?cont_id={{$contrato->cont_id}}" class="btn btn-secondary pull-right">Descargar Contrato <i class="icon-arrow-down-bold-box"></i></a>
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
                                                    <button class="btn btn-secondary btn-fab btn-sm fuse-ripple-ready align-items-bottom"><i class="icon-pencil"></i></button>
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
                                                            <th>Apellidos</th>
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
                                                            <td>{{$contrato->Difunto->dif_dni}}</td>
                                                            <td>{{$contrato->Difunto->dif_fechadef}}</td>
                                                            <td>{{$contrato->Difunto->dif_obser}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <button class="btn btn-secondary btn-fab btn-sm fuse-ripple-ready align-items-bottom"><i class="icon-pencil"></i></button>
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
                                                <button type="button" class="btn btn-secondary pull-right fuse-ripple-ready" data-toggle="modal" data-target="#editarSolicitanteModal" onclick=""><i class="icon-pencil"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-12">
                                <div class="example">
                                    <div class=" card m-1"> 
                                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                                            <div class="title h6">Servicios Extra</div> 
                                        </header>
                                        <div class="content p-4">
                                            @if($contrato->CSExtras->count()>0)
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
                                                                    <span class="column-title">Estado</span>
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
                                                        @php
                                                        $cont = 1
                                                        @endphp
                                                        @foreach($contrato->CSExtras as $CSExtra)
                                                        <tr>
                                                           <td>{{$cont++}}</td>
                                                            <td>{{$CSExtra->ServicioExtra->sextra_desc}}</td>
                                                            @if($CSExtra->bolde_id==1)
                                                                <td>Solicitado</td>
                                                                <td>No hay pago registrado</td>
                                                            @else
                                                                <td>Pagado</td>
                                                                <td><a href="/createA?nicho_id={{$nicho->nicho_id}}" class="nav-link">Descargar <i class="icon-arrow-down-bold-box"></i></a></td> 
                                                            @endif
                                                        </tr> 
                                                        @endforeach                                                 
                                                    </tbody>
                                                </table>
                                            @else
                                                No existen servicios solicitados para este contrato
                                            @endif
                                            <button type="button" class="btn btn-secondary pull-right fuse-ripple-ready" data-toggle="modal" data-target="#nuevoServicioModal" onclick="">Solicitar Servicio <i class="icon-file-plus"></i>
                                            </button>
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
                                        <a href="/createPDF?conv_id={{$contrato->conv_id}}" class="btn btn-secondary fuse-ripple-ready mt-5 mr-8">Imprimir Pagos</a>
                                        <a href="/createN?conv_id={{$contrato->conv_id}}" class="btn btn-secondary fuse-ripple-ready mt-5">Imprimir Notificación</a>
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

<!-- CONTENT -->

@endsection