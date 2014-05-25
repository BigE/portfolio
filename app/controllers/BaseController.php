<?php
class BaseController extends \Controller
{
	/**
	 * @var User
	 */
	protected $user;

	public function __construct()
	{
		$this->user = \Auth::user();
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if (!is_null($this->layout))
		{
			$this->layout = \View::make($this->layout);
		}
	}

}