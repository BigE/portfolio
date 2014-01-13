<?php
use \Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->delete();
		User::create(
			[
				'email' => 'eric@php-oop.net',
				'password' => 'a50992fe2f86221e25b0052f80ee130f31265fdb',
				'realname' => 'Eric Gach'
			]
		);
	}
}