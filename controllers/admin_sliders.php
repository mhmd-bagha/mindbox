<?php
require DIR_ROOT . '/vendor/autoload.php';

use Response\Response as response;

class admin_sliders extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_slider_id()
    {
        if (isset($_POST['btn_data'])) {
            $data = $_POST;
            $id = $this->model->security($data['id']);
            if (isset($id) && !empty($id)) {
                $get_slider = $this->model->get_slider_id($id);
                if ($get_slider)
                    echo response::Json(200, true, [
                        'domain' => DOMAIN,
                        'message' => $get_slider
                    ]);
                else
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'خطا در دریافت اطلاعات'
                    ]);
            } else
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'خطا در دریافت اطلاعات'
                ]);
        }
    }

    public function add()
    {
        if (isset($_POST['btn_slider'])) {
            $data = $_POST;
            $data_file = $_FILES;
            $slider_name = $this->model->security($data['slider_name']);
            $slider_address = $this->model->security($data['slider_address']);
            $author = $this->model->security($data['author']);
            $slider_image = $data_file['slider_image'];
            if (isset($slider_name, $slider_address, $slider_image) && !empty($slider_name) && !empty($slider_image) && !empty($slider_address)) {
                $img_name = $slider_image['name'];;
                $img_size = $slider_image['size'];
                $img_type = $slider_image['type'];
                $img_name = $this->model->add_name_file_time($img_name, 'image');
                $status_show = 'show';
                $time = Model::time_jalili_en();
                $ip = $_SERVER['REMOTE_ADDR'];
                if (in_array($img_type, TYPE_IMG)) {
                    if ($img_size <= SIZE_IMG) {
                        $add = $this->model->add_slider($slider_name, $img_name, $slider_address, $author, $ip, $time, $status_show);
                        echo ($add) ? response::Json(200, true, [
                            'domain' => DOMAIN,
                            'message' => 'اسلایدر با موفقیت اضافه شد',
                            'img_name' => $img_name
                        ]) : response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'خطا در اضافه کردن اسلایدر'
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
                if (empty($slider_name))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'عنوان اسلایدر اجباری است'
                    ]);
                if (empty($slider_image))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'تصویر اسلایدر اجباری است'
                    ]);
                if (empty($slider_address))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'آدرس اسلایدر اجباری است'
                    ]);
            }
        }
    }
}
