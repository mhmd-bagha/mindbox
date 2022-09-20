<?php
require 'vendor/autoload.php';
require DIR_ROOT . '/models/model_admin_courses.php';

use Response\Response as response;

class admin_courses extends Controller
{
    public $model_courses;

    public function __construct()
    {
        parent::__construct();
        $model = new model_admin_courses();
        $this->model_courses = $model;
    }
}
