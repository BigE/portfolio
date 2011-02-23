<script type="text/javascript">
$(document).ready(function () {
	$('#text').focus(function (){
		$('#text').select();
	});
	$('#show').click(function (event) {
		event.preventDefault();

		try{
			$('body').append($('<div id="infobox" />').infoBox({
				autoClose: $('#close').is(':checked') && $('#can-close').not(':checked'),
				caption: $('#text').val(),
				closeable: $('#can-close').is(':checked'),
				type: $('#type').val()
			}));
		} catch (err) {
			$('body').append($('<div id="infobox" />').infoBox({
				autoClose: false,
				caption: err,
				type: 'error'
			}));
		}
	});
	$('#text').focus();
});
</script>
<div id="description" class="ui-widget ui-widget-content ui-corner-all">
	<div class="ui-widget-header ui-corner-top">
		<h3>jQuery InfoBox</h3>
	</div>
	<p>
		jQuery InfoBox is my first jQuery plugin that I have written. Its main
		use is just for very simple notifications on the current webpage. It
		will display error notifications as well as standard notifications. The
		InfoBox will use the current jQuery UI theme, making it seamelessly
		integrate into any website using the jQuery UI.
	</p>
	<!--<p>
		<a href="source/infobox.html">Brouse Source</a>
	</p>-->
</div>
<div id="box" class="ui-widget ui-widget-content ui-corner-all">
	<div class="ui-widget-header ui-corner-top">
		<h3>InfoBox Demo</h3>
	</div>
	<p>
		<label for="text">InfoBox Text</label>
		<input type="text" id="text" name="text" value="This is my test message for the jQuery plugin." size="40" maxlength="200" />
		<br />
		<label for="type">InfoBox Type</label>
		<select id="type" name="type">
			<option value="info">Message</option>
			<option value="error">Error</option>
		</select>
		<br />
		<label for="can-close">Can Close?</label>
		<input type="checkbox" id="can-close" name="can-close" value="1" checked="checked" />
		<br />
		<label for="close">Auto Close?</label>
		<input type="checkbox" id="close" name="close" value="1" />
	</p>
	<p>
		<button id="show" class="ui-widget ui-state-default ui-button ui-corner-all ui-button-text-icon-primary">
			<span class="ui-button-icon-primary ui-icon ui-icon-check"></span>
			<span class="ui-button-text">Show InfoBox</span>
		</button>
	</p>
</div>