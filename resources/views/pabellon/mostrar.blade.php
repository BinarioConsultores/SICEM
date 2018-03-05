@extends('layouts.appadmin')
@section('javascript')
<script type="text/javascript">


function setCementerioModal(btn){
    var cement_id = $(btn).attr( "cement_id" )
	var request = $.ajax({
	    url: '/admin/cementerio/editar',
	    type: 'GET',
	    data: { cement_id: cement_id} ,
	    contentType: 'application/json; charset=utf-8'
	});

	request.done(function(data) {
        $('#cement_id_editar').val(data.cement_id);
        $('#cement_nom_editar').val(data.cement_nom);

	});

	request.fail(function(jqXHR, textStatus) {
	      alert(textStatus);
	});

}
/**
 * Shows the snack bar.
 * Esta funcion aún no se ejecuta
 */

function showSnackBar(){

    new PNotify({
        text    : 'Connection timed out. Showing limited messages.',
        confirm : {
            confirm: true,
            buttons: [
                {
                    text    : 'Dismiss',
                    addClass: 'btn btn-link',
                    click   : function (notice) {
                        notice.remove();
                    }
                },
                null
            ]
        },
        buttons : {
            closer : false,
            sticker: false
        },
        animate : {
            animate  : true,
            in_class : 'slideInDown',
            out_class: 'slideOutUp'
        },
        addclass: 'md'
    });
        
}

</script>
@endsection

@section('content')
<div class="content">
    <div class="doc data-table-doc page-layout simple full-width">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h2 class="doc-title" id="content">Pabellones del Cementerio : {{$cementerio->cement_nom}}</h2>
               <a href="/admin/pabellon/crear?cement_id={{$cementerio->cement_id}}" class="btn btn-primary">Crear Nuevo Pabellon</a>
        </div>
		 
		<div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Cementerio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/admin/cementerio/crear">
                        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Nombre de Cementerio:</label>
                                <input type="text" class="form-control" id="recipient-name"  name="cement_nom"/>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Crear</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Cementerio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/admin/cementerio/editar">
                        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label for="cement_id" class="form-control-label">Id de Cementerio:</label>
                                <input type="text" class="form-control" id="cement_id_editar"  name="cement_id" readonly />
                            </div>

                            <div class="form-group">
                                <label for="cement_nom" class="form-control-label">Nombre de Cementerio:</label>
                                <input type="text" class="form-control" id="cement_nom_editar"  name="cement_nom"/>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Guardar Cambios</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>





		@if (Session::has('creado'))
		    <div class="alert alert-success" role="alert">
		        {{Session::get('creado')}}
		    </div>
		@endif
		@if (Session::has('editado'))
		    <div class="alert alert-success" role="alert">
                {{Session::get('editado')}}
            </div>
		@endif
		@if (Session::has('error'))
		    <div class="alert alert-danger" role="alert">
		        {{Session::get('error')}}
		    </div>
		@endif
		@if (Session::has('eliminado'))
		    <div class="alert alert-success" role="alert">
		        {{Session::get('eliminado')}}
		    </div>
		@endif
        <!-- CONTENT -->
        <div class="page-content p-6">
            <div class="content container">
                <div class="row">
                    <div class="col-12">
                        <div class="example ">
                            <div class="source-preview-wrapper">
                                <div class="preview">
                                    <div class="preview-elements">
                                        <table id="sample-data-table" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Id</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Nombre</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Nro. Filas</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Nro. Columnas</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Nro. Nichos</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Imagen Ub.</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Tipo de Numeración</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Acciones</span>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            @if(sizeof($cementerio->pabellones)>0)
                                            <tbody>                  
											    @foreach ($cementerio->pabellones as $pabellon)
											        <tr>
											            <td>{{$pabellon->pab_id}}</td>
											            <td>{{$pabellon->pab_nom}}</td>
                                                        <td>{{$pabellon->pab_nrofil}}</td>
                                                        <td>{{$pabellon->pab_nrocol}}</td>
                                                        <td>{{$pabellon->pab_cantnicho}}</td>
                                                        <td>{{$pabellon->pab_pathimag}}</td>
                                                        <td>{{$pabellon->pab_tiponum}}</td>
											            <td><button type="button" class="btn btn-info btn-fab fuse-ripple-ready" data-toggle="modal" data-target="#editarModal" onclick="setCementerioModal(this)"><i class="icon-lead-pencil" data-toggle="tooltip" data-placement="top" data-original-title="Editar"></i>
                										</button>
											            <a href="/admin/pabellon/eliminar" class="btn btn-danger btn-fab fuse-ripple-ready" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="icon-delete"></i></a>
                                                        <a href="/admin/pabellon/nichos?pab_id={{$pabellon->pab_id}}" class="btn btn-secondary btn-fab fuse-ripple-ready" data-toggle="tooltip" data-placement="top" data-original-title="Ver nichos"><i class="icon-eye-outline"></i></a>
                                                        </td>
											        </tr>
											    @endforeach
											@else
											    <div class="alert alert-danger" role="alert">
											        El cementerio {{$cementerio->cement_nom}} no tiene pabellones
											    </div>
											@endif
                                            </tbody>
                                        </table>
                                        <script type="text/javascript">
											$('#sample-data-table').DataTable({
											responsive: true
											});
										</script>

                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
                        <!-- CONTENT -->
    </div>
</div>

@endsection