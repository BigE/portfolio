$(document).ready(function () {
	$('.error').not(':empty').each(highlightError);
});

function highlightError() {
	$(this).hide();
	$(this).addClass('ui-widget').addClass('ui-state-error').addClass('ui-corner-all');
	$(this).prepend('<span class="ui-icon ui-icon-alert" style="float: left;" />');
	$(this).fadeIn();
}