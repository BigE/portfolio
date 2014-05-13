<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeExperienceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume_experience', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('resume_id', false, true);
			$table->string('company_name', 255);
			$table->date('started');
			$table->date('ended')->nullable();
			$table->text('experience');
			$table->timestamps();
			$table->foreign('resume_id')->references('id')->on('resume');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resume_experience');
	}

}
