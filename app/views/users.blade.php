@extends('layout')

@section('content')


<ol class="breadcrumb">
	<li><a href="{{URL::to('/')}}">Home</a></li>
	<li>Usuários</li>
</ol>

@if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif


<h1 class="page-header">
Usuários

<!-- ACTIONS -->
<div class="pull-right">
	<a href="{{URL::to('usuarios/create')}}" class="btn btn-success">Novo</a>
</div>
<!-- /ACTIONS -->
</h1>

{{ Form::open(['method' =>'GET','url'=>action('UserController@index')]) }}
	<div class="input-group">
		{{ Form::text( 'text' , Input::get('text'), ['class' => 'form-control' , 'placeholder' => 'Quem você procura?'] ) }}
		<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span> </span>
	</div>
{{Form::close()}}

<div class="table-responsive">
<br>
{{$users->links()}}
<table class="table small table-bordered table-striped table-hover" id="table-list">
<thead>
	<tr>
		<th>Nome</th>
		<th>Sexo</th>
		<th>Nascimento</th>
		<th>E-mail</th>
		<th>Criação</th>
		<th>Modificação</th>
	</tr>
</thead>
<tbody>
    @foreach( $users as $user )
    	<tr>
		    <td><a href="usuarios/{{$user->user_id}}/edit">{{ $user->first_name }} {{ $user->last_name }}</a></td>
		    <td>{{ $user->gender }}</td>
		    <td>{{ $user->birth_date }}</td>
		    <td>{{ $user->email }}</td>
		    <td>{{ $user->created_at }}</td>
		    <td>{{ $user->updated_at }}</td>
	    </tr>
    @endforeach
	</tbody>
</table>
{{$users->links()}}
</div>
@stop
