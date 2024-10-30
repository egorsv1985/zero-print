<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>


	<?
	foreach ($arResult as $arItem):
		if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
			continue;
	?>
		<? if ($arItem["SELECTED"]): ?>
			<a href="<?= $arItem["LINK"] ?>" class="px-5 py-2 text-center text-white transition-all duration-300 ease-in-out bg-primary bg-light_gray me-2 rounded-big hover:text-white hover:bg-primary selected">
				<span class="py-1 pe-5 before:absolute before:right-0 before:top-1/2 before:size-[6px] before:-translate-y-1/2 relative">
					<?= $arItem["TEXT"] ?>
				</span>
			</a>
		<? else: ?>
			<a href="<?= $arItem["LINK"] ?>" class="px-5 py-2 text-center transition-all duration-300 ease-in-out bg-light_gray me-2 rounded-big hover:text-white hover:bg-primary">
				<span class="py-1">
					<?= $arItem["TEXT"] ?>
				</span>
			</a>
		<? endif ?>
	<? endforeach ?>
<? endif ?>
