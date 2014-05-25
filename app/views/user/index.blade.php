@extends('layouts.generic')

@section('content')
	<div id="resumes">
		<h2>Your Available Resumes</h2>
		<ul class="resumes">
		@foreach ($user->resumes as $resume)
			<li>{{ link_to_route('resume.edit', $resume->title, [$resume->id]) }}</li>
		@endforeach
		</ul>
	</div>
	<div id="blog">
		<h2>Your blog posts</h2>
		<ul>
		@foreach ($user->posts as $post)
			<li>{{ link_to_route('blog.edit', $post->title, [$post->id]) }}</li>
		@endforeach
		</ul>
	</div>
@stop