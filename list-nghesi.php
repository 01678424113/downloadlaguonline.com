<?php
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];
$geturl = $home . '/para-artis';

$arr = unserialize(file_get_contents("up/list-nghesi.txt"));
$title = str_replace('%page%', '', $arr['title']);
$title = str_replace('%country%', '', $title);
$description = str_replace('%page%', '', $arr['description']);
$description = str_replace('%country%', '', $description);
$h1 = str_replace('%country%', '', $arr['h1']);
$content_top = str_replace('%page%', '', $arr['content_top']);
$content_top = str_replace('%country%', '', $content_top);

include 'inc/connect.php';
$meta_key = str_replace('%name%', '', $domain['meta_key']);
$meta_key = str_replace(' ,', ',', $meta_key);
$anh_share = $home . '/images/image-share-download-lagu-mp3-terbaru-gratis.jpg';
include 'inc/header.php';
$folder1 = 'page';
$folder2 = 'nghesi';
$file = 'list-nghesi';
if ($domain['cache'] == 0) {
    $cachetime = 86400;
} else {
    $cachetime = 0;
}
include 'cache_top.php';
?>
<section id="content" class="animated">
    <section class="content-music content-artist">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-content content content-artist content-artist-box animated">
                    <div class="col-md-8 col-sm-8 col-xs-12 content-col-left">
                        <div class="home-title">
                            <h2 class="title"><a href="<?php echo $home; ?>/para-artis/indo">Indo artis <i class="fa fa-angle-right"></i></a></h2>
                        </div>

                        <div class="artist-box playlist">
                            <div class="row">
                                <?php
                                $show = 10;
                                $offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `nghesi` WHERE id_country=1 AND icon!='images/artis-lagu.png'");
                                $offset_row = mysqli_fetch_object($offset_result);
                                $offset = $offset_row->offset;
                                if ($offset > 20) {
                                    $offset = $offset - $show;
                                }
                                $query = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh FROM `nghesi` WHERE id_country=1 AND icon!='images/artis-lagu.png' limit $offset,$show");
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <div class="col-md-5ths col-sm-5ths col-xs-6">
                                        <a class="artist-link" href="<?php echo $home; ?>/artis/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
                                            <div class="artist-img"><img alt="<?php echo $row['alt_anh']; ?>" src="<?php echo $home; ?>/<?php echo $row['icon']; ?>"></div>
                                            <h3 class="artist-name"><?php echo $row['name']; ?></h3>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="home-title">
                            <h2 class="title"><a href="<?php echo $home; ?>/para-artis/us-uk">US - UK artis <i class="fa fa-angle-right"></i></a></h2>
                        </div>

                        <div class="artist-box playlist">
                            <div class="row">
                                <?php
                                $offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `nghesi` WHERE id_country=2 AND icon!='images/artis-lagu.png'");
                                $offset_row = mysqli_fetch_object($offset_result);
                                $offset = $offset_row->offset;
                                if ($offset > 20) {
                                    $offset = $offset - $show;
                                }
                                $query = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh FROM `nghesi` WHERE id_country=2 AND icon!='images/artis-lagu.png' limit $offset,$show");
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <div class="col-md-5ths col-sm-5ths col-xs-6">
                                        <a class="artist-link" href="<?php echo $home; ?>/artis/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
                                            <div class="artist-img"><img alt="<?php echo $row['alt_anh']; ?>" src="<?php echo $home; ?>/<?php echo $row['icon']; ?>"></div>
                                            <h3 class="artist-name"><?php echo $row['name']; ?></h3>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="home-title">
                            <h2 class="title"><a href="<?php echo $home; ?>/para-artis/korea">Korea artis <i class="fa fa-angle-right"></i></a></h2>
                        </div>

                        <div class="artist-box playlist">
                            <div class="row">
                                <?php
                                $offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `nghesi` WHERE id_country=3 AND icon!='images/artis-lagu.png'");
                                $offset_row = mysqli_fetch_object($offset_result);
                                $offset = $offset_row->offset;
                                if ($offset > 20) {
                                    $offset = $offset - $show;
                                }
                                $query = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh FROM `nghesi` WHERE id_country=3 AND icon!='images/artis-lagu.png' limit $offset,$show");
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <div class="col-md-5ths col-sm-5ths col-xs-6">
                                        <a class="artist-link" href="<?php echo $home; ?>/artis/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
                                            <div class="artist-img"><img alt="<?php echo $row['alt_anh']; ?>" src="<?php echo $home; ?>/<?php echo $row['icon']; ?>"></div>
                                            <h3 class="artist-name"><?php echo $row['name']; ?></h3>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-8 col-xs-12 content-col-right">
                        <div class="sidebar">
                            <?php
                            include 'inc/sidebar.php';
                            ?>
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
