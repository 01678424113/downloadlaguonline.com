<?php

if (empty($_GET["api"]) || empty($_GET["id"])) {
    exit();
}
$id = $_GET["api"];
$i = $_GET["id"] - 1;

include 'inc/connect.php';
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];
if ($domain['memcache'] == 0) {
    define('MEMCACHED_HOST', 'localhost');
    define('MEMCACHED_PORT', '11211');

    $name_key = strtolower(str_replace('.', '', $namehome)) . 'playlist';
    $memcache = new Memcache;
    $cacheAvailable = $memcache->connect(MEMCACHED_HOST, MEMCACHED_PORT);
    if ($cacheAvailable == true) {
        $key = $name_key . $id;
        $row = $memcache->get($key);
    }
    if (empty($row)) {
        $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM album WHERE id=$id LIMIT 1"));
        $key = $name_key . $id;
        $product = array(
            'id' => $row['id'],
            'api' => $row['api'],
            'name' => $row['name'],
            'title' => $row['title'],
            'description' => $row['description'],
            'url' => $row['url'],
            'urlgoc' => $row['urlgoc'],
            'icon' => $row['icon'],
            'content' => $row['content'],
            'image' => $row['image'],
            'alt_anh' => $row['alt_anh'],
            'views' => $row['views'],
            'download' => $row['download'],
            'theloai' => $row['theloai'],
            'id_cat' => $row['id_cat'],
            'author' => $row['author'],
            'name_cat' => $row['name_cat'],
            'json' => $row['json']
        );
        $memcache->set($key, $product, false, 21600) or die("Erro");
    }
} else {
    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM album WHERE id=$id LIMIT 1"));
}

$json_data = json_decode(file_get_contents($row['json']))->data;
$name = $json_data[$i]->name . ' - ' . $json_data[$i]->artist;
$url = $json_data[$i]->source_base . '/' . $json_data[$i]->source_list[0];

header("Content-Transfer-Encoding: binary");
header("Content-Type: audio/mpeg");
header('Content-Disposition: attachment; filename="' . $name . '.mp3"');
ob_clean();
flush();

readfile($url);
exit();
