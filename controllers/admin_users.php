<?php
require 'vendor/autoload.php';

require DIR_ROOT . '/models/model_admin_users.php';

class admin_users extends Controller
{
    public $model_users;

    public function __construct()
    {
        parent::__construct();
        $model = new model_admin_users();
        $this->model_users = $model;
    }

    public function end_users()
    {
        return $this->model_users->end_users();
    }
}