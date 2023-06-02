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
    $ogTitle =  HTMLToTxt($arResult["NAME"]);

if ($arResult["PREVIEW_TEXT"])
    $ogDescription =  HTMLToTxt($arResult["PREVIEW_TEXT"]);

require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/og_twitter.php');
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

<section class="content site-section">
    <div class="container">
        <div class="row mb-5">
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="col-md-6 col-lg-4 mb-4" id="<?= $this->GetEditAreaId($arItem['ID']); ?>" data-aos="fade">
                    <div class="post-entry bg-white">
                        <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                            <div class="image" style="background-image: url('<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>')"></div>
                        <? else: ?>
                            <div class="image image-logo"></div>
                        <? endif; ?>
                        <div class="text p-4">
                            <h2 class="h5 text-black">
                                <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
                                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a>
                                <? else: ?>
                                    <?= $arItem["NAME"] ?>
                                <? endif; ?>
                            </h2>
                            <span class="text-uppercase date d-block mb-3"><i class="far fa-calendar-alt"></i>  <?= $arItem["DISPLAY_ACTIVE_FROM"] ?></span>
                            <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                                <p class="mb-0"><?= $arItem["PREVIEW_TEXT"]; ?></p>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
                    <br/><?= $arResult["NAV_STRING"] ?>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>