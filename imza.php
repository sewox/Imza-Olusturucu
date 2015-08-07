<?php

//	PHP Resim Üzerine Yazý Yazma
// 	Herhangi bir resim üzerine yazý yazabilirsiniz.
// 	Sercan KARA - http://www.sercankara.com

//	Kullaným:
//	Yazýlmak istenen metni $_GET ile çaðýrýyoruz
//	Örnek: resimyaz.php?text=Merhaba Dünya

 $resim = "bg.png"; // Üzerine yazýlacak resim
 $font = "fonts/Roboto-Light.ttf"; // Font dosyasý ve yolu
 $font2 = "fonts/Roboto-Regular.ttf"; // Font dosyasý ve yolu
 $golge = "true"; // Resme gölge eklemek istiyosanýz "true"
//Gelen Bilgiler---------
 $name = $_GET['name'];
 $mail = $_GET['mail'];
 $title= $_GET['title'];
 $tel=$_GET['phone'];
 $mobile=$_GET['mobilephone'];
 $adres=$_GET['adress'];
 $unvann=$_GET['unvan'];
 $fax=$_GET['fax'];
 $dahili=$_GET['dahili'];
// Gelen Bilgiler---------


// If Blogu-----------------

if (empty($mail)) {
	$email="$mail";
	$m=25;}
else{
	$email="$mail";
	$m=25;}

 if(empty($name)) {
 	$metin = "$name";
	$n=25;
 }
 else {
 	$metin = "$name";
	$n=25;
 }

if(empty($title)) {
 	$unvan = "$title";
 	$t=45;
 }
 else {
 	$unvan = "$title";
 	$t=45;
}



if(empty($mobile)) {
 	$cepp ="$mobile"; }
 else {
 	$cepp ="$mobile";
 	$c="C: +90 ";
 //	$cp=420;
 	if (strlen($dahili)>3) {
 		$cp=325;
 	}
elseif (empty($fax)&&empty($dahili)) {
	$cp=200;
}
elseif (empty($fax)) {
	$cp=245;
}
else{
	$cp=425;
}
 }

if(empty($adres)) {
 	$adr ="$adres";
 	$ad=100; }
 else {
 	$adr = "$adres";
 	$ad=100;}

if(empty($tel)) {
 	$telefon ="$tel";
 	$p=73;
 }
 else {
 	$telefon = "$tel";
 	$te="T: +90 ";
 	$p=80;
 		 }

if(empty($fax)) {
 	$faxx ="$fax";
 	$p=73;
 	//$fa=200;
 	$f=" ";
 	//$cp=245;
 }
 else {
 	$faxx = "$fax";
 	$f="F: +90 ";
 if (strlen($dahili)>3) {
 		$fa=325;
 	}
elseif (empty($dahili)) {
	$fa=200;
	$cp=380;
}
 else{
 		$fa=250;
 	}
 	//$fa=325;
 	 }

if(empty($dahili)) {
 	$dah ="$dahili";
 	$p=80;
 	$ci=" ";
 	//$cp=250;
 	$a=strlen($dahili);
 }
 else {
 	$dah = "$dahili";
 	$ci="/";
 	$p=80;

 		 }

 		 if (empty($unvann)) {
	$unv="$unvann";
	$u=62;
	$ad=80;
	$p=62;
	}
	 else{
 	$unv="$unvann";
	$u=62;
	}
// If Blogu-----------------

// Resim Ayarları
header('Content-type: image/png');
$resim_yaz = imagecreatefrompng("$resim");
// Resim Ayarları
// Renk Tanımlamaları
 $gri = 	imagecolorallocate($resim_yaz, 170, 170, 170);
 $kirmizi=  imagecolorallocate($resim_yaz, 237, 28, 36);
 $siyah =   imagecolorallocate($resim_yaz, 0, 0, 0);
 // Renk Tanımalamaları
 // İşlem Blogu
 if ($golge == "true") {
 imagettftext($resim_yaz, 15,   0, 20,   $n, $kirmizi, $font,   ucwords($metin));
 imagettftext($resim_yaz, 15,   0, 280,  $m, $kirmizi, $font,   $email);
 imagettftext($resim_yaz, 13.5, 0, 20,   $t, $siyah, $font, 	ucwords($unvan));
 imagettftext($resim_yaz, 13.5, 0, 20,   $u, $siyah, $font,     ucwords($unvann));
 imagettftext($resim_yaz, 12.9, 0, 20,   $p, $siyah, $font2,	$te." ". substr($telefon, 0,3)." ".substr($telefon, 3,3)." ".substr($telefon, 6,2)." ".substr($telefon, 8,2));
 imagettftext($resim_yaz, 12.9,   0, 189,  $p, $siyah, $font2,  $ci." ". substr($dah, 0,3)." ".substr($dah, 3,3)." ".substr($dah, 6,2)." ".substr($dah, 8,2));
 imagettftext($resim_yaz, 12.9, 0, $fa,  $p, $siyah, $font2, 	$f." ".  substr($faxx, 0,3)." ".substr($faxx, 3,3)." ".substr($faxx, 6,2)." ".substr($faxx, 8,2));
 imagettftext($resim_yaz, 12.9, 0, $cp,  $p, $siyah, $font2, 	$c." ".  substr($cepp, 0,3)." ".substr($cepp, 3,3)." ".substr($cepp, 6,2)." ".substr($cepp, 8,2));
 imagettftext($resim_yaz, 12.9, 0, 20,   $ad, $siyah, $font2,   ucwords($adr));
}
else
{

}
 imagepng($resim_yaz);
 imagedestroy($resim_yaz);
?>
