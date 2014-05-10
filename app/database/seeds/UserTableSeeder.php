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
				'password' => '$2y$10$1I80dMhYwXchtapBUGhlPuBfWotFGP.M8Abb8UQbJoZrDwtBlx6tG',
				'realname' => 'Eric Gach'
			]
		);
	}
}