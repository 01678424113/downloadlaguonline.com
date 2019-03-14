<?php
if (empty($_GET['q'])) {
    $q = '';
} else {
    $q = $_GET['q'];
}
if (empty($_GET['p'])) {
    $p = 1;
} else {
    $p = $_GET['p'];
}
if (empty($_GET['type'])) {
    $type = '';
} else {
    $type = $_GET['type'];
}
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];

$anh_share = $home . '/images/download-lagu-mp3-terbaru-download-video-musik-gratis.png';
include 'inc/connect.php';
include 'function/function.php';
$arr = unserialize(file_get_contents("up/search.txt"));

$name = khongdau($_GET['q']);
$key_search = $name;
$title = str_replace('%key%', $_GET['q'], $arr['title']);
$description = str_replace('%key%', $_GET['q'], $arr['description']);
$h1 = str_replace('%key%', $_GET['q'], $arr['h1']);
$content_top = str_replace('%key%', $_GET['q'], $arr['content_top']);

include("inc/header.php");
$key = str_replace(' ', '% %', $key_search);
$link_bh = "http://api.downloadlagu247.com/search.php?q=$q&type=baihat";
$link_vi = "http://api.downloadlagu247.com/search.php?q=$q&type=video";
?>
<section id="content" class="home-content animated">
    <section class="wrapper">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-content content animated">
                    <div class="col-md-8 col-sm-8 col-xs-12 content-col-left">
                        <div class="content-music">
                            <div class="text-seo-top top_search">
                                <h1 class="h1_top"><span class="search_results">Results for</span> <?php echo $h1; ?></h1>
                            </div>
							<div class="chuyen_muc">
								<span>Pencarian dengan: </span>
								<a href="<?php echo $home; ?>/search.php?q=<?php echo $q; ?>" >All</a>
								<a href="<?php echo $home; ?>/search.php?type=lagu&q=<?php echo $q; ?>" >Lagu</a>
								<?php
								if (strpos($domain['all_cat'], '2') !== FALSE) {
									?>
									<a href="<?php echo $home; ?>/search.php?type=album&q=<?php echo $q; ?>" >Album</a>
									<?php
								}
								?>
								<a href="<?php echo $home; ?>/search.php?type=video&q=<?php echo $q; ?>" >Video</a>
							</div>
                            <div class="content-box">
                                <?php
                                if ($type == '') {
									?>
									<div class="home-title">
										<h3 class="title">Lagu</h3>
									</div>
									<div class="playlist">
										<div class="row">
											<?php
											$json_data = json_decode(file_get_contents($link_bh));
											for ($i = 0; $i < count($json_data); $i++) {
												$url = $json_data[$i]->url;
												$tbh = $json_data[$i]->tbh;
												$image = $json_data[$i]->image;
												$views = $json_data[$i]->view;
												?>
												<div class="col-md-12 col-sm-12 col-xs-12 list">
													<div class="list-content-music">
														<a href="<?php echo $home; ?>/lagus<?php echo $url; ?>" title="<?php echo $tbh; ?>">
															<div class="home-img home-list-img">
																<img src="<?php echo $image; ?>" alt="<?php echo $tbh; ?>">
																<span class="icon-play"></span>
															</div>
															<span class="music-name list-music-name"><?php echo $tbh; ?></span>
															<span class="single list-music-singer"><?php echo $tcs; ?></span>
															<span class="listening listening-musics"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo $views; ?></span></span>
														</a>
													</div>
												</div>
												<?php
												if ($i == 9) {
                                                    break;
                                                }
											}
											?>
										</div>
									</div>
									
									<?php
									if (strpos($domain['all_cat'], '2') !== FALSE) {
										?>
										<div class="home-title">
											<h3 class="title">Album</h3>
										</div>
										<div class="playlist">
											<div class="row">
												<?php
												$query = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh,views,author FROM `album` WHERE name LIKE '%" . addslashes($key) . "%' OR author LIKE '%" . addslashes($key) . "%' ORDER BY views DESC LIMIT 10");
												while ($row = mysqli_fetch_array($query)) {
													?>
													<div class="col-md-5ths col-sm-5ths col-xs-6 list">
														<a href="<?php echo $home; ?>/playlist/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
															<div class="home-img">
																<img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
																<span class="icon-play"></span>
																<span class="listening"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo number_format($row['views']); ?></span></span>
															</div>
															<span class="music-name"><?php echo $row['name']; ?></span>
															<span class="single"><?php echo $row['author']; ?></span>
														</a>
													</div>
													<?php
												}
												?>
											</div>
										</div>
										<?php
									}
									?>
									
                                    <div class="home-title">
                                        <h3 class="title">Video</h3>
                                    </div>
                                    <div class="playlist">
                                        <div class="row">
                                            <?php
                                            if ($type == '' || $type == 'video') {
												$json = file_get_contents('https://www.googleapis.com/youtube/v3/search?q=' . urlencode('lagu ' . $_GET['q']) . '&part=id,snippet&type=video&key=AIzaSyD86JR8gi7tp7vMmN7IMrD6pItwC0pqiuw&maxResults=50&regionCode=vi');
												$data = json_decode($json);
												$arr = $data->items;
												$max = 9;

												for ($i = 1; $i < $max; $i++) {
													$tbh = converter_name($arr[$i - 1]->snippet->title);
													$tcs = '';
													$img = $arr[$i - 1]->snippet->thumbnails->medium->url;
													$api = $arr[$i - 1]->id->videoId;
													$views = rand(1234, 54357);
													?>
													<div class="col-md-3 col-sm-3 col-xs-6 list">
														<a href="<?php echo $home; ?>/videos/<?php echo $api; ?>" title="<?php echo $tbh; ?>" >
															<div class="home-img">
																<img src="<?php echo $img; ?>" alt="<?php echo $tbh; ?>">
																<span class="icon-play"></span>
																<span class="listening"><span class="icon-view icon-nct"></span><span class="counter"><?php echo number_format($views); ?></span></span>
																<span class="timing"><?php echo $duration; ?></span>
															</div>
															<span class="music-name"><?php echo $tbh; ?></span>
															<span class="single"><?php echo $tcs; ?></span>
														</a>
													</div>
													<?php
												}
											}
                                            ?>
                                        </div>
                                    </div>
									<?php
								}
								if ($type == 'lagu') {
									?>
									<div class="home-title">
										<h3 class="title">Lagu</h3>
									</div>
									<div class="playlist">
										<div class="row">
											<?php
											$json_data = json_decode(file_get_contents($link_bh));
											for ($i = 0; $i < count($json_data); $i++) {
												$url = $json_data[$i]->url;
												$tbh = $json_data[$i]->tbh;
												$image = $json_data[$i]->image;
												$views = $json_data[$i]->view;
												?>
												<div class="col-md-12 col-sm-12 col-xs-12 list">
													<div class="list-content-music">
														<a href="<?php echo $home; ?>/lagus<?php echo $url; ?>" title="<?php echo $tbh; ?>">
															<div class="home-img home-list-img">
																<img src="<?php echo $image; ?>" alt="<?php echo $tbh; ?>">
																<span class="icon-play"></span>
															</div>
															<span class="music-name list-music-name"><?php echo $tbh; ?></span>
															<span class="single list-music-singer"><?php echo $tcs; ?></span>
															<span class="listening listening-musics"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo $views; ?></span></span>
														</a>
													</div>
												</div>
												<?php
											}
											?>
										</div>
									</div>
									<?php
								}
								if (strpos($domain['all_cat'], '2') !== FALSE) {
									if ($type == 'album') {
										?>
										<div class="home-title">
											<h3 class="title">Album</h3>
										</div>
										<div class="playlist">
											<div class="row">
												<?php
												$offset_result = mysqli_query($conn, "SELECT COUNT(id) AS `offset` FROM `album` WHERE name LIKE '%" . addslashes($key) . "%' OR author LIKE '%" . addslashes($key) . "%'");
												$offset_row = mysqli_fetch_object($offset_result);
												$total = $offset_row->offset;
												if ($p > 0) {
													$show = 20;
													if ($total <= $show) {
														$query = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh,views,author FROM `album` WHERE name LIKE '%" . addslashes($key) . "%' OR author LIKE '%" . addslashes($key) . "%' ORDER BY views DESC limit $total");
														while ($row = mysqli_fetch_array($query)) {
															?>
															<div class="col-md-5ths col-sm-5ths col-xs-6 list">
																<a href="<?php echo $home; ?>/playlist/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
																	<div class="home-img">
																		<img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
																		<span class="icon-play"></span>
																		<span class="listening"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo number_format($row['views']); ?></span></span>
																	</div>
																	<span class="music-name"><?php echo $row['name']; ?></span>
																	<span class="single"><?php echo $row['author']; ?></span>
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
														$query = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh,views,author FROM `album` WHERE name LIKE '%" . addslashes($key) . "%' OR author LIKE '%" . addslashes($key) . "%' ORDER BY views DESC limit $j,$show");
														while ($row = mysqli_fetch_array($query)) {
															?>
															<div class="col-md-5ths col-sm-5ths col-xs-6 list">
																<a href="<?php echo $home; ?>/playlist/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
																	<div class="home-img">
																		<img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
																		<span class="icon-play"></span>
																		<span class="listening"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo number_format($row['views']); ?></span></span>
																	</div>
																	<span class="music-name"><?php echo $row['name']; ?></span>
																	<span class="single"><?php echo $row['author']; ?></span>
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
																$page = $home . '/search.php?type=' . $type . '&q=' . $q;
															} else {
																$page = '' . $home . '/search.php?type=' . $type . '&q=' . $q . '&p=' . ($g - 1);
															}
															print('<a href="' . $page . '" class="btn">&laquo;</a> ');
														} else
															print("");
														for ($g; ($g < $en); $g++) {
															if ($g == "1" and $g != $p) {
																print('<a href="' . $home . '/search.php?type=' . $type . '&q=' . $q . '" class="btn">1</a> ');
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
																	print('<a href="' . $home . '/search.php?type=' . $type . '&q=' . $q . '&p=' . $xx . '" class="btn">' . $g . '</a> ');
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
															print('<a href="' . $home . '/search.php?type=' . $type . '&q=' . $q . '&p=' . $xx . '" class="btn">&raquo;</a>');
														} else
															print(' ');
														echo '</center></div>';
													}
												}
												?>
											</div>
										</div>
										<?php
									}
								}
								if ($type == 'video') {
									?>
									<div class="home-title">
                                        <h3 class="title">Video</h3>
                                    </div>
                                    <div class="playlist">
                                        <div class="row">
                                            <?php
                                            if ($type == '' || $type == 'video') {
												$json = file_get_contents('https://www.googleapis.com/youtube/v3/search?q=' . urlencode('lagu ' . $_GET['q']) . '&part=id,snippet&type=video&key=AIzaSyD86JR8gi7tp7vMmN7IMrD6pItwC0pqiuw&maxResults=50&regionCode=vi');
												$data = json_decode($json);
												$arr = $data->items;
												$max = count($arr) + 1;

												for ($i = 1; $i < $max; $i++) {
													$tbh = converter_name($arr[$i - 1]->snippet->title);
													$tcs = '';
													$img = $arr[$i - 1]->snippet->thumbnails->medium->url;
													$api = $arr[$i - 1]->id->videoId;
													$views = rand(1234, 54357);
													?>
													<div class="col-md-3 col-sm-3 col-xs-6 list">
														<a href="<?php echo $home; ?>/videos/<?php echo $api; ?>" title="<?php echo $tbh; ?>" >
															<div class="home-img">
																<img src="<?php echo $img; ?>" alt="<?php echo $tbh; ?>">
																<span class="icon-play"></span>
																<span class="listening"><span class="icon-view icon-nct"></span><span class="counter"><?php echo number_format($views); ?></span></span>
																<span class="timing"><?php echo $duration; ?></span>
															</div>
															<span class="music-name"><?php echo $tbh; ?></span>
															<span class="single"><?php echo $tcs; ?></span>
														</a>
													</div>
													<?php
												}
											}
                                            ?>
                                        </div>
                                    </div>
									<?php
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
include("inc/footer.php");
?>