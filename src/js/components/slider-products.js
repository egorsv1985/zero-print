$(document).ready(function () {
	$('.products-slider').slick({
		infinite: true,
		speed: 500,
		autoplay: false,
		autoplaySpeed: 5000,
		swipe: true,
		arrows: false,
		dots: true,
		cssEase: 'linear',
		slidesToShow: 4,
		slidesToScroll: 1,
		// appendDots: $('.slider__controls-dots'),
		responsive: [
			{
				breakpoint: 1280,
				settings: {
					slidesToShow: 3,
				},
			},
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
				},
			},			
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
				},
			},			
		],
	})
})
