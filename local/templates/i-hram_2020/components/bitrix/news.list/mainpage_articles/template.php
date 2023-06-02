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
<div class="row d-flex">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="col-lg-6 d-flex align-items-stretch"
             data-aos="fade"
             data-aos-delay="0">
            <div class="media block-6 services services-2 d-block bg-light p-4 mb-4 w-100 hover-shadow">
                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                    <? if ($arItem["PREVIEW_PICTURE"]["SRC"]): ?>
                        <div class="icon d-flex justify-content-center align-items-center bg-article"
                             style="background-image: url(<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>);"></div>
                    <? else: ?>
                        <div class="icon d-flex justify-content-center align-items-center bg-feofan"></div>
                    <? endif; ?>
                    <div class="media-body p-2 mt-3">
                        <p><b>ВЛ №<?= $arItem["DISPLAY_PROPERTIES"]["UP_NUMBER"]["DISPLAY_VALUE"] ?>
                                от <?= $arItem["DISPLAY_ACTIVE_FROM"] ?></b></p>
                        <p><?= $arItem["NAME"] ?></p>
                    </div>
                </a>
            </div>
        </div>
    <? endforeach; ?>
</div>
