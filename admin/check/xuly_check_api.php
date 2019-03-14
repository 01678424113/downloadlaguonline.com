<?php

$data = $_POST['data_value'];
$arr = explode(';', $data);
$delete = array();
$success = array();
for ($i = 0; $i < count($arr); $i++) {
    if (trim($arr[$i]) != '') {
        $html = file_get_contents('http://api.soundcloud.com/tracks/205801003?client_id=' . trim($arr[$i]));
        if (strlen($html) < 500) {
            array_push($delete, $arr[$i]);
        } else {
            array_push($success, $arr[$i]);
        }
    }
}

$duoc = '';
for ($i = 0; $i < count($success); $i++) {
    if ($success[$i] != '') {
        $duoc .= $success[$i].'; ';
    }
}

$kh_duoc = '';
for ($i = 0; $i < count($delete); $i++) {
    if ($delete[$i] != '') {
        $kh_duoc .=  $delete[$i].'; ';
    }
}
$check_api = '';
for ($i = 0; $i < count($delete); $i++) {
    if ($delete[$i] != '') {
        $check_api .= '<a href="http://api.soundcloud.com/tracks/205801003?client_id='.$delete[$i].'" >'.$delete[$i].'</a><br>';
    }
}
?>
<div class="up_api">
<h2>API sử dụng được</h2>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">
            <span class="required"></span>
        </label>
        <div class="col-md-3">
            <textarea class="form-control" name="q" rows="5" cols="20" required="required" placeholder="Nơi nhập đoạn text" ><?php echo $duoc; ?></textarea>
        </div>
    </div>
<a style="float: right;position: initial;margin: 0 10px;text-decoration: none; color: #fff;" class="update_api">Update</a>
<script>
        $('.update_api').click(function () {
            var data_api = $('.up_api').find('textarea').keyup().val();
            $.ajax({
                url: "check/xuly.php",
                type: "post",
                data: {
                    type: 'api-soundcloud',
                    value: data_api
                },
                success: function (result1) {
                     alert('Update thành công!');
                },
                error: function () {
                    alert('Error');
                }
            });
        });
    </script>
</div>
<h2>API hết hạn sử dụng</h2>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">
            <span class="required"></span>
        </label>
        <div class="col-md-3">
            <textarea class="form-control" name="q" rows="5" cols="20" required="required" placeholder="Nơi nhập đoạn text" ><?php echo $kh_duoc; ?></textarea>
        </div>
    </div>
<br>
<?php
echo $check_api;
?>