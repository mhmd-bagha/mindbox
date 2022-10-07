<?php
require 'helper.php';

if (isset($_POST['directory'])) :
    $data = $_POST;
    $directory = $data['directory'];
    $delete = deleteDir($directory);
    var_dump($delete);
    echo $delete ? 'دایرکتوری با موفقیت حذف شد' : 'خطا در حذف دایرکتوری';
endif;