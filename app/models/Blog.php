<?php
class Blog extends Eloquent
{
	protected $table = 'blog';
	protected $guarded = ['id'];

	public function author()
	{
		return $this->hasOne('User', 'id', 'author_id');
	}

	public function scopeMostRecent($query)
	{
		return $query->select('blog.*')->leftJoin('blog AS b', 'b.parent_id', '=', 'blog.id')
		             ->whereNull('blog.parent_id')
		             ->orderBy('created_at', 'desc')
		             ->limit(10);
	}

	public function htmlTitle()
	{
		return preg_replace('/[^\w\-]+/u', '-', $this->title);
	}
}