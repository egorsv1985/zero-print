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
$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID']);
$rsSections = CIBlockSection::GetList(array(), $arFilter);
$SECTIONS = array();
while ($arSections = $rsSections->GetNext()) {
	$SECTIONS[$arSections['ID']] = $arSections['NAME'];
}
?>
<section class="news py-14">
	<h2 class="mb-3 text-4xl font-semibold">Последние новости</h2>
	<div class="flex items-end justify-between mb-8">
		<div class="w-3/5 text-lg">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
			несколько абзацев более менее осмысленного
			текста рыбы.</div>
		<a href="/news/" target="_blank" class="text-lg font-medium pe-4 news__link text-txt_blue hover:text-txt_dark">перейти к
			новостям</a>
	</div>
	<div class="grid grid-cols-12 gap-8">
		<? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			// if (CModule::IncludeModule("millcom.phpthumb")) {
			// 	$COVER_D = CMillcomPhpThumb::generateImg($arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : $arItem['DETAIL_PICTURE']['SRC'], 15);
			// 	$COVER_M = CMillcomPhpThumb::generateImg($arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : $arItem['DETAIL_PICTURE']['SRC'], 13);
			// }
			?>
			<div
				class="col-span-12 overflow-hidden transition-all duration-300 ease-out <?= ($key === 0) ? 'lg:col-span-6' : 'lg:col-span-3 md:col-span-6'; ?> bg-dark rounded-standard">
				<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="relative block group">
					<picture>
						<source srcset="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" type="image/webp"><img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>"
							class="block w-full transition-all duration-300 ease-in-out opacity-50 rounded-standard group-hover:scale-105 group-hover:opacity-100"
							alt="Название статьи" title="Название статьи">
					</picture>
					
					<div class="absolute bottom-0 w-full px-5 pb-5 start-0 md:w-4/5">
						<div class="mb-5 text-xl font-semibold text-white uppercase "><?= $arItem['NAME']; ?></div>
						<div class="text-lg text-white "><?= $arItem['PREVIEW_TEXT']; ?></div>
						<div
							class="mt-8 border border-white rounded-[80px] py-2 px-5 w-full max-w-36 text-lg  text-white transition-colors ">
							подробнее</div>
					</div>
				</a>
			</div>
		<? endforeach; ?>
	</div>
</section>