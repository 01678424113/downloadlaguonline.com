<?php
include_once '../../inc/connect.php';
$name = $_POST["name"];
$alt_icon = $_POST["name"];
$social_link = $_POST["social_link"];

$row = mysqli_fetch_array(mysqli_query($conn, "SELECT name FROM `social` WHERE name='$name'"));
if (isset($_POST['add'])) {
	if ($row['name'] != ucwords($name)) {
		if ($_FILES['file']['name'] != NULL) {
            if ($_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/png" || $_FILES['file']['type'] == "image/gif" || $_FILES['file']['type'] == "image/ico") {
				$path = "../../images/social/";
				$icon_name = $_FILES['file']['name'];
				$icon_name = strtolower($icon_name);
				$tmp_name = $_FILES['file']['tmp_name'];
				move_uploaded_file($tmp_name, $path . $icon_name);
			}
		}
		$sql = mysqli_query($conn, "INSERT INTO `social`(`name`, `icon`, `alt_icon`, `social_link`) VALUES ('" . addslashes(ucwords($name)) . "', '" . addslashes('images/social/' . $icon_name) . "', '" . addslashes(ucwords($alt_icon)) . "', '" . addslashes($social_link) . "')");
		echo 'Thêm ' . ucwords($name) . ' thành công!!!';
	} else {
		echo 'ERROR!<br>Social Network(' . ucwords($name) . ') đã tồn tại...';
	}
}
?>
<script>
	setTimeout(function() {
		window.close();
	}, 3000);
</script>