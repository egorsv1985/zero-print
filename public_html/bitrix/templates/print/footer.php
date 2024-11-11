<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
</main>
<footer class="footer bg-secondary rounded-t-standard mt-11">
	<div class="container">
		<div class="border-b-[#EBEBEB] border-b border-solid py-12">
			<div class="grid grid-cols-12 gap-8">
				<div class="col-span-12 pt-2 md:col-span-3 lg:col-span-2">
					<!-- на главной странице без ссылки -->
					<a href="/" class="block max-w-full mb-6 text-center">
						<img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo.png" alt="студия Современных методов печати"
							title="студия Современных методов печати" class="max-w-full" width="100" height="40" />
					</a>
					<?
					$APPLICATION->IncludeFile("includes/social.php", array(),);
					?>

				</div>
				<div class="col-span-12 md:col-span-7 lg:col-span-10">
					<div class="mb-5 lg:w-2/3">
						<h2 class="mb-5 text-4xl font-semibold">Не нашли, что искали?</h2>
						<div class="text-lg">Оставляйте заявку. Наш менеджер перезвонит вам в ближайшее время и ответит на ваши
							вопросы.
						</div>
					</div>
					<form class="grid justify-between grid-cols-10 gap-8" action="#">
						<div class="col-span-12 md:col-span-6 xl:col-span-4">
							<label for="name" class="hidden">Введите имя</label>
							<input type="text" name="name" id="name"
								class="block w-full px-5 py-4 text-lg bg-white border-none rounded-standard focus:outline-none text-black/50"
								placeholder="Введите имя" required="" />
						</div>
						<div class="col-span-12 md:col-span-6 xl:col-span-4 ">
							<label for="tel" class="hidden">+7 (___)-___-__-__</label>
							<input type="tel" name="tel" id="tel" placeholder="+7 (___)-___-__-__"
								class="block w-full p-4 text-lg bg-white border-none rounded-standard focus:outline-none form-phone text-black/50"
								required="" />
						</div>

						<button type="submit"
							class="relative xl:col-span-2 col-span-12 inline-flex justify-between items-center gap-4 py-2 px-5 overflow-hidden font-medium transition-all border border-primary rounded-[80px]  hover:bg-primary group">
							<span
								class="absolute inset-0 border-0 group-hover:border-[40px] ease-linear duration-100 transition-all border-primary rounded-full"></span>
							<span
								class="relative w-full text-lg transition-colors duration-500 ease-in-out text-txt_blue text-nowrap group-hover:text-white">оставить
								заявку</span>
						</button>
					</form>
				</div>
			</div>
		</div>
		<div class="py-8">
			<div class="flex justify-between text-lg ">
				<div>© 2023 zeroprint</div>
				<a href="#">Карта сайта</a>
				<a href="#">Разработка сайта: АТИБ</a>
			</div>
		</div>
	</div>
</footer>
<div id="product-modal" tabindex="-1" aria-hidden="true"
	class="hidden  overflow-x-hidden fixed top-0 inset-x-0 z-[120] justify-end w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
	<div class="relative w-full max-w-[580px] max-h-full">
		<!-- Modal content -->
		<div class="relative px-10 pt-6 pb-10 bg-white shadow-table rounded-standard">
			<!-- Modal header -->
			<div class="flex flex-col justify-between ">
				<button type="button" class="inline-flex items-center justify-center w-8 h-8 bg-transparent ms-auto"
					data-modal-hide="product-modal">
					<svg width="15.556763" height="15.556396" viewBox="0 0 15.5568 15.5564" fill="none"
						xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<defs />
						<line id="Line 20" x1="0.353577" y1="0.353516" x2="15.202820" y2="15.202637" stroke="#000000"
							stroke-opacity="1.000000" stroke-width="1.000000" />
						<line id="Line 21" x1="15.203186" y1="0.353516" x2="0.353943" y2="15.202637" stroke="#000000"
							stroke-opacity="1.000000" stroke-width="1.000000" />
					</svg>
					<span class="sr-only">Close modal</span>
				</button>
				<h3 class="mb-6 text-3xl text-center text-txt_dark">
					Оставить заявку
				</h3>
			</div>
			<!-- Modal body -->
			<? $APPLICATION->IncludeComponent(
	"bitrix:iblock.element.add.form", 
	"product-modal", 
	array(
		"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
		"CUSTOM_TITLE_DETAIL_PICTURE" => "",
		"CUSTOM_TITLE_DETAIL_TEXT" => "",
		"CUSTOM_TITLE_IBLOCK_SECTION" => "",
		"CUSTOM_TITLE_NAME" => "Введите имя",
		"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
		"CUSTOM_TITLE_PREVIEW_TEXT" => "",
		"CUSTOM_TITLE_TAGS" => "",
		"DEFAULT_INPUT_SIZE" => "30",
		"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
		"ELEMENT_ASSOC" => "CREATED_BY",
		"GROUPS" => array(
			0 => "2",
		),
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "FORMS",
		"LEVEL_LAST" => "Y",
		"LIST_URL" => "",
		"MAX_FILE_SIZE" => "0",
		"MAX_LEVELS" => "100000",
		"MAX_USER_ENTRIES" => "100000",
		"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
		"PROPERTY_CODES" => array(
			0 => "23",
			1 => "NAME",
		),
		"PROPERTY_CODES_REQUIRED" => array(
			0 => "23",
			1 => "NAME",
		),
		"RESIZE_IMAGES" => "N",
		"SEF_MODE" => "N",
		"STATUS" => "ANY",
		"STATUS_NEW" => "N",
		"USER_MESSAGE_ADD" => "Спасибо, Ваша заявка успешно сохранена!",
		"USER_MESSAGE_EDIT" => "Спасибо, Ваша заявка успешно сохранена!",
		"USE_CAPTCHA" => "N",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"COMPONENT_TEMPLATE" => "product-modal"
	),
	false
); ?>
		</div>
	</div>
</div>
<div id="table-size" tabindex="-1" aria-hidden="true" data-modal-placement="top-right"
	class="hidden  overflow-x-hidden absolute top-0 inset-x-0 z-[120] justify-end h-dvh  w-full transition-all duration-300 ease-in-out">
	<div class="relative w-full max-w-[530px] h-dvh transition-all duration-300 ease-in-out">
		<!-- Modal content -->
		<div class="relative bg-white shadow-table rounded-bl-standard h-dvh">
			<!-- Modal header -->
			<div class="flex flex-col justify-between p-4 md:p-5 ">
				<button type="button" class="inline-flex items-center justify-center w-8 h-8 bg-transparent ms-auto"
					data-modal-hide="table-size">
					<svg width="15.556763" height="15.556396" viewBox="0 0 15.5568 15.5564" fill="none"
						xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<defs />
						<line id="Line 20" x1="0.353577" y1="0.353516" x2="15.202820" y2="15.202637" stroke="#000000"
							stroke-opacity="1.000000" stroke-width="1.000000" />
						<line id="Line 21" x1="15.203186" y1="0.353516" x2="0.353943" y2="15.202637" stroke="#000000"
							stroke-opacity="1.000000" stroke-width="1.000000" />
					</svg>
					<span class="sr-only">Close modal</span>
				</button>
				<h3 class="text-5xl text-txt_dark ">
					Таблица размеров
				</h3>
			</div>
			<!-- Modal body -->
			<div class="p-4 space-y-4 md:p-5">
				<table class="min-w-full bg-white">
					<thead>
						<tr>
							<th class="w-16 py-2 text-base font-semibold text-left text-txt_dark">
								Размер
							</th>
							<th class="w-16 py-2 text-base font-semibold text-left text-txt_dark">
								Длина, см
							</th>
							<th class="w-16 py-2 text-base font-semibold text-left text-txt_dark">
								Обхват
								груди, см</th>
							<th class="w-16 py-2 text-base font-semibold text-left text-txt_dark">
								Плечо, см
							</th>
							<th class="w-16 py-2 text-base font-semibold text-left text-txt_dark">
								Длина
								рукава, см</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd:bg-secondary">
							<td class="py-2 text-base text-txt_dark">XS / 42</td>
							<td class="py-2 text-base text-txt_dark">69</td>
							<td class="py-2 text-base text-txt_dark">92</td>
							<td class="py-2 text-base text-txt_dark">11</td>
							<td class="py-2 text-base text-txt_dark">20</td>
						</tr>
						<tr class="odd:bg-secondary">
							<td class="py-2 text-base text-txt_dark">S / 44</td>
							<td class="py-2 text-base text-txt_dark">72</td>
							<td class="py-2 text-base text-txt_dark">98</td>
							<td class="py-2 text-base text-txt_dark">12</td>
							<td class="py-2 text-base text-txt_dark">22</td>
						</tr>
						<tr class="odd:bg-secondary">
							<td class="py-2 text-base text-txt_dark">M / 46</td>
							<td class="py-2 text-base text-txt_dark">73</td>
							<td class="py-2 text-base text-txt_dark">104</td>
							<td class="py-2 text-base text-txt_dark">13</td>
							<td class="py-2 text-base text-txt_dark">23</td>
						</tr>
						<tr class="odd:bg-secondary">
							<td class="py-2 text-base text-txt_dark">L / 48</td>
							<td class="py-2 text-base text-txt_dark">74</td>
							<td class="py-2 text-base text-txt_dark">108</td>
							<td class="py-2 text-base text-txt_dark">14</td>
							<td class="py-2 text-base text-txt_dark">23</td>
						</tr>
						<tr class="odd:bg-secondary">
							<td class="py-2 text-base text-txt_dark">XL / 50</td>
							<td class="py-2 text-base text-txt_dark">77</td>
							<td class="py-2 text-base text-txt_dark">112</td>
							<td class="py-2 text-base text-txt_dark">15</td>
							<td class="py-2 text-base text-txt_dark">23</td>
						</tr>
						<tr class="odd:bg-secondary">
							<td class="py-2 text-base text-txt_dark">2XL / 52</td>
							<td class="py-2 text-base text-txt_dark">78</td>
							<td class="py-2 text-base text-txt_dark">114</td>
							<td class="py-2 text-base text-txt_dark">15</td>
							<td class="py-2 text-base text-txt_dark">24</td>
						</tr>
						<tr class="odd:bg-secondary">
							<td class="py-2 text-base text-txt_dark">3XL / 54</td>
							<td class="py-2 text-base text-txt_dark">79</td>
							<td class="py-2 text-base text-txt_dark">118</td>
							<td class="py-2 text-base text-txt_dark">16</td>
							<td class="py-2 text-base text-txt_dark">25</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</body>

</html>