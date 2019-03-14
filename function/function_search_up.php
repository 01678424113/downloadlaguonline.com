<?php

function savelagu($name) {
    $domain = unserialize(file_get_contents("up/domain.txt"));
    $home = $domain['domain'];
    $name = str_replace("&", " ", $name);
    $name = xoakt(khongdau(str_replace("-", " ", $name)));
    while (strpos($name, "  ") !== FALSE) {
        $name = str_replace("  ", " ", $name);
    }
    $details = file_get_contents('http://www.savelagu.eu/search/' . $name . '.html');
    $list = explode('<div class="bagian1">', $details);
    $songs = array();
    for ($i = 0; $i < count($list) - 1; $i++) {
        $api = explode('<a href="', $list[$i + 1]);
        $api = explode('"', $api[1]);
        $api = explode('/', $api[0]);
        $api = $api[4];

        $size = explode('<i class="fa fa-clipboard">', $list[$i + 1]);
        $size = explode('<i class="fa fa-power-off">', $size[1]);
        $size = strip_tags($size[0]);
        $size = str_replace('Size :', '', $size);
        $size = trim($size);

        $duration = explode('<i class="fa fa-power-off">', $list[$i + 1]);
        $duration = explode('<i class="fa fa-headphones">', $duration[1]);
        $duration = strip_tags($duration[0]);
        $duration = str_replace('Duration :', '', $duration);
        $duration = trim($duration);

        $views = explode('<i class="fa fa-headphones">', $list[$i + 1]);
        $views = explode('<i class="fa fa-link">', $views[1]);
        $views = strip_tags($views[0]);
        $views = str_replace('Play :', '', $views);
        $views = trim($views);

        $image = explode('src="', $list[$i + 1]);
        $image = explode('"', $image[1]);
        $image = trim($image[0]);
        $image = str_replace('t500x500', 't60x60', $image);
        if (strpos($image, 'no_thumb') !== false) {
            $image = $home . "/images/download_lagu_mp3_terbaru_gratis.png";
        }
        $name = explode('<small>', $list[$i + 1]);
        $name = explode('</small>', $name[1]);
        $name = trim(str_replace('.mp3', '', $name[0]));

        $song = array(
            'id' => $api,
            'name' => $name,
            'icon' => $image,
            'play' => $views,
            'time' => $duration,
            'size' => $size
        );

        $songs[] = $song;
    }
    return $songs;
}

function up_savelagu($id) {
    $domain = unserialize(file_get_contents("up/domain.txt"));
    $home = $domain['domain'];
    $details = file_get_contents('http://www.savelagu.eu/download/' . $id . '/download-lagu-gratis.html');

    $size = explode('<td><strong>Size</strong></td><td>', $details);
    $size = explode('</td>', $size[1]);
    $size = trim($size[0]);

    $duration = explode('<td><strong>Duration</strong></td><td>', $details);
    $duration = explode('</td>', $duration[1]);
    $duration = trim($duration[0]);

    $views = explode('<td><strong>Total Play</strong></td><td>', $details);
    $views = explode('</td>', $views[1]);
    $views = trim($views[0]);

    $image = explode('<div class="entry-img-thumb">', $details);
    $image = explode('src="', $image[1]);
    $image = explode('"', $image[1]);
    $image = trim($image[0]);
    $image = str_replace('t500x500', 't300x300', $image);
    if (strpos($image, 'no_thumb') !== false) {
        $image = $home . "/images/download_lagu_mp3_terbaru_gratis.png";
    }

    $name = explode('<strong>Name</strong></td><td>', $details);
    $name = explode('</td>', $name[1]);
    $name = trim(str_replace('.mp3', '', $name[0]));

    $singer = explode('<td><strong>Uploader</strong></td><td>', $details);
    $singer = explode('</td>', $singer[1]);
    $singer = trim($singer[0]);

    $genre = explode('<td><strong>Genre</strong></td><td>', $details);
    $genre = explode('</td>', $genre[1]);
    $genre = trim(strip_tags($genre[0]));
    if ($genre == 'Unknown') {
        $genre = '';
    }

    $song = array(
        'id' => $id,
        'name' => $name,
        'icon' => $image,
        'play' => $views,
        'time' => $duration,
        'size' => $size,
        'genre' => $genre,
        'singer' => $singer
    );
    return $song;
}
