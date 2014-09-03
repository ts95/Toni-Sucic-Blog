@extends('layout')

@section('title')Log in
@stop

@section('content')
	<h1>Log in</h1>
	{{ Form::open(['action' => 'AuthController@login']) }}
		{{ Form::token() }}
		<div class="form-group">
			{{ Form::label('email', 'E-Mail Address') }}
			{{ Form::text('email', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', ['class' => 'form-control']) }}
		</div>
		{{ Form::submit('Log in', ['class' => 'btn btn-primary']) }}
	{{ Form::close() }}
@stop