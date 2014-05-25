@extends('layouts.generic')

@section('css')
@parent
<link rel="stylesheet" type="text/css" href="{{ asset('css/froala_editor.min.css') }}" />
@stop

@section('js')
@parent
<script type="text/javascript" src="{{ asset('js/froala_editor.min.js') }}"></script>
<script type="text/javascript">
	$(function () {
		$('#entry').editable({inlineMode: false});
	});
</script>
@stop

@section('content')
<section>
	<header>
		<h2>Edit Entry</h2>
	</header>
	{{ Form::model($entry) }}
	<div>
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title', null, ['size' => 80]) }}
	</div>
	<section id="editor">
		<textaera id="entry">{{ $entry->entry }}</textaera>
	</section>
		<footer>
			<button type="reset">Reset</button>
			<button type="submit">Save</button>
		</footer>
		{{ Form::close() }}
	</section>
@stop