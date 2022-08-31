<?php

class errors extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function page404()
    {
        $this->title = 'خطای 404';
        $this->view('pages/404/index');
    }

    public function page500()
    {
        $this->title = 'خطای 500';
        $this->view('pages/500/index');
    }
}