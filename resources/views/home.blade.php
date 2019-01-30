@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>Infelcom Group System</h1>
                @if(Auth::user()->hasRole('admin'))
                    <h4>Miembro Administrador</h4>
                @elseif(Auth::user()->hasRole('researcher'))
                    <h4>Miembro Investigador</h4>
                @elseif(Auth::user()->hasRole('user'))
                    <h4>Miembro Estudiante</h4>
                @endif
                <h1></h1>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        @if(Auth::user()->hasRole('admin'))
                        <div>Bienvenido Administrador</div>
                        @else
                        <div>
                            <table class="table">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Foto</th>
                                    <th>Correo</th>
                                    <th>Documento</th>                                    
                                    <th>Hoja de vida</th>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td>{{Auth::user()->name}}</td>
                                        <td>{{Auth::user()->last_name}}</td>
                                        <td>                                        
                                            @if(Auth::user()->photo)
                                            <?php 
                                            $photo=Auth::user()->photo;
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
    </div>
</div>
@endsection
