<?php
namespace App\Controller;

use \App\Model\Resume;

class ResumeController extends BaseController
{

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('resume.edit');
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

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$resume = Resume::findOrFail($id);
		return \View::make('resume.edit', ['resume' => $resume]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$resume = new Resume();
		$resume->owner_id = $this->user->id;
		$resume->title = \Input::get('title');
		$resume->objective = \Input::get('objective');
		$resume->save();
		return \Redirect::route('resume.edit', array($resume->id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$resume = Resume::findOrFail($id);
		$resume->title = \Input::get('title');
		$resume->objective = \Input::get('objective');
		$resume->save();
		return Redirect::route('resume.edit', array($resume->id));
	}

}