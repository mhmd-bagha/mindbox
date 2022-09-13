<?php
require 'vendor/autoload.php';

class information extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->scripts_path = ['js/app.js'];
    }

    public function index()
    {
        $this->title = 'درباره ما | مایندباکس';
        $this->view('information/about-us');
    }

    public function rules()
    {
        $this->title = 'قوانین | مایندباکس';
        $this->view('information/rules');
    }

    public function contactUs()
    {
        $this->title = 'تماس با ما | مایندباکس';
        $this->view('information/contact-us');
    }
}