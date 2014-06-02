<?php
namespace App\Controller;

use \App\Model\Blog;

class BlogController extends BaseController
{

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
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

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$entry = Blog::findOrFail($id);
		return \View::make('blog.edit', ['entry' => $entry]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \View::make('blog.browse', ['entries' => Blog::mostRecent()->get()]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
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
		$entry = Blog::find($id);
		return \View::make('blog.show', ['entry' => $entry]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$entry = Blog::findOrFail($id);
		$entry->title = \Input::get('title');
		$entry->entry = \Input::get('entry');
		$entry->save();
		return \Redirect::route('blog.edit', array($entry->id));
	}

}