$(document).ready(function () {
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
