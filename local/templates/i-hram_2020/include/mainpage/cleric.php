<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <h2 class="subheading subheading-with-line"><small class="px-2 bg-light"><?= $arResult['page-cleric']["NAME"] ?></small></h2>
                <?= $arResult['page-cleric']["HTML"] ?>
            </div>
        </div>
        <div class="block-13 nonloop-block-13 owl-carousel" data-aos="fade">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "mainpage_cleric",
                array(
                    "IBLOCK_TYPE" => "s3_content",    // Тип информационного блока (используется только для проверки)
                    "IBLOCK_ID" => "55",    // Код информационного блока
                    "NEWS_COUNT" => "1000",    // Количество новостей на странице
                    "SORT_BY1" => "SORT",    // Поле для первой сортировки новостей
                    "SORT_ORDER1" => "ASC",    // Направление для первой сортировки новостей
                    "SORT_BY2" => "",    // Поле для второй сортировки новостей
                    "SORT_ORDER2" => "",    // Направление для второй сортировки новостей
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
                    "RSMONOPOLY_PROP_FILE" => "FILE",
                    "RSMONOPOLY_SHOW_BLOCK_NAME" => "N",
                    "RSMONOPOLY_USE_OWL" => "N",
                    "RSMONOPOLY_COLS_IN_ROW" => "4",
                    "PAGER_TEMPLATE" => "main",    // Шаблон постраничной навигации
                    "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
                    "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
                    "PAGER_TITLE" => "Новости",    // Название категорий
                    "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
                    "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
                    "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
                    "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
                    "RSMONOPOLY_BLOCK_NAME_IS_LINK" => "N"
                ),
                false
            ); ?>
        </div>
    </div>
</div>