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
<section class="products bg-secondary pt-14 pb-[120px] -mb-5">
	<div class="container">
		<div class="flex items-end justify-between mb-8">
			<h2 class="text-4xl font-semibold">Сувенирная продукция</h2>
			<a href="/uslugi/"
				class="text-lg font-medium leading-normal pe-4 products__link text-txt_blue hover:text-txt_dark link__arrow">перейти в
				каталог</a>
		</div>
		
		<div class="-mx-4 products-slider ">
			<? foreach ($arResult["ITEMS"] as $arItem): ?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				if (CModule::IncludeModule("millcom.phpthumb") && !empty($arItem["PREVIEW_PICTURE"]["SRC"])) {
					$arItem["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 7);
					$arItem["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 8);
				}
				?>
				<div class="h-auto px-4">

					<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="block " id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

						<div class="px-1 pt-1 pb-5 bg-white rounded-standard">
							<div class="w-full products__box-img rounded-standard">
								<picture>
									<source srcset="<?= $arItem["PREVIEW_PICTURE"]["WEBP"] ?>" type="image/webp"><img src="<?= $arItem["PREVIEW_PICTURE"]["PNG"] ?>"
										alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?> " title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" class="w-full h-auto rounded-standard" width="288" height="215">
								</picture>
							</div>
							<div class="flex items-end justify-between gap-5 px-1 products__desc min-h-14">
								<div class="text-xl font-medium"><?= $arItem["NAME"] ?></div>
								<span class="inline-block text-txt_blue text-nowrap "><?= $arItem["PROPERTIES"]["PRICE"]["VALUE"] ?></span>
							</div>
						</div>
					</a>
				</div>
			<? endforeach; ?>
		</div>
		<div class="mt-5 slider__controls-dots"></div>
	</div>
</section>