<?php
$api = $_GET["api"];
$name = $_GET["name"];
$arr = array (
	'http://api.lagump3.mobi/get_link_listen.php?url=' . $api . '/' . $name . '.html',
	'http://api2.lagump3.mobi/get_link_listen.php?url=' . $api . '/' . $name . '.html',
	'http://api3.lagump3.mobi/get_link_listen.php?url=' . $api . '/' . $name . '.html',
	'http://api4.lagump3.mobi/get_link_listen.php?url=' . $api . '/' . $name . '.html'
);
$link = $arr[rand(0, count($arr) - 1)];
$json_data = json_decode(file_get_contents($link));
$url = $json_data->source;
header("Content-Transfer-Encoding: binary");
header("Content-Type: audio/mpeg");
header('Content-Disposition: attachment; filename="' . str_replace(' ', '-', $name) . '.mp3"');
ob_clean();
flush();

readfile($url);
exit();
