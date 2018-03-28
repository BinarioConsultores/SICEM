@extends('layouts.appcaja')
@section('javascript')
<script type="text/javascript">
    
    $(function() {

        var table = $("<table  id='sample-data-table'class='table'>");
        table.append("<thead><tr><th class='secondary-text'> <div class='table-header'><span>Nombre de Solicitante</span></div></th><th class='secondary-text'> <div class='table-header'><span>Nombre de Difunto</span> </div></th><th class='secondary-text'> <div class='table-header'><span>Tipo de Pago </span></div></th><th class='secondary-text'> <div class='table-header'><span>Tipo de Uso</span></div></th><th class='secondary-text'><div class='table-header'><span>Fecha de Contrato</span></div></th><th class='secondary-text'><div class='table-header'> <span>Acciones </span></th></div> </tr></thead>");
        var tbody = $('<tbody>'); 
        $("#busqueda").on('keyup', function (e) {

            if (e.keyCode == 13) {
                
                var busqueda = $(this).val();
                var request = $.ajax({
                    url: '/ajax/get/ObtenerContratos',
                    type: 'GET',
                    data: { busqueda: busqueda} ,
                    contentType: 'application/json; charset=utf-8'
                });

                request.done(function(data) {
                        $('#contenedor').removeAttr('hidden');
                    if (data.length == 0) {
                        tbody.empty();
                        $('#mostrarContratos').empty();
                        tbody.append($('<tr>', {
                            text: "No se encontraron resultados."
                        }));   
                        tbody.append('</tr>');                
                    }
                    else{
                        tbody.empty();
                        $('#span').empty();
                        $('#span').append($('<span>', {
                            text: "Resultados Obtenidos para: "+busqueda
                        }));  
                        $.each(data, function(index,contrato){
                            tbody.append('<tr>');
                            tbody.append($('<td>',{text: contrato.sol_nombre,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.dif_nom,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.cont_tipopago,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.cont_tipouso,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.cont_fecha,}));
                            tbody.append('</td>');
                            tbody.append("<a  href='/caja/buscar/detalles?conv_id="+contrato.conv_id+"'><button type='button' class='btn btn-success'>Ver Detalles <i class='icon-information-outline'></i></button> </a>");
                            tbody.append('<tr>');
                        });
                        
                        tbody.append('</tbody></table>');

                    }
                    table.append(tbody);
                    $('#mostrarContratos').append(table);
                    $('#sample-data-table').DataTable({
                    responsive: true
                    });
                });

                
            }
        });
          
    });

</script>
@endsection
@section('content')
<div class="content">
        @if (session('status'))
            <strong>{{ session('status') }}</strong>         
        @endif
            <div class="doc forms-doc page-layout simple full-width">
                <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
                    <h2 class="doc-title" id="content">Realice la busqueda para realizar pago.</h2>
                </div>
                <div class="page-content p-12">
                    <div class="content container">
                        <div class="row">
                    <!-- FORM CONTROLS -->
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div class="example">
                                    <div class="card">
                                        <div class="description">
                                            <div class="description-text">
                                                <header class="h6 bg-secondary text-auto p-4">
                                                    <div class="title">Ingrese los datos solicitados</div>
                                                </header>
                                            </div>
                                        </div>
                                        <div class="source-preview-wrapper">
                                            <div class="preview">
                                                <div class="row">
                                                        <div class="col-1"></div>
                                                        <div class="form-group p-7  col-6" id="nombre_div" >
                                                          <label for="sol_nombre" class="form-label">Ingrese datos del solicitante o del difunto</label>
                                                          <input type="text" class="form-control" name="busqueda"  id="busqueda" placeholder="Nombre,DNI">
                                                        </div>
                                                        <div class="form-group p-12 col-5">
                                                            <button type="submit" class="btn btn-primary m-1">Buscar</button>
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" id="contenedor"  hidden="">
                                <div class="example">
                                    <div class="card">
                                        <div class="description">
                                            <div class="description-text">
                                                <header class="h6 bg-secondary text-auto p-4">
                                                    <div class="title"><span id="span"></span></div>
                                                   
                                                    
                                                </header>
                                            </div>
                                        </div>
                                        <div class="source-preview-wrapper">
                                            <div class="preview" id="mostrarContratos">
                                            </div>
                                        </div>
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