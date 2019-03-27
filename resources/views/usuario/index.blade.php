@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

@section('content')
<br>
<nav class="navbar navbar-light bg-light">
    {!! Form::open(['route'=>'usuario.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right', 'role'=>'search']) !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de usuario']) !!}
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    {!! Form::close() !!}
</nav>
<table class="table">
    <thead>
        <th>NOMBRES</th>
        <th>APELLIDOS</th>
        <th>FOTO</th>
        <th>CORREO</th>
        <th>DOCUMENTO</th>
        <th>HOJA DE VIDA</th>
        <th>OPERACIÓN</th>
    </thead>

    <tbody>
        @foreach($users as $user)
        @if(!$user->hasRole('admin'))

        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->last_name}}</td>
            <td>
                @if($user->photo)
                <img width="100px" src=" {{ url("/usuario/images/$user->photo") }} ">
                @else
                <img width="100px" src=" {{ url("/usuario/images/default.png") }} ">
                @endif
            </td>
            <td>{{$user->email}}</td>
            <td>{{$user->document}}</td>
            <td><a href="{{$user->cv}}" target="_blank">Ver hoja de vida</a></td>
            <td>
                {!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user, $attributes = ['class'=>'btn btn-primary','style'=>'color: #fff;'])!!}
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>

</table>
{!!$users->appends(Request::only(['name']))->render()!!}
@endsection 
