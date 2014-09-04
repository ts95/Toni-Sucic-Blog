@extends('layout')

@section('title')New post
@stop

@section('content')
	<h1>Edit post</h1>
	{{ Form::open(['action' => ['BlogController@edit', $post->id]]) }}
		{{ Form::token() }}
		<div class="form-group">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', $post->title, ['class' => 'form-control', 'autofocus' => 'autofocus']) }}
		</div>
		<div class="form-group">
			{{ Form::label('slug', 'Slug') }}
			{{ Form::text('slug', $post->slug, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('body', 'Body') }}
			{{ Form::textarea('body', $post->body, ['class' => 'form-control', 'size' => '50x15']) }}
		</div>
		<a class="btn btn-default" href="{{ URL::action('BlogController@view', $post->slug) }}">Back</a>
		<a class="btn btn-danger" href="{{ URL::action('BlogController@delete', $post->id) }}">Delete</a> 
		{{ Form::submit('Publish changes', ['class' => 'btn btn-primary']) }}
	{{ Form::close() }}
@stop

@section('js')
<script>
	$(function() {
		window.dotGenerator.stop();
	});
</script>
@stop