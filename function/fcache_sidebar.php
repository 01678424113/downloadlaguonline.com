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

$checkf = file_exists("caches/$fcache_side");
if(!$checkf == 'TRUE')
{
$taof = mkdir("caches/$fcache_side");
$fp=fopen("caches/$fcache_side/index.html","w+");
chmod("caches/$fcache_side/index.html", 0444);
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
 * Funciton Cache QUERY MYSQL Sidebar
 */

function cache_check_side($name,$fcache_side)
{
    $name_file_cache = "caches/$fcache_side/$name.txt";
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

function cache_save_side($name,$fcache_side,$content)
{
    $name_file_cache = "caches/$fcache_side/$name.txt";
    $fp=fopen($name_file_cache,"w+");
    chmod($name_file_cache, 0444);
    fwrite($fp,json_encode($content));
    fclose($fp);
}