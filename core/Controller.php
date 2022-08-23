<?php

class Controller
{
    function __construct()
    {
    }

    function view($view, $header = 'require', $footer = 'require')
    {
        require 'header_link.php';
        if ($header == 'require')
            require('header.php');
        require('views/' . $view . '.php');
        require 'footer_script.php';
        if ($footer == 'require')
            require('footer.php');
    }


    function model($modelUrl)
    {
        require('models/model_' . $modelUrl . '.php');
        $classname = 'model_' . $modelUrl;
        $this->model = new $classname;
    }

}