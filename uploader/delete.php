<?php
require 'helper.php';

if (isset($_POST['directory'])) :
    $data = $_POST;
    $directory = $data['directory'];
    $directory = ROOT . $directory;
    $delete = deleteDir($directory);
    return $delete ? 'دایرکتوری با موفقیت حذف شد' : 'خطا در حذف دایرکتوری';
endif;