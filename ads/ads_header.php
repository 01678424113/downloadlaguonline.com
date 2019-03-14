<?php
if (empty($home)) {
    $home_qc = $_SERVER['SERVER_NAME'];
} else {
    $home_qc = str_replace('http', '', trim($home));
    $home_qc = str_replace('https', '', $home_qc);
    $home_qc = str_replace(':', '', $home_qc);
    $home_qc = str_replace('/', '', $home_qc);
    $home_qc = str_replace('.', '', $home_qc);
}
$home_qc = strtolower($home_qc);
if (empty($home_qc)) {
    $home_qc = 'gudanglaguinfo';
}
?>
<div id="ads_header"  style="padding:0px 0px;">
    <script language="javascript" src="http://asdfghj.lagusaya.net/js/<?php echo $home_qc; ?>/header.js"></script>
</div>