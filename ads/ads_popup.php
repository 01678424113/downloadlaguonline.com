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
<div id="ads_popup">
    <script language="javascript" src="http://asdfghj.lagusaya.net/js/<?php echo $home_qc; ?>/popup.js"></script>
</div>