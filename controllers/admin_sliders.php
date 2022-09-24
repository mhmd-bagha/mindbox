<?php
require 'vendor/autoload.php';

use Response\Response as response;

class admin_sliders extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_slider_id()
    {
        if (isset($_POST['btn_data'])) {
            $data = $_POST;
            $id = $this->model->security($data['id']);
            if (isset($id) && !empty($id)) {
                $get_slider = $this->model->get_slider_id($id);
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
