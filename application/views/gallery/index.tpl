<script type="text/javascript">
/*<![CDATA[*/
function galleryDemo() {
	// Display an external page using an iframe
	var src = "http://gallery.php-oop.net";
	$.modal('<iframe src="' + src + '" height="600" width="900" style="border:0">', {
		closeHTML:"",
		containerCss:{
			backgroundColor:"#fff",
			borderColor:"#0063dc",
			height:600,
			padding:0,
			width:900
		},
		overlayClose:true
	});
	return(false);
}
/*]]>*/
</script>
<style type="text/css">
#simplemodal-overlay {
	background-color: #999;
}
</style>
<div id="description">
	<h3>My Gallery</h3>
	<p>This gallery is a gallery I designed for my own needs. Its nothing fancy
	but just a simple gallery to organize and display images from a specified
	folder. This gallery even works recursively to display sub-folders as well.</p>
	<p><a href="http://gallery.php-oop.net" onclick="return galleryDemo();">Gallery Demo</a><br />
	<a href="http://websvn.php-oop.net/PHP%20Projects.gallery">Browse Source</a></p>
</div>
<div id="mainBox">
	<h2>Gallery</h2>
</div>