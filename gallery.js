/**
 * Gallery Slideshow Script
 */
jQuery(document).ready(function($){
	$('#gallery #next').click(function(e){
		e.preventDefault();
		if ( $('#gallery .active').index() == $('#gallery .slide-container .photo-slide').size()-1 ) {
			var i = 0;
		} else {
			var i = $('#gallery .active').index() + 1;
		}
		$('#gallery .slide-container .photo-slide').removeClass('active');
		$('#gallery .slide-container .photo-slide:eq('+i+')').addClass('active');
	}); // #next click method end
	$('#gallery #prev').click(function(e){
		e.preventDefault();
		if ( $('#gallery .active').index() < $('#gallery .slide-container .photo-slide').size() ) {
			var i = $('#gallery .active').index() - 1;
		} else {
			var i = $('#gallery .slide-container .photo-slide').size();
		}
		$('#gallery .slide-container .photo-slide').removeClass('active');
		$('#gallery .slide-container .photo-slide:eq('+i+')').addClass('active');
	}); // #prev click method end
}); // ready method end