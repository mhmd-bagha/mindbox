<?php
require 'vendor/autoload.php';

class index extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $sliders = $this->model->sliders();
        $categories = $this->model->categories();
        $users_count = $this->model->users_count();
        $courses_count = $this->model->courses_count();
        $course_offer = $this->model->course_offer();
        $course_discounts = $this->model->course_discounts();
        $course_last = $this->model->course_last();
        $data = ['sliders' => $sliders, 'categories' => $categories, 'users_count' => $users_count, 'course_offer' => $course_offer, 'course_discounts' => $course_discounts, 'course_last' => $course_last, 'courses_count' => $courses_count];
        $this->view('main/index', $data);
    }
}