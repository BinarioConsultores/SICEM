@extends('layouts.appgerencia')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pabellon.css')}}">
<style type="text/css">
   .square-libre {

    background: #4EAA4E;
    border: 1px;
    width: 2em;
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 7px 7px 7px 7px;
    height: 2em;
    margin-right: 2px;
    }
    .square-ocupado {
    background: #E5594D;
    border: 1px;
    width: 2em;
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 7px 7px 7px 7px;
    height: 2em;
    margin-right: 2px;
    }
    .square-tramite {
    background: #FF9958;
    border: 1px;
    width: 2em;
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 7px 7px 7px 7px;
    height: 2em;
    margin-right: 2px;
    }
    
</style>
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
                    <div class="col-2">
                        <div class="example">
                            <div class="source-preview-wrapper">
                                <div class="preview" >
                                    <div class="row">
                                        <ul class="nav flex-column">

                                            <li class="subheader"><h4>Leyenda</h4></li>
                                            <li class="nav-item">
                                                <div class="row">
                                                    <table>
                                                        <tr>
                                                            <td><div class="square-libre"></div></td>
                                                            <td><span>Nicho Libre</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><div class="square-ocupado"></div></td>
                                                            <td><span>Nicho Ocupado</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><div class="square-tramite"></div></td>
                                                            <td><span>Nicho en trámite</span></td>
                                                        </tr>
                                                        
                                                    </table>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10" >
                        <div class="example" >
                            <div class="source-preview-wrapper">
                                <div class="preview"  style="overflow: scroll">
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
                                                        <form action="/gerencia/pabellon/nicho/" method="get">
                                                            <input type="hidden" name="nicho_id" value="{{$nichos[$i-1][$j-1]->nicho_id}}">
                                                            @if($nichos[$i-1][$j-1]->nicho_est=="ocupado")
                                                                <button type="submit"  class="ocupado" data-toggle="tooltip" data-placement="top" data-original-title="ocupado"><span>{{$nichos[$i-1][$j-1]->nicho_nro}}</span></button>
                                                                <?php $flagPrecio = false; ?>
                                                            @else
                                                                @if($nichos[$i-1][$j-1]->nicho_est=="libre")
                                                                    <button type="submit"  class="libre" data-toggle="tooltip" data-placement="top" data-original-title="Libre | S/.{{$nichos[$i-1][$j-1]->nicho_precio}}"><span>{{$nichos[$i-1][$j-1]->nicho_nro}}</span></button>
                                                                @else
                                                                    <button type="submit"  class="tramite" data-toggle="tooltip" data-placement="top" data-original-title="En Trámite"><span>{{$nichos[$i-1][$j-1]->nicho_nro}}</span></button>
                                                                @endif
                                                            @endif
                                                        </form>
                                                    </td>
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
                        <!-- CONTENT -->
    </div>
</div>

@endsection