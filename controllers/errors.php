<?php

class errors extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->scripts_path = ['js/app.js'];
    }

    public function error403()
    {
        $this->title = 'خطای 403';
        $this->view('pages/403/index');
    }

    public function error404()
    {
        $this->title = 'خطای 404';
        $this->view('pages/404/index');
    }

    public function error500()
    {
        $this->title = 'خطای 500';
        $this->view('pages/500/index');
    }
}