<!DOCTYPE html>
<html>
	<head>
		<base href="/" />
		<link href='http://fonts.googleapis.com/css?family=Alef:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/generic.css" />
		<title>Eric's Portfolio</title>
	</head>
	<body>
		@section('nav')
		<div id="nav">
			<a href="">Home</a>
		</div>
		@show
		<div id="content">
			@yield('content')
		</div>
	</body>
</html>