<?php
/**
 * Hàm Tạo & Chia thư mục theo tỉ lệ
 */

///Check & tạo thư mục chính
$checkf = file_exists("caches");
if(!$checkf == 'TRUE')
{
$taof = mkdir("caches");
$fp=fopen("caches/index.html","w+");
chmod("caches/index.html", 0444);
$content = '<html>
<head>
<title>Error!</title>
</head>
<body>
Not Found!
</body>
</html>';
fwrite($fp,$content);
fclose($fp);
}

$checkf = file_exists("caches/$fcache");
if(!$checkf == 'TRUE')
{
$taof = mkdir("caches/$fcache");
$fp=fopen("caches/$fcache/index.html","w+");
chmod("caches/$fcache/index.html", 0444);
$content = '<html>
<head>
<title>Error!</title>
</head>
<body>
Not Found!
</body>
</html>';
fwrite($fp,$content);
fclose($fp);
}

///Check & tạo thư mục con chia theo ID
$folder_by_id = number_format($id/1000); ///tỉ lệ 1000 bài 1 thư mục
$checkf = file_exists("caches/$fcache/$folder_by_id");
if(!$checkf == 'TRUE')
{
$taof = mkdir("caches/$fcache/$folder_by_id");
$fp=fopen("caches/$fcache/$folder_by_id/index.html","w+");
chmod("caches/$fcache/$folder_by_id/index.html", 0444);
$content = '<html>
<head>
<title>Error!</title>
</head>
<body>
Not Found!
</body>
</html>';
fwrite($fp,$content);
fclose($fp);
}

/**
 * Funciton Cache QUERY MYSQL
 */
 
//check tồn tại hay chưa, nếu tồn tại thì lấy data cache
function cache_check($id,$name,$fcache)
{
    $folder_by_id = number_format($id/1000);
    $name_file_cache = "caches/$fcache/$folder_by_id/$id-$name.txt";
   if(file_exists($name_file_cache)=='TRUE')
        {
            $data = json_decode(file_get_contents($name_file_cache),1);
        }
        else
        {
            $data = '0';
        }
        return $data;
}

//Save nếu chưa tồn tại
function cache_save($id,$name,$fcache,$content)
{
    $folder_by_id = number_format($id/1000);
    $name_file_cache = "caches/$fcache/$folder_by_id/$id-$name.txt";
    $fp=fopen($name_file_cache,"w+");
    chmod($name_file_cache, 0444);
    fwrite($fp,json_encode($content));
    fclose($fp);
}