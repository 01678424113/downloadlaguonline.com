<?php
function geturl() {
    $pageURL = 'http';
    if (!empty($_SERVER['HTTPS'])) {
        if ($_SERVER['HTTPS'] == 'on') {
            $pageURL .= "s";
        }
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

$geturl = geturl();
$geturl = str_replace(':443', '', $geturl);
if ($geturl == $home . '/index.html' || $geturl == $home . '/index.php') {
    echo "<meta http-equiv='refresh' content='0;URL=$home'>";
    exit();
}

$canonical = $geturl;
if (!empty($_GET['p'])) {
    $canonical = str_replace('/' . $_GET['p'], '', $canonical);
}
?>
<!DOCTYPE HTML>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <?php echo $domain['meta_bing']; ?>
        <meta name="description" content="<?php echo $description; ?>"/>
        <meta name="keywords" content="<?php echo $meta_key; ?>"/>
        <meta itemprop="url" content="<?php echo $geturl; ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="robots" content="<?php echo $no; ?>index, <?php echo $no; ?>follow">
        <meta name="revisit-after" content="1 days">
        <link rel="shortcut icon" href="<?php echo $home; ?>/images/favicon.ico" />
        <title><?php echo $title; ?></title>
        <link rel="canonical" href="<?php echo $canonical; ?>" />
        <meta property="og:locale" content="id_ID" />
        <meta property="og:image" content="<?php echo $anh_share; ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php echo $title; ?>" />
        <meta property="og:description" content="<?php echo $description; ?>" />
        <meta property="og:url" content="<?php echo $geturl; ?>" />
        <meta property="og:site_name" content="<?php echo $domain['sitename']; ?>" />
        <meta name="author" content="<?php echo $namehome; ?>" />
        <meta name="DC.title" content="<?php echo $title; ?>" />
        <meta name="geo.placename" content="Indonesia" />
        <meta name="geo.region" content="ID" />
        <meta name="geo.position" content="-0.789275;113.921327" />
        <meta name="ICBM" content="-0.789275, 113.921327" />

        <link rel="stylesheet" href="<?php echo $home; ?>/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $home; ?>/css/style.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $home; ?>/css/owl.carousel.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $home; ?>/css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $home; ?>/css/animate.min.css" type="text/css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css" />
        <script src="<?php echo $home; ?>/js/jssor.core.js"></script>
        <script src="<?php echo $home; ?>/js/jssor.utils.js"></script>
        <script src="<?php echo $home; ?>/js/jssor.slider.js"></script>
        <script src="<?php echo $home; ?>/js/slider.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <?php
        if ($geturl == $home) {
            ?>
            <script type='application/ld+json'>{
                "@context":"http:\/\/schema.org",
                "@type":"WebSite",
                "url":"<?php echo str_replace('/', '\/', $home); ?>",
                "name":"<?php echo $domain['content_sitename']; ?>",
                "potentialAction":{
                "@type":"SearchAction",
                "target":"<?php echo str_replace('/', '\/', $home); ?>\/search.php?q={search_term_string}",
                "query-input":"required name=search_term_string"}}
            </script>
            <?php
        }
        ?>
        <?php echo $domain['analytics']; ?>
    </head>
    <body>
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
        <header class="header animated">
            <section class="top-header">
                <div class="container">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="logo">
                            <div class="logo">
                                <div class="alogo">
                                    <a href="<?php echo $home; ?>" title="<?php echo $domain['sitename']; ?>"><?php echo $domain['sitename']; ?></a>
                                </div>
                                <div class="aslogan">
                                    <span class="slogan hidden-xs"><?php echo $domain['content_sitename']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 search-content">
                        <div class="search-form">
                            <form name="search_form" class="search" action="<?php echo $home; ?>/search.php" method="get" onsubmit="return search()">
                                <input type="text" id="keyword" name="q" class="input_search" placeholder="Cari Musik..." value="<?php echo $key_search; ?>" autocomplete="off">
                                <button type="submit" class="btn_search"><i class="fa fa-search"></i> Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="menu">
                <div class="container">
                    <div id="nav-menu">
                        <nav id="menubox">
                            <div id="head-mobile"></div>
                            <div class="button"></div>
                            <ul>
                                <?php
                                $active = 0;
                                if (strpos($geturl, '/lagu') !== FALSE || strpos($geturl, '/lagu/') !== FALSE) {
                                    $active = 1;
                                }
                                if (strpos($geturl, '/album') !== FALSE || strpos($geturl, '/playlist/') !== FALSE) {
                                    $active = 2;
                                }
                                if (strpos($geturl, '/video') !== FALSE) {
                                    $active = 3;
                                }
                                if (strpos($geturl, '/peringkat') !== FALSE) {
                                    $active = 4;
                                }
                                if (strpos($geturl, '/para-artis') !== FALSE || strpos($geturl, '/artis/') !== FALSE) {
                                    $active = 5;
                                }
                                ?>
                                <li <?php if ($active == 0) { ?>class="active"<?php } ?>>
                                    <a title="DOWNLOAD LAGU" href="<?php echo $home; ?>">Rumah</a>
                                </li>
                                <?php
								if (strpos($domain['all_cat'], '0') !== FALSE) {
									?>
									<li <?php if ($active == 1) { ?>class="active"<?php } ?>>
										<a title="LAGU" href="<?php echo $home; ?>/lagu">Lagu</a>
									</li>
								<?php } if (strpos($domain['all_cat'], '2') !== FALSE) {
									?>
									<li <?php if ($active == 2) { ?>class="active"<?php } ?>>
										<a title="ALBUM" href="<?php echo $home; ?>/album">Album</a>
									</li>
								<?php } if (strpos($domain['all_cat'], '1') !== FALSE) {
									?>
									<li <?php if ($active == 3) { ?>class="active"<?php } ?>>
										<a title="VIDEO" href="<?php echo $home; ?>/video">Video</a>
									</li>
								<?php } if (strpos($domain['all_cat'], '4') !== FALSE) {
									?>
									<li <?php if ($active == 4) { ?>class="active"<?php } ?>>
										<a title="PERINGKAT" href="<?php echo $home; ?>/peringkat-lagu">Peringkat</a>
									</li>
								<?php } if (strpos($domain['all_cat'], '3') !== FALSE) {
									?>
									<li <?php if ($active == 5) { ?>class="active"<?php } ?>>
										<a title="PARA ARTIS" href="<?php echo $home; ?>/para-artis">Para artis</a>
										<ul class="sub-menu">
											<li style="width: 100%;"><a title="Indo" href="<?php echo $home; ?>/para-artis/indo">Indo</a></li>
											<li style="width: 100%;"><a title="US-UK" href="<?php echo $home; ?>/para-artis/us-uk">US-UK</a></li>
											<li style="width: 100%;"><a title="Korea" href="<?php echo $home; ?>/para-artis/korea">Korea</a></li>
										</ul>
									</li>
									<?php
								}
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
        </header>
        <?php
        //include 'ads/no_out.php';
        ?>