<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>

<?
// Настройки страницы
$iBlockCode = 's3_pages'; // Символьный код инфоблока
$pageCode = 'page-contacts'; // Символьный код страницы (элемента инфоблока)
require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/setting-page.php');
?>

<? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/og_twitter.php'); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/h1_breadcrumbs.php'); ?>
    <section class="content mt-4">
        <div class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col">

                    </div>
                </div>
                <div class="row d-flex mb-5 contact-info">
                    <div class="col-md-6">
                        <p><b><?= $arContacts["address"]["NAME"] ?>:</b><br> <?= $index ?>, <?= $city ?>
                            , <?= $address ?></p>
                        <p><b><?= $arContacts["email"]["NAME"] ?>:</b><br>
                            <a target="_blank" href="mailto:<?= $email ?>"><?= $email ?></a>
                        </p>
                        <p><b><?= $arContacts["phone"]["NAME"] ?>:</b><br>
                            <a target="_blank"
                               href="tel:<?= preg_replace("#[^\d]#", "", $phone) ?>"><?= $phone ?></a>
                        </p>
                        <p><b><?= $arContacts["phone2"]["NAME"] ?>:</b><br>
                            <?= $arContacts["info_add1"]["HTML"] ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <?= $arContacts["info_add2"]["HTML"] ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-section">

            <div class="row d-flex align-items-stretch no-gutters">
                <? /*<div class="col-md-6 pl-5 pr-5 order-md-last">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:form.result.new",
                        "write-us",
                        array(
                            "AJAX_MODE" => "Y",
                            "AJAX_OPTION_JUMP" => "Y",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "Y",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "CACHE_TIME" => "3600",    // Время кеширования (сек.)
                            "CACHE_TYPE" => "A",    // Тип кеширования
                            "CHAIN_ITEM_LINK" => "",    // Ссылка на дополнительном пункте в навигационной цепочке
                            "CHAIN_ITEM_TEXT" => "",    // Название дополнительного пункта в навигационной цепочке
                            "COMPONENT_TEMPLATE" => "default",
                            "EDIT_URL" => "",    // Страница редактирования результата
                            "IGNORE_CUSTOM_TEMPLATE" => "Y",    // Игнорировать свой шаблон
                            "LIST_URL" => "",    // Страница со списком результатов
                            "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                            "SUCCESS_URL" => "",    // Страница с сообщением об успешной отправке
                            "USE_EXTENDED_ERRORS" => "Y",    // Использовать расширенный вывод сообщений об ошибках
                            "WEB_FORM_ID" => "1"    // ID веб-формы
                        ),
                        false
                    ); ?>

                </div> */ ?>
                <div class="col-md-12 d-flex align-items-stretch">
                    <?= $arContacts["ymap"]["HTML"] ?>
                </div>
            </div>
        </div>
    </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
