<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableZipcodes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('zipcodes', function(Blueprint $table)
		{
			$table->unsignedInteger('id', true);
			$table->string('zip', 10);
			$table->string('city', 50);
			$table->unsignedInteger('state_id');
			$table->index('state_id', 'state_id');
			$table->foreign('state_id', 'fk_state_id')->references('id')->on('states');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('zipcodes', function (Blueprint $table) {
			$table->dropForeign('fk_state_id');
			$table->dropIndex('state_id');
		});

		Schema::drop('zipcodes');
	}

}
