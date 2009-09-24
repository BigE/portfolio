$(document).ready(function (){
	$('div.theme').click(function (){
		var theme = $(this).attr('class').split(' ')[1];
		$('div#header').attr('class', theme);
		$('div#footer').attr('class', theme);
		$.cookie('theme', theme, {expires: 365});
	});
});