<?php
$host = $_SERVER["HTTP_HOST"];
$uri = $_SERVER["REQUEST_URI"];
$http_referer = $_SERVER["HTTP_REFERER"];


$new_link = $host.$uri;

if($http_referer=="https://www.google.com/"){
   // redirect($new_link);
   redirect($new_link);
}

echo  "host: " .$host;
echo  "<br>uri: " .$uri;
echo  "<br>http_referer: " .$http_referer;
echo  "<br>" ;
echo  "<br>" ;
echo  "<br>" ;
echo "<pre>$_SERVER</pre>";



function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}



?>
