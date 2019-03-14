<?php
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];
$meta_key = str_replace('%name%', '', $domain['meta_key']);
$meta_key = str_replace(' ,', ',', $meta_key);

$arr = unserialize(file_get_contents("up/erro404.txt"));
$title = $arr['title'];
$description = $arr['description'];
include 'inc/connect.php';
include_once 'function/function_geturl.php';
$geturl = getCurrentPageURL();
$anh_share = $home . '/images/image-share-download-lagu-mp3-terbaru-gratis.jpg';
include 'inc/header.php';
$folder1 = 'page';
$folder2 = 404;
$file = 404;
if ($domain['cache'] == 0) {
    $cachetime = 86400;
} else {
    $cachetime = 0;
}
include 'cache_top.php';
?>
<section id="content" class="home-content animated">
    <section class="wrapper">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-content content animated">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="thumbnail_404">
                            <img alt="Halaman tidak ditemukan - 404" src="<?php echo $home; ?>/images/404.png" >
                        </div>
                        <div class="cont_404">
                            <p class="title-404">Halaman yang Anda minta tidak dapat ditemukan</p>
                            <p class="text-guide">Silahkan gunakan fitur pencarian diatas. Atau kembali ke homepage <a href="<?php echo $home; ?>"><?php echo $namehome; ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?php
include 'cache_bot.php';
include 'inc/footer.php';
?>
