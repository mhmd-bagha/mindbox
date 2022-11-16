<?php
require 'vendor/autoload.php';
require DIR_ROOT . 'vendor/api-file-uploader/api-file-uploader/uploader/Uploader.php';

use Uploader\Uploader as file_uploader;
use Response\Response as response;

class admin_courses extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add()
    {
        $file_uploader = new file_uploader();
        $data = $_POST;
        $data_file = $_FILES;
        $course_name = $this->model->security($data['course_name']);
        $course_teacher_name = $this->model->security($data['course_teacher_name']);
        $course_labels = $this->model->security($data['course_labels']);
        $course_category = $this->model->security($data['course_category']);
        $course_level = $this->model->security($data['course_level']);
        $course_status = $this->model->security($data['course_status']);
        $course_type = $this->model->security($data['course_type']);
        $course_price = $this->model->security($data['course_price']);
        $course_description = $this->model->security($data['course_description']);
        $course_demo_video_type = $this->model->security($data['course_demo_video_type']);
        $course_video_demo = $this->model->security($data['course_video_demo']);
        $course_hash = $this->model->buildNum('courses', 'course_hash', time());
        $author = $this->model->security($data['author']);
        $ip = $_SERVER['REMOTE_ADDR'];
        $status_show = 'show';
        $time = $this->model->time_jalili_en();
        if (isset($course_name, $course_teacher_name, $course_labels, $course_category, $course_level, $course_status, $course_type, $course_description, $course_video_demo, $data_file) && !empty($course_name) && !empty($course_teacher_name) && !empty($course_labels) && !empty($course_category) && !empty($course_level) && !empty($course_status) && !empty($course_type) && !empty($course_description) && !empty($course_video_demo) && !empty($data_file)) {
            $course_image = $data_file['course_image'];
            $course_image_name = $course_image['name'];
            $course_image_name = $this->model->add_name_file_time($course_image_name, 'image');
            $course_image_tmp = $course_image['tmp_name'];
            $course_image_type = $course_image['type'];
            $course_image_size = $course_image['size'];
            if (in_array($course_image_type, TYPE_IMG)) {
                if (SIZE_IMG_COURSE >= $course_image_size) {
                    switch ($course_type) {
                        case "money":
                            if (empty($course_price)): echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد قیمت دوره اجباری است']);
                                die();endif;
                            break;
                        case "free":
                            $course_price = null;
                    }
                    $add = $this->model->add($course_name, $course_description, $course_price, $course_image_name, $course_demo_video_type, $course_video_demo, $course_level, $course_labels, $course_teacher_name, $course_type, $course_status, $course_hash, $course_category, $author, $ip, $time, $status_show);
                    echo ($add) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'دوره با موفقیت اضافه شد', 'img_name' => $course_image_name]) : response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'خطا در افزودن دوره'
                    ]);
                } else echo response::Json(500, true, ['domain' => DOMAIN, 'message' => errors['capacity_size_of_img_course']]);
            } else echo response::Json(500, true, ['domain' => DOMAIN, 'message' => errors['format_img']]);
        } else {
            if (empty($course_name))
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'فیلد نام دوره اجباری است'
                ]);
            if (empty($course_teacher_name))
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'فیلد نام مدرس دوره اجباری است'
                ]);
            if (empty($course_labels))
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'فیلد برچسب دوره اجباری است'
                ]);
            if (empty($course_category))
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'فیلد دسته بندی دوره اجباری است'
                ]);
            if (empty($course_level))
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'فیلد سطح دوره اجباری است'
                ]);
            if (empty($course_status))
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'فیلد وضعیت دوره اجباری است'
                ]);
            if (empty($course_type))
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'فیلد نوع دوره اجباری است'
                ]);
            if (empty($course_description))
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'فیلد توضیحات دوره اجباری است'
                ]);
            if (empty($course_video_demo))
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'فیلد فیلم دمو دوره اجباری است'
                ]);
            if (empty($course_image))
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'فیلد تصویر دوره اجباری است'
                ]);
        }
    }

    public function edit()
    {
        $file_uploader = new file_uploader();
        $data = $_POST;
        $data_file = $_FILES;
        $course_name = $this->model->security($data['course_name']);
        $course_labels = $this->model->security($data['course_labels']);
        $course_category = $this->model->security($data['course_category']);
        $course_level = $this->model->security($data['course_level']);
        $course_status = $this->model->security($data['course_status']);
        $course_type = $this->model->security($data['course_type']);
        $course_price = $this->model->security($data['course_price']);
        $course_description = $this->model->security($data['course_description']);
        $course_video_demo = $this->model->security($data['course_video_demo']);
        $id = $this->model->security($data['id']);
        $time = $this->model->time_jalili_en();
        $img_upload = false;
        $img_old_courses = $this->model->where('courses', 'id', $id)->course_image;
        if (isset($course_name, $course_labels, $course_category, $course_level, $course_status, $course_type, $course_description, $course_video_demo, $id) && !empty($course_name) && !empty($course_labels) && !empty($course_category) && !empty($course_level) && !empty($course_status) && !empty($course_type) && !empty($course_description) && !empty($course_video_demo) && !empty($id)) {
            switch ($course_type):
                case "money":
                    if (!isset($course_price) && empty($course_price)) {
                        echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد قیمت دوره اجباری است']);
                        die();
                    }
                    break;
                case "free":
                    $course_price = null;
            endswitch;
            if (isset($data_file) && !empty($data_file)) {
                $data_file = $data_file['course_image'];
                $img_name = $data_file['name'];
                $img_name = $this->model->add_name_file_time($img_name, 'image');
                $validate_image = validate_image($data_file);
                $img_upload = true;
                if (!$validate_image):
                    echo response::Json(500, true, ['domain' => DOMAIN, 'message' => $validate_image->data->message]);
                    die();
                endif;
            } else $img_name = $img_old_courses;
            $edit = $this->model->edit($course_name, $course_labels, $course_category, $course_level, $course_status, $course_type, $course_price, $course_description, $course_video_demo, $img_name, $time, $id);
            if ($edit) {
                echo response::Json(200, true, ['domain' => DOMAIN, 'message' => 'دوره با موفقیت ویرایش شد', 'img_name' => $img_name, 'img_upload' => $img_upload]);
                if ($img_upload) $file_uploader->delete(DL_DOMAIN . '/uploader/delete.php', $this->image_path_dl . "course/{$img_old_courses}", 'directory');
            } else echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در ویرایش دوره']);
        } else {
            if (empty($course_name)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد نام دوره اجباری است']);
            if (empty($course_labels)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد برچسب دوره اجباری است']);
            if (empty($course_category)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد دسته بندی دوره اجباری است']);
            if (empty($course_level)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد سطح دوره اجباری است']);
            if (empty($course_status)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد وضعیت دوره اجباری است']);
            if (empty($course_type)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد نوع دوره اجباری است']);
            if (empty($course_description)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد توضیحات دوره اجباری است']);
            if (empty($course_video_demo)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد فیلم دمو دوره اجباری است']);
            if (empty($id)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => errors['empty_data']]);
        }
    }

    public function add_file()
    {
        if (isset($_POST['btn_course_file'])) {
            $data = $_POST;
            $data_file = $_FILES['course_file'];
            $course_title = $this->model->security($data['course_title']);
            $course_time = $this->model->security($data['course_time']);
            $course_number = $this->model->security($data['course_number']);
            $course_type = $this->model->security($data['course_type']);
            $course_id = $this->model->security($data['course_id']);
            $author = $this->model->security($data['author']);
            $ip = $_SERVER['REMOTE_ADDR'];
            $status_show = 'show';
            $time = $this->model->time_jalili_en();
            if (isset($course_title, $course_time, $course_number, $course_type, $author, $course_id) && !empty($course_title) && !empty($course_time) && !empty($course_number) && !empty($course_type) && !empty($author) && !empty($course_id)) {
                $course_file_name = $data_file['name'];
                $course_file_name = $this->model->add_name_file_time($course_file_name, 'file');
                $course_file_name_course_id = $course_file_name . '@' . $this->model->encrypt($course_id);
                $course_file_type = $data_file['type'];
                if (in_array($course_file_type, TYPE_FILE)) {
                    $add = $this->model->add_file($course_title, $course_file_name, $course_time, $course_type, $course_number, $course_id, $author, $ip, $time, $status_show);
                    echo ($add) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'فایل با موفقیت اضافه شد', 'file_name' => $course_file_name_course_id]) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطادر افزودن فایل']);
                } else
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => errors['format_file']
                    ]);
            } else {
                if (empty($course_title))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد عنوان دوره اجباری است'
                    ]);
                if (empty($course_time))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد تصویر دوره اجباری است'
                    ]);
                if (empty($course_number))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد ترتیب شماره اجباری است'
                    ]);
                if (empty($course_type))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد نوع فایل اجباری است'
                    ]);
                if (empty($data_file))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد فایل دوره اجباری است'
                    ]);
                if (empty($author) && empty($course_id))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'اطلاعات ارسالی ناقص است'
                    ]);
            }
        }
    }

    public function edit_file()
    {
        $file_uploader = new file_uploader();
        $data = $_POST;
        $data_file = $_FILES;
        $course_title = $this->model->security($data['course_title']);
        $course_time = $this->model->security($data['course_time']);
        $course_number = $this->model->security($data['course_number']);
        $course_type = $this->model->security($data['course_type']);
        $id = $this->model->security($data['id']);
        $time = $this->model->time_jalili_en();
        $get_file_course = $this->model->where('course_files', 'id', $id);
        $course_id = $get_file_course->course_id;
        $get_old_file = $get_file_course->course_file;
        $upload_file = false;
        $file_name_course_id = '';
        if (isset($course_title, $course_time, $course_number, $course_type, $id) && !empty($course_title) && !empty($course_time) && !empty($course_number) && !empty($course_type) && !empty($id)) {
            if (isset($data_file) && !empty($data_file)) {
                $data_file = $data_file['course_file'];
                $course_file_name = $data_file['name'];
                $file_name = $this->model->add_name_file_time($course_file_name, 'file');
                $file_name_course_id = $file_name . '@' . $this->model->encrypt($course_id);
                $validate_file = validate_file($data_file);
                if (!$validate_file): echo response::Json(500, true, ['domain' => DOMAIN, 'message' => $validate_file->data->message]);
                    die();endif;
                $upload_file = true;
            } else $file_name = $get_old_file;
            $edit = $this->model->edit_file($course_title, $course_time, $course_number, $course_type, $file_name, $time, $id);
            if ($edit) {
                echo response::Json(200, true, ['domain' => DOMAIN, 'message' => 'فایل با موفقیت ویرایش شد', 'file_name' => $file_name_course_id, 'upload_file' => $upload_file]);
                if ($upload_file) $file_uploader->delete(DL_DOMAIN . '/uploader/delete.php', $this->file_path_dl . $this->model->encrypt($course_id) . '/' . $get_old_file, 'directory');
            } else echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در ویرایش فایل']);
        } else {
            if (empty($course_title)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد عنوان دوره اجباری است']);
            if (empty($course_time)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد تصویر دوره اجباری است']);
            if (empty($course_number)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد ترتیب شماره اجباری است']);
            if (empty($course_type)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد نوع فایل اجباری است']);
            if (empty($id)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => errors['empty_data']]);
        }
    }
}