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
						<div class="px-2 py-1 text-center border border-dark rounded-big ">
							<span class="py-1">
								дизайн
							</span>
						</div>
						<div class="px-2 py-1 text-center border border-dark rounded-big ">
							<span class="py-1">
								креатив
							</span>
						</div>

					</div>
					<div class="mb-12">
						<?= $arResult["DETAIL_TEXT"] ?>
					</div>
					<div class="flex justify-end gap-8">
						<!-- Previous Button -->
						<a href="#"
							class="flex ps-5 items-center justify-center text-lg font-medium text-txt_blue hover:text-txt_gray bg-no-repeat bg-c bg-[url(<?= SITE_TEMPLATE_PATH; ?>/images/icons/prev.svg)]">
							предыдущая новость </a>

						<!-- Next Button -->
						<a href="#"
							class="flex pe-5 items-center justify-center text-lg font-medium text-txt_blue hover:text-txt_gray bg-no-repeat bg-c bg-right bg-[url(<?= SITE_TEMPLATE_PATH; ?>/images/icons/next.svg)]">
							следующая новость </a>
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
							"COMPONENT_TEMPLATE" => "main-tabs"
						),
						false
					); ?>

				</div>
			</div>
		</div>
	</div>
</section>