<?php
require 'vendor/autoload.php';

class courses extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $courses = $this->model->courses();
        $data = ['courses' => $courses];
        $this->title = 'دوره های آموزشی مایندباکس';
        $this->view('courses/index', $data);
    }

    public function course_details($course_id = null)
    {
        if ($course_id == null) Model::page404();
        $course_id = $this->model->security($course_id);
        $course_details = $this->model->getCourse($course_id);
        if ($course_details == false) Model::page404();

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
            $total_course_time_all = $total_course_time_all + (int)$total_course_time_all;
        }
        $total_course_time_all = gmdate("H:i:s", $total_course_time_all);
        $data = ['course_details' => $course_details, 'count_course_files' => $count_course_files, 'get_course_file' => $get_course_file, 'get_course_comments' => $get_course_comments, 'get_time_all_course' => $total_course_time_all];
        $this->view('courses/course-details', $data);
    }

    public function category($id = null)
    {
        if ($id == null) Model::page404();
        $id = $this->model->security($id);
        $category = $this->model->category($id);
        $get_category = $this->model->get_category($id)[0];
        if ($category == false) Model::page404();
        $this->title = "دوره های دسته بندی {$get_category->category_title}| مایندباکس";
        $data = ['courses' => $category];
        $this->view('courses/index', $data);
    }
}