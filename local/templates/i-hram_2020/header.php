<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Application;
use Bitrix\Main\Localization;
use Bitrix\Main\Page\Asset;

global $USER, $APPLICATION;

Localization\Loc::loadMessages(__FILE__);
IncludeTemplateLangFile(__FILE__);

CJSCore::Init(array("fx"));

require($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/variable_definition.php');

// Last Modified
$filename = __FILE__;
$LastModified_unix = filemtime($filename); // время последнего изменения страницы

$LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);
$IfModifiedSince = false;
if (isset($_ENV['HTTP_IF_MODIFIED_SINCE']))
    $IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));
if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
    $IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));
if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
    exit;
}
header('Last-Modified: ' . $LastModified);

// get site data
$cache = new CPHPCache();
$cache_time = 86400;
$cache_id = 'CSiteGetByID' . SITE_ID;
$cache_path = '/siteData/';
if ($cache_time > 0 && $cache->InitCache($cache_time, $cache_id, $cache_path)) {
    $res = $cache->GetVars();
    if (is_array($res["CSiteGetByID"]) && (count($res["CSiteGetByID"]) > 0))
        $CSiteGetByID = $res["CSiteGetByID"];
}
if (!is_array($CSiteGetByID)) {
    $rsSites = CSite::GetByID(SITE_ID);
    $CSiteGetByID = $rsSites->Fetch();
    if ($cache_time > 0) {
        $cache->StartDataCache($cache_time, $cache_id, $cache_path);
        $cache->EndDataCache(array("CSiteGetByID" => $CSiteGetByID));
    }
}

$Asset = Asset::getInstance();

$Asset->addString('<link href="' . SITE_DIR . 'favicon.ico" rel="shortcut icon"  type="image/x-icon">');
$Asset->addString('<link rel="apple-touch-icon" sizes="180x180" href="' . SITE_DIR . 'favicon/apple-touch-icon.png">');
$Asset->addString('<link rel="icon" type="image/png" sizes="32x32" href="' . SITE_DIR . 'favicon/favicon-32x32.png">');
$Asset->addString('<link rel="icon" type="image/png" sizes="16x16" href="' . SITE_DIR . 'favicon/favicon-16x16.png">');
$Asset->addString('<link rel="manifest" href="' . SITE_DIR . 'favicon/site.webmanifest">');
$Asset->addString('<link rel="mask-icon" href="' . SITE_DIR . 'favicon/safari-pinned-tab.svg" color="#5bbad5">');
$Asset->addString('<meta name="msapplication-TileColor" content="#2d89ef">');
$Asset->addString('<meta name="theme-color" content="#ffffff">');

$Asset->addString('<meta charset="utf-8">');
$Asset->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
$Asset->addString('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">');

// add fonts
$Asset->addString('<link href="//fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500" rel="stylesheet" type="text/css">');
$Asset->addCss(SITE_TEMPLATE_PATH . '/fonts/icomoon/style.css');
$Asset->addCss(SITE_TEMPLATE_PATH . '/css/ionicons.min.css');
$Asset->addCss(SITE_TEMPLATE_PATH . '/fonts/flaticon/font/flaticon.css');

// add styles
$Asset->addCss(SITE_TEMPLATE_PATH . '/css/fontawesome.css');
$Asset->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap.min.css');
$Asset->addCss(SITE_TEMPLATE_PATH . '/css/magnific-popup.css');
$Asset->addCss(SITE_TEMPLATE_PATH . '/css/jquery-ui.css');
$Asset->addCss(SITE_TEMPLATE_PATH . '/css/owl.carousel.min.css');
$Asset->addCss(SITE_TEMPLATE_PATH . '/css/owl.theme.default.min.css');
$Asset->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap-datepicker.css');
$Asset->addCss(SITE_TEMPLATE_PATH . '/css/aos.css');
$Asset->addCss(SITE_TEMPLATE_PATH . '/css/style.css');

// add scripts
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery-3.3.1.min.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery-migrate-3.0.1.min.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery-ui.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/popper.min.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/bootstrap.min.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/owl.carousel.min.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery.stellar.min.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery.countdown.min.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery.magnific-popup.min.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/bootstrap-datepicker.min.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/aos.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/inputmask.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/page-up.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/pinterest_grid.js');
$Asset->addJs(SITE_TEMPLATE_PATH . '/js/main.js');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $codeHead ?>
    <?= PHP_EOL ?>
    <title>
        <? $APPLICATION->ShowTitle();
        if ($CSiteGetByID['SITE_NAME'] != ''):
            echo ' | ' . $CSiteGetByID['SITE_NAME'];
        endif; ?>
    </title>

    <? $APPLICATION->ShowHead(); ?>

    <script type="text/javascript">
        // some JS params
        var SITE_ID = '<?=SITE_ID?>',
            SITE_DIR = '<?=str_replace('//', '/', SITE_DIR);?>',
            SITE_TEMPLATE_PATH = '<?=str_replace('//', '/', SITE_TEMPLATE_PATH);?>';
    </script>
    <? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/include/header/canonical.php"); ?>
    <? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/include/header/noindex.php"); ?>
    <? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/include/header/org.php"); ?>
</head>
<body>
<?= $codeBody ?>
<?= PHP_EOL ?>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<div class="site-wrap">
    <header>
        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->

        <? if (isset($headerAnnonce)): ?>
            <div class="promo py-1 bg-primary d-none d-md-block" data-aos="fade">
                <div class="container text-center text-white">
                    <?= $headerAnnonce ?>
                </div>
            </div>
        <? else: ?>
            <? $res = CIBlockElement::GetList(
                array("ID" => "DESC"),
                array("IBLOCK_CODE" => "s3_articles", "ACTIVE" => "Y"),
                false,
                false,
                array("NAME", "PROPERTY_UP_NUMBER", "CODE")
            );
            if ($arFields = $res->GetNext()): ?>
                <div class="promo py-1 bg-primary d-none d-md-block" data-aos="fade">
                    <div class="container text-center text-white">
                        <?= $sundayBooklet ?> №<?= $arFields["PROPERTY_UP_NUMBER_VALUE"] ?>.
                        <?= $arFields["NAME"] ?>
                        <a href="/articles/<?= $arFields["CODE"] ?>" class="btn btn-white rounded-0 mr-2"><?= $txtRead ?></a>
                    </div>
                </div>
            <? endif; ?>
        <? endif; ?>
        <div class="site-navbar-wrap bg-white">
            <div class="site-navbar-top">
                <div class="container py-2">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="d-flex">
                                <a href='tel:+<?= preg_replace("#[^\d]#", "", $phone) ?>'
                                   class="d-flex align-items-center mr-4" target="_blank">
                                    <span class="icon-phone mr-2"></span>
                                    <span class="d-none d-md-inline-block"><?= $phone ?></span>
                                </a>

                                <a href="mailto:<?= $email ?>" class="d-flex align-items-center" target="_blank">
                                    <span class="icon-envelope mr-2"></span>
                                    <span class="d-none d-md-inline-block"><?= $email ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex ml-auto">
                                <?= $headerButtonShedule ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-navbar bg-light">
                <div class="container py-1">
                    <div class="row align-items-center no-gutters">
                        <div class="col-6 col-sm-4 col-lg-1 col-xl-3">
                            <? if ($APPLICATION->GetCurDir() == SITE_DIR): ?>
                                <img src="<?= $logoIMG ?>" alt="<?= $logoMobileTXT ?>"
                                     class="img-fluid d-lg-none d-xl-flex">
                                <img src="<?= $logoMobileIMG ?>" alt="<?= $logoMobileTXT ?>"
                                     class="img-fluid-75 d-none d-lg-flex d-xl-none">
                            <? else: ?>
                                <a href="<?= SITE_DIR ?>">
                                    <img src="<?= $logoIMG ?>" alt="<?= $logoMobileTXT ?>"
                                         class="img-fluid d-lg-none d-xl-flex">
                                    <img src="<?= $logoMobileIMG ?>" alt="<?= $logoMobileTXT ?>"
                                         class="img-fluid-75 d-none d-lg-flex d-xl-none">
                                </a>
                            <? endif; ?>
                        </div>
                        <div class="col-6 col-sm-8 col-lg-11 col-xl-9">
                            <nav class="site-navigation text-right" role="navigation">
                                <div class="container pr-0">
                                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                                        <a href="#" class="site-menu-toggle js-menu-toggle text-black">
                                            <span class="icon-menu h3"></span>
                                        </a>
                                    </div>
                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:menu",
                                        "main",
                                        array(
                                            "ALLOW_MULTI_SELECT" => "N",
                                            "ROOT_MENU_TYPE" => "s3_top",
                                            "CHILD_MENU_TYPE" => "s3_subtop",
                                            "COMPONENT_TEMPLATE" => "main",
                                            "DELAY" => "N",
                                            "MAX_LEVEL" => "2",
                                            "MENU_CACHE_GET_VARS" => array(""),
                                            "MENU_CACHE_TIME" => "3600",
                                            "MENU_CACHE_TYPE" => "N",
                                            "MENU_CACHE_USE_GROUPS" => "Y",
                                            "USE_EXT" => "Y"
                                        )
                                    ); ?>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>