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

	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	@yield('css')
</head>
<body>
	<div class="container">
		<div class="sidepane col-md-3">
			<h1 class="text-center">Toni Sučić</h1>
			<h3 class="text-center text-muted">A blog, mainly about programming.</h3>
			<hr>
			<div class="menu">
				<a href="{{ URL::action('BlogController@posts') }}">Posts</a>
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

	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script>
	/*!
 	 * IE10 viewport hack for Surface/desktop Windows 8 bug
	 * Copyright 2014 Twitter, Inc.
	 * Licensed under the Creative Commons Attribution 3.0 Unported License. For
	 * details, see http://creativecommons.org/licenses/by/3.0/.
	 */

	// See the Getting Started docs for more information:
	// http://getbootstrap.com/getting-started/#support-ie10-width

	(function () {
	  'use strict';
	  if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
	    var msViewportStyle = document.createElement('style')
	    msViewportStyle.appendChild(
	      document.createTextNode(
	        '@-ms-viewport{width:auto!important}'
	      )
	    )
	    document.querySelector('head').appendChild(msViewportStyle)
	  }
	})();
	</script>
	<script src="/js/extensions.js"></script>
	<script src="/js/dots.js"></script>
	<script src="/js/script.js"></script>
	@yield('js')
</body>
</html>
