<?php 
include 'SISAIHDownloader.php';
$aih = new SISAIHDownloader();
echo $aih->getRemoteContent();
?>