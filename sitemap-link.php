<?php
header('Content-Type: text/xml');
if (empty($_GET['p'])) {
    $p = 1;
} else {
    $p = $_GET['p'];
}
$type = $_GET['type'];
$folder1 = 'sitemap';
$folder2 = 'link-' . $type . '-' . $p;
$file = $p;
$cachetime = 86400;
include 'cache_top_sitemap.php';
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
include_once("inc/connect.php");
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
            <?php
            if ($type == 'lagu') {
                $offset_result = mysqli_query($conn, "SELECT COUNT(id) AS `offset` FROM `baihat`");
                $offset_row = mysqli_fetch_object($offset_result);
                $total = $offset_row->offset;

                $show = 1000;
                $pg = ceil($total / $show);
                if ($p > $pg) {
                    header('Location: ' . $home);
                    exit();
                }
                $j = ($p - 1) * $show;

//    echo $p . ' - ' . $total . ' - ' . $pg;

                if ($p > 0) {

                    if ($p == 1) {
                        ?>
                <url>
                    <loc><?php echo $home; ?></loc>
                    <lastmod>2018-02-06T11:11:49+07:00</lastmod>                
                    <changefreq>daily</changefreq>                
                    <priority>0.5</priority>
                </url>
                <url>
                    <loc><?php echo $home; ?>/lagu</loc>
                    <lastmod>2018-02-06T11:11:49+07:00</lastmod>                
                    <changefreq>daily</changefreq>                
                    <priority>0.5</priority>
                </url>
                <url>
                    <loc><?php echo $home; ?>/video</loc>
                    <lastmod>2018-02-06T11:11:49+07:00</lastmod>                
                    <changefreq>daily</changefreq>                
                    <priority>0.5</priority>
                </url>
                <url>
                    <loc><?php echo $home; ?>/peringkat-lagu</loc>
                    <lastmod>2018-02-06T11:11:49+07:00</lastmod>                
                    <changefreq>daily</changefreq>                
                    <priority>0.5</priority>
                </url>
                <url>
                    <loc><?php echo $home; ?>/para-artis</loc>
                    <lastmod>2018-02-06T11:11:49+07:00</lastmod>                
                    <changefreq>daily</changefreq>                
                    <priority>0.5</priority>
                </url>
                <url>
                    <loc><?php echo $home; ?>/para-artis/indo</loc>
                    <lastmod>2018-02-06T11:11:49+07:00</lastmod>                
                    <changefreq>daily</changefreq>                
                    <priority>0.5</priority>
                </url>
                <url>
                    <loc><?php echo $home; ?>/para-artis/us-uk</loc>
                    <lastmod>2018-02-06T11:11:49+07:00</lastmod>                
                    <changefreq>daily</changefreq>                
                    <priority>0.5</priority>
                </url>
                <url>
                    <loc><?php echo $home; ?>/para-artis/korea</loc>
                    <lastmod>2018-02-06T11:11:49+07:00</lastmod>                
                    <changefreq>daily</changefreq>                
                    <priority>0.5</priority>
                </url>
                <?php
            }
            if ($total <= $show) {
                $query = mysqli_query($conn, "SELECT id,url FROM `baihat` ORDER BY id ASC limit $total");
                while ($baihat = mysqli_fetch_array($query)) {
                    ?>
                    <url>
                        <loc><?php echo $home . '/lagu/' . $baihat['id'] . '/' . $baihat['url'] . '.html'; ?></loc>
                        <lastmod>2018-02-06T11:11:49+07:00</lastmod>
                        <changefreq>daily</changefreq>
                        <priority>0.5</priority>
                    </url>
                    <?php
                }
            } else {
                $query = mysqli_query($conn, "SELECT id,url FROM `baihat` ORDER BY id ASC limit $j,$show");
                while ($baihat = mysqli_fetch_array($query)) {
                    ?>
                    <url>
                        <loc><?php echo $home . '/lagu/' . $baihat['id'] . '/' . $baihat['url'] . '.html'; ?></loc>
                        <lastmod>2018-02-06T11:11:49+07:00</lastmod>                
                        <changefreq>daily</changefreq>                
                        <priority>0.5</priority>
                    </url>
                    <?php
                }
            }
        }
    }

    if ($type == 'album') {
        $offset_result = mysqli_query($conn, "SELECT COUNT(id) AS `offset` FROM `album`");
        $offset_row = mysqli_fetch_object($offset_result);
        $total = $offset_row->offset;

        $show = 1000;
        $pg = ceil($total / $show);
        if ($p > $pg) {
            header('Location: ' . $home);
            exit();
        }
        $j = ($p - 1) * $show;

//    echo $p . ' - ' . $total . ' - ' . $pg;

        if ($p > 0) {
            if ($total <= $show) {
                $query = mysqli_query($conn, "SELECT id,url FROM `album` ORDER BY id ASC limit $total");
                while ($album = mysqli_fetch_array($query)) {
                    ?>
                    <url>
                        <loc><?php echo $home . '/playlist/' . $album['id'] . '/' . $album['url'] . '.html'; ?></loc>
                        <lastmod>2018-02-06T11:11:49+07:00</lastmod>
                        <changefreq>daily</changefreq>
                        <priority>0.5</priority>
                    </url>
                    <?php
                }
            } else {
                $query = mysqli_query($conn, "SELECT id,url FROM `album` ORDER BY id ASC limit $j,$show");
                while ($album = mysqli_fetch_array($query)) {
                    ?>
                    <url>
                        <loc><?php echo $home . '/playlist/' . $album['id'] . '/' . $album['url'] . '.html'; ?></loc>
                        <lastmod>2018-02-06T11:11:49+07:00</lastmod>                
                        <changefreq>daily</changefreq>                
                        <priority>0.5</priority>
                    </url>
                    <?php
                }
            }
        }
    }

    if ($type == 'video') {
        $offset_result = mysqli_query($conn, "SELECT COUNT(id) AS `offset` FROM `video`");
        $offset_row = mysqli_fetch_object($offset_result);
        $total = $offset_row->offset;

        $show = 1000;
        $pg = ceil($total / $show);
        if ($p > $pg) {
            header('Location: ' . $home);
            exit();
        }
        $j = ($p - 1) * $show;

//    echo $p . ' - ' . $total . ' - ' . $pg;

        if ($p > 0) {
            if ($total <= $show) {
                $query = mysqli_query($conn, "SELECT id,url FROM `video` ORDER BY id ASC limit $total");
                while ($video = mysqli_fetch_array($query)) {
                    ?>
                    <url>
                        <loc><?php echo $home . '/video/' . $video['id'] . '/' . $video['url'] . '.html'; ?></loc>
                        <lastmod>2018-02-06T11:11:49+07:00</lastmod>
                        <changefreq>daily</changefreq>
                        <priority>0.5</priority>
                    </url>
                    <?php
                }
            } else {
                $query = mysqli_query($conn, "SELECT id,url FROM `video` ORDER BY id ASC limit $j,$show");
                while ($video = mysqli_fetch_array($query)) {
                    ?>
                    <url>
                        <loc><?php echo $home . '/video/' . $video['id'] . '/' . $video['url'] . '.html'; ?></loc>
                        <lastmod>2018-02-06T11:11:49+07:00</lastmod>                
                        <changefreq>daily</changefreq>                
                        <priority>0.5</priority>
                    </url>
                    <?php
                }
            }
        }
    }
    ?>
</urlset>
<?php
include 'cache_bot.php';
?>