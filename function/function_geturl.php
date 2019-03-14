<?php

function getCurrentPageURL() {
    $pageURL = 'http';
    if (!empty($_SERVER['HTTPS'])) {
        if ($_SERVER['HTTPS'] == 'on') {
            $pageURL .= "s";
        }
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function redirect($url, $message = "", $delay = 1) {
    echo "<meta http-equiv='refresh' content='$delay;URL=$url'>";
    if (!empty($message))
        echo "<div style='font-family: Arial, Sans-serif;
	        font-size: 14pt;' align=center>$message</div>";
    exit;
}

?>