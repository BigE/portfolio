<?php
class BlogController extends BaseController
{
	public function browse()
	{
		$entries = Blog::all();
		return View::make('blog.browse', ['entries' => $entries]);
	}
}