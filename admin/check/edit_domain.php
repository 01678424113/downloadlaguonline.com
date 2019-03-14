<?php
$data = '';
if (file_exists('../../up/domain.txt')) {
    $data = file_get_contents('../../up/domain.txt');
}

$arr_value = unserialize($data);
?>
<div class="edit-list">
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Domain
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <input class="input form-control" type="text" id="domain" value="<?php echo $arr_value['domain']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Domain Name
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <input class="input form-control" type="text" id="name_domain" value="<?php echo $arr_value['name_domain']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Site Name
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <input class="input form-control" type="text" id="sitename" value="<?php echo $arr_value['sitename']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Content Site Name
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <input class="input form-control" type="text" id="content_sitename" value="<?php echo $arr_value['content_sitename']; ?>" />
        </div>
    </div>
    <div class="type_web">
        <div class="form-group">
            <label class="control-label col-md-2 text-center" for="txtAddr">Select The Category
                <span class="required"></span>
            </label>
            <div class="col-md-3 edit-input-content">
                <label class="mt-checkbox">
                    <input class="input" type="checkbox" <?php if(strpos($arr_value['all_cat'], '0') !== FALSE){ echo 'checked'; } ?> id="all_cat0" value="0"> Bài hát
                    <span></span>
                </label>
                <label class="mt-checkbox">
                    <input class="input" type="checkbox" <?php if(strpos($arr_value['all_cat'], '1') !== FALSE){ echo 'checked'; } ?> id="all_cat1" value="1"> Video
                    <span></span>
                </label>
                <label class="mt-checkbox">
                    <input class="input" type="checkbox" <?php if(strpos($arr_value['all_cat'], '2') !== FALSE){ echo 'checked'; } ?> id="all_cat2" value="2"> Album
                    <span></span>
                </label>
                <label class="mt-checkbox">
                    <input class="input" type="checkbox" <?php if(strpos($arr_value['all_cat'], '3') !== FALSE){ echo 'checked'; } ?> id="all_cat3" value="3"> Nghệ sĩ
                    <span></span>
                </label>
                <label class="mt-checkbox">
                    <input class="input" type="checkbox" <?php if(strpos($arr_value['all_cat'], '4') !== FALSE){ echo 'checked'; } ?> id="all_cat4" value="4"> Bảng xếp hạng
                    <span></span>
                </label>
            </div>
        </div>
    </div>
    <div class="form-group source">
        <label class="control-label col-md-2 text-center" for="txtAddr">Player Source
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <label class="mt-radio">
                <input type="radio" class="input" <?php if(strpos($arr_value['source'], '0') !== FALSE){ echo 'checked'; } ?> id="source" value="0" name="source" > Lagu123
                <span></span>
            </label>
            <label class="mt-radio">
                <input type="radio" class="input" <?php if(strpos($arr_value['source'], '1') !== FALSE){ echo 'checked'; } ?> id="source" value="1" name="source" > Youtube
                <span></span>
            </label>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Meta Keyword
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <input class="input form-control" type="text" id="meta_key" value="<?php echo $arr_value['meta_key']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Analytics
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <textarea class="input form-control" id="analytics" placeholder="Nơi nhập đoạn code analytics" rows="5" cols="20" required="required" ><?php echo $arr_value['analytics']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Schema
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <textarea class="input form-control" id="schema" placeholder="Nơi nhập code Schema" rows="5" cols="20" required="required" ><?php echo $arr_value['schema']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Bing/Yahoo
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <textarea class="input form-control" id="meta_bing" placeholder="Nơi nhập thẻ meta của Bing/Yahoo" rows="5" cols="20" required="required" ><?php echo $arr_value['meta_bing']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Adthis
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <textarea class="input form-control" id="adthis" placeholder="Nơi nhập thẻ code adthis" rows="5" cols="20" required="required" ><?php echo $arr_value['adthis']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Cache
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <label class="mt-radio">
                <input type="radio" class="input" <?php if(strpos($arr_value['cache'], '0') !== FALSE){ echo 'checked'; } ?> id="cache" value="0" name="cache" /> Bật
                <span></span>
            </label>
            <label class="mt-radio">
                <input type="radio" class="input" <?php if(strpos($arr_value['cache'], '1') !== FALSE){ echo 'checked'; } ?> id="cache" value="1" name="cache" /> Tắt
                <span></span>
            </label>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Memcache
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <label class="mt-radio">
                <input type="radio" class="input" <?php if(strpos($arr_value['memcache'], '0') !== FALSE){ echo 'checked'; } ?> id="memcache" value="0" name="memcache" /> Bật
                <span></span>
            </label>
            <label class="mt-radio">
                <input type="radio" class="input" <?php if(strpos($arr_value['memcache'], '1') !== FALSE){ echo 'checked'; } ?> id="memcache" value="1" name="memcache" /> Tắt
                <span></span>
            </label>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">Chia CSDL
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <label class="mt-radio">
                <input type="radio" class="input" checked id="chiacsdl" value="0" name="chiacsdl" /> Bật
                <span></span>
            </label>
            <label class="mt-radio">
                <input type="radio" class="input" checked id="chiacsdl" value="1" name="chiacsdl" /> Tắt
                <span></span>
            </label>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 text-center" for="txtAddr">
            <span class="required"></span>
        </label>
        <div class="col-md-3 edit-input-content">
            <input type="submit" value="Update" class="update_domain btn btn-info" />
        </div>
    </div>
</div>
<script>
     $('.web_soundcloud').click(function () {
         $('.type_web').html('<div class="input-group" style="width: 100%;"> <label class="label" for="txtAddr">Chọn thể loại hiển thị<\/label> <div class="edit-input-content"> <input class="input" type="checkbox" <?php if(strpos($arr_value['all_cat'], '0') !== FALSE){ echo 'checked'; } ?> id="all_cat0" value="0" \/>Bài hát<br> <input class="input" type="checkbox" <?php if(strpos($arr_value['all_cat'], '1') !== FALSE){ echo 'checked'; } ?> id="all_cat1" value="1" \/>Video<br> <input class="input" type="checkbox" <?php if(strpos($arr_value['all_cat'], '2') !== FALSE){ echo 'checked'; } ?> id="all_cat2" value="2" \/>Tanga Lagu <\/div><\/div><div class="input-group search" style="width: 100%;"> <label class="label" for="txtAddr">Chọn kiểu search<\/label> <div class="edit-input-content"> <input class="input" type="radio" <?php if(strpos($arr_value['search'], '0') !== FALSE){ echo 'checked'; } ?> id="search" value="0" name="search" \/>Random<br> <input class="input" type="radio" <?php if(strpos($arr_value['search'], '1') !== FALSE){ echo 'checked'; } ?> id="search" value="1" name="search" \/>Api<br> <input class="input" type="radio" <?php if(strpos($arr_value['search'], '2') !== FALSE){ echo 'checked'; } ?> id="search" value="2" name="search" \/>Save Lagu<br> <input class="input" type="radio" <?php if(strpos($arr_value['search'], '3') !== FALSE){ echo 'checked'; } ?> id="search" value="3" name="search" \/>Lagu Pro <\/div><\/div><div class="input-group up" style="width: 100%;"> <label class="label" for="txtAddr">Chọn kiểu up<\/label> <div class="edit-input-content"> <input class="input" type="radio" <?php if(strpos($arr_value['up'], '0') !== FALSE){ echo 'checked'; } ?> id="up" value="0" name="up" \/>Random<br> <input class="input" type="radio" <?php if(strpos($arr_value['up'], '1') !== FALSE){ echo 'checked'; } ?> id="up" value="1" name="up" \/>Api<br> <input class="input" type="radio" <?php if(strpos($arr_value['up'], '2') !== FALSE){ echo 'checked'; } ?> id="up" value="2" name="up" \/>Save Lagu<br> <input class="input" type="radio" <?php if(strpos($arr_value['up'], '3') !== FALSE){ echo 'checked'; } ?> id="up" value="3" name="up" \/>Iframe <\/div><\/div><div class="input-group bat_album" style="width: 100%;"> <label class="label" for="txtAddr">Bật Album<\/label> <div class="edit-input-content"> <input class="input" type="radio" <?php if(strpos($arr_value['bat_album'], '0') !== FALSE || empty($arr_value['bat_album'])){ echo 'checked'; } ?> id="bat_album" value="0" name="bat_album" \/>Bật<br> <input class="input" type="radio" <?php if(strpos($arr_value['bat_album'], '1') !== FALSE){ echo 'checked'; } ?> id="bat_album" value="1" name="bat_album" \/>Tắt <\/div><\/div>');
     });
     $('.web_laguaz').click(function () {
         $('.type_web').html('<div class="input-group" style="width: 100%;"> <label class="label" for="txtAddr">Chọn thể loại hiển thị<\/label> <div class="edit-input-content"> <input class="input" type="checkbox" <?php if(strpos($arr_value['all_cat'], '0') !== FALSE){ echo 'checked'; } ?> id="all_cat0" value="0" \/>Bài hát<br> <input class="input" type="checkbox" <?php if(strpos($arr_value['all_cat'], '1') !== FALSE){ echo 'checked'; } ?> id="all_cat1" value="1" \/>Video<br> <input class="input" type="checkbox" <?php if(strpos($arr_value['all_cat'], '2') !== FALSE){ echo 'checked'; } ?> id="all_cat2" value="2" \/>Album<br> <input class="input" type="checkbox" <?php if(strpos($arr_value['all_cat'], '3') !== FALSE){ echo 'checked'; } ?> id="all_cat3" value="3" \/>Nghệ sĩ<br> <input class="input" type="checkbox" <?php if(strpos($arr_value['all_cat'], '4') !== FALSE){ echo 'checked'; } ?> id="all_cat4" value="4" \/>Bảng xếp hạng <\/div><\/div><div class="input-group search" style="width: 100%;"> <label class="label" for="txtAddr">Chọn kiểu search<\/label> <div class="edit-input-content"> <input class="input" type="radio" checked id="search" value="0" name="search" \/>LaguAZ <\/div><\/div><div class="input-group up" style="width: 100%;"> <label class="label" for="txtAddr">Chọn kiểu up<\/label> <div class="edit-input-content"> <input class="input" type="radio" checked id="up" value="0" name="up" \/>LaguAZ <\/div><\/div><div class="input-group bat_album hide" style="width: 100%;"> <label class="label" for="txtAddr">Bật Album<\/label> <div class="edit-input-content"> <input class="input" type="radio" <?php if(strpos($arr_value['bat_album'], '0') !== FALSE || empty($arr_value['bat_album'])){ echo 'checked'; } ?> id="bat_album" value="0" name="bat_album" \/>Bật <\/div><\/div>');
     });
    $('.update_domain').click(function () {
        var domain = $('.edit-list').find('#domain').keyup().val();
        var name_domain = $('.edit-list').find('#name_domain').keyup().val();
        var analytics = $('.edit-list').find('#analytics').keyup().val();
		var schema = $('.edit-list').find('#schema').keyup().val();
        var meta_bing = $('.edit-list').find('#meta_bing').keyup().val();
        var adthis = $('.edit-list').find('#adthis').keyup().val();
        var sitename = $('.edit-list').find('#sitename').keyup().val();
        var content_sitename = $('.edit-list').find('#content_sitename').keyup().val();
        var meta_key = $('.edit-list').find('#meta_key').keyup().val();
        var all_cat = '';
		var source = '';
        var search = '';
        var up = '';
        var webget = '';
        var cache = '';
        var memcache = '';
        var chiacsdl = '';
        var bat_album = '';
        if ($('.edit-list').find('#all_cat0').click().is(":not(:checked)")) {
            all_cat = $('.edit-list').find('#all_cat0').val() + ',' + all_cat;
        }
        if ($('.edit-list').find('#all_cat1').click().is(":not(:checked)")) {
            all_cat = $('.edit-list').find('#all_cat1').val() + ',' + all_cat;
        }
        if ($('.edit-list').find('#all_cat2').click().is(":not(:checked)")) {
            all_cat = $('.edit-list').find('#all_cat2').val() + ',' + all_cat;
        }
        if ($('.edit-list').find('#all_cat3').click().is(":not(:checked)")) {
            all_cat = $('.edit-list').find('#all_cat3').val() + ',' + all_cat;
        }
        if ($('.edit-list').find('#all_cat4').click().is(":not(:checked)")) {
            all_cat = $('.edit-list').find('#all_cat4').val() + ',' + all_cat;
        }
		$('.edit-list .source input:radio:checked').each(function () {
            source = this.value;
        });
        $('.edit-list .search input:radio:checked').each(function () {
            search = this.value;
        });
        $('.edit-list .up input:radio:checked').each(function () {
            up = this.value;
        });
        $('.edit-list .webget input:radio:checked').each(function () {
            webget = this.value;
        });
        $('.edit-list .cache input:radio:checked').each(function () {
            cache = this.value;
        });
        $('.edit-list .memcache input:radio:checked').each(function () {
            memcache = this.value;
        });
        $('.edit-list .chiacsdl input:radio:checked').each(function () {
            chiacsdl = this.value;
        });
        $('.edit-list .bat_album input:radio:checked').each(function () {
            bat_album = this.value;
        });
        $.ajax({
            url: "check/xuly_domain.php",
            type: "post",
            data: {
                domain: domain,
                name_domain: name_domain,
                analytics: analytics,
				schema: schema,
                meta_bing: meta_bing,
                adthis: adthis,
                sitename: sitename,
                content_sitename: content_sitename,
                meta_key: meta_key,
                all_cat: all_cat,
				source: source,
                search: search,
                up: up,
                webget: webget,
                cache: cache,
                memcache: memcache,
                chiacsdl: chiacsdl,
                bat_album: bat_album,
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