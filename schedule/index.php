<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>

<?
// Настройки страницы
$iBlockCode = 's3_pages'; // Символьный код инфоблока
$pageCode = 'page-shedule'; // Символьный код страницы (элемента инфоблока)
require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/setting-page.php');
?>

<? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/og_twitter.php'); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/h1_breadcrumbs.php'); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/cur-date-social.php'); ?>

    <section class="content">
        <div class="accordion" id="accordionSchedule">
            <div class="container">
                <div class="row">
                    <div class="col category">
                        <a class="text-center active"
                           id="headingOne"
                           data-toggle="collapse"
                           href="#collapseIvanovskoye"
                           role="button"
                           aria-expanded="true"
                           aria-controls="collapseIvanovskoye">
                            <?= $sheduleIvanovskoyeName ?>
                        </a>
                        <a class="text-center collapsed"
                           id="headingTwo"
                           data-toggle="collapse"
                           href="#collapsePerovo"
                           aria-expanded="false"
                           aria-controls="collapsePerovo">
                            <?= $shedulePerovoName ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="container table-responsive collapse show" aria-labelledby="headingOne"
                 data-parent="#accordionSchedule" id="collapseIvanovskoye">
                <div class="row">
                    <div class="col">
                        <table class="table table-striped table-schedule">
                            <? $res = CIBlockElement::GetList(
                                array("PROPERTY_UP_DATE" => "ASC"),
                                array("IBLOCK_CODE" => "s3_shedule_ivanovskoye", "ACTIVE" => "Y", ">=PROPERTY_UP_DATE" => date('Y-m-d')),
                                false,
                                false,
                                array("PROPERTY_UP_DATE", "PROPERTY_UP_COLOR", "PROPERTY_UP_HOLIDAY", "PROPERTY_UP_LITURGY")
                            );

                            while ($arFields = $res->GetNext()): ?>
                                <? setlocale(LC_ALL, 'ru_RU.UTF-8');
                                $weekDay = strftime("%A", strtotime($arFields["PROPERTY_UP_DATE_VALUE"]));

                                if ($arFields["PROPERTY_UP_COLOR_VALUE"] == 'blue')
                                    $classRow = 'class="row-blue"';
                                elseif ($weekDay == "Воскресенье")
                                    $classRow = 'class="row-sun"';
                                elseif ($arFields["PROPERTY_UP_COLOR_VALUE"] == 'red')
                                    $classRow = 'class="row-red"';
                                else
                                    $classRow = null;
                                ?>
                                <tr <?= $classRow ?>>
                                    <td><b><?= $arFields["PROPERTY_UP_DATE_VALUE"] ?></b></td>
                                    <td><b><?= $weekDay ?></b></td>
                                    <td><?= $arFields["~PROPERTY_UP_HOLIDAY_VALUE"]["TEXT"] ?></td>
                                    <td><?= $arFields["~PROPERTY_UP_LITURGY_VALUE"]["TEXT"] ?></td>
                                </tr>
                            <? endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container table-responsive collapse" aria-labelledby="headingTwo"
                 data-parent="#accordionSchedule" id="collapsePerovo">
                <div class="row">
                    <div class="col">
                        <table class="table table-striped table-schedule">
                            <? $res = CIBlockElement::GetList(
                                array("PROPERTY_UP_DATE" => "ASC"),
                                array("IBLOCK_CODE" => "s3_shedule_perovo", "ACTIVE" => "Y", ">=PROPERTY_UP_DATE" => date('Y-m-d')),
                                false,
                                false,
                                array("PROPERTY_UP_DATE", "PROPERTY_UP_COLOR", "PROPERTY_UP_HOLIDAY", "PROPERTY_UP_LITURGY")
                            );

                            while ($arFields = $res->GetNext()): ?>
                                <? setlocale(LC_ALL, 'ru_RU.UTF-8');
                                $weekDay = strftime("%A", strtotime($arFields["PROPERTY_UP_DATE_VALUE"]));

                                if ($arFields["PROPERTY_UP_COLOR_VALUE"] == 'blue')
                                    $classRow = 'class="row-blue"';
                                elseif ($weekDay == "Воскресенье")
                                    $classRow = 'class="row-sun"';
                                elseif ($arFields["PROPERTY_UP_COLOR_VALUE"] == 'red')
                                    $classRow = 'class="row-red"';
                                else
                                    $classRow = null;
                                ?>
                                <tr <?= $classRow ?>>
                                    <td><b><?= $arFields["PROPERTY_UP_DATE_VALUE"] ?></b></td>
                                    <td><b><?= $weekDay ?></b></td>
                                    <td><?= $arFields["~PROPERTY_UP_HOLIDAY_VALUE"]["TEXT"] ?></td>
                                    <td><?= $arFields["~PROPERTY_UP_LITURGY_VALUE"]["TEXT"] ?></td>
                                </tr>
                            <? endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>