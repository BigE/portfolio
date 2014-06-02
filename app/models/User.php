<?php
namespace App\Model;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Model implements UserInterface, RemindableInterface
{
	protected $guarded = ['id'];

	protected static $rules = [
		'address1' => 'max:250',
		'address2' => 'max:250',
		'birthday' => 'date_format:Y-m-d',
		'email' => 'required|email|unique:users',
		'password' => 'required|min:8|confirmed',
		'password_confirmation' => 'required|min:8|same:password',
		'realname' => 'regex:/^[\w\s]+$/i|max:150',
		'username' => 'required|alpha_dash|between:4,50|unique:users',
		'zip_id' => 'numeric',
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function htmlName()
	{
		return strtolower(preg_replace('/[^\w\-]+/u', '-', $this->realname));
	}

	public function posts()
	{
		return $this->hasMany('\App\Model\Blog', 'author_id');
	}

	public function resumes()
	{
		return $this->hasMany('\App\Model\Resume', 'owner_id');
	}

	public static function boot()
	{
		parent::boot();
		static::saving(function (User $user) {
			if (isset($user->password)) {
				$user->password = \Hash::make($user->password);
			}

			if (isset($user->password_confirmation)) {
				unset($user->password_confirmation);
			}
		});
	}
}