<?php
namespace App\Model;

class ZipCode extends \Eloquent
{
	public $table = 'zipcodes';

	public function state()
	{
		return $this->hasOne('\App\Model\State', 'id', 'state_id');
	}
}