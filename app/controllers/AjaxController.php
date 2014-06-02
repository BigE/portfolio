<?php
namespace App\Controller;

use \App\Model\ZipCode;

class AjaxController extends BaseController
{
	public function zip($zipcode, $limit = 10)
	{
		$zips = ZipCode::where('zip', 'LIKE', $zipcode.'%')->limit($limit)->with('state')->get();
		return \Response::json($zips);
	}
}