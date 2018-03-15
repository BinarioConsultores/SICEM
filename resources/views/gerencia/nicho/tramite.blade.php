@extends('layouts.appgerencia')

@section('javascript')
<script type="text/javascript">
$('#sample-data-table').DataTable({
    responsive: true
});
</script>
	
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pabellon.css')}}">
<style type="text/css">
   .deuda-pagada {

    background: #7DBE72;
    border: 1px;
    width: 2em;
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 7px 7px 7px 7px;
    height: 2em;
    margin-right: 2px;
    }
    .deuda-vencida {
    background: #E5594D;
    border: 1px;
    width: 2em;
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 7px 7px 7px 7px;
    height: 2em;
    margin-right: 2px;
    }
    .pendiente {
    background: #7DBEFF;
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
    <div class="doc forms-doc page-layout simple full-width">
		<div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h2 class="doc-title" id="content">Contrato de nicho en tramite.</h2>
        </div>
                        <div class="page-content p-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="example"> 
                                                <div class="m-1">   
                                                     <header class="h6 bg-secondary text-auto p-4">
                                                        <div class="title">Contrato en Tramite</div>
                                                    </header>
                                                    <div class="content  p-4">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
</div>


@endsection