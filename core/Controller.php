<?php

class Controller
{
    public $title = 'مایندباکس', $keywords = 'مایندباکس, فروش دوره, دوره انگیزشی, دوره آموزشی, دکتر چشمی, محمد چشمی,Mohammad Cheshmi, Cheshmi, mindbox, training course, Incentive period, Sale course', $description = '', $author = 'mindbox', $robots = 'index, follow';
    protected $scripts_name, $scripts_path, $links_name, $links_path;

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

    public function scriptLoad($script_name, $script_path)
    {
        $this->scripts_name = $script_name;
        $this->scripts_path = $script_path;
    }

    public function linkLoad($link_name, $link_path)
    {
        $this->links_name = $link_name;
        $this->links_path = $link_path;
    }

    function model($modelUrl)
    {
        require('models/model_' . $modelUrl . '.php');
        $classname = 'model_' . $modelUrl;
        $this->model = new $classname;
    }

}