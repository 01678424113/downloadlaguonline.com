<?php

$webname = $_SERVER['SERVER_NAME'];
if (empty($_COOKIE['adswipe']) && empty($_COOKIE['adspop']) && empty($_COOKIE['adsmes'])) {
    $adswipe = 1;
    setcookie('adswipe', 1, time() + 20, '/', $webname);
}
if (empty($_COOKIE['adspop']) && empty($_COOKIE['adspop2'])) {
    $adspop = 1;
    setcookie('adspop', 1, time() + 10 + rand(1, 10), '/', $webname);
}

if (!empty($_COOKIE['adspop']) && empty($_COOKIE['adspop2'])) {
    $adspop2 = 1;
    setcookie('adspop2', 1, time() + 10 + rand(1, 10), '/', $webname);
}

if (empty($_COOKIE['adsfloat'])) {
    $adsfloat = 1;
    setcookie('adsfloat', 1, time() + rand(1, 5), '/', $webname);
}

if (!empty($_COOKIE['adswipe']) && empty($_COOKIE['adsmes'])) {
    $adsmes = 1;
    setcookie('adsmes', 1, time() + 10 + rand(1, 10), '/', $webname);
}

$adsfloat = 1;
$adsdl = 1;
?>