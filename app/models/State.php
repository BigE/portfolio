<?php
namespace App\Model;

class State extends \Eloquent
{
	public $table = 'states';

	public function zip()
	{
		$this->hasMany('\App\Model\ZipCode', 'state_id', 'id');
	}
}