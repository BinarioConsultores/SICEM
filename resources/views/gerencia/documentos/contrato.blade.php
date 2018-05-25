<?php
  ob_start();
 

  
?>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  </head>
  
  <body>
      <img src="{{asset('assets/images/logo_documento.png')}}">
      <p align='center'><strong>[PLANTILLA DE CONTRATO] de {{$contrato->Solicitante->sol_nombre}}</strong> </p><br />
      
  </body>
            
</html>
<?php
  $reporte = ob_get_clean();
  header('Content-Type: application/vnd.ms-word');
  header("Content-Disposition: attachment; filename=CONTRATO.doc");  
  header("Pragma: no-cache");  
  header("Expires: 0");   

  echo $reporte;  
?>