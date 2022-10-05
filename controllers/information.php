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
        $about_me = $this->model->get('about_me');
        $benefits = $this->model->where_all('information', 'information_type', 'benefits');
        $this->view('information/about-me', compact('about_me', 'benefits'));
    }

    public function rules()
    {
        $this->title = 'قوانین | مایندباکس';
        $rules = $this->model->getAllUser('rules');
        $this->view('information/rules', compact('rules'));
    }

    public function contactUs()
    {
        $this->title = 'تماس با ما | مایندباکس';
        $contact_us = $this->model->get('contact_us');
        $this->view('information/contact-us', compact('contact_us'));
    }

    public function update()
    {
        if (!$this->model->where('information', 'information_type', 'update')) Model::redirect('');
        $this->title = 'در حال بروزرسانی';
        $this->view('pages/update/update', '', '', '');
    }
}