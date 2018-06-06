@extends('layouts.appgerencia')

@section('javascript')
	<script type="text/javascript">
		function cargarPabellones(select)
		{
           var cement_id = $(select).val();
           if (cement_id == 0) {
           	$('#pab_id').empty();
           	$('#lblPabellon').html("Pabellon");
           	$('#pab_id').attr("hidden","hidden");
           }
           else{
           		var request = $.ajax({
		            url: '/ajax/get/ObtenerPabellonesPorCementerio',
		            type: 'GET',
		            data: { cement_id: cement_id} ,
		            contentType: 'application/json; charset=utf-8'
		            });
           		
					request.done(function(data) {
						if (data.length == 0) {
							$('#pab_id').empty();
							$('#pab_id').attr("hidden","hidden");	
							$('#lblPabellon').html("El cementerio seleccionado no tiene pabellones");						
						}
						else{
							$('#pab_id').empty();
							$('#lblPabellon').html("Pabellon");
							$('#pab_id').removeAttr("hidden");
							$.each(data, function(index,pabellon){
								$('#pab_id').append($('<option>', { 
								    value: pabellon.pab_id,
								    text: pabellon.pab_nom
								}));
							});
						}			
				});
           }
	    }
	</script>
@endsection

@section('content')
<div class="content">
    @if (Session::has('contrato'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('contrato')}}
                                </div>
                            @endif
    <div class="doc forms-doc page-layout simple full-width">
		<div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h2 class="doc-title" id="content">Escoja el Cementerio y a continuación, el pabellón.</h2>
        </div>
        <div class="page-content p-12">
            <div class="content container">
                <div class="row">

                    <!-- FORM CONTROLS -->
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="example">
                            <div class="description">
                                <div class="description-text">
                                    <h5>Elija Cementerio y Pabellón</h5>
                                </div>
                            </div>
                            <div class="source-preview-wrapper">
                                <div class="preview">
                                    <div class="preview-elements">
                                        <form action="/gerencia/pabellon/nichos" method="post">
                                        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <label for="cementerio">Cementerio</label>
                                                <select class="form-control" id="cement_id" onchange="cargarPabellones(this)">
                                                	<option value="0">Seleecione Cementerio...</option>
                                                    @foreach($cementerios as $cementerio)
                                                    	<option value="{{$cementerio->cement_id}}">{{$cementerio->cement_nom}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pab_id" id="lblPabellon">Pabellon</label>
                                                <select class="form-control" id="pab_id" name="pab_id" hidden="hidden">
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary fuse-ripple-ready">Ver Pabellón</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection