<?php
use Response\Response as response;
require DIR_ROOT . 'vendor/autoload.php';

class admin_information extends \Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add_rules()
    {
        if (isset($_POST['btn_rule'])) {
            $data = $_POST;
            $title = $this->model->security($data['title']);
            $description = $this->model->security($data['description']);
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $status = 'show';
            $ip = $_SERVER['REMOTE_ADDR'];
            $information_type = 'rules';
            if (isset($title, $description) && !empty($title) && !empty($description)) {
                $json_data = ['rule_title' => $title, 'rule_description' => $description];
                $json_data = json_encode($json_data, true);
                $add_rule = $this->model->add($information_type, $json_data, $ip, $time, $status);
                echo ($add_rule) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'قانون با موفقیت اضافه شد', 'redirect' => DOMAIN . '/admin/pages']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در اضافه کردن قانون']);
            } else {
                if (empty($title))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد عنوان قوانین اجباری است'
                    ]);
                if (empty($description))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد عنوان قوانین اجباری است'
                    ]);
            }
        }
    }

    public function add_contact_us()
    {
        if (isset($_POST['btn_contact_us'])) {
            $data = $_POST;
            $address = $this->model->security($data['address']);
            $phone_mobile = $this->model->security($data['phone_mobile']);
            $email = $this->model->security($data['email']);
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $status = 'show';
            $ip = $_SERVER['REMOTE_ADDR'];
            $information_type = 'contact_us';
            if (isset($address, $phone_mobile, $email) && !empty($address) && !empty($phone_mobile) && !empty($email)) {
                $json_data = ['address' => $address, 'phone_mobile' => $phone_mobile, 'email' => $email];
                $json_data = json_encode($json_data, true);
                $add_rule = $this->model->add($information_type, $json_data, $ip, $time, $status);
                echo ($add_rule) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'اطلاعات با موفقیت اضافه شد', 'redirect' => DOMAIN . '/admin/pages']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در اضافه کردن اطلاعات']);
            } else {
                if (empty($address))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد آدرس اجباری است'
                    ]);
                if (empty($phone_mobile))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد شماره تلفن اجباری است'
                    ]);
                if (empty($email))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد ایمیل اجباری است'
                    ]);
            }
        }
    }

    public function add_about_me()
    {
        if (isset($_POST['btn_about_me'])) {
            $data = $_POST;
            $title = $this->model->security($data['title']);
            $description = $this->model->security($data['description']);
            $time = jdate('Y/m/d H:i:s', time(), '', 'Asia/Tehran', 'en');
            $status = 'show';
            $ip = $_SERVER['REMOTE_ADDR'];
            $information_type = 'about_me';
            if (isset($title, $description) && !empty($title) && !empty($description)) {
                $json_data = ['title' => $title, 'description' => $description];
                $json_data = json_encode($json_data, true);
                $add_rule = $this->model->add($information_type, $json_data, $ip, $time, $status);
                echo ($add_rule) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'اطلاعات با موفقیت اضافه شد', 'redirect' => DOMAIN . '/admin/pages']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در اضافه کردن اطلاعات']);
            } else {
                if (empty($title))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد عنوان اجباری است'
                    ]);
                if (empty($description))
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => 'فیلد متن اجباری است'
                    ]);
            }
        }
    }
}
