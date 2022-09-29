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
        if (isset($_POST['btn_course'])) {
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
            $course_image = $data_file['course_image'];
            $course_hash = $this->model->buildNum('courses', 'course_hash', time());
            $author = $this->model->security($data['author']);
            $ip = $_SERVER['REMOTE_ADDR'];
            $status_show = 'show';
            $time = $this->model->time_jalili_en();
            if (isset($course_name, $course_teacher_name, $course_labels, $course_category, $course_level, $course_status, $course_type, $course_description, $course_video_demo, $course_image) && !empty($course_name) && !empty($course_teacher_name) && !empty($course_labels) && !empty($course_category) && !empty($course_level) && !empty($course_status) && !empty($course_type) && !empty($course_description) && !empty($course_video_demo) && !empty($course_image)) {
                $course_image_name = $course_image['name'];
                $course_image_name = $this->model->add_name_file_time($course_image_name, 'image');
                $course_image_tmp = $course_image['tmp_name'];
                $course_image_type = $course_image['type'];
                $course_image_size = $course_image['size'];
                if (in_array($course_image_type, TYPE_IMG)) {
                    if (SIZE_IMG_COURSE >= $course_image_size) {
                        switch ($course_type) {
                            case "money":
                                if (isset($course_price) && !empty($course_price)) {
                                    $add = $this->model->add($course_name, $course_description, $course_price, $course_image_name, $course_demo_video_type, $course_video_demo, $course_level, $course_labels, $course_teacher_name, $course_type, $course_status, $course_hash, $course_category, $author, $ip, $time, $status_show);
                                    if ($add) {
                                        $file_uploader->uploader($course_image_tmp, $course_image_type, $course_image_name, 'course_image', DOMAIN . '/uploader/getter.php');
                                        echo response::Json(200, true, [
                                            'domain' => DOMAIN,
                                            'message' => 'دوره با موفقیت اضافه شد'
                                        ]);
                                    } else
                                        echo response::Json(500, true, [
                                            'domain' => DOMAIN,
                                            'message' => 'خطا در افزودن دوره'
                                        ]);
                                } else
                                    echo response::Json(500, true, [
                                        'domain' => DOMAIN,
                                        'message' => 'فیلد قیمت دوره اجباری است'
                                    ]);
                                break;
                            case "free":
                                $course_price = null;
                                $add = $this->model->add($course_name, $course_description, $course_price, $course_image_name, $course_demo_video_type, $course_video_demo, $course_level, $course_labels, $course_teacher_name, $course_type, $course_status, $course_hash, $course_category, $author, $ip, $time, $status_show);
                                if ($add) {
                                    $file_uploader->uploader($course_image_tmp, $course_image_type, $course_image_name, 'course_image', DOMAIN . '/uploader/getter.php');
                                    echo response::Json(200, true, [
                                        'domain' => DOMAIN,
                                        'message' => 'دوره با موفقیت اضافه شد'
                                    ]);
                                } else
                                    echo response::Json(500, true, [
                                        'domain' => DOMAIN,
                                        'message' => 'خطا در افزودن دوره'
                                    ]);
                                break;
                        }
                    } else
                        echo response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => errors['capacity_size_of_img_course']
                        ]);
                } else
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => errors['format_img']
                    ]);
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
    }
}