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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .form-group{
            display: -webkit-box;
        }
        .page-content{
            position: fixed;
            width: 100%;
        }
        .menu-r{
            overflow-y: scroll;
            max-height: 600px;
        }
    </style>
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
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<?php
if (file_exists('../up/domain.txt')) {
$domain = unserialize(file_get_contents('../up/domain.txt'));
?>
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="">
                <img src="<?php echo $home; ?>/css/admin/assets/layouts/layout2/img/logo-safeone.png" alt="logo"
                     class="logo-default"/> </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        <div class="page-actions">
            <div class="btn-group">
                <ul class="dropdown-menu hidden" role="menu">
                    <li>
                        <a href="javascript:;">
                            <i class="icon-docs"></i> New Post </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="icon-tag"></i> New Comment </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="icon-share"></i> Share </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:;">
                            <i class="icon-flag"></i> Comments
                            <span class="badge badge-success">4</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="icon-users"></i> Feedbacks
                            <span class="badge badge-danger">2</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-default"> 0 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold">0 đang chờ</span> thông báo</h3>
                                <a href="">xem tất cả</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;"
                                    data-handle-color="#637283">

                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="icon-envelope-open"></i>
                            <span class="badge badge-default"> 0 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>Bạn có
                                    <span class="bold">0 mới</span> tin nhắn</h3>
                                <a href="">xam tất cả</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;"
                                    data-handle-color="#637283">

                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="icon-calendar"></i>
                            <span class="badge badge-default"> 0 </span>
                        </a>
                        <ul class="dropdown-menu extended tasks">
                            <li class="external">
                                <h3>Bạn có
                                    <span class="bold">0 đang chờ</span> công việc</h3>
                                <a href="">xem tất cả</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;"
                                    data-handle-color="#637283">

                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <img alt="" class="img-circle"
                                 src="<?php echo $home; ?>/css/admin/assets/layouts/layout2/img/avatar3_small.jpg"/>
                            <span class="username username-hide-on-mobile"> Admin </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="">
                                    <i class="icon-user"></i> Thông tin cá nhân </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="logout.php">
                                    <i class="icon-key"></i> Đăng xuất </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended quick-sidebar-toggler hidden">
                        <span class="sr-only">Toggle Quick Sidebar</span>
                        <i class="icon-logout"></i>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper menu-l">
        <!-- END SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu navbar"
                data-keep-expanded="false"
                data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item">
                    <a href="../" class="nav-link nav-toggle" target="_blank">
                        <i class="icon-diamond"></i>
                        <span class="title">Trang chủ</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="create_db.php" class="nav-link nav-toggle" target="_blank">
                        <i class="icon-diamond"></i>
                        <span class="title">Create Database</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="change" data-type="domain" data-file="edit_domain">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa domain</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <?php
                if ($domain['webget'] == 0) {
                    ?>
                    <li class="nav-item">
                        <a href="javascript:;" class="change" data-type="api-soundcloud" data-file="edit">
                            <i class="icon-diamond"></i>
                            <span class="title">Sửa api soundcloud</span>
                            <span class="arrow"></span>
                        </a>
                    </li>
                    <?php
                }
                ?>
                <li class="nav-item">
                    <a href="javascript:;" class="change" data-type="index" data-file="edit_list">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa trang chủ</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <?php
                if ($domain['webget'] == 0) {
                    ?>
                    <li class="nav-item dropdown">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-diamond"></i>
                            <span class="title">Sửa Thể Loại</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu dropdown_menu">
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-all" data-file="edit_list">
                                    <span class="title">All</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-pop" data-file="edit_list">
                                    <span class="title">Pop</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-dangdut"
                                   data-file="edit_list">
                                    <span class="title">Dangdut</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-rb" data-file="edit_list">
                                    <span class="title">R&B</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-kpop" data-file="edit_list">
                                    <span class="title">Kpop</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-indo" data-file="edit_list">
                                    <span class="title">Indo</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-dance" data-file="edit_list">
                                    <span class="title">Dance</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-rock" data-file="edit_list">
                                    <span class="title">Rock</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-remix" data-file="edit_list">
                                    <span class="title">Remix</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-hiphop"
                                   data-file="edit_list">
                                    <span class="title">Hip</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-jazz" data-file="edit_list">
                                    <span class="title">Jazz</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-cover" data-file="edit_list">
                                    <span class="title">cover</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-ska" data-file="edit_list">
                                    <span class="title">SKA</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-anak" data-file="edit_list">
                                    <span class="title">Anak</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-ost" data-file="edit_list">
                                    <span class="title">OST</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="change" data-type="genre-rap" data-file="edit_list">
                                    <span class="title">Rap</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa Bài con</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <li class="nav-item">
                            <a href="index.php?type=baihat&action=edit" class="change2 <?php
                            if (!empty($_GET['type'])) {
                                if ($_GET['type'] == 'baihat' || $_GET['type'] == 'lagu') {
                                    echo 'bg';
                                }
                            }
                            ?>">
                                <span class="title">Sửa bài hát</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?type=video&action=edit" class="change2 <?php
                            if (!empty($_GET['type'])) {
                                if ($_GET['type'] == 'video') {
                                    echo 'bg';
                                }
                            }
                            ?>">
                                <span class="title">Sửa video</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa List</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <li class="nav-item  ">
                            <a href="javascript:;" class="change" data-type="list-baihat" data-file="edit_list">
                                <span class="title">Bài hát</span>
                            </a>
                        </li>
                        <?php
                        if (strpos($domain['all_cat'], '2') !== FALSE) {
                            ?>
                            <li class="nav-item">
                                <a href="javascript:;" class="change" data-type="list-album" data-file="edit_list">
                                    <span class="title">Album</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="list-video"
                               data-file="edit_list">
                                <span class="title">Video</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="list-bxh" data-file="edit_list">
                                <span class="title">Peringkat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="list-nghesi" data-file="edit_list">
                                <span class="title">Artis</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="javascript:;" class="change" data-type="upload_file" data-file="edit_list">
                        <i class="icon-diamond"></i>
                        <span class="title">Upload ảnh</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="change" data-type="search" data-file="edit_list">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa trang search</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="change" data-type="erro404" data-file="edit_list">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa trang 404</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="change" data-type="footer" data-file="edit">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa footer</span>
                        <span class="arrow"></span>
                    </a>
                </li>


                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa Title</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="title-baihat" data-file="edit">
                                <span class="title">Bài hát</span>
                            </a>
                        </li>
                        <?php
                        if (strpos($domain['all_cat'], '2') !== FALSE) {
                            ?>
                            <li class="nav-item">
                                <a href="javascript:;" class="change" data-type="title-album" data-file="edit">
                                    <span class="title">Album</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="title-video" data-file="edit">
                                <span class="title">Video</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="title-nghesi" data-file="edit">
                                <span class="title">Nghệ sĩ</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa description</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="description-baihat" data-file="edit">
                                <span class="title">Bài hát</span>
                            </a>
                        </li>
                        <?php
                        if (strpos($domain['all_cat'], '2') !== FALSE) {
                            ?>
                            <li class="nav-item">
                                <a href="javascript:;" class="change" data-type="description-album"
                                   data-file="edit">
                                    <span class="title">Album</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="description-video" data-file="edit">
                                <span class="title">Video</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="description-nghesi" data-file="edit">
                                <span class="title">Nghệ sĩ</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa từ khóa chèn link</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="tu-khoa-chen-link-baihat"
                               data-file="edit">
                                <span class="title">Bài hát</span>
                            </a>
                        </li>
                        <?php
                        if (strpos($domain['all_cat'], '2') !== FALSE) {
                            ?>
                            <li class="nav-item">
                                <a href="javascript:;" class="change" data-type="tu-khoa-chen-link-album"
                                   data-file="edit">
                                    <span class="title">Album</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="tu-khoa-chen-link-video"
                               data-file="edit">
                                <span class="title">Video</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="tu-khoa-chen-link-nghesi"
                               data-file="edit">
                                <span class="title">Nghệ sĩ</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa từ khóa liên quan</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="tu-khoa-lien-quan-baihat"
                               data-file="edit">
                                <span class="title">Bài hát</span>
                            </a>
                        </li>
                        <?php
                        if (strpos($domain['all_cat'], '2') !== FALSE) {
                            ?>
                            <li class="nav-item">
                                <a href="javascript:;" class="change" data-type="tu-khoa-lien-quan-album"
                                   data-file="edit">
                                    <span class="title">Album</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="tu-khoa-lien-quan-video"
                               data-file="edit">
                                <span class="title">Video</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="tu-khoa-lien-quan-nghesi"
                               data-file="edit">
                                <span class="title">Nghệ sĩ</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa content chèn link</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="content-chen-link-baihat"
                               data-file="edit">
                                <span class="title">Bài hát</span>
                            </a>
                        </li>
                        <?php
                        if (strpos($domain['all_cat'], '2') !== FALSE) {
                            ?>
                            <li class="nav-item">
                                <a href="javascript:;" class="change" data-type="content-chen-link-album"
                                   data-file="edit">
                                    <span class="title">Album</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="content-chen-link-video"
                               data-file="edit">
                                <span class="title">Video</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="content-chen-link-nghesi"
                               data-file="edit">
                                <span class="title">Nghệ sĩ</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa content top</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="content-top-baihat" data-file="edit">
                                <span class="title">Bài hát</span>
                            </a>
                        </li>
                        <?php
                        if (strpos($domain['all_cat'], '2') !== FALSE) {
                            ?>
                            <li class="nav-item">
                                <a href="javascript:;" class="change" data-type="content-top-album"
                                   data-file="edit">
                                    <span class="title">Album</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="content-top-video" data-file="edit">
                                <span class="title">Video</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="content-top-nghesi" data-file="edit">
                                <span class="title">Nghệ sĩ</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa content bot</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="content-bot-baihat" data-file="edit">
                                <span class="title">Bài hát</span>
                            </a>
                        </li>
                        <?php
                        if (strpos($domain['all_cat'], '2') !== FALSE) {
                            ?>
                            <li class="nav-item">
                                <a href="javascript:;" class="change" data-type="content-bot-album"
                                   data-file="edit">
                                    <span class="title">Album</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="content-bot-video" data-file="edit">
                                <span class="title">Video</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="content-bot-nghesi" data-file="edit">
                                <span class="title">Nghệ sĩ</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa alt ảnh</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="alt-anh-baihat" data-file="edit">
                                <span class="title">Bài hát</span>
                            </a>
                        </li>
                        <?php
                        if (strpos($domain['all_cat'], '2') !== FALSE) {
                            ?>
                            <li class="nav-item">
                                <a href="javascript:;" class="change" data-type="alt-anh-album" data-file="edit">
                                    <span class="title">Album</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="alt-anh-video" data-file="edit">
                                <span class="title">Video</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="alt-anh-nghesi" data-file="edit">
                                <span class="title">Nghệ sĩ</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa CSS</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <?php
                        $filelist = glob("../css/*.css");
                        for ($i = 0; $i < count($filelist); $i++) {
                            $file = '';
                            $file = explode('/', $filelist[$i]);
                            $file = $file[count($file) - 1];
                            $file = str_replace('.css', '', $file);
                            ?>
                            <li class="nav-item">
                                <a href="javascript:;" class="change" data-type="web-<?php echo $file; ?>"
                                   data-file="edit_css">
                                    <span class="title">WEB <?php echo $file; ?></span>
                                </a>
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
                            <li class="nav-item">
                                <a href="javascript:;" class="change" data-type="admin-<?php echo $file; ?>"
                                   data-file="edit_css">
                                    <span class="title">Admin <?php echo $file; ?></span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa ADS</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <?php
                        $filelist = glob("../ads/*.php");
                        for ($i = 0; $i < count($filelist); $i++) {
                            $file = '';
                            $file = explode('/', $filelist[$i]);
                            $file = $file[count($file) - 1];
                            $file = str_replace('.php', '', $file);
                            ?>
                            <li class="nav-item">
                                <a href="javascript:;" class="change" data-type="qcads_<?php echo $file; ?>"
                                   data-file="edit_css">
                                    <span class="title"><?php echo $file; ?></span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Sửa File lẻ</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="connect" data-file="edit">
                                <span class="title">Sửa connect</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="htaccess" data-file="edit">
                                <span class="title">Sửa htaccess</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="file_config" data-file="edit">
                                <span class="title">Sửa Config</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="robot" data-file="edit">
                                <span class="title">Sửa robot</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Up Video</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <li class="nav-item">
                            <a target="_blank" href="../getvideo">
                                <span class="title">One Video</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a target="_blank" href="../getvideo/all-video.php">
                                <span class="title">Mutip Video</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Social Network</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu dropdown_menu">
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="" data-file="add_social">
                                <span class="title">Add New</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="change" data-type="" data-file="social_list">
                                <span class="title">Social List</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a target="_blank" href="../get_nghesi.php">
                        <i class="icon-diamond"></i>
                        <span class="title">Cập nhật data nghệ sĩ</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="change" data-type="version" data-file="edit">
                        <i class="icon-diamond"></i>
                        <span class="title">Phiên bản</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="change" data-type="theme" data-file="edit">
                        <i class="icon-diamond"></i>
                        <span class="title">Theme</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a target="_blank" href="../cacher">
                        <i class="icon-diamond"></i>
                        <span class="title">Xóa Cache</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php">
                        <i class="icon-diamond"></i>
                        <span class="title">Log out</span>
                        <span class="arrow"></span>
                    </a>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <div class="theme-panel">
                <div class="toggler tooltips" data-container="body" data-placement="left" data-html="true"
                     data-original-title="Click to open advance theme customizer panel">
                    <i class="icon-settings"></i>
                </div>
                <div class="toggler-close">
                    <i class="icon-close"></i>
                </div>
                <div class="theme-options">
                    <div class="theme-option theme-colors clearfix">
                        <span> THEME COLOR </span>
                        <ul>
                            <li class="color-default current tooltips" data-style="default" data-container="body"
                                data-original-title="Default"></li>
                            <li class="color-grey tooltips" data-style="grey" data-container="body"
                                data-original-title="Grey"></li>
                            <li class="color-blue tooltips" data-style="blue" data-container="body"
                                data-original-title="Blue"></li>
                            <li class="color-dark tooltips" data-style="dark" data-container="body"
                                data-original-title="Dark"></li>
                            <li class="color-light tooltips" data-style="light" data-container="body"
                                data-original-title="Light"></li>
                        </ul>
                    </div>
                    <div class="theme-option">
                        <span> Theme Style </span>
                        <select class="layout-style-option form-control input-small">
                            <option value="square" selected="selected">Square corners</option>
                            <option value="rounded">Rounded corners</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Layout </span>
                        <select class="layout-option form-control input-small">
                            <option value="fluid" selected="selected">Fluid</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Header </span>
                        <select class="page-header-option form-control input-small">
                            <option value="fixed" selected="selected">Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Top Dropdown</span>
                        <select class="page-header-top-dropdown-style-option form-control input-small">
                            <option value="light" selected="selected">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Mode</span>
                        <select class="sidebar-option form-control input-small">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Style</span>
                        <select class="sidebar-style-option form-control input-small">
                            <option value="default" selected="selected">Default</option>
                            <option value="compact">Compact</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Menu </span>
                        <select class="sidebar-menu-option form-control input-small">
                            <option value="accordion" selected="selected">Accordion</option>
                            <option value="hover">Hover</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Position </span>
                        <select class="sidebar-pos-option form-control input-small">
                            <option value="left" selected="selected">Left</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Footer </span>
                        <select class="page-footer-option form-control input-small">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- END THEME PANEL -->
            <h1 class="page-title"> Trang chủ
                <small>báo cáo & cập nhập</small>
            </h1>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="">Trang chủ</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span class="menu-current"></span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle"
                                data-toggle="dropdown" data-hover="dropdown" data-delay="1000"
                                data-close-others="true">
                            Actions
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <a href="#">
                                    <i class="icon-bell"></i> Hoạt đông</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light portlet-fit portlet-form ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-red"></i>
                                <span class="caption-subject font-red sbold uppercase">Trang chủ</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                    <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                                        <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                    <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                        <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
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
                                                <div class="form-group input-group">
                                                    <label class="control-label col-md-2 text-center" for="txtAddr">Tìm kiếm <?php echo $type; ?> theo id:
                                                        <span class="required"></span>
                                                    </label>
                                                    <div class="col-md-3">
                                                        <input type="number" value="<?php echo @$_GET['id']; ?>"
                                                               class="number_id form-control" min="1"/>
                                                    </div>
                                                </div>
                                                <div class="form-group input-group">
                                                    <label class="control-label col-md-2 text-center" for="txtAddr">
                                                        <span class="required"></span>
                                                    </label>
                                                    <div class="col-md-3">
                                                        <input type="submit" value="Tìm" class="fint_id btn btn-info"/>
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
                                                    <div class="form-group input-group">
                                                        <label class="control-label col-md-2 text-center" for="txtAddr">Name
                                                            <span class="required"></span>
                                                        </label>
                                                        <div class="col-md-3 edit-input-content">
                                                            <input class="input form-control" type="text" id="name"
                                                                   value="<?php echo $row["name"]; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <label class="label" for="txtAddr">Title</label>
                                                        <div class="edit-input-content">
                                                            <script LANGUAGE="JavaScript">
                                                                function CountLeft(field, count, max) {
                                                                    if (field.value.length > max)
                                                                        field.value = field.value.substring(0, max);
                                                                    else
                                                                        count.value = max - field.value.length;
                                                                }
                                                            </script>
                                                            <form>
                                                                <div class="form-group input-group">
                                                                    <label class="control-label col-md-2 text-center" for="txtAddr">
                                                                        <span class="required"></span>
                                                                    </label>
                                                                    <div class="col-md-3 edit-input-content">
                                                                        <input name="fname" class="title form-control" type="text"
                                                                               id="title fname"
                                                                               value="<?php echo $row["title"]; ?>"
                                                                               onKeyDown="CountLeft(this.form.fname, this.form.left, 70);"
                                                                               onKeyUp="CountLeft(this.form.fname, this.form.left, 70);"/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group input-group">
                                                                    <label class="control-label col-md-2 text-center" for="txtAddr">
                                                                        <span class="required"></span>
                                                                    </label>
                                                                    <div class="col-md-3 edit-input-content">
                                                                        <input readonly class="count form-control" type="text" name="left"
                                                                               size=3
                                                                               maxlength=3
                                                                               value="<?php echo $count; ?>"
                                                                               disabled="disabled"/>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="form-group input-group">
                                                        <label class="control-label col-md-2 text-center" for="txtAddr">Desception
                                                            <span class="required"></span>
                                                        </label>
                                                        <div class="col-md-3 edit-input-content">
                                                            <input class="input form-control" type="text" id="description"
                                                                   value="<?php echo $row["description"]; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group input-group">
                                                        <label class="control-label col-md-2 text-center" for="txtAddr">Alt ảnh
                                                            <span class="required"></span>
                                                        </label>
                                                        <div class="col-md-3 edit-input-content">
                                                            <input class="input form-control" type="text" id="alt_anh"
                                                                   value="<?php echo $row["alt_anh"]; ?>"/>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="type" id="type"
                                                           value="<?php echo $type; ?>"/>
                                                    <div class="form-group input-group">
                                                        <label class="control-label col-md-2 text-center" for="txtAddr">
                                                            <span class="required"></span>
                                                        </label>
                                                        <div class="col-md-3 edit-input-content">
                                                            <input type="submit" value="Update" class="update_content btn btn-info"/>
                                                        </div>
                                                    </div>
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
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
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
            <div class="menu-r">
                <div class="wapper">
                    <div class="edit-list">
                        <div class="form-group">
                            <label class="control-label col-md-2 text-center" for="txtAddr">Nhập Domain
                                <span class="required"></span>
                            </label>
                            <div class="col-md-3 edit-input-content">
                                <input class="input form-control" type="text" id="domain" value="<?php echo $domain2; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 text-center" for="txtAddr">Nhập Domain Name
                                <span class="required"></span>
                            </label>
                            <div class="col-md-3 edit-input-content">
                                <input class="input form-control" type="text" id="name_domain" value="<?php echo $name_domain2; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 text-center" for="txtAddr">
                                <span class="required"></span>
                            </label>
                            <div class="col-md-3 edit-input-content">
                                <input type="submit" value="Update" class="update_domain btn btn-info"/>
                            </div>
                        </div>

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
    </div>
</div>
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


<div class="page-footer">
    <div class="page-footer-inner"> 2016 &copy; Metronic Theme By
        <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
        <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes"
           title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase
            Metronic!</a>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->
    <!--[if lt IE 9]>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/respond.min.js"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/excanvas.min.js"></script>
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/jquery.blockui.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
            type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/morris/morris.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/morris/raphael-min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/counterup/jquery.waypoints.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/counterup/jquery.counterup.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/amcharts/amcharts/amcharts.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/amcharts/amcharts/serial.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/amcharts/amcharts/pie.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/amcharts/amcharts/radar.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/amcharts/amcharts/themes/light.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/amcharts/amcharts/themes/patterns.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/amcharts/amcharts/themes/chalk.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/amcharts/ammap/ammap.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/amcharts/amstockcharts/amstock.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/fullcalendar/fullcalendar.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/flot/jquery.flot.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/flot/jquery.flot.resize.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/flot/jquery.flot.categories.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/jquery.sparkline.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js"
            type="text/javascript"></script>

    <script src="<?php echo $home; ?>/css/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/datatables/datatables.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/pages/scripts/table-datatables-ajax.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?php echo $home; ?>/css/admin/assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo $home; ?>/css/admin/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="<?php echo $home; ?>/css/admin/assets/layouts/layout2/scripts/layout.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/layouts/layout2/scripts/demo.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/layouts/global/scripts/quick-sidebar.min.js"
            type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->

    <script src="<?php echo $home; ?>/css/admin/assets/global/plugins/select2/js/select2.full.min.js"
            type="text/javascript"></script>
    <script src="<?php echo $home; ?>/css/admin/assets/pages/scripts/components-select2.min.js"
            type="text/javascript"></script>
    <script>
        $('li').click(function () {
            $('.menu-current').html($(this).children().children(".title").html());
        })
        $('.change').click(function () {
            $('.menu-current').html($(this).children(".title").html());
        })
    </script>
</div>
</body>
</html>