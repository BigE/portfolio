<?php
$jsLibs = array('jquery.simplemodal-1.3.min.js');
?>
<script type="text/javascript">
/*<![CDATA[*/
$(document).ready(function (){
	$('a.image').click(function () {
		// Display an external page using an iframe
		var src = $(this).attr('href');
		var size = $(this).attr('id').split(',');
		$.modal('<a href="' + src + '" target="new"><img src="' + src + '" width="' + size[1] + '" height="' + size[0] + '" style="border:0"></a>', {
			containerCss:{
				backgroundColor:"#fff",
				borderColor:"#0063dc",
				height:size[0]+'px',
				padding:0,
				width:size[1]+'px'
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
						dialog.overlay.slideUp('fast', function () {
							$.modal.close();
						});
					});
				});
			}
		});
		return(false);
	});
});
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
		$img = getimagesize($file->getRealPath());
		$width = 800;
		$height = $img[1] / ($img[0] / $width);
?>
	<p><a href="/images/irssinotify/<?php echo $file->getFilename(); ?>" class="image" target="new" id="<?php echo $height.','.$width; ?>"><img src="/images/irssinotify/thumb_<?php echo $file->getFilename(); ?>" /></a></p>
<?php
	}
}
?>
</div>