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

    <title>INFELCOM MANAGER</title>
</head>
@guest
<?php echo Redirect::to(route('login')) ?>
@else
<body>

    <div id="wrapper">


        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Infelcom Group System</a>
            </div>

            @if(Auth::user()->hasRole('admin'))
            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">                    
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-child fa-fw"></i>INFELCOM<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">                                                    
                                <li><?php $idGrupo=1 ?>
                                    <a href="{{route('grupo.edit', $parameters = $idGrupo)}}"> 
                                        <i class='fa fa-pencil-square-o fa-fw'>Modificar información</i>
                                    </a>
                                </li>                                                        

                                <li>
                                    <a href="{!!URL::to('/grupo')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver Información de Infelcom</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-newspaper-o fa-fw"></i>Noticia-Evento<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/noticia/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/noticia')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver Noticias-Eventos</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/usuario/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                     <a href="{!!URL::to('/usuario')!!}"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a>
                                </li>                                
                            </ul>
                        </li>
            

                        <li>
                            <a href="#"><i class="fa fa-building-o fa-fw"></i>Facultades<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/facultad/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/facultad')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver Facultades</a>
                                </li>
                            </ul>
                        </li>
                        

                        <li>
                            <a href="#"><i class="fa fa-graduation-cap fa-fw"></i>Escuelas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/escuela/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/escuela')!!}"><i class='fa fa-list-ol fa-fw'></i>Escuelas</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-university fa-fw"></i>Centro de Investigación<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/centroInvestigacion/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/centroInvestigacion')!!}"><i class='fa fa-list-ol fa-fw'></i>Centros</a>
                                </li>
                            </ul>
                        </li>

                        

                                            
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Semilleros de investigación<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/semillero/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/semillero')!!}"><i class='fa fa-list-ol fa-fw'></i>Semilleros</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-random fa-fw"></i>Inscripción Usuario-Semillero<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/userSemillero/create')!!}"><i class='fa fa-plus fa-fw'></i> Inscribir</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/userSemillero')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver Inscritos</a>
                                </li>
                            </ul>
                        </li> 

                        <li>
                            <a href="#"><i class="fa fa-lightbulb-o fa-fw"></i>Proyecto de investigación<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/proyecto/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/proyecto')!!}"><i class='fa fa-list-ol fa-fw'></i>Proyecto</a>
                                </li>
                            </ul>
                        </li> 

                        <li>
                            <a href="#"><i class="fa fa-file-pdf-o fa-fw"></i>Productividad de Proyectos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/productividad/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/productividad')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver</a>
                                </li>
                            </ul>
                        </li>                     
                    </ul>
                </div>
            </div>
            @elseif(Auth::user()->hasRole('researcher'))
                <ul class="nav navbar-top-links navbar-right">
                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li class="divider"></li>
                            <li><a href="{{route('logout')}}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> Perfil<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                       <a href="{{route('usuario.edit', $parameters = Auth::user())}}"> 
                                        <i class='fa fa-plus fa-fw'>Editar</i>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/usuario/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                     <a href="{!!URL::to('/usuario')!!}"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Relacionar Grupo e Investigador<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/userSemillero/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/userSemillero')!!}"><i class='fa fa-list-ol fa-fw'></i>Ver Grupos-Usuarios</a>
                                </li>
                            </ul>
                        </li>
                        </ul>
                    </div>
                </div>
            @else
                <ul class="nav navbar-top-links navbar-right">
                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li class="divider"></li>
                            <li><a href="{{route('logout')}}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i>Perfil<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                       <a href="{{route('usuario.edit', $parameters = Auth::user())}}"> 
                                        <i class='fa fa-plus fa-fw'>Editar</i>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            @endif
            

            
     </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>

    </div>



     
</body>
@endguest

</html>