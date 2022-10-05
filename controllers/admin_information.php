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

    public function update_web($update)
    {
        if (isset($_POST['btn_update_web'])) {
            $information_type = 'update';
            switch ($update) {
                case "true":
                    $information_data = ['update_web' => true];
                    $information_data = json_encode($information_data);
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $time = $this->model->time_jalili_en();
                    $update_web = $this->model->update_web("true", $information_type, $information_data, $ip, $time);
                    echo ($update_web) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'بروزرسانی سایت با موفقیت انجام شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در بروزرسانی سایت']);
                    break;
                case "false":
                    $update_web = $this->model->update_web("false", $information_type);
                    echo ($update_web) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'بروزرسانی سایت با موفقیت انجام شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در بروزرسانی سایت']);
                    break;
            }
        }
    }

    public function story_add()
    {
        if (isset($_POST['btn_story'])) {
            $data = $_POST;
            $title = $this->model->security($data['title']);
            $description = $this->model->security($data['description']);
            $time = $this->model->time_jalili_en();
            $status = 'show';
            $ip = $_SERVER['REMOTE_ADDR'];
            if ($this->model->exist_story_count() < 2) {
                if (isset($title, $description)) {
                    $add = $this->model->story_add($title, $description, $ip, $time, $status);
                    echo ($add) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'داستان با موفقیت اضافه شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در اضافه کردن داستان']);
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
            } else
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'ثبت داستان مجاز نمیباشد'
                ]);
        }
    }

    public function benefits_add()
    {
        if (isset($_POST['btn_benefits'])) {
            $data = $_POST;
            $title = $this->model->security($data['title']);
            $description = $this->model->security($data['description']);
            $icon = $this->model->security($data['icon']);
            $time = $this->model->time_jalili_en();
            $status = 'show';
            $type = 'benefits';
            $ip = $_SERVER['REMOTE_ADDR'];
            if ($this->model->exist_benefits_count() < 4) {
                if (isset($title, $description, $icon)) {
                    $data = [
                        'title' => $title,
                        'description' => $description,
                        'icon' => $icon
                    ];
                    $data = json_encode($data, true);
                    $add = $this->model->benefits_add($type, $data, $ip, $time, $status);
                    echo ($add) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'مزایا با موفقیت اضافه شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در اضافه کردن مزایا']);
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
                    if (empty($icon))
                        echo response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => 'آیکون اجباری است'
                        ]);
                }
            } else
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => 'ثبت مزایا مجاز نمیباشد'
                ]);
        }
    }

    public function header()
    {
        if (isset($_POST['btn_setting_header'])) {
            $data = $_POST;
            $data_file = $_FILES;
            $image_name = 'mindbox.svg';
            $color = '#153248';
            $img_upload = false;
            if (isset($data['color']) && !empty($data['color']))
                $color = $this->model->security($data['color']);
            $exist_header = $this->model->where('information', 'information_type', 'header');
            if ($exist_header):
                $exist_header = json_decode($exist_header->information_data);
                $image_name = $exist_header->image;
            endif;
            if (isset($data_file['image'])) {
                $image = $data_file['image'];
                $img_name = $image['name'];;
                $img_size = $image['size'];
                $img_type = $image['type'];
                $image_name = $this->model->add_name_file_time($img_name, 'image');
                $img_upload = true;
                if (!in_array($img_type, TYPE_IMG)):
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => errors['format_img']
                    ]);
                    die();
                endif;
                if (!$img_size >= SIZE_IMG):
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => errors['capacity_size_of_img']
                    ]);
                    die();
                endif;
            }
            $information_data = [
                'color' => $color,
                'image' => $image_name
            ];
            $type = 'header';
            $status = 'show';
            $ip = $_SERVER['REMOTE_ADDR'];
            $time = $this->model->time_jalili_en();
            $information_data = json_encode($information_data);
            $add = $this->model->header($type, $information_data, $ip, $time, $status);
            echo ($add) ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'سرتیتر با موفقیت اضافه شد', 'img_name' => $image_name, 'img_upload' => $img_upload]) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در اضافه کردن سرتیتر']);
        }
    }
}
