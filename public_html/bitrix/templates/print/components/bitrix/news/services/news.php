<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}
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

<div class="services-list">
	<div class="container">
		<h1 class="mb-3 text-4xl font-semibold">Услуги</h1>
		<div class="flex flex-wrap gap-3 text-lg font-medium mb-11 text-txt_gray">
			<? $APPLICATION->IncludeComponent(
				"bitrix:menu",
				"services-list",
				array(
					"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
					"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
					"DELAY" => "N",	// Откладывать выполнение шаблона меню
					"MAX_LEVEL" => "1",	// Уровень вложенности меню
					"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
						0 => $APPLICATION->GetCurDir(),
					),
					"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"MENU_CACHE_TYPE" => "N",	// Тип кеширования
					"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
					"ROOT_MENU_TYPE" => "section",	// Тип меню для первого уровня
					"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php

				),
				false
			); ?>
		</div>
		<div class="grid grid-cols-12 gap-7">
			<div class="col-span-12 md:col-span-6 lg:col-span-3">
				<?
				$APPLICATION->IncludeComponent(
					"bitrix:catalog.section.list",
					"services-checkbox",
					array(
						"COMPONENT_TEMPLATE" => "services-checkbox",
						"IBLOCK_TYPE" => "CONTENT",
						"IBLOCK_ID" => "3",
						"SECTION_ID" => "", // Не указываем ID родительского раздела
						"SECTION_CODE" => "",
						"COUNT_ELEMENTS" => "Y",
						"COUNT_ELEMENTS_FILTER" => "CNT_ALL",
						"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "",
						"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N", // Показывать все подразделы
						"TOP_DEPTH" => "2", // Установите на 1, чтобы показать только подразделы
						"SECTION_FIELDS" => array(
							0 => "",
							1 => "",
						),
						"SECTION_USER_FIELDS" => array(
							0 => "",
							1 => "",
						),
						"FILTER_NAME" => "",
						"VIEW_MODE" => "LINE",
						"SHOW_PARENT_NAME" => "Y", // Не показывать имя родительского раздела
						"SECTION_URL" => "",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "7200",
						"CACHE_GROUPS" => "Y",
						"CACHE_FILTER" => "N",
						"ADD_SECTIONS_CHAIN" => "N"
					),
					false
				);
				?>
			</div>
			<div class="col-span-12 md:col-span-6 lg:col-span-9 ">
<?
$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"services",
	[
		"COL" => 4,
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],
		"SORT_BY1" => $arParams["SORT_BY1"],
		"SORT_ORDER1" => $arParams["SORT_ORDER1"],
		"SORT_BY2" => $arParams["SORT_BY2"],
		"SORT_ORDER2" => $arParams["SORT_ORDER2"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
	],
	$component
);

?>
			</div>
		</div>
	</div>
</div>