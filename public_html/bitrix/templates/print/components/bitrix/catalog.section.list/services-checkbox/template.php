<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

?>
<!-- <pre><? print_r($arResult); ?></pre> -->
<form action="#" class="p-6 bg-secondary rounded-t-standard">
	<h3 class="mb-5 text-xl font-semibold text-txt_dark">Каталог</h3>
	<div class="text-lg checkbox-list text-txt_dark mb-9">
		<? foreach ($arResult['SECTIONS'] as $key => $arSection) :
			if ($arSection['DEPTH_LEVEL'] > 1):
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
		?>
				<div class="flex items-center my-3">
					<div class="flex items-center">
						<input id="checkbox-<?= $arSection['ID']; ?>" type="checkbox" value=""
							class="size-3 rounded-small bg-success checked:bg-primary ring-offset-0 checked:ring-offset-0 focus:ring-offset-0 focus:bg-primary focus:ring-0 focus:outline-none"
							required="">
					</div>
					<div class="ml-3 text-sm">
						<label for="checkbox-<?= $arSection['ID']; ?>" class="text-lg text-txt_dark"><?= $arSection['NAME']; ?></label>
					</div>
				</div>
			<? endif; ?>
		<? endforeach; ?>
	</div>
	<div class="w-[90%]">
		<h3 class="text-xl font-semibold mb-7 text-txt_dark">Цена</h3>
		<div class="relative z-10 range-input">
			<label for="range-min" class="sr-only">Диапазон минимальной цены</label>
			<input type="range" id="range-min" name="range_min"
				class="absolute w-full h-1 bg-transparent appearance-none pointer-events-none range-min" min="0"
				max="12000" value="0" step="100" aria-label="Диапазон минимальной цены">
			<label for="range-max" class="sr-only">Диапазон максимальной цены</label>
			<input type="range" id="range-max" name="range_max"
				class="absolute w-full h-1 bg-transparent appearance-none pointer-events-none range-max" min="0"
				max="12000" value="12000" step="100" aria-label="Диапазон максимальной цены">
		</div>
		<div class="relative h-1 rounded bg-primary/20 slider">
			<div class="absolute left-0 right-0 h-full rounded bg-primary progress"></div>
		</div>
		<div class="flex w-full mt-7 price-input">
			<div class="flex items-center w-full h-8 field">
				<label for="input-min" class="sr-only">Минимальная цена</label>
				<input type="number" id="input-min" name="min_price"
					class="w-full h-full text-sm font-medium text-center outline-none text-txt_gray border-y-0 border-s-0 border-gray rounded-s-standard input-min"
					value="0" aria-label="Минимальная цена">
			</div>
			<div class="flex items-center w-full h-8 field">
				<label for="input-max" class="sr-only">Максимальная цена</label>
				<input type="number" id="input-max" name="max_price"
					class="w-full h-full text-sm font-medium text-center outline-none text-txt_gray border-y-0 border-e-0 border-gray rounded-e-standard input-max"
					value="12000" aria-label="Максимальная цена">
			</div>
		</div>
	</div>
</form>
<!-- <script>
		$(document).ready(function() {
			const $rangeInput = $('.range-input input'),
				$priceInput = $('.price-input input'),
				$range = $('.slider .progress')
			let priceGap = 1000

			$priceInput.on('input', function(e) {
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

			$rangeInput.on('input', function(e) {
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
		});
	</script> -->