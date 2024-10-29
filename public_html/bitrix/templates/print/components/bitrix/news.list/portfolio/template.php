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
<section class="py-12 works bg-primary rounded-standard">
	<div class="container">
		<h2 class="mb-10 text-4xl font-semibold text-center text-white">Наши работы</h2>
		<div class="grid grid-cols-12 mb-5 gap-x-8">
			<? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

				if (CModule::IncludeModule("millcom.phpthumb") && !empty($arItem["PREVIEW_PICTURE"]["SRC"])) {
					$arItem["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 9);
					$arItem["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 10);
				}
				?>
				<a href="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="fancybox col-span-12 xl:col-span-4 <?= ($key === 2) ? 'lg:row-span-2' : 'lg:col-span-6'; ?> mt-8">
					<div class="h-full rounded-standard">
						<picture>
							<source srcset="<?= $arItem["PREVIEW_PICTURE"]["WEBP"] ?>" type="image/webp"><img src="<?= $arItem["PREVIEW_PICTURE"]["PNG"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
								title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" class="w-full h-full rounded-standard" width="410" height="250">
						</picture>
					</div>
				</a>
			<? endforeach; ?>
		</div>
		<a href="/portfolio/"
			class="relative mx-auto flex max-w-[220px]  justify-between items-center gap-4 ps-4 pe-1 py-1 overflow-hidden font-medium transition-all  rounded-[80px] bg-dark hover:bg-white group">
			<span
				class="absolute inset-0 border-0 group-hover:border-[40px] ease-linear duration-100 transition-all border-white rounded-full"></span>
			<span
				class="relative w-full text-lg text-white transition-colors duration-500 ease-in-out text-nowrap group-hover:text-dark">увидеть
				больше</span>
			<span class="block w-10 h-10 rounded-full min-w-10"
				style="background: #fff url(<?= SITE_TEMPLATE_PATH ?>/images/icons/btn-arrow.svg) no-repeat center/10px 17px;"> </span>
		</a>
	</div>
</section>