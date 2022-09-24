<?php
require DIR_ROOT . '/vendor/autoload.php';

use Response\Response as response;

class menu extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add_menu()
    {
        if (isset($_POST['btn_add_menu'])) {
            $data = $_POST;
            $menu_name = $this->model->security($data['menu_name']);
            $menu_address = $this->model->security($data['menu_address']);
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $status_show = 'show';
            if (isset($menu_name, $menu_address) && !empty($menu_name) && !empty($menu_address)) {
                if (filter_var($menu_address, FILTER_VALIDATE_URL)) {
                    $menu_add = $this->model->add($menu_name, $menu_address, $status_show, $time);
                    if ($menu_add)
                        echo response::Json(200, true, [
                            'domain' => DOMAIN,
                            'message' => 'منو با موفقیت ایجاد شد',
                            'redirect' => DOMAIN . '/admin/menus'
                        ]);
                    else
                        echo response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'خطا در ثبت منو'
                        ]);
                } else
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فرمت آدرس منو نامعتبر است'
                    ]);
            } else {
                if (empty($menu_name))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد نام منو را پر کنید'
                    ]);
                if (empty($menu_address))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد آدرس منو را پر کنید'
                    ]);
            }
        }
    }
}
