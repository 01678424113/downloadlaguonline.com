<?php
$api = $_GET['api'];
include_once '../inc/connect.php';
include_once '../function/function_geturl.php';
include("../function/mCurl.php");
include("../function/function.php");
include 'function_up.php';
include 'function_video.php';
include '../function/function_other.php';
include '../function/image.php';

$row = mysqli_fetch_array(mysqli_query($conn, "SELECT api FROM video WHERE api='$api' LIMIT 1"));
if ($row['api'] == $api) {
    echo 'Video is available';
    exit();
}
$video = json_decode(getVideoYoutube($api));
$image = $video->image;
$duration = mins($video->time);
$views = $video->views;
if (empty($views)) {
	$views = 0;
}
$rate = $video->rate;
$tags = $video->tags;
if (empty($tags)) {
	$tags = '';
}
$author = $video->author;
$title = title($video->name, '', 'video');
$alt_anh = title($video->name, '', 'video');
$des = des($video->name, $author, 'video');
$url = url($video->name, '', 'video');
$name = $video->name;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
            <title>Admin Music GuGi</title>
    </head>
    <body>
        <style>
            .v_frame{
                width:300px;
                height: 200px;
            }
            div{
                text-align: center;
            }
            body{
                text-align: center;
            }
            input{
                width: 600px;
                height: 20px;
            }
        </style>
        <div>
            <iframe class="v_frame" src="http://www.youtube.com/embed/<?php echo $api; ?>?rel=0&autoplay=0" frameborder="0" allowfullscreen> </iframe>
        </div>
        <table align="center">
            <form action="xuly_video.php" method="POST">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="name" id="name" value="<?php echo $name; ?>" ></input>
                    </td>
                </tr>
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" id="title" value="<?php echo $title; ?>" ></input>
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <input type="text" name="description" id="description" value="<?php echo $des; ?>" ></input>
                    </td>
                </tr>
                <tr>
                    <td>Url: </td>
                    <td>
                        <input type="text" name="url" id="url" value="<?php echo $url; ?>" ></input>
                    </td>
                </tr>
                <tr>
                    <td>Alt Image: </td>
                    <td>
                        <input type="text" name="alt_anh" id="alt_anh" value="<?php echo $alt_anh; ?>" ></input>
                    </td>
                </tr>
                <tr>
                    <td>Cat: </td>
                    <td>
                        <select name="type">
                            <option value="0">Null</option>
                            <option value="1">Pop</option>
                            <option value="2">Dangdut</option>
                            <option value="3">R&B</option>
                            <option value="4">Kpop</option>
                            <option value="5">Indo</option>
                            <option value="6">Dance</option>
                            <option value="7">Rock</option>
                            <option value="8">Remix</option>
                            <option value="9">Hip Hop</option>
                            <option value="10">Jazz</option>
                            <option value="11">Cover</option>
                            <option value="12">SKA</option>
                            <option value="13">Anak</option>
                            <option value="14">OST</option>
                            <option value="15">Rap</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="api" id="api" value="<?php echo $api; ?>" ></input>
                        <input type="hidden" name="author" id="author" value="<?php echo $author; ?>" ></input>
                        <input type="hidden" name="thumbnail" id="thumbnail" value="<?php echo $image; ?>" ></input>
                        <input type="hidden" name="views" id="views" value="<?php echo $views; ?>" ></input>
                        <input type="hidden" name="duration" id="duration" value="<?php echo $duration; ?>" ></input>
                        <input type="hidden" name="rate" id="rate" value="<?php echo $rate; ?>" ></input>
                        <input type="hidden" name="tags" id="tags" value="<?php echo $tags; ?>" ></input>
                    </td>
                    <td>
                        <input type="submit" name="submit" id="submit" value="Update" ></input>
                    </td>
                </tr>
            </form>
        </table>
    </body>
</html>