<?php
$db_host = "localhost";  // DB Host
$db_name = "downloadlagu_on";  // DB Name
$db_user = "downloadlagu_on";  // DB User
$db_pass = "downloadlagu@123";  // DB Pass
$conn = mysqli_connect($db_host, $db_user, $db_pass) or die(mysqli_connect_error());
if (!$conn) {
    echo "Không thể kết nối tới CSDL MySQL";
}
$dbs = mysqli_select_db($conn, $db_name) or die(mysqli_error());
mysqli_query($conn, "SET NAMES UTF8");

// Ngắt kết nối
function disconnect_db($conn) {
    if ($conn) {
        mysqli_close($conn);
    }
}
?>