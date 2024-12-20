<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");
?>


<div class="mt-4 font-bold text-white text-balance font-display text-3xl sm:text-[40px] leading-tight">404!</div>
<div class="text-white">

	<?
	$APPLICATION->IncludeComponent(
		"bitrix:main.map",
		".default",
		array(
			"LEVEL" => "3",
			"COL_NUM" => "2",
			"SHOW_DESCRIPTION" => "Y",
			"SET_TITLE" => "Y",
			"CACHE_TIME" => "36000000",
			"COMPONENT_TEMPLATE" => ".default",
			"CACHE_TYPE" => "A"
		),
		false
	); ?>

</div>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>