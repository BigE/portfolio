<script type="text/javascript">
$(document).ready(function () {
	$('#demo').click(function (e) {
		e.preventDefault();
		$.get(this.href, function (data) {
			$('<div id="dialog" />').html(data).dialog({
				close: function () {
					$(this).dialog('destroy');
				},
				height: 600,
				modal: true,
				title: 'Gallery Demo',
				width: 800
			});
		});
	});
});
</script>
<div id="description" class="ui-widget ui-widget-content ui-corner-all">
	<div class="ui-widget-header ui-corner-top"><h3>My Gallery</h3></div>
	<p>This gallery is a gallery I designed for my own needs. Its nothing fancy
	but just a simple gallery to organize and display images from a specified
	folder. This gallery even works recursively to display sub-folders as well.</p>
	<p><a href="gallery/" id="demo">Gallery Demo</a><br />
	<a href="http://websvn.php-oop.net/PHP.gallery" class="new-window">Browse Source</a></p>
</div>
<div id="box" class="ui-widget ui-widget-content ui-corner-all">
	<div class="ui-widget-header ui-corner-top"><h2>Gallery</h2></div>
	<p>
		While this gallery is a very simple peice of software, it is also quite
		advanced. The gallery itself will display thumbnails of images and video
		files for the user to open. It works recursively to show sub folders in
		the navigation menu, so any depth of folders can be opened.

		Since this gallery was created for my own personal needs, it isn't
		comparable to other professional gallery software, but it is still a
		quite powerful system. It even comes with an admin area and an install
		script to ease the use of setup and usage.
	</p>
</div>