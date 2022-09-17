<?php

class App
{
    public $controller = 'index';
    public $method = 'index';
    public $params = array();
    protected static $registry = [];
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
    }

    function parseUrl($url)
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        return $url;
    }
}
