<script type="text/javascript">
/*<![CDATA[*/
function galleryDemo() {
	// Display an external page using an iframe
	var src = "http://gallery.php-oop.net";
	$.modal('<iframe src="' + src + '" height="520" width="900" style="border:0">', {
		containerCss:{
			backgroundColor:"#fff",
			borderColor:"#0063dc",
			height:520, /* this height fits nicely in 1024x768 */
			padding:0,
			width:900
		},
		overlayClose:true,
		onOpen: function (dialog) {
			dialog.overlay.fadeIn('slow', function () {
				dialog.data.hide();
				dialog.container.fadeIn('slow', function () {
					dialog.data.slideDown('slow');
				});
			});
		},
		onClose: function (dialog) {
			dialog.data.fadeOut('slow', function () {
				dialog.container.hide('slow', function () {
					dialog.overlay.slideUp('slow', function () {
						$.modal.close();
					});
				});
			});
		}
	});
	return(false);
}
/*]]>*/
</script>
<style type="text/css">
#simplemodal-overlay {
	background-color: #000;
}

#simplemodal-container {
	border: 5px solid #000;
}

#simplemodal-container a.modalCloseImg {
	background:url(images/x.png) no-repeat; /* adjust url as required */
	width:25px;
	height:29px;
	display:inline;
	z-index:3200;
	position:absolute;
	top:-15px;
	right:-18px;
	cursor:pointer;
}
</style>
<!--[if lt IE 7]>
<style type='text/css'>
	#simplemodal-container a.modalCloseImg {
		background:none;
		right:-14px;
		width:22px;
		height:26px;
		filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(
			src='img/x.png', sizingMethod='scale'
		);
	}
</style>
<![endif]-->
<div id="description">
	<h3>My Gallery</h3>
	<p>This gallery is a gallery I designed for my own needs. Its nothing fancy
	but just a simple gallery to organize and display images from a specified
	folder. This gallery even works recursively to display sub-folders as well.</p>
	<p><a href="http://gallery.php-oop.net" onclick="return galleryDemo();">Gallery Demo</a><br />
	<a href="http://websvn.php-oop.net/PHP%20Projects.gallery" target="source">Browse Source</a></p>
</div>
<div id="mainBox">
	<h2>Gallery</h2>
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