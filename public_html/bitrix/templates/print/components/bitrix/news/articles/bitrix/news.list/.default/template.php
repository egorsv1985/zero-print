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
<section class="news-list pb-14">
	<div class="container">
		<h1 class="mb-3 text-5xl font-semibold text-txt_dark">Новости</h1>
		<div class="hidden mb-10 text-lg font-medium sm:flex text-txt_gray">
			<? $APPLICATION->IncludeComponent(
				"bitrix:menu",
				"sections",
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
		<div class="grid grid-cols-12 gap-8 mb-12">
			<? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

				if (CModule::IncludeModule("millcom.phpthumb") && !empty($arItem["PREVIEW_PICTURE"]["SRC"])) {
					$arItem["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 3);
					$arItem["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 4);
				}
				?>
				<div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="col-span-12 lg:col-span-4 md:col-span-6">
					<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="flex flex-col news-list__item">
						<div class="news-list__box-img rounded-standard mb-7">
							<picture>
								<source srcset="<?= $arItem["PREVIEW_PICTURE"]["WEBP"] ?>" type="image/webp">
								<img src="<?= $arItem["PREVIEW_PICTURE"]["PNG"] ?>"
									class="w-full h-auto rounded-standard"
									alt="<?= htmlspecialchars($arItem['NAME']); ?>" title="<?= htmlspecialchars($arItem['NAME']); ?>">
							</picture>
						</div>
						<div class="mb-2 text-sm text-txt_dark/60"><?= $arItem['ACTIVE_FROM']; ?></div>
						<h2 class="text-xl text-txt_dark"><?= $arItem['NAME']; ?></h2>
					</a>
				</div>
			<? endforeach; ?>
		</div>
		<div class="flex justify-center ">

			<a href="#"
				class="relative inline-flex max-w-[220px] justify-between items-center gap-4 ps-4 pe-1 py-1 overflow-hidden font-medium transition-all rounded-[80px] bg-primary hover:bg-white group">
				<span
					class="absolute inset-0 border-0 group-hover:border-[40px] ease-linear duration-100 transition-all border-white rounded-full"></span>
				<span
					class="relative w-full text-lg text-white transition-colors duration-500 ease-in-out text-nowrap group-hover:text-txt_blue">Показать
					еще</span>
				<span class="block w-10 h-10 rounded-full min-w-10"
					style="background: #fff url(<?= SITE_TEMPLATE_PATH ?>/images/icons/btn-arrow.svg) no-repeat center/10px 17px;">

				</span>
			</a>
		</div>
	</div>
</section>