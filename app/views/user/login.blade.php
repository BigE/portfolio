@extends('layouts.generic')

@section('content')
    {{ Form::open([
		'route'         => 'login',
        'autocomplete'  => 'off'
	]) }}
		{{ Form::label('email', 'E-Mail') }}
		{{ Form::text('email', Input::get('email'), [
			'placeholder' => 'john.smith@gmail.com'
		]) }}
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}
		{{ Form::label('remember', 'Stay Logged In') }}
		{{ Form::checkbox('remember') }}
		@if (Session::has('login_errors'))
			<div class="error">
				Username and/or password invalid.
			</div>
		@endif
		{{ Form::submit('login') }}
	{{ Form::close() }}
@stop