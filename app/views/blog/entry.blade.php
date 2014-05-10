		<div class="blog-entry">
			<header>
				<h2 class="title"><a href="blog/<?=$entry->id?>-<?=$entry->htmlTitle()?>.html"><?=$entry->title?></a></h2>
				<div class="author"><a href="user/<?=$entry->author->id?>-<?=$entry->author->htmlName()?>.html"><?=$entry->author->realname?></a></div>
			</header>
			<section class="entry">
				<?=stripslashes($entry->entry);?>
			</section>
			<footer>
				<div class="datetime"><?=$entry->created_at;?></div>
			</footer>
		</div>