<?php 
header("Content-type: image/jpeg"); 
if($_GET[ancho]=="") 
$_GET[ancho]=350; 
$ancho_img=$_GET[ancho]; 
$imagen_logo = imagecreatefrompng("logo.png"); 
$ancho_logo = imagesx($imagen_logo); 
$alto_logo = imagesy($imagen_logo); 
$ancho_logo_img=$ancho_img/2; 
$alto_logo_img=($ancho_logo_img/$ancho_logo)*$alto_logo; 
if(file_exists ($_GET[a].".jpg")) 
$imagen_dest = imagecreatefromjpeg($_GET[a].".jpg"); 
else if(file_exists ($_GET[a].".JPG")) 
$imagen_dest = imagecreatefromjpeg($_GET[a].".JPG"); 
else if(file_exists ($_GET[a].".png")) 
$imagen_dest = imagecreatefrompng($_GET[a].".png"); 
else if(file_exists ($_GET[a].".PNG")) 
$imagen_dest = imagecreatefrompng($_GET[a].".PNG"); 
else if(file_exists ($_GET[a].".gif")) 
$imagen_dest = imagecreatefromgif($_GET[a].".gif"); 
else $imagen_dest = imagecreatefromjpeg("sinImg.jpg"); 
$ancho_dest = imagesx($imagen_dest); 
$alto_dest = imagesy($imagen_dest); 
$alto_img = ($ancho_img/$ancho_dest)*$alto_dest; 
$im = imagecreatetruecolor($ancho_img,$alto_img); 
imagecopyresized($im,$imagen_dest,0,0,0,0,$ancho_img,$alto_img,$ancho_dest,$alto_dest); 
$ancho_muestra = ($ancho_img - $ancho_logo_img); 
$alto_muestra = ($alto_img - $alto_logo_img); 
imagecopyresized($im,$imagen_logo,$ancho_muestra,$alto_muestra,0,0,$ancho_logo_img,$alto_logo_img,$ancho_logo,$alto_logo); 
imagejpeg($im,"",80); 
imagedestroy($imagen_dest); 
imagedestroy($imagen_logo); 
imagedestroy($im); 

?>
