<?php

// Получение SEO настроек страницы
//    $iProperty["ELEMENT_META_TITLE"] => Шаблон META TITLE
//    $iProperty["ELEMENT_META_KEYWORDS"] => Шаблон META KEYWORDS
//    $iProperty["ELEMENT_META_DESCRIPTION"] => Шаблон META DESCRIPTION
//    $iProperty["ELEMENT_PAGE_TITLE"] => Заголовок элемента
//    $iProperty["ELEMENT_PREVIEW_PICTURE_FILE_ALT]" => Alt для картинок анонса элементов
//    $iProperty["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"] => Title для картинок анонса элементов
//    $iProperty["ELEMENT_DETAIL_PICTURE_FILE_ALT"] => Alt для детальных картинок элементов
//    $iProperty["ELEMENT_DETAIL_PICTURE_FILE_TITLE"] => Title для детальных картинок элементов

if ($iBlockCode && $pageCode) {
    $res = CIBlockElement::GetList(array(), array('CODE' => $pageCode), false, false, array("ID"));
    if ($ar_res = $res->GetNext())
        $pageID = $ar_res["ID"];

    $res = CIBlock::GetList(array(), array('CODE' => $iBlockCode), true);
    if ($ar_res = $res->GetNext())
        $iBlockID = $ar_res["ID"];

    LoadProperty::setIblock($iBlockCode);
    LoadProperty::setSection('');
    $arSEO = LoadProperty::m_LoadProperty();

    $pageContent = $arSEO[$pageCode]["HTML"];
    $pageImage = $arSEO[$pageCode]["PICTURE"]["SRC"]; // Размер изображения 1500x1000

    $ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues($iBlockID, $pageID);
    $iProperty = $ipropValues->getValues();

    if ($iProperty["ELEMENT_META_TITLE"])
        $APPLICATION->SetPageProperty("title", $iProperty["ELEMENT_META_TITLE"]);
    else
        $APPLICATION->SetPageProperty("title", $arSEO[$pageCode]["NAME"]);

    if ($iProperty["ELEMENT_META_DESCRIPTION"])
        $APPLICATION->SetPageProperty("description", $iProperty["ELEMENT_META_DESCRIPTION"]);
    else
        $APPLICATION->SetPageProperty("description", $arSEO[$pageCode]["NAME"]);

    if ($iProperty["ELEMENT_META_KEYWORDS"])
        $APPLICATION->SetPageProperty("keywords", $iProperty["ELEMENT_META_KEYWORDS"]);

    if ($iProperty["ELEMENT_PAGE_TITLE"])
        $pageHead = $iProperty["ELEMENT_PAGE_TITLE"];
    else
        $pageHead = $arSEO[$pageCode]["NAME"];
}