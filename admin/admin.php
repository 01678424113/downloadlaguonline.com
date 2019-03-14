<?php
session_start();
if ($_SESSION['name'] == 'temazmedia') {

    function getCurrentPageURL23() {
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

    $get_admin = getCurrentPageURL23();
    $type = explode('/', $get_admin);
    if ($type[3] == 'mp3' || $type[3] == 'video') {
        $id = $type[4];
        $id = explode('-', $id);
        $id = trim($id[0]);
        if ($type[3] == 'mp3') {
            $type = 'baihat';
        }
        if ($type[3] == 'video') {
            $type = 'video';
        }
        ?>
        <style>
            .edit_admin{
                position: fixed;
                z-index: 9999;
                width: 100%;
                background-color: black;
                padding: 5px;
            }
            .edit_admin a{
                color: #fff;
                padding: 0px 10px;
                font-weight: bold;
            }
            .edit_admin a:hover{
                color: #e47171;
                text-decoration: underline;
            }
            #tabhead a{
                padding-top: 25px;
            }
            .end_cat{
                padding: 47px;
            }
            #tabmenu{
                top: 60px;
            }
        </style>
        <div class="edit_admin">
            <a href="/admin/index.php?type=<?php echo $type; ?>&id=<?php echo $id; ?>&action=edit" >Edit</a>
            <a href="/admin/index.php?type=<?php echo $type; ?>&id=<?php echo $id; ?>&action=delete">Xóa</a>
        </div>
        <?php

    }
}
?>