/**
 * eight column slider for home page
 */

(function($) { 

	$(function() {

		// console.log('site js is working!');

		// ----------------------------------------------------------------------
	   	//	animate the nav links on hover ############################################
	   	// ----------------------------------------------------------------------
	   	var navLinks = $('ul#nav li a')

	   	navLinks.removeClass('with-hover'); // remove the css hover event if js is on or supported by the browser

	   	// lets animate the colors baby!
		navLinks.hover(function() {
			// console.log('hovered');
			$this = $(this);

			if ( !$this.hasClass('current-menu-item') ) {

				// console.log($this);
				$this.stop().animate({ color : '#d84691' }, 300);

			}

			
		}, function() {

			if ( !$this.hasClass('current-menu-item') ) {

				// console.log('out');
				$this.stop().animate({ color : '#010101' }, 300);		

			}

			
		});


	}); // doc ready

})(jQuery); // no conflict