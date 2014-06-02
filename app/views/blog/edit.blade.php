@extends('layouts.generic')

@section('css')
@parent
	<link rel="stylesheet" type="text/css" href="components/froala/css/froala_editor.min.css" />
	<link rel="stylesheet" type="text/css" href="css/blog/edit.css" />
@stop

@section('js')
@parent
	<script type="text/javascript" src="components/froala/js/froala_editor.min.js"></script>
	<script type="text/javascript">
	$(function () {
		$('#entry').editable({inlineMode: false});
	});
</script>
@stop

@section('content')
	<section id="blog">
		<header>
			<h2>Edit Entry</h2>
		</header>
		{{ Form::model($entry,  array('method' => 'PUT', 'route' => array('blog.update', $entry->id))) }}
		<div>
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', null, ['size' => 80]) }}
		</div>
		<div>
			{{ Form::textarea('entry', null, array('id' => 'entry')) }}
		</div>
		<footer>
			<button type="reset">Reset</button>
			<button type="submit">Save</button>
		</footer>
		{{ Form::close() }}
	</section>
@stop