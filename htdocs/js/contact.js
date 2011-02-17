$(document).ready(function () {
	$('#contact').click(function (event) {
		$.getJSON('contact.json', {}, function (data) {
			$('<div id="contact-dialog" />').html(data['html']).dialog({
				buttons: {
					"Send": function () {
						var d = this;
						$.post($('#contact-dialog form').attr('action'), $('#contact-dialog form').serialize(), function (data) {
							if (data['html']) {
								$('#contact-dialog form').replaceWith(data['html']);
								$('.error').not(':empty').each(highlightError);
							} else {
								alert('E-Mail Successfully Sent!');
								$(d).dialog('close');
							}
						}, 'json');
					},
					"Cancel": function () {
						$(this).dialog('close');
					}
				},
				close: function () {
					$('#contact-dialog').dialog('destroy');
				},
				draggable: false,
				hide: 'blind',
				modal: true,
				open: function () {
					$('.ui-dialog-buttonpane')
						.find('button:contains("Send")')
						.attr('tabindex', '5')
						.removeClass('ui-button-text-only')
						.addClass('ui-button-text-icon-primary')
						.prepend('<span class="ui-button-icon-primary ui-icon ui-icon-mail-closed" />');
					$('.ui-dialog-buttonpane')
						.find('button:contains("Cancel")')
						.attr('tabindex', '6')
						.removeClass('ui-button-text-only')
						.addClass('ui-button-text-icon-primary')
						.prepend('<span class="ui-button-icon-primary ui-icon ui-icon-cancel" />');
					$('input[tabindex=1]').focus();

				},
				resizable: false,
				title: 'Contact Me',
				width: '470px'
			});
		});

		event.preventDefault();
	});
});
