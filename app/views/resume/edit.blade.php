@extends('layouts.generic')

@section('css')
@parent
	<link rel="stylesheet" type="text/css" media="screen" href="css/user/edit.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/froala_editor.min.css') }}" />
@stop

@section('js')
@parent
<script type="text/javascript" src="{{ asset('js/froala_editor.min.js') }}"></script>
<script type="text/javascript">
	$(function () {
		$('.editor.inline').editable();
		$('.editor').editable({inlineMode: false});
	});
</script>
@stop

@section('content')
	@if (isset($resume))
	{{ Form::model($resume) }}
	@else
	{{ Form::open() }}
	@endif
		<section id="header">
			<header>
				<h2>Resume Header</h2>
			</header>
			<div>
				{{ Form::label('title', Lang::get('Title')) }}
				{{ Form::text('title') }}
			</div>
		</section>
		<section id="objective">
			<header>
				<h2>Objective</h2>
			</header>
			<div>
				{{ Form::label('objective', Lang::get('Please enter your objective')) }}
				<br />
				{{ Form::textarea('objective', null, array('class' => 'editor')) }}
			</div>
		</section>
		<section id="experience">
			<header>
				<h2>Experience</h2>
			</header>
			<div>
				{{ Form::label('', Lang::get('Please list your work experience below')) }}
				<br />
				<a href="{{ URL::route('resume.experience.create', [$resume->id]) }}"><button id="experience-add"><span class="fa fa-plus"></span>Add Experience</button></a>
				@foreach ($resume->experience as $experience)
					<section class="experience">
						<header>
							<h3>{{ $experience->company_name }}</h3>
							<strong>Date</strong> {{ $experience->started }} to {{ (empty($experience->ended))? 'Current' : $experience->ended }}
							<div class="icons">
								<a href="{{ URL::route('resume.experience.edit', [$resume->id, $experience->id]) }}"><span class="fa fa-edit"></span></a>
								<a href="{{ URL::route('resume.experience.destroy', [$resume->id, $experience->id]) }}"><span class="fa fa-trash-o"></span></a>
							</div>
						</header>
						<div>
							<div class="editor inline">{{ $experience->experience }}</div>
						</div>
					</section>
				@endforeach
			</div>
		</section>
		<footer>
			<button type="reset"><span class="fa fa-refresh"></span> Reset</button>
			<button type="submit"><span class="fa fa-save"></span> Save</button>
		</footer>
	{{ Form::close() }}
@stop