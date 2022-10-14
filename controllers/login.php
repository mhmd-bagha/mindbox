<?php
require 'vendor/autoload.php';

use Response\Response as response;

class login extends Controller
{

    protected static $table = 'users';

    public function __construct()
    {
        parent::__construct();
        $this->scripts_path = ['js/app.js'];
        if (Model::SessionGet('user')) Model::redirect('account');
    }

    public function index()
    {
        $this->title = 'ورود | مایندباکس';
        $this->view('login/index', null, null, null);
    }

    public function login()
    {
        if (isset($_POST['btn_login'])) {
            $data = $_POST;
            $email = $data['email'];
            $password = $data['password'];
            if (isset($email, $password) && !empty($email) && !empty($password)) {
                $email = $this->model->security($email);
                $password = $this->model->security($password);
                $email_hash = $this->model->encrypt($email);
                $password = $this->model->encrypt($password);
                if ($this->model->login($email, $password)) {
                    Model::SessionSet('user', $email_hash);
                    $message = "ورود با موفقیت انجام شد";
                    echo response::Json(200, false, [
                        'domain' => DOMAIN,
                        'message' => $message
                    ]);
                } else {
                    $message = "کاربری با این مشخصات یافت نشد";
                    echo response::Json(500, false, [
                        'domain' => DOMAIN,
                        'message' => $message
                    ]);
                }
            } else {
                if (empty($email))
                    $message = "لطفا فیلد ایمیل را پر کنید";
                if (empty($password))
                    $message = "لطفا فیلد رمز عبور را پر کنید";
                echo response::Json(500, false, [
                    'domain' => DOMAIN,
                    'message' => $message
                ]);
            }
        }
    }
}