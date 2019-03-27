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
    <?php $group = App\Group::find(1) ?>
    <?php $group_lines = App\Group_Line::all() ?>
    <!-- /Hero -->

    <!-- Header -->
    <header id="header">
        <div class="container">
            <div id="logo" class="pull-left">
                <a href="index.html"><img src="img/LogoInfelcom.jpg" alt="" title="" /></img></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                </ul>
            </nav>


            <nav class="nav social-nav pull-right d-none d-lg-inline">
                <a href=".">
                    <i class="fa fa-home" style="font-size: 30px;" href="."></i>
                    Home
                </a>
            </nav>
        </div>
    </header>
    <!-- #header -->

    <!-- Team -->

    <section class="team" id="team">
        <div class="container">
            <h2 class="text-center">
                ESTUDIANTES INVESTIGADORES
            </h2>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                    </div>
                    <div class="col-sm">
                        {!! Form::open(['route'=>'index.index','method'=>'GET','class'=>'navbar-form ',
                        'role'=>'search']) !!}
                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de estudiante']) !!}
                        <div class="container text-center">
                            <button class="btn" style="margin: 16px;" type="submit">BUSCAR</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-sm">
                    </div>
                </div>
            </div>


            <div class="row">
                @foreach($users as $user)
                @if($user->hasRole('user'))
                <div class="col-sm-3 col-xs-6">

                    <div class="container text-center">
                        <div class="card card-block">
                            @if($user->photo)
                            <img width="50px" height="200px" src=" {{ url("/usuario/images/$user->photo") }} ">
                            @else
                            <img width="50px" height="200px" src=" {{ url("/usuario/images/default.png") }} ">
                            @endif
                            <div class="card-title-wrap">
                                <span class="card-title">{{$user->name}} {{$user->last_name}}</span>
                            </div>
                            <div class="team-over">
                                <h4 class="hidden-md-down">
                                    Contacto:
                                </h4>
                                <p>{{$user->email}}</p>
                                <nav class="social-nav">
                                    @if($user->cv)
                                    <a href="{{$user->cv}}" target="_blanc">CvLac</a>
                                    @endif
                                </nav>
                            </div>
                            </a>
                        </div>
                    </div>

                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Team -->
    {!!$users->appends(Request::only(['name']))->render()!!}
    <!--  footer -->

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
