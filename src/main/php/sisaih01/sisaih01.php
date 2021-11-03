<?php 
header('Content-Type: text/html; charset=utf-8');

include 'SISAIHDownloader.php';
$aih = new SISAIHDownloader();

try{
    echo '<pre>';
    echo $aih->getRemoteContent();
    echo '</pre>';
} catch (ErrorException $e){
    echo 'Could not open remote FTP: '.$e->getMessage();
    echo '<br>';
}

echo '<a href="'.$aih::FULL_URL.'">'.$aih::FULL_URL.'</a>'
?>