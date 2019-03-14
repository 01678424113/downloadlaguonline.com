<?php
$okads = 0;
$ads = array(
    "$home",
    "$home/",
    "$home/lagu",
    "$home/lagu/indo",
    "$home/album",
    "$home/album/indo",
    "$home/video",
    "$home/video/indo"
);

foreach ($ads as $urlcheck) {
    if ($urlcheck == $geturl) {
        $okads = 1;
        break;
    }
    if (strpos($geturl, "$home/lagu/indo/") !== FALSE || strpos($geturl, "$home/album/indo/") !== FALSE || strpos($geturl, "$home/video/indo/") !== FALSE || strpos($geturl, "$home/para-artis/indo") !== FALSE) {
        $okads = 1;
        break;
    }
}
if ($okads == 1) {
    ?>
    <div class="container">
        <div class="col-md-12 col-sm-12 ads_goo animated">
            <div style="text-align: center; margin: 7px 0px;">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-6532789764526704"
                     data-ad-slot="8008741363"
                     data-ad-format="auto"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    </div>
    <?php
    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        $useragent = '';
    } else {
        $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
    }

    if (!preg_match('/(windows nt|intel)/i', $useragent) && $useragent != '') {
        ?>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-6532789764526704",
                enable_page_level_ads: true
            });
        </script>
        <?php
    }
}
?>