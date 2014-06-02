<?php
use \Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->delete();
		var_dump(\App\Model\User::create(
			[
				'email' => 'example@php-oop.net',
				'username' => 'admin',
				'password' => 'password',
				'password_confirmation' => 'password'
			]
		));
	}
}