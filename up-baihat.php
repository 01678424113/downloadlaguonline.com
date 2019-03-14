<?php
include_once 'inc/connect.php';
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
if (empty($_GET['url'])) {
    echo '<meta http-equiv="refresh" content="0;url=' . $home . '" />';
    exit();
}
$api = $_GET['api'];
$url = $_GET['url'];
$kt = mysqli_fetch_array(mysqli_query($conn, "SELECT api,id,url FROM baihat WHERE api='$api'"));
if ($kt['api'] == $api) {
    header("Location:" . $home . '/lagu/' . $kt['id'] . '/' . $kt['url'] . '.html');
}
include_once 'function/function.php';
include_once 'function/function_up.php';
include_once 'function/func.php';

$link = 'http://api.lagump3terbaru.biz/get_source.php?url=' . $api . '/' . $url . '.html&type=baihat';
$json_data = json_decode(file_get_contents($link));
$tbh = $json_data->name;
$tcs = $json_data->author;
$source = $json_data->source;

if(trim($tbh) == ''){
    header("Location:$home");
}
$image = $json_data->image;
if ($image == '') {
    $icon = 'images/download-lagu-mp3-terbaru-gratis.png';
    $image = $home . '/images/image-share-download-lagu-mp3-terbaru-gratis.jpg';
} else {
    $icon = luuanh($image, $tbh, $tcs, 'baihat', 150, 150);
}
$lyrics = $json_data->lyrics;
if (empty($lyrics)) {
	$lyrics = 'Saat ini tidak ada lirik untuk lagu ini...';
}
$views = $json_data->views;
$views = str_replace(',', '', $views);
$duration = $json_data->duration;
$download = 0;
$cat = '';
$country = 'Indo';
$urlgoc = 'https://lagu123.blog/' . $api . '/' . $url . '.html';

$name_yt = str_replace(' ', '+', $tbh) . '+' . str_replace(' ', '+', $tcs);
$youtube_data_json = json_decode(file_get_contents('http://vn1.api.gugitech.com/youtube.php?q=' . $name_yt . '&lang=id&count=1'));
$api_youtube = $youtube_data_json[0]->api;
if ($api_youtube == '') {
	$api_youtube = 'NULL';
}
$title = title($tbh, $tcs, 'baihat');
$des = des($tbh, $tcs, 'baihat');
$url = url($tbh, $tcs, 'baihat');
$alt_anh = explode(' | ', $title);
$alt_anh = $alt_anh[0];
$content = get_search_yahoo($tbh, $tcs, '', '--:--', $cat, 'baihat', '', '');

$query = mysqli_query($conn, "INSERT INTO `baihat`(`api`, `api_youtube`, `name`, `author`, `title`, `description`, `url`, `urlgoc`, `icon`, `lyrics`, `content`, `image`, `alt_anh`, `views`, `download`, `cat`, `duration`, `source`, `country`) VALUES ("
        . "'" . addslashes($api) . "', '" . addslashes($api_youtube) . "', '" . addslashes($tbh) . "', '" . addslashes($tcs) . "', '" . addslashes($title) . "', '" . addslashes($des) . "', '" . addslashes($url) . "', "
		. "'" . addslashes($urlgoc) . "', '" . addslashes($icon) . "', '" . addslashes($lyrics) . "', '" . addslashes($content) . "', '" . addslashes($image) . "', '" . addslashes($alt_anh) . "', " . addslashes($views) . ", "
		. "'" . addslashes($download) . "', '" . addslashes($cat) . "', '" . addslashes($duration) . "', '" . addslashes($source) . "', '" . addslashes($country) . "')");

$r = mysqli_fetch_array(mysqli_query($conn, "SELECT id FROM baihat WHERE api='$api' ORDER BY id DESC LIMIT 1"));
header("Location:" . $home . "/lagu/" . $r['id'] . "/" . $url . ".html");
?>