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
LoadProperty::setIblock('s3_interface');
LoadProperty::setSection('');
$arInterface = LoadProperty::m_LoadProperty();
?>
<section class="slide-one-item home-slider owl-carousel">
<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="site-blocks-cover overlay" style="background-image: url(<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>);" data-aos="fade"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10 d-flex flex-column">
                    <div class="txt-slider">
                        <h2 class="mb-5"><?= $arItem["NAME"] ?></h2>
                        <p><?= $arItem["PREVIEW_TEXT"] ?></p>
                    </div>
                    <div class="btn-slider">
                        <a href="<?= $arItem["DISPLAY_PROPERTIES"]["UP_URL"]["VALUE"] ?>" class="btn btn-outline-white py-3 px-5 rounded-0"><?= $arInterface["btn-goto"]["NAME"] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? endforeach; ?>
</section>

