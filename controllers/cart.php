<?php

class cart extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->title = 'سبد خرید';
        $this->view('cart/index');
    }
}