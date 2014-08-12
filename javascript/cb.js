/**
 * Wrapper function to safely use $
 */
function cbWrapper( $ ) {
	var cb = {

		/**
		 * Main entry point
		 */
		init: function () {
			cb.prefix      = 'cb_';
			cb.templateURL = $( '#template-url' ).val();
			cb.ajaxPostURL = $( '#ajax-post-url' ).val();

			cb.registerEventHandlers();
		},

		/**
		 * Registers event handlers
		 */
		registerEventHandlers: function () {
			$( '#example-container' ).children( 'a' ).click( cb.exampleHandler );
		},

		/**
		 * Example event handler
		 *
		 * @param object event
		 */
		exampleHandler: function ( event ) {
			alert( $( this ).attr( 'href' ) );

			event.preventDefault();
		}
	}; // end cb

	$( document ).ready( cb.init );

} // end cbWrapper()

cbWrapper( jQuery );
