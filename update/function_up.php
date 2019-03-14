<?php

function title($name, $type) {
    $arr = unserialize(file_get_contents("../up/title-$type.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);
    $client = str_replace('%name%', $name, $client);
    $domain = unserialize(file_get_contents("../up/domain.txt"));
    $name_domain = $domain['name_domain'];
    $client = str_replace('%domainname%', $name_domain, $client);
    return $client;
}

function url($name, $type) {
    $title = title($name, $type);
    $url = strtolower(khongdau(xoakt(trim($title))));
    $url = str_replace(' ', '-', $url);
    $url = str_replace('--', '-', $url);
    return $url;
}

function des($name, $type) {
    $arr = unserialize(file_get_contents("../up/description-$type.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);
    $client = str_replace('%name%', $name, $client);
    $domain = unserialize(file_get_contents("../up/domain.txt"));
    $name_domain = $domain['name_domain'];
    $client = str_replace('%domainname%', $name_domain, $client);
    return $client;
}

function tk2($type) {
    $arr = unserialize(file_get_contents("../up/tu-khoa-chen-link-$type.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);

    return ucwords($client);
}

// Tạo Giới thiệu thêm nội dung
function them($name, $duration, $cat, $type) {
    if ($duration == '') {
        $duration = 'medium';
    }
    if ($cat == '') {
        if ($type == 'video') {
            $cat = 'Video Lagu';
        } else {
            $cat = 'Lagu Mp3';
        }
    }
    $domain = unserialize(file_get_contents("../up/domain.txt"));
    $name_domain = $domain['name_domain'];
    $domain = $domain['domain'];
    $tk2 = tk2($type);
    $arr = unserialize(file_get_contents("../up/content-chen-link-$type.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $arr_link = array(
        '<i><a href="%domain%" title="%tk%"><b>%tk%</b></a></i>',
        '<u><a href="%domain%" title="%tk%"><b>%tk%</b></a></u>',
        '<a href="%domain%" title="%tk%"><b>%tk%</b></a>',
    );
    $j = rand(0, 2);
    $client_link = str_replace('%domain%', $domain, $arr_link[$j]);

    $client = trim($arr[$i]);
    $client = str_replace('%name%', $name, $client);
    $client = str_replace('%link%', $client_link, $client);
    $client = str_replace('%domainname%', $name_domain, $client);
    $client = str_replace('%duration%', $duration, $client);
    $client = str_replace('%cat%', $cat, $client);
    $date = rand(2016, date('Y')) . '/' . rand(1, 12) . '/' . rand(1, 28);
    $client = str_replace('%date%', $date, $client);
    $client = str_replace('%tk1%', tk2($type), $client);
    $client = str_replace('%tk2%', tk2($type), $client);
    return $client;
}

function them_top($name, $duration, $cat, $type) {
    if ($duration == '') {
        $duration = 'medium';
    }
    if ($cat == '') {
        if ($type == 'video') {
            $cat = 'Video Lagu';
        } else {
            $cat = 'Lagu Mp3';
        }
    }
    $domain = unserialize(file_get_contents("../up/domain.txt"));
    $name_domain = $domain['name_domain'];
    $domain = $domain['domain'];
    $tk2 = tk2($type);
    $arr = unserialize(file_get_contents("../up/content-top-$type.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);
    $client = str_replace('%name%', $name, $client);
    $client = str_replace('%tk%', $tk2, $client);
    $client = str_replace('%domainname%', $name_domain, $client);
    $client = str_replace('%duration%', $duration, $client);
    $client = str_replace('%cat%', $cat, $client);
    $date = rand(2016, date('Y')) . '/' . rand(1, 12) . '/' . rand(1, 28);
    $client = str_replace('%date%', $date, $client);
    $client = str_replace('%tk1%', tk2($type), $client);
    $client = str_replace('%tk2%', tk2($type), $client);
    return $client;
}

function them_bot($name, $duration, $cat, $type) {
    if ($duration == '') {
        $duration = 'medium';
    }
    if ($cat == '') {
        if ($type == 'video') {
            $cat = 'Video Lagu';
        } else {
            $cat = 'Lagu Mp3';
        }
    }
    $domain = unserialize(file_get_contents("../up/domain.txt"));
    $name_domain = $domain['name_domain'];
    $domain = $domain['domain'];
    $tk2 = tk2($type);
    $arr = unserialize(file_get_contents("../up/content-bot-$type.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);
    $client = str_replace('%name%', $name, $client);
    $client = str_replace('%tk%', $tk2, $client);
    $client = str_replace('%domainname%', $name_domain, $client);
    $client = str_replace('%duration%', $duration, $client);
    $client = str_replace('%cat%', $cat, $client);
    $date = rand(2016, date('Y')) . '/' . rand(1, 12) . '/' . rand(1, 28);
    $client = str_replace('%date%', $date, $client);
    $client = str_replace('%tk1%', tk2($type), $client);
    $client = str_replace('%tk2%', tk2($type), $client);
    return $client;
}

function get_search_yahoo($name, $content, $duration, $cat, $type) {
    $arr_content[0] = $content;
    $arr_content[1] = them($name, $duration, $cat, $type) . "<br>";
    $arr_content[2] = them_bot($name, $duration, $cat, $type);
    $arr_content[3] = them_top($name, $duration, $cat, $type);
    shuffle($arr_content);
    $return_content = implode(' ', $arr_content);
    return $return_content;
}
