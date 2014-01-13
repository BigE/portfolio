<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('parent_id', false, true)->nullable();
			$table->integer('author_id', false, true);
			$table->integer('modified_id', false, true)->nullable();
			$table->string('title');
			$table->text('entry');
			$table->timestamps();
			$table->foreign('parent_id')->references('id')->on('blog');
			$table->foreign('author_id')->references('id')->on('users');
			$table->foreign('modified_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('blog');
	}

}
