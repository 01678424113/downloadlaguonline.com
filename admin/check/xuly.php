<?php

if (empty($_POST['type'])) {
    echo 'ERRO!!!';
    exit();
} else {
    $type = $_POST['type'];
}

if (!empty($_POST['value'])) {
    if (strpos($type, 'web-') !== FALSE || strpos($type, 'admin-') !== FALSE || strpos($type, 'qcads_') !== FALSE) {
        if (strpos($type, 'web-') !== FALSE) {
            $type = str_replace('web-', '', $type);
            $link = "../../css/$type.css";
        } elseif (strpos($type, 'admin-') !== FALSE) {
            $type = str_replace('admin-', '', $type);
            $link = "../css/$type.css";
        } else {
            $type = str_replace('qcads_', '', $type);
            $link = "../../ads/$type.php";
        }
        $content = $_POST['value'];
        file_put_contents($link, $content);
    } elseif (strpos($type, 'htaccess') !== FALSE) {
        $text = $_POST['value'];
        file_put_contents('../../.htaccess', $text);
    } elseif (strpos($type, 'robot') !== FALSE) {
        $text = $_POST['value'];
        file_put_contents('../../robots.txt', $text);
    } elseif (strpos($type, 'connect') !== FALSE) {
        $text = $_POST['value'];
        file_put_contents('../../inc/connect.php', $text);
    } else if (strpos($type, 'genre-') !== FALSE) {
        
    } elseif (strpos($type, 'file_config') !== FALSE) {
        $filelist = glob("../../*.conf");
        $text = $_POST['value'];
        file_put_contents($filelist[0], $text);
    } else {
        $content = $_POST['value'];
        $arr = explode(';', $content);

        $text = serialize($arr);
        file_put_contents('../../up/' . $type . '.txt', $text);
    }
}
?>