<?php
require DIR_ROOT . '/vendor/autoload.php';
require DIR_ROOT . 'vendor/api-file-uploader/api-file-uploader/uploader/Uploader.php';

use Response\Response as response;

class admin_sliders extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add()
    {
        $data = $_POST;
        $data_file = $_FILES;
        $slider_name = $this->model->security($data['slider_name']);
        $slider_address = $this->model->security($data['slider_address']);
        $author = $this->model->security($data['author']);
        $slider_image = $data_file['slider_image'];
        if (isset($slider_name, $slider_address, $slider_image) && !empty($slider_name) && !empty($slider_image) && !empty($slider_address)) {
            $img_name = $slider_image['name'];
            $img_size = $slider_image['size'];
            $img_type = $slider_image['type'];
            $img_name = $this->model->add_name_file_time($img_name, 'image');
            $status_show = 'show';
            $time = Model::time_jalili_en();
            $ip = $_SERVER['REMOTE_ADDR'];
            if (in_array($img_type, TYPE_IMG)) {
                if ($img_size <= SIZE_IMG) {
                    $add = $this->model->add_slider($slider_name, $img_name, $slider_address, $author, $ip, $time, $status_show);
                    echo ($add) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'اسلایدر با موفقیت اضافه شد', 'img_name' => $img_name]) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در اضافه کردن اسلایدر']);
                } else echo response::Json(500, true, ['domain' => DOMAIN, 'message' => errors['capacity_size_of_img']]);
            } else echo response::Json(500, true, ['domain' => DOMAIN, 'message' => errors['format_img']]);
        } else {
            if (empty($slider_name)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'عنوان اسلایدر اجباری است']);
            if (empty($slider_image)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'تصویر اسلایدر اجباری است']);
            if (empty($slider_address)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'آدرس اسلایدر اجباری است']);
        }
    }

    public function edit()
    {
        $file_uploader = new \Uploader\Uploader();
        $data = $_POST;
        $data_file = $_FILES;
        $slider_name = $this->model->security($data['slider_name']);
        $slider_address = $this->model->security($data['slider_address']);
        $id = $this->model->security($data['id']);
        $status_show = 'show';
        $time = Model::time_jalili_en();
        $img_upload = false;
        $get_old_img = $this->model->where('sliders', 'id', $id)->slider_image;
        if (isset($slider_name, $slider_address, $id) && !empty($slider_name) && !empty($slider_address) && !empty($id)) {
            if (isset($data_file) && !empty($data_file)) {
                $slider_image = $data_file['slider_image'];
                $img_name = $slider_image['name'];
                $img_name = $this->model->add_name_file_time($img_name, 'image');
                $validate_image = validate_image($slider_image);
                $img_upload = true;
                if (!$validate_image):
                    echo response::Json(500, true, ['domain' => DOMAIN, 'message' => $validate_image->data->message]);
                    die();
                endif;
            } else {
                $img_name = $get_old_img;
            }
            if (!filter_var($slider_address, FILTER_VALIDATE_URL)): echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'لینک نامعتبر است']);
                die();endif;
            if ($img_upload): $file_uploader->delete(DL_DOMAIN . '/uploader/delete.php', $this->image_path_dl . 'sliders/' . $get_old_img, 'directory'); endif;
            $edit = $this->model->edit($slider_name, $slider_address, $img_name, $time, $id);
            echo ($edit) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'اسلایدر با موفقیت ویرایش شد', 'img_name' => $img_name, 'upload_img' => $img_upload]) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در ویرایش اسلایدر']);
        } else {
            if (empty($slider_name)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'عنوان اسلایدر اجباری است']);
            if (empty($slider_address)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'آدرس اسلایدر اجباری است']);
            if (empty($id)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => errors['empty_data']]);
        }
    }
}