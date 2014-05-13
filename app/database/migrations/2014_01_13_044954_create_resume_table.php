<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('owner_id', false, true);
			$table->string('title', 255);
			$table->text('objective');
			$table->timestamps();
			$table->foreign('owner_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resume');
	}

}
