<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>INFELCOM</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

 
  <meta name="twitter:image" content="">
  <!-- Required JavaScript Libraries -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}" defer></script>
  <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}" defer></script>
  <script src="{{ asset('lib/superfish/hoverIntent.js') }}" defer></script>
  <script src="{{ asset('lib/superfish/superfish.min.js') }}" defer></script>
  <script src="{{ asset('lib/tether/js/tether.min.js') }}" defer></script>
  <script src="{{ asset('lib/stellar/stellar.min.js') }}" defer></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
  <script src="{{ asset('lib/counterup/counterup.min.js') }}" defer></script>
  <script src="{{ asset('lib/waypoints/waypoints.min.js') }}" defer></script>
  <script src="{{ asset('lib/easing/easing.js') }}" defer></script>
  <script src="{{ asset('lib/stickyjs/sticky.js') }}" defer></script>  
  <script src="{{ asset('lib/parallax/parallax.js') }}" defer></script>
  <script src="{{ asset('lib/lockfixed/lockfixed.min.js') }}" defer></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="{{ asset('js/custom.js') }}" defer></script>
  <script src="{{ asset('contactform/contactform.js') }}" defer></script>





  <!-- Favicon -->
  <link href="img/Logo.jpg" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

 
</head>

<body>
<?php $group=App\Group::find(1) ?>
<?php $group_lines=App\Group_Line::all()?>
<?php $semilleros=App\Hotbed::all()?>

  <section class="hero">
    <div class="container text-center">      
      <div class="col-md-12">
        <h1>{{$group->acronym}}</h1>
        <h2>
          {{$group->name}}
          </h2>       
        <a class="btn btn-full" href="#about">Conocer más</a>
      </div>
    </div>

  </section>
  <!-- /Hero -->

  <!-- Header -->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.html"><img src="img/LogoInfelcom.jpg" alt="" title="" /></img></a>
     
        
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="#about">Acerca de nosotros</a></li>
          <li><a href="#mision">Mision y Visión</a></li>
            <li><a href="#linea">Lineas de investigación</a></li>
          <li><a href="#team">Investigadores</a></li>
          <li><a href="#semillero">Semilleros</a></li>
          <li><a href="#contact">Contactenos</a></li>

              @if (Route::has('login'))
                @auth   
                <a href="{{ url('/home') }}">{{ Auth::user()->name }}</a>               
                @else
                <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                @endauth
              @endif
        </ul>
      </nav>      
    </div>
  </header>
  <!-- #header -->
   
  <!-- About -->

  <section class="about" id="about">
    <div class="container text-center">

      <h2>
          Acerca de nosotros
        </h2>
<div class="row">
        <div class="col-md-12">
          <a class="hero-brand" title="Home"><img alt="Bell Logo" src="img/LogoInfelcom.png"></a>
        </div>
      </div>
      <p>
 
El Grupo de Investigación en Informática, Electrónica y Comunicaciones de la Universidad Pedagógica y Tecnológica de Colombia, es una comunidad conformada básicamente por estudiantes y docentes del programa de Ingeniería de Sistemas y Computación, conscientes que el área de la Teleinformática es fundamental para las pretensiones cognitivas y de aplicación profesional y disciplinar. 

La citada comunidad reconoce su responsabilidad por profundizar y generar soluciones innovadoras en el área de las Redes de Datos, Comunicaciones y actividades de gestión de recursos computacionales dispuestos en una organización tan simple como una empresa y tan compleja como la misma Internet.
      </p>
    </div>
  </section>
  <!-- /About -->
  <!-- Parallax -->
<section class="mision" id="mision">
  <div class="block bg-primary block-pd-lg block-bg-overlay text-center" data-bg-img="img/parallax-bg.jpg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
    <h2>
        Misión
      </h2>

    <p>
    {{$group->mision}}
    </p>
      
      <h2>
        Visión
      </h2>
       <p>
 {{$group->vision}}
       </p>
      
<!--    <img alt="Bell - A perfect theme" class="gadgets-img hidden-md-down" src="img/descarga.jpg">-->
  </div>
    </section>
 
  <section class="features" id="linea">
    <div class="container">
      <h2 class="text-center">
          Lineas de investigación
        </h2>

      <div class="row">
        @foreach($group_lines as $group_line)
        <div class="feature-col col-lg-4 col-xs-12">
          <div class="card card-block text-center">   
            <div>
              <h3>
                <?php $line=App\Line_of_investigation::find($group_line->id_line) ?>
                 {{$line->name}}
                </h3>

            </div>
          </div>
        </div>
        @endforeach
      </div>      
    </div>
  </section>


  <!-- /Portfolio -->
  <!-- Team -->

  

  <section class="team" id="team">
    <div class="container">
      <h2 class="text-center">
        Investigadores
        </h2>

      <div class="row">
        <div class="col-sm-3 col-xs-6">          
      </div>

      <div class="col-sm-3 col-xs-6">
        <a class="btn btn-full" href="{!!URL::to('/index')!!}">Estudiantes investigadores</a>
    </div>

    <div class="col-sm-3 col-xs-6">
      <a class="btn btn-full" href="{!!URL::to('/indexT')!!}">Profesores investigadores</a>
    </div>

    <div class="col-sm-3 col-xs-6">
    </div>
    </div>
    </div>
  </section>
  <!-- /Team -->

  <section class="features" id="semillero">
    <div class="container">
      <h2 class="text-center">
          Semilleros
        </h2>

      <div class="row">
        @foreach($semilleros as $semillero)
        <div class="feature-col col-lg-4 col-xs-12">
          <div class="card card-block text-center">   
            <div>
              <h3>
                
                 {{$semillero->name}}
                </h3>
                <p><strong>Objetivo</strong>
                <br>
                {{$semillero->objective}}</p>
                
                <p><strong>Linea de investigación</strong>
                <br>
                <?php $line=App\Line_of_investigation::find($semillero->id_line) ?>
                {{$line->name}}
                </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>      
    </div>
  </section>

  <!--  footer -->

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="section-title">Contact Us</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4">
          <div class="info">       

            <div>
              <i class="fa fa-envelope"></i>
              <p>{{$group->email}}</p>
            </div>           
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="site-footer">
    <div class="bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-xs-12 text-lg-left text-center">
           
        
          </div>

        </div>
      </div>
    </div>
  </footer>
  <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>

</body>
</html>
