@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">
            <div class="conatiner text-center">
                <h1 style="color:  #1565C0;">BIENVENIDO A INFELCOM GROUP SYSTEM</h1>
            </div>
        </div>
        <div class="col-sm">
            <div class="container text-center">
                <video src="img/infelcomlogo.m4v" autoplay muted loop width="550" height="300 " type="video/mp4"></video>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">
            .
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">
            <div class="card-header text-center">
                @if(Auth::user()->hasRole('admin'))
                <h3>TIPO DE USUARIO</h3>
                <h4>Administrador</h4>
                @elseif(Auth::user()->hasRole('researcher'))
                <h3>TIPO DE USUARIO</h3>
                <h4>Docente investigador</h4>
                @elseif(Auth::user()->hasRole('user'))
                <h3>TIPO DE USUARIO</h3>
                <h4>Estudiante investigador</h4>
                @endif
                <h1></h1>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(Auth::user()->hasRole('admin'))
                    <div>Puede realizar todas las funciones</div>
                    @else
                    <div>

                        <table class="table">
                            <thead>
                                <th>NOMBRES</th>
                                <th>APELLIDOS</th>
                                <th>FOTO</th>
                                <th>CORREO</th>
                                <th>DOCUMENTO DE DENTIDAD</th>
                                <th>HOJA DE VIDA</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{Auth::user()->name}}</td>
                                    <td>{{Auth::user()->last_name}}</td>
                                    <td>
                                        @if(Auth::user()->photo)
                                        <?php 
                                        $photo = Auth::user()->photo;
                                        ?>
                                        <img width="100px" src=" {{ url("/usuario/images/$photo") }} ">
                                        @else
                                        <img width="100px" src=" {{ url("/usuario/images/default.png") }} ">
                                        @endif
                                    </td>
                                    <td>{{Auth::user()->email}}</td>
                                    <td>{{Auth::user()->document}}</td>
                                    <td><a href="{{Auth::user()->cv}}" target="_blank">Ver hoja de vida</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-sm">

        </div>
    </div>
</div>

@endsection 