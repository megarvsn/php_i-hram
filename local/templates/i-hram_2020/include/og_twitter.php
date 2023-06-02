<?php
if ($pageImage) $image = $pageImage;
else $image = '/images/logo-fb.jpg';

if ($ogTitle) $title = $ogTitle;
else $title = $APPLICATION->GetProperty("title");

if ($ogDescription) $description = $ogDescription;
else $description = $APPLICATION->GetProperty("description");

if ($ogType) $type = $ogType;
else $type = 'website';

if ($ogCard) $card = $ogCard;
else $card = 'summary';

use Bitrix\Main\Page\Asset;
$Asset = Asset::getInstance();
$Asset->addString('<meta property="og:title" content="' . htmlspecialchars($title) . '"/>');
$Asset->addString('<meta property="og:description" content="' . htmlspecialchars($description) . '"/>');
$Asset->addString('<meta property="og:image" content="//' . SITE_SERVER_NAME . $image . '">');
$Asset->addString('<meta property="og:type" content="'. $type . '"/>');
$Asset->addString('<meta property="og:url" content="//' . SITE_SERVER_NAME . $APPLICATION->GetCurPage() . '"/>');

$Asset->addString('<meta name="twitter:card" content="'. $card  . '"/>');
$Asset->addString('<meta name="twitter:site" content="@i-hram"/>');
$Asset->addString('<meta name="twitter:creator" content="@i-hram"/>');
$Asset->addString('<meta name="twitter:title" content="' . htmlspecialchars($title) . '"/>');
$Asset->addString('<meta name="twitter:description" content="' . htmlspecialchars($description) . '"/>');
$Asset->addString('<meta name="twitter:image" content="//' . SITE_SERVER_NAME . $image . '" />');