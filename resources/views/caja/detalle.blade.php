@extends('layouts.appcaja')
@section('javascript')
<script type="text/javascript">
    function calcular(){
        var checkbox = $("#mycheck").val();

        alert(checkbox[1    ]);
    }
</script>
@endsection

@section('content')
        <div class="content">
        @if (session('status'))
            <strong>{{ session('status') }}</strong>         
        @endif
            <div class="doc forms-doc page-layout simple full-width ">
                <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
                    <h2 class="doc-title" id="content">Realice la busqueda para realizar pago.</h2>
                </div>
                <div class="page-content p-12">
                    <div class="content container">
                        <div class="row">
                            <div class="col-9">
                                <div class="example">
                                    <div class="card">
                                        <div class="description">
                                            <div class="description-text">
                                                <header class="h6 bg-secondary text-auto p-4">
                                                    <div class="title">Reporte de Pagos</div>
                                                </header>
                                            </div>
                                        </div>
                                        <div class="source-preview-wrapper">
                                            <div class="preview m-5">
                                                <table  class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="secondary-text">
                                                                <div class="table-header">
                                                                    <span class="column-title">Acciones</span>
                                                                </div>
                                                            </th>
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
                                                                    <td><span class="badge badge-success" style="width: 100%" >Pagado<i class="icon-check-all"></i></span></td>
                                                                    <td><input type="checkbox" name="" value="{{$ppago->ppago_saldocuota}}" disabled=""></td>
                                                                @endif
                                                                @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven < $now)
                                                                    <td><span class="badge badge-danger" style="width: 100%" >Con Retraso<i class="icon-clock-alert"></i></span></td>
                                                                    <td><input type="checkbox" name="" value="{{$ppago->ppago_saldocuota}}"></td>
                                                                    
                                                                @endif
                                                                @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven > $now)
                                                                    <td><span class="badge badge-info" style="width: 100%" >Pendiente<i class="icon-clock"></i></span></td>
                                                                    <td><input type="checkbox" name="mycheck[]" id="mycheck" value="{{$ppago->ppago_saldocuota}}"></td>
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
                            <div class="col-3">
                                    <div class="card">
                                        <div class="description">
                                            <div class="description-text">
                                                <header class="h6 bg-secondary text-auto p-4">
                                                    <div class="title">Calcular pagos</div>
                                                </header>
                                            </div>
                                        </div>
                                        <div  class="source-preview-wrapper">
                                            <div class="preview">
                                                <div class="row m-2">
                                                <button onclick="calcular(mycheck,);" class="btn btn-primary"> Calcular</button>
                                                </div>
                                                <div class="row m-2">
                                                <label for="valor">Monto a Pagar:</label>
                                                <input type="text" name="valor" id="valor">
                                                </div>
                                                <div class="row m-2">
                                                <a href=""><button  class="btn btn-primary">Pagar</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </dvi>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection