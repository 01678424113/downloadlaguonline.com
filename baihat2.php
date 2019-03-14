<?php
$id = $_GET['id'];
$url = $_GET['url'];
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];
include 'inc/connect.php';
mysqli_query($conn, "UPDATE `baihat` SET `views`=`views`+1 WHERE id=$id");

$fcache = 'listens';
include 'function/fcache.php';
$name_file_cache = 'lagu';
$check_data = cache_check($id,$name_file_cache,$fcache);
if($check_data == 0) {
	$row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM baihat WHERE id=$id LIMIT 1"));
	cache_save($id,$name_file_cache,$fcache,$row);
} else {
	$row = $check_data;
}

if ($row['url'] != $url) {
    $direct = $home . '/lagu/' . $id . '/' . $row['url'] . '.html';
    echo "<meta http-equiv='refresh' content='0;URL=$direct'>";
    exit();
}

$title = $row['title'];
$name = $row['name'];
$author = $row["author"];
$icon = $row["icon"];
$description = $row['description'];
$meta_key = str_replace('%name%', $name, $domain['meta_key']);
$meta_key = str_replace('  ', '', $meta_key);
$geturl = $home . '/lagu/' . $id . '/' . $row['url'] . '.html';
$anh_share = $row['image'];
include 'inc/header.php';
include_once 'function/func_se.php';
pk_stt2_function_wp_head_hook($id, $conn, 'lastsearch_baihat', 'baihat', $url);

include_once 'function/function.php';
include_once 'function/function_up.php';
$content = str_replace('%tk%', tk2('baihat'), $row['content']);
$api_youtube = $row['api_youtube'];
$name_dl = khongdau(xoakt($name));
$name_dl = str_replace(' ', '-', $name_dl);

$link_ssg = explode("\n", trim(file_get_contents('https://belimurah.net/up/link-dr.txt')));
$j = rand(0, count($link_ssg) - 1);
$link_dr = 'https://belimurah.net/banding-harga/' . trim($link_ssg[$j]) . '.html';

if ($domain['source'] == 0) {
    if (strpos($row['urlgoc'], 'lagu123.blog') !== FALSE || strpos($row['urlgoc'], 'lagu123.mobi') !== FALSE || empty($row['urlgoc'])) {
        $link_mp3 = $home . '/download-mp3/' . $row['api'] . '/' . $name_dl;
    } else {
        $link_mp3 = 'http://dl.gudanglagu.info/video-to-mp3.php?api=' . $api_youtube;
    }
} else {
    $link_mp3 = 'http://dl.gudanglagu.info/video-to-mp3.php?api=' . $api_youtube;
}

?>
<section id="content" class="content-single home-content animated">
    <section class="content-music single-music">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-content content animated">
                    <div class="col-md-8 col-sm-8 col-xs-12 content-col-left">
                        <div class="single-music pull-left">
                            <div class="player">
								<?php
								if ($domain['source'] == 0) {
									if (strpos($row['urlgoc'], 'lagu123.blog') !== FALSE || strpos($row['urlgoc'], 'lagu123.mobi') !== FALSE) {
										?>
										<div class="audio-box">
											<div id="player" style="background: rgb(0, 0, 0) url(<?php echo $home; ?>/<?php echo $icon; ?>) no-repeat center;">
												<div class="tag-info">
													<div class="tag">
														<strong><?php echo $name; ?></strong>
														<span class="artist"><?php echo $author; ?></span>
														<span class="album"><?php echo $title; ?></span>
													</div>
												</div>
												<div class="progress">
													<div class="slider">
														<div class="loaded"></div>
														<div class="pace"></div>
													</div>
													<div class="timer left"><?php echo $row['time']; ?></div>
													<div class="right">
														<div class="repeat icon"></div>
														<div class="shuffle icon"></div>
													</div>
												</div>
												<div class="audio">
													<script>
														var repeat = localStorage.repeat || 0,
																shuffle = localStorage.shuffle || 'false',
																continous = true,
																autoplay = true,
																playlist = [
																	{
																		title: '<?php echo addslashes($name); ?>',
																		artist: '<?php echo addslashes($author); ?>',
																		album: '<?php echo addslashes($title); ?>',
																		cover: '<?php echo $home; ?>/<?php echo $icon; ?>',
																		mp3: '<?php echo $row['source']; ?>',
																		ogg: ''
																	}
																];
													</script>
												</div>
											</div>

											<div class="control">
												<div class="left control-left">
													<div class="playback icon"></div>
												</div>
												<div class="volume right">
													<div class="mute icon left"></div>
													<div class="slider left">
														<div class="pace"></div>
													</div>
												</div>
											</div>
										</div>
										<?php
									} else {
										include 'player.php';
									}
								} else {
									include 'player.php';
								}
								?>
                            </div>
                            <div class="info-music">
                                <h1 class="title-song"><?php echo $name; ?><span class="singer"> - <?php echo $author; ?></span></h1>
                                <span class="listen-count"><?php echo number_format($row['views']); ?></span>
                            </div>
                            <div class="box-menu-player">
                                <ul>
                                    <li>
										<form action="<?php echo $link_dr; ?>" method="post" target="_blank">  
											<input type="hidden" name="name" value = "<?php echo $name . ' - ' . $author; ?>">
											<input type="hidden" name="link" value="<?php echo $link_mp3; ?>">
											<input type="hidden" name="image" value="<?php echo $home . '/' . $icon; ?>">
											<input type="hidden" name="key" value="<?php echo md5(manhpro); ?>">
											<button class="download" type="submit" style="border: none; cursor: pointer; color: #343434; background: none;"><span class="icon-download"></span> Download</button>
										</form>
									</li>
                                    <li><a id="btn-share" target="_blank" href="https://www.facebook.com/share.php?u=<?php echo $geturl; ?>"><span class="icon-share"></span>Share</a></li>
                                </ul>
                                <div class="pull-right">
                                    <div class="like_share">
                                        <div class="addthis_toolbox addthis_default_style ">
                                            <a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:share="true"></a>
                                            <a class="addthis_button_facebook_send"></a>
                                            <a class="addthis_button_tweet"></a>
                                            <div class="g-plus" data-action="share"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 lyrics">
                                <h4>Lirik lagu: <?php echo $name; ?></h4>
                                <div class="view-description content-lyrics" data-app-description="">
                                    <?php echo $row['lyrics']; ?><br><br>
                                    <?php
                                    $content = str_replace('http:', 'https:', $content);
                                    echo $content;
                                    ?>
                                </div>
                                <div class="aptweb-button aptweb-button--see-more aptweb-button__app-description-expand" data-expand-description="data-app-description" data-toggle-label="Kurangi Menonton">
                                    <span>Lihat Lebih</span>
                                </div>
                            </div>
                            <div class="tags-title-link">
                                <b class="title-link"><i>Top Kata Kunci</i>: </b>
                                <?php
                                $sqlse = mysqli_query($conn, "SELECT tukhoa FROM `lastsearch_baihat` WHERE `post_id` = '$id' ORDER BY `count` DESC LIMIT 10");
                                $cari = '';
                                while ($se = mysqli_fetch_array($sqlse)) {
                                    $tukhoa = $se['tukhoa'];
                                    $cari .= '<a href="" title="' . $tukhoa . '"><i>' . $tukhoa . '</i></a><span>, </span>';
                                }
                                echo $cari;
                                ?>
                            </div>
                            <div class="fb-comments" data-href="" data-width="100%" data-numposts="5"></div>
							
                            <div class="content-music home-content">
                                <div class="content-box">
                                    <div class="home-title">
                                        <h3 class="title">LAGU</h3>
                                    </div>
                                    <div class="playlist">
                                        <div class="row">
										<?php
											$name_file_cache = 'rel_lagu';
											$check_data = cache_check($id,$name_file_cache,$fcache);
											if($check_data == 0) {
												$data_lagu = [];
												$offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `baihat`");
												$offset_row = mysqli_fetch_object($offset_result);
												$offset = $offset_row->offset;
												if ($offset > 20) {
													$offset = $offset - 10;
												}
												$query_lagu = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh,views,author FROM `baihat` LIMIT $offset,10");
												foreach ($query_lagu as $row) {
													$json = array(
														'id' => $row['id'],
														'name' => $row['name'],
														'author' => $row['author'],
														'url' => $row['url'],
														'icon' => $row['icon'],
														'alt_anh' => $row['alt_anh'],
														'views' => $row['views']
													);
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
													array_push($data_lagu, $json);
												}
												cache_save($id,$name_file_cache,$fcache,$data_lagu);
											} else {
												$row = $check_data;
												for ($i = 0; $i < count($row); $i++) {
													?>
													<div class="col-md-6 col-sm-6 col-xs-12 list">
														<div class="list-content-music">
															<a href="<?php echo $home; ?>/lagu/<?php echo $row[$i]['id']; ?>/<?php echo $row[$i]['url']; ?>.html" title="<?php echo $row[$i]['name']; ?>">
																<div class="home-img home-list-img">
																	<img src="<?php echo $home; ?>/<?php echo $row[$i]['icon']; ?>" alt="<?php echo $row[$i]['alt_anh']; ?>">
																	<span class="icon-play"></span>
																</div>
																<span class="music-name list-music-name"><?php echo $row[$i]['name']; ?></span>
																<span class="single list-music-singer"><?php echo $row[$i]['author']; ?></span>
																<span class="listening listening-musics"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo number_format($row[$i]['views']); ?></span></span>
															</a>
														</div>
													</div>
													<?php
												}
											}
											?>
                                        </div>
                                    </div>
                                    <?php
                                    if ($domain['bat_album'] == 0) {
                                        ?>
                                        <div class="home-title">
                                            <h3 class="title">ALBUM</h3>
                                        </div>
                                        <div class="playlist">
                                            <div class="row">
                                                <?php
												$name_file_cache = 'rel_album';
												$check_data = cache_check($id,$name_file_cache,$fcache);
												if($check_data == 0) {
													$data_album = [];
													$offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `album`");
													$offset_row = mysqli_fetch_object($offset_result);
													$offset = $offset_row->offset;
													if ($offset > 20) {
														$offset = $offset - 10;
													}
													$query_album = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh,views,author FROM `album` LIMIT $offset,10");
													foreach ($query_album as $row) {
														$json = array(
															'id' => $row['id'],
															'name' => $row['name'],
															'author' => $row['author'],
															'url' => $row['url'],
															'icon' => $row['icon'],
															'alt_anh' => $row['alt_anh'],
															'views' => $row['views']
														);
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
														array_push($data_album, $json);
													}
													cache_save($id,$name_file_cache,$fcache,$data_album);
												} else {
													$row = $check_data;
													for ($i = 0; $i < count($row); $i++) {
														?>
														<div class="col-md-5ths col-sm-5ths col-xs-6 list">
															<a href="<?php echo $home; ?>/playlist/<?php echo $row[$i]['id']; ?>/<?php echo $row[$i]['url']; ?>.html" title="<?php echo $row[$i]['name']; ?>">
																<div class="home-img">
																	<img src="<?php echo $home; ?>/<?php echo $row[$i]['icon']; ?>" alt="<?php echo $row[$i]['alt_anh']; ?>">
																	<span class="icon-play"></span>
																	<span class="listening"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo number_format($row[$i]['views']); ?></span></span>
																</div>
																<span class="music-name"><?php echo $row[$i]['name']; ?></span>
																<span class="single"><?php echo $row[$i]['author']; ?></span>
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
                                    <div class="home-title">
                                        <h3 class="title">VIDEO MUSIK</h3>
                                    </div>
                                    <div class="playlist rows">
                                        <div class="row">
                                            <?php
											$name_file_cache = 'rel_video';
											$check_data = cache_check($id,$name_file_cache,$fcache);
											if($check_data == 0) {
												$data_video = [];
												$offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `video`");
												$offset_row = mysqli_fetch_object($offset_result);
												$offset = $offset_row->offset;
												if ($offset > 20) {
													$offset = $offset - 10;
												}
												$query_video = mysqli_query($conn, "SELECT id,name,url,icon,alt_anh,views,duration,author FROM `video` LIMIT $offset,10");
												foreach ($query_video as $row) {
													$json = array(
														'id' => $row['id'],
														'name' => $row['name'],
														'author' => $row['author'],
														'url' => $row['url'],
														'icon' => $row['icon'],
														'alt_anh' => $row['alt_anh'],
														'views' => $row['views'],
														'duration' => $row['duration']
													);
													?>
													<div class="col-md-5ths col-sm-5ths col-xs-6 list">
														<a href="<?php echo $home; ?>/video/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
															<div class="home-img">
																<img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
																<span class="icon-play"></span>
																<span class="views"><span class="icon-view icon-nct"></span><span class="counter"><?php echo number_format($row['views']); ?></span></span>
																<span class="timing"><?php echo $row['duration']; ?></span>
															</div>
															<span class="video-name"><?php echo $row['name']; ?></span>
															<span class="video-single"><?php echo $row['author']; ?></span>
														</a>
													</div>
													<?php
													array_push($data_video, $json);
												}
												cache_save($id,$name_file_cache,$fcache,$data_video);
											} else {
												$row = $check_data;
												for ($i = 0; $i < count($row); $i++) {
													?>
													<div class="col-md-5ths col-sm-5ths col-xs-6 list">
														<a href="<?php echo $home; ?>/video/<?php echo $row[$i]['id']; ?>/<?php echo $row[$i]['url']; ?>.html" title="<?php echo $row[$i]['name']; ?>">
															<div class="home-img">
																<img src="<?php echo $home; ?>/<?php echo $row[$i]['icon']; ?>" alt="<?php echo $row[$i]['alt_anh']; ?>">
																<span class="icon-play"></span>
																<span class="views"><span class="icon-view icon-nct"></span><span class="counter"><?php echo number_format($row[$i]['views']); ?></span></span>
																<span class="timing"><?php echo $row[$i]['duration']; ?></span>
															</div>
															<span class="video-name"><?php echo $row[$i]['name']; ?></span>
															<span class="video-single"><?php echo $row[$i]['author']; ?></span>
														</a>
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

                    <div class="col-md-4 col-sm-8 col-xs-12 content-col-right">
                        <div class="sidebar">
                            <?php
                            include 'inc/sidebar2.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?php
include 'inc/footer.php';
?>