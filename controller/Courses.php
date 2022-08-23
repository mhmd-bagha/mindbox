<?php
require 'vendor/autoload.php';

class Courses extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view('courses/index');
    }

    public function course_details()
    {
        $this->view('courses/course-details');
    }
}