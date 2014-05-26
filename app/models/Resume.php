<?php
namespace App\Model;

class Resume extends \Eloquent
{
	protected $table = 'resume';

	public function experience()
	{
		return $this->hasMany('\App\Model\ResumeExperience', 'resume_id', 'id');
	}

	public function owner()
	{
		return $this->hasOne('\App\Model\User', 'owner_id');
	}
}