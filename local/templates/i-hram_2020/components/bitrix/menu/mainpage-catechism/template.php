<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <div class="row mb-5">
        <? foreach ($arResult as $key => $arItem): ?>
            <div class="col-12 col-sm-6 text-center text-sm-left mb-2">
                <a href="<?= $arItem['LINK'] ?>" class=" w-100"><?= $arItem['TEXT'] ?></a>
            </div>
        <? endforeach; ?>
    </div>
<? endif; ?>