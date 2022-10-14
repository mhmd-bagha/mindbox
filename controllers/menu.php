<?php
require DIR_ROOT . '/vendor/autoload.php';

use Response\Response as response;

class menu extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function menu()
    {
        $data = $_POST;
        $menu_name = $this->model->security($data['menu_name']);
        $menu_address = $this->model->security($data['menu_address']);
        $type = $this->model->security($data['type']);
        $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
        $status_show = 'show';
        if (isset($menu_name, $menu_address, $type) && !empty($menu_name) && !empty($menu_address) && !empty($type)) {
            if (filter_var($menu_address, FILTER_VALIDATE_URL)) {
                switch ($type):
                    case 'add':
                        $menu_add = $this->model->add($menu_name, $menu_address, $status_show, $time);
                        echo ($menu_add) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'منو با موفقیت ایجاد شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در ثبت منو']);
                        break;
                    case 'edit':
                        if (!isset($data['id']) && empty($data['id'])): echo response::Json(500, true, ['domain' => DOMAIN, 'message' => errors['empty_data']]); endif;
                        $id = $this->model->security($data['id']);
                        $menu_edit = $this->model->edit($menu_name, $menu_address, $time, $id);
                        echo ($menu_edit) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'منو با موفقیت ویرایش شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در ویرایش منو']);
                        break;
                endswitch;
            } else
                echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فرمت آدرس منو نامعتبر است']);
        } else {
            if (empty($menu_name)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد نام منو را پر کنید']);
            if (empty($menu_address)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد آدرس منو را پر کنید']);
            if (empty($type)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => errors['empty_data']]);
        }
    }
}
