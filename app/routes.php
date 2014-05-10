<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'default', 'uses' => 'BlogController@index']);
Route::resource('blog', 'BlogController');
Route::resource('resume', 'ResumeController');
Route::resource('user', 'UserController');

Route::get('login', ['as' => 'login', function() {
	return View::make('user.login');
}]);

Route::post('login', ['as' => 'login', function() {
	$userdata = [
		'email' => Input::get('email'),
		'password' => Input::get('password')
	];

	if (Auth::attempt($userdata, ((bool)Input::get('remember', false)))) {
		return Redirect::to('user');
	} else {
		return Redirect::to('login')->with('login_errors', true);
	}
}]);

Route::group(['before' => 'auth'], function () {
	Route::get('logout', ['as' => 'logout', function() {
		Auth::logout();
		return Redirect::to('login');
	}]);
});