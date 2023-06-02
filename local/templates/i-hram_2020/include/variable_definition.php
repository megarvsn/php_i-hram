<?php
/************************************************************************************
Класс LoadProperty находится в файле /bitrix/php_interface/include/LoadProperty.php
************************************************************************************/

// SEO коды
LoadProperty::setIblock('s3_seo');
LoadProperty::setSection('');
$arSEO = LoadProperty::m_LoadProperty();

$codeHead = $arSEO["code-head"]["HTML"];
$codeBody = $arSEO["code-body"]["HTML"];
$codeCloseBody = $arSEO["code-close-body"]["HTML"];

// Элементы интерфейса (кнопки, ссылки и т.д.)
LoadProperty::setIblock('s3_interface');
LoadProperty::setSection('');
$arInterface = LoadProperty::m_LoadProperty();

$logoIMG = $arInterface["logo"]["PICTURE"]["SRC"];
$logoMobileIMG = $arInterface["logo-mobile"]["PICTURE"]["SRC"];
$logoTXT = $arInterface["logo"]["HTML"];
$logoMobileTXT = $arInterface["logo-mobile"]["HTML"];

$headerButtonShedule = $arInterface["header-btn-shedule"]["HTML"];

$footerButtonShedule = $arInterface["footer-btn-shedule"]["HTML"];
$footerHeaderContacts = $arInterface["footer-header-contacts"]["TEXT"];
$footerMenuLeft = $arInterface["footer-menu-left"]["TEXT"];
$footerMenuCenter = $arInterface["footer-menu-center"]["TEXT"];
$footerMenuRight = $arInterface["footer-menu-right"]["TEXT"];
$footerHeaderSitemap = $arInterface["footer-href-sitemap"]["HTML"];
$footerTextAllRight = $arInterface["footer-text-all-right"]["TEXT"];
$footerDesignSite = $arInterface["footer-href-design-site"]["HTML"];

$sheduleIvanovskoyeName = $arInterface["link-name-shedule-ivanovskoye"]["HTML"];
$shedulePerovoName = $arInterface["link-name-shedule-perovo"]["HTML"];

$sundayBooklet = $arInterface["sunday-booklet"]["NAME"];
$txtRead = $arInterface["txt-read"]["NAME"];

// Контент
LoadProperty::setIblock('s3_banners');
LoadProperty::setSection('');
$arBanner = LoadProperty::m_LoadProperty();

$headerAnnonce = $arBanner["header-annonce"]["HTML"];

// Контактная информация
LoadProperty::setIblock('s3_contacts');
LoadProperty::setSection('');
$arContacts = LoadProperty::m_LoadProperty();

$index = $arContacts["index"]["HTML"];
$city = $arContacts["city"]["HTML"];
$address = $arContacts["address"]["HTML"];
$phone = $arContacts["phone"]["HTML"];
$email = $arContacts["email"]["HTML"];

$longitude = $arContacts["longitude"]["HTML"];
$latitude = $arContacts["latitude"]["HTML"];