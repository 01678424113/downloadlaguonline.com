<?php

include_once '../../inc/connect.php';
$id = $_POST["id"];
if ($id > 0) {
    $type = $_POST["table"];
    $title = $_POST["title"];
    $des = $_POST["des"];
    $alt = $_POST["alt"];
    $name = $_POST["name"];

    mysqli_query($conn, "UPDATE `$type` SET `name`='" . mysqli_real_escape_string($conn, $name) . "',`title`='" . mysqli_real_escape_string($conn, $title) . "',`description`='" . mysqli_real_escape_string($conn, $des) . "',`alt_anh`='" . mysqli_real_escape_string($conn, $alt) . "' WHERE id=" . $id);
}
?>