$(function () {
	$('.datepicker').datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$('#zip').autocomplete({
		minLength: 2,
		select: function (event, ui) {
			if (ui.item) {
				$('#citystate').html(ui.item.label).parent('.hide').removeClass('hide');
			} else {
				$('#citystate').html('').parent(':not(.hide)').addClass('hide');
			}
		},
		source: function (request, response) {
			$.ajax({
				dataType: 'json',
				success: function (data) {
					response($.map(data, function (item) {
						return {
							label: item.city+', '+item.state.short+' '+item.zip,
							value: item.zip
						};
					}));
				},
				url: 'ajax/zip/'+request.term
			});
		}
	});

	$('input.error').before($('<span class="fa fa-exclamation-circle"></span>'));

	$('.desc').each(function () {
		$(this).html('<span class="text">' + $(this).html() + '</span>');
	}).append($('<span class="fa fa-info-circle"></span>'));

	$('input').focus(function () {
		$(this).siblings('.desc').slideDown();
	}).blur(function () {
		$('.desc').hide();
	});

	$('#password_str').passmeter({
		min: 8,
		selector: '#password'
	});

	$('input[tabindex=1]').focus();
});