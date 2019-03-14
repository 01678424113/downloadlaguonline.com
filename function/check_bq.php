<?php

function check_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ipInfo = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipInfo = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ipInfo = $_SERVER['REMOTE_ADDR'];
    }
    return $ipInfo;
}

function check_country() {
    if (isset($_COOKIE['cook_ct'])) {
        $country = $_COOKIE['cook_ct'];
    } else {
        $ip = check_ip();
        $urlRequest = 'http://ip.mfile.us/byip?ip=' . $ip;
        $country = file_get_contents($urlRequest);
        setcookie("cook_ct", $country, time() + 365 * 86400, "/", "lagump3terbaru.biz");
    }
    return $country;
}

function checkbot() {
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    $useragent = strtolower($useragent);
    if (preg_match('/(googlebot|bot|facebook|coccoc|bing|yahoo|crawler|spider|addthis|appengine|mediapartners|webmasters)/i', $useragent)) {
        $bot = 'bot';
    } else {
        $bot = 'no';
    }
    return $bot;
}

function check_pc() {
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    $useragent = strtolower($useragent);
    if (preg_match('/(windows nt|intel)/i', $useragent) && !preg_match('/(adr|android)/i', $useragent)) {
        $may = 'yes';
    } else {
        $may = 'no';
    }
    return $may;
}

function checkbq() {
    $checkbot = checkbot();
    if ($checkbot != 'bot') {
        $country = check_country();
    }

    if ($country == 'US' && $checkbot != 'bot') {
        $checkbq = 'chan';
    } else {
        $checkbq = 'khongchan';
    }

    return $checkbq;
}

//echo checkbq();
?>