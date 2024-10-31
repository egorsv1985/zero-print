<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);
$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID']);
$rsSections = CIBlockSection::GetList(array(), $arFilter);
$SECTIONS = array();
while ($arSections = $rsSections->GetNext()) {
	$SECTIONS[$arSections['ID']] = $arSections['NAME'];
}
?>
<!-- <pre><? print_r($arResult); ?></pre> -->
<ul class="">
<? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
			<li class="pb-3 mb-4 border-b border-news_border">
				<a href="<?= $arElement['DETAIL_PAGE_URL']; ?>" class="">
					<div class="text-lg text-txt_news"><?= $arItem['NAME']; ?></div>
					<div class="text-mini text-txt_date"><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></div>
				</a>
			</li>		
			<? endforeach; ?>
		</ul>