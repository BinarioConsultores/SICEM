@extends('layouts.appgerencia')
@section('javascript')
<script type="text/javascript">
    
    $(function() {
        var responsive = $("<div class='table-responsive'>");
        var table = $("<table id='dataTable' class='table'>");
        table.append("<thead><tr><th class='secondary-text'> <div class='table-header'><span>Nombre de Solicitante</span></div></th><th class='secondary-text'> <div class='table-header'><span>DNI de Solicitante</span></div></th><th class='secondary-text'> <div class='table-header'><span>Nombre de Difunto</span> </div></th><th class='secondary-text'> <div class='table-header'><span>DNI de Difunto</span> </div></th><th class='secondary-text'> <div class='table-header'><span>Tipo de Pago </span></div></th><th class='secondary-text'> <div class='table-header'><span>Tipo de Uso</span></div></th><th class='secondary-text'><div class='table-header'><span>Fecha de Contrato</span></div></th><th class='secondary-text'><div class='table-header'> <span>Acciones </span></th></div> </tr></thead>");

        var tbody = $('<tbody>'); 
        $("#busqueda").on('keyup', function (e) {

            if (e.keyCode == 13) {
                $('#mostrarContratos').append("<img align='center' src='{{asset('assets/images/cargandop.gif')}}'>");
                var busqueda = $(this).val();
                var request = $.ajax({
                    url: '/ajax/get/ObtenerContratos',
                    type: 'GET',
                    data: { busqueda: busqueda} ,
                    contentType: 'application/json; charset=utf-8'
                });

                request.done(function(data) {
                    $('#mostrarContratos').empty();
                    $('#contenedor').removeAttr('hidden');
                    if (data.length == 0) {
                        tbody.empty();
                        $('#mostrarContratos').empty();
                        $('#mostrarContratos').text("No se encontraron resultados para la búsqueda");
                        $('#titulo').empty();
                        $('#titulo').append($('<titulo>', {
                            text: "Resultados Obtenidos para: "+busqueda
                        }));            
                    }
                    else{
                        tbody.empty();
                        $('#mostrarContratos').empty();
                        $('#titulo').empty();
                        $('#titulo').append($('<titulo>', {
                            text: "Resultados Obtenidos para: "+busqueda
                        }));  
                        $.each(data, function(index,contrato){
                            tbody.append('<tr>');
                            tbody.append($('<td>',{text: contrato.sol_nombre,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.sol_dni,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.dif_nom + ' ' + contrato.dif_ape,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.dif_dni,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.cont_tipopago,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.cont_tipouso,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.cont_fecha,}));
                            tbody.append('</td>');
                            tbody.append("<a href='/gerencia/pabellon/nicho?nicho_id="+contrato.nicho_id+"' class='btn btn-secondary p-1'>Ver Info <i class='icon-eye'></i> </a>");
                            tbody.append('<tr>');
                        });
                        
                        tbody.append('</tbody></table>');
                        table.append(tbody);
                        responsive.append(table);
                        $('#mostrarContratos').append(responsive);
                    }
                });
            }
        });
          
    });

</script>
@endsection
@section('content')
<div class="content">
    <div class="doc forms-doc page-layout simple full-width">
        <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h2 class="doc-title" id="content">Realice la Búsqueda de Solicitantes y Difuntos.</h2>
        </div>
        <div class="page-content p-12">
            <div class="content container">
                <div class="row">
                    <div class="col-12">
                        <div class="example">
                            <div class="card">
                                <div class="description">
                                    <div class="description-text">
                                        <header class="h6 bg-secondary text-auto p-4">
                                            <div class="title">Formulario de Búsqueda</div>
                                        </header>
                                    </div>
                                </div>
                                <div class="source-preview-wrapper">
                                    <div class="preview">
                                        <div class="row">
                                            <div class="col-1"></div>
                                            <div class="form-group col-10" id="nombre_div" >
                                              <label for="busqueda" class="form-label">Ingrese el Nombre, Apellido o DNI del Solicitante o del Difunto</label>
                                              <input type="text" class="form-control" name="busqueda"  id="busqueda" placeholder="Ejemplo: Juan ó 47040061">
                                            </div>
                                            <div class="col-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="divider mb-10"></div>

                <div class="row">
                    <div class="col-12" id="contenedor">
                        <div class="example">
                            <div class="card">
                                <div class="description">
                                    <div class="description-text">
                                        <header class="h6 bg-secondary text-auto p-4">
                                            <div class="title"><span id="titulo">Resultados de la Búsqueda</span></div> 
                                        </header>
                                    </div>
                                </div>
                                <div class="preview m-10" id="mostrarContratos">
                                    Ingrese el texto a buscar en el formulario de arriba.
                                </div>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascriptFinal')
    <script type="text/javascript">
        $('#dataTable').DataTable({
            responsive: true
        });
    </script>
@endsection