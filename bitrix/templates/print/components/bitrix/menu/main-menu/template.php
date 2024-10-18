<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
	<nav class="pt-12 mt-12 nav-menu lg:mt-0 lg:pt-0">
		<ul class="flex flex-col items-center justify-center gap-4 text-lg lg:flex-row lg:justify-between xl:gap-6 text-txt_dark">

			<?
			foreach ($arResult as $arItem):
				if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
					continue;
			?>
				<? if ($arItem["SELECTED"]): ?>
					<li><a href="<?= $arItem["LINK"] ?>" data-hover="<?= $arItem["TEXT"] ?>" class="selected relative text-nowrap  before:absolute before:bottom-0 before:left-0 before:overflow-hidden before:w-0 before:border-b-2 before:border-b-primary hover:text-txt_blue  before:transition-[width] before:duration-500 hover:before:w-full"><?= $arItem["TEXT"] ?></a></li>
				<? else: ?>
					<li><a href="<?= $arItem["LINK"] ?>" data-hover="<?= $arItem["TEXT"] ?>" class="relative text-nowrap  before:absolute before:bottom-0 before:left-0 before:overflow-hidden before:w-0 before:border-b-2 before:border-b-primary hover:text-txt_blue  before:transition-[width] before:duration-500 hover:before:w-full"><?= $arItem["TEXT"] ?></a></li>
				<? endif ?>

			<? endforeach ?>
		</ul>
	</nav>
<? endif ?>

