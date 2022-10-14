<?php
require 'helper.php';

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
if (isset($_FILES['header'])) {
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
if (isset($_FILES['category'])) {
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
if (isset($_FILES['slider'])) {
    $data_file = $_FILES['slider'];
    $file_name = $data_file['name'];
    $file_tmp = $data_file['tmp_name'];
    $file_img_size = $data_file['size'];
    $file_img_type = $data_file['type'];
    if (in_array($file_img_type, TYPE_FILE)) {
        mkdir(ROOT . "public/images/sliders/{$file_name}");
        $upload = move_uploaded_file($file_tmp, ROOT . "public/images/sliders/{$file_name}/{$file_name}");
        if ($upload) {
            resize_img(ROOT . "public/images/sliders/{$file_name}/{$file_name}", ROOT . "public/images/sliders/{$file_name}/{$file_name}", 2880, 600);
            return "فایل با موفقیت آپلود شد";
        } else return "خطا در اپلود فایل";

    } else {
        return "پسوند های مجاز است png یا jpg یا jpeg";
    }
}

// course_image
if (isset($_FILES['course_image'])) {
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

// course_file
if (isset($_FILES['course_file'])) {
    $data_file = $_FILES['course_file'];
    $file_names = explode('@', $data_file['name']);
    $file_name = $file_names[0];
    $course_id = $file_names[1];
    $file_tmp = $data_file['tmp_name'];
    $file_img_size = $data_file['size'];
    $file_img_type = $data_file['type'];
    if (in_array($file_img_type, TYPE_FILE)) {
        if (file_exists(ROOT . 'public/public/course-files')) {
            mkdir(ROOT . "public/course-files/{$course_id}/{$file_name}");
            $upload = move_uploaded_file($file_tmp, ROOT . "public/course-files/{$course_id}/{$file_name}/{$file_name}");
            return $upload ? "فایل با موفقیت آپلود شد" : "خطا در اپلود فایل";
        } else {
            mkdir(ROOT . "public/course-files/{$course_id}");
            mkdir(ROOT . "public/course-files/{$course_id}/{$file_name}");
            $upload = move_uploaded_file($file_tmp, ROOT . "public/course-files/{$course_id}/{$file_name}/{$file_name}");
            return $upload ? "فایل با موفقیت آپلود شد" : "خطا در اپلود فایل";
        }
    } else {
        return "پسوند های مجاز zip یا rar است";
    }
}

// course_image
if (isset($_FILES['header'])) {
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

// footer symbols
if (isset($_FILES['footer'])) {
    $data_file = $_FILES['footer'];
    $file_name = $data_file['name'];
    $file_tmp = $data_file['tmp_name'];
    $file_img_size = $data_file['size'];
    $file_img_type = $data_file['type'];
    if (in_array($file_img_type, TYPE_FILE)) {
        mkdir(ROOT . "public/images/public-images/logo-symbol/{$file_name}");
        $upload = move_uploaded_file($file_tmp, ROOT . "public/images/public-images/logo-symbol/{$file_name}/{$file_name}");
        return $upload ? "فایل با موفقیت آپلود شد" : "خطا در اپلود فایل";
    } else {
        return "پسوند های مجاز است png یا jpg یا jpeg";
    }
}