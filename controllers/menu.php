<?php
require DIR_ROOT . '/vendor/autoload.php';
require DIR_ROOT . '/models/model_menu.php';

use Response\Response as response;

class menu extends Controller
{
    public $model_menu;

    public function __construct()
    {
        parent::__construct();
        $model = new model_menu();
        $this->model_menu = $model;
    }
}
