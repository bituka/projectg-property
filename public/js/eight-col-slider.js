/**
 * eight column slider for home page
 */

(function($) { 

	$(function() {

		console.log('working');

		var sliderUL = $('div#ecs').children('ul'),
			slidesLength = sliderUL.find('li.slides').length,
			current = 1;

		console.log(sliderUL);
		console.log(slidesLength);
		console.log(current);


		$('#ecs-nav').show().find('button').on('click', function() {
			var direction = $(this).data('dir');

			console.log(direction);

			// update current value
			( direction === 'next') ? ++current : --current;

			// if first image
			if ( current === 0 ) {
				current = slidesLength;
			} else if ( current - 1 === slidesLength ) { // Are we at end? Should we reset?
				current = 1;
			}


			console.log(current);

			// animate, lets show the current slide!
			sliderUL.find('li.slides').hide(); // hide the slides

			sliderUL.find('#slide-' + current).fadeIn(2000); // fadeIn the current slide

		});





		// ----------------------------------------------------------------------
	   	//	animate the thumbnails on hover #####################################
	   	// ----------------------------------------------------------------------
		$('.images').hover(function() {
			$this = $(this);
			$this.stop().transition({ scale: 1.04 }, 200).css('z-index', '999');
		}, function() {
			$this.stop().transition({ scale: 1 }, 200).css('z-index', '1');
		});


		// ----------------------------------------------------------------------
	   	//	animate the nav buttons on hover ####################################
	   	// ----------------------------------------------------------------------
	   	$('div#ecs-nav > button').removeClass('with-hover'); // remove the css hover event if js is on or supported by the browser

	   	// lets animate the colors baby!
		$('div#ecs-nav > button').hover(function() {
			console.log('hovered');
			$this = $(this);
			console.log($this);
			$this.stop().animate({ color : 'red' }, 1000);
		}, function() {
			console.log('out');
			$this.stop().animate({ color : '#b9b9b9' }, 1000);		
		});


	



	}); // doc ready

})(jQuery); // no conflict