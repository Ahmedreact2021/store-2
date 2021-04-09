<?php 
session_start(); 
$text =rand(10,99).substr(md5($text),2,1).substr(md5($text),4,1).rand(10,99);

$_SESSION["vercod"] = $text; 
$height = 22; 
$width = 65; 
 
$image_p = imagecreate($width, $height); 


$black = imagecolorallocate($image_p, 54,24, 255); 
$white = imagecolorallocate($image_p, rand(1,255), rand(1,255), rand(1,255)); 
$font_size = 10; 
 
imagestring($image_p, $font_size, 4, 4, $text, $white); 
imagejpeg($image_p, null, 90); 
?>