<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */

/*TAGS*/
if ($arParams["SEARCH_PAGE"])
{
	foreach ($arResult["ITEMS"] as &$arItem)
	{
		if ($arItem["FIELDS"] && isset($arItem["FIELDS"]["TAGS"]))
		{
			$tags = array();
			foreach (explode(",", $arItem["FIELDS"]["TAGS"]) as $tag)
			{
				$tag = trim($tag, " \t\n\r");
				if ($tag)
				{
					$url = CHTTP::urlAddParams(
						$arParams["SEARCH_PAGE"],
						array(
							"tags" => $tag,
						),
						array(
							"encode" => true,
						)
					);
					$tags[] = '<a href="'.$url.'">'.$tag.'</a>';
				}
			}
			$arItem["FIELDS"]["TAGS"] = implode(", ", $tags);
		}
	}
	unset($arItem);
}

/*VIDEO & AUDIO*/
$mediaProperty = trim($arParams["MEDIA_PROPERTY"]);
if ($mediaProperty)
{
	if (is_numeric($mediaProperty))
	{
		$propertyFilter = array(
			"ID" => $mediaProperty,
		);
	}
	else
	{
		$propertyFilter = array(
			"CODE" => $mediaProperty,
		);
	}

	$elementIndex = array();
	$elementIds = array();
	foreach ($arResult["ITEMS"] as $i => $arItem)
	{
		$elementIds[$arItem["IBLOCK_ID"]][] = $arItem["ID"];
		$elementIndex[$arItem["ID"]] = array(
			"index" => $i,
			"PROPERTIES" => array(),
		);
	}

	if ($elementIds)
	{
		foreach ($elementIds as $iblockId => $ids)
		{
			CIBlockElement::GetPropertyValuesArray($elementIndex, $iblockId, array(
				"IBLOCK_ID" => $iblockId,
				"ID" => $ids,
			), $propertyFilter);
		}
		
		foreach ($elementIndex as $idx)
		{
			foreach ($idx["PROPERTIES"] as $property)
			{
				$url = '';
				if ($property["MULTIPLE"] == "Y" && $property["VALUE"])
				{
					$url = current($property["VALUE"]);
				}
				if ($property["MULTIPLE"] == "N" && $property["VALUE"])
				{
					$url = $property["VALUE"];
				}

				if (preg_match('/(?:youtube\\.com|youtu\\.be).*?[\\?\\&]v=([^\\?\\&]+)/i', $url, $matches))
				{
					$arResult["ITEMS"][$idx["index"]]["VIDEO"] = 'https://www.youtube.com/embed/'.$matches[1].'/?rel=0&controls=0showinfo=0';
				}
				elseif (preg_match('/(?:vimeo\\.com)\\/([0-9]+)/i', $url, $matches))
				{
					$arResult["ITEMS"][$idx["index"]]["VIDEO"] = 'https://player.vimeo.com/video/'.$matches[1];
				}
				elseif (preg_match('/(?:rutube\\.ru).*?\\/video\\/([0-9a-f]+)/i', $url, $matches))
				{
					$arResult["ITEMS"][$idx["index"]]["VIDEO"] = 'http://rutube.ru/video/embed/'.$matches[1].'?sTitle=false&sAuthor=false';
				}
				elseif (preg_match('/(?:soundcloud\\.com)/i', $url, $matches))
				{
					$arResult["ITEMS"][$idx["index"]]["SOUND_CLOUD"] = $url;
				}
			}
		}
	}
}

/*SLIDER*/
$sliderProperty = trim($arParams["SLIDER_PROPERTY"]);
if ($sliderProperty)
{
	if (is_numeric($sliderProperty))
	{
		$propertyFilter = array(
			"ID" => $sliderProperty,
		);
	}
	else
	{
		$propertyFilter = array(
			"CODE" => $sliderProperty,
		);
	}

	$elementIndex = array();
	$elementIds = array();
	foreach ($arResult["ITEMS"] as $i => $arItem)
	{
		$elementIds[$arItem["IBLOCK_ID"]][] = $arItem["ID"];
		$elementIndex[$arItem["ID"]] = array(
			"index" => $i,
			"PROPERTIES" => array(),
		);
	}

	if ($elementIds)
	{
		foreach ($elementIds as $iblockId => $ids)
		{
			CIBlockElement::GetPropertyValuesArray($elementIndex, $iblockId, array(
				"IBLOCK_ID" => $iblockId,
				"ID" => $ids,
			), $propertyFilter);
		}
		
		foreach ($elementIndex as $idx)
		{
			foreach ($idx["PROPERTIES"] as $property)
			{
				$files = array();
				if ($property["MULTIPLE"] == "Y" && $property["VALUE"])
				{
					$files = $property["VALUE"];
				}
				if ($property["MULTIPLE"] == "N" && $property["VALUE"])
				{
					$files = array($property["VALUE"]);
				}

				if ($files)
				{
					$arResult["ITEMS"][$idx["index"]]["SLIDER"] = array();
					foreach ($files as $fileId)
					{
						$file = CFile::GetFileArray($fileId);
						if ($file && $file["WIDTH"] > 0 && $file["HEIGHT"] > 0)
						{
							$arResult["ITEMS"][$idx["index"]]["SLIDER"][] = $file;
						}
					}
				}
			}
		}
	}
}

/* THEME */
$arParams["TEMPLATE_THEME"] = trim($arParams["TEMPLATE_THEME"]);
$arResult["NAV_PARAM"]["TEMPLATE_THEME"] = $arParams["TEMPLATE_THEME"];

$arResult["NAV_STRING"] = $arResult["NAV_RESULT"]->GetPageNavStringEx(
	$navComponentObject,
	$arParams["PAGER_TITLE"],
	$arParams["PAGER_TEMPLATE"],
	$arParams["PAGER_SHOW_ALWAYS"],
	$this->__component,
	$arResult["NAV_PARAM"]
);

// Параметры секции
foreach ($arResult['ITEMS'] as &$arItem) {

    $res = CIBlockSection::GetByID($arItem["IBLOCK_SECTION_ID"]);

    if ($ar_res = $res->GetNext()) {
        $arResult["SECTION"][$ar_res['SORT']]["ID"] = $arItem["IBLOCK_SECTION_ID"];
        $arResult["SECTION"][$ar_res['SORT']]["NAME"] = $ar_res['NAME'];
        $arResult["SECTION"][$ar_res['SORT']]["CODE"] = $ar_res['CODE'];
        $arResult["SECTION"][$ar_res['SORT']]["SORT"] = $ar_res['SORT'];

        $img = CFile::GetFileArray($ar_res['PICTURE']);
        $arResult["SECTION"][$ar_res['SORT']]["PICTURE"]["SRC"] = $img["SRC"];
        $arResult["SECTION"][$ar_res['SORT']]["PICTURE"]["DESCRIPTION"] = $img["DESCRIPTION"];
    }
    $res = CIBlockElement::GetList(
        array("SORT" => "ASC"),
        array("SECTION_ID" => $arItem["IBLOCK_SECTION_ID"], "ACTIVE" => "Y"),
        false,
        false,
        array("NAME", "CODE", "ID", "SORT")
    );

    $cnt = 0;
    while ($arFields = $res->GetNext()) {
        $arResult["SECTION"][$ar_res['SORT']]["ELEMENTS"][$cnt]["ID"] = $arFields["ID"];
        $arResult["SECTION"][$ar_res['SORT']]["ELEMENTS"][$cnt]["CODE"] = $arFields["CODE"];
        $arResult["SECTION"][$ar_res['SORT']]["ELEMENTS"][$cnt]["SORT"] = $arFields["SORT"];
        $arResult["SECTION"][$ar_res['SORT']]["ELEMENTS"][$cnt]["NAME"] = $arFields["NAME"];
        $arResult["SECTION"][$ar_res['SORT']]["ELEMENTS"][$cnt]["URL"] = $arItem["LIST_PAGE_URL"]. $arFields["CODE"] . "/";
        $cnt++;
    }
        //$arResult["SECTION"][$ar_res['SORT']]["URL"] = $arItem["LIST_PAGE_URL"]";
}
ksort($arResult["SECTION"]);