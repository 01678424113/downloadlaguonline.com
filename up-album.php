<?php

include_once 'inc/connect.php';

$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];

if (empty($_GET['api'])) {
    echo '<meta http-equiv="refresh" content="0;url=' . $home . '" />';
    exit();
}
$id = $_GET['api'];
$api = explode('-', $id);
$api = $api[count($api) - 1];

$kt = mysqli_fetch_array(mysqli_query($conn, "SELECT api,id,url FROM album WHERE api='$api'"));
if ($kt['api'] == $api) {
    header("Location:" . $home . '/playlist/' . $kt['id'] . '/' . $kt['url'] . '.html');
}
include_once 'function/function.php';
include_once 'function/function_up.php';
include_once 'function/func.php';
include_once 'function/curl.php';

$cc = new cURL();
$html = $cc->get('http://laguaz.net/listen-album/' . $id);

$json = explode('data-xml="', $html);
$json = explode('"', $json[1]);
$json = 'http://laguaz.net'.strip_tags($json[0]);
if(trim($json) == 'http://laguaz.net'){
    header("Location:$home");
}
$tbh = explode('<h1 class="txt-primary">', $html);
$tbh = explode('</h1>', $tbh[1]);
$tbh = trim(strip_tags($tbh[0]));
if(trim($tbh) == ''){
    header("Location:$home");
}
$tcs = explode('<h2 itemprop="byArtist" class="txt-primary">', $html);
$tcs = explode('</h2>', $tcs[1]);
$tcs = trim(strip_tags($tcs[0]));

$image = explode('<meta property="og:image" content="', $html);
$image = explode('"', $image[1]);
$image = strip_tags($image[0]);
if (strpos($image, '/skins/') !== FALSE || strpos($image, 'error_img') !== FALSE || $image == '') {
    $icon = 'images/download-album-lagu-mp3-terbaru-gratis.png';
    $image = $home . '/images/image-share-download-lagu-mp3-terbaru-gratis.jpg';
}else{
    $icon = luuanh($image, $tbh, $tcs, 'album', 150, 150);
}

$views = explode('<span class="fn-total-play"', $html);
$views = explode('</span>', $views[1]);
$views = trim(strip_tags('<span'.$views[0]));
$views = str_replace(',', '', $views);

$cat = explode('<span>Genre: </span>', $html);
$cat = explode('</div>', $cat[1]);
$cat_link = explode('<a class="txt-info" href="/album-genre/', $cat[0]);
$cat_link = explode('/', $cat_link[1]);
$country = ucwords($cat_link[0]);
$cat = trim(strip_tags($cat[0]));
if($cat == '' || strpos($cat, 'Unknown') !== FALSE){
    $cat = 'Lagu Mp3';
}

$title = title($tbh, $tcs, 'album');
$des = des($tbh, $tcs, 'album');
$url = url($tbh, $tcs, 'album');
$alt_anh = title($tbh, $tcs, 'album');
$alt_anh = explode(' | ', $alt_anh);
$alt_anh = $alt_anh[0];
$content = get_search_yahoo($tbh, $tcs, '', '--:--', $cat, 'album');

$query = mysqli_query($conn, "INSERT INTO `album`(`urlgoc`, `author`, `json`, `api`, `name`, `title`, `description`, `url`, `icon`, `content`, `image`, `alt_anh`, `views`, `download`, `theloai`, `country`) VALUES ("
        . "'" . addslashes('http://laguaz.net/listen-album/' . $id) . "', '" . addslashes($tcs) . "', '" . addslashes($json) . "', '" . addslashes($api) . "', '" . addslashes($tbh) . "', '" . addslashes($title) . "', '" . addslashes($des) . "', "
        . "'" . addslashes($url) . "', '" . addslashes($icon) . "', '" . addslashes($content) . "', '" . addslashes($image) . "', "
        . "'" . addslashes($alt_anh) . "', '" . addslashes($views) . "', 0, '" . addslashes($cat) . "', '" . addslashes($country) . "')");

$r = mysqli_fetch_array(mysqli_query($conn, "SELECT id FROM album WHERE api='$api' ORDER BY id DESC LIMIT 1"));
header("Location:" . $home . "/playlist/" . $r['id'] . "/" . $url . ".html");
?>