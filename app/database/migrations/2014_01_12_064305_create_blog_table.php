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
		});

		if (file_exists('wp_posts.csv')) {
			$fp = fopen('wp_posts.csv', 'r');
			$headers = fgetcsv($fp);
			$old_id = [];
			while($csv = fgetcsv($fp)) {
				$csv = array_combine($headers, $csv);
				$entry = new Blog();
				$entry->author_id = $csv['post_author'];
				$entry->created_at = $csv['post_date_gmt'];
				$entry->entry = $csv['post_content'];
				$entry->title = $csv['post_title'];
				if (!empty($csv['post_modified_gmt'])) {
					$entry->updated_at = $csv['post_modified_gmt'];
				}
				if (!empty($csv['post_parent'])) {
					if (isset($old_id[$csv['post_parent']])) {
						$entry->parent_id = $old_id[$csv['post_parent']];
					}
				}
				$entry->save();

				$old_id[$csv['ID']] = $entry->id;
			}
		}
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
