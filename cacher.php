<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8" />
        <title>Delete Cache</title>
    </head>
    <body>
        <style>
            h1{
                padding: 0;
                margin: 0 0 0 20px;
            }
            a{
                background-color: #f05050;
                border-color: #f05050;
                color: #fff;
                text-decoration: none;
                padding: 15px 20px;
                border-radius: 3px;
                font-size: 20px;
                margin: 20px;
                display: block;
                width: 150px;
                float: left;
            }
            a:hover{
                background-color: #9e3c33;
            }
        </style>
        <h1>Lựa chọn xóa folder cần xóa:</h1>
        <a href="cacher?folder=data_cache" >Xóa cache</a>
        <!--<a href="cacher.php?folder=icon" >Xóa folder ảnh</a>-->
    </body>
</html>
<?php
if (!empty($_GET['folder'])) {

    function delete_files($target) {
        if (is_dir($target)) {
            $files = glob($target . '*', GLOB_MARK);

            foreach ($files as $file) {
                delete_files($file);
            }

            @rmdir($target);
        } elseif (is_file($target)) {
            @unlink($target);
            @rmdir($target);
        }
    }

    delete_files($_GET['folder']);
}