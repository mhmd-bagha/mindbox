<?php
require 'vendor/autoload.php';

use Response\Response as response;

class forgot_password extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->scripts_path = ['js/app.js'];
        if (Model::SessionGet('user')) Model::redirect('account');
    }

    public function index()
    {
        $this->title = 'فراموشی رمز عبور | بی بست';
        $this->view('pass-forgot/forget-password', '', null, null);
    }

    public function accept($email = '')
    {
        if (empty($email)) Model::error404();
        $email = $this->model->decrypt($email);
        $get_user = $this->model->where('users', 'user_email', $email);
        if (!$get_user) Model::error404();
        $this->title = 'فراموشی رمز عبور | بی بست';
        $this->view('pass-forgot/change-password', '', null, null);
    }

    public function send_link()
    {
        $email_sender = new email();
        $data = $_POST;
        $email = $this->model->security($data['email']);
        $email_hash = $this->model->encrypt($email);
        if (!isset($email) && empty($email)):
            echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد ایمیل اجباری است']);
            die();
        endif;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
            echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فرمت ایمیل نامعتبر است']);
            die();
        endif;
        $get_user = $this->model->where('users', 'user_email', $email);
        if (!$get_user): echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'کاربری با این ایمیل یافت نشد']);
            die(); endif;
        $link_email = DOMAIN . "/forgot_password/accept/{$email_hash}";
        $template_email = helper::forgotPassword($link_email);
        $send = $email_sender->send($email, $email, 'بازیابی رمز عبور | بی بست', $template_email);
        echo $send ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'ایمیل تاییدیه ارسال شد']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در ارسال ایمیل تاییدیه']);
    }

    public function change_password()
    {
        $data = $_POST;
        $password = $this->model->security($data['password']);
        $re_password = $this->model->security($data['re_password']);
        $auth = $this->model->security($data['auth']);
        $auth = $this->model->decrypt($auth);
        $get_user = $this->model->where('users', 'user_email', $auth);
        if (!$get_user): echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'کاربری با این مشخصات یافت نشد']);
            die(); endif;
        if (!isset($password, $re_password) && empty($password) && empty($re_password)):
            if (empty($password)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد رمز عبور اجباری است']);
            if (empty($re_password)) echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد تکرار رمز عبور اجباری است']);
        endif;
        if ($password != $re_password): echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'رمز عبور و تکرار آن برابر نیست']);
            die(); endif;
        $change_password = $this->model->change_password($password, $auth);
        echo $change_password ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'رمز عبور با موفقیت تغییر کرد', 'redirect' => DOMAIN . '/login']) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در تغییر رمز عبور']);
    }
}