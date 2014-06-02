<?php
namespace App\Controller\Resume;

use \App\Controller\BaseController;

class ExperienceController extends BaseController
{
	public function create()
	{
		return \View::make('resume.experience.edit');
	}
}