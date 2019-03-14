<?php
$type = $_POST['type'];
$data = '';
if (file_exists('../../up/' . $type . '.txt')) {
    $data = file_get_contents('../../up/' . $type . '.txt');
}

$arr_value = unserialize($data);
$value = '';
for ($i = 0; $i < count($arr_value); $i++) {
    if ($arr_value[$i] != '') {
        $value .= $arr_value[$i] . ';';
    }
}
if ($type == 'api-soundcloud') {
    ?>
    <div class="edit">
        <div class="form-group">
            <label class="control-label col-md-2 text-center" for="">
                <span class="required"></span>
            </label>
            <div class="col-md-3">
                <textarea name="q" rows="5" cols="20" required="required" placeholder="Nơi nhập đoạn text"
                          class="form-control"><?php echo $value; ?></textarea>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="control-label col-md-2 text-center" for="">
                <span class="required"></span>
            </label>
            <div class="col-md-3">
                <input type="submit" value="Update" class="update btn btn-info">
            </div>
        </div>
        <a style="float: right;position: initial;margin: 0 10px;text-decoration: none; color: #fff;" class="check_api">Check</a>
        <div id="result">
        </div>
    </div>
    <script>
        $('.check_api').click(function () {
            var data_api = $('.edit').find('textarea').keyup().val();
            $.ajax({
                url: "check/xuly_check_api.php",
                type: "post",
                data: {
                    data_value: data_api
                },
                success: function (result) {
                    $('#result').html(result);
                },
                error: function () {
                    alert('Error');
                }
            });
        });
    </script>
    <?php
} else if (strpos($type, 'genre-') !== FALSE) {
    include_once '../../inc/connect.php';
    $domain = unserialize(file_get_contents("../../up/domain.txt"));
    $home = $domain['domain'];
    $table = str_replace('genre-', '', $type);
    if ($type == 'genre-tangga' || $type == 'genre-newyear') {
        $te = '';
        $value = unserialize($data);
        for ($i = 0; $i < count($value); $i++) {
            if ($value[$i]['urlgoc'] != '') {
                $te .= $value[$i]['urlgoc'] . ';&#10';
            }
        }
        echo '<div class="edit">
                 <div class="form-group">
                    <label class="control-label col-md-2 text-center" for="">
                        <span class="required"></span>
                    </label>
                    <div class="col-md-3">
                         <textarea name="q" rows="5" cols="20" required="required" class="form-control" placeholder="Nơi nhập đoạn text" >' . $te . '</textarea>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2 text-center" for="">
                        <span class="required"></span>
                    </label>
                    <div class="col-md-3">
                        <input type="submit" value="Update" class="update btn btn-info">
                    </div>
                </div>
            </div>';
    } else {
        if ($type == 'genre-indo') {
            $cat_id_bxh = 1;
        }
        if ($type == 'genre-dangdut') {
            $cat_id_bxh = 2;
        }
        if ($type == 'genre-pop') {
            $cat_id_bxh = 3;
        }
        if ($type == 'genre-rock') {
            $cat_id_bxh = 4;
        }
        if ($type == 'genre-ost') {
            $cat_id_bxh = 5;
        }
        if ($type == 'genre-anak') {
            $cat_id_bxh = 6;
        }
        if ($type == 'genre-kpop') {
            $cat_id_bxh = 7;
        }
        if ($type == 'genre-us') {
            $cat_id_bxh = 8;
        }
        if ($type == 'genre-rap') {
            $cat_id_bxh = 9;
        }
        if ($type == 'genre-dance') {
            $cat_id_bxh = 10;
        }
        $query = mysqli_query($conn, "SELECT * FROM lagu WHERE id_bxh = $cat_id_bxh ORDER BY view DESC");

        $value = '';
        while ($row = mysqli_fetch_array($query)) {
            $value .= $home . '/mp3/' . $row['id'] . '/' . $row['url'] . '.html;&#10';
        }
        disconnect_db($conn);
        ?>
        <div class="edit">
            <div class="form-group">
                <label class="control-label col-md-2 text-center" for="">
                    <span class="required"></span>
                </label>
                <div class="col-md-3">
                    <textarea name="q" rows="5" cols="20" required="required" class="form-control"
                              placeholder="Nơi nhập đoạn text"><?php echo $value; ?></textarea>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-md-2 text-center" for="">
                    <span class="required"></span>
                </label>
                <div class="col-md-3">
                    <input type="submit" value="Update" class="update btn btn-info">
                </div>
            </div>
        </div>
        <?php
    }
} elseif (strpos($type, 'htaccess') !== FALSE || strpos($type, 'file_config') !== FALSE) {
    if (strpos($type, 'file_config') !== FALSE) {
        $filelist = glob("../../*.conf");
        $value = file_get_contents($filelist[0]);
    }
    if (strpos($type, 'htaccess') !== FALSE) {
        $value = file_get_contents('../../.htaccess');
    }

    $result = '<div class="edit">
                 <div class="form-group">
                    <label class="control-label col-md-2 text-center" for="">
                        <span class="required"></span>
                    </label>
                    <div class="col-md-3">
                        <textarea name="q" rows="5" cols="20" required="required" class="form-control" placeholder="Nơi nhập đoạn text" >' . $value . '</textarea>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2 text-center" for="">
                        <span class="required"></span>
                    </label>
                    <div class="col-md-3">
                        <input type="submit" value="Update" class="update btn btn-info">
                    </div>
                </div>
            </div>';
    echo $result;
} elseif (strpos($type, 'robot') !== FALSE || strpos($type, 'connect') !== FALSE) {
    if (strpos($type, 'robot') !== FALSE) {
        $value = file_get_contents('../../robots.txt');
    } else {
        $value = file_get_contents('../../inc/connect.php');
    }
    $result = '<div class="edit">
          <div class="form-group">
                        <label class="control-label col-md-2 text-center" for="">
                            <span class="required"></span>
                        </label>
                        <div class="col-md-3">
                            <textarea name="q" rows="5" cols="20" required="required" class="form-control" placeholder="Nơi nhập đoạn text" >' . $value . '</textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-2 text-center" for="">
                            <span class="required"></span>
                        </label>
                        <div class="col-md-3">
                            <input type="submit" value="Update" class="update btn btn-info">
                        </div>
                    </div>
            </div>';
    echo $result;
} elseif (strpos($type, 'version') !== FALSE) {
    $version_old = json_decode(file_get_contents('../../update/version.txt'));
    $version_new = json_decode(file_get_contents('http://code.webdownloadlagu.com/theme/lagu/' . $version_old->theme . '/update/version.txt'));
    $value = '<b>Phiên bản của bạn:</b> Bản ' . $version_old->version . ' | Theme: ' . $version_old->theme . ' | Loại: Nhạc ' . $version_old->type . '<br>';
    $value = $value . '<b>Phiên bản mới nhất:</b> Bản ' . $version_new->version . ' | Theme: ' . $version_new->theme . ' | Loại: Nhạc ' . $version_new->type . ' | Các cập nhật thay đổi: ' . $version_new->them . '<br>';
    $result = '<div class="row"><div class="col-md-12"><div class="form-group edit text-center">
            <p style="margin-left: 15px" name="q" rows="5" cols="20" required="required" placeholder="Thông tin phiên bản" >' . $value . '</p></div>
            <div class="col-md-12">
                    <a target="_blank" class="delete_content btn btn-info" href="../update/update_version.php">Update</a>
</div>
            </div></div>';
    echo $result;
} elseif (strpos($type, 'theme') !== FALSE) {
    $value = file_get_contents('http://code.webdownloadlagu.com/version/theme.php');
    $result = '<div class="edit">
            ' . $value . '
            </div>';
    echo $result;
} else {
    $result = '<div class="edit">
  <div class="form-group">
                        <label class="control-label col-md-2 text-center" for="">
                            <span class="required"></span>
                        </label>
                        <div class="col-md-3">
                            <textarea name="q" rows="5" cols="20" required="required" class="form-control" placeholder="Nơi nhập đoạn text" >' . $value . '</textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-2 text-center" for="">
                            <span class="required"></span>
                        </label>
                        <div class="col-md-3">
                            <input type="submit" value="Update" class="update btn btn-info">
                        </div>
                    </div>         
            </div>';
    echo $result;
}
?>