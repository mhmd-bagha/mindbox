<?php

require 'vendor/autoload.php';
require DIR_ROOT . '/models/model_admin_comment.php';

class admin_comment extends Controller
{
    public $model_comment;

    public function __construct()
    {
        parent::__construct();
        $model = new model_admin_comment();
        $this->model_comment = $model;
    }

    public function end_comments()
    {
        return $this->model_comment->end_comments();
    }
}