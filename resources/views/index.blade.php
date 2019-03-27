<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>INFELCOM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <!--meta name="twitter:image" content=""-->
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
    <!-- Icono de la pestaña -->
    <link rel="icon" href="http://www.uptc.edu.co/export/sites/default/facultades/f_ingenieria/pregrado/sistemas/imagenes/LogoInfelcom.jpg" sizes="auto">
    <!-- Google Fonts -->
    <!--link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet"-->
    <!-- Bootstrap CSS File -->
    <!--link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"-->
    <!-- Libraries CSS Files -->
    <!--link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet"-->
    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet" -->
</head>

<body>

    <!------ Iconos y estilos via HTTP -------------------------------------------------------------------------->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php $group = App\Group::find(1) ?>
    <?php $group_lines = App\Group_Line::all() ?>
    <?php $semilleros = App\Hotbed::all() ?>

    <!------------------------------ Heroe inicial --------------------------------------------->
    <section class="hero">

        <div class="container text-center">

            <div class="col-md-12">
                <div class="text-wrap">
                    <h1>{{$group->acronym}}</h1>
                </div>
                <h2 class="text-muted">
                    {{$group->name}}
                </h2>
                <a class="btn" href="#about">CONOCER MÁS</a>
                <div class="img-fluid">
                    <img src="img/uptcblanco.png" class="img-responsive" height="100px" width="220px">
                </div>
            </div>

        </div>
    </section>
    <!------------------------------------------------------------------------------------------------------------->
    <!------------------------------------------- Barra de navegación ---------------------------------------------->
    <!-------------------------------------------------------------------------------------------------------------->
    <header id="header">
        <div class="container">
            <nav id="nav-menu-container">
                <ul class="nav-menu text-wrap">
                    <li><a href="#about" style="padding: 10px;">
                            <div class="container text-center">
                                <i class="fa fa-info-circle" style="font-size: 20px;"></i>
                            </div>
                            ¿Quienes somos?
                        </a>
                    </li>
                    <li><a href="#mision" style="padding: 10px;">
                            <div class="container text-center">
                                <i class="fa fa-book" style="font-size: 20px;"></i>
                            </div>
                            Misión y visión
                        </a></li>
                    <li><a href="#linea" style="padding: 10px;">
                            <div class="container text-center">
                                <i class="fa fa-code-fork" style="font-size: 20px;"></i>
                            </div>
                            Lineas de investigación
                        </a></li>
                    <li><a href="#team" style="padding: 10px;">
                            <div class="container text-center">
                                <i class="fa fa-user" style="font-size: 20px;"></i>
                            </div>
                            Nuestros investigadores
                        </a></li>
                    <li><a href="#semillero" style="padding: 10px;">
                            <div class="container text-center">
                                <i class="fa fa-users" style="font-size: 20px;"></i>
                            </div>
                            Semilleros
                        </a></li>
                    <li><a href="#contact" style="padding: 10px;">
                            <div class="container text-center">
                                <i class="fa fa-comments-o" style="font-size: 20px;"></i>
                            </div>
                            Contactarnos
                        </a></li>
                    <li><a href="#noticias" style="padding: 10px;">
                            <div class="container text-center">
                                <i class="fa fa-newspaper-o" style="font-size: 20px;"></i>
                            </div>
                            Noticias y eventos
                        </a>
                    </li>

                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/home') }}" target="_blank">{{ Auth::user()->name }}</a>
                    @else
                    <li><a href="{{ route('login') }} " target="_blank" style="padding: 10px;">
                            <div class="container text-center">
                                <i class="fa fa-sign-in" style="font-size: 20px;"></i>
                            </div>
                            Iniciar sesión
                        </a></li>
                    @endauth
                    @endif
                </ul>
            </nav>
        </div>
    </header>
    <!----------------------------------------------------------------------------------------------------------->
    <!----------------------------------------- Seccion acerca de nosotros --------------------------------------->
    <!------------------------------------------------------------------------------------------------------------>
    <section class="about" id="about">
        <div class="container text-center">
            <h2>
                ¿QUIENES SOMOS?
            </h2>
            <div class=" row">
                <div class="container text-center">
                    <video src="img/infelcomlogo.m4v" autoplay muted loop width="550" height="300 " type="video/mp4"></video>
                </div>
                <div class="container">
                    <p>
                        El Grupo de Investigación en Informática, Electrónica y Comunicaciones de la Universidad
                        Pedagógica y Tecnológica de Colombia, es una comunidad conformada básicamente por estudiantes y
                        docentes del programa de Ingeniería de Sistemas y Computación, conscientes que el área de la
                        Teleinformática es fundamental para las pretensiones cognitivas y de aplicación profesional y
                        disciplinar.
                    </p>

                    <p>
                        La citada comunidad reconoce su responsabilidad por profundizar y generar soluciones innovadoras
                        en el área de las Redes de Datos, Comunicaciones y actividades de gestión de recursos
                        computacionales dispuestos en una organización tan simple como una empresa y tan compleja como
                        la misma Internet.
                    </p>
                </div>

            </div>

        </div>
    </section>
    <!---------------------------------------------------------------------------------------------------------->

    <!---------------------------------Seccion mision y vision--------------------------------------------------->
    <!----------------------------------------------------------------------------------------------------------->
    <section class="hero" id="mision">
        <div class="container">
            <div class="row text-center">
                <div class="container text-center">
                    <h2>
                        MISIÓN
                    </h2>

                    <p>
                        {{$group->mision}}
                    </p>


                    <h2>
                        VISIÓN
                    </h2>
                    <p>
                        {{$group->vision}}
                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-------------------------------------------------------------------------------------------------------->

    <!--------------------------------------Sección linea de investigación------------------------------------->
    <!--------------------------------------------------------------------------------------------------------->
    <section class="features" id="linea">
        <div class="container text-center">
            <h2>
                LÍNEAS DE INVESTIGACIÓN
            </h2>
            <div class="row">
                @foreach($group_lines as $group_line)
                <div class="container text-center">
                    <div class="card text-center">
                        <div>
                            <h3>
                                <?php $line = App\Line_of_investigation::find($group_line->id_line) ?>
                                {{$line->name}}
                            </h3>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!------------------------------------------------------------------------------------------------------------------>
    <!------------------------------seccion de investigadores      ----------------------------------------------------->
    <!------------------------------------------------------------------------------------------------------------------>
    <section class="frame" id="team">
        <div class="container">
            <h2>
                INVESTIGADORES
            </h2>

            <div class="row text-center">
                <div class="col-sm-3 col-xs-6">
                </div>

                <div class="col-sm-3 co">
                    <a class="btn" href="{!!URL::to('/index')!!}">ESTUDIANTES</a>
                </div>

                <div class="col-sm-3">
                    <a class="btn " href="{!!URL::to('/indexT')!!}">DOCENTES</a>
                </div>

                <div class="col-sm-3 col-xs-6">
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------------------------------------------------------------------------------->
    <!-------------------------------------seccion semilleros------------------------------------------------------>
    <!------------------------------------------------------------------------------------------------------------->

    <section class="features" id="semillero">
        <div class="container">
            <h2 class="text-center">
                <!--cambio-->
                SEMILLEROS DE INVESTIGACIÓN
            </h2>

            <div class="row text-center">
                @foreach($semilleros as $semillero)
                <div class="feature-col col-lg-4 col-xs-12">
                    <div class="card card-block text-center">
                        <div>
                            <h3>
                                {{$semillero->name}}
                            </h3>
                            <p>
                                <strong>Objetivo</strong>
                                <br>{{$semillero->objective}}
                            </p>
                            <p>
                                <strong>Linea de investigación</strong>
                                <br>
                                <?php $line = App\Line_of_investigation::find($semillero->id_line) ?>
                                {{$line->name}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!---------------------------------------------------------------------------------------------------------------------->
    <!------------------------- Seccion noticias y eventos ----------------------------------------------------------------->
    <!---------------------------------------------------------------------------------------------------------------------->
    <section class="frame" id="noticias">
        <div class="container">
            <h2 class="text-center">
                NOTICIAS Y EVENTOS
            </h2>
            <div class="row text-center">
                <div class="col-sm-3 col-xs-6">
                </div>

                <div class="col-sm-3 co">
                    <a class="btn" href="{!!URL::to('/index')!!}">NOTICIAS</a>
                </div>

                <div class="col-sm-3">
                    <a class="btn " href="{!!URL::to('/indexT')!!}">EVENTOS</a>
                </div>

                <div class="col-sm-3 col-xs-6">
                </div>
            </div>

        </div>
    </section>
    <!---------------------------------------------------------------------------------------------------------------------->
    <!-----------------------------------------seccion contactenos---------------------------------------------------------->
    <!---------------------------------------------------------------------------------------------------------------------->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="section-title">CONTACTENOS</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4">
                    <div class="info">

                        <div>
                            <i class="fa fa-envelope"></i>
                            <p style="color: #000">{{$group->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!------------------------------------footer--------------------------------------------------------------->
    <!--------------------------------------------------------------------------------------------------->
    <footer class="framefoot text-center">

    </footer>

</body>

</html> 