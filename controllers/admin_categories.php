<?php
require 'vendor/autoload.php';
require DIR_ROOT . '/models/model_admin_categories.php';

use Response\Response as response;

class admin_categories extends Controller
{
    public $model_categories;

    public function __construct()
    {
        parent::__construct();
        $model = new model_admin_categories();
        $this->model_categories = $model;
    }
}
