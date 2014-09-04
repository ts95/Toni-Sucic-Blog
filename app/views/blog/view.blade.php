@extends('layout')

@section('title'){{ $post->title }}
@stop

@section('content')
	<article class="post">
		<h1 class="post-title">{{ $post->title }}
			@if(Auth::check() and (Auth::id() === $post->user_id))
				<span><a class="btn btn-md btn-link" href="{{ URL::action('BlogController@edit', [$post->id]) }}">Edit</a></span>
			@endif
		</h1>
		<hr>
		<div class="post-body">{{ Markdown::parse($post->body) }}</div>
		<span class="post-footer text-muted">Published on
		<b>{{ date("l jS \of F Y", strtotime($post->created_at)) }}</b> by
		<b>{{ User::find($post->user_id)->name }}</b>.</span>
	</article>
@stop