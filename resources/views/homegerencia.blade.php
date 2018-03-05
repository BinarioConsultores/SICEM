@extends('layouts.appgerencia')
@section('content')
<div class="content">
    <div class="page-layout blank p-6">
        @if (session('status'))
            <strong>{{ session('status') }}</strong>         
        @endif
      <h2>Bienvenido!</h2>
    </div>
</div>

@endsection