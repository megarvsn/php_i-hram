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
<section class="content">
    <div class="container">
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