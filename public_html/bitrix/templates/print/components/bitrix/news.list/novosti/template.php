<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);
$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID']);
$rsSections = CIBlockSection::GetList(array(), $arFilter);
$SECTIONS = array();
while ($arSections = $rsSections->GetNext()) {
	$SECTIONS[$arSections['ID']] = $arSections['NAME'];
}
// print_r($arResult);
?>
<section class="news py-14">
	<div class="container">

		<h2 class="mb-3 text-4xl font-semibold">Последние новости</h2>
		<div class="flex flex-col items-end justify-between gap-3 mb-8 lg:flex-row">
			<div class="text-lg lg:w-3/5">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
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

				if (CModule::IncludeModule("millcom.phpthumb") && !empty($arItem["PREVIEW_PICTURE"]["SRC"])) {
					$arItem["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 1);
					$arItem["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 2);
				}
				?>
				<div id="<?= $this->GetEditAreaId($arItem['ID']); ?>"
					class="col-span-12 overflow-hidden transition-all duration-300 ease-out <?= ($key === 0) ? 'lg:col-span-6' : 'lg:col-span-3 md:col-span-6'; ?> bg-dark rounded-standard">
					<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="relative block h-full transition-all duration-300 ease-in-out news__box-img rounded-standard"
						style="background: url(<?= $arItem["PREVIEW_PICTURE"]["WEBP"] ?>) no-repeat center / cover;">
						<div class="grid grid-cols-12">
							<div class="<?= ($key === 0) ? 'col-span-12 md:col-span-8 lg:col-span-12' : 'col-span-12'; ?>">
								<picture>
									<source srcset="<?= $arItem["PREVIEW_PICTURE"]["WEBP"] ?>" type="image/webp">
									<img src="<?= $arItem["PREVIEW_PICTURE"]["PNG"] ?>"
										class="block w-full opacity-0 rounded-standard"
										alt="<?= htmlspecialchars($arItem['NAME']); ?>" title="<?= htmlspecialchars($arItem['NAME']); ?>">
								</picture>
							</div>
						</div>
						<div class="absolute bottom-0 w-full px-5 pb-5 start-0 md:w-4/5">
							<div class="mb-5 text-xl font-semibold text-white uppercase "><?= $arItem['NAME']; ?></div>
							<?php if (!empty($arItem['PREVIEW_TEXT'])): ?>
								<div class="text-lg text-white "><?= $arItem['PREVIEW_TEXT']; ?></div>
							<?php endif; ?>
							<div class="mt-8 border border-white rounded-[80px] py-2 px-5 w-full max-w-36 text-lg text-white transition-colors ">
								подробнее
							</div>
						</div>
					</a>
				</div>
			<? endforeach; ?>
		</div>
	</div>

</section>