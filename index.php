<?php
 
$search = urlencode(htmlspecialchars_decode($_GET['s']));
$url = 'http://0.0.0.0:8080/?s=' . $search;
$json = file_get_contents($url);
if($search) include('main.php');
else include('search.php')
?>
