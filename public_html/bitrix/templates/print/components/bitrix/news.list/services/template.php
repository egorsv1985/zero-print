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
<div class="grid grid-cols-12 gap-7">
	<? foreach ($arResult["ITEMS"] as $arItem): ?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

		if (CModule::IncludeModule("millcom.phpthumb") && !empty($arItem["PREVIEW_PICTURE"]["SRC"])) {
			$arItem["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 7);
			$arItem["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 8);
		}
		?>
		<div class="col-span-12 sm:col-span-6 lg:col-span-4">
			<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="block h-auto products__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
				<div class="flex flex-col justify-between h-full gap-2 px-2 pt-2 pb-5 bg-secondary rounded-standard">
					<div class="w-full mb-2 products__box-img rounded-standard">
						<picture>
							<source srcset="<?= $arItem["PREVIEW_PICTURE"]["WEBP"] ?>" type="image/webp"><img src="<?= $arItem["PREVIEW_PICTURE"]["PNG"] ?>"
								alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?> " title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" class="w-full h-auto rounded-standard" width="288" height="215">
						</picture>
					</div>
					<div class="flex justify-between gap-5 px-1 min-h-12 products__desc">
						<div class="text-xl font-medium"><?= $arItem["NAME"] ?></div>
						<span class="self-end inline-block text-txt_blue text-nowrap "><?= $arItem["PROPERTIES"]["PRICE"]["VALUE"] ?></span>
					</div>
				</div>
			</a>
		</div>
	<? endforeach; ?>
</div>