<?php

$type = $_POST['type'];
if(strpos($type, 'web-') !== FALSE){
    $type = str_replace('web-', '', $type);
    $link = "../../css/$type.css";
}elseif(strpos($type, 'admin-') !== FALSE){
    $type = str_replace('admin-', '', $type);
    $link = "../css/$type.css";
}else{
    $type = str_replace('qcads_', '', $type);
    $link = "../../ads/$type.php";
}
$data = '';
if (file_exists($link)) {
    $data = file_get_contents($link);
}

$result = '<div class="edit">
        <div class="form-group">
            <label class="control-label col-md-2 text-center" for="txtAddr">
                <span class="required"></span>
            </label>
            <div class="col-md-3 edit-input-content">
                <textarea name="q" class="form-control" rows="5" cols="20" required="required" placeholder="Nơi nhập đoạn text" >' . $data . '</textarea>
            </div>
        </div>
         <div class="form-group">
            <label class="control-label col-md-2 text-center" for="txtAddr">
                <span class="required"></span>
            </label>
            <div class="col-md-3 edit-input-content">
                  <input type="submit" value="Update" class="update btn btn-info">
            </div>
        </div>
            </div>';
echo $result;
?>