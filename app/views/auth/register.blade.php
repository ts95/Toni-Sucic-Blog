@extends('layout')

@section('title')Register
@stop

@section('content')
	<h1>Register</h1>
	{{ Form::open(['action' => 'AuthController@register']) }}
		{{ Form::token() }}
		<div class="form-group">
		{{ Form::label('email', 'E-Mail Address') }}
		{{ Form::text('email', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		{{ Form::label('name', 'Full name') }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
		{{ Form::label('repeat-password', 'Repeat password') }}
		{{ Form::password('repeat-password', ['class' => 'form-control']) }}
		</div>
		{{ Form::submit('Register', ['class' => 'btn btn-primary']) }}
	{{ Form::close() }}
@stop