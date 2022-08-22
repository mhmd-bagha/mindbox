<?php
require 'vendor/autoload.php';

class Information extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        $this->view('information/rules');
    }

    public function contact_us()
    {
        $this->view('information/contact-us');
    }

    public function about_us()
    {
        $this->view('information/about-us');
    }
}