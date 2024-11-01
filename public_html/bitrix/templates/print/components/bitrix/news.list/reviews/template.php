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
<!-- <pre>
	<? print_r($arResult); ?>
</pre> -->

<section class="pt-32 -mt-5 pb-9 reviews">
	<div class="container">
		<h2 class="mb-3 text-4xl font-semibold text-center">Отзывы наших клиентов</h2>
		<div class="-mx-4 reviews-slider ">
			<? foreach ($arResult["ITEMS"] as $arItem): ?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="h-auto p-4 reviews__item">

					<div class="px-8 pt-8 pb-12 shadow-combined rounded-standard">
						<div class="mb-1 text-lg font-semibold"><?= $arItem["NAME"] ?></div>
						<div class="mb-5 text-base text-txt_blue"><?= $arItem["PREVIEW_TEXT"] ?></div>
						<div class="text-lg "><?= $arItem["DETAIL_TEXT"] ?></div>
					</div>
				</div>
			<? endforeach; ?>
		</div>
		<div class="slider__controls-arrows"></div>
	</div>
</section>