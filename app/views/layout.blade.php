<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title') &middot; Toni Sučić</title>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	@yield('css')
</head>
<body>
	<div class="container">
		<div class="sidepane col-md-3">
			<h1 class="text-center">Toni Sučić</h1>
			<h3 class="text-center text-muted">A blog, mainly about programming.</h3>
			<hr>
			<div class="menu">
				<a href="{{ action('BlogController@posts') }}">Posts</a>
				&middot;
				<a href="{{ URL::to('/about') }}">About</a>
			</div>
		</div>

		<div class="mainpane col-md-9">
			<div class="content">
				@if(Session::get('message'))
					<div class="alert">{{ Session::get('message') }}</div>
				@endif
				@yield('content')
			</div>
		</div>
	</div>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/extensions.js') }}"></script>
	<script src="{{ asset('js/dots.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>
	@yield('js')
</body>
</html>
