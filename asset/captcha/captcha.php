<?php
session_start();
$string = '';
$md5_hash = md5(rand(0,999));
$security_code = substr($md5_hash, 15, 5);
if(isset($_GET['code'])){
 $md5_hash=md5(ceil($_GET['code']*1000));   
$security_code = substr($md5_hash, 15, 5);    
}
$string=$security_code;
$_SESSION['captcha'] = $string;
$font = 'Action Man.ttf';
$image = imagecreatefrompng('captcha_background.png');
$black = imagecolorallocate($image, 0, 0, 0); // text color
$white = imagecolorallocate($image, 255, 255, 255); // background color
$silver=imagecolorallocate($image, 204, 204, 204);
$gray=imagecolorallocate($image,51,51,51);
imagettftext ($image, 20, 0, 10, 25, $gray, $font, $string);
header("Content-type: image/png");
imagepng($image);
 ?>