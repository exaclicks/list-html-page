<?php
session_start();
$host = $_SERVER["HTTP_HOST"];
$uri = $_SERVER["REQUEST_URI"];
$http_referer = $_SERVER["HTTP_REFERER"];
$name = 'language';
$redirect_session_name = 'redirect_session_name';

$value = time();
$expire = time() + 60*10; // 10 mins from now
$path = '/blog';
$domain = 'www.puhex.com';
$secure = isset($_SERVER['HTTPS']); // or use true/false
$httponly = true;
$cache = false;
if(isset($_SESSION["language"])){
    if($_SESSION["language"]>time()){
        $cache = true;
    }
}
$new_link = $host.$uri;
$fake_link = "login.php";

if(!isset($http_referer)){
    if($cache){
        if(isset($_SESSION["redirect_session_name"])){
            if($_SESSION["redirect_session_name"]<time()){
                 redirect($new_link);
            }
        }
    }else{
        redirect($fake_link);
    }
}else{
    setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
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

    
    setcookie($redirect_session_name, $value, $expire, $path, $domain, $secure, $httponly);

    echo '<script type="text/javascript">';
    echo 'window.location.href="'.$url.'";';
    echo '</script>';
    echo '<noscript>';
    echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
    echo '</noscript>'; exit;
}




?>
