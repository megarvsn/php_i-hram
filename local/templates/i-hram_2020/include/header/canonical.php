<? // Настройка канонических страниц
$curPage = $APPLICATION->GetCurDir();
echo '<link rel="canonical" href="' . $curPage . '">' . PHP_EOL;
