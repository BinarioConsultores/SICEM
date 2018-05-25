
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <title>Reporte de pagos</title>
  </head>
<body style="font-family: 'Calibri';">
	<img src="{{asset('assets/images/logo_documento.png')}}" style="opacity: 0.5; width: 10%;height: 10%;">
	<p align='center'><strong>REPORTE DE PAGOS</strong> </p><br />
	<table  style="font-family: Lucida Sans Unicode, Lucida Grande, Sans-Serif;
    font-size: 12px;    margin: 45px;     width: 300px; text-align: left;  ">
		<thead>
			<th>Nombre Difunto:</th><td>{{$contrato->Difunto->dif_nom}} {{$contrato->Difunto->dif_ape}}</td><tr></tr>
			<th>Nro. de Nicho:</th><td>{{$contrato->Nicho->nicho_nro}}</td><tr></tr>
			<th>Nombre de solicitante:</th><td>{{$contrato->Solicitante->sol_nombre}}</td><tr></tr>
			<th>Nombre de Cementerio:</th><td>{{$contrato->Nicho->Pabellon->Cementerio->cement_nom}}</td><tr></tr>
			<th>Nombre de Pabellon:</th><td>{{$contrato->Nicho->Pabellon->pab_nom}}</td><tr></tr>
		</thead>
		<tbody>
				
				
				
		</tbody>
	</table>
	<table  style="font-family: Lucida Sans Unicode, Lucida Grande, Sans-Serif;
    font-size: 12px;    margin: 45px;     width: 100%; text-align: right;    border-collapse: collapse;">
		<thead  style="background: #9FBEB8;border: 3px;width: 3em;-webkit-border-radius: 5px 5px 5px 5px; border-radius: 7px 7px 7px 7px; height: 2em;margin-right: 2px;">
			<th>Nro. Cuota</th>
			<th>Fecha de Pago</th>
			<th>Monto de Cuota</th>
			<th>Saldo de Cuota</th>
			<th>Estado de Cuota</th>
			<th>Descripcion</th>
		</thead>
		<tbody>
			<tr></tr>
			@foreach ($planpago as $ppago)
                @if($ppago->ppago_saldocuota==0)
                    <tr style='background: #D2FFBD;border: 1px;width: 2em;-webkit-border-radius: 5px 5px 5px 5px; border-radius: 7px 7px 7px 7px; height: 2em;margin-right: 2px;'>
                @endif
                @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven < $now)
                    <tr style='background: #FFA6A2;border: 1px;width: 2em;-webkit-border-radius: 5px 5px 5px 5px; border-radius: 7px 7px 7px 7px; height: 2em;margin-right: 2px;'>
                @endif
                @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven > $now)
                    <tr style='background: #C7E3FF;border: 1px;width: 2em;-webkit-border-radius: 5px 5px 5px 5px; border-radius: 7px 7px 7px 7px; height: 2em;margin-right: 2px;'>
                @endif
                <td>{{$ppago->ppago_nrocuota}}</td>
                <td>{{$ppago->ppago_fechaven}}</td>
                <td>{{$ppago->ppago_montocuota}}</td>
                <td>{{$ppago->ppago_saldocuota}}</td>
                @if($ppago->ppago_saldocuota==0)
                    <td>Pagado</td>
                @endif
                @if($ppago->ppago_saldocuota>0 && $ppago->ppago_fechaven < $now)
                    <td>Con Retraso</td>
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
	
</body>

</html>


