$(document).ready(function () {
	$('#contact').click(function (event) {
		$('<div id="contact-dialog" />').dialog({
			buttons: {
				"Send": function () {},
				"Cancel": function () {
					$(this).dialog('close');
				}
			},
			close: function () {
				$('#contact-dialog').dialog('destroy');
			},
			draggable: false,
			modal: true,
			resizable: false,
			title: 'Contact Me'
		});

		event.preventDefault();
	});
});
