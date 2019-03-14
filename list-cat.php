<?php
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];
if (empty($_GET['cat'])) {
    header("Location:$home");
}
$cat_list = $_GET['cat'];
if (empty($_GET['p'])) {
    $p = 1;
    $geturl = $home . '/category/' . $cat_list;
} else {
    $p = $_GET['p'];
    $geturl = $home . '/category/' . $cat_list . '/' . $p;
}

if ($cat_list == 'pop') {
    $cat_id = 1;
    $cat_name = 'Pop';
}
if ($cat_list == 'dangdut') {
    $cat_id = 2;
    $cat_name = 'Dangdut';
}
if ($cat_list == 'rb') {
    $cat_id = 3;
    $cat_name = 'R&B';
}
if ($cat_list == 'kpop') {
    $cat_id = 4;
    $cat_name = 'Kpop';
}
if ($cat_list == 'indo') {
    $cat_id = 5;
    $cat_name = 'Indo';
}
if ($cat_list == 'dance') {
    $cat_id = 6;
    $cat_name = 'Dance';
}
if ($cat_list == 'rock') {
    $cat_id = 7;
    $cat_name = 'Rock';
}
if ($cat_list == 'remix') {
    $cat_id = 8;
    $cat_name = 'Remix';
}
if ($cat_list == 'hip-hop') {
    $cat_id = 9;
    $cat_name = 'Hip Hop';
}
if ($cat_list == 'jazz') {
    $cat_id = 10;
    $cat_name = 'Jazz';
}
if ($cat_list == 'cover') {
    $cat_id = 11;
    $cat_name = 'Cover';
}
if ($cat_list == 'ska') {
    $cat_id = 12;
    $cat_name = 'SKA';
}
if ($cat_list == 'anak-anak') {
    $cat_id = 13;
    $cat_name = 'Anak Anak';
}
if ($cat_list == 'ost') {
    $cat_id = 14;
    $cat_name = 'OST';
}
if ($cat_list == 'rap') {
    $cat_id = 15;
    $cat_name = 'Rap';
}
if ($cat_list == 'hip-hop') {
    $l_cat = "up/genre-hiphop.txt";
} elseif ($cat_list == 'anak-anak') {
    $l_cat = "up/genre-anak.txt";
} else {
    $l_cat = "up/genre-$cat_list.txt";
}
if(file_exists($l_cat)){
    $arr = unserialize(file_get_contents($l_cat));
}else{
    $arr = unserialize(file_get_contents("up/genre-all.txt"));
}
if (empty($_GET['p'])) {
    $title = str_replace('%page%', '', $arr['title']);
    $description = str_replace('%page%', '', $arr['description']);
    $title = str_replace('%name%', $cat_name, $title);
    $description = str_replace('%name%', $cat_name, $description);
} else {
    if ($_GET['p'] == 1) {
        $title = str_replace('%page%', '' . $p, $arr['title']);
        $title = strim(str_replace('  ', ' ', $title));
        $description = str_replace('%page%', '' . $p, $arr['description']);
        $description = strim(str_replace('  ', ' ', $description));
        $title = str_replace('%name%', $cat_name, $title);
        $description = str_replace('%name%', $cat_name, $description);
    } else {
        $title = str_replace('%page%', 'halaman ' . $p, $arr['title']);
        $description = str_replace('%page%', 'halaman ' . $p, $arr['description']);
        $title = str_replace('%name%', $cat_name, $title);
        $description = str_replace('%name%', $cat_name, $description);
    }
}
$h1 = str_replace('%name%', $cat_name, $arr['h1']);
$content_top = str_replace('%name%', $cat_name, $arr['content_top']);
include 'inc/connect.php';
$meta_key = str_replace('%name%', '', $domain['meta_key']);
$meta_key = str_replace(' ,', ',', $meta_key);
$anh_share = $home . '/images/image-share-download-lagu-mp3-terbaru-gratis.jpg';
include 'inc/header.php';
$folder1 = 'page';
$folder2 = $cat_list;
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
            <div class="col-md-12 col-sm-12 col-xs-12 content animated">
                <div class="content-music">
                    <div class="text-seo-top" >
                        <h1 class="h1_top"><?php echo $h1; ?></h1>
                        <div class="content_top"><?php echo $content_top; ?></div>
                    </div>
                    <div class="content-box"> 
                        <div class="home-title">
                            <h3 class="title">LAGU <?php echo mb_strtoupper($cat_name, 'utf8'); ?></h3>
                        </div>
                        <div class="playlist">
                            <div class="row">
                                <?php
                                $offset_result = mysqli_query($conn, "SELECT COUNT(id) AS `offset` FROM `baihat` WHERE id_cat=$cat_id");
                                $offset_row = mysqli_fetch_object($offset_result);
                                $total = $offset_row->offset;
                                if ($p > 0) {
                                    $show = 15;
                                    if ($total <= $show) {
                                        $query = mysqli_query($conn, "SELECT id,name,title,url,icon,alt_anh,views,author FROM `baihat` WHERE id_cat=$cat_id ORDER BY views DESC limit $total");
                                        while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                            <div class="col-md-6 col-sm-6 col-xs-12 list">
                                                <div class="list-content-music">
                                                    <a href="<?php echo $home; ?>/lagu/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
                                                        <div class="home-img home-list-img">
                                                            <img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
                                                            <span class="icon-play"></span>
                                                        </div>
                                                        <span class="music-name list-music-name"><?php echo $row['name']; ?></span>
                                                        <span class="single list-music-singer"><?php echo $row['author']; ?></span>
                                                        <span class="listening listening-musics"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo number_format($row['views']); ?></span></span>
                                                    </a>
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
                                        $query = mysqli_query($conn, "SELECT id,name,title,url,icon,alt_anh,views,author FROM `baihat` WHERE id_cat=$cat_id ORDER BY views DESC limit $j,$show");
                                        while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                            <div class="col-md-6 col-sm-6 col-xs-12 list">
                                                <div class="list-content-music">
                                                    <a href="<?php echo $home; ?>/lagu/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
                                                        <div class="home-img home-list-img">
                                                            <img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
                                                            <span class="icon-play"></span>
                                                        </div>
                                                        <span class="music-name list-music-name"><?php echo $row['name']; ?></span>
                                                        <span class="single list-music-singer"><?php echo $row['author']; ?></span>
                                                        <span class="listening listening-musics"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo number_format($row['views']); ?></span></span>
                                                    </a>
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
                                                $page = $home . '/category/' . $cat_list;
                                            } else {
                                                $page = '' . $home . '/category/' . $cat_list . '/' . ($g - 1);
                                            }
                                            print('<a href="' . $page . '" class="btn">&laquo;</a> ');
                                        } else
                                            print("");
                                        for ($g; ($g < $en); $g++) {
                                            if ($g == "1" and $g != $p) {
                                                print('<a href="' . $home . '/category/' . $cat_list . '" class="btn">1</a> ');
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
                                                    print('<a href="' . $home . '/category/' . $cat_list . '/' . $xx . '" class="btn">' . $g . '</a> ');
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
                                            print('<a href="' . $home . '/category/' . $cat_list . '/' . $xx . '" class="btn">&raquo;</a>');
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
        </div>
    </section>
</section>
<?php
include 'cache_bot.php';
include 'inc/footer.php';
?>
