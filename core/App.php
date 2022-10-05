<?php

class App
{
    public $controller = 'index';
    public $method = 'index';
    public $params = array();
    // page is update web
    protected $no_pages_update = [
        'admin',
        'admin_categories',
        'admin_comment',
        'admin_courses',
        'admin_discounts',
        'admin_information',
        'admin_sliders',
        'admin_social_networks',
        'admin_ticket',
        'admin_users',
        'api',
        'errors',
        'information'
    ];

    function __construct()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = $this->parseUrl($url);
            $this->controller = $url[0];
            unset($url[0]);
            if (isset($url[1]))
                $this->method = $url[1];
            unset($url[1]);
            $this->params = array_values($url);
        }
        $controllerUrl = "controllers/{$this->controller}.php";
        if (file_exists($controllerUrl)) {
            require $controllerUrl;
            $obj = new $this->controller;
            $obj->model($this->controller);
            if (method_exists($obj, $this->method)) {
                $arr = array($obj, $this->method);
                call_user_func_array($arr, $this->params);
            }
        } else
            Model::error404();
        // redirect page update web site
        if ((new Model())->where('information', 'information_type', 'update')) {
            if (!in_array($this->controller, $this->no_pages_update)) {
                Model::update_web_page();
            }
        }
    }

    function parseUrl($url)
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        return $url;
    }
}
