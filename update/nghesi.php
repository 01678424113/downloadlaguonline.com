<?php

$domain = unserialize(file_get_contents("../up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];

include '../function/function_geturl.php';
include '../inc/connect.php';
include("../function/curl.php");
include("../function/function.php");
include 'function_up.php';
include '../function/image.php';
$query = mysqli_query($conn, "SELECT * FROM nghesi WHERE title='' LIMIT 20");
while ($row = mysqli_fetch_array($query)) {
    $url = url(strtolower(trim($row['name'])), 'nghesi');
    $des = trim(des($row['name'], 'nghesi'));
    $title = trim(title($row['name'], 'nghesi'));
    $ct = '';
    $content_ns = get_search_yahoo($row['name'], $ct, 'nghesi');
    $alt_anh = title($row['name'], 'nghesi');
    $image = $row['image'];
    if (strpos($image, '/skins/') !== FALSE || $image == 'http://zmp3-photo.d.za.zdn.vn/') {
        $image = "";
    }
    if ($image == '') {
        $image = 'images/nghe-album-nhac-zing-mp3-hay-nhat-mien-phi.jpg';
        $img2 = $home . '/images/anh-share-tai-nhac-zing-mp3-mien-phi-ve-may.jpg';
    } else {
        $name_img_video = url($row['name'], 'nghesi');

        $nam = date('Y', time());
        $thang = date('m', time());
        $ngay = date('d', time());
        if (!file_exists("../icon_nghesi")) {
            mkdir("../icon_nghesi");
        }
        if (!file_exists("../icon_nghesi/" . $nam)) {
            mkdir("../icon_nghesi/" . $nam);
        }
        if (!file_exists("../icon_nghesi/" . $nam . '/' . $thang)) {
            mkdir("../icon_nghesi/" . $nam . '/' . $thang);
        }
        if (!file_exists("../icon_nghesi/" . $nam . '/' . $thang . '/' . $ngay)) {
            mkdir("../icon_nghesi/" . $nam . '/' . $thang . '/' . $ngay);
        }
        $content = file_get_contents($image);
        $savefile = fopen('../icon_nghesi/' . $nam . '/' . $thang . '/' . $ngay . '/' . $name_img_video . '.png', 'w');
        $chuan = fwrite($savefile, $content);
        fclose($savefile);

        $image = $home . '/icon_nghesi/' . $nam . '/' . $thang . '/' . $ngay . '/' . $name_img_video . '.png';
        $image_song = new SimpleImage();
        $image_song->load($image);
        $image_song->resize(150, 150);

        $image_song->save('../icon_nghesi/' . $nam . '/' . $thang . '/' . $ngay . '/' . $name_img_video . '.png');
        $image = 'icon_nghesi/' . $nam . '/' . $thang . '/' . $ngay . '/' . $name_img_video . '.png';
    }
    mysqli_query($conn, "UPDATE `nghesi` SET `title`='" . mysqli_real_escape_string($conn, $title) . "',`description`='" . mysqli_real_escape_string($conn, $des) . "',`url`='" . mysqli_real_escape_string($conn, $url) . "',`icon`='" . mysqli_real_escape_string($conn, $image) . "',`alt_anh`='" . mysqli_real_escape_string($conn, $alt_anh) . "',`content`='" . mysqli_real_escape_string($conn, $content_ns) . "',`views`=1 WHERE id=" . $row['id']);
    echo '<meta http-equiv="refresh" content="0">';
}