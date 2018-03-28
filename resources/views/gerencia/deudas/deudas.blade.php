@extends('layouts.appgerencia')

@section('javascript')

<script type="text/javascript">
    $('#sample-data-table').DataTable({
        responsive: true
    });
</script>
	
@endsection

@section('content')
<div class="content">
    <div class="doc forms-doc page-layout simple full-width">
		<div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h2 class="doc-title" id="content">Deudas por cobrar.</h2>
        </div>
        <div class="page-content p-12">
            <div class="content container">
                <div class="row">
                    <!-- FORM CONTROLS -->
                        <div class="col-12">
                            <div class="example">
                                <div class="description">
                                    <div class="description-text">
                                        <h5>Lista de deudas vencidas.</h5>
                                    </div>
                                </div>
                                <div class="source-preview-wrapper">
                                    <div class="preview">
                                        <div class="preview-elements">
                                            <table id="sample-data-table" class="table table-inverse">
                                                <thead>
                                                    <tr>
                                                        <th class="secondary-text">
                                                            <div class="table-header">
                                                                <span class="column-title">#</span>
                                                            </div>
                                                        </th>
                                                        <th class="secondary-text">
                                                            <div class="table-header">
                                                                <span class="column-title">Fecha de Vencimiento</span>
                                                            </div>
                                                        </th>
                                                        <th class="secondary-text">
                                                            <div class="table-header">
                                                                <span class="column-title">Nro. cuota</span>
                                                            </div>
                                                        </th>
                                                        <th class="secondary-text">
                                                            <div class="table-header">
                                                                <span class="column-title">Cantidad (S/.)</span>
                                                            </div>
                                                        </th>
                                                        <th class="secondary-text">
                                                            <div class="table-header">
                                                                <span class="column-title">Nombre de Solicitante</span>
                                                            </div>
                                                        </th>
                                                        <th class="secondary-text">
                                                            <div class="table-header">
                                                                <span class="column-title">Acciones</span>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                
                                                @if(sizeof($planpagos)>0)
                                                <tbody>                
                                                    @foreach($planpagos as $key=>$planpago)
                                                        <tr>
                                                            <td>{{++$key}}</td>
                                                            <td>{{$planpago->ppago_fechaven}}</td>
                                                            <td>{{$planpago->ppago_nrocuota}}</td>    
                                                            <td>{{$planpago->ppago_montocuota}}</td>
                                                            <td>{{$planpago->Convenio->Contrato[0]->Solicitante->sol_nombre}}</td>
                                                            <td><a href="/gerencia/deudas/detalles?conv_id={{$planpago->Convenio->conv_id}}"><button class="btn btn-info">Detalles</button></a></td>
                                                        </tr>   
                                                    @endforeach
                                                @else
                                                    <div class="alert alert-success" role="alert">
                                                        No tiene Deudores.
                                                    </div>
                                                @endif
                                                </tbody>
                                            </table>
                                            <script type="text/javascript">
                                                $('#sample-data-table').DataTable({
                                                responsive: true
                                                });
                                            </script>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection