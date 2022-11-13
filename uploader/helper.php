<?php
// variable
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/mindbox/');
const TYPE_FILE = array('image/png', 'image/jpg', 'image/jpeg', 'application/vnd.rar', 'application/zip');
const SIZE_IMG = 1 * 1024 * 1024;

// resizing image
function resize_img($file, $pathToSave, $w, $h)
{
    list($width_src, $height_src) = getimagesize($file);
    $width = ceil($w);
    $height = ceil($h);
    $img_type = getimagesize($file);
    switch (strtolower($img_type['mime'])) {
        case 'image/png':
            $img = imagecreatefrompng($file);
            break;
        case 'image/jpeg':
            $img = imagecreatefromjpeg($file);
            break;
        case 'image/gif':
            $img = imagecreatefromgif($file);
            break;
    }
    $new_img = imagecreatetruecolor($w, $h);
    imagecopyresampled($new_img, $img, 0, 0, 0, 0, $width, $height, $width_src, $height_src);
    imagepng($new_img, $pathToSave);
    imagedestroy($new_img);
    return $new_img;
}

function deleteDir($dir)
{
    // loop through the files one by one
    $directories = glob($dir . '/*');
    foreach ($directories as $directory):
        $del = unlink($directory);
    endforeach;
    $del = rmdir($dir);
    return $del;
}