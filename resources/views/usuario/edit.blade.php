@extends('layouts.admin')
@section('content')
<div class="row align-items-center">
    <div class="col" style="padding-left: 200px;">
        <div class="card " style="width: 90rem;">
            <div class="card-header text-center">
                <nav class="navbar navbar-light bg-info">
                    <h3>EDITAR INFORMACIÓN</h3>
                </nav>
            </div>
            <div class="card-body">
                @include('alerts.request')
                @if(Auth::user()->hasRole('admin'))
                {!!Form::model($user,['route'=>['usuario.update',$user],'method'=>'PUT','files'=>true])!!}
                @include('usuario.forms.usredit')
            </div>

            <table class="table">

                <tr>
                    {!!Form::submit('Actualizar',['class'=>'btn btn-dark'])!!}
                    {!!Form::close()!!}
                </tr>
                
                <tr>
                    {!!Form::open(['route'=>['usuario.destroy', $user], 'method' => 'DELETE'])!!}
                    {!!Form::submit('Eliminar',['class'=>'btn btn-ligth'])!!}
                    {!!Form::close()!!}
                </tr>
            </table>





            @else
            {!!Form::model($user,['route'=>['usuario.update',$user],'method'=>'PUT','files'=>true])!!}
            @include('usuario.forms.usredit2')
            <div class="container text-center">
                {!!Form::submit('Actualizar',['class'=>'btn btn-dark','style'=>'color: #000;'])!!}
                {!!Form::close()!!}
                @endif
            </div>
        </div>
    </div>
</div>

</div>
@endsection 