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

if(empty($arResult["SECTION"]))
    require($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/include/404.php");

if ($arParams['UP_PAGE_IMAGE'])
    $pageImage = $arParams['UP_PAGE_IMAGE'];

if ($arResult["SECTION"]["PATH"][0]["NAME"])
    $ogTitle = HTMLToTxt($arResult["SECTION"]["PATH"][0]["NAME"]) . ' | ' . $arParams['UP_SITE_NAME'];

if ($arResult["SECTION"]["PATH"][0]["DESCRIPTION"])
    $ogDescription = HTMLToTxt($arResult["SECTION"]["PATH"][0]["DESCRIPTION"]) . ". " . $APPLICATION->GetProperty("description");

require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/og_twitter.php');

LoadProperty::setIblock($arParams["UP_IBLOCK_CODE"]);
LoadProperty::setSection('');
$arContent = LoadProperty::m_LoadProperty();
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url(<?= $arParams['UP_PAGE_IMAGE'] ?>);"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <div class="mb-2 bread">
                    <h1>
                        <?= $arResult["SECTION"]["PATH"][0]["NAME"] ?>
                    </h1>
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
                    if ($arResult["DATE"])
                        echo date('d.m.Y', strtotime($arResult["DATE"]));
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

<div class="container">
    <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate">
            <blockquote class="text-center">
                <?= $arResult["SECTION"]["PATH"][0]["DESCRIPTION"] ?>
            </blockquote>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="pinBoot">
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="without-panel">
                        <a href="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" class="image-popup">
                            <img class="img-fluid"
                                 src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                 alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                 title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                            />
                        </a>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
    $('#pinBoot').pinterest_grid({
        no_columns: 3,
        padding_x: 1,
        padding_y: 1,
        margin_bottom: 50,
        single_column_breakpoint: 768
    });
</script>