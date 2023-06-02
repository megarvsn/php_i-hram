<section class="hero-wrap hero-wrap-2" style="background-image: url(<?= $pageImage ?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <div class="mb-2 bread">
                    <h1><?= $pageHead ?></h1>
                </div>
                    <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "default", array(
                        "COMPONENT_TEMPLATE" => ".default",
                        "PATH" => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                        "SITE_ID" => "s3",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                        "START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
                    ),
                        false
                    ); ?>
            </div>
        </div>
    </div>
</section>