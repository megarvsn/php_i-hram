<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php'); ?>
<?
LoadProperty::setIblock('s3_pages');
LoadProperty::setSection('');
$arResult = LoadProperty::m_LoadProperty();
?>
<div class="content">
    <div style="display: none"><h1>Главная страница храма рождества Иоанна Предтечи в Ивновском</h1></div>
    <? require_once($_SERVER["DOCUMENT_ROOT"]. SITE_TEMPLATE_PATH . '/include/mainpage/slider.php');?>
    <? require_once($_SERVER["DOCUMENT_ROOT"]. SITE_TEMPLATE_PATH . '/include/mainpage/schedule.php');?>
    <? require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/include/footer/banner-kreshenie.php'); ?>
    <? require_once($_SERVER["DOCUMENT_ROOT"]. SITE_TEMPLATE_PATH . '/include/mainpage/news.php');?>
    <? require_once($_SERVER["DOCUMENT_ROOT"]. SITE_TEMPLATE_PATH . '/include/mainpage/about_us.php');?>
    <? require_once($_SERVER["DOCUMENT_ROOT"]. SITE_TEMPLATE_PATH . '/include/mainpage/cleric.php');?>
    <? require_once($_SERVER["DOCUMENT_ROOT"]. SITE_TEMPLATE_PATH . '/include/mainpage/articles.php');?>
    <? require_once($_SERVER["DOCUMENT_ROOT"]. SITE_TEMPLATE_PATH . '/include/mainpage/media.php');?>
    <? require_once($_SERVER["DOCUMENT_ROOT"]. SITE_TEMPLATE_PATH . '/include/mainpage/catechism.php');?>
</div>
<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>