<?php
header('Content-Type: text/xml');
$folder1 = 'sitemap';
$folder2 = 'index';
$file = 'index';
$cachetime = 86400;

include 'cache_top_sitemap.php';
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
include_once("inc/connect.php");

$offset_result_baihat = mysqli_query($conn, "SELECT COUNT(id) AS `offset` FROM `baihat`");
$offset_row = mysqli_fetch_object($offset_result_baihat);
$total = $offset_row->offset;
$show = 1000;
$pg = ceil($total / $show);
for ($i = 1; $i <= $pg; $i++) {
    ?>
    <sitemap>
        <loc><?php echo $home . '/sitemap-link/lagu/' . $i . '.xml'; ?></loc>
        <lastmod>2018-02-09T16:03:28+07:00</lastmod>
    </sitemap>
    <?php
}

$offset_result_album = mysqli_query($conn, "SELECT COUNT(id) AS `offset` FROM `album`");
$offset_row = mysqli_fetch_object($offset_result_album);
$total = $offset_row->offset;
$show = 1000;
$pg = ceil($total / $show);
for ($i = 1; $i <= $pg; $i++) {
    ?>
    <sitemap>
        <loc><?php echo $home . '/sitemap-link/album/' . $i . '.xml'; ?></loc>
        <lastmod>2018-02-09T16:03:28+07:00</lastmod>
    </sitemap>
    <?php
}

$offset_result_video = mysqli_query($conn, "SELECT COUNT(id) AS `offset` FROM `video`");
$offset_row = mysqli_fetch_object($offset_result_video);
$total = $offset_row->offset;
$show = 1000;
$pg = ceil($total / $show);
for ($i = 1; $i <= $pg; $i++) {
    ?>
    <sitemap>
        <loc><?php echo $home . '/sitemap-link/video/' . $i . '.xml'; ?></loc>
        <lastmod>2018-02-09T16:03:28+07:00</lastmod>
    </sitemap>
    <?php
}
?>
</sitemapindex>
<?php
include 'cache_bot.php';
?>