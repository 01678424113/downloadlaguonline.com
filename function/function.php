<?php

//defined('_IN_PORTALMSV') or die('Error: restricted access');
error_reporting(0);

// Hàm Xóa Ký tự
function xoakt($str) {
//$str = preg_replace("/(.com|.net|.vn|.info|.mobi|.org|.us|.biz|.asia|.edu.vn|.pro)/", ' ', $str);
    $str = preg_replace("/({|}|@|#|©|™|―)/", ' ', $str);
    $str = str_replace('http://', ' ', $str);
    $str = str_replace('www', ' ', $str);
    $str = str_replace('＊', ' ', $str);
    $str = str_replace('■', ' ', $str);
    $str = str_replace('♪', ' ', $str);
    $str = str_replace('※', ' ', $str);
    $str = str_replace('*', ' ', $str);
    $str = str_replace('<wbr>', ' ', $str);
    $str = str_replace('<wbr />', ' ', $str);
    $str = str_replace('♥︎', ' ', $str);
    $str = str_replace('»', ' ', $str);
    $str = str_replace('=', ' ', $str);
    $str = str_replace('~', ' ', $str);
    $str = str_replace('_', ' ', $str);
    $str = str_replace('→', ' ', $str);
    $str = str_replace('', ' ', $str);
    $str = str_replace('_', ' ', $str);
    $str = str_replace('_', ' ', $str);
    $str = str_replace('_', ' ', $str);
    $str = str_replace(':', ' ', $str);
    $str = str_replace('!', ' ', $str);
    $str = str_replace('$', ' ', $str);
    $str = str_replace('[', ' ', $str);
    $str = str_replace(']', ' ', $str);
    $str = str_replace('※', ' ', $str);
    $str = str_replace('$', ' ', $str);
    $str = str_replace('‡', ' ', $str);
    $str = str_replace('®', ' ', $str);
    $str = str_replace('¼', ' ', $str);
    $str = str_replace('⇒', ' ', $str);
    $str = str_replace('???', ' ', $str);
    $str = str_replace('★', ' ', $str);
    $str = str_replace('–', ' ', $str);
    $str = str_replace('-', ' ', $str);
    $str = str_replace('…', ' ', $str);
    $str = str_replace('...', ' ', $str);
    $str = str_replace('..', ' ', $str);
    $str = str_replace('%', ' ', $str);
    $str = str_replace('(', ' ', $str);
    $str = str_replace(')', ' ', $str);
    $str = str_replace('+', ' ', $str);
    $str = str_replace('&', ' ', $str);
    $str = str_replace('  ', ' ', $str);
    $str = str_replace('   ', ' ', $str);
    $str = str_replace('|', ' ', $str);
    $str = trim($str);
    return $str;
}

// Hàm Không dấu
function khongdau($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace('/[^A-Za-z0-9| |]/', '', $str);
    $str = str_replace('  ', ' ', $str);
    $str = str_replace('|', ' ', $str);
    $str = trim($str);
    return $str;
}

function bokhoangtrang($string) {
    while (strlen(strstr($string, "  ")) > 0) {
        $string = str_replace("  ", " ", $string);
    }
    return trim($string);
}

function converter_name($string) {
    $string = preg_replace("/[\\n\\r\\t]/", "", $string);
    $string = preg_replace('/<script(.*?)>(.*?)<\/script>/', '', $string);
    $string = preg_replace('/<meta(.*?)>/', '', $string);
    $string = str_replace("<", "", $string);
    $string = str_replace(">", "", $string);
    $string = str_replace('"', "&#34;", $string);
    $string = str_replace("'", "&#39;", $string);
    $string = str_replace("<a ", "", $string);
    $string = str_replace("href=", "", $string);
    $string = str_replace("src=", "", $string);
    $string = preg_replace("/(.com|.net|.vn|.info|.mobi|.org|.us|.biz|.asia|.edu|.pro|.id|.tv)/", '', $string);
    $string = preg_replace("/({|}|@|#|©|™|―)/", ' ', $string);
    $string = str_replace('  ', ' ', $string);
    $string = str_replace('  ', ' ', $string);
    $string = str_replace('  ', ' ', $string);
    $string = str_replace('  ', ' ', $string);
    $string = str_replace('  ', ' ', $string);
    $string = str_replace('  ', ' ', $string);
    $string = str_replace('  ', ' ', $string);
    $string = str_replace('  ', ' ', $string);
    $string = str_replace('  ', ' ', $string);
    $string = str_replace('  ', ' ', $string);
    
    return trim($string);
}

?>