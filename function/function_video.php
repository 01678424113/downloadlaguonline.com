<?php

function curl($url) {
    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    $page = curl_exec($ch);
    curl_close($ch);
    return $page;
}

function getVideoYoutube($id) {
    $getlink = "https://www.youtube.com/watch?v=" . $id;
    if ($get = curl($getlink)) {
        $return = array();
        if (preg_match('/;ytplayer\.config\s*=\s*({.*?});/', $get, $data)) {
            $jsonData = json_decode($data[1], true);
            $jsonData = json_encode($jsonData['args']);
            $jsonData = json_decode($jsonData);

            $data = array(
                'time' => $jsonData->length_seconds,
                'views' => $jsonData->view_count,
                'tags' => $jsonData->keywords,
                'author' => $jsonData->author,
                'name' => $jsonData->title,
                'image' => 'https://i.ytimg.com/vi/'.$id.'/hqdefault.jpg',
                'rate' => $jsonData->avg_rating,
            );
            $jsonData = json_encode($data);
        }
        return $jsonData;
    } else {
        return 0;
    }
}

function mins($milisecond) {
    $hour = floor($milisecond / 3600);
    $minute = floor(($milisecond - ($hour * 3600)) / 60);
    $second = $milisecond - ($hour * 3600) - ($minute * 60);
    if($minute < 10){
        $minute = '0'.$minute;
    }
    if($second < 10){
        $second = '0'.$second;
    }
    if ($hour > 0) {
        $time = $hour . ":" . $minute . ":" . $second;
    } else {
        $time = $minute . ":" . $second;
    }
    return $time;
}
