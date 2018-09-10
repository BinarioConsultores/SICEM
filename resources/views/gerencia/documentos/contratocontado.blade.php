
@php
  ob_start();
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
  
  <body>
      <img src="{{asset('assets/images/logo_documento.png')}}">
      <p align='center'><FONT FACE="Eras Medium ITC"><strong>CONTRATO DE CESIÓN EN USO</strong></FONT></p>
      <p style='text-align:justify'><FONT FACE="Eras Medium ITC">Conste por el presente documento, <strong>EL CONTRATO DE CESIÓN EN USO</strong> que celebran de una parte, la <strong>MUNICIPALIDAD DISTRITAL DE SACHACA</strong> con <strong>R.U.C. Nro. 20190583369</strong>, con domicilio legal en Av. Fernandini s/n (Estadio de Sachaca), representada por su <strong>GERENTE DE SERVICIOS VECINALES MG. DIEGO RODRIGO LOPEZ RAMOS</strong> identificado con DNI N° <strong>46389079</strong>, a la que en adelante se le denominará  <strong>LA MUNICIPALIDAD</strong>; y de la otra parte el Sr. (a) <strong>{{$contrato->Solicitante->sol_nombre}}</strong> con DNI N° <strong>{{$contrato->Solicitante->sol_dni}}</strong> con domicilio <strong>{{$contrato->Solicitante->sol_dir}}</strong> a quien en adelante se le denominará <strong>EL/LA BENEFICIARIA</strong> en los términos contenidos en las cláusulas siguientes:</FONT></p>

      <p style="text-align: left;"><FONT FACE="Eras Medium ITC"><strong><u>ANTECEDENTES</u></strong></FONT></p>

      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>PRIMERA: LA MUNICIPALIDAD</strong> es propietaria de los terrenos y nichos que comprende los Cementerios Públicos Municipales de Sachaca, los cuales únicamente pueden ser objeto de cesión en uso a favor de particulares que lo soliciten cumpliendo las condiciones establecidas para ello.</FONT></p>

      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>SEGUNDA: EL BENFICIARIO </strong> ha manifestado el interés en obtener un nicho, para lo cual ha cumplido con los requisitos establecidos en el Art. 25 del Reglamento de Cementerio aprobado por la municipalidad a través de Ordenanza Nro. 004-2014-MDS.</FONT></p>

      <p style="text-align: left;"><FONT FACE="Eras Medium ITC"><strong><u>OJBETO DEL CONTRATO</u></strong></FONT></p>

      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>TERCERA: </strong> En virtud del presente contrato, <strong>LA MUNICIPALIDAD</strong> se obliga a ceder el uso a favor de <strong>EL BENEFICIARIO, {{$contrato->Solicitante->sol_nombre}}</strong> el nicho Nro. <strong>{{$contrato->Nicho->nicho_nro}}</strong>, ubicado en la <strong> @php echo $filaenletra; @endphp </strong>  fila del Pabellón <strong>{{$contrato->Nicho->Pabellon->pab_nom}}</strong> del Cementerio de <strong>{{$contrato->Nicho->Pabellon->Cementerio->cement_nom}}</strong>.</FONT></p>

      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>CUARTA: </strong> Las partes dejan constancia que el nicho a que se refiere la cláusula anterior se encuentra desocupado y en buen estado de conservación, lo que permite su uso pleno.</FONT></p>

      <p style="text-align: left;"><FONT FACE="Eras Medium ITC"><strong><u>DERECHO DE USO DE NICHO: FORMA, OPORTUNIDAD Y LUGAR DE PAGO:</u></strong></FONT></p>
      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>QUINTA: </strong> Las partes acuerdan que el monto del derecho de uso durante el plazo de vigencia previsto para el presente contrato asciende a S/. ({{$contrato->cont_monto}} Soles y 00/100). Dicho monto ha sido pagado al contado por <strong>EL BENEFICIARIO</strong> a través del Recibo de Ingreso N° __________ de fecha __________________________________.</FONT></p>

      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>SEXTA: </strong>El Plazo de la Cesión de Uso empezará a correr a partir de la fecha de la suscripción del Contrato respectivo, asumiendo las obligaciones respectivas contenidas en el artículo 28 del presente reglamento y demás que correspondan.</FONT></p>

      <p style="text-align: left;"><FONT FACE="Eras Medium ITC"><strong><u>PLAZO DEL CONTRATO:</u></strong></FONT></p>
      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>SETIMA: </strong>Las partes convienen en fijar un plazo de duración determinado para el presente contrato, el cual será de veinticinco (25) años, que se computarán a partir de la suscripción del presente contrato hasta el <strong>{{Carbon\Carbon::createFromFormat('Y-m-d',$contrato->cont_fecha)->addYears($contrato->cont_tiempo)->format('Y-m-d')}}</strong>, fecha en la que <strong>EL BENEFICIARIO</strong> está obligado a desocupar y devolver el bien materia de cesión de uso. Al vencimiento de dicho plazo, las partes de común acuerdo podrán renovar el presente contrato por plazos de igual duración.</FONT></p>

      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"> En caso que se produzca la desocupación de nichos por traslado de los restos a otros lugares, el derecho de cesión de uso podrá ser conservado por el titular o sus herederos para la inhumación de otros restos por el plazo que quede hasta alcanzar los veinticinco (25) años de la cesión original. No obstante, el titular o sus herederos podrán solicitar la extinción del derecho de cesión de uso y el reembolso del monto equivalente al 40% del valor actualizado conforme el TUSNE de los derechos, y de un 20% si la desocupación se efectúa antes de los diez años.</FONT></p>

      <p style="text-align: left;"><FONT FACE="Eras Medium ITC"><strong><u>OBLIGACIONES DEL BENEFICIARIO:</u></strong></FONT></p>
      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>OCTAVA: </strong>Son obligaciones de <strong>EL BENEFICIARIO</strong> las siguientes:</FONT></p>
      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC">
        <ul>
          <li>a. Solicitar autorización para la instalación de lápidas, emblemas o epitafios, y para la construcción de cualquier clase de obras. El otorgamiento de este tipo de autorizaciones está sujeto al pago de la tasa correspondiente establecida en el TUPA de la Municipalidad.</li>
          <li>b. Asegurar el cuidado, conservación y limpieza de las obras e instalaciones de titularidad particular, así como el aspecto exterior de las unidades de enterramiento adjudicadas colocando los elementos ornamentales conforme a las normas establecidas.</li>
          <li>c. Comunicar a la Administración las variaciones de domicilio, números de teléfono y de cualquier otro dato de influencia en las relaciones del titular con el servicio de Cementerio.</li>
          <li>d. Retirar a su costa las obras y ornamentos de su propiedad, cuando se extinga la cesión de uso.</li>
        </ul>
      </FONT></p>

      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>NOVENA: </strong>En el supuesto que EL BENEFICIARIO permaneciera en posesión del nicho uego de vencido el plazo pactado en este contrato, o en caso de incumplimiento de cualquiera de sus obligaciones LA MUNICIPALIDAD iniciará el procedimiento para el retiro y traslado de los restos a la fosa común.</FONT></p>

      <p style="text-align: left;"><FONT FACE="Eras Medium ITC"><strong><u>DE LA TRANSFERENCIA DE LOS DERECHOS DE CESIÓN EN USO:</u></strong></FONT></p>

      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>DÉCIMA: </strong>Los derechos derivado de la cesión de uso de nichos son transferibles por acto ente vivos o por causa de muerte, debiendo ser puesta en conocimiento de la Municipalidad con la documentación que la sustente para que el que adquiriente del derecho pueda ejercerlo.</FONT></p>
      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC">La transmisión “mortis causa” del derecho funerario se regirá por las normas establecidas en el Código Civil para las sucesiones (testamento o partición judicial o extrajudicial).</FONT></p>

      <p style="text-align: left;"><FONT FACE="Eras Medium ITC"><strong><u>CLAUSULA RESOLUTORIA:</u></strong></FONT></p>

      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>DÉCIMA PRIMERA: </strong>Son causales de resolución de pleno derecho del presente contrato:</FONT></p>
      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC">
        <ul>
          <li>a. La voluntad de <strong>EL BENEFICIARIO</strong>, que deberá ser comunicada por escrito a <strong>LA MUNICIPALIDAD.</strong></li>
          <li>b. El incumplimiento de cualquiera de las obligaciones por parte de <strong>EL BENEFICIARIO</strong> establecidas en el presente documento.</li>
        </ul>
      </FONT></p>

      <p style="text-align: left;"><FONT FACE="Eras Medium ITC"><strong><u>APLICACIÓN SUPLETORIA DE LA LEY:</u></strong></FONT></p>

      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>DÉCIMA SEGUNDA: </strong>Para todo lo no expresamente previsto en este contrato, la vinculación entre las partes se regirá por las disposiciones contenidas en nuestro Código Civil, Ley Orgánica de Municipalidades Ley Nro 27972, Reglamento de Cementerio aprobado mediante Ordenanza N° 004-2014-MDS y suplementariamente, por las normas aplicables por conexión y/o modificación.</FONT></p>

      <p style="text-align: left;"><FONT FACE="Eras Medium ITC"><strong><u>DOMICILIOS:</u></strong></FONT></p>
      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>DÉCIMA TERCERA: </strong>Para los efectos del presente contrato, las partes señalan los siguientes domicilios:</FONT></p>
      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC">
        <ul>
          <li>Municipalidad Distrital de Sachaca: Av. Fernandini s/n (Estadio de Sachaca)</li>
          <li>El Beneficiario: <strong>{{$contrato->Solicitante->sol_dir}}</strong>, SACHACA</li>
        </ul>
      </FONT></p>
      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC">Queda convenido que, para todo efecto, las partes dejan constituidos sus domicilios en los lugares precedentemente citados, en los que se efectuará válidamente, cualquier notificación judicial o extrajudicial. El cambio domiciliario de cualquiera de las partes, sólo surtirá efecto a partir de sétimo día hábil siguiente de comunicación de dicho cambio a la contraparte, por conducto notarial.</FONT></p>

      <p style="text-align: left;"><FONT FACE="Eras Medium ITC"><strong><u>COMPETENCIA TERRITORIAL:</u></strong></FONT></p>

      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC"><strong>DÉCIMA CUARTA: </strong>Las partes acuerdan que cualquier litigio, pleito, controversia, duda, discrepancia o reclamación resultante de la ejecución de este contrato, o relacionado con el directamente, así como cualquier supuesto de incumplimiento, terminación, nulidad o invalidez del mismo, será sometido a la jurisdicción de los jueces y tribunales de la ciudad de Arequipa, constituyendo la presente una cláusula de prórroga convencional de la competencia territorial por el Art.25 del C.P.C.</FONT></p>
      <p></p>
      <p style="text-align: justify;"><FONT FACE="Eras Medium ITC">En señal de Conformidad del presente documento, las partes se ratifican y lo suscriben en Arequipa: ____________ </FONT></p>
      
  </body>
            
</html>
<?php
  $reporte = ob_get_clean();
  header('Content-Type: application/vnd.ms-word');
  header("Content-Disposition: attachment; filename=CONTRATO {$contrato->Solicitante->sol_nombre}.doc");  
  header("Pragma: no-cache");  
  header("Expires: 0");   

  echo $reporte;
?>