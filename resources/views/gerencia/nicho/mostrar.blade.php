@extends('layouts.appgerencia')

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
                                <div class="preview">
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
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Example file input</label>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                            </div>
                                            <fieldset class="form-group">
                                                <legend>Radio buttons</legend>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                        <span class="radio-icon fuse-ripple-ready"></span>
                                                        <span>Option one is this and that—be sure to include why it's great</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                                                        <span class="radio-icon fuse-ripple-ready"></span>
                                                        <span>Option two can be something else and selecting it will deselect option one</span>
                                                    </label>
                                                </div>
                                                <div class="form-check disabled">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled="">
                                                        <span class="radio-icon fuse-ripple-ready"></span>
                                                        <span>Option three is disabled</span>
                                                    </label>
                                                </div>
                                            </fieldset>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                    <span class="checkbox-icon fuse-ripple-ready"></span>
                                                    <span>Check me out</span>
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-primary fuse-ripple-ready">Submit</button>
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