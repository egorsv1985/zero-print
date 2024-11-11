jQuery(document).ready(function () {
	var e = document.querySelectorAll('.form-phone')
	jQuery(e).inputmask({
		mask: ['+7 (747)-999-99-99', '8 (747) 999 99 99'],
		placeholder: '_',
	})

	$('.burger').click(function () {
		$('header').toggleClass('open')
		$('body').toggleClass('overflow-hidden')
		$('.burger').toggleClass('open')
		// $('.menu').toggleClass('hidden')

		return false
	})

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
		appendDots: $('.slider__controls-dots'),
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
	$('.slider-main').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		swipe: true,
		verticalSwiping: false,
		
		cssEase: 'linear',
		asNavFor: '.slider-detail',
		pauseOnHover: false,
	})
	$('.slider-detail').slick({
		slidesToShow: 5,
		slidesToScroll: 5,
		swipe: true,
		TouchMove: true,
		asNavFor: '.slider-main',
		dots: true,
		cssEase: 'linear',
		arrows: false,
		verticalSwiping: false,
		// dotsClass: 'dots-list',
		centerMode: true,
		focusOnSelect: true,
		vertical: true,
		centerPadding: '0',
		pauseOnHover: false,
	})

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
	Fancybox.bind('.fancybox, [data-fancybox]', {
		// Your custom options
	})
	const $rangeInput = $('.range-input input'),
		$priceInput = $('.price-input input'),
		$range = $('.slider .progress')
	let priceGap = 1000

	$priceInput.on('input', function (e) {
		let minPrice = parseInt($priceInput.eq(0).val()),
			maxPrice = parseInt($priceInput.eq(1).val())

		if (
			maxPrice - minPrice >= priceGap &&
			maxPrice <= $rangeInput.eq(1).attr('max')
		) {
			if ($(this).hasClass('input-min')) {
				$rangeInput.eq(0).val(minPrice)
				$range.css(
					'left',
					(minPrice / $rangeInput.eq(0).attr('max')) * 100 + '%'
				)
			} else {
				$rangeInput.eq(1).val(maxPrice)
				$range.css(
					'right',
					100 - (maxPrice / $rangeInput.eq(1).attr('max')) * 100 + '%'
				)
			}
		}
	})

	$rangeInput.on('input', function (e) {
		let minVal = parseInt($rangeInput.eq(0).val()),
			maxVal = parseInt($rangeInput.eq(1).val())

		if (maxVal - minVal < priceGap) {
			if ($(this).hasClass('range-min')) {
				$rangeInput.eq(0).val(maxVal - priceGap)
			} else {
				$rangeInput.eq(1).val(minVal + priceGap)
			}
		} else {
			$priceInput.eq(0).val(minVal)
			$priceInput.eq(1).val(maxVal)
			$range.css('left', (minVal / $rangeInput.eq(0).attr('max')) * 100 + '%')
			$range.css(
				'right',
				100 - (maxVal / $rangeInput.eq(1).attr('max')) * 100 + '%'
			)
		}
	})
	
})
