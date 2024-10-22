<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if (empty($arResult))
    return "";
$strReturn = '
<div class="container">
<nav class="flex mb-4" aria-label="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
<ol class="inline-flex items-center space-x-2 text-sm breadcrumb">';

$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialchars($arResult[$index]["TITLE"]);


    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
        $strReturn .= '
			<li class="inline-flex items-center breadcrumb-item" id="bx_breadcrumb_' . $index . '" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<meta itemprop="position" content="' . ($index + 1) . '" />
				<a href="' . $arResult[$index]["LINK"] . '" class="relative flex items-center text-txt_breadcrumb" title="' . $title . '" itemprop="item">
					<span itemprop="name">' . $title . '</span>
				</a>
			</li>';
    } else {
        $strReturn .= '
			<li class="relative flex items-center breadcrumb-item active text-txt_breadcrumb after:absolute after:top-1/2 after:size-px after:bg-txt_breadcrumb after:-left-1" aria-current="page">
            <span>' . $title . '</span>
            </li>';
    }
}

$strReturn .= '
</ol>
</nav>
</div>';
return $strReturn;
