<?php
$id = $_POST['id'];
$name = $_POST['name'];
$icon = $_POST['icon'];
$alt_icon = $_POST['alt_icon'];
$social_link = $_POST['social_link'];

include_once '../../inc/connect.php';
$query = mysqli_query($conn, "UPDATE social SET name='" . addslashes($name) . "', icon='" . addslashes($icon) . "', alt_icon='" . addslashes($alt_icon) . "', social_link='" . addslashes($social_link) . "' WHERE id=$id");
header("Location: edit_social.php?id=$id");
?>