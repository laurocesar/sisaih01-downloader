<?php 
header('Content-Type: text/html; charset=utf-8');

include 'SISAIHDownloader.php';
$aih = new SISAIHDownloader();

echo '<pre>';
echo $aih->getRemoteContent();
echo '</pre>';
?>