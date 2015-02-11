@extends('layout')

@section('content')

<ol class="breadcrumb">
	<li><a href="{{URL::to('/')}}">Home</a></li>
	<li><a href="{{URL::to('/usuarios')}}">Usuários</a></li>
	<li>Editar usuário {{$user }}</li>
</ol>

{{ HTML::ul($errors->all()) }}


{{ Form::model($user, array('route' => array('usuarios.update', $user->user_id), 'method' => 'PUT', 'class' => 'form form-vertical' )) }}

<h1 class="page-header">
	<b>{{$user }}</b>
	<!-- ACTIONS -->
	<div class="pull-right">
		{{ HTML::linkRoute( "usuarios.create" , "Novo" , null, ['class' => 'btn btn-success' ] ) }}
		{{ HTML::linkRoute( "usuarios.destroy" , "Remover" , $user->user_id, ['data-confirm' => 'Tem certeza que deseja remover este usuário?', 'data-method' => "delete" , 'class' => 'btn btn-danger btn-remove' ] ) }}
		{{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
	</div>
	<!-- /ACTIONS -->
</h1>

</h1>

<div class="row">
	<div class="control-group col-md-2">
		{{ Form::label('user_id', 'Código') }}
		{{ Form::text('user_id', null, ['class' => 'form-control']) }}
	</div>

	<div class="control-group col-md-3">
		{{ Form::label('first_name', 'Nome') }}
		{{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Nome do usuário']) }}
	</div>

	<div class="control-group col-md-4">
		{{ Form::label('last_name', 'Sobrenome') }}
		{{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Sobrenome']) }}
	</div>
</div>

<div class="row">&nbsp;</div>
<div class="row">
	<div class="control-group col-md-3 sm">
		{{ Form::label('last_name', 'Sexo') }}
		{{ Form::select('gender' , User::$gender_list , null, ['class' => 'form-control'] ) }}
	</div>

	<div class="control-group col-md-4">
		{{ Form::label('email', 'E-mail') }}
		{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Sobrenome']) }}
	</div>

	<div class="control-group col-md-2">
		{{ Form::label('birth_date', 'Nascimento') }}
		{{ Form::text('birth_date', null, ['class' => 'form-control date', 'placeholder' => 'Data de Nascimento']) }}
	</div>

</div>

<div class="row">&nbsp;</div>
<div class="row">
	<div class="control-group col-md-4">
		{{ Form::label('password', 'Senha') }}
		{{ Form::password('password', ['class' => 'form-control', 'placeholder' => '******']) }}
	</div>
</div>


<p>
<br>
<br>
<hr>
<i class="glyphicon glyphicon-time"></i>
Criado em: {{ $user->created_at }} | Modificado em: {{ $user->updated_at }}
</p>

{{ Form::token() }}
@stop