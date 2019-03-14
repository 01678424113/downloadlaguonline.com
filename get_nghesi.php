<?php
include_once 'inc/connect.php';
include_once 'function/function.php';
include_once 'function/function_up.php';
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
if (empty($_GET['p'])) {
    $p = 1;
} else {
    $p = $_GET['p'];
}
$t = 0;
$artist_link = "https://wapdownloadlagu.net/get_nghesi.php?p=$p";
$json_data = json_decode(file_get_contents($artist_link));
for ($i = 0; $i < count($json_data); $i++) {
	$api = $json_data[$i]->api;
	$name = $json_data[$i]->name;
	$image = $json_data[$i]->image;
	$tieusu = $json_data[$i]->story;
	$country = $json_data[$i]->country;

	if (strpos($image, 'images/artis-lagu.png') !== FALSE) {
		$icon = 'images/artis-lagu.png';
	} else {
		$icon = luuanh($image, $name, '', 'nghesi', 200, 200);
	}
	
	$title = title($name, '', 'nghesi');
	$des = des($name, '', 'nghesi');
	$url = strtolower(khongdau(xoakt(trim($name))));
	$url = str_replace(" ", "-", $url);
	$url = str_replace("--", "-", $url);
	$alt_anh = explode(' | ', $title);
	$alt_anh = $alt_anh[0];
	$content = get_search_yahoo($name, '', '', '', '', 'nghesi', $icon_content, $conn);

	if ($country == 'Indonesia') {
		$id_country = 1;
	}
	if ($country == 'US UK') {
		$id_country = 2;
	}
	if ($country == 'Korea') {
		$id_country = 3;
	}
	$row = mysqli_fetch_array(mysqli_query($conn, "SELECT api FROM nghesi WHERE api='$api' LIMIT 1"));
	$api_old = $row['api'];
	
	if ($name != '') {
		if (empty($api_old)) {
			$query = mysqli_query($conn, "INSERT INTO `nghesi`(`api`, `name`, `title`, `description`, `url`, `icon`, `tieusu`, `content`, `alt_anh`, `views`, `country`, `id_country`) VALUES ("
				. "'" . addslashes($api) . "', '" . addslashes($name) . "', '" . addslashes($title) . "', '" . addslashes($des) . "', '" . addslashes($url) . "', '" . addslashes($icon) . "',"
				. "'" . addslashes($tieusu) . "', '" . addslashes($content) . "', '" . addslashes($alt_anh) . "', 0, '" . addslashes($country) . "', $id_country)");
		}
	}
	$t++;
}
if ($t == 0) {
	echo 'Successfully!!!';
	exit();
}
$p++;
echo "<meta http-equiv='refresh' content='0;URL=$home/get_nghesi.php?p=$p'>";