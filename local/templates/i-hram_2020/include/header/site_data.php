<?php
// get site data
$cache = new CPHPCache();
$cache_time = 86400;
$cache_id = 'CSiteGetByID' . SITE_ID;
$cache_path = '/siteData/';
if ($cache_time > 0 && $cache->InitCache($cache_time, $cache_id, $cache_path)) {
    $res = $cache->GetVars();
    if (is_array($res["CSiteGetByID"]) && (count($res["CSiteGetByID"]) > 0))
        $CSiteGetByID = $res["CSiteGetByID"];
}
if (!is_array($CSiteGetByID)) {
    $rsSites = CSite::GetByID(SITE_ID);
    $CSiteGetByID = $rsSites->Fetch();
    if ($cache_time > 0) {
        $cache->StartDataCache($cache_time, $cache_id, $cache_path);
        $cache->EndDataCache(array("CSiteGetByID" => $CSiteGetByID));
    }
}