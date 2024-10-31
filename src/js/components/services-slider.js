$(document).ready(function () {
	 $('.slider-main').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '.slider-detail',
		})
		$('.slider-detail').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			asNavFor: '.slider-main',
			dots: true,
			arrows: false,
			// dotsClass: 'dots-list',
			centerMode: true,
			focusOnSelect: true,
		})
})
