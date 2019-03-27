@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

@section('content')
<nav class="navbar navbar-light bg-light">
    {!! Form::open(['route'=>'semillero.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right',
    'role'=>'search']) !!}

    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de semillero']) !!}
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    {!! Form::close() !!}
</nav>
<table class="table">
    <thead>
        <th>CÓDIGO</th>
        <th>NOMBRE</th>
        <th>ESTADO</th>
        <th>OBJETIVO</th>
        <th>OPERACION</th>
    </thead>

    <tbody>
        @foreach($hotbeds as $hotbed)
        <tr>
            <td>{{$hotbed->code}}</td>
            <td>{{$hotbed->name}}</td>
            <td>{{$hotbed->status}}</td>
            <td>{{$hotbed->objective}}</td>
            <td>
                {!!link_to_route('semillero.edit', $title = 'Editar', $parameters = $hotbed, $attributes =
                ['class'=>'btn btn-primary','style'=>'color: #fff;'])!!}
            </td>
        </tr>

        @endforeach
    </tbody>

</table>
{!!$hotbeds->appends(Request::only(['name']))->render()!!}
@endsection
