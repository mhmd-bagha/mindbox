<?php
require 'vendor/autoload.php';

use Response\Response as response;

class account extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!Model::SessionGet('user')) Model::redirect('login');
        $this->scripts_path = ['js/app.js'];
    }


    public function index()
    {
        $this->title = 'پنل کاربری';
        $get_user = $this->model->find('user_email', $this->model->decrypt(Model::SessionGet('user')));
        $register_you_history = $this->register_you_history($get_user->create_time);
        $this->view('profile/index', compact('register_you_history'));
    }

    public function user_edit_profile()
    {
        $this->title = 'ویرایش پروفایل';
        $this->view('profile/user-edit-profile');
    }
    public function information_edit()
    {
        $name = $_POST["name"];
        $family = $_POST["family"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $result = $this->model->information_edit($name, $family, $phone, $email);
    }

    public function user_change_password()
    {
        $this->title = '';
        $this->view('profile/user-change-password');
    }

    public function change_password()
    {
        $current_password = $_POST["current_password"];
        $password = $_POST["password"];
        $encrypted_email = $_SESSION["user"];
        $encrypted_password = $this->model->encrypt($current_password);
        $encrypted_newpassword = $this->model->encrypt($password);
        $email = $this->model->decrypt($encrypted_email);


        if (
            isset($password) && isset($encrypted_email) &&
            !empty($password) && !empty($encrypted_email)
        ) {
            $result = $this->model->change_password($email, $encrypted_password, $encrypted_newpassword);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "variables haven't sent to the server"
            ]);
        }
    }

    public function user_wallet()
    {
        $this->title = '';
        $this->view('profile/user-wallet');
    }

    public function user_my_courses()
    {
        $this->title = '';
        $this->view('profile/user-my-courses');
    }

    public function user_factors()
    {
        $this->title = '';
        $this->view('profile/user-factors');
    }

    public function user_tickets()
    {
        $this->title = '';
        $this->view('profile/user-tickets');
    }

    public function user_ticket()
    {
        $this->title = '';
        $this->view('profile/user-ticket');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        $this->model->redirect(DOMAIN);
    }

    protected function register_you_history($time_register)
    {
        $time_register = explode(' ', $time_register)[0];
        $time_register = date_create(Model::jaliliToMiladi($time_register));
        $time_now = date_create(date('Y-m-d', time()));
        $diff = date_diff($time_register, $time_now);
        return $diff->days;
    }

    public function count_my_course()
    {
    }
}
