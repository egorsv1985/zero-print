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
<!-- <pre>
	<? print_r($arResult); ?>
</pre> -->

<!-- <section class="py-12 my-3 services-main">
	<div class="container">
		<h2 class="mb-3 text-4xl font-semibold">Виды услуг</h2>
		<div class="flex flex-col items-end justify-between gap-3 mb-8 lg:flex-row">
			<div class="text-lg lg:w-3/5">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
				несколько абзацев более менее осмысленного
				текста рыбы.</div>
			<a href="/uslugi/" class="text-lg font-medium pe-4 services-main__link text-txt_blue hover:text-txt_dark">перейти к
				услугам</a>
		</div>
		<div class="grid grid-cols-12 gap-x-8 gap-y-10">
			<? foreach ($arResult['SECTIONS'] as $key => $arSection):
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
				if (CModule::IncludeModule("millcom.phpthumb")) {
					$arSection["PICTURE"]["WEBP"] = CMillcomPhpThumb::generateImg($arSection["PICTURE"]["SRC"], 5);
					$arSection["PICTURE"]["PNG"] = CMillcomPhpThumb::generateImg($arSection["PICTURE"]["SRC"], 6);
				}
				// Добавляем класс для последнего элемента
				$colClass = ($key === array_key_last($arResult['SECTIONS'])) ? 'xl:col-start-5 xl:col-end-[-1] col-span-auto' : 'col-span-12 md:col-span-6 xl:col-span-4';
			?>
				<a href="<?= $arSection['SECTION_PAGE_URL']; ?>" class="flex flex-col gap-6  <?= $colClass; ?>">
					<div class="services-main__box-img rounded-standard">
						<picture>
							<source srcset="<?= $arSection["PICTURE"]["WEBP"] ?>" type="image/webp">
							<img src="<?= $arSection["PICTURE"]["PNG"] ?>"
								class="w-full h-auto rounded-standard" width="408" height="300"
								alt="<?= htmlspecialchars($arSection['NAME']); ?>" title="<?= htmlspecialchars($arSection['NAME']); ?>">
						</picture>
					</div>
					<div class="text-xl font-semibold uppercase "><?= $arSection['NAME'] ?></div>
				</a>
			<? endforeach ?>
		</div>
	</div>
</section> -->


<section class="py-12 my-3 services-main">
	<div class="container">
		<h2 class="mb-3 text-4xl font-semibold">Виды услуг</h2>
		<div class="flex flex-col items-end justify-between gap-3 mb-8 lg:flex-row">
			<div class="text-lg lg:w-3/5">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
				несколько абзацев более менее осмысленного
				текста рыбы.</div>
			<a href="/uslugi/" class="text-lg font-medium pe-4 services-main__link text-txt_blue hover:text-txt_dark">перейти к
				услугам</a>
		</div>
		<div class="grid grid-cols-12 gap-x-8 gap-y-10">
			<? foreach ($arResult['SECTIONS'] as $key => $arSection):
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				if (CModule::IncludeModule("millcom.phpthumb")) {
					$imageSrcWebp = CMillcomPhpThumb::generateImg($arSection["PICTURE"]["SRC"], 5);
					$imageSrcPng = CMillcomPhpThumb::generateImg($arSection["PICTURE"]["SRC"], 6);
				}

				// Создаем CSS для каждого элемента
				$CSS = "#image-{$arSection['ID']} .services-main__box-img { 
                background-image: url('{$imageSrcPng}');
                /* Для Chrome и Safari */
                background-image: -webkit-image-set(url('{$imageSrcPng}'));
                /* Для Firefox */
                background-image: image-set(
                    url('{$imageSrcWebp}') type('image/webp'),
                    url('{$imageSrcPng}')
                );
            }";

				// Добавляем класс для последнего элемента
				$colClass = ($key === array_key_last($arResult['SECTIONS'])) ? 'col-span-full xl:col-start-5' : 'col-span-12  md:col-span-6 xl:col-span-4';


				// Добавляем стили в <head>
				$APPLICATION->AddHeadString('<style>' . $CSS . '</style>');
			?>
				<a href="<?= $arSection['SECTION_PAGE_URL']; ?>" id="image-<?= $arSection['ID'] ?>" class="<?= $colClass; ?>">					
							<div class="bg-center bg-no-repeat bg-cover services-main__box-img rounded-standard pt-[300px] mb-6">							
							</div>
							<div class="text-xl font-semibold uppercase"><?= $arSection['NAME'] ?></div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>