@php
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

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  </head>
  
  <body style="font-family: 'Calibri';">
      <img src="{{asset('assets/images/logo_documento.png')}}">
      <p style='text-align:center'><FONT FACE="Eras Medium ITC"><strong>AUTORIZACIÓN</strong></FONT></p>

      <p style='text-align:right'><FONT FACE="Eras Medium ITC">La que suscribe, Mary Carmen Vizcarra Loayza, Encargada del Area Funcional del Registro Civil y Cementerios</FONT></p>
      
      <p style='text-align:center'><FONT FACE="Eras Medium ITC"><strong>AUTORIZA</strong></FONT></p>

      <p style='text-align:justify'><FONT FACE="Eras Medium ITC">Al Sr.(a.) <strong>{{$contrato->Solicitante->sol_nombre}}</strong>, identificado con D.N.I. Nro. <strong>{{$contrato->Solicitante->sol_dni}}</strong>, domiciliado en <strong>{{$contrato->Solicitante->sol_dir}}</strong> para que proceda a INHUMAR los restos de quien en vida fue: <strong>{{$contrato->Difunto->dif_nom}}</strong>, en el nicho Nro. <strong>{{$contrato->Nicho->nicho_nro}}</strong>, de la @php echo $filaenletra; @endphp fila del pabellón <strong>{{$contrato->Nicho->Pabellon->pab_nom}}</strong>, del cementerio <strong>{{$contrato->Nicho->Pabellon->Cementerio->cement_nom}}</strong>, el día <strong>{{$contrato->cont_fecha}}</strong> a las _____________ horas.</p>

      <p style='text-align:justify'><FONT FACE="Eras Medium ITC">Se extiende la presente solicitud de la parte interesada para los fines consiguientes.</FONT></p><br/>

      <p style='text-align:right;'><FONT FACE="Eras Medium ITC"> Arequipa, {{$now->day}} de <?php echo $mes; ?> del {{$now->year}}.</FONT></p>
  </body>
            
</html>
<?php
  $reporte = ob_get_clean();
  header('Content-Type: application/vnd.ms-word');
  header("Content-Disposition: attachment; filename=INHUMACION {$contrato->Solicitante->sol_nombre}.doc");  
  header("Pragma: no-cache");  
  header("Expires: 0");   

  echo $reporte;  
?>