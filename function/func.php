<?php

// Func

function mins($milisecond) {
    $second = floor($milisecond / 1000);
//$hour = floor($second / 3600);
    $minute = floor(($second / 60));
    $second = $second % 60;
    $time = $minute . ": " . $second . " min";
    return $time;
}

function sizes($size) {
    $sizes = round($size / (1024 * 1024), 2) . ' Mb';
    return $sizes;
}

function soundcloud($name, $count) {
    $name = str_replace("&", " ", $name);
    $name = xoakt(khongdau(str_replace("-", " ", $name)));
    while (strpos($name, "  ") !== FALSE) {
        $name = str_replace("  ", " ", $name);
    }
    $name = str_replace(" ", "+", $name);

    $client = api_lagu();


    $details = json_decode(file_get_contents('https://api.soundcloud.com/tracks/?q=' . $name . '&limit=' . $count . '&client_id=' . $client));
    $songs = array();
    foreach ($details as $element) {
        $song = array();
        $song["name"] = $element->title;
        $song["icon"] = $element->artwork_url;
        $song["genre"] = $element->genre;
        $song["play"] = $element->playback_count;
        $song["content"] = $element->description;
        $song["id"] = $element->id;
        $song["tag"] = $element->tag_list;
        $song["size"] = sizes($element->original_content_size);
        $song["time"] = mins($element->duration);
        $song["stream"] = $element->stream_url;
        @$song["download"] = $element->download_url;
        $songs[] = $song;
    }
    return $songs;
}

?>