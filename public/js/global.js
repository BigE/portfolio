$(document).ready(function (){
	$('.dialog').dialog({
		autoOpen: false,
		draggable: false,
		minWidth: 200,
		modal: true,
		resizeable: false
	});

	if ($.cookie('css3font') == 1) {
		$('body').css('font-family', 'Diavlo, Tahoma, sans-serif').css('font-size', '11pt');
		$('#font a.link').html('Disable Custom Font');
	}

	$('div.theme').click(function (){
		var theme = $(this).attr('class').split(' ')[1];
		$('div#header').attr('class', theme);
		$('div#footer').attr('class', theme);
		$.cookie('theme', theme, {expires: 365});
	});

	$('#font a.link').click(function () {
		var font = $.cookie('css3font');
		if (font == 1) {
			$('body').css('font-family', 'Geneva,Arial,Helvetica,sans-serif').css('font-size', '10pt');
			$('#font a.link').html('Enable Custom Font');
			$.cookie('css3font', 0, {expires: 365});
		} else {
			$('body').css('font-family', 'Diavlo,Geneva,Arial,Helvetica,sans-serif').css('font-size', '11pt');
			$('#font a.link').html('Disable Custom Font');
			$.cookie('css3font', 1, {expires: 365});
		}
		return(false);
	});

	$('#font a.about').click(function () {
		$('#general.dialog').dialog('option', 'title', 'Custom Font').dialog('open');
		$('#general.dialog').html('<p>Toggling the custom font uses CSS3 to display a font from this website. While most fonts \
are loaded from your computer, CSS3 enables fonts to be loaded from the internet. Since CSS3 is not considered stable, and \
not all browsers support it properly, I have set this as an optional feature you can turn off or on through the toggle link.</p>');
		return(false);
	});
});