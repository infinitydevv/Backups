function carouselSlideshow(carousel) {
	carousel.clip.hover(function () {
		carousel.stopAuto();
	}, function () {
		carousel.startAuto();
	});
	
	$('<div id="bullets"></div>').insertAfter('.jcarousel-container');

	$('#slideshow li').each(function(index) {
			var number = parseInt(index) + 1;
			$('#bullets').append('<a href="#"><span>'+ number +'</span></a>');
	});
	
	$('#slideshow').delegate('#bullets a', 'click', function(){
		carousel.scroll($.jcarousel.intval($(this).text()));
		return false;
	});
};

(function(){
	$('#slideshow ul').jcarousel({
		auto: 5,
		scroll: 1,
		wrap: 'last',
		initCallback: carouselSlideshow,
		itemVisibleInCallback: {
			onAfterAnimation: function(c, o, i, s) {
				--i;
				$('#bullets a').removeClass('active');
				$('#bullets a:eq('+i+')').addClass('active');
			}
		}
	});
})();