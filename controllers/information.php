<?php

use Response\Response as response;

require 'vendor/autoload.php';

class information extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->scripts_path = ['js/app.js'];
    }

    public function index()
    {
        $this->title = 'درباره ما | مایندباکس';
        $about_me = $this->model->get('about_me');
        $benefits = $this->model->where_all('information', 'information_type', 'benefits');
        $this->view('information/about-me', compact('about_me', 'benefits'));
    }

    public function rules()
    {
        $this->title = 'قوانین | مایندباکس';
        $rules = $this->model->getAllUser('rules');
        $this->view('information/rules', compact('rules'));
    }

    public function contactUs()
    {
        $this->scripts_cdn = ['https://www.google.com/recaptcha/api.js'];
        $this->title = 'تماس با ما | مایندباکس';
        $contact_us = $this->model->get('contact_us');
        $this->view('information/contact-us', compact('contact_us'));
    }

    public function update()
    {
        if (!$this->model->where('information', 'information_type', 'update')) Model::redirect('');
        $this->title = 'در حال بروزرسانی';
        $this->view('pages/update/update', '', '', '');
    }

    public function email_contact()
    {
        $email_sender = new email();
        $data = $_POST;
        $full_name = $this->model->security($data['full_name']);
        $phone_mobile = $this->model->security($data['phone_mobile']);
        $email = $this->model->security($data['email']);
        $message = $this->model->security($data['message']);
        $captcha = $this->model->security($data['captcha']);
        if (!isset($full_name, $phone_mobile, $email, $message, $captcha) && empty($full_name) && empty($phone_mobile) && empty($email) && empty($message) && empty($captcha)):
            if (empty($full_name))
                echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد نام و نام خانوادگی اجباری است']);
            if (empty($phone_mobile))
                echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد شماره تماس اجباری است']);
            if (empty($email))
                echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد ایمیل اجباری است']);
            if (empty($message))
                echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فیلد متن پیام اجباری است']);
            if (empty($captcha))
                echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'کپچا اجباری است']);
            die(); endif;
        $captcha_result = helper::captcha_result($captcha);
        if (!$captcha_result): echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'کپچا اجباری است']);
            die(); endif;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)): echo response::Json(500, true, ['domain' => DOMAIN, 'message' => 'فرمت ایمیل نامعتبر است']);
            die(); endif;
        $template_email = helper::contactUs($full_name, $phone_mobile, $email, $message);
        $send = $email_sender->send(EMAIL_CONTACT, 'مایندباکس', 'تماس با ما | مایندباکس', $template_email);
        echo $send ? response::Json(200, true, ['domain' => DOMAIN, 'message' => 'پیام شما ارسال شد', 'redirect' => DOMAIN]) : response::Json(500, true, ['domain' => DOMAIN, 'message' => 'خطا در ارسال پیام']);
    }
}