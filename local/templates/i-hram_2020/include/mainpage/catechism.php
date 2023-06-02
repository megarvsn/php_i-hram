<div class="site-block-half d-block d-lg-flex site-block-articles" data-aos="fade">
    <div class="image bg-image order-2"
         style="background-image: url('<?= $arResult['page-catechism']["PICTURE"]["SRC"] ?>'); ">
    </div>
    <div class="text order-1 py-5">
        <h2 class="site-heading text-black mb-3 text-center text-sm-left"><?= $arResult['page-catechism']["NAME"] ?></h2>
        <? $APPLICATION->IncludeComponent(
            "bitrix:menu",
            "mainpage-catechism",
            array(
                "ALLOW_MULTI_SELECT" => "N",
                "ROOT_MENU_TYPE" => "s3_catechism",
                "CHILD_MENU_TYPE" => "",
                "COMPONENT_TEMPLATE" => "mainpage-catechism",
                "DELAY" => "N",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_GET_VARS" => array(""),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "Y",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "USE_EXT" => "Y"
            )
        ); ?>
        <div class="row">
            <div class="col text-center text-sm-left">
                <a href="#" class="btn btn-outline-primary btn-sm rounded-0 p-2 px-4">Азбука Веры</a>
            </div>
        </div>
    </div>
</div>