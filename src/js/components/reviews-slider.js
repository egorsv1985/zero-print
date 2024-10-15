$(document).ready(function () {
	$('.reviews-slider').slick({
		infinite: true,
		speed: 500,
		autoplay: false,
		autoplaySpeed: 5000,
		swipe: true,
		arrows: true,
		
		cssEase: 'linear',
		slidesToShow: 2,
		slidesToScroll: 1,
		// appendArrows: $('.slider__controls-arrows'),
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
				},
			},
		],
	})
})
