@extends('layout')

@section('content')
<div class="span12">

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


{{ Form::open(array('url' => 'foo/bar', 'files' => true)) }}
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
	    	<tr>
			    <td>{{ $user->firt_name }} {{ $user->last_name }}</td>
			    <td>{{ $user->gender }}</td>
			    <td>{{ $user->birth_date }}</td>
			    <td>{{ $user->email }}</td>
			    <td>{{ $user->created_at }}</td>
			    <td>{{ $user->updated_at }}</td>
		    </tr>
		</tbody>
	</table>
	{{ Form::label('email', 'E-Mail Address') }}
	{{ Form::text('email' , $user->email ); }}
{{ Form::close() }}
</div>
@stop