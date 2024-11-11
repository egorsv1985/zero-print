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
$IMAGES_ARRAY = array();

foreach ($arResult['PROPERTIES']['IMAGES']['VALUE'] as $key => $IMG) {
	$IMAGES_ARRAY[] = array(
		'TITLE' => $arResult['NAME'],
		'IMG' => $IMG,
	);
}
?>
<section class="card ">
	<div class="container">
		<div class="py-6 mb-12 rounded-standard bg-secondary">
			<div class="grid grid-cols-12 gap-8 mb-9">
				<? if (!empty($arResult["PROPERTIES"]["PRINT_ON_ITEM"]["VALUE"])): ?>
					<div class="col-span-12 lg:col-span-6">
						<div class="grid grid-cols-12 gap-2 px-2.5">
							<div class="col-span-2 ">
								<div class="-my-2 slider-detail">
									<? foreach ($IMAGES_ARRAY as $key => $IMAGES):
										if (CModule::IncludeModule("millcom.phpthumb")) {
											$WEBP = CMillcomPhpThumb::generateImg($IMAGES['IMG'], 11);
											$PNG = CMillcomPhpThumb::generateImg($IMAGES['IMG'], 12);
										}
									?>
										<div class="py-2 item" id="item_<?= $arResult['ID']; ?>_<?= $key; ?>">
											<div class=" rounded-standard box-img">
												<picture>
													<source srcset="<?= $WEBP ?>" type="image/webp">
													<img src="<?= $PNG ?>" alt="<?= $IMAGES['TITLE'] ?>" title="<?= $IMAGES['TITLE'] ?>" loading="lazy" class="rounded-standard" width="92" height="92">
												</picture>
											</div>
										</div>
									<? endforeach; ?>
								</div>
							</div>							
							<div class="col-span-10">

								<div class="-mx-2 slider-main ">
									<? foreach ($IMAGES_ARRAY as $key => $IMAGES):
										if (CModule::IncludeModule("millcom.phpthumb")) {
											$WEBP = CMillcomPhpThumb::generateImg($IMAGES['IMG'], 13);
											$PNG = CMillcomPhpThumb::generateImg($IMAGES['IMG'], 14);
										}
									?>
										<div class="px-2 item">
											<div class="rounded-standard">
												<picture>
													<source srcset="<?= $WEBP ?>" type="image/webp">
													<img src="<?= $PNG ?>" alt="<?= $IMAGES['TITLE'] ?>" title="<?= $IMAGES['TITLE'] ?>" loading="lazy" class="w-full h-full rounded-standard" width="518" height="550">
												</picture>
											</div>
										</div>
									<? endforeach; ?>
								</div>


							</div>
						</div>
					</div>
				<? endif; ?>
				<div class="relative col-span-12 lg:col-span-6">
					<form action="<?=$APPLICATION->GetCurDir();?>" method="POST" class="">

					<?
					$arSelect = Array("ID", "NAME", "*");
					$arFilter = Array("IBLOCK_ID" => 5, "ACTIVE" => "Y", 'PROPERTY_ITEM' => $arResult["ID"]);
					$rsOffers = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
					$PROPERTIES = array();
					$OFFERS = array();

					$SELECT_DEF = array();
					while ($abOffers = $rsOffers->GetNextElement()) {
						$arOffersFields = $abOffers->GetFields();
						$arOffersProps = $abOffers->GetProperties();
						$OFFERS[$arOffersFields['ID']] = array(
							'PRICE' => trim($arResult["PROPERTIES"]["PRICE"]["VALUE"]),
							'PROPS' => array()
						);
						if ($arOffersProps['PRICE']['VALUE']) $OFFERS[$arOffersFields['ID']]['PRICE'] = $arOffersProps['PRICE']['VALUE'];
						foreach ($arOffersProps as $PROP) {
							if (substr($PROP['CODE'], 0, 2) == 'D_') {
								if ($PROP['VALUE']) {
									if (!isset($PROPERTIES[substr($PROP['CODE'], 2)])) {
										$PROPERTIES[substr($PROP['CODE'], 2)] = array(
											'NAME' => $PROP['NAME'],
											'NAME1' => $PROP['NAME'],
											'VALUES' => array()
										);
										$SELECT_DEF[substr($PROP['CODE'], 2)] = $PROP['VALUE_XML_ID'];
									}
									if (!in_array($PROP['VALUE'], $PROPERTIES[substr($PROP['CODE'], 2)]['VALUES'])) {
										$PROPERTIES[substr($PROP['CODE'], 2)]['VALUES'][$PROP['VALUE_XML_ID']] = $PROP['VALUE'];
									}
									$OFFERS[$arOffersFields['ID']]['PROPS'][substr($PROP['CODE'], 2)] = $PROP['VALUE_XML_ID'];
								}
							}
						}
					}

					$APPLICATION->AddHeadString('
					<script>
						var offers = '.json_encode($OFFERS, JSON_UNESCAPED_UNICODE).';
						var offersSelect = '.json_encode($SELECT_DEF, JSON_UNESCAPED_UNICODE).';
					</script>'); // |JSON_PRETTY_PRINT
					//print_r($PROPERTIES);
					
					?>
						<div class="flex flex-wrap justify-between gap-x-12">
							<div class="">
								<h1 class="relative mb-2 text-5xl font-semibold text-txt_dark"><?= $arResult["NAME"] ?></h1>
								<div class="text-base opacity-70 mb-11">Артикул: <?= $arResult["PROPERTIES"]["ARTICLE"]["VALUE"] ?></div>
							</div>
						</div>
						
						<!-- Убрать тут 1/2 -->
						<?foreach ($PROPERTIES as $PROPERTY_CODE => $PROPERTY):?>
							<div class=" mb-9">
								<div class="mb-6 text-lg">
									<?=$PROPERTY['NAME'];?>: <span class="text-base opacity-70 ms-1" id="label-<?=$PROPERTY_CODE;?>"><?=$PROPERTY['VALUES'][$SELECT_DEF[$PROPERTY_CODE]]?></span>
								</div>
								<?if ($PROPERTY_CODE == 'SIZE'):?>
									<!-- Надо поставить его в нужное место, я бы добавил float:right--> 
									<button data-modal-target="table-size" data-modal-toggle="table-size"
										class="block text-sm underline opacity-50 text-txt_blue decoration-dashed" type="button">
										Таблица размеров
									</button>
								<?endif;?>
								<?if ($PROPERTY_CODE == 'COLOR'):?>
								<div class="flex flex-wrap gap-2.5 mb-10">
									<?foreach ($PROPERTY['VALUES'] as $CODE => $VALUE):?>
										<div class="border offer-color bg-secondary size-10 border-border_color rounded-color ">
											<input type="radio" name="<?=$PROPERTY_CODE?>" value="<?=$VALUE?>" id="d<?=md5($PROPERTY_CODE.$CODE);?>"<?=($SELECT_DEF[$PROPERTY_CODE] == $CODE ? ' checked="checked"' : '')?>>
											<label for="d<?=md5($PROPERTY_CODE.$CODE);?>" class="absolute rounded-color" style="background-color:#<?=$CODE;?>"><?=$VALUE?></label>
										</div>
									<?endforeach;?>
								</div>
								<?else:?>
									<select id="d<?=md5($PROPERTY_CODE.$CODE);?>" class=" border border-primary text-black text-sm rounded-standard focus:ring-primary focus:border-primary block w-full py-2.5 px-4">
										<?foreach ($PROPERTY['VALUES'] as $CODE => $VALUE):?>
											<option value="<?=$CODE;?>"<?=($SELECT_DEF[$PROPERTY_CODE] == $CODE ? ' selected' : '')?>><?=$VALUE?></option>
										<?endforeach;?>
									</select>
								<?endif;?>
							</div>
						<?endforeach;?>
						
						<div class="sm:w-1/2 mb-9">
							<div class="mb-6 text-lg">
								Цвет: <span class="text-base opacity-70 ms-1"><?= $arResult["PROPERTIES"]["SELECTED_COLOR"]["VALUE"] ?></span>
							</div>
							<div class="flex flex-wrap gap-2.5 mb-10">
								<? foreach ($arResult['PROPERTIES']['COLOR']['~VALUE'] as $key => $value) : ?>
									<div class="flex items-center justify-center border bg-secondary size-10 border-border_color rounded-color hover:border-primary">
										<input type="checkbox" class="checkbox bg-[<?= $arResult['PROPERTIES']['COLOR']['~DESCRIPTION'][$key]; ?>] size-8 rounded-color checked:bg-none checked:bg-[<?= $arResult['PROPERTIES']['COLOR']['~DESCRIPTION'][$key]; ?>]" required="">
										<label class="absolute opacity-0"><?= $arResult['PROPERTIES']['COLOR']['~DESCRIPTION'][$key]; ?></label>
									</div>
								<? endforeach; ?>
							</div>
						</div>
						<div class="sm:w-1/2 mb-9">
							<div class="flex justify-between">
								<label for="sizes" class="block mb-2 text-lg font-medium text-black">Размер:</label>

								<button data-modal-target="table-size" data-modal-toggle="table-size"
									class="block text-sm underline opacity-50 text-txt_blue decoration-dashed" type="button">
									Таблица размеров
								</button>
							</div>
							<select id="sizes"
								class=" border border-primary text-black text-sm rounded-standard focus:ring-primary focus:border-primary block w-full py-2.5 px-4">
								<option selected>XS</option>
								<option value="XL">XL</option>
								<option value="XXL">XXL</option>
								<option value="SL">SL</option>
							</select>
						</div>
						




						<h2 class="relative mb-2 text-lg font-semibold text-txt_dark">Описание:</h2>
						<div class="text-base opacity-70 text-txt_dark sm:w-5/6 mb-9"><?= $arResult["DETAIL_TEXT"] ?>
						</div>
						<div class="absolute top-0 overflow-hidden shadow-inner right-3 rounded-standard">
							<? if (!empty($arResult["PROPERTIES"]["PRICE_WITH_PRINT"]["VALUE"])): ?>
								<div class="px-4 pt-5 pb-4 bg-white">
									<div class="text-sm text-txt_dark">с печатью</div>
									<div class="text-2xl font-medium text-txt_blue"><?= $arResult["PROPERTIES"]["PRICE_WITH_PRINT"]["VALUE"] ?></div>
								</div>
							<? endif; ?>
							<? if (!empty($arResult["PROPERTIES"]["PRINT_ON_ITEM"]["VALUE"])): ?>
								<div class="flex flex-wrap px-4 pt-2 pb-2.5 bg-secondary">
									<div class="text-black text-mini sm:w-3/4">печать на вашем изделии:</div>
									<div class="text-mini text-txt_blue"><?= $arResult["PROPERTIES"]["PRINT_ON_ITEM"]["VALUE"] ?></div>
								</div>
							<? endif; ?>
							<? if (!empty($arResult["PROPERTIES"]["PRICE"]["VALUE"])): ?>
								<div class="flex justify-between px-4 py-3 bg-primary">
									<div class="text-sm text-white">без печати:</div>
									<div class="text-sm text-white"><?= $arResult["PROPERTIES"]["PRICE"]["VALUE"] ?></div>
								</div>
							<? endif; ?>
						</div>
					</form>
					<button data-modal-target="product-modal" data-modal-toggle="product-modal"
						class="relative inline-flex justify-between items-center gap-4 ps-4 pe-1 py-1 overflow-hidden font-medium transition-all rounded-[80px] bg-primary hover:bg-white group"
						type="button">
						<span
							class="absolute inset-0 border-0 group-hover:border-[40px] ease-linear duration-100 transition-all border-white rounded-full"></span>
						<span
							class="relative w-full text-lg text-white transition-colors duration-500 ease-in-out text-nowrap group-hover:text-txt_blue">оставить
							заявку</span>
						<span class="block rounded-full size-10 min-w-10"
							style="background: #fff url(<?= SITE_TEMPLATE_PATH; ?>/images/icons/btn-arrow.svg) no-repeat center/10px 17px;">
						</span>
					</button>

				</div>
			</div>
			<? if (!empty($arResult["PROPERTIES"]["CHARACTERISTICS"]["VALUE"])): ?>
				<div class="px-5 py-6">
					<h3 class="mb-5 text-lg text-txt_dark">Характеристики:</h3>

					<div class="grid grid-cols-12">
						<div class="col-span-12 lg:col-span-6">
							<?
							$half = ceil(count($arResult['PROPERTIES']['CHARACTERISTICS']['~VALUE']) / 2);
							foreach ($arResult['PROPERTIES']['CHARACTERISTICS']['~VALUE'] as $key => $value) :
								// Закрываем первый блок и открываем новый, когда достигаем середины
								if ($key == $half) {
									echo '</div><div class="col-span-12 lg:col-span-6">';
								}
							?>
								<div class="flex justify-between mb-3 text-base border-b border-dashed text-txt_dark">
									<div class="relative z-10 -mb-1 overflow-hidden bg-secondary opacity-70"><?= $value; ?></div>
									<div class="relative z-10 w-2/5 -mb-1 overflow-hidden bg-secondary"><?= $arResult['PROPERTIES']['CHARACTERISTICS']['~DESCRIPTION'][$key]; ?></div>
								</div>
							<? endforeach; ?>
						</div>
					</div>
				</div>
			<? endif; ?>
		</div>



		<h2 class="text-4xl font-semibold text-txt_dark mb-9">Вам может понравиться</h2>
		<? $APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"services",
			array(
				"COL" => 3,
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"NEWS_COUNT" => 4,
				"SORT_BY1" => $arParams["SORT_BY1"],
				"SORT_ORDER1" => $arParams["SORT_ORDER1"],
				"SORT_BY2" => $arParams["SORT_BY2"],
				"SORT_ORDER2" => $arParams["SORT_ORDER2"],
				"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
				"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
				"SET_TITLE" => $arParams["SET_TITLE"],
				"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
				"MESSAGE_404" => $arParams["MESSAGE_404"],
				"SET_STATUS_404" => $arParams["SET_STATUS_404"],
				"SHOW_404" => $arParams["SHOW_404"],
				"FILE_404" => $arParams["FILE_404"],
				"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
				"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
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
				"STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],

				"PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
				"PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
				"SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
				"IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
			),
			$component
		); ?>
	</div>
</section>