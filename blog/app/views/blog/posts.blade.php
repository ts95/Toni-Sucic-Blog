@extends('layout')

@section('title')Posts
@stop

@section('content')

	<h1>Blog posts</h1>
	<hr>

	@if($posts->count() === 0)
		<h2>There are no posts currently.</h2>
	@endif

	@foreach($posts as $post)
		<article class="post-preview">
			<h2><a href="/blog/view/{{ $post->slug }}">{{ $post->title }}</a></h2>
			<div>{{ Markdown::parse(Str::limit($post->body, 200)) }}</div>
			<span class="post-footer text-muted">Published on
			<b>{{ date("l jS \of F Y", strtotime($post->created_at)) }}</b> by
			<b>{{ User::find($post->user_id)->name }}</b>.</span>
		</article>
		<hr>
	@endforeach

	{{ $posts->links() }}

@stop