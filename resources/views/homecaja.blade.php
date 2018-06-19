@extends('layouts.appcaja')
@section('javascript')
<script type="text/javascript">
    
    $(function() {

        var table = $("<table class='table table-striped table-responsive'>");
        table.append("<thead><tr><th> Nombre de Solicitante</th><th> DNI: Solicitante</th><th> Nombre de Difunto</th><th> DNI: Difunto </th><th> Tipo de Pago </th><th> Tipo de Uso</th><th>Fecha de Contrato</th><th>Acciones </th></tr></thead>");
        var tbody = $('<tbody>');

        $("#busqueda").on('keyup', function (e) {

            if (e.keyCode == 13) {
                var busqueda = $(this).val();
                if (busqueda.trim() == '') {
                    return;
                }

                $('#cargando').removeAttr('hidden');
                $('#cargando').append("<img align='center' src='{{asset('assets/images/cargandop.gif')}}'>");
                $('#contenedor').attr('hidden','');
                $('#sinResultados').attr('hidden','');

                var request = $.ajax({
                    url: '/ajax/get/ObtenerContratosPagar',
                    type: 'GET',
                    data: { busqueda: busqueda} ,
                    contentType: 'application/json; charset=utf-8'
                });

                request.done(function(data) {
                    $('#cargando').empty();
                    $('#cargando').attr('hidden','');
                    if (data.length == 0) {
                        $('#contenedor').attr('hidden','');
                        $('#mostrarContratos').empty();
                        $('#buscado').text(busqueda);
                        $('#sinResultados').removeAttr('hidden');              
                    }
                    else{
                        $('#sinResultados').attr('hidden','');
                        $('#contenedor').removeAttr('hidden');
                        tbody.empty();
                        $('#span').empty();
                        $('#span').append($('<span>', {
                            text: "Resultados Obtenidos para: "+busqueda
                        }));  
                        $.each(data, function(index,contrato){
                            tbody.append('<tr>');
                            tbody.append($('<td>',{text: contrato.sol_nombre,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.sol_dni,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.dif_nom + ' ' + contrato.dif_ape + ' ' + contrato.dif_ape2,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.dif_dni,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.cont_tipopago,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.cont_tipouso,}));
                            tbody.append('</td>');
                            tbody.append($('<td>',{text: contrato.cont_fecha,}));
                            tbody.append('</td>');
                            tbody.append("<a href='/caja/buscar/detalles?conv_id="+contrato.conv_id+"'><button type='button' class='btn btn-secondary'>Ver <i class='icon-eye'></i></button> </a>");
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
                    
                            <div class="col-md-6 col-centered">
                                <div class="profile-box latest-activity card">
                                    <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4"> 
                                        <div class="title h6">Ingrese los datos solicitados</div>
                                        <div class="more text-muted">Ingrese Nombre, Dni o Apellido</div>
                                    </header>
                                    <div class="content activities p-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="busqueda" id="busqueda"  placeholder="Nombre de Solicitante" required>
                                            <label for="busqueda"><i class="icon-account-box"></i>Ingrese datos del solicitante o del difunto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-centered" id="contenedor"  hidden="">
                                <div class="profile-box latest-activity card">
                                    <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4"> 
                                        <div class="title h6"><span id="span"></span></div>
                                    </header>
                                    <div class="content activities p-4" id="mostrarContratos">

                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        <div class="row" id="sinResultados" hidden="">
                            <div class="col-12">
                                <h3 style="text-align: center;"> =( ... No se encontraron resultados para: <span id="buscado"></span></h3>
                            </div>
                        </div>
                        <div class="row" id="cargando">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection