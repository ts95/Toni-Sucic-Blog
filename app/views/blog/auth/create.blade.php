@extends('layout')

@section('title')New post
@stop

@section('content')
	<h1>New post</h1>
	{{ Form::open(['action' => 'BlogController@create']) }}
		{{ Form::token() }}
		<div class="form-group">	
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) }}
		</div>
		<div class="form-group">
			{{ Form::label('body', 'Body') }}
			{{ Form::textarea('body', null, ['class' => 'form-control', 'size' => '50x15']) }}
		</div>
		{{ Form::submit('Publish', ['class' => 'btn btn-primary']) }}
	{{ Form::close() }}
@stop

@section('js')
<script>
	$(function() {
		window.dotsGenerator.stop();
	});
</script>
@stop