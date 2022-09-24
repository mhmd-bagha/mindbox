<?php
require 'vendor/autoload.php';

use Response\Response as response;

class admin_social_networks extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add_network()
    {
        if (isset($_POST['btn_network'])) {
            $data = $_POST;
            $network_name = $this->model->security($data['network_name']);
            $network_address = $this->model->security($data['network_address']);
            $network_icon = $this->model->security($data['network_icon']);
            $ip = $_SERVER['REMOTE_ADDR'];
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $status_show = 'show';
            if (isset($network_name, $network_address, $network_icon) && !empty($network_name) && !empty($network_address) && !empty($network_icon)) {
                $add_social_network = $this->model->add($network_name, $network_address, $network_icon, $ip, $time, $status_show);
                echo ($add_social_network) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'شبکه اجتماعی با موفقیت اضافه شد', 'redirect' => DOMAIN . '/admin/social_networks']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در افزودن شبکه اجتماعی']);
            } else {
                if (empty($network_name))
                    echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد عنوان اجباری است']);
                if (empty($network_address))
                    echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد آدرس اجباری است']);
                if (empty($network_icon))
                    echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'آیکون مورد نظر را انتخاب کنید']);
            }
        }
    }
}
