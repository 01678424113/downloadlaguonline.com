<?php

if (empty($_POST['type']) || empty($_POST['value2'])) {
    echo 'ERRO!!!';
    exit();
}
$type = $_POST['type'];
if(strpos($type, 'web-') !== FALSE){
    $type = str_replace('web-', '', $type);
    $link = "../../inc/css/$type.css";
}
if(strpos($type, 'admin-') !== FALSE){
    $type = str_replace('admin-', '', $type);
    $link = "../css/$type.css";
}
$content = $_POST['value2'];

file_put_contents($link, $content);
?>