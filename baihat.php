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
	$row = mysqli_fetch_array(mysqli_query($conn, "SELECT api,api_youtube,name,author,title,description,url,icon,lyrics,content,image,alt_anh,views,source FROM baihat WHERE id=$id LIMIT 1"));
	cache_save($id,$name_file_cache,$fcache,$row);
} else {
	$row = $check_data;
}

if ($row['url'] != $url) {
    $direct = $home . '/lagu/' . $id . '/' . $row['url'] . '.html';
    echo "<meta http-equiv='refresh' content='0;URL=$direct'>";
    exit();
}

$name = $row['name'];
$author = $row["author"];
$icon = $row["icon"];
$title = $row['title'];
$description = $row['description'];
$meta_key = str_replace('%name%', $name, $domain['meta_key']);
$meta_key = str_replace('  ', '', $meta_key);
$geturl = $home . '/lagu/' . $id . '/' . $row['url'] . '.html';
$anh_share = $row['image'];
include 'inc/header.php';
include_once 'function/func_se.php';
pk_stt2_function_wp_head_hook($id, $conn, 'lastsearch_baihat', 'baihat', $url);
include_once 'function/function.php';

$api_youtube = $row['api_youtube'];
$name2 = str_replace(' ', '-', strtolower(khongdau(xoakt($name))));
if ($domain['source'] == 0) {
	$link_mp3 = $home . '/mp3/' . $row['api'] . '/' . $name2;
} else {
    $link_mp3 = 'http://dl.gudanglagu.info/video-to-mp3.php?api=' . $api_youtube;
}
$link_dr = 'https://coin.mazurl.com';

$folder1 = 'data_baihat';
$folder2 = substr($id, 0, 3);
$file = $id;
if ($domain['cache'] == 0) {
    $cachetime = 86400;
} else {
    $cachetime = 0;
}
include 'cache_top.php';
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
																	cover: '<?php echo $home; ?>/<?php echo $row['icon']; ?>',
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
									$api_youtube = $row['api_youtube'];
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
                                <div class="view-description content-lyrics" data-app-description="">
                                    <?php echo $row['content']; ?><br><br>
									<h2 class="h2_content">Lirik lagu: <?php echo $name; ?></h2>
                                    <?php echo $row['lyrics']; ?>
                                </div>
								<?php
								if (!empty($row['lyrics']) && $row['lyrics'] != 'Saat ini tidak ada lirik untuk lagu ini...') {
									?>
									<div class="aptweb-button aptweb-button--see-more aptweb-button__app-description-expand" data-expand-description="data-app-description" data-toggle-label="Kurangi Menonton">
										<span>Lihat Lebih</span>
									</div>
									<?php
								}
								?>
                            </div>
                            <div class="tags-title-link">
                                <b class="title-link"><i>Kata kunci yang terkait</i>: </b>
                                <?php
                                $sqlse = mysqli_query($conn, "SELECT tukhoa FROM `lastsearch_baihat` WHERE `post_id` = '$id' ORDER BY `count` DESC LIMIT 10");
                                $cari = '';
                                while ($se = mysqli_fetch_array($sqlse)) {
                                    $tukhoa = $se['tukhoa'];
                                    $cari .= '<h3><a href="" title="' . $tukhoa . '"><i>' . $tukhoa . '</i></a></h3><span>, </span>';
                                }
                                echo $cari;
                                ?>
                            </div>

                            <div class="fb-comments" data-href="" data-width="100%" data-numposts="5"></div>

                            <div class="content-music home-content">
                                <div class="content-box">
                                    <div class="home-title">
                                        <h2 class="title">LAGU</h2>
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
												if ($offset > 5) {
													$offset = $offset - 5;
												}
												$query_lagu = mysqli_query($conn, "SELECT id,name,author,url,icon,alt_anh,views FROM `baihat` LIMIT $offset,5");
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
													array_push($data_lagu, $json);
												}
												cache_save($id,$name_file_cache,$fcache,$data_lagu);
											} else {
												$row = $check_data;
												for ($i = 0; $i < count($row); $i++) {
													?>
													<div class="col-md-12 col-sm-12 col-xs-12 list">
														<div class="list-content-music">
															<div class="home-img home-list-img">
																<a href="<?php echo $home; ?>/lagu/<?php echo $row[$i]['id']; ?>/<?php echo $row[$i]['url']; ?>.html" title="<?php echo $row[$i]['name']; ?>">
																	<img src="<?php echo $home; ?>/<?php echo $row[$i]['icon']; ?>" alt="<?php echo $row[$i]['alt_anh']; ?>">
																	<span class="icon-play"></span>
																</a>
															</div>
															<h3 class="music-name list-music-name">
																<a href="<?php echo $home; ?>/lagu/<?php echo $row[$i]['id']; ?>/<?php echo $row[$i]['url']; ?>.html" title="<?php echo $row[$i]['name']; ?>"><?php echo $row[$i]['name']; ?></a>
															</h3>
															<p class="single list-music-singer"><?php echo $row[$i]['author']; ?></p>
															<span class="listening listening-musics"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo number_format($row[$i]['views']); ?></span></span>
														</div>
													</div>
													<?php
												}
											}
											?>
                                        </div>
                                    </div>
                                    <?php
                                    if (strpos($domain['all_cat'], '2') !== FALSE) {
                                        ?>
                                        <div class="home-title">
                                            <h2 class="title">ALBUM</h2>
                                        </div>
                                        <div class="playlist playlist_album">
                                            <div class="row">
                                                <?php
												$name_file_cache = 'rel_album';
												$check_data = cache_check($id,$name_file_cache,$fcache);
												if($check_data == 0) {
													$data_album = [];
													$offset_result = mysqli_query($conn, "SELECT FLOOR(RAND() * COUNT(id)) AS `offset` FROM `album`");
													$offset_row = mysqli_fetch_object($offset_result);
													$offset = $offset_row->offset;
													if ($offset > 5) {
														$offset = $offset - 5;
													}
													$query_video = mysqli_query($conn, "SELECT id,name,author,url,icon,alt_anh,views FROM `album` LIMIT $offset,5");
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
															<div class="home-img">
																<a href="<?php echo $home; ?>/playlist/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
																	<img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
																	<span class="icon-play"></span>
																	<span class="listening"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo number_format($row['views']); ?></span></span>
																</a>
															</div>
															<h3 class="music-name">
																<a href="<?php echo $home; ?>/playlist/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
															</h3>
															<p class="single"><?php echo $row['author']; ?></p>
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
															<div class="home-img">
																<a href="<?php echo $home; ?>/playlist/<?php echo $row[$i]['id']; ?>/<?php echo $row[$i]['url']; ?>.html" title="<?php echo $row[$i]['name']; ?>">
																	<img src="<?php echo $home; ?>/<?php echo $row[$i]['icon']; ?>" alt="<?php echo $row[$i]['alt_anh']; ?>">
																	<span class="icon-play"></span>
																	<span class="listening"><span class="icon-listen icon-nct"></span><span class="counter"><?php echo number_format($row[$i]['views']); ?></span></span>
																</a>
															</div>
															<h3 class="music-name">
																<a href="<?php echo $home; ?>/playlist/<?php echo $row[$i]['id']; ?>/<?php echo $row[$i]['url']; ?>.html" title="<?php echo $row[$i]['name']; ?>"><?php echo $row[$i]['name']; ?></a>
															</h3>
															<p class="single"><?php echo $row[$i]['author']; ?></p>
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
                                        <h2 class="title">VIDEO MUSIK</h2>
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
												if ($offset > 4) {
													$offset = $offset - 4;
												}
												$query_video = mysqli_query($conn, "SELECT id,name,author,url,icon,alt_anh,views,duration FROM `video` LIMIT $offset,4");
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
													<div class="col-md-3 col-sm-3 col-xs-6 list">
														<div class="home-img">
															<a href="<?php echo $home; ?>/video/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
																<img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
																<span class="icon-play"></span>
																<span class="views"><span class="icon-view icon-nct"></span><span class="counter"><?php echo number_format($row['views']); ?></span></span>
																<span class="timing"><?php echo $row['duration']; ?></span>
															</a>
														</div>
														<h3 class="video-name">
															<a href="<?php echo $home; ?>/video/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
														</h3>
														<p class="video-single"><?php echo $row['author']; ?></p>
													</div>
													<?php
													array_push($data_video, $json);
												}
												cache_save($id,$name_file_cache,$fcache,$data_video);
											} else {
												$row = $check_data;
												for ($i = 0; $i < count($row); $i++) {
													?>
													<div class="col-md-3 col-sm-3 col-xs-6 list">
														<div class="home-img">
															<a href="<?php echo $home; ?>/video/<?php echo $row[$i]['id']; ?>/<?php echo $row[$i]['url']; ?>.html" title="<?php echo $row[$i]['name']; ?>">
																<img src="<?php echo $home; ?>/<?php echo $row[$i]['icon']; ?>" alt="<?php echo $row[$i]['alt_anh']; ?>">
																<span class="icon-play"></span>
																<span class="views"><span class="icon-view icon-nct"></span><span class="counter"><?php echo number_format($row[$i]['views']); ?></span></span>
																<span class="timing"><?php echo $row[$i]['duration']; ?></span>
															</a>
														</div>
														<h3 class="video-name">
															<a href="<?php echo $home; ?>/video/<?php echo $row[$i]['id']; ?>/<?php echo $row[$i]['url']; ?>.html" title="<?php echo $row[$i]['name']; ?>"><?php echo $row[$i]['name']; ?></a>
														</h3>
														<p class="video-single"><?php echo $row[$i]['author']; ?></p>
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
include 'cache_bot.php';
include 'inc/footer.php';
?>