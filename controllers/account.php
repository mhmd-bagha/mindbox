<?php
require 'vendor/autoload.php';

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
        $count_my_course = $this->count_my_course();
        $this->view('profile/index', compact('register_you_history', 'count_my_course', 'get_user'));
    }

    public function user_edit_profile()
    {
        $this->title = 'ویرایش پروفایل';
        $this->view('profile/user-edit-profile');
    }

    public function user_change_password()
    {
        $this->title = '';
        $this->view('profile/user-change-password');
    }

    public function user_wallet()
    {
        $this->title = '';
        $this->view('profile/user-wallet');
    }

    public function user_my_courses()
    {
        $this->title = '';
        $my_courses = $this->my_courses();
        $this->view('profile/user-my-courses', compact('my_courses'));
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
        unset($_SESSION['user']);
        Model::redirect('');
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
        $count_all = 0;
        $get_user = $this->model->find('user_email', $this->model->decrypt(Model::SessionGet('user')));
        $user_id = $get_user->id;
        $status = 'paid';
        $my_courses = $this->model->count_my_course($user_id, $status);
        if ($my_courses) {
            foreach ($my_courses as $my_course) {
                $count_course = explode(',', $my_course->courses_id);
                $count_all += count($count_course);
            }
            return $count_all;
        }
    }

    public function my_courses()
    {

    }
}