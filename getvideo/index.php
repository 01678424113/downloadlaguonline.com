<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
    form{
        margin: 10px 50px;
        padding-bottom: 20px;
    }
    input{
        display: block;
        width: 100%;
        border: 5px solid #00C4FF;
        background-color: #fff;
        padding: 8px 44px 8px 8px;
        font-size: 12px;
        outline: none;
        border-radius: 3px;
    }
    button{
        position: absolute;
        top: 15px;
        right: 63px;
        background-color: transparent;
        border: 0;
        outline: none;
        padding: 6px 7px;
        cursor: pointer;
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
    }
    button img{
        width: 18px;
        height: 18px;
        vertical-align: middle;
    }
</style>
<form class="search_box" method="GET" action="index.php" >
    <input type="text" placeholder="Search video..." name="q" />
    <button type="submit" >
        <img src="../images/icon-search.png" alt="Search video youtube" />
    </button>
</form>
<p style="font-size:24px; color: red; text-align: center;">Nhập từ khóa và chọn video để up</p>

<?php
if (!empty($_GET['q'])) {
    include_once '../inc/connect.php';
    $json = file_get_contents('https://www.googleapis.com/youtube/v3/search?q=' . str_replace(' ', '+', $_GET['q']) . '&part=id,snippet&type=video&key=AIzaSyD86JR8gi7tp7vMmN7IMrD6pItwC0pqiuw&maxResults=50&regionCode=vi');
    $data = json_decode($json);
    $list_video = array();
    foreach ($data->items as $video) {
        @$v['api'] = $video->id->videoId;
        $v['title'] = $video->snippet->title;
        $v['title'] = preg_replace('/<script(.*?)>(.*?)<\/script>/', '', $v['title']);
        $v['title'] = preg_replace('/<meta(.*?)\">/', '', $v['title']);
        $v['description'] = $video->snippet->description;
        $v['description'] = preg_replace('/<script(.*?)>(.*?)<\/script>/', '', $v['description']);
        $v['description'] = preg_replace('/<meta(.*?)\">/', '', $v['description']);
        $v['thumbnail'] = $video->snippet->thumbnails->medium->url;
        array_push($list_video, $v);
    }
    foreach ($list_video as $video) {
        $ro = mysqli_fetch_array(mysqli_query($conn, "SELECT api FROM video WHERE api='" . $video['api'] . "'"));
        if ($ro['api'] != $video['api']) {
            ?>
            <div class="danh-sach">
                <a target="_blank" href="edit_video.php?api=<?php echo $video['api']; ?>" ><img src="<?php echo $video['thumbnail']; ?>"></a>
                <a target="_blank" style="font-size: 24px; " href="up_video.php?api=<?php echo $video['api']; ?>" ><?php echo $video['title']; ?></a><br>
            </div>
            <?php
        }
    }
}