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
      <img src="{{asset('assets/images/logo_documento.png')}}">
      <p align='right'> LA ENCARGADA DEL DEPARTAMENTO DE REGISTRO CIVIL Y CEMENTERIOS DE LA MUNICIPALIDAD DISTRITAL DE SACHACA:</p><br />
      <p align='right'> <strong>  {{ Auth::user()->name }}</strong> </p> <br>
      <p align='center'><strong>DEJA CONSTANCIA:</strong> </p><br />
      <p align='justify' style='text-align:justify'> Que en el cementerio Municipal de {{$contrato->Nicho->Pabellon->Cementerio->cement_nom}}, se encuentran sepultados los restos mortales de quien en vida fue: <strong>{{$contrato->Difunto->dif_nom}}  {{$contrato->Difunto->dif_ape}}  {{$contrato->Difunto->dif_ape2}}, </strong> en el nicho Nro. <strong>{{$contrato->Nicho->nicho_nro}} </strong>de la <strong>{{$contrato->Nicho->nicho_fila}} </strong>fila del Pabellón <strong>{{$contrato->Nicho->Pabellon->pab_nom}}, </strong> sepultada el día <?php echo $dia; ?>  de <?php echo $mesf; ?> del <?php echo $año; ?>.</p><br />
      <p align='right' style='text-align:justify'>SE EXPIDE LA PRESENTE CONSTANCIA A SOLICITUD DE LA PARTE INTERESADA, Y PARA LOS FINES QUE DETERMINE.</p>
      <p align='right'> Arequipa, {{$now->day}} de <?php echo $mes; ?> del {{$now->year}}.</p>
  </body>
            
</html>
<?php
  $reporte = ob_get_clean();
  header('Content-Type: application/vnd.ms-word');
  header("Content-Disposition: attachment; filename=CONSTANCIA.doc");  
  header("Pragma: no-cache");  
  header("Expires: 0");   

  echo $reporte;  
?>