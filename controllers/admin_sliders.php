<?php

require 'vendor/autoload.php';
require DIR_ROOT . '/models/model_admin_sliders.php';

class admin_sliders extends Controller
{
    public $model_sliders;

    public function __construct()
    {
        parent::__construct();
        $model = new model_admin_sliders();
        $this->model_sliders = $model;
    }
}