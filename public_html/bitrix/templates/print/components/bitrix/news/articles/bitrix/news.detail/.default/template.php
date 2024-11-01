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

global $arFilterMainList;
$arFilterMainList = array(
    "!ID" => $currentElementId
);
?>
<!-- <pre><? print_r($arResult); ?></pre> -->
<section class="news-detail">
	<div class="container">
		<div
			class="rounded-standard pt-[36%] relative before:absolute before:rounded-standard before:inset-0 before:bg-black/25"
			style="background: url(<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>) no-repeat center / cover;">
		</div>
		<div class="relative z-10 grid grid-cols-12">
			<div class="col-span-12 -mt-16 lg:col-span-8 ps-8 lg:-me-5">
				<div class="px-12 py-7 bg-secondary rounded-standard">
					<h1 class="mb-8 text-5xl font-semibold"><?= $arResult["NAME"] ?></h1>
					<div class="mb-3 text-sm text-txt_dark/60"><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></div>
					<div class="flex gap-4 mb-3 text-sm font-medium text-txt_dark">
						<?
						$db_old_groups = CIBlockElement::GetElementGroups($arResult['ID'], true);
						$ar_new_groups = array($NEW_GROUP_ID);
						while ($ar_group = $db_old_groups->Fetch()) { ?>
							<div class="px-2 py-1 text-center border border-dark rounded-big ">
								<span class="py-1">
									<?= $ar_group["NAME"] ?>
								</span>
							</div>
						<? }
						?>
					</div>
					<div class="mb-12">
						<?= $arResult["DETAIL_TEXT"] ?>
					</div>									
					
					<?php
					// Получаем ID текущего элемента и дату начала активности
					$currentElementId = $arResult['ID'];
					$currentElementDate = $arResult['ACTIVE_FROM'];

					// Получаем предыдущую новость
					$arPrevFilter = array(
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"<ACTIVE_FROM" => $currentElementDate,
						"ACTIVE" => "Y",
						"!ID" => $currentElementId // Исключаем текущую новость
					);
					$arPrevSelect = array("ID", "NAME", "DETAIL_PAGE_URL", "ACTIVE_FROM");
					$arPrevOrder = array("ACTIVE_FROM" => "DESC");

					$rsPrevElement = CIBlockElement::GetList($arPrevOrder, $arPrevFilter, false, array("nTopCount" => 1), $arPrevSelect);
					if ($arPrevElement = $rsPrevElement->GetNext()) {
						$prevLink = $arPrevElement["DETAIL_PAGE_URL"];
						$prevName = $arPrevElement["NAME"];
					}

					// Получаем следующую новость
					$arNextFilter = array(
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						">ACTIVE_FROM" => $currentElementDate,
						"ACTIVE" => "Y",
						"!ID" => $currentElementId // Исключаем текущую новость
					);
					$arNextSelect = array("ID", "NAME", "DETAIL_PAGE_URL", "ACTIVE_FROM");
					$arNextOrder = array("ACTIVE_FROM" => "ASC");

					$rsNextElement = CIBlockElement::GetList($arNextOrder, $arNextFilter, false, array("nTopCount" => 1), $arNextSelect);
					if ($arNextElement = $rsNextElement->GetNext()) {
						$nextLink = $arNextElement["DETAIL_PAGE_URL"];
						$nextName = $arNextElement["NAME"];
					}
					?>

					<div class="flex justify-end gap-8">
						<!-- Previous Button -->
						<?php if (isset($prevLink)): ?>
							<a href="<?= $prevLink ?>"
								class="flex ps-5 items-center justify-center text-lg font-medium text-txt_blue hover:text-txt_gray bg-left bg-no-repeat bg-[url(images/icons/prev.svg)]">
								предыдущая новость
							</a>
						<?php endif; ?>

						<!-- Next Button -->
						<?php if (isset($nextLink)): ?>
							<a href="<?= $nextLink ?>"
								class="flex pe-5 items-center justify-center text-lg font-medium text-txt_blue hover:text-txt_gray bg-no-repeat bg-right bg-[url(images/icons/next.svg)]">
								следующая новость
							</a>
						<?php endif; ?>
					</div>

				</div>
			</div>
			<div class="col-span-12 lg:col-span-4 ">
				<div class="p-16">
					<h2 class="mb-3 text-xl font-semibold text-txt_dark">Instagram</h2>
					<div class="grid grid-cols-12 gap-1 overflow-hidden rounded-standard bg-secondary">
						<div class="col-span-6 md:col-span-4">
							<img src="<?= SITE_TEMPLATE_PATH; ?>/images/insta1.webp" alt="insta" class="w-full h-auto">
						</div>
						<div class="col-span-6 md:col-span-4">
							<img src="<?= SITE_TEMPLATE_PATH; ?>/images/insta2.webp" alt="insta" class="w-full h-auto">
						</div>
						<div class="col-span-6 md:col-span-4">
							<img src="<?= SITE_TEMPLATE_PATH; ?>/images/insta3.webp" alt="insta" class="w-full h-auto">
						</div>
						<div class="col-span-6 md:col-span-4">
							<img src="<?= SITE_TEMPLATE_PATH; ?>/images/insta4.webp" alt="insta" class="w-full h-auto">
						</div>
						<div class="col-span-6 md:col-span-4">
							<img src="<?= SITE_TEMPLATE_PATH; ?>/images/insta5.webp" alt="insta" class="w-full h-auto">
						</div>
						<div class="col-span-6 md:col-span-4">
							<img src="<?= SITE_TEMPLATE_PATH; ?>/images/insta6.webp" alt="insta" class="w-full h-auto">
						</div>
					</div>
				</div>
				<div class="px-16">
					<h2 class="mb-4 text-xl font-semibold text-txt_dark">Популярные статьи</h2>
					<? $APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"news-detail",
						array(
							"NO_CONTANER" => "Y",
							"ACTIVE_DATE_FORMAT" => "d.m.Y",
							"ADD_SECTIONS_CHAIN" => "N",
							"AJAX_MODE" => "N",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "Y",
							"CACHE_FILTER" => "N",
							"CACHE_GROUPS" => "Y",
							"CACHE_TIME" => "36000000",
							"CACHE_TYPE" => "A",
							"CHECK_DATES" => "Y",
							"DETAIL_URL" => "",
							"DISPLAY_BOTTOM_PAGER" => "N",
							"DISPLAY_DATE" => "N",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => "Y",
							"DISPLAY_PREVIEW_TEXT" => "N",
							"DISPLAY_TOP_PAGER" => "N",
							"FIELD_CODE" => array(
								0 => "NAME",
								1 => "PREVIEW_PICTURE",
								2 => "",
							),
							"FILTER_NAME" => "arFilterMainList",
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",
							"IBLOCK_ID" => "2",
							"IBLOCK_TYPE" => "content",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
							"INCLUDE_SUBSECTIONS" => "N",
							"MESSAGE_404" => "",
							"NEWS_COUNT" => "2",
							"PAGER_BASE_LINK_ENABLE" => "N",
							"PAGER_DESC_NUMBERING" => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL" => "N",
							"PAGER_SHOW_ALWAYS" => "N",
							"PAGER_TEMPLATE" => ".default",
							"PAGER_TITLE" => "Новости",
							"PARENT_SECTION" => "",
							"PARENT_SECTION_CODE" => "",
							"PREVIEW_TRUNCATE_LEN" => "",
							"PROPERTY_CODE" => array(
								0 => "INFO",
								1 => "PRICE",
								2 => "",
							),
							"SET_BROWSER_TITLE" => "N",
							"SET_LAST_MODIFIED" => "N",
							"SET_META_DESCRIPTION" => "N",
							"SET_META_KEYWORDS" => "N",
							"SET_STATUS_404" => "N",
							"SET_TITLE" => "N",
							"SHOW_404" => "N",
							"SORT_BY1" => "RAND",
							"SORT_BY2" => "SORT",
							"SORT_ORDER1" => "DESC",
							"SORT_ORDER2" => "ASC",
							"STRICT_SECTION_CHECK" => "N",
							"COMPONENT_TEMPLATE" => "news-detail"
						),
						false
					); ?>
				</div>
			</div>
		</div>
	</div>
</section>