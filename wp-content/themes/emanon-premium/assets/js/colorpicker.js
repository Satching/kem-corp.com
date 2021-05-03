(function($) {

	$(function() {
		$('.emanon_color_field' ).wpColorPicker();
	});

	$(document).on( 'widget-added widget-updated', onFormUpdate );

	function onFormUpdate(event, widget) {
		initColorPicker(widget);
	}

	$(document).ready(function() {
		$( '#widgets-right .widget:has( .emanon_color_field_input ) .widget-inside' ).each(function( ) {
			initColorPicker( $(this) );
		});
	});

	function initColorPicker(widget) {
		widget.find( '.emanon_color_field_input' ).wpColorPicker( {
			change: _.throttle( function() {
				$(this).trigger('input');
			}, 3000 ),
		clear: _.throttle( function() {
		$(this).trigger( 'input' );
		}, 4000 )
		});
	}

})(jQuery);