<?
define('TYPE_PAGE', 'TEXT');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
?>
<?
$APPLICATION->IncludeFile("includes/about.php", array(),);
?>
<?
$APPLICATION->IncludeFile("includes/advantages.php", array(),);
?>
<?
$APPLICATION->IncludeFile("includes/how-works.php", array(),);
?>
<?
$APPLICATION->IncludeFile("includes/reviews.php", array(),);
?> 
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>