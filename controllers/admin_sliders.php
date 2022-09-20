<?php
require 'vendor/autoload.php';
require DIR_ROOT . '/models/model_admin_sliders.php';

use Response\Response as response;

class admin_sliders extends Controller
{
    public $model_sliders;

    public function __construct()
    {
        parent::__construct();
        $model = new model_admin_sliders();
        $this->model_sliders = $model;
    }
    public function get_slider_id()
    {
        if (isset($_POST['btn_data'])) {
            $data = $_POST;
            $id = $this->model_sliders->security($data['id']);
            if (isset($id) && !empty($id)) {
                $get_slider = $this->model_sliders->get_slider_id($id);
                if ($get_slider)
                    echo response::Json(200, true, [
                        'domain' => DOMAIN,
                        'message' => $get_slider
                    ]);
                else
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'خطا در دریافت اطلاعات'
                    ]);
            } else
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'خطا در دریافت اطلاعات'
                ]);
        }
    }
}
