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
  
  <body>
      <img src='' height='180' width='140'>
      <p align='center'><strong>AUTORIZACION</strong> </p><br />
      <p align='right'> El(La) que suscribe, {{ Auth::user()->name }}, Encargada del Departamento de Registro Civil y Cementerios</p><br /> <br />
      <p align='center'><strong>AUTORIZA</strong> </p><br />
      <p align='justify' style='text-align:justify'> Al Sr.(a.) <strong> {{$contrato->solicitante->sol_nombre}} </strong>, identificado con D.N.I. Nro. <strong> {{$contrato->solicitante->sol_dni}}</strong>, domiciliado en <strong>{{$contrato->solicitante->sol_dir}}</strong>, para que proceda a colocar una <strong>LAPIDA</strong>, en el nicho Nro.<strong> {{$contrato->Nicho->nicho_nro}}</strong>, de la fila <strong> {{$contrato->Nicho->nicho_fila}}</strong>  del Pabellón <strong>{{$contrato->Nicho->Pabellon->pab_nom}}</strong>, del Cementerio Sachaca Antiguo, donde se encuentran enterrados los restos de quien en vida fue: <strong>{{$contrato->Difunto->dif_nom}}  {{$contrato->Difunto->dif_ape}}</strong>, el día <?php echo $dia; ?>  de <?php echo $mesf; ?> del <?php echo $año; ?>. 
      
      <br /> <br /><p align='right'> Arequipa, {{$now->day}} de <?php echo $mes; ?> del {{$now->year}}.</p>
  </body>
            
</html>
<?php
  $reporte = ob_get_clean();
  header('Content-Type: application/vnd.ms-word');
  header("Content-Disposition: attachment; filename=AUTORIZACION.doc");  
  header("Pragma: no-cache");  
  header("Expires: 0");   

  echo $reporte;  
?>