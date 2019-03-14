<div class="row">
    <div class="col-md-12">
        <div class="portlet-body">
            <?php
            $type = $_POST['type'];
            if (strpos($type, 'upload_') !== FALSE) {
                ?>
                <div class="edit-list">
                    <form action="check/xuly_list.php" method="POST" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-2 text-center" for="txtAddr">Tên ảnh
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="name_img" value="" id="name_img"
                                               class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-2 text-center" for="txtAddr">Select File
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="file" name="file" size="20" value="" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <input type="hidden" name="type" value="<?php echo $type; ?>">
                            <div class="form-group">
                                <label class="control-label col-md-2 text-center" for="txtAddr">
                                    <span class="required"></span>
                                </label>
                                <div class="col-md-3">
                                    <input type="submit" value="Upload" name="ok" class="btn btn-info update">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
            } else {
                $data = '';
                if (file_exists('../../up/' . $type . '.txt')) {
                    $data = file_get_contents('../../up/' . $type . '.txt');
                }
                $row = unserialize($data);
                $count = 70 - strlen($row["title"]);
                $result1 = '<div class="edit-list">
    <SCRIPT LANGUAGE="JavaScript">
function CountLeft(field, count, max) {
if (field.value.length > max)
field.value = field.value.substring(0, max);
else
count.value = max - field.value.length;
}
</script>
    <form>
    <div class="row">
       <div class="form-group">
           <label class="control-label col-md-2 text-center" for="txtAddr">Select File
               <span class="required"></span>
           </label>
           <div class="col-md-3" edit-input-content>
               <input  name="fname" class="form-control title" type="text" id="title fname" value="' . $row["title"] . '" onKeyDown="CountLeft(this.form.fname, this.form.left,70);" onKeyUp="CountLeft(this.form.fname,this.form.left,70);"><input readonly type="text" name="left" size=3 maxlength=3 value="' . $count . '" disabled="disabled" class="form-control count"/>
           </div>
       </div>
   </div>
   <br>
    </form>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Desception
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <input type="text" value="' . $row["description"] . '" id="description" class="form-control input"/>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Tag H1
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <input type="text" id="tagh1" value="' . $row["h1"] . '" class="form-control input"/>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Content top
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
                <textarea rows="5" cols="20" class="content-top form-control" required="required" placeholder="Top Content" >' . $row["content_top"] . '</textarea>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Content bot
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
              <textarea rows="5" cols="20" class="content-bot form-control" required="required" placeholder="Bot Content" >' . $row["content_bot"] . '</textarea>
        </div>
    </div>
</div>
<br>
<input type="hidden" name="type" id="type"  value="' . $type . '" />
<div class="form-group">
    <label class="control-label col-md-2 text-center" for="txtAddr">
        <span class="required"></span>
    </label>
    <div class="col-md-3">
        <input type="submit" value="Update" class="update btn btn-info">
    </div>
</div>
</div>';
                echo $result1;
            }
            ?>
        </div>
    </div>
</div>