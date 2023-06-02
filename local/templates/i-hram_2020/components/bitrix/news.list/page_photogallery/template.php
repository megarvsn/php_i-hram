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

if ($arParams['UP_PAGE_IMAGE'])
    $pageImage = $arParams['UP_PAGE_IMAGE'];

if ($arResult["NAME"])
    $ogTitle = HTMLToTxt($arResult["NAME"]);

if ($arResult["PREVIEW_TEXT"])
    $ogDescription = HTMLToTxt($arResult["PREVIEW_TEXT"]);

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
                    <h1><?= $arParams['UP_PAGE_HEAD'] ?></h1>
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

<section class="content">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <?= $arContent[$arParams["UP_PAGE_CODE"]]["HTML"] ?>
            </div>
        </div>
        <div class="row no-gutters">
            <? foreach ($arResult['SECTION'] as &$arItem): ?>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <a href="<?= $arItem["URL"]; ?>">
                        <div class="project">
                            <img src="<?= $arItem["PICTURE"]["SRC"] ?>"
                                 alt="<?= $arItem["PICTURE"]["DESCRIPTION"] ?>"
                                 title="<?= $arItem["PICTURE"]["DESCRIPTION"] ?>"
                                 class="img-fluid">
                            <div class="text">
                                <span><?= date('d.m.Y', strtotime($arItem["DATE"])) ?></span>
                                <h3><?= $arItem['NAME']; ?></h3>
                            </div>
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-expand"></span>
                            </div>
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>