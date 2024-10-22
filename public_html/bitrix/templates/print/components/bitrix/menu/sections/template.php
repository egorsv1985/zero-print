<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>


	<?
	foreach ($arResult as $arItem):
		if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
			continue;
	?>
		<? if ($arItem["SELECTED"]): ?>
			<a href="<?= $arItem["LINK"] ?>" class="px-5 py-2 text-center text-white border border-primary/40 rounded-big selected bg-primary me-2">
				<span class="py-1">
					<?= $arItem["TEXT"] ?>
				</span>
			</a>
		<? else: ?>
			<a href="<?= $arItem["LINK"] ?>" class="px-5 py-2 text-center transition-all duration-300 ease-in-out border border-primary/40 rounded-big hover:text-white hover:bg-primary me-2">
				<span class="py-1">
					<?= $arItem["TEXT"] ?>
				</span>
			</a>
		<? endif ?>

	<? endforeach ?>

<? endif ?>