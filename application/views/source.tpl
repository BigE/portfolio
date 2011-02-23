<script type="text/javascript">
$(document).ready(function () {
	sh_highlightDocument('<?php echo SITECH_BASEURI; ?>js/', '.min.js');
	$('.source pre').each(function () {
		var code = $(this).html().split("\n");
		var nums = $('<div id="lineno" />');
		for (i = 1; i <= code.length; i++) {
			nums.append('<div><a name="' + i + '">' + i + '</a></div>')
		}

		$(this).parent().prepend(nums);
	});
});
</script>
<div class="ui-widget ui-widget-content ui-corner-all">
	<div class="ui-widget-header ui-corner-top">
		<h2><?php echo basename($source); ?></h2>
	</div>
	<div class="source">
		<pre class="sh_<?php echo $lang; ?>">
<?php echo htmlentities(file_get_contents($source)); ?>
		</pre>
	</div>
</div>