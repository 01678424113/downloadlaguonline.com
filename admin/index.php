<?php
session_start();
if (@$_SESSION['name'] != 'temazmedia') {
    header("Location:../admin/login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Admin Music GuGi</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,vietnamese' rel='stylesheet'
          type='text/css'/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>

    <!-- Include Font Awesome. -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>

    <!-- Include Editor style. -->
    <link href="froala/css/froala_editor.min.css" rel="stylesheet" type="text/css"/>
    <link href="froala/css/froala_style.min.css" rel="stylesheet" type="text/css"/>
    <!-- Include Code Mirror style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css"/>

    <!-- Include Editor Plugins style. -->
    <link rel="stylesheet" href="froala/css/plugins/char_counter.css"/>
    <link rel="stylesheet" href="froala/css/plugins/code_view.css"/>
    <link rel="stylesheet" href="froala/css/plugins/colors.css"/>
    <link rel="stylesheet" href="froala/css/plugins/emoticons.css"/>
    <link rel="stylesheet" href="froala/css/plugins/file.css"/>
    <link rel="stylesheet" href="froala/css/plugins/fullscreen.css"/>
    <link rel="stylesheet" href="froala/css/plugins/image.css"/>
    <link rel="stylesheet" href="froala/css/plugins/image_manager.css"/>
    <link rel="stylesheet" href="froala/css/plugins/line_breaker.css"/>
    <link rel="stylesheet" href="froala/css/plugins/quick_insert.css"/>
    <link rel="stylesheet" href="froala/css/plugins/table.css"/>
    <link rel="stylesheet" href="froala/css/plugins/video.css"/>
    <link rel="icon" href="../images/favicon.ico"/>
    <!-- Include jQuery. -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Include JS files. -->
    <script type="text/javascript" src="froala/js/froala_editor.min.js"></script>

    <!-- Include Code Mirror. -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

    <!-- Include Plugins. -->
    <script type="text/javascript" src="froala/js/plugins/align.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/char_counter.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/code_beautifier.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/code_view.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/colors.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/emoticons.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/entities.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/file.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/font_family.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/font_size.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/fullscreen.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/image.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/image_manager.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/inline_style.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/line_breaker.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/link.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/lists.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/paragraph_format.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/paragraph_style.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/quick_insert.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/quote.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/table.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/save.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/url.min.js"></script>
    <script type="text/javascript" src="froala/js/plugins/video.min.js"></script>

    <link href="<?php echo $home; ?>/css/admin/assets/global/css/font.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $home; ?>/css/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo $home; ?>/css/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
          rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo $home; ?>/css/admin/assets/global/plugins/bootstrap/css/bootstrap.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo $home; ?>/css/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"
          rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo $home; ?>/css/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo $home; ?>/css/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css"
          rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo $home; ?>/css/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css"
          rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo $home; ?>/css/admin/assets/global/plugins/morris/morris.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo $home; ?>/css/admin/assets/global/plugins/fullcalendar/fullcalendar.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo $home; ?>/css/admin/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo $home; ?>/css/admin/assets/global/plugins/bootstrap-toastr/toastr.min.css"
          rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo $home; ?>/css/admin/assets/global/css/components.min.css" rel="stylesheet"
          id="style_components" type="text/css"/>
    <link href="<?php echo $home; ?>/css/admin/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo $home; ?>/css/admin/assets/layouts/layout2/css/layout.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo $home; ?>/css/admin/assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet"
          type="text/css"
          id="style_color"/>
    <link href="<?php echo $home; ?>/css/admin/assets/layouts/layout2/css/custom.min.css" rel="stylesheet"
          type="text/css"/>

</head>
<script>
    $(document).ready(function () {
        $('.navbar').find('.dropdown').click(function () {
            $('.navbar').find('.dropdown').each(function () {
                $(this).attr('data-current', '');
            });
            $(this).closest('li').attr('data-current', 'current');
            $('.navbar').find('.dropdown').each(function () {
                if ($(this).attr('data-state') === 'open' && $(this).closest('li').attr('data-current') !== 'current') {
                    var current = $(this);
                    current.find('.dropdown_menu').slideToggle('fast', function () {
                        current.attr('data-state', '');
                        current.removeClass('active');
                        current.removeClass('open');
                        current.find('a').removeClass('collapsed');
                    });
                }
            });
            var state = $(this).closest('li').attr('data-state');
            var current = $(this);
            if (state !== 'open') {
                current.closest('li').attr('data-state', 'open');
                current.closest('li').addClass('active');
                current.addClass('open');
                current.find('a').addClass('collapsed');
            }
            current.closest('li').find('.dropdown_menu').slideToggle('fast', function () {
                if (state === 'open') {
                    current.closest('li').attr('data-curren', '');
                    current.closest('li').attr('data-state', '');
                    current.closest('li').removeClass('active');
                    current.removeClass('open');
                    current.find('a').removeClass('collapsed');
                }
            });
        });
    });
</script>
<body>
<?php
if (file_exists('../up/domain.txt')) {
    $domain = unserialize(file_get_contents('../up/domain.txt'));
    ?>
    <header>
        <div class="title">
            <a href="../admin" style="color: #0fd0a5;text-decoration: none">Admin Music GuGi</a></div>
        <div class="maxim">I will change the world with my method...</div>
    </header>
    <div class="menu-l">
        <ul class="navbar">
            <li class="dropdown">
                <a href="../" target="_blank">Home</a>
            </li>
            <li class="dropdown">
                <a href="create_db.php" target="_blank">Create Database</a>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="change" data-type="domain" data-file="edit_domain">Sửa domain</a>
            </li>
            <?php
            if ($domain['webget'] == 0) {
                ?>
                <li class="dropdown">
                    <a href="javascript:;" class="change" data-type="api-soundcloud" data-file="edit">Sửa api
                        soundcloud</a>
                </li>
                <?php
            }
            ?>
            <li>
                <a href="javascript:;" class="change" data-type="index" data-file="edit_list">Sửa trang chủ</a>
            </li>
            <?php
            if ($domain['webget'] == 0) {
                ?>
                <li class="dropdown">
                    <a style="cursor: pointer">Sửa Thể Loại<i class="fa arrow"></i></a>
                    <ul class="dropdown_menu">
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-all" data-file="edit_list">All</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-pop" data-file="edit_list">Pop</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-dangdut" data-file="edit_list">Dangdut</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-rb" data-file="edit_list">R&B</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-kpop" data-file="edit_list">Kpop</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-indo" data-file="edit_list">Indo</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-dance"
                               data-file="edit_list">Dance</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-rock" data-file="edit_list">Rock</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-remix"
                               data-file="edit_list">Remix</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-hiphop" data-file="edit_list">Hip
                                Hop</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-jazz" data-file="edit_list">Jazz</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-cover"
                               data-file="edit_list">cover</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-ska" data-file="edit_list">SKA</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-anak" data-file="edit_list">Anak
                                Anak</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-ost" data-file="edit_list">OST</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="change" data-type="genre-rap" data-file="edit_list">Rap</a>
                        </li>
                    </ul>
                </li>
                <?php
            }
            ?>
            <li class="dropdown">
                <a style="cursor: pointer">Sửa Bài con<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <li>
                        <a href="index.php?type=baihat&action=edit" class="change2 <?php
                        if (!empty($_GET['type'])) {
                            if ($_GET['type'] == 'baihat' || $_GET['type'] == 'lagu') {
                                echo 'bg';
                            }
                        }
                        ?>">Sửa bài hát</a>
                    </li>
                    <li>
                        <a href="index.php?type=video&action=edit" class="change2 <?php
                        if (!empty($_GET['type'])) {
                            if ($_GET['type'] == 'video') {
                                echo 'bg';
                            }
                        }
                        ?>">Sửa video</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Sửa List<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <li>
                        <a href="javascript:;" class="change" data-type="list-baihat" data-file="edit_list">Bài hát</a>
                    </li>
                    <?php
                    if (strpos($domain['all_cat'], '2') !== FALSE) {
                        ?>
                        <li>
                            <a href="javascript:;" class="change" data-type="list-album" data-file="edit_list">Album</a>
                        </li>
                        <?php
                    }
                    ?>
                    <li>
                        <a href="javascript:;" class="change" data-type="list-video" data-file="edit_list">Video</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="list-bxh" data-file="edit_list">Peringkat</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="list-nghesi" data-file="edit_list">Artis</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="change" data-type="upload_file" data-file="edit_list">Upload ảnh</a>
            </li>
            <li>
                <a href="javascript:;" class="change" data-type="search" data-file="edit_list">Sửa trang search</a>
            </li>
            <li>
                <a href="javascript:;" class="change" data-type="erro404" data-file="edit_list">Sửa trang 404</a>
            </li>
            <li>
                <a href="javascript:;" class="change" data-type="footer" data-file="edit">Sửa footer</a>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Sửa Title<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <li>
                        <a href="javascript:;" class="change" data-type="title-baihat" data-file="edit">Bài hát</a>
                    </li>
                    <?php
                    if (strpos($domain['all_cat'], '2') !== FALSE) {
                        ?>
                        <li>
                            <a href="javascript:;" class="change" data-type="title-album" data-file="edit">Album</a>
                        </li>
                        <?php
                    }
                    ?>
                    <li>
                        <a href="javascript:;" class="change" data-type="title-video" data-file="edit">Video</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="title-nghesi" data-file="edit">Nghệ sĩ</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Sửa description<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <li>
                        <a href="javascript:;" class="change" data-type="description-baihat" data-file="edit">Bài
                            hát</a>
                    </li>
                    <?php
                    if (strpos($domain['all_cat'], '2') !== FALSE) {
                        ?>
                        <li>
                            <a href="javascript:;" class="change" data-type="description-album"
                               data-file="edit">Album</a>
                        </li>
                        <?php
                    }
                    ?>
                    <li>
                        <a href="javascript:;" class="change" data-type="description-video" data-file="edit">Video</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="description-nghesi" data-file="edit">Nghệ
                            sĩ</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Sửa từ khóa chèn link<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <li>
                        <a href="javascript:;" class="change" data-type="tu-khoa-chen-link-baihat" data-file="edit">Bài
                            hát</a>
                    </li>
                    <?php
                    if (strpos($domain['all_cat'], '2') !== FALSE) {
                        ?>
                        <li>
                            <a href="javascript:;" class="change" data-type="tu-khoa-chen-link-album" data-file="edit">Album</a>
                        </li>
                        <?php
                    }
                    ?>
                    <li>
                        <a href="javascript:;" class="change" data-type="tu-khoa-chen-link-video"
                           data-file="edit">Video</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="tu-khoa-chen-link-nghesi" data-file="edit">Nghệ
                            sĩ</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Sửa từ khóa liên quan<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <li>
                        <a href="javascript:;" class="change" data-type="tu-khoa-lien-quan-baihat" data-file="edit">Bài
                            hát</a>
                    </li>
                    <?php
                    if (strpos($domain['all_cat'], '2') !== FALSE) {
                        ?>
                        <li>
                            <a href="javascript:;" class="change" data-type="tu-khoa-lien-quan-album" data-file="edit">Album</a>
                        </li>
                        <?php
                    }
                    ?>
                    <li>
                        <a href="javascript:;" class="change" data-type="tu-khoa-lien-quan-video"
                           data-file="edit">Video</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="tu-khoa-lien-quan-nghesi" data-file="edit">Nghệ
                            sĩ</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Sửa content chèn link<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <li>
                        <a href="javascript:;" class="change" data-type="content-chen-link-baihat" data-file="edit">Bài
                            hát</a>
                    </li>
                    <?php
                    if (strpos($domain['all_cat'], '2') !== FALSE) {
                        ?>
                        <li>
                            <a href="javascript:;" class="change" data-type="content-chen-link-album" data-file="edit">Album</a>
                        </li>
                        <?php
                    }
                    ?>
                    <li>
                        <a href="javascript:;" class="change" data-type="content-chen-link-video"
                           data-file="edit">Video</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="content-chen-link-nghesi" data-file="edit">Nghệ
                            sĩ</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Sửa content top<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <li>
                        <a href="javascript:;" class="change" data-type="content-top-baihat" data-file="edit">Bài
                            hát</a>
                    </li>
                    <?php
                    if (strpos($domain['all_cat'], '2') !== FALSE) {
                        ?>
                        <li>
                            <a href="javascript:;" class="change" data-type="content-top-album"
                               data-file="edit">Album</a>
                        </li>
                        <?php
                    }
                    ?>
                    <li>
                        <a href="javascript:;" class="change" data-type="content-top-video" data-file="edit">Video</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="content-top-nghesi" data-file="edit">Nghệ
                            sĩ</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Sửa content bot<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <li>
                        <a href="javascript:;" class="change" data-type="content-bot-baihat" data-file="edit">Bài
                            hát</a>
                    </li>
                    <?php
                    if (strpos($domain['all_cat'], '2') !== FALSE) {
                        ?>
                        <li>
                            <a href="javascript:;" class="change" data-type="content-bot-album"
                               data-file="edit">Album</a>
                        </li>
                        <?php
                    }
                    ?>
                    <li>
                        <a href="javascript:;" class="change" data-type="content-bot-video" data-file="edit">Video</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="content-bot-nghesi" data-file="edit">Nghệ
                            sĩ</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Sửa alt ảnh<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <li>
                        <a href="javascript:;" class="change" data-type="alt-anh-baihat" data-file="edit">Bài hát</a>
                    </li>
                    <?php
                    if (strpos($domain['all_cat'], '2') !== FALSE) {
                        ?>
                        <li>
                            <a href="javascript:;" class="change" data-type="alt-anh-album" data-file="edit">Album</a>
                        </li>
                        <?php
                    }
                    ?>
                    <li>
                        <a href="javascript:;" class="change" data-type="alt-anh-video" data-file="edit">Video</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="alt-anh-nghesi" data-file="edit">Nghệ sĩ</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Sửa CSS<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <?php
                    $filelist = glob("../css/*.css");
                    for ($i = 0; $i < count($filelist); $i++) {
                        $file = '';
                        $file = explode('/', $filelist[$i]);
                        $file = $file[count($file) - 1];
                        $file = str_replace('.css', '', $file);
                        ?>
                        <li>
                            <a href="javascript:;" class="change" data-type="web-<?php echo $file; ?>"
                               data-file="edit_css">WEB <?php echo $file; ?></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    $filelist = glob("css/*.css");
                    for ($i = 0; $i < count($filelist); $i++) {
                        $file = '';
                        $file = explode('/', $filelist[$i]);
                        $file = $file[count($file) - 1];
                        $file = str_replace('.css', '', $file);
                        ?>
                        <li>
                            <a href="javascript:;" class="change" data-type="admin-<?php echo $file; ?>"
                               data-file="edit_css">Admin <?php echo $file; ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Sửa ADS<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <?php
                    $filelist = glob("../ads/*.php");
                    for ($i = 0; $i < count($filelist); $i++) {
                        $file = '';
                        $file = explode('/', $filelist[$i]);
                        $file = $file[count($file) - 1];
                        $file = str_replace('.php', '', $file);
                        ?>
                        <li>
                            <a href="javascript:;" class="change" data-type="qcads_<?php echo $file; ?>"
                               data-file="edit_css"><?php echo $file; ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Sửa File lẻ<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <li>
                        <a href="javascript:;" class="change" data-type="connect" data-file="edit">Sửa connect</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="htaccess" data-file="edit">Sửa htaccess</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="file_config" data-file="edit">Sửa Config</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="robot" data-file="edit">Sửa robot</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Up Video<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <li>
                        <a target="_blank" href="../getvideo">One Video</a>
                    </li>
                    <li>
                        <a target="_blank" href="../getvideo/all-video.php">Mutip Video</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a style="cursor: pointer">Social Network<i class="fa arrow"></i></a>
                <ul class="dropdown_menu">
                    <li>
                        <a href="javascript:;" class="change" data-type="" data-file="add_social">Add New</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="change" data-type="" data-file="social_list">Social List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a target="_blank" href="../get_nghesi.php">Cập nhật data nghệ sĩ</a>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="change" data-type="version" data-file="edit">Phiên bản</a>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="change" data-type="theme" data-file="edit">Theme</a>
            </li>
            <li class="dropdown">
                <a target="_blank" href="../cacher">Xóa Cache</a>
            </li>
            <li class="dropdown">
                <a href="logout.php">Log out</a>
            </li>
        </ul>
    </div>
    <div class="menu-r">
        <div class="wapper">
            <?php
            if (!empty($_GET['type']) && !empty($_GET['action'])) {
                include_once '../inc/connect.php';
                if ($_GET['type'] == 'baihat' || $_GET['type'] == 'video' || $_GET['type'] == 'lagu') {
                    $type = $_GET['type'];
                if ($_GET['action'] == 'delete') {
                    if (!empty($_GET['id'])) {
                        if ($_GET['id'] > 0) {
                            mysqli_query($conn, "DELETE FROM `$type` WHERE id=" . $id);
                        }
                    }
                    ?>
                    <script>
                        alert('Xóa thành công');
                    </script>
                <?php
                }
                if ($_GET['action'] == 'edit') {
                ?>
                    <div class="edit-list">
                        <div class="input-group">
                            <label class="label" for="txtAddr">Tìm kiếm <?php echo $type; ?> theo id:</label>
                            <div class="edit-input-content">
                                <input type="number" value="<?php echo @$_GET['id']; ?>" class="number_id" min="1"/>
                                <input type="submit" value="Tìm" class="fint_id"/>
                            </div>
                        </div>
                        <script>
                            $('.fint_id').click(function () {
                                var id = $('.number_id').val();
                                window.location.href = "index.php?type=<?php echo $type; ?>&id=" + id + "&action=edit";
                            });
                        </script>
                        <?php
                        if (!empty($_GET['id'])) {
                            $id = $_GET['id'];
                            $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM $type WHERE id=$id LIMIT 1"));
                            $count = 70 - strlen($row["title"]);
                            ?>
                            <div class="input-group">
                                <label class="label" for="txtAddr">Name</label>
                                <div class="edit-input-content">
                                    <input class="input" type="text" id="name" value="<?php echo $row["name"]; ?>"/>
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="label" for="txtAddr">Title</label>
                                <div class="edit-input-content">
                                    <SCRIPT LANGUAGE="JavaScript">
                                        function CountLeft(field, count, max) {
                                            if (field.value.length > max)
                                                field.value = field.value.substring(0, max);
                                            else
                                                count.value = max - field.value.length;
                                        }
                                    </script>
                                    <form>
                                        <input name="fname" class="title" type="text" id="title fname"
                                               value="<?php echo $row["title"]; ?>"
                                               onKeyDown="CountLeft(this.form.fname, this.form.left, 70);"
                                               onKeyUp="CountLeft(this.form.fname, this.form.left, 70);"/>
                                        <input readonly class="count" type="text" name="left" size=3 maxlength=3
                                               value="<?php echo $count; ?>" disabled="disabled"/>
                                    </form>
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="label" for="txtAddr">Desception</label>
                                <div class="edit-input-content">
                                    <input class="input" type="text" id="description"
                                           value="<?php echo $row["description"]; ?>"/>
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="label" for="txtAddr">Alt ảnh</label>
                                <div class="edit-input-content">
                                    <input class="input" type="text" id="alt_anh"
                                           value="<?php echo $row["alt_anh"]; ?>"/>
                                </div>
                            </div>
                            <input type="hidden" name="type" id="type" value="<?php echo $type; ?>"/>
                            <input type="submit" value="Update" class="update_content"/>
                            <a class="delete_content"
                               href="index.php?type=<?php echo $type; ?>&id=<?php echo $id; ?>&action=delete">Xóa</a>
                            <?php
                        }
                        ?>
                    </div>
                    <script>
                        $('.update_content').click(function () {
                            var title = $('.edit-list').find('.title').keyup().val();
                            var des = $('.edit-list').find('#description').keyup().val();
                            var alt = $('.edit-list').find('#alt_anh').keyup().val();
                            var name = $('.edit-list').find('#name').keyup().val();
                            var table = $('.edit-list').find('#type').keyup().val();
                            $.ajax({
                                url: "check/xuly_content.php",
                                type: "post",
                                data: {
                                    id: <?php echo $row['id']; ?>,
                                    table: table,
                                    title: title,
                                    des: des,
                                    alt: alt,
                                    name: name,
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
                    <?php
                }
                }
            }
            ?>
        </div>
    </div>
<?php
} else {

function getCurrentPageURL_domain()
{
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

$domain = getCurrentPageURL_domain();
$domain = explode('/', $domain);
$domain2 = $domain[0] . '/' . $domain[1] . '/' . $domain[2];
$name_domain = explode('.', $domain[2]);
$name_domain2 = '';
for ($i = 0; $i < count($name_domain); $i++) {
    $name_domain2 .= ucfirst($name_domain[$i]) . '.';
}
$name_domain2 = substr($name_domain2, 0, -1);
?>
    <header>
        <div class="title">Admin Music GuGi</div>
        <div class="maxim">I will change the world with my method...</div>
    </header>
    <div class="menu-r">
        <div class="wapper">
            <div class="edit-list">
                <div class="input-group">
                    <label class="label" for="txtAddr">Nhập Domain</label>
                    <div class="edit-input-content">
                        <input class="input" type="text" id="domain" value="<?php echo $domain2; ?>"/>
                    </div>
                </div>
                <div class="input-group">
                    <label class="label" for="txtAddr">Nhập Domain Name</label>
                    <div class="edit-input-content">
                        <input class="input" type="text" id="name_domain" value="<?php echo $name_domain2; ?>"/>
                    </div>
                </div>
                <input type="submit" value="Update" class="update_domain"/>
            </div>
        </div>
    </div>
    <script>
        $('.update_domain').click(function () {
            var domain = $('.edit-list').find('#domain').keyup().val();
            var name_domain = $('.edit-list').find('#name_domain').keyup().val();
            $.ajax({
                url: "check/xuly_domain.php",
                type: "post",
                data: {
                    domain: domain,
                    name_domain: name_domain
                },
                success: function (result1) {
                    alert('Update thành công!');
                    window.location.href = "/admin";
                },
                error: function () {
                    alert('Error');
                }
            });
        });

    </script>
    <?php
}
?>
</body>
<script>
    $(document).ready(function () {
        $('.change').click(function () {
            $('.menu-r').empty();
            $('.change').removeClass('bg');
            $(this).addClass('bg');
            var type = $(this).attr('data-type');
            var file = $(this).attr('data-file');
            $.ajax({
                url: "check/" + file + ".php",
                type: "post",
                dateType: "html",
                data: {
                    type: type
                },
                success: function (result) {
                    $(result).appendTo('.menu-r');
                    $('.update').click(function () {
                        if (file == 'edit' || file == 'edit_css') {
                            var value = $('.edit').find('textarea').keyup().val();
                            $.ajax({
                                url: "check/xuly.php",
                                type: "post",
                                data: {
                                    type: type,
                                    value: value
                                },
                                success: function (result1) {
                                    alert('Update thành công!');
                                },
                                error: function () {
                                    alert('Error');
                                }
                            });
                        } else {
                            var title = $('.edit-list').find('.title').keyup().val();
                            var des = $('.edit-list').find('#description').keyup().val();
                            var h1 = $('.edit-list').find('#tagh1').keyup().val();
                            var top = $('.edit-list').find('.content-top').keyup().val();
                            var bot = $('.edit-list').find('.content-bot').keyup().val();
                            $.ajax({
                                url: "check/xuly_list.php",
                                type: "post",
                                data: {
                                    type: type,
                                    title: title,
                                    des: des,
                                    h1: h1,
                                    top: top,
                                    bot: bot
                                },
                                success: function (result1) {
                                    alert('Update thành công!');
                                },
                                error: function () {
                                    alert('Error');
                                }
                            });
                        }
                    });
                },
                error: function () {
                    alert('Error');
                }
            });
            return false;
        });

    });
</script>


<script>
    $(document).ready(function () {
        $('#character-count').text(0);
        $('#txtContent').keyup(function (event) {
            var sentence = document.getElementById("txtContent").value;
            String.prototype.capitalize = function () {
                return this.charAt(0).toUpperCase() + this.slice(1);
            }
            sentencenew = sentence.capitalize();
            document.getElementById('txtContent').value = sentencenew;
        });
        $('#btnAddContent').addClass('disabled');
        $('#txtContent').keyup(function () {
            len = $(this).val().length;
            $('#character-count').text(len);
            if (len < 30) {
                $('#btnAddContent').addClass('disabled');
            } else {
                $('#input-error').removeClass('alert alert-danger');
                $('#btnAddContent').removeClass('disabled');
                $('#form-add-sentence').removeClass('has-error');
                $('#input-error').text("");
            }
            ;
        });

        $("#btnAddKeyword").click(function (event) {
            var caretPos = document.getElementById("txtContent").selectionStart;
            var textAreaTxt = jQuery("#txtContent").val();
            var txtToAdd = "%keyword%";
            jQuery("#txtContent").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos));
            $("#txtContent").focus();
        });


        $("#btnAddTK").click(function (event) {
            var caretPos = document.getElementById("txtContent").selectionStart;
            var textAreaTxt = jQuery("#txtContent").val();
            var txtToAdd = "%tk%";
            jQuery("#txtContent").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos));
            $("#txtContent").focus();
        });

        $("#btnAddDomain").click(function (event) {
            var caretPos = document.getElementById("txtContent").selectionStart;
            var textAreaTxt = jQuery("#txtContent").val();
            var txtToAdd = "%domain%";
            jQuery("#txtContent").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos));
            $("#txtContent").focus();
        });
    });
</script>

</html>