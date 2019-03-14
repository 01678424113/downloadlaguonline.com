<?php

$type = $_POST["type"];
if (strpos($type, 'upload_') !== FALSE) {
    if (isset($_POST['ok'])) {
        if ($_FILES['file']['name'] != NULL) {
            if ($_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/png" || $_FILES['file']['type'] == "image/gif" || $_FILES['file']['type'] == "image/ico") {
                if ($_FILES['file']['size'] < 1048576) {
                    $path = "../../images/";
                    $tmp_name = $_FILES['file']['tmp_name'];
                    $name = $_POST["name_img"];
                    $name = str_replace(' ', '-', trim(strtolower($name)));
                    move_uploaded_file($tmp_name, $path . $name);
                    header("Location:../");
                }
            }
        }
    }
} else {
    $title = $_POST["title"];
    $des = $_POST["des"];
    $h1 = $_POST["h1"];
    $content_top = $_POST["top"];
    $content_bot = $_POST["bot"];
    $arr = array(
        'title' => $title,
        'description' => $des,
        'h1' => $h1,
        'content_top' => $content_top,
        'content_bot' => $content_bot
    );
    $text = serialize($arr);
    file_put_contents('../../up/' . $type . '.txt', $text);
}
?>
