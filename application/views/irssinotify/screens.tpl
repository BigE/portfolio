<div id="description">
	<h3>IrssiNotify Screenshots</h3>
	<p>
		These are various action screenshots of IrssiNotify in action when I'm
		using and testing it. Most of them I lowered the quality of to help with
		bandwidth and loading times.
	</p>
	<p><a href="/irssinotify">Back to IrssiNotify</a></p>
</div>
<div id="mainBox">
	<h2>IrssiNotify Screenshots</h2>
<?php
$dir = new DirectoryIterator(SITECH_APP_PATH.'/../public/images/irssinotify');
foreach ($dir as $file)
{
	if ($file->isDir() || substr($file->getFilename(), 0, 6) == 'thumb_') continue;
	if (substr($file->getFilename(), strrpos($file->getFilename(), '.')) == '.jpg') {
?>
	<p><a href="/images/irssinotify/<?php echo $file->getFilename(); ?>" class="image"><img src="/images/irssinotify/thumb_<?php echo $file->getFilename(); ?>" /></a></p>
<?php
	}
}
?>
</div>