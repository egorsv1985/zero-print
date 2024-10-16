// $(window).scroll(function (event) {
// 	var top = $(window).scrollTop() // Получаем текущую позицию прокрутки
// 	if (top > 0) {
// 		// Проверяем, если прокрутка больше 0
// 		$('.header').addClass('fixed').removeClass('absolute mt-2')
// 	} else {
// 		$('.header').removeClass('fixed').addClass('absolute mt-2')
// 	}
// })

jQuery(document).ready(function () {
	var e = document.querySelectorAll('.form-phone')
	jQuery(e).inputmask({
		mask: ['+7 (999) 999 99 99', '8 (999) 999 99 99'],
		greedy: !1,
		placeholder: '_',
	})
})

// set the modal menu element
// const $targetEl = document.getElementById('callback-modal')

// // options with default values
// const options = {
// 	placement: 'bottom-right',
// 	backdrop: 'dynamic',
// 	backdropClasses: 'bg-gray_500/50  fixed inset-0 z-40',
// 	closable: true,
// 	onHide: () => {
// 		console.log('modal is hidden')
// 	},
// 	onShow: () => {
// 		console.log('modal is shown')
// 	},
// 	onToggle: () => {
// 		console.log('modal has been toggled')
// 	},
// }

// // instance options object
// const instanceOptions = {
// 	id: 'callback-modal',
// 	override: true,
// }

$(document).ready(function () {
	$('.burger').click(function () {
		$('header').toggleClass('open')
		$('body').toggleClass('overflow-hidden')
		$('.burger').toggleClass('open')
		// $('.menu').toggleClass('hidden')
		

		return false
	})
})

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

$(document).ready(function () {
	// Проверяем поддержку формата WebP
	function supportsWebP() {
		var elem = document.createElement('canvas')

		if (!!(elem.getContext && elem.getContext('2d'))) {
			// Was able or not to get WebP representation
			return elem.toDataURL('image/webp').indexOf('data:image/webp') == 0
		}

		// Very old browser like IE 8, canvas not supported
		return false
	}

	// Проверяем поддержку формата AVIF
	function supportsAvif() {
		var elem = document.createElement('canvas')

		if (!!(elem.getContext && elem.getContext('2d'))) {
			// Was able or not to get AVIF representation
			return elem.toDataURL('image/avif').indexOf('data:image/avif') == 0
		}

		// Very old browser like IE 8, canvas not supported
		return false
	}

	// Добавляем классы в зависимости от поддержки форматов
	if (supportsWebP()) {
		$('body').addClass('webp')
	}

	if (supportsAvif()) {
		$('body').addClass('avif')
	}
})
