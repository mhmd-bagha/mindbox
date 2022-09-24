<?php
use Response\Response as response;
require DIR_ROOT . 'vendor/autoload.php';


class admin_comment extends \Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function end_comments()
    {
        return $this->model->end_comments();
    }
}