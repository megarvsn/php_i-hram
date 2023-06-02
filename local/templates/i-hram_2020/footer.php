<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
</main>
<? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/footer/footer-banner.php'); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/footer/banner-kreshenie.php'); ?>
<footer class="site-footer bg-blue">
    <div class="container">
        <div class="row text-center text-lg-left">
            <div class="col-12 col-sm-6 col-lg-3 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4"><?= $footerMenuLeft ?></h3>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "footer",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "ROOT_MENU_TYPE" => "s3_footer-left",
                        "CHILD_MENU_TYPE" => "",
                        "COMPONENT_TEMPLATE" => "footer",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "USE_EXT" => "N"
                    )
                ); ?>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4"><?= $footerMenuCenter ?></h3>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "footer",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "ROOT_MENU_TYPE" => "s3_footer-center",
                        "CHILD_MENU_TYPE" => "",
                        "COMPONENT_TEMPLATE" => "footer",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "USE_EXT" => "N"
                    )
                ); ?>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4"><?= $footerMenuRight ?></h3>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "footer",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "ROOT_MENU_TYPE" => "s3_footer-right",
                        "CHILD_MENU_TYPE" => "",
                        "COMPONENT_TEMPLATE" => "footer",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "USE_EXT" => "N"
                    )
                ); ?>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h3 class="footer-heading"><?= $footerHeaderContacts ?></h3>
                    <p><?= $index ?>, <?= $city ?>,<br><?= $address ?></p>

                    <a href='tel:+<?= preg_replace("#[^\d]#", "", $phone) ?>'
                       class="d-flex align-items-center justify-content-center justify-content-lg-start">
                        <span class="icon-phone mr-2"></span>
                        <?= $phone ?>
                    </a>
                    <a href="mailto:<?= $email ?>"
                       class="d-flex align-items-center justify-content-center justify-content-lg-start">
                        <span class="icon-envelope mr-2"></span>
                        <?= $email ?>
                    </a>
                </div>
                <?= $footerHeaderSitemap ?>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                <?= $footerButtonShedule ?>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-12 col-md-6 text-center text-lg-left">
                &copy <?= date('Y') ?>. <?= $footerTextAllRight ?>
            </div>
            <div class="col-12 col-md-6 text-center text-lg-right">
                <?= $footerDesignSite ?>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- Page Up button -->
<? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/include/footer/page-up.php"); ?>
<!-- End Page Up button -->
<script>
    AOS.init({
        duration: 800,
        easing: 'slide',
        once: false
    });
</script>
<? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/include/footer/schema.org.php"); ?>
<?= $codeCloseBody ?>
<?= PHP_EOL ?>
</body>
</html>