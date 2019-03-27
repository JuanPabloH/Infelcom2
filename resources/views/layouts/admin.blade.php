<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">




<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/metisMenu.min.js') }}" defer></script>
    <script src="{{ asset('js/sb-admin-2.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <title>Administrador INFELCOM</title>
</head>
@guest
<?php echo Redirect::to(route('login')) ?>
@else

<body>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <!------------------------------------------------------->
    <!--             VENTANA DEL ADMINISTRADOR             -->
    <!------------------------------------------------------->

    <div id="wrapper">
        @if(Auth::user()->hasRole('admin'))
        <nav class="navbar bg-primary margin-left" role="navigation">
            <a class="navbar navbar-brand">INFELCOM Group System</a>

            <ul class="nav navbar-top-links navbar-right" style="padding: 12px 0;">
                <li class="dropdown">
                    <a class="dropdown-toggle" style="color: #fff;" data-toggle="dropdown" href="#">
                        <i class="fa fa-user" style="font-size: 20px;"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Salir</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!---------------------------------------------------------------------------------------------------------------------->
        <!-------------   MENU DE OPCIONES DE USUARIO ADMINISTRADOR   ---------------------------------------------------------->
        <!---------------------------------------------------------------------------------------------------------------------->
        <div class="navbar sidebar">
            <div class="sidebar-nav">
                <ul class="nav" id="side-menu">

                    <!--------------------------------------------------------------------------------------------------------->
                    <li>
                        <a href="#" style="font-size: 15px">
                            <i class="fa fa-users" style="font-size: 20px;"></i>Usuarios<span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!!URL::to('/usuario/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar usuarios</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('/usuario')!!}"><i class='fa fa-list-ol fa-fw'></i> Ver usuarios</a>
                            </li>
                        </ul>
                    </li>

                    <!--------------------------------------------------------------------------------------------------------->
                    <li>
                        <a href="#" style="font-size: 15px">
                            <i class="fa fa-building-o fa-fw" style="font-size: 20px;"></i>Facultades<span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!!URL::to('/facultad/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar facultades</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('/facultad')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver facultades</a>
                            </li>
                        </ul>
                    </li>

                    <!--------------------------------------------------------------------------------------------------------->
                    <li>
                        <a href="#" style="font-size: 15px"><i class="fa fa-graduation-cap fa-fw" style="font-size: 20px;"></i>Escuelas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!!URL::to('/escuela/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar escuelas</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('/escuela')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver escuelas</a>
                            </li>
                        </ul>
                    </li>

                    <!--------------------------------------------------------------------------------------------------------->
                    <li>
                        <a href="#" style="font-size: 15px"><i class="fa fa-university fa-fw" style="font-size: 20px;"></i>Centros de Investigación<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!!URL::to('/centroInvestigacion/create')!!}"><i class='fa fa-plus fa-fw'></i> Agrega centro</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('/centroInvestigacion')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver centros</a>
                            </li>
                        </ul>
                    </li>

                    <!--------------------------------------------------------------------------------------------------------->
                    <li>
                        <a href="#" style="font-size: 15px"><i class="fa fa-child fa-fw" style="font-size: 20px;"></i>Página principal<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><?php $idGrupo = 1 ?>
                                <a href="{{route('grupo.edit', $parameters = $idGrupo)}}">
                                    <i class='fa fa-pencil-square-o fa-fw'></i>Modificar información
                                </a>
                            </li>

                            <li>
                                <a href="{!!URL::to('/grupo')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver Información </a>
                            </li>
                        </ul>
                    </li>
                    <!--------------------------------------------------------------------------------------------------------->
                    
                    <li>
                        <a href="#" style="font-size: 15px"><i class="fa fa-newspaper-o fa-fw" style="font-size: 20px;"></i>Noticia-Evento<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!!URL::to('/noticia/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar noticia-evento</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('/noticia')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver noticia-evento</a>
                            </li>
                        </ul>
                    </li>
                

                    <!--------------------------------------------------------------------------------------------------------->
                    <li>
                        <a href="#" style="font-size: 15px"><i class="fa fa-sitemap fa-fw" style="font-size: 20px;"></i>Semilleros de investigación<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!!URL::to('/semillero/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar semillero</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('/semillero')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver semilleros</a>
                            </li>
                        </ul>
                    </li>

                    <!--------------------------------------------------------------------------------------------------------->
                    <li>
                        <a href="#" style="font-size: 15px"><i class="fa fa-random fa-fw" style="font-size: 20px;"></i>Inscripciones<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!!URL::to('/userSemillero/create')!!}"><i class='fa fa-plus fa-fw'></i>Hacer inscripción</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('/userSemillero')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver Inscritos</a>
                            </li>
                        </ul>
                    </li>

                    <!--------------------------------------------------------------------------------------------------------->
                    <li>
                        <a href="#" style="font-size: 15px"><i class="fa fa-lightbulb-o fa-fw" style="font-size: 20px;"></i>Proyectos de investigación<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!!URL::to('/proyecto/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar proyecto</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('/proyecto')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver proyectos</a>
                            </li>
                        </ul>
                    </li>

                    <!--------------------------------------------------------------------------------------------------------->
                    <li>
                        <a href="#" style="font-size: 15px"><i class="fa fa-file-pdf-o fa-fw" style="font-size: 20px;"></i>Productividad de Proyectos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!!URL::to('/productividad/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar productividad</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('/productividad')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver productividad</a>
                            </li>
                        </ul>
                    </li>
                    <!--------------------------------------------------------------------------------------------------------->

                </ul>
            </div>
        </div>


        <!------------------------------------------------------->
        <!--             VENTANA DEL DOCENTE                   -->
        <!------------------------------------------------------->

        @elseif(Auth::user()->hasRole('researcher'))
        <nav class="navbar bg-primary margin-left" role="navigation">
            <a class="navbar navbar-brand">INFELCOM Group System</a>

            <ul class="nav navbar-top-links navbar-right" style="padding: 12px 0;">
                <li class="dropdown">
                    <a class="dropdown-toggle" style="color: #fff;" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw" style="font-size: 20px;"></i>{{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!---------------------------------------------------------------------------------------------------------------------->
        <!------------------------------ MENU DE OPCIONES DE USUSARIO DOCENTE--------------------------------------------------->
        <!---------------------------------------------------------------------------------------------------------------------->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <!-------------------------------------------------------------------------------------------------------------->
                    <li>
                        <a href="#" style="font-size: 15px"><i class="fa fa-user fa-fw"></i>Mi perfil<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('usuario.edit', $parameters = Auth::user())}}">
                                    <i class='fa fa-plus fa-fw'></i>Editar perfil
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!-------------------------------------------------------------------------------------------------------------->
                    <li>
                        <a href="#" style="font-size: 15px"><i class="fa fa-users fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!!URL::to('/usuario/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar usuarios</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('/usuario')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver usuarios</a>
                            </li>
                        </ul>
                    </li>
                    <!------------------------------------------------------------------------------------------------------------->
                    <li>
                        <a href="#" style="font-size: 15px"><i class="fa fa-sitemap fa-fw"></i>Asignar investigador a grupo<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!!URL::to('/userSemillero/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('/userSemillero')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver Grupos-Usuarios</a>
                            </li>
                        </ul>
                    </li>
                    <!------------------------------------------------------------------------------------------------------------->
                </ul>
            </div>
        </div>

        <!------------------------------------------------------->
        <!--             VENTANA DEL ESTUDIANTE                -->
        <!------------------------------------------------------->
        @else
        <nav class="navbar bg-primary margin-left" role="navigation">
            <a class="navbar navbar-brand">INFELCOM Group System</a>

            <ul class="nav navbar-top-links navbar-right" style="padding: 12px 0;">
                <li class="dropdown">
                    <a class="dropdown-toggle" style="color: #fff;" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw" style="font-size: 20px;"></i>
                        {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <!------------------------------------------------------------------------------------------------------------->
            </ul>
        </nav>


        <!---------------------------------------------------------------------------------------------------------------------->
        <!-------------   MENU DE OPCIONES DE USUARIO ESTUDANTE-----   ---------------------------------------------------------->
        <!---------------------------------------------------------------------------------------------------------------------->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <!-------------------------------------------------------------------------------------------------------------->
                    <li>
                        <a href="#" style="font-size: 15px">
                            <i class="fa fa-user fa-fw" style="font-size: 20px"></i>Perfil<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('usuario.edit', $parameters = Auth::user())}}">
                                    <i class='fa fa-plus fa-fw'></i>Editar
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!------------------------------------------------------------------------------------------------------------->

                </ul>
            </div>
        </div>

        @endif


        <div id="page-wrapper">
            @yield('content')
        </div>

    </div>




</body>
@endguest

</html> 