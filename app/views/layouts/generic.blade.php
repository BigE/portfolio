<!DOCTYPE html>
<html>
	<head>
		<base href="/" />
		<link href='http://fonts.googleapis.com/css?family=Alef:400,700' rel='stylesheet' type='text/css'>
		@section('css')
		<link rel="stylesheet" href="css/generic.css" />
		@show
		@section('js')
		<script type="text/javascript" src="{{ asset('js/generic.js') }}"></script>
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