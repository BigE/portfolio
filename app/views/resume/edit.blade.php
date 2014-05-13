@extends('layouts.generic')

@section('css')
@parent
	<link rel="stylesheet" type="text/css" media="screen" href="css/user/edit.css" />
@stop

@section('content')
	@if (isset($resume))
	{{ Form::model($resume) }}
	@else
	{{ Form::open() }}
	@endif
		<div>
			{{ Form::label('title', Lang::get('Resume Title')) }}
			{{ Form::text('title') }}
		</div>
		<div>
			{{ Form::label('objective', Lang::get('Please enter your objective')) }}
			<br />
			{{ Form::textarea('objective') }}
		</div>
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
						{{ $experience->experience }}
					</div>
				</section>
			@endforeach
		</div>
	{{ Form::close() }}
@stop