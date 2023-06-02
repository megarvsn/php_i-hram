<? // Запрет на индексирование страниц сайта, указанных в файле robots.txt
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/d-robots.php')) {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/d-robots.php');
    $dRobots = dRobots::fromFile();
    $noindex = $dRobots->checkUrl($_SERVER['REQUEST_URI']) ? '<meta name="googlebot" content="noindex">' . PHP_EOL : '';
} else $noindex = '';

//Вывод в шаблоне
echo $noindex;