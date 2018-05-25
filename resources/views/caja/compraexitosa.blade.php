@extends('layouts.appcaja')

@section('content')

<div class="content">
    <div id="maintenance" class="p-8">

        <div class="form-wrapper md-elevation-8 p-8">

            <div class="logo">
                <img src="{{asset('assets/images/emojifeliz.png')}}" style="width: 12.8rem; height: 12.8rem;">
            </div>

            <div class="title mt-4">La compra se  ha realizado con éxito!</div>

            <div class="subtitle mt-4 mb-4 mx-auto text-muted">
                Puede acercarse a oficinas a imprimir la constancia correspondiente
                <br> Gracias.
            </div>

        </div>
    </div>
    
</div>


@endsection