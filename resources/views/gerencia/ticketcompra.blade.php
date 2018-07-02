@extends('layouts.appgerencia')

@php
  $pab_nrofil = $contrato->Nicho->Pabellon->pab_nrofil;
  $nicho_fila = $contrato->Nicho->nicho_fila;
  $filaenletra = "";
  if ($pab_nrofil == 7) {
    switch ($nicho_fila) {
      case 7:
        $filaenletra = "primera";
        break;
      case 6:
        $filaenletra = "segunda";
        break;
      case 5:
        $filaenletra = "tercera";
        break;
      case 4:
        $filaenletra = "cuarta";
        break;
      case 3:
        $filaenletra = "quinta";
        break;
      case 2:
        $filaenletra = "sexta";
        break;
      case 1:
        $filaenletra = "séptima";
        break;
      default:
        $filaenletra = $nicho_fila;
        break;
    }
  }
  elseif ($pab_nrofil == 6) {
    switch ($nicho_fila) {
      case 6:
        $filaenletra = "primera";
        break;
      case 5:
        $filaenletra = "segunda";
        break;
      case 4:
        $filaenletra = "tercera";
        break;
      case 3:
        $filaenletra = "cuarta";
        break;
      case 2:
        $filaenletra = "quinta";
        break;
      case 1:
        $filaenletra = "sexta";
        break;
      default:
        $filaenletra = $nicho_fila;
        break;
    }
  }
  elseif ($pab_nrofil == 5) {
    switch ($nicho_fila) {
      case 5:
        $filaenletra = "primera";
        break;
      case 4:
        $filaenletra = "segunda";
        break;
      case 3:
        $filaenletra = "tercera";
        break;
      case 2:
        $filaenletra = "cuarta";
        break;
      case 1:
        $filaenletra = "quinta";
        break;
      default:
        $filaenletra = $nicho_fila;
        break;
    }
  }
  elseif ($pab_nrofil == 4) {
    switch ($nicho_fila) {
      case 4:
        $filaenletra = "primera";
        break;
      case 3:
        $filaenletra = "segunda";
        break;
      case 2:
        $filaenletra = "tercera";
        break;
      case 1:
        $filaenletra = "cuarta";
        break;
      default:
        $filaenletra = $nicho_fila;
        break;
    }  
  }
  elseif ($pab_nrofil == 3) {
    switch ($nicho_fila) {
      case 3:
        $filaenletra = "primera";
        break;
      case 2:
        $filaenletra = "segunda";
        break;
      case 1:
        $filaenletra = "tercera";
        break;
      default:
        $filaenletra = $nicho_fila;
        break;
    }  
  }
  elseif ($pab_nrofil == 2) {
    switch ($nicho_fila) {
      case 2:
        $filaenletra = "primera";
        break;
      case 1:
        $filaenletra = "segunda";
        break;
      default:
        $filaenletra = $nicho_fila;
        break;
    }  
  }
@endphp

@section('content')

<div class="content">
    <div class="doc data-table-doc page-layout simple full-width">
        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h2 class="doc-title" id="content">Ticket de Pago</h2>
        </div>
		
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
		
        <!-- CONTENT -->
        <div class="page-content p-6" >
            <div class="row">
                <div class="col-md-8" id="mitabla">
                    <div class="profile-box latest-activity card" >
                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                            <div class="title">Ticket de Pago</div>
                            <div class="more text-muted"></div>
                        </header>
                        <div class="content activities p-4">
                            <table class="table-responsive" border="1" align="center">
                                <tbody>
                                    <tr align="center">
                                        <td colspan="7">
                                          @if($contrato->cont_tipopago=="contado")
                                            <strong>Cesion de uso al Contado - Pago Total</strong>
                                          @else
                                            <strong>Cesion de uso por Convenio - Cuota Inicial</strong>
                                          @endif
                                        </td>
                                    </tr>
                                    <tr align="center">
                                        <td>Monto</td>
                                        <td>Solicitante</td>
                                        <td>Difunto</td>
                                        <td>Nicho</td>
                                        <td>Fila</td>
                                        <td>Pabellon</td>
                                        <td>Cementerio</td>
                                    </tr>
                                    <tr align="center">
                                        @if($contrato->cont_tipopago=="contado")
                                          <td>S/. {{$contrato->cont_monto}}</td>
                                        @else
                                          <td>S/. {{$contrato->Convenio->conv_cuotaini}}</td>
                                        @endif
                                        <td>{{$contrato->Solicitante->sol_nombre}}</td>
                                        <td>{{$contrato->Difunto->dif_nom}} {{$contrato->Difunto->dif_ape}} {{$contrato->Difunto->dif_ape2}}</td>
                                        <td>{{$contrato->Nicho->nicho_nro}}</td>
                                        <td>@php echo $filaenletra; @endphp</td>
                                        <td>{{$contrato->Nicho->Pabellon->pab_nom}}</td>
                                        <td>{{$contrato->Nicho->Pabellon->Cementerio->cement_nom}}</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profile-box latest-activity card" >
                        <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                            <div class="title">Imprimir</div>
                            <div class="more text-muted"></div>
                        </header>
                        <div class="content activities p-4">
                            <a class="submit-button btn btn-block btn-secondary my-4 mx-auto fuse-ripple-ready" onclick="javascript:imprSelec('mitabla');function imprSelec(muestra){
                                var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();};">Imprimir <i class="icon-printer"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        <!-- CONTENT -->
    </div>
</div>

@endsection