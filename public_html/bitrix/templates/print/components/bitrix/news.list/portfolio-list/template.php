<section class="portfolio-main">
	<div class="container">
		<div class="px-8 pt-32 pb-36 bg-primary rounded-standard">
			<div class="flex flex-wrap justify-between gap-4">
				<div class="text-sm text-white ">
					Дата обновления:
					<span class="block opacity-70"> <?= date("d.m.Y"); ?> </span>
				</div>
				<div class="lg:w-1/2">
					<h1 class="mb-2 text-5xl font-semibold text-white">Портфолио наших работ</h1>
					<p class="text-lg text-white text-balance">Сайт рыба текст поможет дизайнеру, верстальщику, вебмастеру
						сгенерировать несколько абзацев более менее осмысленного текста рыбы.</p>
				</div>
			</div>
		</div>
		<div class="relative flex items-center justify-center ms-[22%] bg-white rounded-full size-16 down -top-9">
			<span class="rotate-45 border-b-4 border-r-4 size-5 border-dark"></span>
			<span class="rotate-45 border-b-4 border-r-4 size-5 border-dark"></span>
		</div>
		<div class="grid grid-cols-12 gap-x-8">
			<? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

				if (CModule::IncludeModule("millcom.phpthumb") && !empty($arItem["PREVIEW_PICTURE"]["SRC"])) {
					$arItem["PREVIEW_PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 9);
					$arItem["PREVIEW_PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 10);
				}
				?>
				<a href="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="fancybox col-span-12 xl:col-span-4 <?= ($key === 2) ? 'lg:row-span-2' : 'lg:col-span-6'; ?> mb-8">
					<div class="h-full rounded-standard">
						<picture>
							<source srcset="<?= $arItem["PREVIEW_PICTURE"]["WEBP"] ?>" type="image/webp"><img src="<?= $arItem["PREVIEW_PICTURE"]["PNG"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
								title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" class="w-full h-full rounded-standard" width="410" height="250">
						</picture>
					</div>
				</a>
			<? endforeach; ?>
		</div>
	</div>
</section>