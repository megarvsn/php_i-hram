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
//AddMessage2Log(print_r($arResult, true), "Выгрузка массива \$arResult");
?>
<div class="row">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="col-md-6 col-lg-4 pr-md-5 text-left mb-5" data-aos="fade">
            <a class="text-center white-panel newspaper-item cursor-pointer"
               href="<?= $arItem["DISPLAY_PROPERTIES"]["UP_PDF"]["FILE_VALUE"]["SRC"] ?>"
               target="_blank">
                <div class="text-right small text-black"><i><?= $arItem["DISPLAY_PROPERTIES"]["UP_NUMBER"]["NAME"] ?>
                        &nbsp;<?= $arItem["DISPLAY_PROPERTIES"]["UP_NUMBER"]["~VALUE"] ?></i></div>
                <div>
                    <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>"
                         class="w-75 rounded mx-auto"><br>
                </div>
                <div><b><?= $arItem["NAME"] ?></b></div>
                <div><?= $arParams["UP_BUTTON_MORE"] ?></div>
            </a>
            <p class="blockquote font-small"><?= $arItem["PREVIEW_TEXT"] ?></p>
        </div>
    <? endforeach; ?>
</div>
<div class="row mb-5">
    <div class="col-md-12 text-center mb-5">
        <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
            <?= $arResult["NAV_STRING"] ?>
        <? endif; ?>
    </div>
</div>
