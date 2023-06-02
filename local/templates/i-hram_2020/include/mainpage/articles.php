<section class="ftco-services">
    <div class="container">
        <div class="row justify-content-start mt-5 py-5">
            <div class="col-md-4 heading-section ftco-animate">
                <h2 class="text-black display-4"><?= $arResult['page-articles']["NAME"] ?></h2>
                <?= $arResult['page-articles']["HTML"] ?>
            </div>
            <div class="col-md-8 ftco-animate">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "mainpage_articles",
                    array(
                        "IBLOCK_TYPE" => "s3_content",    // Тип информационного блока (используется только для проверки)
                        "IBLOCK_ID" => "61",    // Код информационного блока
                        "NEWS_COUNT" => "4",    // Количество новостей на странице
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "FILTER_NAME" => "",    // Фильтр
                        "FIELD_CODE" => array(    // Поля
                            0 => "",
                            1 => "",
                        ),
                        "PROPERTY_CODE" => array(    // Свойства
                            0 => "UP_NUMBER",
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
                        "PAGER_TITLE" => "",    // Название категорий
                        "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
                        "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
                        "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
                        "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
                        "UP_BUTTON_MORE" => $arInterface["btn-all-articles"]["NAME"],
                    ),
                    false
                ); ?>
            </div>
        </div>
    </div>
</section>