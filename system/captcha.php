<?php
session_start();
$random_alpha = md5(rand());
$captcha_code = substr($random_alpha, 0, 6);
$_SESSION["captcha_code"] = $captcha_code;
$target_layer = imagecreatetruecolor(65, 30);
$captcha_background = imagecolorallocate($target_layer, 2, 117, 216);
imagefill($target_layer, 0, 0, $captcha_background);
$captcha_text_color = imagecolorallocate($target_layer, 247, 247, 247);
imagestring($target_layer, 5, 5, 5, $captcha_code, $captcha_text_color);
header("Content-type: image/jpeg");
imagejpeg($target_layer);
