<?php
if (isset($_POST['submit'])) {
    include_once '../inc/connect.php';
    include_once '../function/function_geturl.php';
    include("../function/function.php");
    include 'function_up.php';
    include '../function/image.php';

    $domain = unserialize(file_get_contents("../up/domain.txt"));
    $duration = $_POST['duration'];
    $views = $_POST['views'];
    $author = $_POST['author'];
    $rate = $_POST['rate'];
    $api = $_POST['api'];
    $name_video = $_POST['name'];
    if (!empty(trim($name_video))) {
        $title = $_POST['title'];
        $des = $_POST['description'];
        $url = $_POST['url'];
        $alt_anh = $_POST['alt_anh'];
        $type = $_POST['type'];
        $tags = $_POST['tags'];
        $thumbnail = $_POST['thumbnail'];
        $image = "https://i.ytimg.com/vi/$api/hqdefault.jpg";
        $img = luuanh('https://i.ytimg.com/vi/' . $api . '/mqdefault.jpg', $name_video, $author, 'video', 180, 101);
        if ($domain['image_content'] == 0) {
            $icon_content = luuanh_content('https://i.ytimg.com/vi/' . $api . '/hqdefault.jpg', $name_video, 'video');
        } else {
            $icon_content = '';
        }
		$lyrics = '';
        if ($type == 0) {
            $idcat = 0;
            $name_cat = 'Lagu Gratis';
            if (preg_match('/(Indo|Indonesia|indo pop|indonesia pop|pop indo|indo|indonesia)/i', $name_video)) {
                $idcat = '5';
                $name_cat = 'Indo';
            } elseif (preg_match('/(pop|Pop)/i', $name_video)) {
                $idcat = '1';
                $name_cat = 'Pop';
            } elseif (preg_match('/(Dangdut|dangdut|dang dut)/i', $name_video)) {
                $idcat = '2';
                $name_cat = 'Dangdut';
            } elseif ((preg_match('/(r b|r&b|R&B)/i', $name_video))) {
                $idcat = '3';
                $name_cat = 'R&B';
            } elseif (preg_match('/(Kpop|korea|korean|han quoc|seoul|k pop|kpop)/i', $name_video)) {
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
            } elseif (preg_match('/(Hip Hop|hiphop|hip hop)/i', $name_video)) {
                $idcat = '9';
                $name_cat = 'Hip Hop';
            } elseif (preg_match('/(jazz|Jazz)/i', $name_video)) {
                $idcat = '10';
                $name_cat = 'Jazz';
            } elseif (preg_match('/(cover|cove|Cover)/i', $name_video)) {
                $idcat = '11';
                $name_cat = 'Cover';
            } elseif (preg_match('/(SKA|ska|Ska|sk a|s ka)/i', $name_video)) {
                $idcat = '12';
                $name_cat = 'SKA';
            } elseif (preg_match('/(anak|Anak|ana k)/i', $name_video)) {
                $idcat = '13';
                $name_cat = 'Anak';
            } elseif (preg_match('/(OST|ost|Ost|os t)/i', $name_video)) {
                $idcat = '14';
                $name_cat = 'OST';
            } elseif (preg_match('/(Rap|rap)/i', $name_video)) {
                $idcat = '15';
                $name_cat = 'Rap';
            }
        } else {
            $idcat = $type;
            if ($type == 1) {
                $name_cat = 'Pop';
            } elseif ($type == 2) {
                $name_cat = 'Dangdut';
            } elseif ($type == 3) {
                $name_cat = 'R&B';
            } elseif ($type == 4) {
                $name_cat = 'Kpop';
            } elseif ($type == 5) {
                $name_cat = 'Indo';
            } elseif ($type == 6) {
                $name_cat = 'Dance';
            } elseif ($type == 7) {
                $name_cat = 'Rock';
            } elseif ($type == 8) {
                $name_cat = 'Remix';
            } elseif ($type == 9) {
                $name_cat = 'Hip Hop';
            } elseif ($type == 10) {
                $name_cat = 'Jazz';
            } elseif ($type == 11) {
                $name_cat = 'Cover';
            } elseif ($type == 12) {
                $name_cat = 'SKA';
            } elseif ($type == 13) {
                $name_cat = 'Anak';
            } elseif ($type == 14) {
                $name_cat = 'OST';
            } elseif ($type == 15) {
                $name_cat = 'Rap';
            }
        }
        $content = get_search_yahoo($name_video, '', '', $duration, $name_cat, 'video', $icon_content, $conn);
        $query = mysqli_query($conn, "INSERT INTO `video`(`api`, `name`, `author`, `title`, `description`, `url`, `content`, `image`, `icon`, `alt_anh`, `lyrics`, `views`, `download`, `cat`, `id_cat`, `duration`, `rate`, `tags`) VALUES ("
			. "'" . addslashes($api) . "', '" . addslashes($name_video) . "', '" . addslashes($author) . "', '" . addslashes($title) . "', '" . addslashes($des) . "', '" . addslashes($url) . "', '" . addslashes($content) . "', "
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
}