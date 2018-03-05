<!DOCTYPE html>
<html>


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  

  <link rel='stylesheet' href="{{ asset('css/estilos.css')}}">

  <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,700|Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>

  <link href="{{ asset('assets/favicon.ico')}}" rel="shortcut icon">
  <link href="{{ asset('assets/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    @javascript html5shiv respond.min
  <![endif]-->

  <title>{{ config('app.name', 'Laravel') }}</title>

</head>

<body class="glossed">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42863888-4', 'pinsupreme.com');
  ga('send', 'pageview');

</script>
<div class="all-wrapper fixed-header left-menu">
  <div class="page-header">
  <div class="header-links hidden-xs">
    <div class="top-search-w pull-right">
      <input type="text" class="top-search" placeholder="Search"/>
    </div>
    <div class="dropdown hidden-sm hidden-xs">
      <a href="#" data-toggle="dropdown" class="header-link"><i class="fa fa-bolt"></i> Notificaciones <span class="badge alert-animated">2</span></a>

      <ul class="dropdown-menu dropdown-inbar dropdown-wide">
        <li><a href="#"><span class="label label-warning">1 min</span> <i class="fa fa-bell"></i> Correo Recibido</a></li>
        <li><a href="#"><span class="label label-warning">4 min</span> <i class="fa fa-fire"></i> Incendio en la jato</a></li>
      </ul>
    </div>
    <div class="dropdown hidden-sm hidden-xs">
      <a href="#" data-toggle="dropdown" class="header-link"><i class="fa fa-cog"></i> Opciones</a>

      <ul class="dropdown-menu dropdown-inbar">
        <li><a href="#"><span class="label label-warning">2</span> <i class="fa fa-envelope"></i> Opción 1</a></li>
        <li><a href="#"><span class="label label-warning">4</span> <i class="fa fa-users"></i> Opción 2</a></li>
        <li><a href="#"><i class="fa fa-cog"></i> Más opciones</a></li>
      </ul>
    </div>
    <div class="dropdown">
      <a href="#" class="header-link clearfix" data-toggle="dropdown">
        <div class="avatar">
          <img src="assets/images/avatar-small.jpg" alt="">
        </div>
        <div class="user-name-w">
          {{ Auth::user()->name }}<i class="fa fa-caret-down"></i>
        </div>
      </a>
      <ul class="dropdown-menu dropdown-inbar">
        <li><a href="#"><span class="label label-warning">2</span> <i class="fa fa-envelope"></i> Opción 1</a></li>
        <li><a href="#"><span class="label label-warning">4</span> <i class="fa fa-users"></i> Opción 2</a></li>

          <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                       <i class="fa fa-power-off"></i>
              Cerrar Sesión
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      </ul>
    </div>
  </div>
  <a class="logo hidden-xs" href="/home"><i class="fa fa-rocket"></i></a>
  <a class="menu-toggler" href="#"><i class="fa fa-bars"></i></a>
  <h1>SICEM</h1>
</div>
  <div class="side">
  <div class="sidebar-wrapper">
  <ul>
    <li>
      <a href="index-2.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
        <i class="fa fa-home"></i>
      </a>
    </li>
    <li>
      <a href="forms.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Forms">
        <i class="fa fa-file-text-o"></i>
      </a>
    </li>
    
  </ul>
</div>
  <div class="sub-sidebar-wrapper">
    <ul>
      <li class='current'><a class='current' href="table.html"> Regular Tables</a></li>
      <li><a href="datatable.html"> Datatables</a></li>
      <li><a href="responsive_table.html"> Responsive Tables</a></li>
    </ul>
  </div>
  <div class="sub-sidebar-wrapper">
    <ul>
      <li class='current'><a class='current' href="table.html"> Regular Tables</a></li>
      <li><a href="datatable.html"> Datatablsssses</a></li>
      <li><a href="responsive_table.html"> Responsive Tables</a></li>
    </ul>
  </div>
</div>
  @yield('content')
  
</div>

@yield('scripts')



</body>
</html>