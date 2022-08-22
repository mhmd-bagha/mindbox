<?php
require 'vendor/autoload.php';

class Course_details extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view('courses/course-details');
    }
}