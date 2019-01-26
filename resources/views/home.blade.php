@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Infelcom Group System</div>

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
                                    <th>Correo</th>
                                    <th>Documento</th>
                                    <th>Foto</th>
                                    <th>Hoja de vida</th>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td>{{Auth::user()->name}}</td>
                                        <td>{{Auth::user()->email}}</td>
                                        <td>{{Auth::user()->document}}</td>
                                        <td>{{Auth::user()->photo}}</td>
                                        <td>{{Auth::user()->cv}}</td>
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
