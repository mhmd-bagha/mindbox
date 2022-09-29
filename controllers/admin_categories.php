<?php
require 'vendor/autoload.php';

use Response\Response as response;

class admin_categories extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add()
    {
        if (isset($_POST['btn_category'])) {
            $data = $_POST;
            $data_file = $_FILES;
            $category_name = $this->model->security($data['category_name']);
            $category_image = $data_file['category_image'];
            $author = $this->model->security($data['author']);
            if (isset($category_name, $category_image) && !empty($category_name) && !empty($category_image)) {
                $img_name = $category_image['name'];;
                $img_size = $category_image['size'];
                $img_type = $category_image['type'];
                $img_name = $this->model->add_name_file_time($img_name, 'image');
                $status_show = 'show';
                $time = Model::time_jalili_en();
                $ip = $_SERVER['REMOTE_ADDR'];
                if (in_array($img_type, TYPE_IMG)) {
                    if ($img_size <= SIZE_IMG) {
                        $add = $this->model->add($category_name, $img_name, $time, $ip, $author, $status_show);
                        echo ($add) ? response::Json(200, true, [
                            'domain' => DOMAIN,
                            'message' => 'دسته بندی با موفقیت اضافه شد',
                            'img_name' => $img_name
                        ]) : response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'خطا در اضافه کردن دسته بندی'
                        ]);
                    } else
                        echo response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => errors['capacity_size_of_img']
                        ]);
                } else
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => errors['format_img']
                    ]);
            } else {
                if (empty($category_name))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'نام دسته بندی اجباری است'
                    ]);
                if (empty($category_image))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'تصویر دسته بندی اجباری است'
                    ]);
            }
        }
    }
}
