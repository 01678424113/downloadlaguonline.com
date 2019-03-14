<?php

if (empty($_POST['domain']) || empty($_POST['name_domain'])) {
    echo 'ERRO!!!';
    exit();
}
$domain = $_POST['domain'];
$name_domain = $_POST['name_domain'];
$analytics = $_POST['analytics'];
$schema = $_POST['schema'];
$meta_bing = $_POST['meta_bing'];
$adthis = $_POST['adthis'];
$sitename = $_POST['sitename'];
$content_sitename = $_POST['content_sitename'];
$meta_key = $_POST['meta_key'];
$all_cat = $_POST['all_cat'];
$source = $_POST['source'];
$cache = $_POST['cache'];
$memcache = $_POST['memcache'];
$chiacsdl = $_POST['chiacsdl'];

$arr = array(
    'domain' => $domain,
    'name_domain' => $name_domain,
    'analytics' => $analytics,
	'schema' => $schema,
    'meta_bing' => $meta_bing,
    'adthis' => $adthis,
    'sitename' => $sitename,
    'content_sitename' => $content_sitename,
    'meta_key' => $meta_key,
    'all_cat' => $all_cat,
	'source' => $source,
    'cache' => $cache,
    'memcache' => $memcache,
    'chiacsdl' => $chiacsdl,
);
$text = serialize($arr);
file_put_contents('../../up/domain.txt', $text);
?>