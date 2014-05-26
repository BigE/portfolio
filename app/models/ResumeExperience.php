<?php
namespace App\Model;

class ResumeExperience extends \Eloquent
{
	protected $table = 'resume_experience';

	public function resume()
	{
		return $this->hasOne('\App\Model\Resume', 'id', 'resume_id');
	}
}