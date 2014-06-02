<?php
namespace App\Controller;

use \App\Model\User;
use \App\Model\ZipCode;
use Illuminate\Support\MessageBag;

class UserController extends BaseController
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = $this->user->with('resumes')->with(array(
			'posts' => function ($query) {
				$query->orderBy('created_at', 'DESC');
			}
		))->first();
		return \View::make('user.index', ['user' => $user]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('user.register', [
			'errors' => \Session::get('errors', new MessageBag()),
			'user' => \Session::get('user', new User())
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// honeypot
		if (\Input::has('email'))
			exit;

		$user = new User(\Input::all());
		if (isset($user->yur_email)) {
			$user->email = $user->yur_email;
			unset($user->yur_email);
		}

		if (isset($user->zip)) {
			if (!empty($user->zip)) {
				if (($zipcode = ZipCode::where('zip', '=', $user->zip)->first())) {
					$user->zip_id = $zipcode->id;
				} else {
					$user->zip_id = false;
				}
			}

			unset($user->zip);
		}

		if (!$user->save()) {
			return \Redirect::back()->with(['errors' => $user->getErrors(), 'user' => $user]);
		}

		return \Redirect::route('login');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return \View::make('user.show', ['user' => User::find($id)]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}