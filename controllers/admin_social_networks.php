<?php
require 'vendor/autoload.php';
require DIR_ROOT . '/models/model_admin_social_networks.php';

use Response\Response as response;

class admin_social_networks extends Controller
{
    public $model_social_networks;

    public function __construct()
    {
        parent::__construct();
        $model = new model_admin_social_networks();
        $this->model_social_networks = $model;
    }
}
