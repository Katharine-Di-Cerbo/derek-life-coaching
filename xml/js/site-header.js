jQuery(function( $ ){

	// Add stop class to site header after 580px
	$(document).on("scroll", function(){

		if($(document).scrollTop() > 580){
			$(".site-header").addClass("stop");			

		} else {
			$(".site-header").removeClass("stop");			
		}

	});

});