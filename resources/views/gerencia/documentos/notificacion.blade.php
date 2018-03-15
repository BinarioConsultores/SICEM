<?php
  ob_start();
 $mes = "";
  $mesf = "";
  
  $valor = $now->month;
  $cont_diffechsep = $contrato->cont_diffechsep;
  $datosfecha = explode("-", $cont_diffechsep);
  $dia = $datosfecha[2];
  $mesf1 = $datosfecha[1];
  $año = $datosfecha[0];

  switch ($valor) {
    case 1:
        $mes =" Enero";
        break;
    case 2:
        $mes =" Febrero";
        break;
    case 3:
        $mes =" Marzo";
        break;
    case 4:
        $mes =" Abril";
        break;
    case 5:
        $mes =" Mayo";
        break;
    case 6:
        $mes =" Junio";
        break;
    case 7:
        $mes =" Julio";
        break;
    case 8:
        $mes =" Agosto";
        break;
    case 9:
        $mes =" Septiembre";
        break;
    case 10:
        $mes =" Octubre";
        break;
    case 11:
        $mes =" Noviembre";
        break;
    case 12:
        $mes =" Diciembre";
        break;  
  }
  switch ($mesf1) {
    case 1:
        $mesf =" Enero";
        break;
    case 2:
        $mesf =" Febrero";
        break;
    case 3:
        $mesf =" Marzo";
        break;
    case 4:
        $mesf =" Abril";
        break;
    case 5:
        $mesf ="Mayo";
        break;
    case 6:
        $mesf =" Junio";
        break;
    case 7:
        $mesf =" Julio";
        break;
    case 8:
        $mesf =" Agosto";
        break;
    case 9:
        $mesf =" Septiembre";
        break;
    case 10:
        $mesf =" Octubre";
        break;
    case 11:
        $mesf =" Noviembre";
        break;
    case 12:
        $mesf =" Diciembre";
        break;  
  }
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  </head>
  
  <body style="font-family: 'Calibri';">

<img src='' height='180' width='140'>
<img src="" height="350" width="435">

<p style='text-align:justify' align='left' align='justify'>La que suscribe, {{ Auth::user()->name }}, encargada del Departamento de Registro Civil y Cementerios"
<strong> NOTIFICA A:</strong></p> 
<p align='left'><strong>Sr.(a.) {{$contrato->Solicitante->sol_nombre}}</strong> </p>
<p align='justify' style='text-align:justify'>Nos ponemos en contacto con Ud. en referencia a la(s) deuda(s) vencida(s) desde la fecha <strong>{{$contrato->cont_fecha}}</strong> y correspondiente al prestamo de nicho Nro. <strong>{{$contrato->Nicho->nicho_nro}} </strong>de la <strong>{{$contrato->Nicho->nicho_fila}}</strong>fila del Pabellón <strong>{{$contrato->Nicho->Pabellon->pab_nom}} </strong>del Cementerio : <strong>{{$contrato->Nicho->Pabellon->Cementerio->cement_nom}}</strong></p>

    <table  style="border: none;">
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
      <tbody>                  
          @foreach ($planpago as $ppago)
              @if($ppago->ppago_saldocuota==0)
                  <tr style='background: #7DBE72;border: 1px;width: 2em;-webkit-border-radius: 5px 5px 5px 5px; border-radius: 7px 7px 7px 7px; height: 2em;margin-right: 2px;'>
              @endif
              @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven < $now)
                  <tr style='background: #E5594D;border: 1px;width: 2em;-webkit-border-radius: 5px 5px 5px 5px; border-radius: 7px 7px 7px 7px; height: 2em;margin-right: 2px;'>
              @endif
              @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven > $now)
                  <tr style='background: #7DBEFF;border: 1px;width: 2em;-webkit-border-radius: 5px 5px 5px 5px; border-radius: 7px 7px 7px 7px; height: 2em;margin-right: 2px;'>
              @endif
              <td>{{$ppago->ppago_nrocuota}}</td>
              <td>{{$ppago->ppago_fechaven}}</td>
              <td>{{$ppago->ppago_montocuota}}</td>
              <td>{{$ppago->ppago_saldocuota}}</td>
              @if($ppago->ppago_saldocuota==0)
                  <td>Pagado</td>
              @endif
              @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven < $now)
                  <td>Retrasado</i></td>
              @endif
              @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven > $now)
                  <td>Pendiente</td> 
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

<p align='justify' style='text-align:justify'>El motivo de la comunicación es que hasta la fecha no hemos recibido la confirmación del pago de la deuda mencionada, por lo que le agradeceríamos acercarse por la oficina del Departamento de Registro Civil y Cementerios lo antes posible.</p>
<p align='justify' style='text-align:justify'>Nota: Se le recuerda que el incumploimiento de pago de dos cuotas consecutivas dará lugar a la pérdida del beneficio dándose por vencidas todas las cuotas, dándose inicio al procedimiento de cobranza y/o la reversión del nicho. El fraccionamiento dará lugar a que se aplique una tasa de interés compensatoria equivalente al 15% anual.</p>

<p align='justify'>Sin otro particular, aprovecho para enviarle un cordial saludo.</p>
<p align='right'> Arequipa, {{$now->day}} de <?php echo $mes; ?> del {{$now->year}}.</p>
</body>
            
</html>
<?php
  $reporte = ob_get_clean();
  header('Content-Type: application/vnd.ms-word');
  header("Content-Disposition: attachment; filename=Notificacion.doc");  
  header("Pragma: no-cache");  
  header("Expires: 0");   

  echo $reporte;  
?>