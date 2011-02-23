/**
 * This will generate an info or error box for the page based on the information
 * passed into it.
 */

(function ($) {
	var methods = {
		init: function (options) {
			var settings = {
				'autoClose': false,
				'caption': undefined,
				'closeable': true,
				'type': 'info',
				'visible': true
			};

			return(this.each(function() {
				if (options) {
					$.extend(settings, options);
				}

				if (settings['type'] == 'error') {
					var icon = 'ui-icon-alert';
					var state = 'ui-state-error';
				} else {
					var icon = 'ui-icon-info';
					var state = 'ui-state-highlight';
				}

				if (settings['caption'] == undefined) {
					$.error('jQuery.infoBox.init() requires a caption to be defined');
				} else if (settings['autoClose'] == false && settings['closeable'] == false) {
					$.error('infoBox not closeable! autoClose must be set to true.');
				}

				$(this).addClass('ui-widget infobox');

				$(this).html('');
				var innerDiv = $('<div />').addClass('infobox-inner '+state+' ui-corner-top').css({padding: '5px'});
				if (settings['closeable']) {
					innerDiv.append($('<div />').addClass('infobox-icon infobox-icon-r').html($('<span />').addClass('ui-icon ui-icon-close'))).click(function () {$(this).hide();});
				}
				innerDiv.append($('<span />').addClass('ui-icon infobox-icon infobox-icon-l '+icon)).append('&nbsp;' + settings['caption']);
				$(this).append(innerDiv);

				if (settings['visible']) {
					$(this).infoBox('show');
				}
				if (settings['autoClose']) {
					$(this).infoBox('hide');
				}
			}));
		},
		hide: function (options) {
			var settings = {
				'sleep': 4000,
				'timeout': 1000
			}

			if (options) {
				$.extend(settings, options);
			}

			var element = this;
			setTimeout(function () {element.animate({height: '0px'}, settings['timeout']);}, settings['sleep']);
			return(this);
		},
		show: function (timeout) {
			if (timeout == undefined) {
				timeout = 1000;
			}

			$(this.children('.infobox-inner')[0]).animate({height: '50px'}, timeout);
			return(this);
		}
	};

	$.fn.infoBox = function (method) {
		if (methods[method]) {
			return(methods[method].apply(this, Array.prototype.slice.call(arguments, 1)));
		} else if ( typeof method === 'object' || !method) {
			return(methods.init.apply(this, arguments));
		} else {
			$.error('Method ' + method + ' does not exist on jQuery.infoBox');
		}
	};
})(jQuery);
