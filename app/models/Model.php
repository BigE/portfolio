<?php
namespace App\Model;

abstract class Model extends \Eloquent
{
	protected $errors;

	protected static $rules = [];

	public static function boot()
	{
		parent::boot();
		static::saving(function (Model $model) {
			if (!$model->isValid()) {
				return false;
			}
		});
	}

	public function hasErrors()
	{
		return ! empty($this->errors);
	}

	public function getErrors()
	{
		return $this->errors;
	}

	public function isValid()
	{
		if (($v = \Validator::make(
			$this->attributes,
			static::$rules
		)) && $v->passes()) {
			return true;
		}

		$this->errors = $v->messages();
		return false;
	}
}