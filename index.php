<?php
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];

include 'inc/connect.php';
$arr = unserialize(file_get_contents("up/index.txt"));
$title = $arr['title'];
$description = $arr['description'];
$meta_key = str_replace('%name%', '', $domain['meta_key']);
$meta_key = str_replace(' ,', ',', $meta_key);
$geturl = $home;
$anh_share = $home . '/images/image-share-download-lagu-mp3-terbaru-gratis.jpg';
include 'inc/header.php';
$folder1 = 'page';
$folder2 = 'index';
$file = 'index';
if ($domain['cache'] == 0) {
    $cachetime = 86400;
} else {
    $cachetime = 0;
}
include 'cache_top.php';
?>
<?php echo $domain['schema']; ?>
<section id="content" class="home-content animated">
    <section class="wrapper">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-content content animated">
                    <div class="col-md-8 col-sm-8 col-xs-12 content-col-left">
                        <div class="content-music">
                            <div class="text-seo-top" >
                                <h1 class="h1_top"><?php echo $arr['h1']; ?></h1>
                                <div class="content_top"><?php echo $arr['content_top']; ?></div>
                            </div>

                            <div class="content-box">
                                <div class="home-title">
                                    <h2 class="title"><a>TOP DOWNLOAD LAGU</a></h2>
                                </div>
                                <div class="row top-charts_row">
                                    <div class="owl-carousel playlist top-charts pull-left">
                                        <?php
                                        $offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `baihat` WHERE icon!='images/download-lagu-mp3-terbaru-gratis.png'");
                                        $offset_row = mysqli_fetch_object($offset_result);
                                        $offset = $offset_row->offset;
                                        if ($offset > 20) {
                                            $offset = $offset - 10;
                                        }
                                        $query_video = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh,views,author FROM `baihat` WHERE icon!='images/download-lagu-mp3-terbaru-gratis.png' LIMIT $offset,12");
                                        while ($row = mysqli_fetch_array($query_video)) {
                                            ?>
                                            <div class="item list">
                                                <div class="home-img">
                                                    <a href="<?php echo $home; ?>/lagu/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>"><img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
                                                        <span class="icon-play"></span>
                                                        <span class="listening"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo number_format($row['views']); ?></span></span>
                                                    </a>
                                                </div>
                                                <h3 class="music-name">
                                                    <a href="<?php echo $home; ?>/lagu/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
                                                </h3>
                                                <p class="single"><?php echo $row['author']; ?></p>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <?php
                                if (strpos($domain['all_cat'], '2') !== FALSE) {
                                    ?>
                                    <div class="home-title">
                                        <h2 class="title"><a href="<?php echo $home; ?>/album" title="ALBUM LAGU">ALBUM LAGU</a></h2>
                                    </div>
                                    <div class="playlist">
                                        <div class="row">
                                            <?php
                                            $offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `album` WHERE icon!='images/download-album-lagu-mp3-terbaru-gratis.png'");
                                            $offset_row = mysqli_fetch_object($offset_result);
                                            $offset = $offset_row->offset;
                                            if ($offset > 20) {
                                                $offset = $offset - 10;
                                            }
                                            $query_video = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh,views,author FROM `album` WHERE icon!='images/download-album-lagu-mp3-terbaru-gratis.png' LIMIT $offset,10");
                                            while ($row = mysqli_fetch_array($query_video)) {
                                                ?>
                                                <div class="col-md-5ths col-sm-5ths col-xs-6 list">
                                                    <div class="home-img">
                                                        <a href="<?php echo $home; ?>/playlist/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
                                                            <img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
                                                            <span class="icon-play"></span>
                                                            <span class="listening"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo number_format($row['views']); ?></span></span>
                                                        </a>
                                                    </div>
                                                    <h3 class="music-name">
                                                        <a href="<?php echo $home; ?>/playlist/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
                                                    </h3>
                                                    <p class="single"><?php echo $row['author']; ?></p>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class="home-title">
                                    <h2 class="title"><a href="<?php echo $home; ?>/video" title="DOWNLOAD VIDEO LAGU">DOWNLOAD VIDEO LAGU</a></h2>
                                </div>
                                <div class="playlist rows">
                                    <div class="row">
                                        <?php
                                        $offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `video` WHERE cat='Lagu Gratis' AND icon!='images/download-video-lagu-terbaru-gratis.png'");
                                        $offset_row = mysqli_fetch_object($offset_result);
                                        $offset = $offset_row->offset;
                                        if ($offset > 20) {
                                            $offset = $offset - 8;
                                        }
                                        $query_video = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh,views,duration,author FROM `video` WHERE cat='Lagu Gratis' AND icon!='images/download-video-lagu-terbaru-gratis.png' LIMIT $offset,8");
                                        while ($row = mysqli_fetch_array($query_video)) {
                                            ?>
                                            <div class="col-md-3 col-sm-3 col-xs-6 list">
                                                <div class="home-img">
                                                    <a href="<?php echo $home; ?>/video/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
                                                        <img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
                                                        <span class="icon-play"></span>
                                                        <span class="views"><span class="icon-view icon-nct"></span><span class="counter"><?php echo number_format($row['views']); ?></span></span>
                                                        <span class="timing"><?php echo $row['duration']; ?></span>
                                                    </a>
                                                </div>
                                                <h3 class="video-name">
                                                    <a href="<?php echo $home; ?>/video/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
                                                </h3>
                                                <p class="video-single"><?php echo $row['author']; ?></p>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="home-title">
                                    <h2 class="title"><a href="<?php echo $home; ?>/lagu" title="DOWNLOAD LAGU MP3">DOWNLOAD LAGU MP3</a></h2>
                                </div>
                                <div class="playlist">
                                    <div class="row">
                                        <?php
                                        $offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `baihat` WHERE icon!='images/download-lagu-mp3-terbaru-gratis.png'");
                                        $offset_row = mysqli_fetch_object($offset_result);
                                        $offset = $offset_row->offset;
                                        if ($offset > 20) {
                                            $offset = $offset - 10;
                                        }
                                        $query_video = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh,views,author FROM `baihat` WHERE icon!='images/download-lagu-mp3-terbaru-gratis.png' LIMIT $offset,12");
                                        while ($row = mysqli_fetch_array($query_video)) {
                                            ?>
                                            <div class="col-md-6 col-sm-6 col-xs-12 list">
                                                <div class="list-content-music">
                                                    <div class="home-img home-list-img">
                                                        <a href="<?php echo $home; ?>/lagu/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
                                                            <img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
                                                            <span class="icon-play"></span>
                                                        </a>
                                                    </div>
                                                    <h3 class="music-name list-music-name">
                                                        <a href="<?php echo $home; ?>/lagu/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
                                                    </h3>
                                                    <p class="single list-music-singer"><?php echo $row['author']; ?></p>
                                                    <span class="listening listening-musics"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo number_format($row['views']); ?></span></span>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                
                                <div class="home-title">
                                    <h2 class="title"><a href="<?php echo $home; ?>/video" title="DOWNLOAD VIDEO TERBARU">DOWNLOAD VIDEO TERBARU</a></h2>
                                </div>
                                <div class="playlist rows">
                                    <div class="row">
                                        <?php
                                        $offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `video` WHERE icon!='images/download-video-lagu-terbaru-gratis.png'");
                                        $offset_row = mysqli_fetch_object($offset_result);
                                        $offset = $offset_row->offset;
                                        if ($offset > 20) {
                                            $offset = $offset - 8;
                                        }
                                        $query_video = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh,views,duration,author FROM `video` WHERE icon!='images/download-video-lagu-terbaru-gratis.png' ORDER BY id DESC LIMIT $offset,8");
                                        while ($row = mysqli_fetch_array($query_video)) {
                                            ?>
                                            <div class="col-md-3 col-sm-3 col-xs-6 list">
                                                <div class="home-img">
                                                    <a href="<?php echo $home; ?>/video/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
                                                        <img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
                                                        <span class="icon-play"></span>
                                                        <span class="views"><span class="icon-view icon-nct"></span><span class="counter"><?php echo number_format($row['views']); ?></span></span>
                                                        <span class="timing"><?php echo $row['duration']; ?></span>
                                                    </a>
                                                </div>
                                                <h3 class="video-name">
                                                    <a href="<?php echo $home; ?>/video/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
                                                </h3>
                                                <p class="video-single"><?php echo $row['author']; ?></p>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="home-title hidden-xs">
                                    <h2 class="title"><a href="<?php echo $home; ?>/para-artis" title="ARTIS/PENYANYI">ARTIS/PENYANYI</a></h2>
                                </div>
                                <div class="playlist content-artist hidden-xs">
                                    <div class="row row-artist">
                                        <?php
                                        $offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `nghesi` WHERE country='Indonesia' AND icon!='images/artis-lagu.png'");
                                        $offset_row = mysqli_fetch_object($offset_result);
                                        $offset = $offset_row->offset;
                                        if ($offset > 20) {
                                            $offset = $offset - 10;
                                        }
                                        $query_video = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh FROM `nghesi` WHERE country='Indonesia' AND icon!='images/artis-lagu.png' LIMIT $offset,9");
                                        while ($row = mysqli_fetch_array($query_video)) {
                                            ?>
                                            <div class="col-md-3 col-sm-3 col-xs-6 list artist-box">
                                                <a class="artist-link" href="<?php echo $home; ?>/artis/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
                                                    <div class="artist-img home-img"><img alt="<?php echo $row['alt_anh']; ?>" src="<?php echo $home; ?>/<?php echo $row['icon']; ?>"></div>
                                                    <h3 class="artist-name"><?php echo $row['name']; ?></h3>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
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
