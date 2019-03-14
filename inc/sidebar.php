<?php
include_once 'function/function.php';
include_once 'function/function_up.php';
include_once 'function/func.php';
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$top100 = "http://api.downloadlagu247.com/top-100.php";
?>

<div class="sidebar-box">
    <div class="home-title">
        <h2 class="title bxh">CHARTS LAGU <i class="fa fa-angle-right"></i></h2>
    </div>

    <div class="box-bxh sidebar-charts">
        <div class="tab-content active" id="indo">
            <div id="song-list_ID">
                <?php
				$id_song = 0;
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
						$id_song++;
						?>
						<div class="song-list">
							<span class="stt"><?php echo $id_song; ?></span>
							<a href="<?php echo $home; ?>/lagu/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
								<img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
							</a>
							<h3 class="song-name">
								<a href="<?php echo $home; ?>/lagu/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
							</h3>
							<p class="singer"><?php echo $row['author']; ?></p>
						</div>
						<?php
						if ($row['id'] == 10) {
							break;
						}
					}
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="sidebar-box sidebar-video">
    <div class="home-title">
        <h2 class="title bxh">CHARTS VIDEO LAGU <i class="fa fa-angle-right"></i></h2>
    </div>

    <div class="box-bxh sidebar-charts">
        <div class="tab-content active" id="indo-vi">
            <?php
            $query = mysqli_query($conn, "SELECT id,url,icon,alt_anh,name,views,author FROM video WHERE cat LIKE '%Indo%' ORDER BY views DESC LIMIT 10");
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <div class="song-list">
                    <div class="home-img">
                        <a href="<?php echo $home; ?>/video/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>">
                            <img src="<?php echo $home; ?>/<?php echo $row['icon']; ?>" alt="<?php echo $row['alt_anh']; ?>">
                            <span class="icon-play"></span>
                        </a>
                    </div>
                    <h3 class="song-name">
                        <a href="<?php echo $home; ?>/video/<?php echo $row['id']; ?>/<?php echo $row['url']; ?>.html" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
                    </h3>
                    <p class="singer"><?php echo $row['author']; ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<div class="sidebar-box lastsearch">
    <p class="lastsearch-title"><i class="fa fa-link"></i>Top Kata Kunci</p>
    <div class="lastsearch-content">
        <?php
        $sqlse2 = mysqli_query($conn, "SELECT * FROM `lastsearch_baihat` ORDER BY `time` DESC LIMIT 10");
        $ls = '';
        while ($se2 = mysqli_fetch_array($sqlse2)) {
            $post_id2 = $se2['post_id'];
            $tukhoa2 = $se2['tukhoa'];
            $ls .= '<h3><a class="" href="' . $home . '/lagu/' . $post_id2 . '/' . $se2['url'] . '.html" title="' . $tukhoa2 . '">' . $tukhoa2 . '</a></h3><span>, </span> ';
        }

        $sqlse2 = mysqli_query($conn, "SELECT * FROM `lastsearch_album` ORDER BY `time` DESC LIMIT 5");
        while ($se2 = mysqli_fetch_array($sqlse2)) {
            $post_id2 = $se2['post_id'];
            $tukhoa2 = $se2['tukhoa'];
            $ls .= '<h3><a class="" href="' . $home . '/playlist/' . $post_id2 . '/' . $se2['url'] . '.html" title="' . $tukhoa2 . '">' . $tukhoa2 . '</a></h3><span>, </span>';
        }

        $sqlse2 = mysqli_query($conn, "SELECT * FROM `lastsearch_video` ORDER BY `time` DESC LIMIT 5");
        while ($se2 = mysqli_fetch_array($sqlse2)) {
            $post_id2 = $se2['post_id'];
            $tukhoa2 = $se2['tukhoa'];
            $ls .= '<h3><a class="" href="' . $home . '/video/' . $post_id2 . '/' . $se2['url'] . '.html" title="' . $tukhoa2 . '">' . $tukhoa2 . '</a></h3><span>, </span>';
        }

        echo $ls;
        ?>
    </div>
</div>