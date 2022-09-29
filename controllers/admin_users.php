<?php

use Response\Response as response;

require 'vendor/autoload.php';

class admin_users extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function end_users()
    {
        return $this->model->end_users();
    }

    public function replace_wallet()
    {
        if (isset($_POST['btn_replace_wallet'])) {
            $price_all = 0;
            $data = $_POST;
            $price_replace = $this->model->security($data['price_replace']);
            $user_id = $this->model->security($data['id']);
            if (isset($price_replace, $user_id) && !empty($price_replace) && !empty($user_id)) {
                $user_money = $this->model->user_money($user_id);
                if ($user_money)
                    $price_all += $user_money->user_money + $price_replace;
                else
                    $price_all += $price_replace;
                $replace_wallet = $this->model->replace_wallet($user_id, $price_all);
                echo $replace_wallet ? response::Json(200, true, [
                    'domain' => DOMAIN,
                    'message' => 'شارژ با موفقیت انجام شد'
                ]) : response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'خطا در انجام شارژ'
                ]);
            } else {
                if (empty($price_replace))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'مبلغ را وارد کنید'
                    ]);
                if (empty($user_id))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'داده های ارسالی ناقص است'
                    ]);
            }
        }
    }
}