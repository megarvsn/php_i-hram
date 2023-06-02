<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>

<?
// Настройки страницы
$iBlockCode = 's3_pages'; // Символьный код инфоблока
$pageCode = 'page-sitemap'; // Символьный код страницы (элемента инфоблока)
require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/setting-page.php');
?>

<? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/og_twitter.php'); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/h1_breadcrumbs.php'); ?>
    <section class="content mt-4">
        <div class="container">
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.map",
                "main",
                array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600",
                    "SET_TITLE" => "Y",
                    "LEVEL" => "2",
                    "COL_NUM" => "3",
                    "SHOW_DESCRIPTION" => "N"
                ),
                false
            ); ?>
        </div>
    </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>