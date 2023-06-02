<?
if (!defined('ERROR_404')) {

    $ar_path = explode('/', substr($APPLICATION->GetCurDir(), strlen(SITE_DIR)));
    $protocol = ($APPLICATION->IsHTTPS() ? 'https://' : 'http://');
    $arResult['URL'] = "/" . $ar_path[0] . "/" . $ar_path[1];

    if ($arResult['NAV_PAGE_NOMER'] > 1) {
        $APPLICATION->AddHeadString('<link rel="canonical" href="' . $protocol . $_SERVER["HTTP_HOST"] . $arResult['URL'] . '">');
    }

    if (isset($arResult['NAV_NUM'], $arResult['NAV_PAGE_NOMER'], $arResult['NAV_PAGE_COUNT'], $arResult['URL'])) {
        if ($arResult['NAV_PAGE_COUNT'] > $arResult['NAV_PAGE_NOMER']) { // rel next
            $next = $arResult['NAV_PAGE_NOMER'] + 1;
            $urlNextRel = $arResult['URL'] . "?PAGEN_1=" . $next;
        }
        if ($arResult['NAV_PAGE_NOMER'] > 1) { // rel prev
            $prev = $arResult['NAV_PAGE_NOMER'] - 1;
            If ($prev > 1) {
                $urlPrevRel = $arResult['URL'] . "?PAGEN_1=" . $prev;
            } else {
                $urlPrevRel = $arResult['URL'];
            }
        }
        if (isset($urlNextRel)) {
            //$APPLICATION->SetPageProperty('next', ''$protocol . $_SERVER["HTTP_HOST"] . $urlNextRel);
            $APPLICATION->AddHeadString('<link rel="next" href="' . $protocol . $_SERVER["HTTP_HOST"] . $urlNextRel . '">');
        }
        if (isset($urlPrevRel)) {
            //$APPLICATION->SetPageProperty('prev', '' . $protocol . $_SERVER["HTTP_HOST"] . $urlPrevRel);
            $APPLICATION->AddHeadString('<link rel="prev" href="' . $protocol . $_SERVER["HTTP_HOST"] . $urlPrevRel . '">');
        }
    }
}