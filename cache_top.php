<?php

$check = file_exists('data_cache');
if ($check != 'TRUE') {
    mkdir('data_cache');
}
$check = file_exists('data_cache/' . $folder1);
if ($check != 'TRUE') {
    mkdir('data_cache/' . $folder1);
}
$check = file_exists('data_cache/' . $folder1 . '/' . $folder2);
if ($check != 'TRUE') {
    mkdir('data_cache/' . $folder1 . '/' . $folder2);
}
$cachefile = 'data_cache/' . $folder1 . '/' . $folder2 . '/' . $file . '.html';

if (file_exists($cachefile)) {
    if (filesize($cachefile) > 1000) {
        if (time() - $cachetime < filemtime($cachefile)) {
            echo "<!-- Cached copy, generated " . date('H:i', filemtime($cachefile)) . " -->\n";
            include($cachefile);
            include('inc/footer.php');
            exit();
        }
    }
}
ob_start(); // Start the output buffer
?>