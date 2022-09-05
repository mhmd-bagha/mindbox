<?php
require 'vendor/autoload.php';

use Response\Response as response;

class course_search extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        if (isset($_POST['value']) && !empty($_POST['value'])) {
            $value = $this->model->security($_POST['value']);
            $search = $this->model->search($value);
            if ($search)
                echo response::Json(200, true, [
                    'domain' => DOMAIN,
                    'message' => $search
                ]);
            else
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'چیزی پیدا نشد!'
                ]);
        } else {
            echo 'چیزی بنویسید...';
        }
    }
}