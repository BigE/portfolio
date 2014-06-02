<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStates extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('states', function(Blueprint $table)
		{
			$table->unsignedInteger('id', true);
			$table->string('short', 10);
			$table->string('long', 150);
			$table->unsignedInteger('country_id');
			$table->index('country_id', 'country_id');
			$table->foreign('country_id', 'fk_country_id')->references('id')->on('country');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('states', function (Blueprint $table) {
			$table->dropForeign('fk_country_id');
			$table->dropIndex('country_id');
		});

		Schema::drop('states');
	}

}
