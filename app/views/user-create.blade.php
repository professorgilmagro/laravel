@extends('layout')

@section('content')

<ol class="breadcrumb">
	<li><a href="{{URL::to('/')}}">Home</a></li>
	<li><a href="{{URL::to('/usuarios')}}">Usuários</a></li>
	<li>Novo usuário</li>
</ol>

<div class="info alert">
{{ HTML::ul($errors->all()) }}
</div>

{{ Form::open(array('url' => 'usuarios')) }}


<h1 class="page-header">
	Novo usuário
	<!-- ACTIONS -->
	<div class="pull-right">
		<input class="btn btn-primary" type="submit" value="Salvar">
	</div>
	<!-- /ACTIONS -->
</h1>

</h1>

<div class="row">
	<div class="control-group col-md-2">
		{{ Form::label('user_id', 'Código') }}
		{{ Form::text('user_id', null, ['class' => 'form-control','disabled' => true ]) }}
	</div>

	<div class="control-group col-md-3">
		{{ Form::label('first_name', 'Nome') }}
		{{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Digite o primeiro nome']) }}
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
		{{ Form::text('birth_date', null, ['class' => 'form-control date']) }}
	</div>
</div>

{{ Form::token() }}
@stop