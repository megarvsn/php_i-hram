<?php
$res = CIBlockElement::GetList(
    array(),
    array("IBLOCK_CODE" => "s3_pages", "CODE" => "page-about", "ACTIVE" => "Y"),
    false,
    false,
    array("NAME", "DETAIL_PICTURE", "DETAIL_TEXT")
);

if ($arFields = $res->GetNext()){
    $imgAbout = CFile::GetFileArray($arFields["DETAIL_PICTURE"]);
    $headerAbout =  $arFields["NAME"];
    $textAbout =  $arFields["~DETAIL_TEXT"];
}
?>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 bg-image bg-sm-height mb-5 mb-md-0 order-md-2"
                 style="background-image: url('<?= $imgAbout["SRC"] ?>');" data-aos="fade-up"></div>
            <div class="col-md-6 pr-md-5 order-md-1">
                <h2 class="display-3 line-height-xs text-black mb-4"><?= $headerAbout ?></h2>
                <?= $textAbout ?>
                <p><a href="/about/" class="btn btn-outline-primary btn-sm rounded-0 p-2 px-4"><?= $arInterface["btn-read-more"]["NAME"];?></a></p>
            </div>
        </div>
    </div>
</div>