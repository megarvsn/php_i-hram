<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>

<?
// Настройки страницы
$iBlockCode = 's3_pages'; // Символьный код инфоблока
$pageCode = 'page-newspaper'; // Символьный код страницы (элемента инфоблока)
require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/setting-page.php');
?>

<? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/og_twitter.php'); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/h1_breadcrumbs.php'); ?>

    <section class="content ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate">
                    <?= $pageContent ?>
                </div>
            </div>
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "page_newspaper",
                array(
                    "IBLOCK_TYPE" => "s3_content",
                    "IBLOCK_ID" => "66",
                    "NEWS_COUNT" => "6",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_ORDER1" => "DESC",
                    "SORT_BY2" => "",
                    "SORT_ORDER2" => "",
                    "FILTER_NAME" => "",
                    "FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "PROPERTY_CODE" => array(
                        0 => "UP_PDF",
                        1 => "UP_NUMBER",
                    ),
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "SET_TITLE" => "N",
                    "SET_BROWSER_TITLE" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_STATUS_404" => "Y",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "PAGER_TEMPLATE" => "main",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "Новости",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "COMPONENT_TEMPLATE" => "page_cleric",
                    "TEMPLATE_THEME" => "blue",
                    "SET_LAST_MODIFIED" => "N",
                    "STRICT_SECTION_CHECK" => "N",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "MEDIA_PROPERTY" => "",
                    "SLIDER_PROPERTY" => "",
                    "SEARCH_PAGE" => "/search/",
                    "USE_RATING" => "N",
                    "USE_SHARE" => "N",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => "",
                    "UP_BUTTON_MORE" => $arInterface["txt-read"]["NAME"],
                ),
                false
            ); ?>
        </div>
    </section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>