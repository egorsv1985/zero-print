<?
define('TYPE_PAGE', 'TEXT');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<section class="pb-12 contacts">
	<div class="container">
		<div class="grid grid-cols-12 pb-3 bg-secondary rounded-standard lg:pb-0">
			<div class="col-span-12 lg:col-span-6">
				<img src="<?= SITE_TEMPLATE_PATH ?>/images/map.png" alt="">
			</div>
			<div class="col-span-12 lg:col-span-6">
				<div class="flex flex-col px-4 pt-14">
					<h1 class="mb-10 text-5xl font-semibold text-txt_dark">Контакты</h1>
					<div class="grid grid-cols-12 gap-y-12 mb-11">
						<div class="col-span-12 sm:col-span-6">
							<div class="flex gap-2">
								<span class="mt-1">
									<img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/map.svg" alt="Адрес" title="Адрес" />
								</span>
								<div class="flex flex-col gap-1">
									<h2 class="text-xl font-semibold">Адрес</h2>
									<a href="#" class="text-sm opacity-70 text-txt_dark">
										Алматы, Озерковская наб. 22/24с1
									</a>
								</div>
							</div>
						</div>
						<div class="col-span-12 sm:col-span-6">
							<div class="flex gap-2">
								<span class="mt-1">
									<img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/time.svg" alt="График работы" title="График работы" />
								</span>
								<div class="flex flex-col gap-1">
									<h2 class="text-xl font-semibold">График работы</h2>
									<a href="#" class="text-sm opacity-70 text-txt_dark">
										Пн–пт: с 9:00 до 21:00.<br>Сб, вс — с 10:00 до 21:00.
									</a>
								</div>
							</div>
						</div>
						<div class="col-span-12 sm:col-span-6">
							<div class="flex gap-2">
								<span class="mt-1">
									<img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/mail.svg" alt="Email" title="Email" />
								</span>
								<div class="flex flex-col gap-1">
									<h2 class="text-xl font-semibold">Email</h2>
									<a href="#" class="text-sm opacity-70 text-txt_dark">
										zeroprint.kz@mail.ru,
									</a>
								</div>
							</div>
						</div>
						<div class="col-span-12 sm:col-span-6">
							<div class="flex gap-2">
								<span class="mt-1">
									<img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/phone.svg" alt="Телефон" title="Телефон" />
								</span>
								<div class="flex flex-col gap-1">
									<h2 class="text-xl font-semibold">Телефон</h2>
									<a href="#" class="text-sm opacity-70 text-txt_dark">
										+7 747-15-84-039
									</a>
								</div>
							</div>
						</div>
					</div>
					<ul class="flex items-center gap-4">
						<li>
							<a href="#"
								class="flex items-center justify-center transition duration-500 rounded-full group/messengers bg-primary size-12">
								<img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/insta-white.svg" alt="instagram" title="instagram" width="24"
									height="24" />
							</a>
						</li>
						<li>
							<a href="#"
								class="flex items-center justify-center transition duration-500 rounded-full group/messengers bg-primary size-12">
								<img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/viber-white.svg" alt="viber" title="viber" width="24" height="24" />
							</a>
						</li>
						<li>
							<a href="#"
								class="flex items-center justify-center transition duration-500 rounded-full group/messengers bg-primary size-12">
								<img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/tic-tok-white.svg" alt="tik-tok" title="tik-tok" width="24" height="24" />
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>