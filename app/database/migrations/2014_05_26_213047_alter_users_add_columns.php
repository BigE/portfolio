<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersAddColumns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('username', 50)->after('email');
			$table->date('birthday')->after('realname')->nullable();
			$table->string('address1', 255)->after('birthday')->nullable();
			$table->string('address2', 255)->after('address1')->nullable();
			$table->unsignedInteger('zip_id')->nullable()->after('address2');
			$table->unique('username', 'username');
			$table->index('zip_id', 'zip_id');
			$table->foreign('zip_id', 'fk_zip_id')->references('id')->on('zipcodes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropForeign('fk_zip_id');
			$table->dropIndex('zip_id');
			$table->dropUnique('username');
			$table->dropColumn(['username','birthday', 'address1', 'address2', 'zip_id']);
		});
	}

}
