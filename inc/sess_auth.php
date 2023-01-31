<?php 
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['userdata']) && !strpos($link, 'login.php')){
	redirect('login.php');
}
if(isset($_SESSION['userdata']) && strpos($link, 'login.php')){
	redirect('index.php');
}
