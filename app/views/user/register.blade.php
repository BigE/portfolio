@extends('layouts.generic')

@section('css')
@parent
	<link type="text/css" rel="stylesheet" href="components/jquery-ui/themes/cupertino/jquery-ui.min.css" />
	<link type="text/css" rel="stylesheet" href="components/jquery-passmeter/jquery.passmeter.min.css" />
	<link type="text/css" rel="stylesheet" href="css/user/register.css" />
@stop

@section('js')
@parent
	<script type="text/javascript" src="components/jquery-ui/ui/minified/jquery.ui.core.min.js"></script>
	<script type="text/javascript" src="components/jquery-ui/ui/minified/jquery.ui.widget.min.js"></script>
	<script type="text/javascript" src="components/jquery-ui/ui/minified/jquery.ui.position.min.js"></script>
	<script type="text/javascript" src="components/jquery-ui/ui/minified/jquery.ui.menu.min.js"></script>
	<script type="text/javascript" src="components/jquery-ui/ui/minified/jquery.ui.autocomplete.min.js"></script>
	<script type="text/javascript" src="components/jquery-ui/ui/minified/jquery.ui.datepicker.min.js"></script>
	<script type="text/javascript" src="components/jquery-passmeter/jquery.passmeter.min.js"></script>
	<script type="text/javascript" src="js/user/register.js"></script>
@stop

@section('content')
	{{ Form::model($user, ['route' => 'user.store']) }}
	<header>
		<h1><span class="fa fa-users"></span> User Registration</h1>
	</header>
	<section id="required">
		<header>
			<h2>Required Information</h2>
		</header>
		<div class="hide urgent">
			<strong class="error">If you can see this, do not fill it out</strong>
			<input type="text" name="email" />
		</div>
		<div>
			{{ Form::label('yur_email', 'E-Mail Address') }}
			{{ Form::text('yur_email', $user->email, [
				'class' => $errors->has('email')? 'error' : '',
				'placeholder' => 'your.name@example.com',
				'size' => '50',
				'tabindex' => 1
			]) }}
			<span class="desc">
				This will be used to sign into your account with and to recover your password if you ever lose it.
			</span>
			{{ $errors->first('email', '<span class="error">:message</span>') }}
		</div>
		<div>
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', null, [
				'class' => $errors->has('username')? 'error' : '',
				'placeholder' => 'biggie',
				'tabindex' => 2
			]) }}
			<span class="desc">Username can be used to sign in or as a display name if you do not set a real name</span>
			{{ $errors->first('username', '<span class="error">:message</span>') }}
		</div>
		<div>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', [
				'class' => $errors->has('password')? 'error' : '',
				'tabindex' => 3
			]) }}
			<span class="desc">Must be at least 8 characters long. Must also contian a number, a letter (upper &/or lower), and a symbol</span>
			{{ $errors->first('password', '<span class="error">:message</span>') }}
		</div>
		<div id="password_str">
		</div>
		<div>
			{{ Form::label('password_confirmation', 'Confirm your Password') }}
			{{ Form::password('password_confirmation', [
				'class' => $errors->has('password_confirmation')? 'error' : '',
				'tabindex' => 4
			]) }}
			<span class="desc">Confirm your password here to ensure you entered it correctly</span>
			{{ $errors->first('password_confirmation', '<span class="error">:message</span>') }}
		</div>
	</section>
	<section id="optional">
		<header>
			<h3>Optional Information</h3>
		</header>
		<div>
			{{ Form::label('realname', 'Real Name') }}
			{{ Form::text('realname', null, ['placeholder' => 'John Smith', 'tabindex' => 5]) }}
			<span class="desc">
				Your real name will only be used for display purposes in comments, entries and the resume section.
				It will never be used without your consent.
			</span>
			{{ $errors->first('realname', '<span class="error">:message</span>') }}
		</div>
		<div>
			{{ Form::label('birthday', 'Birthday') }}
			{{ Form::text('birthday', null, ['class' => 'datepicker', 'placeholder' => '1983-04-20', 'tabindex' => 6]) }}
			<span class="desc">Your birthday or age will never be publicly available unless choose for them to be</span>
			{{ $errors->first('birthday', '<span class="error">:message</span>') }}
		</div>
		<div>
			{{ Form::label('address1', 'Address 1') }}
			{{ Form::text('address1', null, ['placeholder' => '1234 Mockingbird Lane', 'size' => 50, 'tabindex' => 7]) }}
			<span class="desc">Address is used on the resume and no where else.</span>
			{{ $errors->first('address1', '<span class="error">:message</span>') }}
		</div>
		<div>
			{{ Form::label('address2', 'Address 2') }}
			{{ Form::text('address2', null, ['size' => 50, 'tabindex' => 8]) }}
			{{ $errors->first('address2', '<span class="error">:message</span>') }}
		</div>
		<div class="hide">
			{{ Form::label('citystate', 'City, State') }}
			<span id="citystate"></span>
		</div>
		<div>
			{{ Form::label('zip', 'Zip Code') }}
			{{ Form::text('zip', null, ['placeholder' => '64505', 'size' => 8, 'tabindex' => 9]) }}
			<span class="desc">
				Enter your zipcode for your address, this only displays if you use the resume feature. Your location
				will never be publicly tied to your account.
			</span>
			{{ ($errors->has('zip_id'))? '<span class="error">The zipcode you entered was not found</span>' : '' }}
		</div>
	</section>
	<footer>
		<button type="reset"><span class="fa fa-refresh"></span> Reset</button>
		<button type="submit" tabindex="10"><span class="fa fa-save"></span> Register</button>
	</footer>
	{{ Form::close() }}
@stop