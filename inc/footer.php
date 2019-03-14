<?php
if (empty($home)) {
    $domain = unserialize(file_get_contents("up/domain.txt"));
    $home = $domain['domain'];
    $namehome = $domain['name_domain'];
} else {
    $namehome = $domain['name_domain'];
}
?>

<footer class="footer animated">
    <section class="top-footer">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="content-footer">
                    <?php
                    $arr = unserialize(file_get_contents("up/footer.txt"));
                    $content_ft = str_replace('%domainname%', $namehome, $arr[0]);
                    echo $content_ft;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bottom-footer">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dcma" style="position: absolute; bottom: 0; right: 0">
                    <a href="//www.dmca.com/Protection/Status.aspx?ID=71d0eeb0-4338-4e6a-80c5-7def8da3c8ac" title="DMCA.com Protection Status" class="dmca-badge">
                        <img src="//images.dmca.com/Badges/DMCA_logo-grn-btn100w.png?ID=71d0eeb0-4338-4e6a-80c5-7def8da3c8ac" alt="DMCA.com Protection Status">
                    </a>
                    <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
                </div>
                <center style="margin-bottom: 15px;">
                    <a target="_blank" style="color: #e6dede; border-right: 1px solid #777777; padding-right: 10px; margin-right: 5px" href="<?php echo $home; ?>" title="Rumah">Rumah</a>
                    <a target="_blank" style="color: #e6dede; border-right: 1px solid #777777; padding-right: 10px; margin-right: 5px" href="<?php echo $home; ?>/laporan-dmca" title="Laporan DMCA">Laporan DMCA</a>
                    <a target="_blank" style="color: #e6dede; border-right: 1px solid #777777; padding-right: 10px; margin-right: 5px" href="<?php echo $home; ?>/tentang-kami" title="Tentang Kami">Tentang Kami</a>
                    <a target="_blank" style="color: #e6dede; border-right: 1px solid #777777; padding-right: 10px; margin-right: 5px" href="<?php echo $home; ?>/kontak" title="Kontak">Kontak</a>
                    <a target="_blank" style="color: #e6dede; border-right: 1px solid #777777; padding-right: 10px; margin-right: 5px" href="<?php echo $home; ?>/ketentuan-layanan" title="Ketentuan Layanan">Ketentuan Layanan</a>
                    <a target="_blank" style="color: #e6dede" href="<?php echo $home; ?>/kebijakan-pribadi" title="Kebijakan Pribadi">Kebijakan Pribadi</a>
                </center>

                <p class="copyright">© by 2017 <?php echo $namehome ?>, Seluruh hak cipta.<br>
                    <a href="<?php echo $home; ?>/sitemap.xml" title="Sitemap" >Sitemap</a>
                </p>
            </div>
        </div>
    </section>
</footer>
</body>
<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="<?php echo $home; ?>/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo $home; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $home; ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo $home; ?>/js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="<?php echo $home; ?>/js/player-script.js"></script>
<script src="<?php echo $home; ?>/js/saved-resource.js"></script>
<script src="<?php echo $home; ?>/js/scripts.js"></script>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 5,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: false,
        pagination: false,
        navigation: true,
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        itemsMobile: [480, 2],
        itemsTablet: [960, 4],
        itemsDesktop: [1000, 6]
    })
</script>
<?php
echo $domain['adthis'];
?>
<div id="fb-root"></div>
<script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
<script src="https://apis.google.com/js/platform.js" async defer>
    {
        lang: 'id'
    }
</script>
</html>
<?php
disconnect_db($conn);
?>