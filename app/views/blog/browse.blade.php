@extends('layouts.generic')

@section('content')
	<?php foreach ($entries as $entry): ?>
		<div class="blog-entry">
			<header>
				<h2 class="title"><?=$entry->title?></h2>
				<div class="author"><a href="users/<?=$entry->author->id?>"><?=$entry->author->realname?></a></div>
			</header>
			<?=stripslashes($entry->entry);?>
			<footer>
				<div class="datetime"><?=$entry->created_at;?></div>
			</footer>
		</div>
	<?php endforeach; ?>
@stop