<?php
function luuanh($image, $name, $casi, $type, $width, $height) {
    $image = trim($image);
    if ($type == 'baihat') {
        $anh_thumb = 'images/download-lagu-mp3-terbaru-gratis.png';
    }
    if ($type == 'album') {
        $anh_thumb = 'images/download-album-lagu-mp3-terbaru-gratis.png';
    }
    if ($type == 'video') {
        $anh_thumb = 'images/download-video-lagu-terbaru-gratis.png';
    }
    if ($type == 'nghesi') {
        $anh_thumb = 'images/artis-lagu.png';
    }
    if ($image != '') {
        $data3 = get_headers($image);
        $data3 = implode(' ', $data3);

        if (preg_match('|image|', $data3)) {
            $nam = date('Y', time());
            $thang = date('m', time());
            $ngay = date('d', time());
            $gio = date('H', time());
            $phut = date('i', time());

            if (!file_exists("icon")) {
                mkdir("icon");
            }
            if (!file_exists("icon/$nam")) {
                mkdir("icon/$nam");
            }
            if (!file_exists("icon/$nam/$thang")) {
                mkdir("icon/$nam/$thang");
            }
            if (!file_exists("icon/$nam/$thang/$ngay")) {
                mkdir("icon/$nam/$thang/$ngay");
            }

            $name = url($name, $casi, $type);
            if (strlen($name) > 150) {
                $name = substr($name, 0, 150);
            }
            $filename = "icon/$nam/$thang/$ngay/$name.png";
            $content = file_get_contents($image);
            $savefile = fopen($filename, 'w');
            $chuan = fwrite($savefile, $content);
            fclose($savefile);

            if (file_exists($filename)) {
                if (filesize($filename) > 10) {
                    include_once 'function/image.php';
                    $image_song = new SimpleImage();
                    $image_song->load($filename);
                    $image_song->resize($width, $height);
                    $image_song->save($filename);
                    return $filename;
                }
            }
            return $anh_thumb;
        } else {
            return $anh_thumb;
        }
    } else {
        return $anh_thumb;
    }
}

function luuanh_content($image, $name, $type) {
    if ($type == 'baihat') {
        $anh_thumb = 'images/download-lagu-mp3-terbaru-gratis.png';
    }
    if ($type == 'album') {
        $anh_thumb = 'images/download-album-lagu-mp3-terbaru-gratis.png';
    }
    if ($type == 'video') {
        $anh_thumb = 'images/download-video-lagu-terbaru-gratis.png';
    }
    if ($type == 'nghesi') {
        $anh_thumb = 'images/artis-lagu.png';
    }
    $domain = unserialize(file_get_contents("up/domain.txt"));
    if ($image != '') {
        $data3 = get_headers($image);
        $data3 = implode(' ', $data3);

        if (preg_match('|image|', $data3)) {
            $nam = date('Y', time());
            $thang = date('m', time());
            $ngay = date('d', time());
            $gio = date('H', time());
            $phut = date('i', time());

            if (!file_exists("icon_content")) {
                mkdir("icon_content");
            }
            if (!file_exists("icon_content/$nam")) {
                mkdir("icon_content/$nam");
            }
            if (!file_exists("icon_content/$nam/$thang")) {
                mkdir("icon_content/$nam/$thang");
            }
            if (!file_exists("icon_content/$nam/$thang/$ngay")) {
                mkdir("icon_content/$nam/$thang/$ngay");
            }

            $name = url($name, $casi, $type);
            if (strlen($name) > 150) {
                $name = substr($name, 0, 150);
            }
            $filename = "icon_content/$nam/$thang/$ngay/$name.png";
            $content = file_get_contents($image);
            $savefile = fopen($filename, 'w');
            $chuan = fwrite($savefile, $content);
            fclose($savefile);

            if (file_exists($filename)) {
                if (filesize($filename) > 10) {
                    include_once 'function/image.php';
                    $image_song = new SimpleImage();
                    $image_song->load($filename);
                    $image_song->resizeToWidth(300);
                    $image_song->save($filename);

                    $im = ImageCreateFromJpeg($filename);
                    $string = $domain['name_domain'];
                    $fontsize = "20";
                    $pxX = 5;
                    $pxY = Imagesy($im) - 5;
                    $color = ImageColorAllocate($im, 255, 255, 255);
                    $font = "css/font.ttf";
                    ImagettfText($im, $fontsize, 0, $pxX, $pxY, $color, $font, $string);
                    imagePng($im, $filename);
                    ImageDestroy($im);
                    return $filename;
                }
            }
            return $anh_thumb;
        } else {
            return $anh_thumb;
        }
    } else {
        return $anh_thumb;
    }
}

function title($name, $casi, $type) {
    if (!file_exists("up/title-$type.txt")) {
        return '';
    }
    $arr = unserialize(file_get_contents("up/title-$type.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);
    $client = str_replace('%name%', $name, $client);
    $domain = unserialize(file_get_contents("up/domain.txt"));
    $name_domain = $domain['name_domain'];
    $client = str_replace('%casi%', $casi, $client);
    $client = str_replace('%domainname%', $name_domain, $client);
    return $client;
}

function url($name, $casi, $type) {
    $title = title($name, $casi, $type);
    $url = explode(' | ', $title);
    $url = $url[0];
    $url = strtolower(khongdau(xoakt(trim($url))));
    $url = str_replace(' ', '-', $url);
    $url = str_replace('--', '-', $url);
    return $url;
}

function des($name, $casi, $type) {
    if (!file_exists("up/description-$type.txt")) {
        return '';
    }
    $arr = unserialize(file_get_contents("up/description-$type.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);
    $client = str_replace('%name%', $name, $client);
    $domain = unserialize(file_get_contents("up/domain.txt"));
    $name_domain = $domain['name_domain'];
    if (!empty($casi)) {
        $client = str_replace('%casi%', $casi, $client);
    } else {
        $client = str_replace('%casi%', $name_domain, $client);
    }
    $client = str_replace('%domainname%', $name_domain, $client);
    return $client;
}

function tk2($type) {
    if (!file_exists("up/tu-khoa-chen-link-$type.txt")) {
        return '';
    }
    $arr = unserialize(file_get_contents("up/tu-khoa-chen-link-$type.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);

    return ucwords($client);
}

function tk2_link_content($name) {
    if (!file_exists("up/tu-khoa-link-bai-khac.txt")) {
        return '';
    }
    $arr = unserialize(file_get_contents("up/tu-khoa-link-bai-khac.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);
    $client = str_replace('%name%', $name, $client);

    return $client;
}

function tk2_lienquan($type) {
    if (!file_exists("up/tu-khoa-lien-quan-$type.txt")) {
        return '';
    }
    $arr = unserialize(file_get_contents("up/tu-khoa-lien-quan-$type.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);

    return ucwords($client);
}

function tk2_search() {
    if (!file_exists("up/tu-khoa-search.txt")) {
        return '';
    }
    $arr = unserialize(file_get_contents("up/tu-khoa-search.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);

    return $client;
}

// Tạo Giới thiệu thêm nội dung
function them($name, $casi, $duration, $cat, $type, $domain, $name_domain) {
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
    if (!file_exists("up/content-chen-link-$type.txt")) {
        return '';
    }
    $tk2 = tk2($type);
    $arr = unserialize(file_get_contents("up/content-chen-link-$type.txt"));
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
    if (!empty($casi)) {
        $client = str_replace('%casi%', $casi, $client);
    } else {
        $client = str_replace('%casi%', $name_domain, $client);
    }
    $client = str_replace('%link%', $client_link, $client);
	$client = str_replace('%tk%', $tk2, $client);
    $client = str_replace('%domainname%', $name_domain, $client);
    $client = str_replace('%duration%', $duration, $client);
    $client = str_replace('%cat%', $cat, $client);
    $date = rand(2016, date('Y')) . '/' . rand(1, 12) . '/' . rand(1, 28);
    $client = str_replace('%date%', $date, $client);
    $client = str_replace('%tk1%', tk2_lienquan($type), $client);
    $client = str_replace('%tk2%', tk2_lienquan($type), $client);
    return $client;
}

function them_top($name, $casi, $duration, $cat, $type, $name_domain) {
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
    if (!file_exists("up/content-top-$type.txt")) {
        return '';
    }
    $tk2 = tk2($type);
    $arr = unserialize(file_get_contents("up/content-top-$type.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);
    $client = str_replace('%name%', $name, $client);
    if (!empty($casi)) {
        $client = str_replace('%casi%', $casi, $client);
    } else {
        $client = str_replace('%casi%', $name_domain, $client);
    }
    $client = str_replace('%tk%', $tk2, $client);
    $client = str_replace('%domainname%', $name_domain, $client);
    $client = str_replace('%duration%', $duration, $client);
    $client = str_replace('%cat%', $cat, $client);
    $date = rand(2016, date('Y')) . '/' . rand(1, 12) . '/' . rand(1, 28);
    $client = str_replace('%date%', $date, $client);
    $client = str_replace('%tk1%', tk2_lienquan($type), $client);
    $client = str_replace('%tk2%', tk2_lienquan($type), $client);
    return $client;
}

function them_bot($name, $casi, $duration, $cat, $type, $name_domain) {
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
    if (!file_exists("up/content-bot-$type.txt")) {
        return '';
    }
    $tk2 = tk2($type);
    $arr = unserialize(file_get_contents("up/content-bot-$type.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);
    $client = str_replace('%name%', $name, $client);
    if (!empty($casi)) {
        $client = str_replace('%casi%', $casi, $client);
    } else {
        $client = str_replace('%casi%', $name_domain, $client);
    }
    $client = str_replace('%tk%', $tk2, $client);
    $client = str_replace('%domainname%', $name_domain, $client);
    $client = str_replace('%duration%', $duration, $client);
    $client = str_replace('%cat%', $cat, $client);
    $date = rand(2016, date('Y')) . '/' . rand(1, 12) . '/' . rand(1, 28);
    $client = str_replace('%date%', $date, $client);
    $client = str_replace('%tk1%', tk2_lienquan($type), $client);
    $client = str_replace('%tk2%', tk2_lienquan($type), $client);
    return $client;
}

function them_link_content($name, $casi, $duration, $cat, $type, $conn, $domain, $name_domain) {
    if ($duration == '') {
        $duration = 'medium';
    }
    if ($cat == '') {
        $cat = 'Lagu Mp3';
    }
    if ($type == 'nghesi') {
        return '';
    }
    if (!file_exists("up/content-link-bai-khac.txt")) {
        return '';
    }
    $offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `baihat`");
    $offset_row = mysqli_fetch_object($offset_result);
    $offset = $offset_row->offset;
    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT id,url,title,name FROM `baihat` LIMIT $offset,1"));
    if ($row['name'] == $name) {
        return '';
    }
    if (empty($row)) {
        return '';
    }

    $tk2 = tk2_link_content($row['name']);
    $arr = unserialize(file_get_contents("up/content-link-bai-khac.txt"));
    $i = rand(0, count($arr) - 1);
    while ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $arr_link = array(
        '<i><a href="%linkcontent%" title="%titlecontent%"><b>%tk%</b></a></i>',
        '<u><a href="%linkcontent%" title="%titlecontent%"><b>%tk%</b></a></u>',
        '<a href="%linkcontent%" title="%titlecontent%"><b>%tk%</b></a>',
    );
    $j = rand(0, 2);
    $client_link = str_replace('%linkcontent%', "$domain/lagu/" . $row['id'] . '/' . $row['url'] . '.html', $arr_link[$j]);

    $client = trim($arr[$i]);
    $client = str_replace('%link%', $client_link, $client);
    $client = str_replace('%name%', $row['name'], $client);
    if (!empty($casi)) {
        $client = str_replace('%casi%', $casi, $client);
    } else {
        $client = str_replace('%casi%', $name_domain, $client);
    }
    $client = str_replace('%titlecontent%', $row['title'], $client);
    $client = str_replace('%tk%', $tk2, $client);
    $client = str_replace('%domainname%', $name_domain, $client);
    $client = str_replace('%duration%', $duration, $client);
    $client = str_replace('%cat%', $cat, $client);
    $date = rand(2016, date('Y')) . '/' . rand(1, 12) . '/' . rand(1, 28);
    $client = str_replace('%date%', $date, $client);
    $client = str_replace('%tk1%', tk2_lienquan($type), $client);
    $client = str_replace('%tk2%', tk2_lienquan($type), $client);
    return $client;
}

function get_search_yahoo($name, $casi, $content, $duration, $cat, $type, $image_content, $conn) {
    $domain = unserialize(file_get_contents("up/domain.txt"));
    $name_domain = $domain['name_domain'];
    $img_check = $domain['image_content'];
    $link_check = $domain['link_content'];
    if (trim($img_check) == '') {
        $img_check = 1;
    }
    if (trim($link_check) == '') {
        $link_check = 1;
    }
    $domain = $domain['domain'];

    $arr_content[0] = $content;
    $arr_content[1] = them($name, $casi, $duration, $cat, $type, $domain, $name_domain) . "<br>";
    $arr_content[2] = them_top($name, $casi, $duration, $cat, $type, $name_domain) . '. ';
    $arr_content[3] = them_bot($name, $casi, $duration, $cat, $type, $name_domain) . '. ';

    if ($img_check == 0 && $image_content != '') {
        $alt = title($name, $casi, $type);
        if (strpos($image_content, $domain) !== FALSE) {
            $arr_content[4] = '<div class="img_content_view" style="text-align: center;padding: 10px 0px;"><img src="' . $image_content . '" alt="' . $alt . '"><span style="display: block;padding-top: 5px;"><i>' . title($name, $casi, $type) . '</i></span></div>';
        } else {
            $arr_content[4] = '<div class="img_content_view" style="text-align: center;padding: 10px 0px;"><img src="' . $domain . '/' . $image_content . '" alt="' . $alt . '"><span style="display: block;padding-top: 5px;"><i>' . title($name, $casi, $type) . '</i></span></div>';
        }
    } else {
        $arr_content[4] = '';
    }
    if ($link_check == 0) {
        $arr_content[5] = them_link_content($name, $casi, $duration, $cat, $type, $conn, $domain, $name_domain);
    } else {
        $arr_content[5] = '';
    }

    shuffle($arr_content);
    $return_content = implode(' ', $arr_content);
    return $return_content;
}

function api_lagu() {
    if (!file_exists("up/api-soundcloud.txt")) {
        return '';
    }
    $arr = unserialize(file_get_contents("up/api-soundcloud.txt"));
    $i = rand(0, count($arr) - 1);
    if ($arr[$i] == '') {
        $i = rand(0, count($arr) - 2);
    }
    $client = trim($arr[$i]);

    return $client;
}

function httpGet($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (MSIE 9.0; Windows NT 6.1; Trident/5.0)");

    curl_setopt($ch, CURLOPT_TIMEOUT, 10000);
    $output = curl_exec($ch);

    curl_close($ch);
    return $output;
}

function get_content_google($key) {
    $html = httpGet('https://www.google.co.id/search?hl=id&source=hp&ei=IkKdWujVLIKR8wWvkIDYBg&oq=' . rand(1, 100000) . '&q=' . urlencode($key) . '&start=' . rand(0, 5) * 10 . '&gs_l=psy-ab.3...3743.4886.0.5149.7.7.0.0.0.0.75.487.7.7.0....0...1c.1.64.psy-ab..0.5.359...0j46j0i131k1j0i3k1j0i46k1j0i10k1.0.P_i8GAMRQ8I');

    if (!strpos($html, '<TITLE>302 Moved</TITLE>') === FALSE) {
        return '';
    }
    $arr = array();

    $content = explode('<div id="topstuff"></div>', $html);
    $content = explode('<div style="clear:both;margin-bottom:17px;overflow:hidden">', $content[1]);
    $content = explode('<span class="st">', $content[0]);
    shuffle($content);

    $data = '';
    $k = 0;
    for ($i = 0; $i < count($content) - 2; $i++) {
        $content2 = explode('</span>', $content[$i + 1]);
        if (strpos($content2[0], 'http') === FALSE && strpos($content2[0], 'youtube.com') === FALSE && $k < 3 && $content2[0] != '') {
            $data = $data . $content2[0] . '. ';
            $k++;
        }
    }
    $data = preg_replace('/<a(.*?)>/', '', $data);
    $data = preg_replace('/<\/a>/', '', $data);
    $data = preg_replace('/<div(.*?)>/', '', $data);
    $data = preg_replace('/<\/div>/', '', $data);
    $data = preg_replace('/<span(.*?)>/', '', $data);
    $data = preg_replace('/<\/span>/', '', $data);
    $data = preg_replace('/<h3(.*?)>/', '', $data);
    $data = preg_replace('/<\/h3>/', '', $data);
    $data = preg_replace('/<ol(.*?)>/', '', $data);
    $data = preg_replace('/<\/ol>/', '', $data);
    $data = preg_replace('/<cite(.*?)>/', '', $data);
    $data = preg_replace('/<\/cite>/', '', $data);
    $data = preg_replace('/<br>/', '. ', $data);

    $arr['content'] = $data;
    $content = explode('<table border="0" cellpadding="0" cellspacing="0">', $html);
    $content = explode('</table>', $content[1]);
    $content = explode('<p class="_Bmc" style="margin:3px 8px">', $content[0]);
    shuffle($content);

    $data = '';
    for ($i = 0; $i < count($content) - 2; $i++) {
        $content2 = explode('</span>', $content[$i + 1]);
        if (strpos($content2[0], 'http') === FALSE && strpos($content2[0], 'youtube.com') === FALSE && $content2[0] != '') {
            $data = $data . $content2[0] . '. ';
            $k++;
        }
    }
    $data = preg_replace('/<tr(.*?)>/', '', $data);
    $data = preg_replace('/<\/tr>/', '', $data);
    $data = preg_replace('/<td(.*?)>/', '', $data);
    $data = preg_replace('/<\/td>/', '', $data);
    $data = preg_replace('/<p(.*?)>/', '', $data);
    $data = preg_replace('/<\/p>/', '', $data);
    $data = preg_replace('/<a(.*?)>/', '', $data);
    $data = preg_replace('/<\/a>/', '', $data);
    $data = preg_replace('/<div(.*?)>/', '', $data);
    $data = preg_replace('/<\/div>/', '', $data);
    $data = preg_replace('/<span(.*?)>/', '', $data);
    $data = preg_replace('/<\/span>/', '', $data);
    $data = preg_replace('/<h3(.*?)>/', '', $data);
    $data = preg_replace('/<\/h3>/', '', $data);
    $data = preg_replace('/<ol(.*?)>/', '', $data);
    $data = preg_replace('/<\/ol>/', '', $data);
    $data = preg_replace('/<cite(.*?)>/', '', $data);
    $data = preg_replace('/<\/cite>/', '', $data);
    $data = preg_replace('/<br>/', '. ', $data);
    $data = preg_replace('/<b>/', '', $data);
    $data = preg_replace('/<\/b>/', '', $data);
    $data = str_replace('\n', '', $data);
    $data = str_replace('<b>', '', $data);
    $data = str_replace('</b>', '', $data);

    $arr['key'] = $data;
    return $arr;
}
