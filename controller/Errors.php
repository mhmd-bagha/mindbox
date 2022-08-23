<?php

class Errors extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function page404()
    {
        $this->view('pages/404/index');
    }

    public function page500()
    {
        $this->view('pages/500/index');
    }
}