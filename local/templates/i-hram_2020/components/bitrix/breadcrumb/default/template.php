<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 *
 * <span class="mr-2"><a href="index.html">Главная <i class="ion-ios-arrow-forward"></i></a></span>
 * <span>Расписание богослужений <i class="ion-ios-arrow-forward"></i></span>
 *
 */

global $APPLICATION;

if(empty($arResult))
	return "";
$strReturn = '';
$strReturn .= '<p class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';
$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1) {
		$strReturn .= '<span class="mr-2" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">'.$title.' <i class="ion-ios-arrow-forward"></i></a>
<meta itemprop="name" content="' . $title . '" >
<meta itemprop="position" content="' . ($index + 1) . '" ></span>';
	}
	else {
		$strReturn .= '<span>' .$title. '</span>';
	}
}
$strReturn .= '</p>';
return $strReturn;