@extends('layouts.generic')

@section('css')
@parent
	<link rel="stylesheet" type="text/css" media="screen" href="css/resume/edit.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/froala_editor.min.css" />
@stop

@section('js')
@parent
<script type="text/javascript" src="js/froala_editor.min.js"></script>
<script type="text/javascript">
	$(function () {
		$('.editor.inline').editable();
		$('.editor').editable({inlineMode: false});
	});
</script>
@stop

@section('content')
	@if (isset($experience))
	{{ Form::model($experience) }}
	@else
	{{ Form::open(array('route' => 'resume.experience.store')) }}
	@endif
	<footer>
		<button type="reset"><span class="fa fa-refresh"></span> Reset</button>
		<button type="submit"><span class="fa fa-save"></span> Save</button>
	</footer>
	{{ Form::close() }}
@stop