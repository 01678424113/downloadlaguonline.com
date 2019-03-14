<?php
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];

if (empty($_GET['country'])) {
    header("Location:$home");
} else {
    $country = $_GET['country'];
}

if (empty($_GET['p'])) {
    $p = 1;
    $geturl = "$home/para-artis/$country";
} else {
    $p = $_GET['p'];
    $geturl = "$home/para-artis/$country/$p";
}
if ($country == 'indo') {
    $id_country = 1;
} elseif ($country == 'us-uk') {
    $id_country = 2;
} else {
    $id_country = 3;
}
$arr = unserialize(file_get_contents("up/list-nghesi.txt"));
if (empty($_GET['p'])) {
    $title = str_replace('%page%', '', $arr['title']);
    $description = str_replace('%page%', '', $arr['description']);
} else {
    if ($_GET['p'] == 1) {
        $title = str_replace('%page%', '', $arr['title']);
        $title = strim(str_replace('  ', ' ', $title));
        $description = str_replace('%page%', '', $arr['description']);
        $description = strim(str_replace('  ', ' ', $description));
    } else {
        $title = str_replace('%page%', 'halaman ' . $p, $arr['title']);
        $description = str_replace('%page%', 'halaman ' . $p, $arr['description']);
    }
}
$title = str_replace('%country%', ucfirst($country), $title);
$description = str_replace('%country%', ucfirst($country), $description);
$h1 = str_replace('%country%', ucfirst($country), $arr['h1']);
$content_top = str_replace('%country%', ucfirst($country), $arr['content_top']);

include 'inc/connect.php';
$meta_key = str_replace('%name%', '', $domain['meta_key']);
$meta_key = str_replace(' ,', ',', $meta_key);
$anh_share = $home . '/images/image-share-download-lagu-mp3-terbaru-gratis.jpg';
include 'inc/header.php';
$folder1 = 'page';
$folder2 = 'list-nghesi_' . $country;
$file = $p;
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
                            <h2 class="title"><?php echo $country; ?> Artis <i class="fa fa-angle-right"></i></h2>
                        </div>
                        <div class="artist-box playlist">
                            <div class="row">
                                <?php
                                $offset_result = mysqli_query($conn, "SELECT COUNT(id) AS `offset` FROM `nghesi` WHERE id_country = $id_country");
                                $offset_row = mysqli_fetch_object($offset_result);
                                $total = $offset_row->offset;
                                if ($p > 0) {
                                    $show = 50;
                                    if ($total <= $show) {
                                        $query = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh FROM `nghesi` WHERE id_country = $id_country ORDER BY views DESC limit $total");
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
                                    } elseif ($total > $show) {
                                        $pg = ceil($total / $show);
                                        if ($p > $pg && $p != 1)
                                            $p = $pg;
                                        if ($p < 1)
                                            $p = 1;
                                        $j = ($p - 1) * $show;
                                        $query = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh FROM `nghesi` WHERE id_country = $id_country ORDER BY views DESC limit $j,$show");
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
                                                $page = $home . '/para-artis/' . $country;
                                            } else {
                                                $page = '' . $home . '/para-artis/' . $country . '/' . ($g - 1);
                                            }
                                            print('<a href="' . $page . '" class="btn">&laquo;</a> ');
                                        } else
                                            print("");
                                        for ($g; ($g < $en); $g++) {
                                            if ($g == "1" and $g != $p) {
                                                print('<a href="' . $home . '/para-artis/' . $country . '" class="btn">1</a> ');
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
                                                    print('<a href="' . $home . '/para-artis/' . $country . '/' . $xx . '" class="btn">' . $g . '</a> ');
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
                                            print('<a href="' . $home . '/para-artis/' . $country . '/' . $xx . '" class="btn">&raquo;</a>');
                                        } else
                                            print(' ');
                                        echo '</center></div>';
                                    }
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
