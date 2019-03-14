<?php

/* search Term */

function pk_stt2_function_get_referer() {
    if (!isset($_SERVER['HTTP_REFERER']) || ($_SERVER['HTTP_REFERER'] == ''))
        return false;
    $referer_info = parse_url($_SERVER['HTTP_REFERER']);
    @$referer = $referer_info['host'];
    if (substr($referer, 0, 4) == 'www.')
        $referer = substr($referer, 4);
    return $referer;
}

function pk_stt2_function_get_delimiter($ref) {
    $search_engines = array(
        'google.com' => 'q',
        'go.google.com' => 'q',
        'images.google.com' => 'q',
        'video.google.com' => 'q',
        'news.google.com' => 'q',
        'blogsearch.google.com' => 'q',
        'maps.google.com' => 'q',
        'local.google.com' => 'q',
        'search.yahoo.com' => 'p',
        'search.msn.com' => 'q',
        'bing.com' => 'q',
        'msxml.excite.com' => 'qkw',
        'search.lycos.com' => 'query',
        'alltheweb.com' => 'q',
        'search.aol.com' => 'query',
        'search.iwon.com' => 'searchfor',
        'ask.com' => 'q',
        'ask.co.uk' => 'ask',
        'search.cometsystems.com' => 'qry',
        'hotbot.com' => 'query',
        'overture.com' => 'Keywords',
        'metacrawler.com' => 'qkw',
        'search.netscape.com' => 'query',
        'looksmart.com' => 'key',
        'dpxml.webcrawler.com' => 'qkw',
        'search.earthlink.net' => 'q',
        'search.viewpoint.com' => 'k',
        'yandex.kz' => 'text',
        'yandex.ru' => 'text',
        'baidu.com' => 'wd',
        'mamma.com' => 'query',
        'coccoc.com' => 'query'
    );
    $delim = false;
    if (isset($search_engines[$ref])) {
        $delim = $search_engines[$ref];
    } else {
        if (strpos('ref:' . $ref, 'google'))
            $delim = "q";
        elseif (strpos('ref:' . $ref, 'search.atomz.'))
            $delim = "sp-q";
        elseif (strpos('ref:' . $ref, 'search.msn.'))
            $delim = "q";
        elseif (strpos('ref:' . $ref, 'search.yahoo.'))
            $delim = "p";
        elseif (preg_match('/home\.bellsouth\.net\/s\/s\.dll/i', $ref))
            $delim = "bellsouth";
    }
    return $delim;
}

////

function pk_stt2_db_save_searchterms($meta_value, $id, $conn, $ls, $table, $url) {
    global $_SERVER;
    $success = '';
    $meta_value = trim(mb_strtolower(html_entity_decode($meta_value, ENT_QUOTES, 'UTF-8'), 'UTF-8'));
    if (!preg_match('/(http|https)/i', $meta_value)) {

        if (strlen($meta_value) > 3 && $id) {
            if ($url != '') {
                $val = bokhoangtrang_search($meta_value);
                $val = trim($val);
                if (!preg_match('/(\.tube|\.co|www|\.net|\.xyz|\.id|\.org|\.site|\.info|\.mobi|\.fun|\/(.*?)\/|\.biz|\.blog|\.zone|\.live|\.me|\.tv|\.top|http|\?|\=|\.\d+)/', $val)) {
                    $offset_result = mysqli_query($conn, "SELECT COUNT(*) AS `offset` FROM `$ls` WHERE `tukhoa` = '" . addslashes($val) . "'");
                    $offset_row = mysqli_fetch_object($offset_result);
                    $offset = $offset_row->offset;
                    if ($offset < 1) {
                        mysqli_query($conn, "INSERT INTO `$ls` SET
			            `tukhoa` = '" . addslashes(@$val) . "',
			            `time` = '" . time() . "',
        			            `post_id` = '" . addslashes($id) . "',
                                                `url` = '" . $url . "',
        			             `count` = '1'
        				            ");
                    } else {
                        mysqli_query($conn, "UPDATE `$ls` SET
        				`count` = `count` + 1,
                                        `time` = '" . time() . "'
        				 WHERE `tukhoa` = '" . addslashes(@$val) . "'
        					");
                    }
                    $success = 1;
                }
            }
        }
    }
    return $success;
}

/**
 * retrieve the search terms from search engine query
 * */
function pk_stt2_function_get_terms($d) {
    $terms = null;
    $query_array = array();
    $query_terms = null;
    @$query = explode($d . '=', $_SERVER['HTTP_REFERER']);
    @$query = explode('&', $query[1]);
    @$query = urldecode($query[0]);
    $query = str_replace("'", '', $query);
    $query = str_replace('"', '', $query);
    $query_array = preg_split('/[\s,\+]+/', $query);
    $query_terms = implode(' ', $query_array);
    $terms = htmlspecialchars(urldecode(trim($query_terms)));
    return $terms;
}

////   
function pk_stt2_function_wp_head_hook($id, $conn, $ls, $table, $url) {
    $referer = pk_stt2_function_get_referer();
    if (!$referer)
        return false;
    $delimiter = pk_stt2_function_get_delimiter($referer);
    if ($delimiter) {
        $term = pk_stt2_function_get_terms($delimiter);
        return pk_stt2_db_save_searchterms($term, $id, $conn, $ls, $table, $url);
    }
}

// Tu khoa
function pk_stt2_function_prepare_searchterms($searchterms, $options, $popular = false) {
    global $post;
    $options = pk_stt2_function_stripslashes_options($options);
    $toReturn .= ( $popular == false ) ? $options['list_header'] . $options['before_list'] : $options['before_list'];
    foreach ($searchterms as $term) {
        if (0 == $options['auto_link']) {
            $toReturn .= $options['before_keyword'] . $term->meta_value;
        } else {
            if (!$popular) {
                if (1 == $options['auto_link']) {
                    $permalink = get_permalink($post->ID);
                } elseif (2 == $options['auto_link']) {
                    $permalink = get_bloginfo('url') . '/search/' . user_trailingslashit(pk_stt2_function_sanitize_search_link($term->meta_value));
                }
            } else {
                $permalink = ( 0 == $term->post_id ) ? get_bloginfo('url') : get_permalink($term->post_id);
            }
            $toReturn .= $options['before_keyword'] . "<a href=\"$permalink\" title=\"$term->meta_value\">$term->meta_value</a>";
        }
        $toReturn .= ( $options['show_count'] == true ) ? " ($term->meta_count)" . $options['after_keyword'] : $options['after_keyword'];
    }
    $toReturn = trim($toReturn, ', ');
    $toReturn .= $options['after_list'];
    //$toReturn = htmlspecialchars_decode($toReturn);
    return $toReturn;
}

function bokhoangtrang_search($string) {
    while (strlen(strstr($string, "  ")) > 0) {
        $string = str_replace("  ", " ", $string);
    }
    return trim($string);
}

?>