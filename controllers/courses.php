<?php

require 'vendor/autoload.php';
require DIR_ROOT . 'controllers/api.php';

use Response\Response as response;

class courses extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->scripts_path = ['vendor/lozad/lozad.min.js', 'js/app.js'];
        $courses = $this->model->courses();
        $this->title = 'دوره های آموزشی مایندباکس';
        $this->view('courses/index', compact('courses'));
    }

    public function course_details($course_id = null)
    {
        if ($course_id == null) Model::error404();
        $course_id = $this->model->security($course_id);
        $course_details = $this->model->getCourse($course_id);
        if ($course_details == false) Model::error404();

        $this->links_path = ['vendor/video-player/css/video-player.css'];
        $this->scripts_path = ['vendor/video-player/js/video-player.js', 'js/app.js'];

        $course_details_name = $course_details[0]->course_title;
        $this->description = $course_details[0]->course_description;
        $this->title = "دوره {$course_details_name}";
        $this->robots = 'index, follow';
        $this->keywords = $course_details[0]->course_labels;
        $this->author = $course_details[0]->course_teacher;
        $count_course_files = $this->model->count_course_files($course_id);
        $get_course_file = $this->model->get_course_file($course_id);
        $get_course_comments = $this->model->get_comments($course_id);
        $get_time_all_course = $this->model->get_time_all_course($course_id);
        $total_course_time_all = 0;
        foreach ($get_time_all_course as $time_all_course) {
            $total_course_time_all = $time_all_course['TIME_TO_SEC(course_time)'];
            $total_course_time_all = $total_course_time_all + $total_course_time_all;
        }
        $total_course_time_all = gmdate("H:i:s", $total_course_time_all);
        $data = ['course_details' => $course_details, 'count_course_files' => $count_course_files, 'get_course_file' => $get_course_file, 'get_course_comments' => $get_course_comments, 'get_time_all_course' => $total_course_time_all];
        $this->view('courses/course-details', $data);
    }

    public function category($id = null)
    {
        if ($id == null) Model::error404();
        $this->scripts_path = ['vendor/lozad/lozad.min.js', 'js/app.js'];
        $id = $this->model->security($id);
        $get_category = $this->model->get_category($id)[0];
        if (!isset($_GET['level']) && !isset($_GET['sort']) && !isset($_GET['type'])) {
            $courses = $this->model->category($id);
        } else {
            $data_get = $_GET;
            if (isset($data_get['type']))
                $type = $this->model->security($data_get['type']);
            else
                $type = '';
            if (isset($data_get['sort']))
                $order = $this->model->security($data_get['sort']);
            else
                $order = '';
            if (isset($data_get['discount']))
                $discount = $this->model->security($data_get['discount']);
            else
                $discount = '';
            if (isset($data_get['level']))
                $level = $this->model->security($data_get['level']);
            else
                $level = '';
            if (isset($data_get['category']))
                $category = $this->model->security($data_get['category']);
            else
                $category = '';
            $courses = $this->filter($type, $order, $discount, $level, $category);
        }
        if ($courses == false) Model::error404();
        $this->title = "دوره های دسته بندی {$get_category->category_title}| مایندباکس";;
        $this->view('courses/index', compact('courses'));
    }

    public function comment()
    {
        if (isset($_POST['btn_comment'])) {
            $data = $_POST;
            $course_id = $this->model->security($data['course_id']);
            $user_id = $this->model->security($data['user_id']);
            $comment = $this->model->security($data['comment']);
            $ip = $_SERVER['REMOTE_ADDR'];
            $status_show = 'hide';
            $create_time = jdate("Y/m/d H:i:s", time(), '', 'Asia/Tehran', 'en');
            $comment_type = 'user';
            if (isset($course_id, $user_id, $comment) && !empty($course_id) && !empty($user_id) && !empty($comment)) {
                $send_comment = $this->model->comment($course_id, $user_id, $comment, $comment_type, $ip, $status_show, $create_time);
                if ($send_comment)
                    echo response::Json(200, true, [
                        'domain' => DOMAIN,
                        'message' => 'نظر با موفقیت ثبت شد'
                    ]);
                else
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'خطا در ثبت نظر'
                    ]);
            } else {
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'خطا در ثبت نظر'
                ]);
            }
        }
    }

    public function exist_course_to_factors($course_id)
    {
        if ($get_factors = $this->model->where_all('factors', 'factor_status', 'paid')) {
            $get_factor_outer = '';
            foreach ($get_factors as $get_factor) {
                $course_id_factor = explode(',', $get_factor->courses_id);
                if (in_array($course_id, $course_id_factor)) {
                    $get_factor_outer = $get_factor;
                    break;
                }
            }
            return $get_factor_outer;
        } else return false;
    }

    public function download($course_id = '', $user_id = '', $file_id = '')
    {
        if (empty($course_id) || empty($user_id) || empty($file_id)) Model::error404();

        $api = new api();
        $course_id = $this->model->decrypt($course_id);
        $user_id = $this->model->decrypt($user_id);
        $file_id = $this->model->decrypt($file_id);
        $is_user_course = $api->exist_user_course($user_id, $course_id);
        if ($is_user_course) {
            $get_file = $this->model->where('course_files', 'id', $file_id);
            if ($get_file) {
                $url = DL_DOMAIN . "/public/course-files/{$this->model->encrypt($course_id)}/{$get_file->course_file}/{$get_file->course_file}";
                $download_file = $api->download_file_course($url, $get_file->course_file);
                if ($download_file) {
                    $this->view('programs/scripts/win-close', '', '', '');
                }
            }
        }
    }

    private function filter($type, $order, $discount, $level, $category)
    {
        $type = $this->model->security($type);
        $order = $this->model->security($order);
        $discount = $this->model->security($discount);
        $level = $this->model->security($level);
        $category = $this->model->security($category);
        switch ($order) {
            case 'new':
                $sort = 'DESC';
                break;
            case 'old':
                $sort = 'ASC';
                break;
            default:
                $sort = '';
                break;
        }
        return $this->model->filter($type, $sort, $discount, $level, $category);
    }
}