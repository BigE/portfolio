<?php
class Resume extends Eloquent
{
	protected $table = 'resume';

	public function experience()
	{
		return $this->hasMany('ResumeExperience', 'resume_id', 'id');
	}
}