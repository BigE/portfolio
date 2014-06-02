<?php
use \Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		if (file_exists(base_path('wp_posts.csv'))) {
			$this->call('WordpressBlogTableSeeder');
		}
	}

}