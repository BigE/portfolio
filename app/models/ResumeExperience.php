<?php
class ResumeExperience extends Eloquent
{
	protected $table = 'resume_experience';

	public function resume()
	{
		return $this->hasOne('Resume', 'id', 'resume_id');
	}
}