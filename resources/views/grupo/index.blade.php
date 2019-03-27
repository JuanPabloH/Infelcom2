@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

@section('content')
<h2>INFELCOM</h2>
<table class="table">
    <thead></thead>
    <thead>
        <th>CLASIFICACIÓN</th>
        <th>NOBBRE</th>
        <th>FECHA DE CREACIÓN</th>
        <th>CORREO</th>
        <th>ACRÓNIMO</th>
        <th>SITIO WEB</th>
        <th>OBJETIVO</th>
        <th>MISIÓN</th>
        <th>VISIÓN</th>
        <th>PLAN DE TRABAJO</th>
    </thead>

    <tbody>
        @foreach($groups as $group)
        <tr>
            <td>{{$group->classification}}</td>
            <td>{{$group->name}}</td>
            <td>{{$group->creationDate}}</td>
            <td>{{$group->email}}</td>
            <td>{{$group->acronym}}</td>
            <td>{{$group->website}}</td>
            <td>{{$group->objective}}</td>
            <td>{{$group->mision}}</td>
            <td>{{$group->vision}}</td>
            <td>{{$group->workplan}}</td>
        </tr>

        @endforeach
    </tbody>
    <tr></tr>

</table>
<div class="container text-center">
    <nav class="navbar navbar-light bg-info">
        <h3>AREAS DE INVESTIGACIÓN DEL GRUPO</h3>
    </nav>
    
    {!!link_to_route('areaGrupo.create', $title = 'Agregar area de investigación al grupo', $parameters = '', $attributes = ['class'=>'btn btn-info'])!!}
    {!!link_to_route('areaInvestigacion.create', $title = 'Crear nueva area de investigación', $parameters = '', $attributes = ['class'=>'btn btn-info'])!!}
    <br>
    <table class="table">
        @foreach($area_grupos as $area_grupo)
        <tbody>
            @foreach($areas as $area)
            @if($area_grupo->id_area==$area->id)
            <tr>
                <td>{{$area->name}}</td>
                <td>
                    {!!Form::open(['route'=>['areaGrupo.destroy', $area_grupo], 'method' => 'DELETE'])!!}
                    {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                    {!!Form::close()!!}
                </td>
            </tr>


            @endif
            @endforeach
        </tbody>
        <tr></tr>
        @endforeach
    </table>
</div>


<div class="container text-center">
    <nav class="navbar navbar-light bg-info">
        <h3>LINEAS DE INVESTIGACIÓN</h3>
    </nav>

    {!!link_to_route('grupoLinea.create', $title = 'Agregar area de investigación al grupo', $parameters = '', $attributes = ['class'=>'btn btn-info'])!!}
    {!!link_to_route('lineaInvestigacion.create', $title = 'Crear nueva area de investigación', $parameters = '', $attributes = ['class'=>'btn btn-info'])!!}
    <br>
    <table class="table">
        @foreach($group_lines as $group_line)
        <tbody>
            @foreach($lines as $line)
            @if($group_line->id_line==$line->id)
            <tr>
                <td>{{$line->name}}</td>
                <td>
                    {!!Form::open(['route'=>['grupoLinea.destroy', $group_line], 'method' => 'DELETE'])!!}
                    {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                    {!!Form::close()!!}
                </td>
            </tr>


            @endif
            @endforeach
        </tbody>
        <tr></tr>
        @endforeach
    </table>
</div>





@endsection 
