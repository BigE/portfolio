<script type="text/javascript">
$(document).ready(function () {
	$('.dialog').click(function (event) {
		if (event.ctrlKey) return(true);
		event.preventDefault();
		var image = new Image();
		image.onload = function () {
			$(this).resizeImage();
		}
		image.src = this.href;
		$('<div id="image-dialog"><div id="image-box" /></div>').dialog({
			autoOpen: false,
			height: 'auto',
			modal: true,
			position: 'center',
			width: 'auto'
		});
	});
});

/**
 * Pulled from my gallery software...
 */
(function( $ ){
$.fn.resizeImage = function () {
	var image = this[0];
	var x = $(window).width() - 100;
	var y = $(window).height() - 150;
	var imgWidth = image.width;
	var imgHeight = image.height;
	if (imgWidth > x) {
		imgHeight = imgHeight * (x / imgWidth);
		imgWidth = x;
		if (imgHeight > y) {
			imgWidth = imgWidth * (y / imgHeight);
			imgHeight = y;
		}
	} else if (imgHeight > y) {
		imgWidth = imgWidth * (y / imgHeight);
		imgHeight = y;
		if (imgWidth > x) {
			imgHeight = imgHeight / (x / imgWidth);
			imgWidht = x;
		}
	}

	$(image).width(imgWidth);
	$(image).height(imgHeight);
	setTimeout(function () {
		$('#image-box').html(image);
		//$('#image-dialog #full-image').show();
		$('#image-dialog').dialog('open').dialog('option', 'position', 'center');
	}, 100);
};
})( jQuery );
</script>
				<div id="description">
					<div class="box ui-widget ui-widget-content ui-corner-all">
						<div  class="ui-widget-header ui-corner-top">
							<h3>About IrssiNotify</h3>
						</div>
						<p>
							IrssiNotify is based on the <a href="http://irssi.org/">irssi</a> IRC
							client and the <a href="http://irssi.org/documentation/proxy">irssi-proxy
								plugin</a> used with the client. The purpose behind it is to add a simple
								popup notification when a highlight is triggered for Windows users
								who use irssi.
						</p>
					</div>
				</div>
				<div id="box" class="ui-widget ui-widget-content ui-corner-all">
					<div class="ui-widget-header ui-corner-top">
						<h2>IrssiNotify</h2>
					</div>
					<p>
						Written in C#, this application is primarily focused for Windows users
						who use PuTTY or similar to connect to irssi. The purpose behind it is
						to allow more control over irssi using the Windows GUI. When you first
						start the application, it will open the configuration window where you
						enter the information to connect to the proxy. Once connected, it will
						then display popup notifications in the tray to alert you of when your
						nickname is mentioned.
					</p>
					<p>
						Another feature I added to this application is to be able to control the
						away feature of irssi. When IrssiNotify connects to the proxy, it learns
						if the user is set to away or not. Then from the tray icon, you can
						set away or back. You can also set and change an away message.
					</p>
					<p>
						Future development for this application will include making it work with
						<a href="http://www.mono-project.com/Main_Page">mono</a> so it will be
						platform independant. Another feature I would like to add (if possible)
						is loading the irssi highlight settings and using them to control popup
						notifications.
					</p>
					<div  class="ui-widget-header">
						<h2>Screen Shots</h2>
					</div>
					<p>
						Please click on each screen shot to view the image scaled down to
						fit your window. If you would like to view the raw image, please
						hold the Ctrl key and click the image.
					</p>
					<p>
<?php foreach ($screens as $img): ?>
						<a class="dialog" href="images/irssinotify/<?php echo $img; ?>"><img src="images/irssinotify/thumb_<?php echo $img; ?>" alt="<?php echo $img; ?>" title="<?php echo $img; ?>" /></a>
<?php endforeach; ?>
					</p>
				</div>