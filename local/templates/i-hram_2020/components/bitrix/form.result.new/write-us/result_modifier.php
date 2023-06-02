<?
foreach ($arResult["QUESTIONS"] as $nameField => $arQuestion) {

    if ($nameField == "field_phone")
        $className = ' input-phone';
    else
        $className = '';

    if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "textarea") {
        $searchStr = 'cols="40" rows="5"  class="inputtextarea"';
        $replaceStr = 'class="form-control' . $className . '" cols="30" rows="6" placeholder="' . $arQuestion["CAPTION"] . '"';
    }
    elseif ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "email") {
        $searchStr = 'type="text"  class="inputtext"';
        $replaceStr = 'type="email" class="form-control' . $className . '" placeholder="' . $arQuestion["CAPTION"] . '"';
    }
    else {
        $searchStr = 'class="inputtext"';
        $replaceStr = 'class="form-control' . $className . '" placeholder="' . $arQuestion["CAPTION"] . '"';
    }

    $arResult["QUESTIONS"][$nameField]["HTML_CODE"] = str_replace($searchStr, $replaceStr, $arQuestion["HTML_CODE"]);

    if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] <> "textarea")
        $arResult["QUESTIONS"][$nameField]["HTML_CODE"] = str_replace(' value="" size="0" /', '', $arResult["QUESTIONS"][$nameField]["HTML_CODE"]);

    if ($arResult["QUESTIONS"][$nameField]["REQUIRED"] == "Y")
        $arResult["QUESTIONS"][$nameField]["HTML_CODE"] = '<div class="form-group f-required">' . $arResult["QUESTIONS"][$nameField]["HTML_CODE"] . '</div>';
    else
        $arResult["QUESTIONS"][$nameField]["HTML_CODE"] = '<div class="form-group">' . $arResult["QUESTIONS"][$nameField]["HTML_CODE"] . '</div>';
}