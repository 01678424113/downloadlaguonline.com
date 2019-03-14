<?php
$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
if (preg_match('/(android|adr|q-smart|htc_smart|htc hero|nokia_x|adr 2.3.6|android 4.1.2|adr 4.0.4|adr 2.3.6|adr 2.3.3|adr 4.2.2|adr 4.2.3|ht-s5360|gt-s5570|gt-s6102|gt-s5360|gt-p5830i|lg-p500|gt-i9000)/i', $useragent) && !preg_match('/(j2me|series40|series 60|googlebot|bot|facebook|coccoc|bing|yahoo|crawler|spider|addthis|appengine|mediapartners|webmasters)/i', $useragent)) {
    ?>
    <?php

// Func Tách ảnh
    function tach_image($image) {
        $rand = explode('?rand-', $image);
        $images = $rand[0];
        $rands = $rand[1];
        $rands = explode('-', $rands);
        $j1 = $rands[0];
        $j2 = $rands[1];
        $rannew = rand($j1, $j2);
        $image = str_replace(1, $rannew, $images);
        return $image;
    }

// Ads Messenger
    ?>
    <div style="clear: both; display: block; width: 0px; height: 0px;"></div>
    <?php
    if ($adsmes == 1) {
        $type_qc = 'messenger-lagu';
        $link = 'http://rdrctng.com/show-ads.php?type=' . $type_qc;
        $qc = trim(file_get_contents($link));
        $qc = unserialize($qc);

        shuffle($qc);
        array_splice($qc, 1);
        if (count($qc) == 1) {
            $name = $qc[0]['name'];
            $link = $qc[0]['link'];
            $image = $qc[0]['image'];
            if (preg_match('/(rand)/i', $image)) {
                $image = tach_image($image);
            }
            $content = $qc[0]['description'];
            $icon = $qc[0]['icon'];
            ?>
            <link rel="stylesheet" id="messenger-css"  href="http://gameandroidfree.org/css/messenger.css" type="text/css" media="all" />

            <div class="drag-wrapper drag-wrapper-right">
                <div data-drag="data-drag" class="thing" style="transform: translate(1843px, 456px);">
                    <div class="number" style="font-size: 11px; padding: 1px 4px 1px 5px; margin: 0px 0px 0px 2px;"><?php
                        $i2 = rand(1, 5);
                        echo $i2;
                        ?></div>

                    <div class="circle facebook-messenger-avatar facebook-messenger-avatar-type0">
                        <img class="facebook-messenger-avatar" style="border-radius: 50%;" src="<?php echo $icon; ?>">
                    </div>
                    <div class="content3">
                        <div class="icon_pop">
                            <img src="<?php echo $icon; ?>" class="avatar_pop">
                        </div>
                        <div class="title_pop">
                            <div class="name_pop">
                                <?php echo $name; ?>
                            </div>
                            <div class="online_pop">
                                Online
                            </div>
                        </div>
                        <div class="mes_pop">
                            <div class="inside">
                                <a href="<?php echo $link; ?>">

                                    <span style="color: black;">
                                        <?php echo $content; ?>
                                    </span>
                                </a>
                                <br/>
                                <center>
                                    <a href="<?php echo $link; ?>">
                                        <img border="0" src="<?php echo $image; ?>" width="260px" height="190px" />
                                        <br/>

                                        <b style="color: red;">Download</b>
                                    </a>
                                </center>
                                <br/>
                                <i>Gratis dan cepat !!! </i>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="magnet-zone">
                    <div class="magnet"></div>
                </div>
            </div>
            <script type='text/javascript' src='http://gameandroidfree.org/js/popup.js'></script>
            <script type='text/javascript' src='http://gameandroidfree.org/js/jquery.event.move.js'></script>
            <script type='text/javascript' src='http://gameandroidfree.org/js/rebound.min.js'></script>
            <script type='text/javascript' src='http://gameandroidfree.org/js/index.js'></script>
            <?php
        }
    }

// Ads Popup
    ?>
    <div style="clear: both; display: block; width: 0px; height: 0px;"></div>
    <?php
    if ($adspop == 1) {
        $type_qc = 'popup-lagu-2';
        $link = 'http://rdrctng.com/show-ads.php?type=' . $type_qc;
        $qc = trim(file_get_contents($link));
        $qc = unserialize($qc);

        shuffle($qc);
        array_splice($qc, 1);
        if (count($qc) == 1) {
            $name = $qc[0]['name'];
            $link = $qc[0]['link'];
            $image = $qc[0]['image'];
            $icon = $qc[0]['icon'];
            if (preg_match('/(rand)/i', $image)) {
                $image = tach_image($image);
            }

            $content = $qc[0]['description'];
            ?>

            <div id="banner2">
                <div class="btnxx btn-primaryxx" id="close3">×</div>
                <div class="info2">
                    <div class="banner-img">
                        <a href="<?php echo $link; ?>"><img src="<?php echo $image; ?>" style="width:100%" class="thumb2"></a> 
                    </div>
                    <div class="adsss">
                        <div class="show-content-banner">
                            <div class="img-bn">
                                <img class="img-bn" src="<?php echo $icon; ?>">
                            </div>
                            <div class="content-bn">
                                <?php echo $content; ?>
                            </div>
                        </div>
                        <a href="<?php echo $link; ?>">
                            <div class="dl2">Download</div>
                        </a>
                    </div>

                </div>
            </div>
            <?php
        }
    }

    if ($adspop2 == 1) {

        $type_qc = 'popup-lagu';
        $link = 'http://rdrctng.com/show-ads.php?type=' . $type_qc;
        $qc = trim(file_get_contents($link));
        $qc = unserialize($qc);

        shuffle($qc);
        array_splice($qc, 1);
        if (count($qc) == 1) {
            $name = $qc[0]['name'];
            $link = $qc[0]['link'];
            $icon = $qc[0]['icon'];
            $image = $qc[0]['image'];
            if (preg_match('/(rand)/i', $image)) {
                $image = tach_image($image);
            }

            $content = $qc[0]['description'];
            ?>


            <?php ?>
            <div id="banner">
                <div class="btnxx btn-primaryxx" id="closep">×</div>
                <h3>Advertisement</h3>
                <a href="<?php echo $link; ?>">
                    <div class="info-pop">
                        <img class="cover-image" src="<?php echo $icon; ?>">
                        <div>
                            <span class="title2"><?php echo $name; ?></span><br/>
                            <span class="badge"><?php echo $content; ?></span>
                        </div>
                    </div>
                </a>
                <center>
                    <a href="<?php echo $link; ?>" class="dl" id="fastdownid">Download</a>
                </center>
                <div id="closec" class="cancel-fixed cancel"><div class="c-btn">Cancel</div></div>
            </div>
            <?php
        }
    }
    ?>
    <?php
// Css Popup
    if ($adspop == 1 || $adspop2 == 1) {
        ?>
        <script type="text/javascript">
            $('#closep').click(function () {
                $(this).parent().hide();
                $('#shadowbox').hide();
            });
            $('#closec').click(function () {
                $(this).parent().hide();
                $('#shadowbox').hide();
            });
            $('#close3').click(function () {
                $(this).parent().hide();
                $('#shadowbox').hide();
            });
        </script>
        <style>
            #banner2 .adsss {
                background: #f2f2f2;
                float: left;
                margin-top: -15px;
                border-top: solid 1px #000000;
                border-radius: 0px 0px 15px 15px;
                background-image: linear-gradient(to top, #fe5b35 0%, #4f2d7a 100%);
            }
            #close3 {
                position: absolute;
                top: 0px;
                right: 0px;
                font-family: Arial, Helvetica;
                font-size: 27px;
                cursor: pointer;
                font-weight: bold;
                padding: 8px 14px;
                color: #e4e4e4;
            }

            #banner2 {
                position: fixed;
                z-index: 999;
                top: 15%;
                left: 50%;
                width: 270px;
                color: #fff;
                -webkit-transform: translateX(-50%);
                transform: translateX(-50%);
            }
            #banner2 .dl2 {
                display: inline-block;
                box-sizing: content-box;
                cursor: pointer;
                margin: 0px 0 10px;
                padding: 0px 40px;
                border-radius: 3px;
                font: normal 17px/35px "Questrial", Helvetica, sans-serif;
                color: rgb(255, 255, 255);
                text-overflow: clip;
                background: linear-gradient(180deg, #298600 0, #54ff09 100%), #3f9e15;
                background-size: auto auto;
                box-shadow: 0 2px 1px 0 rgba(0,0,0,0.3);
                text-shadow: 0 1px 2px rgb(63, 64, 63);
            }
            .show-content-banner {
                padding: 3px;
                margin-top: 5px; 
                float: left;
                width: 100%;
            }
            .show-content-banner .img-bn {
                width: 50px;
                height: 50px;
                float: left;
                margin-right: 10px;
            }
            .show-content-banner .content-bn {
                float: left;
                color: #ededed;
                font-size: 15px;
            }
            .info2 .banner-img {
                float: left;
            }
            #banner .info-pop a { 
                text-decoration: none;
            }
            #banner .info-pop {
                background: rgba(251, 251, 251, 0.11);
                margin: 5px 0px 5px 0px;
                padding: 2px;
                height: 84px;
            }
            #banner2 .info2 {
                text-align: center;
            }
            #banner2 .info2 a { 
                text-decoration: none;
            }
            #banner2 .info2 .thumb2 { 
                max-width: 100%;
                border-radius: 15px 15px 0px 0px;
            }
            #banner .dl {
                display: inline-block;
                -moz-box-sizing: content-box;
                box-sizing: content-box;
                cursor: pointer;
                margin: 10px 0px 0px 0px;
                padding: 0px 40px;
                border-radius: 3px;
                font: normal 25px/45px "Questrial", Helvetica, sans-serif;
                color: rgb(255, 255, 255);
                text-overflow: clip;
                background: linear-gradient(180deg, #f16774 0, #ae52ae 100%), #a5369f;
                background-origin: padding-box;
                background-clip: border-box;
                background-size: auto auto;
                box-shadow: 0 2px 1px 0 rgba(0,0,0,0.3);
                text-shadow: 0 1px 2px rgb(9, 39, 5);
            }

            #banner .title2 {
                color: #ef726f;
                font-size: 18px;
                font-weight: 300;
                line-height: 40px;
                margin-bottom: 1px;
                white-space: normal;
                font-weight: bold;
            }

            #banner .cover-image {
                width: 70px;
                float: left;
                margin: 5px 10px 0px 5px;
                border-radius: 10px;
            }
            #banner .badge {
                color: #44f143;
                font-size: 11px;
            }
            #banner .cancel-fixed .c-btn {
                z-index: 999;
                background-color: #fdb88a;
                line-height: 40px;
                font-size: 20px;
                font-weight: bold;
                border-radius: 0px 0px 10px 10px;;
            }
            #banner .cancel-fixed>* {
                vertical-align: middle;
            }
            #banner .cancel-fixed {
                width: 100%;
                height: 40px;
                text-align: center;
                position: fixed;
                bottom: 0;
                left: 0;
                z-index: 100;
            }
            #banner h3 {
                text-align: center;
                margin: 0px;
                padding: 5px 0;
                font-size: 18px;
                color: #f1f717;
                font-style: italic;
                font-family: monospace;
            }
            #shadowbox {
                position: fixed;
                z-index: 998;
                height: 100%;
                width: 100%;
                background: rgba(0,0,0,0.5);
            }

            #banner {
                position: fixed;
                z-index: 999;
                top: 18%;
                left: 50%;
                min-height: 245px;
                width: 300px;
                background: #1a1a1a;
                color: #fff;
                -webkit-transform: translateX(-50%);
                transform: translateX(-50%);
                border-radius: 10px;
                border: 1px solid #252324;
            }

            #banner a {
                text-decoration: none;
            }
            #closep {
                position: absolute;
                top: -5px;
                right: -5px;
                font-family: Arial, Helvetica;
                font-size: 33px;
                cursor: pointer;
                font-weight: bold;
                padding: 0px 8px 0px 0px;
                color: white;
            }
            #banner .btn-primaryxx {
                margin: 2px;
            }
            #banner .btnxx {
                display: inline-block;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                border: 1px solid transparent;
                border-radius: 7px;
            }
        </style>
        <?php
    }


// Ads Float Bottom
    ?>
    <div style="clear: both; display: block; width: 0px; height: 0px;"></div>
    <?php
    if ($adsfloat == 1) {
        $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);

        $type_qc = 'bottom-float-lagu';
        $link = 'http://rdrctng.com/show-ads.php?type=' . $type_qc;
        $qc = trim(file_get_contents($link));
        $qc = unserialize($qc);

        shuffle($qc);
        array_splice($qc, 1);
        if (count($qc) == 1) {
            $name = $qc[0]['name'];
            $link = $qc[0]['link'];
            $image = $qc[0]['image'];
            if (preg_match('/(rand)/i', $image)) {
                $image = tach_image($image);
            }
            $content = $qc[0]['description'];
            if ($content != '') {
                ?>

                <style>
                    .ads-bottom {
                        width: 100%;
                        max-width: 100%;
                        height: 60px;
                        font-size: 13px;
                        z-index: 9999;
                        position: fixed;
                        bottom: 1px;
                        background: #daa704;
                        border-radius: 2px;
                        padding: 4px 0px 0px 0px;
                        background-image: linear-gradient(to top, #daa704 0%, #8be348 100%);
                    }
                    .ads-bottom span {
                        font-size: 11px;
                        color: #fff;
                    }
                    .title-app {
                        color: #006ea5;
                        margin-top: 5px;
                    }
                    .thumb3 {width:50px; height:50px; border:1px solid #888; display:inline; float:left; border-radius:5px; margin: 1px 5px 1px 5px ;}
                    .ads-down {
                        float: right;
                        display: inline-block;
                        height: 25px;
                        line-height: 25px;
                        background: none repeat scroll 0% 0% #2595DE;
                        /* border: 1px solid #015B9F; */
                        padding: 0px 5px;
                        font-size: 15px;
                        font-weight: bold;
                        color: #FFF;
                        text-shadow: 1px 1px 0px #000000;
                        /* box-shadow: 0px 1px 0px #53B5ED inset; */
                        border-radius: 5px;
                        margin-right: 10px;
                        margin-top: 15px;
                        background-image: linear-gradient(60deg, #3d3393 0%, #2b76b9 37%, #2cacd1 65%, #35eb93 100%);
                    }
                </style>
                <div class="ads-bottom">
                    <a href="<?php echo $link; ?>"><img class="thumb3" src="<?php echo $image; ?>"><b class="title-app"><?php echo $name; ?></b></a>
                    <a href="<?php echo $link; ?>"><b class="ads-down">Instal</b></a><br/>
                    <span><i><?php echo $content; ?></i></span><br/>
                    <!--<span style="color: #e7fdf6; font-size: 10px;"> Download Free</span>-->
                </div>

                <?php
            } else {
                // Show mỗi ảnh Banner
                ?>
                <style>
                    .ads_bottom_mobi{
                        position: fixed;
                        bottom: 0px;
                        width: 100%;
                        z-index: 9999;
                        text-align: center;
                    }
                </style>
                <div class="ads_bottom_mobi">
                    <a style="display: block;" rel="noindex,nofollow" href="<?php echo $link; ?>" >
                        <img style="width: 100%; max-width: 320px; height: 50px;" src="<?php echo $image; ?>" >
                    </a>
                </div>
                <?php
            }
        }
    }
    ?>

    <?php
// Ads Button Download Video Bokep
    ?>
    <div style="clear: both; display: block; width: 0px; height: 0px;"></div>
    <?php
    if ($adsdl == 1) {
        $type_qc = 'button-download';
        $link = 'http://rdrctng.com/show-ads.php?type=' . $type_qc;
        $qc = trim(file_get_contents($link));
        $qc = unserialize($qc);

        shuffle($qc);
        array_splice($qc, 1);
        if (count($qc) == 1) {
            $link = $qc[0]['link'];
            $image = $qc[0]['image'];
            if (preg_match('/(rand)/i', $image)) {
                $image = tach_image($image);
            }
            ?>

            <script>
                if (window.jQuery) {
                    $(document).ready(
                            function () {
                                if (navigator.userAgent.match(/Android|android|adr/)) {
                                    $("head").append("<style type=\"text/css\"> .dlvidio {text-align: center; margin: 7px 0px;}</style>");
                                    $(".dlvidio").html("<a href=\"<?php echo $link; ?>\" title=\"Download Video\"><img style=\"width:100%; max-width: 250px;\" src=\"<?php echo $image; ?>\"></a>");
                                }
                            }
                    );
                }
            </script> 
            <?php
        }
    }
    ?>
    <div style="clear: both; display: block; width: 0px; height: 0px;"></div>
    <?php
//Ads Swipe
    if ($adswipe == 1) {

        $type_qc = 'top-swipe-lagu';
        $link = 'http://rdrctng.com/show-ads.php?type=' . $type_qc;

        $qc = trim(file_get_contents($link));

        $qc = unserialize($qc);

        shuffle($qc);
        array_splice($qc, 1);
//var_dump($qc);
        if (count($qc) == 1) {
            $name = $qc[0]['name'];
            $link = $qc[0]['link'];
            $image = $qc[0]['image'];
            if (preg_match('/(rand)/i', $image)) {
                $image = tach_image($image);
            }
            $content = $qc[0]['description'];

            function icon_gp() {
                $icon_gp = array(
                    'https://cdn2.iconfinder.com/data/icons/social-media-2142/192/Google_Play-32.png',
                    'https://lh3.ggpht.com/0VYAvZLR9YhosF-thqm8xl8EWsCfrEY_uk2og2f59K8IOx5TfPsXjFVwxaHVnUbuEjc=s30',
                    'https://lh3.googleusercontent.com/ZZPdzvlpK9r_Df9C3M7j1rNRi7hhHRvPhlklJ3lfi5jk86Jd1s0Y5wcQ1QgbVaAP5Q=s30' // Detik
                );
                $rand = array_rand($icon_gp);
                return $icon_gp[$rand];
            }

            $icon = icon_gp();
            ?>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#closexx').click(function () {
                        $('#bgswipe').hide();
                    });
                });
            </script> 

            <style>
                /*@import"compass/css3";*/
                .closexx {
                    position: relative;
                    top: -2px;
                    right: -21px;
                    color: inherit;
                }

                #theNote .closexx {
                    float: right;
                    margin: 5px;
                    font-size: 10px;
                    font-weight: 700;
                    line-height: 1;
                    filter: alpha(opacity=20);
                    opacity: .5;
                    background: #dcdcdc;
                    padding: 5px;
                    color: #353535;
                    margin: 3px 30px 0px 0px;
                }
                #theNote .closexx:hover {
                    background: #ff0000;
                    border: 1px #e8e5e5 solid;
                    padding: 5px;
                    border-radius: 3px;
                    text-decoration: none;
                    color: #454545;

                }

                #theNote .closexx a {
                    color: #353535;
                }

                #theNote .closexx a:hover {
                    text-decoration: none;
                }

                .bgswipe {
                    border: 0;
                    width: 100%;
                    padding: 0px;
                    margin: 0 auto;
                    z-index: 999999;

                }
                .bgswipe a {
                    color: #2b2929;
                    text-decoration: none;
                }
                .bgswipe a {
                    background-color: transparent;
                }

                .notif {
                    width: 100%;
                }
                .notif .contentad {
                    color: #676767;
                    background-color: #fff;
                    box-sizing: border-box; 
                    border: 1px solid #e0e0e0;
                    border-radius: 3px;
                    text-shadow: 0 1px 0 #f3f3f3;
                    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
                    font-size: 9px;
                    line-height: 1.4;
                    padding-top: 1px;
                    padding-bottom: 13px;
                }

                .bgswipe p {    
                    display: block;
                    margin-top: 5px;
                }
                .bgswipe .imgs {
                    float: left;
                    padding: 5px;

                }
                .bgswipe .quangcao {
                    margin-left: 70px;
                    /*padding-bottom: 10px;*/
                }
                .bgswipe .quangcao p {
                    margin-top: 5px;
                }
                .bgswipe .quangcao span {
                    margin: 1px;
                }

                .bgswipe .icons {
                    border: #e8e5e5 solid 1px;
                    width: 50px;
                    height: 50px;
                    border-radius: 5px;
                }
                .bgswipe .titlead{
                    font-weight: bold;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    font-size: 14px;
                }
                .imgs .ic {
                    position: absolute;
                    left: 45px;
                    top: 45px;
                    display: inline-block;
                    max-width: 20px;
                    padding: 3px;
                    color: #fff;
                    line-height: 1;
                    vertical-align: baseline;
                    white-space: nowrap;
                    text-align: center;
                    border-radius: 50%;
                }
            </style>

            <div class="bgswipe" id="bgswipe" style="position: fixed; top: -150px;">
                <a target="_blank" rel="nofollow" href="<?php echo $link; ?>">
                    <div class="notif" id="theNote" draggable="true"> 
                        <div class="contentad">

                            <div class="imgs">
                                <img class="icons" src="<?php echo $image; ?>">
                                <img class="ic" src="<?php echo $icon; ?>">
                            </div>

                            <div class="quangcao">
                                <p class="titlead"><?php echo $name; ?></p>
                                <span><?php echo $content; ?></span>
                            </div>
                        </div>
                        <a id="closexx" class="closexx" data-dismiss="notif" aria-label="closexx">Close</a> 
                    </div>
                </a>
            </div>
            <!-- </div> -->

            <script type="text/javascript">
                var imgObj = null;
                var animate;
                function moveNotif(time) {
                    imgObj = document.getElementById('bgswipe');
                    imgObj.style.top = parseInt(imgObj.style.top) + 1 + 'px';
                    animate = setTimeout(moveNotif, time); // call moveRight in 20msec
                    if (imgObj.style.top === '0px') {
                        clearTimeout(animate);
                        imgObj.style.position = 'fixed';
                    }

                }
                window.onload = function () {
                    moveNotif(2000);
                };

            </script>

            <script>
                var dropzone = document.getElementById('bgswipe'),
                        draggable = document.getElementById('theNote'),
                        leftOffset,
                        leftX,
                        overallMovement;

                function onTouchStart(event) {
                    var $this = $('#theNote');
                    var offset = $this.offset();
                    var width = $this.outerWidth();
                    var height = $this.outerHeight();
                    leftX = offset.left;
                    var touches = event.changedTouches;
                    leftOffset = touches[0].clientX - leftX;
                }

                function onTouchMove(event) {
                    event.preventDefault();
                    var $this = $('#theNote');
                    var touches = event.changedTouches;
                    var leftMovement = touches[0].clientX - leftOffset;
                    $this.css({'position': 'absolute',
                        'left': leftMovement});
                    overallMovement = Math.abs(leftMovement - leftX);
                    $('p.info').text(overallMovement + ' / 200 pixels required for dismissal');
                    if (overallMovement > 199) {
                        $this.fadeOut(200);
                    }
                }

                function onTouchEnd(event) {
                    if (overallMovement < 200) {
                        $('#theNote').css({'left': leftX});
                        $('p.info').text('');
                    }
                }
                draggable.addEventListener('touchstart', onTouchStart, false);
                draggable.addEventListener('touchmove', onTouchMove, false);
                draggable.addEventListener('touchend', onTouchEnd, false);
            </script>

            <?php
        }
    }
    ?>
    <div style="clear: both; display: block; width: 0px; height: 0px;"></div>
    <?php
}
?>
