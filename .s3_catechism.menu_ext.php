<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

if (CModule::IncludeModule("iblock")) {

    $arSect = CIBlockSection::GetList(
        array("SORT" => "ASC"),
        array("IBLOCK_CODE" => 's3_catechism', "ACTIVE" => "Y"),
        false,
        array("NAME", "ID", "SECTION_PAGE_URL"),
        false
    );
    while ($arFields = $arSect->GetNext()) {

        $res = CIBlockElement::GetList(
            array("SORT" => "ASC"),
            array("SECTION_ID" => $arFields['ID'], "ACTIVE" => "Y"),
            false,
            false,
            array("CODE")
        );
        if ($arElement = $res->GetNext()) {
            $aMenuLinksExt[] = Array(
                $arFields['NAME'],
                $arFields['SECTION_PAGE_URL'] . $arElement["CODE"] . '/',
                Array(),
                Array(),
                ""
            );
        }
    }
}
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);