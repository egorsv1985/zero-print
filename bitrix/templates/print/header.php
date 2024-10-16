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
$asset->addCss('"https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
$asset->addJs('https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/scripts.js');


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
		<header class=" mt-2  header z-[9999] fixed top-0 left-0 right-0">
			<div class="container px-2 py-5 md:px-8 bg-secondary rounded-standard">
				<div class="z-40 grid items-center justify-between grid-cols-12 sm:gap-6">
					<div class="col-span-4 sm:col-span-3 lg:col-span-1 xl:col-span-2">
						<!-- на главной странице без ссылки -->
						<a href="/" class="block max-w-full text-center">
							<img src="./images/logo.png" alt="студия Современных методов печати"
								title="студия Современных методов печати" class="max-w-full" width="100" height="40" />
						</a>
					</div>
					<div class="xl:col-span-5 lg:col-span-6 menu lg:block">
						<nav class="pt-12 mt-12 nav-menu lg:mt-0 lg:pt-0">
							<ul
								class="flex flex-col items-center justify-center gap-4 text-lg lg:flex-row lg:justify-between xl:gap-6 text-txt_dark ">
								<li>
									<a href="index.html" data-hover="главная"
										class="relative text-nowrap  before:absolute before:bottom-0 before:left-0 before:overflow-hidden before:w-0 before:border-b-2 before:border-b-primary hover:text-txt_blue  before:transition-[width] before:duration-500 hover:before:w-full">главная</a>
								</li>
								<li>
									<a href="services.html" data-hover="услуги"
										class="relative text-nowrap  before:absolute before:bottom-0 before:left-0 before:overflow-hidden before:w-0 before:border-b-2 before:border-b-primary hover:text-txt_blue  before:transition-[width] before:duration-500 hover:before:w-full">услуги</a>
								</li>
								<li>
									<a href="portfolio.html" data-hover="портфолио"
										class="relative text-nowrap  before:absolute before:bottom-0 before:left-0 before:overflow-hidden before:w-0 before:border-b-2 before:border-b-primary hover:text-txt_blue  before:transition-[width] before:duration-500 hover:before:w-full">портфолио</a>
								</li>
								<li>
									<a href="about.html" data-hover="о компании"
										class="relative text-nowrap  before:absolute before:bottom-0 before:left-0 before:overflow-hidden before:w-0 before:border-b-2 before:border-b-primary hover:text-txt_blue  before:transition-[width] before:duration-500 hover:before:w-full">о
										компании</a>
								</li>
								<li>
									<a href="news.html" data-hover="новости"
										class="relative text-nowrap  before:absolute before:bottom-0 before:left-0 before:overflow-hidden before:w-0 before:border-b-2 before:border-b-primary hover:text-txt_blue  before:transition-[width] before:duration-500 hover:before:w-full">новости</a>
								</li>
							</ul>
						</nav>

					</div>
					<div class="hidden col-span-4 lg:col-span-3 sm:block">
						<form method="get" action="#" class="flex items-center justify-end gap-1 small-search">
							<label for="q" class="hidden"></label>
							<input class="border-none rounded-large py-[6px] w-full" type="text" name="q" value=""
								placeholder="">
							<button class="flex items-center justify-center rounded-full w-9 h-9 min-w-9 bg-primary"
								type="submit" value="">
								<img src="./images/icons/search.svg" alt="поиск" title="поиск" class="" width="16" height="16">
							</button>
						</form>
					</div>
					<div class="col-span-6 sm:col-span-3 lg:col-span-2">
						<div class="flex justify-center sm:justify-end">
							<ul class="flex items-center justify-between gap-2 max-w-36">
								<li>
									<a href="#"
										class="flex items-center justify-center transition duration-500 bg-white rounded-full w-9 h-9 group/messengers">
										<img src="./images/icons/insta.svg" alt="instagram" title="instagram" width="18"
											height="18" />
									</a>
								</li>
								<li>
									<a href="#"
										class="flex items-center justify-center transition duration-500 bg-white rounded-full w-9 h-9 group/messengers">
										<img src="./images/icons/viber.svg" alt="viber" title="viber" width="18" height="18" />
									</a>
								</li>
								<li>
									<a href="#"
										class="flex items-center justify-center transition duration-500 bg-white rounded-full w-9 h-9 group/messengers">
										<img src="./images/icons/tic-tok.svg" alt="tik-tok" title="tik-tok" width="18"
											height="18" />
									</a>
								</li>
							</ul>
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
	