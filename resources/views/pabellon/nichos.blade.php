
@extends('layouts.appadmin')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pabellon.css')}}">
@endsection

@section('content')
<div class="content">
    
    <div class="doc data-table-doc page-layout simple full-width">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h2 class="doc-title" id="content">Pabellon -> {{$pabellon->pab_nom}}</h2>
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
            <script type="text/javascript">
                $(function () {
                    new PNotify({
                        text    : 'Los precios han sido modificados correctamente',
                        confirm : {
                            confirm: true,
                            buttons: [
                                {
                                    text    : 'Cerrar',
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
                });
            </script>
		@endif
		@if (Session::has('error'))
		    <div class="alert alert-danger" role="alert">
		        {{Session::get('error')}}
		    </div>
		@endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
		@if (Session::has('eliminado'))
		    <div class="alert alert-success" role="alert">
		        {{Session::get('eliminado')}}
		    </div>
		@endif
        <!-- CONTENT -->
        <div class="page-content p-6">
            <div class="content" align="center">
                <div class="row">
                    <div class="col-12" >
                        <div class="example " >
                            <div class="source-preview-wrapper"  style="overflow: scroll">
                                <div class="preview" >
                                    <div class="preview-elements" >
                                        <div class="row">                                               
                                            <table class="pabellon" >
                                                <?php 
                                                    $flagPrecio = true;
                                                ?>
                                                @for($i=1;$i<=$pabellon->pab_nrofil;$i++)
                                                    <tr>
                                                        <?php $flagPrecio = true; ?>
                                                    @for($j=1;$j<=$pabellon->pab_nrocol;$j++)
                                                        <td>
                                                            <form action="/admin/nicho/" method="post">
                                                                <input type="hidden" name="nicho_id" value="{{$nichos[$i-1][$j-1]->nicho_id}}">
                                                                @if($nichos[$i-1][$j-1]->nicho_est=="ocupado")
                                                                    <button type="submit"  class="ocupado" data-toggle="tooltip" data-placement="top" data-original-title="ocupado"><span>{{$nichos[$i-1][$j-1]->nicho_nro}}</span></button>
                                                                    <?php $flagPrecio = false; ?>
                                                                @else
                                                                    <button type="submit"  class="libre" data-toggle="tooltip" data-placement="top" data-original-title="Libre | S/.{{$nichos[$i-1][$j-1]->nicho_precio}}"><span>{{$nichos[$i-1][$j-1]->nicho_nro}}</span></button>
                                                                @endif
                                                            </form>
                                                        </td>
                                                        @if($j==$pabellon->pab_nrocol)
                                                            @if($flagPrecio)
                                                                <td style="padding: 10px">
                                                                    <form class="form-inline" method="POST" action="/admin/pabellon/postCambiarPrecioFila">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <input type="hidden" name="pab_id" value="{{$pabellon->pab_id}}">
                                                                        <input type="hidden" name="fila" value="{{$i}}">
                                                                        <input type="text" name="precio" class="form-control" placeholder="Ejemplo: 2560.50" aria-label="Username" aria-describedby="basic-addon1">
                                                                        <button  type="submit" class="btn btn-info fuse-ripple-ready">Cambiar Precio a la Fila</button>
                                                                    </form>
                                                                </td>
                                                            @else
                                                                <td style="padding: 10px">
                                                                    <form class="form-inline">
                                                                        <input type="text" class="form-control" readonly="" placeholder="No se puede editar" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </form>
                                                                </td>
                                                            @endif
                                                        @endif

                                                    @endfor
                                                    </tr>
                                                @endfor
                                            </table>
                                            
                                        </div>
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