<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-' . $arParams['TEMPLATE_THEME'] : '';
CUtil::InitJSCore(array('fx'));

if ($arResult["DETAIL_PICTURE"]["SRC"])
    $pageImage = $arResult["DETAIL_PICTURE"]["SRC"];
elseif ($arParams['UP_PAGE_IMAGE'])
    $pageImage = $arParams['UP_PAGE_IMAGE'];

if ($arResult["NAME"])
    $ogTitle = $numberHeader . '. ' . HTMLToTxt($arResult["NAME"]) . ' | ' . $arParams['UP_SITE_NAME'];

if ($arResult["PREVIEW_TEXT"])
    $ogDescription = HTMLToTxt($arResult["PREVIEW_TEXT"]);
else
    $ogDescription = HTMLToTxt($arResult["NAME"]) . ". " . $APPLICATION->GetProperty("description");

$ogType = 'article';
$ogCard = 'summary_large_image';
require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/og_twitter.php');
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url(<?= $arParams['UP_PAGE_IMAGE'] ?>);"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <div class="mb-2 bread">
                    <h1><?= $arResult["NAME"] ?></h1>
                </div>
                <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "default", array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "PATH" => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                    "SITE_ID" => "s3",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                    "START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
                ),
                    false
                ); ?>
            </div>
        </div>
    </div>
</section>
<section class="cur-date-social mb-5">
    <div class="container">
        <div class="row">
            <div class="col-5 text-left">
                <div class="sh-current-date">
                    <span class="hidden-xs"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;</span>
                    <?
                    if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"])
                        echo $arResult["DISPLAY_ACTIVE_FROM"];
                    else
                        echo date('d.m.Y');
                    ?>
                </div>
            </div>
            <div class="col-7 text-right">
                <div class="social-detail">
                    <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                    <script src="https://yastatic.net/share2/share.js"></script>
                    <div class="ya-share2"
                         data-services="vkontakte,facebook,twitter,viber,whatsapp,skype,telegram"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content ftco-section">
    <article class="container">
        <div class="row">
            <div class="col-12 col-md-4 submenu mb-5" id="abcMenu">
                <div class="href text-center"><?= $arResult["MENU"]["HEADER"] ?></div>
                <ul class="list-unstyled pl-3">
                    <? foreach ($arResult["MENU"]["ELEMENTS"] as $arItem): ?>
                        <li>
                            <a href="<?= $arItem["URL"] ?>"><?= $arItem["NAME"] ?></a>
                        </li>
                    <? endforeach ?>
                </ul>
                <hr>
                <a href="<?= $arResult["SECTION_URL"] ?>" class="pl-3">
                    <?= $arParams["UP_PAGE_HEAD"] ?>&nbsp;&nbsp;
                    <i class="fa fa-angle-double-right"></i>
                </a>
            </div>
            <div class="col-12 col-md-8">
                <? if (strlen($arResult["~PREVIEW_TEXT"]) > 0): ?>
                    <div class="text-block">
                        <?= $arResult["~PREVIEW_TEXT"]; ?>
                    </div>
                <? endif ?>
                <? if (strlen($arResult["PROPERTIES"]["UP_SLAVONIC"]["~VALUE"]["TEXT"]) > 0 &&
                    strlen($arResult["PROPERTIES"]["UP_RUSSIAN"]["~VALUE"]["TEXT"]) > 0): ?>
                    <div class="row">
                        <div class="col-12 col-md-6 molitva">
                            <div class="font-izhitsa"><?= $arResult["PROPERTIES"]["UP_SLAVONIC"]["~VALUE"]["TEXT"] ?></div>
                        </div>
                        <div class="col-12 col-md-6 molitva">
                            <div class=""><?= $arResult["PROPERTIES"]["UP_RUSSIAN"]["~VALUE"]["TEXT"] ?></div>
                        </div>
                    </div>
                <? elseif (strlen($arResult["PROPERTIES"]["UP_SLAVONIC"]["~VALUE"]["TEXT"]) > 0): ?>
                    <div class="row">
                        <div class="col-12 molitva">
                            <div class="font-izhitsa"><?= $arResult["PROPERTIES"]["UP_SLAVONIC"]["~VALUE"]["TEXT"] ?></div>
                        </div>
                    </div>
                <? elseif (strlen($arResult["PROPERTIES"]["UP_RUSSIAN"]["~VALUE"]["TEXT"]) > 0): ?>
                    <div class="row">
                        <div class="col-12 molitva">
                            <div class=""><?= $arResult["PROPERTIES"]["UP_RUSSIAN"]["~VALUE"]["TEXT"] ?></div>
                        </div>
                    </div>
                <? endif; ?>
                <? if (strlen($arResult["~DETAIL_TEXT"]) > 0): ?>
                    <div class="text-block">
                        <?= $arResult["~DETAIL_TEXT"]; ?>
                    </div>
                <? endif ?>
            </div>
        </div>
        <div style="display: none">
            <div>Автор: <span itemprop="author"><?= SITE_SERVER_NAME ?></span></div>
            <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                    <img itemprop="url image" src="//<?= SITE_SERVER_NAME ?>/images/logo-fb.jpg">
                </div>
                <meta itemprop="name" content="<?= $arParams['UP_SITE_NAME'] ?>">
                <meta itemprop="telephone" content="<?= $arParams['UP_PHONE'] ?>">
                <meta itemprop="address" content="<?= $arParams['UP_ADDRESS'] ?>">
            </div>
            <meta itemprop="dateModified" content="<?= date("c", strtotime($arResult["TIMESTAMP_X"])) ?>">
            <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage"
                  itemid="//<?= SITE_SERVER_NAME ?><?= $APPLICATION->GetCurPage(); ?>">
        </div>
        <div class="row">
            <div class="col">
                <div class="line-bottom-events"></div>
            </div>
        </div>
    </article>
</section>

<script>
    $('#abcMenu a').each(function () {
        if (window.location == this.href) {
            $(this).parent().addClass('active');
        }
    });
</script>