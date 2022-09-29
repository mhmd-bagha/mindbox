<?php
require DIR_ROOT . '/vendor/autoload.php';


class admin_discounts extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_discount(){
        return $this->model->get_discount();
    }
}