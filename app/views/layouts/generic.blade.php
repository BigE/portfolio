<!DOCTYPE html>
<html>
	<head>
		<base href="/" />
		<link href='http://fonts.googleapis.com/css?family=Alef:400,700' rel='stylesheet' type='text/css'>
		@section('css')
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/generic.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/froala_editor.min.css') }}" />
		@show
		@section('js')
		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		@show
		<title>Eric's Portfolio</title>
	</head>
	<body>
		<header>
			<div id="logo">
			@section('logo')
			@show
			</div>
			<div id="nav">
			@section('nav')
				{{ link_to('/', 'Home') }}
				@if (Auth::check())
				{{ link_to_route('logout', 'Logout') }}
				@else
				{{ link_to_route('login', 'Login') }}
				@endif
			@show
			</div>
		</header>
		<div id="content">
			@yield('content')
		</div>
	</body>
</html>