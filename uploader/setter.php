<?php
require '../core/config.php';
require DIR_ROOT . 'vendor/autoload.php';
require DIR_ROOT . 'vendor/api-file-uploader/api-file-uploader/uploader/Uploader.php';

if (isset($_FILES)) {
    $uploader = new \Uploader\Uploader();
    $data = $_POST;
    $data_file = $_FILES['file'];
    $file_name = $data['file_name'];
    $file_name_posted = $data['file_name_posted'];
    $file_path = $data_file['tmp_name'];
    $file_type = $data_file['type'];
    $uploader = $uploader->uploader($file_path, $file_type, $file_name, $file_name_posted, DL_DOMAIN . '/uploader/getter.php');
    return $uploader;
}