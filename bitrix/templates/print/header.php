<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();




if (!defined("HEADER"))
	define('HEADER', 'BLACK');

use \Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();
$asset->addCss('https://fonts.googleapis.com/css?family=Onest:regular,500,600&display=swap');
$asset->addJs('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js');
$asset->addJs('https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js');

$asset->addJs('https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js');
$asset->addCss('https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
$asset->addJs('https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/script.js');

if (CModule::IncludeModule("victory.options")) {
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<? $APPLICATION->ShowHead(); ?>
	<title><? $APPLICATION->ShowTitle(); ?></title>

	<link rel="apple-touch-icon" sizes="180x180" href="<?= SITE_TEMPLATE_PATH ?>/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= SITE_TEMPLATE_PATH ?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= SITE_TEMPLATE_PATH ?>/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?= SITE_TEMPLATE_PATH ?>/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?= SITE_TEMPLATE_PATH ?>/favicon/safari-pinned-tab.svg" color="#000000">
	<link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-config" content="<?= SITE_TEMPLATE_PATH ?>/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

</head>

<body class="leading-tight bg-white font-Onest">
	<div id="panel">
		<? $APPLICATION->ShowPanel(); ?>
	</div>
	<div class="wrapper">
		<header class=" mt-2  header z-[9999]  top-0 left-0 right-0">
			<div class="container px-2 py-5 md:px-8 bg-secondary rounded-standard">
				<div class="z-40 grid items-center justify-between grid-cols-12 sm:gap-6">
					<div class="col-span-4 sm:col-span-3 lg:col-span-1 xl:col-span-2">
						<!-- на главной странице без ссылки -->
						<? if ($APPLICATION->GetCurPage() == '/') : ?>
							<picture>
								<source srcset="<?= SITE_TEMPLATE_PATH; ?>/images/logo.webp" type="image/webp">
								<img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo.png" loading="lazy" alt="студия Современных методов печати" title="студия Современных методов печати" class="h-auto mw-100" width="100" height="40">
							</picture>
						<? else : ?>
							<a href="/" class="text-center d-block mw-100">
								<picture>
									<source srcset="<?= SITE_TEMPLATE_PATH; ?>/images/logo.webp" type="image/webp">
									<img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo.png" loading="lazy" alt="студия Современных методов печати" title="студия Современных методов печати" class="h-auto mw-100" width="100" height="40">
								</picture>
							</a>
						<? endif; ?>
					</div>
					<div class="xl:col-span-5 lg:col-span-6 menu lg:block">
						<? $APPLICATION->IncludeComponent(
							"bitrix:menu",
							"main-menu",
							array(
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "left",
								"DELAY" => "N",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_GET_VARS" => array(),
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"ROOT_MENU_TYPE" => "top",
								"USE_EXT" => "Y",
								"COMPONENT_TEMPLATE" => "main-menu"
							),
							false
						); ?>
					</div>
					<div class="hidden col-span-4 lg:col-span-3 sm:block">
						<form method="get" action="<?= $APPLICATION->GetCurDir(); ?>" class="flex items-center justify-end gap-1 small-search">
							<label for="q" class="hidden"></label>
							<input class="border-none rounded-large py-[6px] w-full px-3 text-base uppercase font-normal " type="text" name="q" value="<?= (isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '') ?>" placeholder="">
							<button class="flex items-center justify-center rounded-full w-9 h-9 min-w-9 bg-primary" type="submit" value=""><img src="<?= SITE_TEMPLATE_PATH; ?>/images/icons/search.svg" alt="поиск" title="поиск" class="" width="16" height="16"></button>
						</form>

					</div>
					<div class="col-span-6 sm:col-span-3 lg:col-span-2">
						<div class="flex justify-center sm:justify-end">
							<?
							$insta_link = \Victory\Options\CVictoryOptions::getOptionValue('insta_link');
							$vb_link = \Victory\Options\CVictoryOptions::getOptionValue('vb_link');
							$tictoc_link = \Victory\Options\CVictoryOptions::getOptionValue('tictoc_link');
							if ($insta_link || $vb_link || $tictoc_link) :
							?>
								<ul class="flex items-center justify-between gap-2 max-w-36">
									<? if ($insta_link) : ?>
										<li class="social__item">
											<a href="<?= $insta_link ?>" target="_blank" class="flex items-center justify-center transition duration-500 bg-white rounded-full w-9 h-9 group/messengers">
												<img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/insta.svg" width="18" height="18" alt="instagram" title="instagram" />
											</a>
										</li>
									<? endif; ?>
									<? if ($vb_link) : ?>
										<li class=" social__item">
											<a href="<?= $vb_link ?>" target="_blank" class="flex items-center justify-center transition duration-500 bg-white rounded-full w-9 h-9 group/messengers">
												<img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/viber.svg" width="18" height="18" alt="viber" title="viber" />
											</a>
										</li>
									<? endif; ?>
									<? if ($tictoc_link) : ?>
										<li class="social__item">
											<a href="<?= $tictoc_link ?>" target="_blank" class="flex items-center justify-center transition duration-500 bg-white rounded-full w-9 h-9 group/messengers">
												<img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/tic-tok.svg" width="18" height="18" alt="tic-tok" title="tic-tok" />
											</a>
										</li>
									<? endif; ?>
								</ul>
							<? endif; ?>
							<!-- <ul class="flex items-center justify-between gap-2 max-w-36">
								<li>
									<a href="#"
										class="flex items-center justify-center transition duration-500 bg-white rounded-full w-9 h-9 group/messengers">
										<img src="<?= SITE_TEMPLATE_PATH; ?>/images/icons/insta.svg" alt="instagram" title="instagram" width="18"
											height="18" />
									</a>
								</li>
								<li>
									<a href="#"
										class="flex items-center justify-center transition duration-500 bg-white rounded-full w-9 h-9 group/messengers">
										<img src="<?= SITE_TEMPLATE_PATH; ?>/images/icons/viber.svg" alt="viber" title="viber" width="18" height="18" />
									</a>
								</li>
								<li>
									<a href="#"
										class="flex items-center justify-center transition duration-500 bg-white rounded-full w-9 h-9 group/messengers">
										<img src="<?= SITE_TEMPLATE_PATH; ?>/images/icons/tic-tok.svg" alt="tik-tok" title="tik-tok" width="18"
											height="18" />
									</a>
								</li>
							</ul> -->
						</div>
					</div>
					<div class="col-span-2 lg:hidden ">
						<div class="flex justify-end">
							<button type="button" class="w-full header__burger burger" aria-label="Открыть меню">
								<span class="relative flex items-center justify-center w-full h-full burger__inner">
									<span></span>
								</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</header>
		<main>
			<div class="container">
				<? if (TYPE_PAGE == 'TEXT' || TYPE_PAGE == 'CONTACTS') : ?>
					<? $APPLICATION->IncludeComponent(
						"bitrix:breadcrumb",
						"",
						array(
							"PATH" => "",
							"SITE_ID" => SITE_ID,
							"START_FROM" => "0"
						)
					); ?>
				<? endif; ?>
				<? if (TYPE_PAGE == 'MAIN') : ?>
					<section class="pt-10 mt-20 mb-4 overflow-hidden hero pb-9">
						<div class="flex flex-col px-8 pt-12 rounded-standard lg:pt-48 hero__bg "
							style="background: #E4E9EE url(<?= SITE_TEMPLATE_PATH ?>/images/bg-main-removebg.png) no-repeat right 0% / 100%">
							<h1 class="text-6xl lg:max-w-[85%]  text-txt_dark font-semibold uppercase mb-5">студия <span
									class="text-txt_blue">Современных</span> методов печати</h1>
							<p class="text-txt_dark lg:max-w-[42%] text-2xl mb-14 hero__desc relative before:hidden md:before:block before:left-1/2 md:before:left-1/3 lg:before:left-[57%]"><?= \Victory\Options\CVictoryOptions::getOptionValue('hero_description'); ?></p>
							<button data-modal-target="callback-modal" data-modal-toggle="callback-modal"
								class="relative inline-flex lg:mb-32 mb-12 max-w-[220px]  justify-between items-center gap-4 ps-4 pe-1 py-1 overflow-hidden font-medium transition-all rounded-[80px] bg-primary hover:bg-white group"
								type="button">
								<span
									class="absolute inset-0 border-0 group-hover:border-[40px] ease-linear duration-100 transition-all border-white rounded-full"></span>
								<span
									class="relative w-full text-lg text-white transition-colors duration-500 ease-in-out text-nowrap group-hover:text-txt_blue">оставить
									заявку</span>
								<span class="block w-10 h-10 rounded-full min-w-10"
									style="background: #fff url(<?= SITE_TEMPLATE_PATH ?>/images/icons/btn-arrow.svg) no-repeat center/10px 17px;">

								</span>
							</button>
							<div
								class="relative inline-flex items-center justify-center w-16 h-16 mx-auto bg-white rounded-full down top-9">
								<span class="w-5 h-5 rotate-45 border-b-4 border-r-4 border-dark"></span>
								<span class="w-5 h-5 rotate-45 border-b-4 border-r-4 border-dark"></span>
							</div>
						</div>
					</section>
				<? endif; ?>