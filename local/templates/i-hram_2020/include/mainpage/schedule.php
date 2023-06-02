<div class="site-section border-bottom bg-light py-5">
    <div class="accordion" id="accordionSchedule">
        <div class="container">
            <div class="row">
                <div class="col-12 heading-section">
                    <h2 class="text-black subheading subheading-with-line"><span
                                class="pr-2 bg-light"><?= $arResult['page-shedule']["NAME"] ?></span></h2>
                </div>
            </div>
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
        <div class="container collapse show" aria-labelledby="headingOne" data-parent="#accordionSchedule"
             id="collapseIvanovskoye">
            <div class="row py-5" style="border: 1px solid rgba(0, 0, 0, 0.1);">
                <? $res = CIBlockElement::GetList(
                    array("PROPERTY_UP_DATE" => "ASC"),
                    array("IBLOCK_CODE" => "s3_shedule_ivanovskoye", "ACTIVE" => "Y", ">=PROPERTY_UP_DATE" => date('Y-m-d')),
                    false,
                    false,
                    array("PROPERTY_UP_DATE", "PROPERTY_UP_COLOR", "PROPERTY_UP_HOLIDAY", "PROPERTY_UP_LITURGY")
                );

                $cnt = 0;
                while ($arFields = $res->GetNext()): ?>
                    <? setlocale(LC_ALL, 'ru_RU.UTF-8');
                    $weekDay = strftime("%A", strtotime($arFields["PROPERTY_UP_DATE_VALUE"]));

                    if ($arFields["PROPERTY_UP_COLOR_VALUE"] == 'blue')
                        $classRow = 'col-blue';
                    elseif ($weekDay == "Воскресенье")
                        $classRow = 'col-red';
                    elseif ($arFields["PROPERTY_UP_COLOR_VALUE"] == 'red')
                        $classRow = 'col-red';
                    else
                        $classRow = null;
                    ?>
                    <div class="col-12 col-sm-4 <?= $classRow ?>">
                        <div class="text-center">
                            <p class="h4 font-weight-bold" data-aos="fade">
                                <?= $arFields["PROPERTY_UP_DATE_VALUE"] ?>
                            </p>
                            <p><b><?= $weekDay ?></b></p>
                        </div>
                        <hr>
                        <? if ($arFields["~PROPERTY_UP_HOLIDAY_VALUE"]["TEXT"]): ?>
                            <p><?= $arFields["~PROPERTY_UP_HOLIDAY_VALUE"]["TEXT"] ?></p>
                            <hr>
                        <? endif; ?>
                        <p><?= $arFields["~PROPERTY_UP_LITURGY_VALUE"]["TEXT"] ?></p>
                    </div>
                    <? $cnt++;
                    if ($cnt > 2) break;
                    ?>
                <? endwhile; ?>
            </div>
        </div>
        <div class="container collapse" aria-labelledby="headingTwo" data-parent="#accordionSchedule"
             id="collapsePerovo">
            <div class="row py-5" style="border: 1px solid rgba(0, 0, 0, 0.1);">
                <? $res = CIBlockElement::GetList(
                    array("PROPERTY_UP_DATE" => "ASC"),
                    array("IBLOCK_CODE" => "s3_shedule_perovo", "ACTIVE" => "Y", ">=PROPERTY_UP_DATE" => date('Y-m-d')),
                    false,
                    false,
                    array("PROPERTY_UP_DATE", "PROPERTY_UP_COLOR", "PROPERTY_UP_HOLIDAY", "PROPERTY_UP_LITURGY")
                );

                $cnt = 0;
                while ($arFields = $res->GetNext()): ?>
                    <? setlocale(LC_ALL, 'ru_RU.UTF-8');
                    $weekDay = strftime("%A", strtotime($arFields["PROPERTY_UP_DATE_VALUE"]));

                    if ($arFields["PROPERTY_UP_COLOR_VALUE"] == 'blue')
                        $classRow = "col-blue";
                    elseif ($weekDay == "Воскресенье")
                        $classRow = "col-red";
                    elseif ($arFields["PROPERTY_UP_COLOR_VALUE"] == 'red')
                        $classRow = "col-red";
                    else
                        $classRow = null;
                    ?>
                    <div class="col-12 col-sm-4 <?= $classRow ?>">
                        <div class="text-center">
                            <p class="h4 font-weight-bold" data-aos="fade">
                                <?= $arFields["PROPERTY_UP_DATE_VALUE"] ?>
                            </p>
                            <p><b><?= $weekDay ?></b></p>
                        </div>
                        <hr>
                        <? if ($arFields["~PROPERTY_UP_HOLIDAY_VALUE"]["TEXT"]): ?>
                            <p><?= $arFields["~PROPERTY_UP_HOLIDAY_VALUE"]["TEXT"] ?></p>
                            <hr>
                        <? endif; ?>
                        <p><?= $arFields["~PROPERTY_UP_LITURGY_VALUE"]["TEXT"] ?></p>
                    </div>
                    <? $cnt++;
                    if ($cnt > 2) break;
                    ?>
                <? endwhile; ?>
            </div>
        </div>
    </div>
</div>