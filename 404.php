<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

// Настройки страницы
$iBlockCode = 's3_pages'; // Символьный код инфоблока
$pageCode = 'page-404'; // Символьный код страницы (элемента инфоблока)
require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/setting-page.php');
?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="block-page error404 text-center">
				<div class='text404'>
					<div>404</div>
                    <div>Ошибка</div>
				</div>
				<p>Страница не найдена</p>
				<a class='btn btn-outline-primary btn-sm rounded-0 p-2 px-4' href='<?=SITE_DIR?>'>На главную</a>
			</div>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>