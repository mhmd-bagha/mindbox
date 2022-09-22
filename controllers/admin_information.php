<?php

require DIR_ROOT . 'vendor/autoload.php';

require DIR_ROOT . '/models/model_admin_information.php';

class admin_information extends \Controller
{
    public $model_information;

    public function __construct()
    {
        parent::__construct();
        $model = new model_admin_information();
        $this->model_information = $model;
    }
}
