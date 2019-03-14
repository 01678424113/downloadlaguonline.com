<?php
$vs = json_decode(file_get_contents('version.txt'));
$version = json_decode(file_get_contents('http://get.nhaczingmp3.com/theme/zing/' . trim($vs->theme) . '/update/version.txt'));
$arr = $version->file;
foreach ($arr as $thaydoi) {
    $file = trim(str_replace('.php', '.txt', $thaydoi));
    file_put_contents('../' . $thaydoi, file_get_contents('http://get.nhaczingmp3.com/theme/zing/' . trim($vs->theme) . '/' . $file));
}
$arr = array(
    'theme' => trim($vs->theme),
    'version' => trim($version->version),
    'type' => 'zing',
);
file_put_contents('version.txt', json_encode($arr));
?>