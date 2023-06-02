<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if ($arResult["isFormTitle"] == "Y"): ?>
    <p><b><?= $arResult["FORM_TITLE"] ?>:</b></p>
<? endif; ?>

<?= $arResult["FORM_NOTE"] ?>

<?= $arResult["FORM_HEADER"] ?>

    <input type="hidden" name="recaptcha_token" value="">

<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) echo $arQuestion["HTML_CODE"]; ?>
    <div class="text-required small"><?= GetMessage("FORM_REQUIRED_TEXT") ?></div>


<? if ($arResult["arForm"]["USE_CAPTCHA"] == "Y"): ?>
    <div class="form-group">
        <div class="captcha-box clearfix">
            <div class="captcha-container">
                <input type="hidden"
                       name="captcha_sid"
                       value="<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>"/>
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>"
                     width="180"
                     height="40"
                     class="img-captcha">
            </div>
            <div class="captcha-container">
                <input type="text"
                       name="captcha_word"
                       value=""
                       class="form-input input-captcha">
            </div>
        </div>
    </div>
<? endif; ?>

    <div class="userconsent form-group">
        <? $APPLICATION->IncludeComponent(
            "bitrix:main.userconsent.request",
            "default",
            array(
                "ID" => 1,
                "IS_CHECKED" => "Y",
                "AUTO_SAVE" => "Y",
                "IS_LOADED" => "N",
                "REPLACE" => array(
                    'button_caption' => $arResult["arForm"]["BUTTON"],
                    'fields' => array(
                        0 => $arResult["QUESTIONS"]["field_name"]["CAPTION"],
                        1 => $arResult["QUESTIONS"]["field_email"]["CAPTION"],
                        2 => $arResult["QUESTIONS"]["field_phone"]["CAPTION"],
                    )
                ),
                "COMPONENT_TEMPLATE" => ".default"
            )
        ); ?>
    </div>
    <div class="form-group">
        <input <?= (intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : ""); ?>
                class="btn btn-primary py-3 px-5"
                type="submit"
                name="web_form_submit"
                value="<?= $arResult["arForm"]["BUTTON"] ?>"/>
    </div>
<?= $arResult["FORM_FOOTER"] ?>

<script>
    $('.input-phone').inputmask({
        "mask": "+7 (999) 999-99-99",
        "clearIncompvare": true
    });
</script>