<?php
include 'inc/connect.php';
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];

$arr = unserialize(file_get_contents("up/list-bxh.txt"));
$title = $arr['title'];
$description = $arr['description'];
$meta_key = str_replace('%name%', '', $domain['meta_key']);
$meta_key = str_replace(' ,', ',', $meta_key);
$geturl = $home;
$anh_share = $home . '/images/image-share-download-lagu-mp3-terbaru-gratis.jpg';
include 'inc/header.php';
$folder1 = 'bxh';
$folder2 = 'baihat';
$file = 'bxh';
if ($domain['cache'] == 0) {
    $cachetime = 86400;
} else {
    $cachetime = 0;
}
include 'cache_top.php';
include_once 'function/function.php';
include_once 'function/function_up.php';
include_once 'function/func.php';
$h1 = str_replace('%country%', $country, $arr['h1']);
$content_top = str_replace('%country%', $country, $arr['content_top']);
$top100 = "http://api.downloadlagu247.com/top-100.php";
?>

<section id="content" class="bxh animated">
    <section class="banner-bxh"></section>
    <section class="content-music">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-content content animated">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-bxh-block">
                        <div class="text-seo-top" >
                            <h1 class="h1_top"><?php echo $h1; ?></h1>
                            <div class="content_top"><?php echo $content_top; ?></div>
                        </div>

                        <div class="content-box">
                            <div class="playlist">
								<div class="row">
									<?php
									$json_data = json_decode(file_get_contents($top100));
									for ($i = 0; $i < count($json_data); $i++) {
										$api = $json_data[$i]->api;

										$row = mysqli_fetch_array(mysqli_query($conn, "SELECT id,name,title,url,icon,alt_anh,views,author FROM baihat WHERE api=$api LIMIT 1"));
										if (empty($row['id'])) {
											$urlgoc = $json_data[$i]->link;
											$link = str_replace('https://lagu123.mobi/', '', $urlgoc);
											$get_html = 'http://api.lagump3terbaru.biz/get_source.php?url=' . $link . '&type=baihat';
											$json_html = json_decode(file_get_contents($get_html));
											$tbh = $json_html->name;
											if (!empty($tbh)) {
												$tcs = $json_html->author;
												$source = $json_html->source;
												$image = $json_html->image;
												if ($image == '') {
													$icon = 'images/download-lagu-mp3-terbaru-gratis.png';
													$image = $home . '/images/image-share-download-lagu-mp3-terbaru-gratis.jpg';
												} else {
													$icon = luuanh($image, $tbh, $tcs, 'baihat', 150, 150);
												}
												$lyrics = $json_html->lyrics;
												$views = $json_html->views;
												$views = str_replace(',', '', $views);
												$duration = $json_html->duration;
												$download = 0;
												$cat = '';
												$country = 'Indo';
												
												$name_yt = str_replace(' ', '+', $tbh) . '+' . str_replace(' ', '+', $tcs);
												$youtube_data_json = json_decode(file_get_contents('http://vn1.api.gugitech.com/youtube.php?q=' . $name_yt . '&lang=id&count=1'));
												$api_youtube = $youtube_data_json[0]->api;
												if ($api_youtube == '') {
													$api_youtube = 'NULL';
												}

												$title = title($tbh, $tcs, 'baihat');
												$des = des($tbh, $tcs, 'baihat');
												$url = url($tbh, $tcs, 'baihat');
												$alt_anh = explode(' | ', $title);
												$alt_anh = $alt_anh[0];
												$content = get_search_yahoo($tbh, $tcs, '', '--:--', $cat, 'baihat', '', '');

												$query = mysqli_query($conn, "INSERT INTO `baihat`(`api`, `api_youtube`, `name`, `author`, `title`, `description`, `url`, `urlgoc`, `icon`, `lyrics`, `content`, `image`, `alt_anh`, `views`, `download`, `cat`, `duration`, `source`, `country`) VALUES ("
													. "'" . addslashes($api) . "', '" . addslashes($api_youtube) . "', '" . addslashes($tbh) . "', '" . addslashes($tcs) . "', '" . addslashes($title) . "', '" . addslashes($des) . "', '" . addslashes($url) . "', "
													. "'" . addslashes($urlgoc) . "', '" . addslashes($icon) . "', '" . addslashes($lyrics) . "', '" . addslashes($content) . "', '" . addslashes($image) . "', '" . addslashes($alt_anh) . "', " . addslashes($views) . ", "
													. "'" . addslashes($download) . "', '" . addslashes($cat) . "', '" . addslashes($duration) . "', '" . addslashes($source) . "', '" . addslashes($country) . "')");
												$row = mysqli_fetch_array(mysqli_query($conn, "SELECT id,name,title,url,icon,alt_anh,views,author FROM baihat WHERE api=$api ORDER BY id DESC LIMIT 1"));
											}
										}

										if (!empty($row['id'])) {
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
									?>
								</div>
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
