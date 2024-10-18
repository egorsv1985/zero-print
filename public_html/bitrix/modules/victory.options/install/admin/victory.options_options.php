<?
if (file_exists($_SERVER["DOCUMENT_ROOT"]."/local/modules/victory.options/admin/options.php")) {
    require_once($_SERVER["DOCUMENT_ROOT"]."/local/modules/victory.options/admin/options.php");
} else {
    require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/victory.options/admin/options.php");
}
?>