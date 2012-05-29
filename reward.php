<?php

$result = (int) (isset($_GET['percentage'])) ? $_GET['percentage'] : 0;
$size = (int) (isset($_GET['size'])) ? $_GET['size'] : 50;

$image = 'graphics/_600-20.png';

if($result < 0){
	$result = 0;
}

if($result > 0 && $result < 25){
	$image = 'graphics/20-40.png';
} else if($result >= 25 && $result < 50) {
	$image = 'graphics/40-60.png';
} else if($result >= 50 && $result < 75) {
	$image = 'graphics/60-80.png';
} else if($result > 75 && $result <= 100){
	$image = 'graphics/80-100.png';
} else if($result > 100){
	$result = -1000;
	$image = 'graphics/fail.png';
}

$gdimage = imagecreatefrompng($image);
$font = './fonts/Monofett.ttf';
$text = sprintf('%s%%', $result);
$fontsize = 110;

$textbox = imagettfbbox($fontsize, 0, $font, $text);

$x = ceil((530 - $textbox[2]) / 2);

$colour = imagecolorallocate($gdimage, 0, 0, 0);

imagettftext($gdimage, $fontsize, 0, $x, 117, $colour, $font, $text);

// Resize image
if($size < 50){
	$size = 50;
} else if($size > 100){
	$size = 100;
}

if($size < 100) {

	$size = ($size / 100);

	list($width, $height) = getimagesize($image);
	$newwidth = $width * $size;
	$newheight = $height * $size;

	$newimage = imagecreatetruecolor($newwidth, $newheight);
	
	imagecopyresized($newimage, $gdimage, 0,0,0,0, $newwidth, $newheight, $width, $height);
	
	$gdimage = $newimage;

}

header('Content-Type: image/png');

imagepng($gdimage);
imagedestroy($gdimage);