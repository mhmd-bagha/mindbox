<?php
// variable
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/mindbox/');
const TYPE_FILE = array('image/png', 'image/jpg', 'image/jpeg', 'application/vnd.rar', 'application/zip');
const SIZE_IMG = 1 * 1024 * 1024;

// posted file on ticket
if (isset($_FILES['image_ticket'])) {
    $data_file = $_FILES['image_ticket'];
    $file_name = $data_file['name'];
    $file_tmp = $data_file['tmp_name'];
    $file_img_size = $data_file['size'];
    $file_img_type = $data_file['type'];
    if (in_array($file_img_type, TYPE_FILE)) {
        mkdir(ROOT . "public/images/tickets/{$file_name}");
        $upload = move_uploaded_file($file_tmp, ROOT . "public/images/tickets/{$file_name}/{$file_name}");
        return $upload ? "فایل با موفقیت آپلود شد" : "خطا در اپلود فایل";
    } else {
        return "پسوند های مجاز است png یا jpg یا jpeg";
    }
}

// file header
if (isset($_FILES['header'])){
    $data_file = $_FILES['header'];
    $file_name = $data_file['name'];
    $file_tmp = $data_file['tmp_name'];
    $file_img_size = $data_file['size'];
    $file_img_type = $data_file['type'];
    if (in_array($file_img_type, TYPE_FILE)) {
        mkdir(ROOT . "public/images/public-images/logo/{$file_name}");
        $upload = move_uploaded_file($file_tmp, ROOT . "public/images/public-images/logo/{$file_name}/{$file_name}");
        return $upload ? "فایل با موفقیت آپلود شد" : "خطا در اپلود فایل";
    } else {
        return "پسوند های مجاز است png یا jpg یا jpeg";
    }
}

// category
if (isset($_FILES['category'])){
    $data_file = $_FILES['category'];
    $file_name = $data_file['name'];
    $file_tmp = $data_file['tmp_name'];
    $file_img_size = $data_file['size'];
    $file_img_type = $data_file['type'];
    if (in_array($file_img_type, TYPE_FILE)) {
        mkdir(ROOT . "public/images/category/{$file_name}");
        $upload = move_uploaded_file($file_tmp, ROOT . "public/images/category/{$file_name}/{$file_name}");
        return $upload ? "فایل با موفقیت آپلود شد" : "خطا در اپلود فایل";
    } else {
        return "پسوند های مجاز است png یا jpg یا jpeg";
    }
}

// slider
if (isset($_FILES['slider'])){
    $data_file = $_FILES['slider'];
    $file_name = $data_file['name'];
    $file_tmp = $data_file['tmp_name'];
    $file_img_size = $data_file['size'];
    $file_img_type = $data_file['type'];
    if (in_array($file_img_type, TYPE_FILE)) {
        mkdir(ROOT . "public/images/sliders/{$file_name}");
        $upload = move_uploaded_file($file_tmp, ROOT . "public/images/sliders/{$file_name}/{$file_name}");
        return $upload ? "فایل با موفقیت آپلود شد" : "خطا در اپلود فایل";
    } else {
        return "پسوند های مجاز است png یا jpg یا jpeg";
    }
}

// course_image
if (isset($_FILES['course_image'])){
    $data_file = $_FILES['course_image'];
    $file_name = $data_file['name'];
    $file_tmp = $data_file['tmp_name'];
    $file_img_size = $data_file['size'];
    $file_img_type = $data_file['type'];
    if (in_array($file_img_type, TYPE_FILE)) {
        mkdir(ROOT . "public/images/course/{$file_name}");
        $upload = move_uploaded_file($file_tmp, ROOT . "public/images/course/{$file_name}/{$file_name}");
        return $upload ? "فایل با موفقیت آپلود شد" : "خطا در اپلود فایل";
    } else {
        return "پسوند های مجاز است png یا jpg یا jpeg";
    }
}