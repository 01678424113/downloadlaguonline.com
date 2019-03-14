<?php
$check = file_exists('../ads');
if ($check != 'TRUE') {
    mkdir('../ads');
}
$check = file_exists('../css');
if ($check != 'TRUE') {
    mkdir('../css');
}
$check = file_exists('../function');
if ($check != 'TRUE') {
    mkdir('../function');
}
$check = file_exists('../inc');
if ($check != 'TRUE') {
    mkdir('../inc');
}
$check = file_exists('../js');
if ($check != 'TRUE') {
    mkdir('../js');
}
$check = file_exists('../update');
if ($check != 'TRUE') {
    mkdir('../update');
}
$arr = json_decode(file_get_contents('http://get.nhaczingmp3.com/version/theme.txt'));
foreach ($arr as $theme) {
    $file = trim(str_replace('.php', '.txt', $theme));
    if($file == 'index.txt'){
        $file = 'in.txt';
    }
    $data_file = file_get_contents('http://get.nhaczingmp3.com/theme/zing/' . $_GET['number_theme'] . '/' . $file);
    file_put_contents('../' . trim($theme), $data_file);
}
$version = json_decode(file_get_contents('http://get.nhaczingmp3.com/theme/zing/' . $_GET['number_theme'] . '/update/version.txt'));
$arr = array(
    'theme' => $_GET['number_theme'],
    'version' => $version->version,
    'type' => 'zing',
);
file_put_contents('version.txt', json_encode($arr));
header("Location:../");
?>