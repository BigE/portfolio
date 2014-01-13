<?php
use \Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('blog')->delete();

		if (file_exists('wp_posts.csv')) {
			$fp = fopen('wp_posts.csv', 'r');
			$headers = fgetcsv($fp);
			$old_id = [];
			while($csv = fgetcsv($fp)) {
				$csv = array_combine($headers, $csv);
				var_dump($csv);
				if ($csv['post_type'] === 'post') {
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
	}
}