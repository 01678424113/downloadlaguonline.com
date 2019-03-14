<?php
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];
if (empty($_GET['p'])) {
    $p = 1;
    $geturl = $home . '/lagu';
} else {
    $p = $_GET['p'];
    $geturl = $home . '/lagu/' . $p;
}
$arr = unserialize(file_get_contents("up/list-baihat.txt"));
if (empty($_GET['p'])) {
    $title = str_replace('%page%', '', $arr['title']);
    $title = str_replace('  ', ' ', $title);
    $description = $arr['description'];
    $content_top = $arr['content_top'];
} else {
    if ($_GET['p'] == 1) {
        $title = str_replace('%page%', '', $arr['title']);
        $title = str_replace('  ', ' ', $title);
        $description = $arr['description'];
        $content_top = $arr['content_top'];
    } else {
        $title = str_replace('%page%', 'halaman ' . $p, $arr['title']);
        $title = str_replace('  ', ' ', $title);
        $description = $arr['description'];
        $content_top = $arr['content_top'];
    }
}
include 'inc/connect.php';
$meta_key = str_replace('%name%', '', $domain['meta_key']);
$meta_key = str_replace(' ,', ',', $meta_key);
$anh_share = $home . '/images/image-share-download-lagu-mp3-terbaru-gratis.jpg';
include 'inc/header.php';
$folder1 = 'page';
$folder2 = 'baihat';
$file = $p;
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
                    <div class="col-md-8 col-sm-8 col-xs-12 content-col-left">
                        <div class="content-music">
                            <div class="text-seo-top" >
                                <h1 class="h1_top"><?php echo $arr['h1']; ?></h1>
                                <div class="content_top"><?php echo $content_top; ?></div>
                            </div>
                            
                            <div class="content-box"> 
                                <div class="home-title">
                                    <h2 class="title">LAGU</h2>
                                </div>
                                <div class="playlist">
                                    <div class="row">
                                        <?php
                                        $offset_result = mysqli_query($conn, "SELECT COUNT(id) AS `offset` FROM `baihat`");
                                        $offset_row = mysqli_fetch_object($offset_result);
                                        $total = $offset_row->offset;
                                        if ($p > 0) {
                                            $show = 20;
                                            if ($total <= $show) {
                                                $query = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh,views,author FROM `baihat` ORDER BY views DESC limit $total");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 list">
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
                                            } elseif ($total > $show) {
                                                $pg = ceil($total / $show);
                                                if ($p > $pg && $p != 1)
                                                    $p = $pg;
                                                if ($p < 1)
                                                    $p = 1;
                                                $j = ($p - 1) * $show;
												$query = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh,views,author FROM `baihat` ORDER BY views DESC limit $j,$show");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 list">
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
                                            }
                                            if ($total > $show) {
                                                echo '<div class="page"><center>';
                                                $sc = 6;
                                                $st = floor($p / $sc) * $sc;
                                                $en = $st + $sc;
                                                $g = $st;
                                                if ($g < "2")
                                                    print('');
                                                else
                                                if ($g > "0") {
                                                    if ($g - 1 == 1) {
                                                        $page = $home . '/lagu';
                                                    } else {
                                                        $page = '' . $home . '/lagu/' . ($g - 1);
                                                    }
                                                    print('<a href="' . $page . '" class="btn">&laquo;</a> ');
                                                } else
                                                    print("");
                                                for ($g; ($g < $en); $g++) {
                                                    if ($g == "1" and $g != $p) {
                                                        print('<a href="' . $home . '/lagu" class="btn">1</a> ');
                                                    } elseif ($g == "1" and $g == $p) {
                                                        print('<b class="btn">1</b> ');
                                                    } elseif ($g == $p) {
                                                        print(' <b class="btn" >' . $g . '</b> ');
                                                    } elseif ($g <= $pg) {
                                                        if ($g > "0") {
                                                            if ($p != "1") {
                                                                $xx = "$g";
                                                            } else {
                                                                $xx = $g;
                                                            }
                                                            print('<a href="' . $home . '/lagu/' . $xx . '" class="btn">' . $g . '</a> ');
                                                        }
                                                    } else {
                                                        print(' ');
                                                    }
                                                }//end for
                                                if ($g <= $pg) {
                                                    if (empty($_GET['p'])) {
                                                        $xx = $g;
                                                    } else {
                                                        $xx = '' . $g;
                                                    }
                                                    print('<a href="' . $home . '/lagu/' . $xx . '" class="btn">&raquo;</a>');
                                                } else
                                                    print(' ');
                                                echo '</center></div>';
                                            }
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
