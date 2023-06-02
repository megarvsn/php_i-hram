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
<div class="row no-gutters align-items-stretch h-100 mainpage-news">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="col-lg-6 mainpage-news_item" onclick="document.location.href = '<?= $arItem["DETAIL_PAGE_URL"] ?>';">
            <div class="row no-gutters align-items-stretch h-100 half-sm">
                <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                    <div class="col-md-6 bg-image bg-sm-height"
                         style="background-image: url('<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>');"
                         data-aos="fade"
                         data-aos-delay="0"></div>
                <? else: ?>
                    <div class="col-md-6 bg-image bg-sm-height"
                         style="background-image: url('<?= SITE_DIR ?>images/hram.jpg');"
                         data-aos="fade"
                         data-aos-delay="0"></div>
                <? endif; ?>

                <div class="col-md-6 bg-light text">
                    <div class="p-4">
                        <h2 class="h5 mb-3 text-black line-height-sm"><?= $arItem["NAME"] ?></h2>
                        <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                            <p><?= $arItem["PREVIEW_TEXT"]; ?></p>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <? endforeach; ?>
</div>
