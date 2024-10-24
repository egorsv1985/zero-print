<?
define('TYPE_PAGE', 'TEXT');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><section class="pb-9 contacts">
	<div class="container">
		<div class="grid grid-cols-12 pb-3 bg-secondary rounded-standard lg:pb-0">
			<div class="col-span-12 lg:col-span-6">
				<!-- <? $APPLICATION->IncludeComponent(
					"bitrix:map.google.view",
					"",
					array(
						"API_KEY" => "",
						"CONTROLS" => array("SMALL_ZOOM_CONTROL", "TYPECONTROL", "SCALELINE"),
						"INIT_MAP_TYPE" => "ROADMAP",
						"MAP_DATA" => "a:3:{s:10:\"google_lat\";s:7:\"55.7383\";s:10:\"google_lon\";s:7:\"37.5946\";s:12:\"google_scale\";i:13;}",
						"MAP_HEIGHT" => "600",
						"MAP_ID" => "",
						"MAP_WIDTH" => "100%",
						"OPTIONS" => array("ENABLE_SCROLL_ZOOM", "ENABLE_DBLCLICK_ZOOM", "ENABLE_DRAGGING", "ENABLE_KEYBOARD")
					)
				); ?> -->
				<div class="map rounded-standard">
					
					<iframe class="rounded-standard" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8222.042973220954!2d76.86787966480959!3d43.23190272146466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x388369b401e7c4d3%3A0x1eff0b676b7e16e!2z0KHQtdC80LXQudC90YvQuSDQn9Cw0YDQug!5e0!3m2!1sru!2sby!4v1729668676920!5m2!1sru!2sby" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
			<div class="col-span-12 lg:col-span-6">
				<div class="flex flex-col px-4 pt-14">
					<h1 class="mb-10 text-5xl font-semibold text-txt_dark">Контакты</h1>
					<div class="grid grid-cols-12 gap-y-12 mb-11">
						<div class="col-span-12 sm:col-span-6">
							<div class="flex gap-2">
								<span class="mt-1"> <img src="/bitrix/templates/print/images/icons/map.svg" alt="Адрес" title="Адрес"> </span>
								<div class="flex flex-col gap-1">
									<h2 class="text-xl font-semibold">Адрес</h2>
									<a href="#" class="text-sm opacity-70 text-txt_dark">
										Алматы, Озерковская наб. 22/24с1 </a>
								</div>
							</div>
						</div>
						<div class="col-span-12 sm:col-span-6">
							<div class="flex gap-2">
								<span class="mt-1"> <img alt="График работы" src="/bitrix/templates/print/images/icons/time.svg" title="График работы"> </span>
								<div class="flex flex-col gap-1">
									<h2 class="text-xl font-semibold">График работы</h2>
									<a href="#" class="text-sm opacity-70 text-txt_dark">
										Пн–пт: с 9:00 до 21:00.<br>
										Сб, вс — с 10:00 до 21:00. </a>
								</div>
							</div>
						</div>
						<div class="col-span-12 sm:col-span-6">
							<div class="flex gap-2">
								<span class="mt-1"> <img alt="Email" src="/bitrix/templates/print/images/icons/mail.svg" title="Email"> </span>
								<div class="flex flex-col gap-1">
									<h2 class="text-xl font-semibold">Email</h2>
									<a href="#" class="text-sm opacity-70 text-txt_dark">
										zeroprint.kz@mail.ru, </a>
								</div>
							</div>
						</div>
						<div class="col-span-12 sm:col-span-6">
							<div class="flex gap-2">
								<span class="mt-1"> <img src="/bitrix/templates/print/images/icons/phone.svg" alt="Телефон" title="Телефон"> </span>
								<div class="flex flex-col gap-1">
									<h2 class="text-xl font-semibold">Телефон</h2>
									<a href="#" class="text-sm opacity-70 text-txt_dark">
										+7 747-15-84-039 </a>
								</div>
							</div>
						</div>
					</div>
					<ul class="flex items-center gap-4">
						<li> <a href="#" class="flex items-center justify-center transition duration-500 rounded-full group/messengers bg-primary size-12"> <img width="24" alt="instagram" src="/bitrix/templates/print/images/icons/insta-white.svg" height="24" title="instagram"> </a> </li>
						<li> <a href="#" class="flex items-center justify-center transition duration-500 rounded-full group/messengers bg-primary size-12"> <img width="24" alt="viber" src="/bitrix/templates/print/images/icons/viber-white.svg" height="24" title="viber"> </a> </li>
						<li> <a href="#" class="flex items-center justify-center transition duration-500 rounded-full group/messengers bg-primary size-12"> <img width="24" alt="tik-tok" src="/bitrix/templates/print/images/icons/tic-tok-white.svg" height="24" title="tik-tok"> </a> </li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section> <br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>