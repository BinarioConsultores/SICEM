@extends('layouts.appgerencia')

@section('javascript')
<script type="text/javascript">
    function iralpaso2(){
        $("#div2").removeAttr( "hidden" )
        $("#div1").attr("hidden","true");
    }
</script>
@endsection

@section('content')


<div class="content">
    <div class="doc data-table-doc page-layout simple full-width">
        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h2 class="doc-title" id="content">Nicho {{$nicho->nicho_nro}}</h2>
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

        <div class="page-content p-6">
            <div class="example">
                <div class="col-12">
                    <div class="row">
                        <div class="container">
                    
                            <div class="row bs-wizard" style="border-bottom:0;">
                                
                                <div class="col-3 bs-wizard-step complete">
                                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                                  <div class="progress"><div class="progress-bar"></div></div>
                                  <a href="#" class="bs-wizard-dot"></a>
                                  <div class="bs-wizard-info text-center">Lorem ipsum dolor sit amet.</div>
                                </div>
                                
                                <div class="col-3 bs-wizard-step complete"><!-- complete -->
                                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                                  <div class="progress"><div class="progress-bar"></div></div>
                                  <a href="#" class="bs-wizard-dot"></a>
                                  <div class="bs-wizard-info text-center">Nam mollis tristique erat vel tristique. Aliquam erat volutpat. Mauris et vestibulum nisi. Duis molestie nisl sed scelerisque vestibulum. Nam placerat tristique placerat</div>
                                </div>
                                
                                <div class="col-3 bs-wizard-step complete"><!-- complete -->
                                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                                  <div class="progress"><div class="progress-bar"></div></div>
                                  <a href="#" class="bs-wizard-dot"></a>
                                  <div class="bs-wizard-info text-center">Integer semper dolor ac auctor rutrum. Duis porta ipsum vitae mi bibendum bibendum</div>
                                </div>
                                
                                <div class="col-3 bs-wizard-step active"><!-- active -->
                                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                                  <div class="progress"><div class="progress-bar"></div></div>
                                  <a href="#" class="bs-wizard-dot"></a>
                                  <div class="bs-wizard-info text-center"> Curabitur mollis magna at blandit vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div> 
            </div>     
        </div>
        <!-- CONTENT -->
        <div class="page-content p-6">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8" >
                        <div class="example" >
                            <div class="source-preview-wrapper">
                                <div class="preview" id="div1">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Example multiple select</label>
                                            <select multiple="" class="form-control" id="exampleFormControlSelect2">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <label class="btn btn-primary fuse-ripple-ready" onclick="iralpaso2();">Siguiente</label>
                                    </form>
                                </div>
                                <div class="preview" id="div2" hidden="">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Example multiple select</label>
                                            <select multiple="" class="form-control" id="exampleFormControlSelect2">
                                                <option>segundo</option> 
                                            </select>
                                        </div>
                                        <button  class="btn btn-primary fuse-ripple-ready">Submit</button>
                                    </form>
                                </div>
                                <div class="preview" id="div3" hidden="">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Example multiple select</label>
                                            <select multiple="" class="form-control" id="exampleFormControlSelect2">
                                                <option>tercero</option> 
                                            </select>
                                        </div>
                                        <button class="btn btn-primary fuse-ripple-ready">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        </div>
                        <!-- CONTENT -->
    </div>
</div>

@endsection