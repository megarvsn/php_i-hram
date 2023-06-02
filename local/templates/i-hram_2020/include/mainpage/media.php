<section class="ftco-section ftco-no-pb bg-light py-5">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-2">
            <div class="col-md-4 heading-section ftco-animate">
                <span class="subheading subheading-with-line">
                    <small class="pr-2 bg-light"><?= $arInterface["header-media"]["NAME"]; ?></small>
                </span>
                <h2 class="mb-4"><?= $arInterface["header-photo-video"]["NAME"]; ?></h2>
            </div>
            <div class="col-md-8 pl-md-5 heading-section ftco-animate">
                <div class="pl-md-4 border-line">
                    <?= $arResult['page-photogallery']["HTML"] ?>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion" id="accordionMedia">
        <div class="container">
            <div class="row">
                <div class="category col-6 justify-content-end">
                    <a class="active"
                       id="headingPhoto"
                       data-toggle="collapse"
                       href="#collapsePhoto"
                       role="button"
                       aria-expanded="true"
                       aria-controls="collapsePhoto">
                        <?= $arInterface["tab-photo"]["NAME"]; ?>
                    </a>
                </div>
                <div class="category col-6 justify-content-start">
                    <a class="collapsed"
                       id="headingVideo"
                       data-toggle="collapse"
                       href="#collapseVideo"
                       aria-expanded="false"
                       aria-controls="collapseVideo">
                        <?= $arInterface["tab-video"]["NAME"]; ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="container-wrap collapse show" aria-labelledby="headingPhoto" data-parent="#accordionMedia"
             id="collapsePhoto">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "mainpage_photogallery",
                array(
                    "IBLOCK_TYPE" => "s3_content",    // Тип информационного блока (используется только для проверки)
                    "IBLOCK_ID" => "65",    // Код информационного блока
                    "NEWS_COUNT" => "8",    // Количество новостей на странице
                    "SORT_BY1" => "ID",
                    "SORT_BY2" => "",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "",
                    "FILTER_NAME" => "",    // Фильтр
                    "FIELD_CODE" => array(    // Поля
                        0 => "",
                        1 => "",
                    ),
                    "PROPERTY_CODE" => array(    // Свойства
                        0 => "",
                        1 => "",
                    ),
                    "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
                    "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                    "AJAX_MODE" => "N",    // Включить режим AJAX
                    "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
                    "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
                    "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
                    "CACHE_TYPE" => "A",    // Тип кеширования
                    "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                    "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
                    "CACHE_GROUPS" => "Y",    // Учитывать права доступа
                    "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
                    "SET_TITLE" => "N",    // Устанавливать заголовок страницы
                    "SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
                    "SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
                    "SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
                    "SET_STATUS_404" => "N",    // Устанавливать статус 404
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
                    "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
                    "PARENT_SECTION" => "",    // ID раздела
                    "PARENT_SECTION_CODE" => "",    // Код раздела
                    "INCLUDE_SUBSECTIONS" => "Y",    // Показывать элементы подразделов раздела
                    "PAGER_TEMPLATE" => "main",    // Шаблон постраничной навигации
                    "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
                    "DISPLAY_BOTTOM_PAGER" => "N",    // Выводить под списком
                    "PAGER_TITLE" => "Новости",    // Название категорий
                    "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
                    "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
                    "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
                    "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
                ),
                false
            ); ?>
        </div>
        <div class="container-wrap collapse" aria-labelledby="headingVideo" data-parent="#accordionMedia"
             id="collapseVideo">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "mainpage_video",
                array(
                    "ACTIVE_DATE_FORMAT" => "j F Y",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "Y",
                    "COMPONENT_TEMPLATE" => "mainpage_video",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "64",
                    "IBLOCK_TYPE" => "s3_content",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "1",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "main",
                    "PAGER_TITLE" => "Видео",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array(
                        0 => "UP_URL_YOUTUBE",
                    ),
                    "SET_BROWSER_TITLE" => "Y",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "Y",
                    "SET_META_KEYWORDS" => "Y",
                    "SET_STATUS_404" => "Y",
                    "SET_TITLE" => "Y",
                    "SHOW_404" => "Y",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER1" => "DESC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N",
                    "FILE_404" => ""
                ),
                false
            ); ?>
        </div>
    </div>
</section>