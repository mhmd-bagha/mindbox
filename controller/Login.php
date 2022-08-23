<?php
require 'vendor/autoload.php';

class Login extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view('login/index', null, null);
    }
}