<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include_once '../inc/connect.php';
include_once '../function/function_geturl.php';
include("../function/function.php");
include 'function_up.php';
include 'function_video.php';
include '../function/image.php';

$api = $_GET['api'];
$row = mysqli_fetch_array(mysqli_query($conn, "SELECT api FROM video WHERE api='$api' LIMIT 1"));
if ($row['api'] == $api) {
    echo 'Video is available';
    exit();
}
$domain = unserialize(file_get_contents("../up/domain.txt"));
$video = json_decode(getVideoYoutube($api));
$name = $video->name;
if (!empty(trim($name))) {
    $image = $video->image;
    $duration = mins($video->time);
    $views = $video->views;
	if (empty($views)) {
		$views = 0;
	}
    $rate = $video->rate;
    $tags = $video->tags;
	if (empty($tags)) {
		$tags = '';
	}
    $author = $video->author;
    $title = title($name, '', 'video');
    $alt_anh = title($name, '', 'video');
    $des = des($name, $author, 'video');
    $url = url($name, '', 'video');
    $img = luuanh('https://i.ytimg.com/vi/' . $api . '/mqdefault.jpg', $name, $author, 'video', 180, 101);
    if ($domain['image_content'] == 0) {
        $icon_content = luuanh_content('https://i.ytimg.com/vi/' . $api . '/hqdefault.jpg', $name, 'video');
    } else {
        $icon_content = '';
    }
	$lyrics = '';
    $idcat = 0;
    $name_cat = 'Lagu Gratis';
    $name_video = strtolower($name);
    if (preg_match('/(Indo|Indonesia|indo pop|indonesia pop|pop indo|indo|indonesia)/i', $name_video)) {
        $idcat = '5';
        $name_cat = 'Indo';
    } elseif (preg_match('/(pop|Pop)/i', $name_video)) {
        $idcat = '1';
        $name_cat = 'Pop';
    } elseif (preg_match('/(dangdut|dang dut)/i', $name_video)) {
        $idcat = '2';
        $name_cat = 'Dangdut';
    } elseif ((preg_match('/(r b|r&b|R&B)/i', $name_video))) {
        $idcat = '3';
        $name_cat = 'R&B';
    } elseif (preg_match('/(korea|korean|han quoc|seoul|k pop|kpop)/i', $name_video)) {
        $idcat = '4';
        $name_cat = 'Kpop';
    } elseif (preg_match('/(dance|Dance)/i', $name_video)) {
        $idcat = '6';
        $name_cat = 'Dance';
    } elseif (preg_match('/(rock|Rock)/i', $name_video)) {
        $idcat = '7';
        $name_cat = 'Rock';
    } elseif (preg_match('/(remix|Remix)/i', $name_video)) {
        $idcat = '8';
        $name_cat = 'Remix';
    } elseif (preg_match('/(hiphop|hip hop)/i', $name_video)) {
        $idcat = '9';
        $name_cat = 'Hip Hop';
    } elseif (preg_match('/(jazz|Jazz)/i', $name_video)) {
        $idcat = '10';
        $name_cat = 'Jazz';
    } elseif (preg_match('/(cover|cove|Cover)/i', $name_video)) {
        $idcat = '11';
        $name_cat = 'Cover';
    } elseif (preg_match('/(ska|Ska|sk a|s ka)/i', $name_video)) {
        $idcat = '12';
        $name_cat = 'SKA';
    } elseif (preg_match('/(anak|Anak|ana k)/i', $name_video)) {
        $idcat = '13';
        $name_cat = 'Anak';
    } elseif (preg_match('/(ost|Ost|os t)/i', $name_video)) {
        $idcat = '14';
        $name_cat = 'OST';
    } elseif (preg_match('/(Rap|rap)/i', $name_video)) {
        $idcat = '15';
        $name_cat = 'Rap';
    }
    $content = get_search_yahoo($name, $author, '', $duration, $name_cat, 'video', $icon_content, $conn);
    $query = mysqli_query($conn, "INSERT INTO `video`(`api`, `name`, `author`, `title`, `description`, `url`, `content`, `image`, `icon`, `alt_anh`, `lyrics`, `views`, `download`, `cat`, `id_cat`, `duration`, `rate`, `tags`) VALUES ("
		. "'" . addslashes($api) . "', '" . addslashes($name) . "', '" . addslashes($author) . "', '" . addslashes($title) . "', '" . addslashes($des) . "', '" . addslashes($url) . "', '" . addslashes($content) . "', "
		. "'" . addslashes($image) . "', '" . addslashes($img) . "', '" . addslashes($alt_anh) . "', '" . addslashes($lyrics) . "', " . addslashes($views) . ", 0, "
		. "'" . addslashes($name_cat) . "', " . addslashes($idcat) . ", '" . addslashes($duration) . "', '" . addslashes($rate) . "', '" . addslashes($tags) . "')");

    if ($query) {
        echo 'Add video successfully!!!';
    } else {
        echo 'Add video failed...';
    }
} else {
    echo 'Add video failed...';
}
?>