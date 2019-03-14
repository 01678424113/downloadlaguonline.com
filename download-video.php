<?php
include 'function/curl.php';
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];
$api = $_GET['api'];
include 'inc/connect.php';
mysqli_query($conn, "UPDATE `video` SET `download`=`download` + 1 WHERE api='$api'");
$folder1 = 'dl_video';
$folder2 = substr($api, 0, 3);
$file = $api;
if ($domain['cache'] == 0) {
    $cachetime = 86400;
} else {
    $cachetime = 0;
}
include 'cache_top.php';

$link = 'http://video.genyoutube.net/' . $api;
$cc = new cURL();
$html = $cc->get($link);

$link_down = explode('<div id="downloadlist" class="downloadlistclass">', $html);
$link_down = explode('<div style="width: auto; height: auto; margin: 0 auto;">', $link_down[1]);
$link_down = explode('<div id="about"', $link_down[0]);
$link_down = str_replace('GenYoutube.net', $namehome, $link_down[0]);

$name_video = explode('<h1 itemprop="name" id="ytitle">', $html);
$name_video = explode('</h1>', $name_video[1]);
$name_video = $name_video[0];

$title = 'Download video musik ' . $name_video;
$description = 'Download video musik ' . $name_video . ' gratis terbaik Indonesia';
$meta_key = '';
$geturl = $home;
$anh_share = 'https://i.ytimg.com/vi/' . $api . '/mqdefault.jpg';
include 'inc/header.php';
$linkmp3 = 'http://dl.gudanglagu.info/video-to-mp3.php?api=' . $api . '&name=' . urlencode($name_video);

$link_ssg = explode("\n", trim(file_get_contents('https://belimurah.net/up/link-dr.txt')));
$j = rand(0, count($link_ssg) - 1);
$link_dr = 'https://belimurah.net/banding-harga/' . trim($link_ssg[$j]) . '.html';
?>
<style>
    .dl_mp3 {
        padding: 0 30px;
    }
    .dl_mp3 .dl-box {
        padding: 20px 25px;
        border: 1px solid #888;
    }
    .dl_mp3 .downbuttonbox a {
        width: 100%;
        margin: 5px 0;
        text-align: left;
        text-shadow: 0 1px 0 #fff;
        border-color: #ccc;
        background-image: linear-gradient(to bottom,#fff 0,#e0e0e0 100%);
    }
    .dl_mp3 .downbuttonbox a .label {
        float: right;
        color: #3c3c3c;
        margin-top: 4px;
    }
    .dl-mp3 {
        text-align: center;
    }
    .dl-mp3 .dl-mp3-btn {
        background: #1fcc00;
        color: #fff;
        padding: 7px 15px;
        font-size: 17px;
        text-decoration: none;
        border: none;
        border-radius: 3px;
        margin: 15px 5px;
        display: inline-block;
    }

    .lagu-down-btn a:hover {
        color: #fff !important;
        background: #ff5412 !important;
    }
    .dlpro {
        font-size: 20px !important;
        background-color: #57d6c7;
        font-weight: bold;
        text-shadow: 1px 1px #57D6C7;
        color: #ffffff;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border: 1px solid #57D6C7;
        cursor: pointer;
        padding: 10px;

    }
    .lagu-down-btn i {
        color: #fff;
    }
</style>
﻿<meta name="robots" content="noindex, nofollow" />
<meta name="googlebot" content="noindex">
<meta name="googlebot" content="nofollow">
<meta name="referrer" content="no-referrer" />
<meta name="referrer" content="never">
<div class="container">
    <div class="ct_dlvideo" style="margin: 25px 0; text-align: center;">
        <img src="<?php echo $anh_share; ?>" >
        <h2 class="video-name" style="color: #343434; font-size: 20px; margin-top: 20px;"><?php echo $name_video; ?></h2>
    </div>
    <form action="<?php echo $link_dr; ?>" method="post">
        <input type="hidden" name="name" value = "<?php echo ucwords($name_video); ?>">
        <input type="hidden" name="link" value="<?php echo $linkmp3; ?>">
        <input type="hidden" name="image" value="<?php echo $anh_share; ?>">
        <input type="hidden" name="key" value="<?php echo md5(manhpro); ?>">
        <div class="lagu-down-btn" style="margin: 10px auto; border-radius: 5px; font-size: 20px;text-transform: uppercase;text-align: center;width: 215px;">
            <button type="submit" class="dlpro"><i class="fa fa-download"></i> DOWNLOAD MP3</button>
        </div>
    </form>
</div>
<?php
echo '<div class="container dl_mp3"><div class="dl-box">' . $link_down . '</div></div>';
include 'cache_bot.php';
include 'inc/footer.php';
