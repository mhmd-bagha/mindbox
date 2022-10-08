<?php

class Controller
{
    public $title = 'مایندباکس', $keywords = 'مایندباکس, فروش دوره, دوره انگیزشی, دوره آموزشی, دکتر چشمی, محمد چشمی,Mohammad Cheshmi, Cheshmi, mindbox, training course, Incentive period, Sale course', $description = '', $author = 'mindbox', $robots = 'index, follow';
    protected $scripts_path, $links_path;
    protected $body_class = '';
    protected $image_path_dl = 'public/images/';

    function __construct()
    {
    }

    function view($view, $data = array(), $header = 'require', $footer = 'require', $link = 'require', $script = 'require')
    {
        if ($link == 'require')
            require 'header_link.php';

        if ($header == 'require')
            require('header.php');

        require('views/' . $view . '.php');

        if ($script == 'require')
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