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
?>
<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="site-block-half d-block d-lg-flex site-block-video mb-3" data-aos="fade">
        <?
        if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"]))
            $imgVideo = $arItem["PREVIEW_PICTURE"]["SRC"];
        else
            $imgVideo = SITE_DIR . 'images/hram.jpg';
        ?>
        <div class="image bg-image order-2" style="background-image: url(<?= $imgVideo ?>); ">
            <a href="<?= $arItem["DISPLAY_PROPERTIES"]["UP_URL_YOUTUBE"]["~VALUE"]; ?>" class="play-button popup-youtube">
                <span class="icon-play"></span>
            </a>
        </div>
        <div class="text order-1">
            <div class="sh-current-date"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;<?= $arItem["ACTIVE_FROM"] ?></div>
            <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                <h3><?= $arItem["NAME"] ?></h3>
            <? endif; ?>
            <hr>
            <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                <div class="my-3 site-block-video_text">
                    <?= $arItem["PREVIEW_TEXT"] ?>
                </div>
            <? endif; ?>
        </div>
    </div>
<? endforeach; ?>
<div class="text-center mb-5">
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <br/><?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
</div>