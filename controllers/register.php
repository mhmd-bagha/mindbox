<?php

use Response\Response as response;

class register extends Controller
{
    private $model_register;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->title = 'ثبت نام | مایندباکس';
        $this->view('register/index', null, null, null);
    }

    public function Register()
    {
        if (isset($_POST['btn_user_register'])) {
            $data = $_POST;
            $first_name = $this->model->security($data['first_name']);
            $last_name = $this->model->security($data['last_name']);
            $phone_mobile = $this->model->security($data['phone_mobile']);
            $email = $this->model->security($data['email']);
            $password = $this->model->security($data['password']);
            $password_hash = $this->model->encrypt($password);
            $re_password = $this->model->security($data['re_password']);
            $user_status = "disable";
            $user_hash = $this->model->buildNum('users', 'user_hash', mt_rand(10000, 99999));
            $ip = $_SERVER['REMOTE_ADDR'];
            $create_time = jdate("Y/m/d H:i:s", time(), '', 'Asia/Tehran', 'en');
            if (isset($first_name, $last_name, $phone_mobile, $email, $password, $re_password) && !empty($first_name) && !empty($last_name) && !empty($phone_mobile) && !empty($email) && !empty($password) && !empty($re_password)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if ($password === $re_password) {
                        if ($this->model->existUser($email, $phone_mobile)) {
                            if ($this->model->register($first_name, $last_name, $phone_mobile, $email, $password_hash, $user_status, $user_hash, $ip, $create_time)) {
                                $message = "ثبت نام با موفقیت انجام شد";
                                echo response::Json(200, true, [
                                    'domain' => DOMAIN,
                                    'message' => $message
                                ]);
                            } else {
                                $message = "خطا در ثبت نام";
                                echo response::Json(500, true, [
                                    'domain' => DOMAIN,
                                    'message' => $message
                                ]);
                            }
                        } else {
                            $message = "فرد دیگری با این مشخصات ثبت نام کرده است";
                            echo response::Json(500, true, [
                                'domain' => DOMAIN,
                                'message' => $message
                            ]);
                        }
                    } else {
                        $message = "رمز عبور با تکرار آن برابر نیست";
                        echo response::Json(500, true, [
                            'domain' => DOMAIN,
                            'message' => $message
                        ]);
                    }
                } else {
                    $message = "ایمیل نامعبتر است";
                    echo response::Json(500, true, [
                        'domain' => DOMAIN,
                        'message' => $message
                    ]);
                }
            } else {
                if (empty($first_name))
                    $message = "لطفا فیلد نام را پر کنید";
                if (empty($first_name))
                    $message = "لطفا فیلد نام خانوادگی را پر کنید";
                if (empty($phone_mobile))
                    $message = "لطفا فیلد شماره همراه را پر کنید";
                if (empty($email))
                    $message = "لطفا فیلد ایمیل را پر کنید";
                if (empty($password))
                    $message = "لطفا فیلد رمز عبور را پر کنید";
                if (empty($re_password))
                    $message = "لطفا فیلد تکرار رمز عبور را پر کنید";
                echo response::Json(500, true, [
                    'domain' => DOMAIN,
                    'message' => $message
                ]);
            }
        }
    }
}

new register();