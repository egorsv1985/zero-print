<?
define('TYPE_PAGE', 'MAIN');
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?>
<?
	$APPLICATION->IncludeFile("includes/advantages.php", array(),);
	?>
<?
$APPLICATION->IncludeFile("includes/services-main.php", array(),);
?>
<?
$APPLICATION->IncludeFile("includes/how-works.php", array(),);
?>
<?
$APPLICATION->IncludeFile("includes/products.php", array(),);
?>
<?
$APPLICATION->IncludeFile("includes/works.php", array(),);
?>
<?
$APPLICATION->IncludeFile("includes/reviews.php", array(),);
?> 
<?
$APPLICATION->IncludeFile("includes/news.php", array(),);
?>
<?
$APPLICATION->IncludeFile("includes/delivery.php", array(),);
?><?
	require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
	?>