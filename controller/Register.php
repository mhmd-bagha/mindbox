<?php
require 'vendor/autoload.php';

class Register extends Controller
{
    private $model_register;

    public function __construct()
    {
        parent::__construct();
        $this->model_register = new Model();
        $this->Register();
    }

    public function index()
    {
        $this->view('register/index', null, null);
    }

    public function Register()
    {
        if (isset($_POST['btn-user-register'])) {
            $data = $_POST;
            $first_name = $this->model_register->security($data['first_name']);
            $last_name = $this->model_register->security($data['last_name']);
            $phone_mobile = $this->model_register->security($data['phone_mobile']);
            $email = $this->model_register->security($data['email']);
            $password = $this->model_register->security($data['password']);
            $re_password = $this->model_register->security($data['re_password']);
            $user_status = "disable";
            $user_hash = $this->model_register->buildNum('users', 'user_hash', mt_rand(10000, 99999));
            $ip = $_SERVER['REMOTE_ADDR'];
            $create_time = jdate("Y/m/d H:i:s", time(), '', 'Asia/Tehran', 'en');
            if (isset($first_name, $last_name, $phone_mobile, $email, $password, $re_password) && !empty($first_name) && !empty($last_name) && !empty($phone_mobile) && !empty($email) && !empty($password) && !empty($re_password)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if ($password === $re_password) {
                        if ($this->model_register->existUser($email, $phone_mobile))
                            if ($this->model_register->register($first_name, $last_name, $phone_mobile, $email, $password, $user_status, $user_hash, $ip, $create_time)) {
                                $message['success'] = "ثبت نام با موفقیت انجام شد";
                            } else {
                                $message['error'] = "خطا در ثبت نام";
                            }
                        else
                            $message['error'] = "فرد دیگری با این مشخصات ثبت نام کرده است";
                    } else {
                        $message['error'] = "رمز عبور با تکرار آن برابر نیست";
                    }
                } else {
                    $message['error'] = "ایمیل نامعبتر است";
                }
            } else {
                if (empty($first_name))
                    $message['error'] = "لطفا فیلد نام را پر کنید";
                if (empty($first_name))
                    $message['error'] = "لطفا فیلد نام خانوادگی را پر کنید";
                if (empty($phone_mobile))
                    $message['error'] = "لطفا فیلد شماره همراه را پر کنید";
                if (empty($email))
                    $message['error'] = "لطفا فیلد ایمیل را پر کنید";
                if (empty($password))
                    $message['error'] = "لطفا فیلد رمز عبور را پر کنید";
                if (empty($re_password))
                    $message['error'] = "لطفا فیلد تکرار رمز عبور را پر کنید";
            }
            return $message;
        }
    }
}