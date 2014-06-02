@extends('layouts.generic')

@section('css')
@parent
	<link rel="stylesheet" type="text/css" href="components/x-editable-jqueryui/jqueryui-editable/css/jqueryui-editable.css" />
	<link rel="stylesheet" type="text/css" href="css/user/home.css" />
@stop

@section('js')
@parent
	<script type="text/javascript" src="components/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script type="text/javascript" src="components/x-editable-jqueryui/jqueryui-editable/js/jqueryui-editable.min.js"></script>
	<script type="text/javascript">
		console.log($('.editable').editable());
	</script>
@stop

@section('content')
	<section id="profile" class="right">
		<header>
			<h2>Profile</h2>
		</header>
		<div>
			<label for="email">E-Mail Address</label>
			<a class="editable" href="#">{{ $user->email }}</a>
		</div>
	</section>
	<section id="resumes" class="left">
		<header>
			<h2>Your Available Resumes</h2>
		</header>
		<ul class="resumes">
		@foreach ($user->resumes as $resume)
			<li>{{ link_to_route('resume.edit', $resume->title, [$resume->id]) }}</li>
		@endforeach
		</ul>
	</section>
	<section id="blog" class="left">
		<header>
			<h2>Your blog posts</h2>
		</header>
		<ul>
		@foreach ($user->posts as $post)
			<li>{{ link_to_route('blog.edit', $post->title, [$post->id]) }}</li>
		@endforeach
		</ul>
	</section>
@stop