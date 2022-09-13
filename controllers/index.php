<?php
require 'vendor/autoload.php';

class index extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->links_path = ['vendor/owl/owl.carousel.min.css', 'vendor/owl/owl.theme.default.min.css'];
        $this->scripts_path = ['js/app.js', 'vendor/owl/owl.carousel.min.js', 'vendor/lozad/lozad.min.js', 'vendor/purecounterjs/purecounter_vanilla.js'];
    }

    public function index()
    {
        $total_course_time_all = 0;
        $sliders = $this->model->sliders();
        $categories = $this->model->categories();
        $users_count = $this->model->users_count();
        $courses_count = $this->model->courses_count();
        $course_offer = $this->model->course_offer();
        $course_discounts = $this->model->course_discounts();
        $course_last = $this->model->course_last();
        $course_time_all = $this->model->courses_min_all();
        foreach ($course_time_all as $time_all_course) {
            $total_course_time_all = $time_all_course['TIME_TO_SEC(course_time)'];
            $total_course_time_all = $total_course_time_all + $total_course_time_all;
        }
        $total_course_time_all = (gmdate("i", $total_course_time_all));
        $data = ['sliders' => $sliders, 'categories' => $categories, 'users_count' => $users_count, 'course_offer' => $course_offer, 'course_discounts' => $course_discounts, 'course_last' => $course_last, 'courses_count' => $courses_count, 'total_course_time_all' => $total_course_time_all];
        $this->view('main/index', $data);
    }
}