<?php
require 'vendor/autoload.php';
require DIR_ROOT . '/models/model_admin_ticket.php';

use Response\Response as response;

class admin_ticket extends Controller
{
    public $model_ticket;

    public function __construct()
    {
        parent::__construct();
        $model = new model_admin_ticket();
        $this->model_ticket = $model;
    }
}
